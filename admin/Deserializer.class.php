<?php
class jsDeserializer {
	public function get_value($key) {
		return get_option($key);
	}
}