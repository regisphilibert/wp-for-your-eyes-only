<?php
class jsComponent {

	private $vars = [];

	public function is_debug_user($user = false){
		$debug_users = $this->get_debug_users();
		if(!$user){
			$current_user = wp_get_current_user();
			$user = $current_user->ID;
		} else {
			if(is_object($user)){
				$user = $user->ID;
			}
			elseif(is_array($user)){
				$user = $user['ID'];
			}
		}
		if(!empty($debug_users)){
			return in_array($user, $debug_users);
		}
		return false;
	}
	
	public function get_debug_users(){
		return get_option('options_js_debug_users');
	}

	public function render($view_name = false){
		$component = str_replace('js', '', get_class($this));
		$view = $view_name ? $view_name : $component;
		$path = $component . '/' . $view . '.view.php';
		$this->set('Component', $this);
		extract($this->vars);
        require($path);
	}

    public function set($k, $v=null){
        if(is_array($k)){
            $this->vars += $k;
        }
        else{
            $this->vars[$k] = $v;
        }
    }

    public function dashicon($icon){
    	echo '<span class="dashicons dashicons-' . $icon . '"></span>';

    }
}