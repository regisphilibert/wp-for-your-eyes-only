<?php
class jsSerializer {
	public function init() {
		add_action('admin_post', [$this, 'save']);
	}

	public function save() {
		if( ! ( $this->has_valid_nonce() && current_user_can( 'manage_options') ) ) {
			return false;
		}
		if ( null !== wp_unslash( $_POST['options_js_debug_users'] ) ) {
			$value = sanitize_text_field( $_POST['options_js_debug_users']);
			update_option('options_js_debug_users', $_POST['options_js_debug_users']);
		}
		

		$this->redirect();
	}

	private function has_valid_nonce() {
		if( ! isset( $_POST['seri-debug-users'] ) ) {
			return false;
		}
		
		$field = wp_unslash($_POST['seri-debug-users']);
		$action = 'fyeo-settings-save';

		return wp_verify_nonce( $field, $action );
	}

	private function redirect() {
	 
	    // To make the Coding Standards happy, we have to initialize this.
	    if ( ! isset( $_POST['_wp_http_referer'] ) ) { // Input var okay.
	        $_POST['_wp_http_referer'] = wp_login_url();
	    }
	 
	    // Sanitize the value of the $_POST collection for the Coding Standards.
	    $url = sanitize_text_field(
	        wp_unslash( $_POST['_wp_http_referer'] ) // Input var okay.
	    );
	 
	    // Finally, redirect back to the admin page.
	    wp_safe_redirect( urldecode( $url ) );
	    exit;
	 
	}

}