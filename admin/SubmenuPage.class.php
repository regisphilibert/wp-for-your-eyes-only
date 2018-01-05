<?php
class jsSubmenuPage {

	public function __construct($deserializer) {
		$this->deserializer = $deserializer;
	}

	public function render() {
		include_once( 'views/settings.php' );
	}

}