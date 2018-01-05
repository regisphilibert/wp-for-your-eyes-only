<?php 
class StickyData {
	public $data;

	function __construct(){
		$this->data = [];
	}

	function add($data) {
		$this->data[] = $data;
	}

	function get(){
		return !empty($this->data) ? $this->data : false;
	}
}

class Sticky extends jsComponent {

	public static $instances = [];
	public $data;

	function __construct($StickyData, $data) {
		$StickyData->add($data);
		$this->data = $StickyData->get();
		if($this->data){
			wp_enqueue_script( 'js-sticky-script', plugin_dir_url( __FILE__ ). 'Sticky.js', ['jquery'], '1.0', true );
			wp_enqueue_style( 'js-sticky-style', plugin_dir_url( __FILE__ ) . 'Sticky.css');

			add_action('wp_footer', [$this, 'build'] , 10);
		}
	}

	function build() {
		if($this->data){
			$this->set(['data'=>$this->data]);
			$this->render();
		}
	}

}

$StickyData = new StickyData();