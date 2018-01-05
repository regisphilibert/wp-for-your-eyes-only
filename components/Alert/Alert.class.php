<?php
class jsAlert extends jsComponent{

	public static $instance = 0;

	function __construct() {
		self::$instance++;
		$hook = is_admin() ? 'admin_enqueue_scripts' : 'wp_enqueue_scripts';
	    add_action( $hook, [$this, 'scripts']);
	    add_action( $hook, [$this, 'styles']);
	}

	function prod_alert($alerts, $title = false){
		global $prod_alert;
        $title = $title ? $title : "Debug Data | This box is only visible to debug users";
        $prod_alert[] = $alert;
        $debug_trace = false;
        $backtraces = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS);
        foreach($backtraces as $backtrace){
        	if(!isset($backtrace['class']) && $backtrace['function'] == 'ardump'){
        		$debug_trace = $backtrace;
        	}
        }
        if($this->is_debug_user()){
        	$this->set([
        		'id'=>self::$instance,
				'title'=>$title,
				'alerts'=>$alerts,
				'trace'=>$debug_trace
        	]);
            $this->render();
        }
	}

	function ardump($alerts, $title = false){
	    $this->prod_alert($alerts, $title, 'array');
	}
	function arquick($message){
	    if($this->is_debug_user()){
	        echo "<pre>";
	        if(is_array($message) || is_object($message)){
	            print_r($message);
	        }
	        else{
	            echo $message;
	        }
	        echo "</pre>";
	    }
	}
	function scripts(){
		wp_enqueue_script( 'js-alert-script', plugin_dir_url( __FILE__ ). 'Alert.js', ['jquery'], '1.0', true );
	}

	function styles(){
		wp_enqueue_style( 'js-alert-style', plugin_dir_url( __FILE__ ) . 'Alert.css');
	}

}

new jsAlert;