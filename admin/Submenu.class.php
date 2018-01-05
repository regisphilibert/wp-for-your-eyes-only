<?php
class jsSubmenu {

	private $submenu_page;

    private $params;

	public function __construct($submenu_page) {
		$this->submenu_page = $submenu_page;
        $this->params = [
            'For Your Eyes Only',
            'For Your Eyes Only',
            'manage_options',
            'fyeo-admin-page'
        ];
        if($this->acf_active()){
            require_once "AcfFields.php";
        } else {
            add_action( 'admin_notices', [$this, 'acf_notice'] );
        }
    }

	public function init() {
		add_action( 'admin_menu', [ $this, 'add_options_page' ] );
	}

    public function add_options_page() {
        if($this->acf_active()){
            acf_add_options_sub_page(
                [
                    'page_title'=>'For Your Eyes Only',
                    'menu_title'=>'For Your Eyes Only',
                    'menu_slug'=>'fyeo-admin-page',
                    'parent_slug'=>'options-general.php'
                ]
            );
        } else {
            add_options_page(
                'For Your Eyes Only',
                'For Your Eyes Only',
                'manage_options',
                'fyeo-admin-page',
                [ $this->submenu_page, 'render' ]
            );
        }
    }

    public function acf_notice(){
        $class = "notice notice-warning is-dismissible";
        $message = "<strong>For Your Eyes Only says :</strong> You should really install ACF Pro for better experience with this plugin.<br>
        You can get it from <a href='https://www.advancedcustomfields.com/'>here</a>";
        echo"<div class=\"$class\"> <p>$message</p></div>";
    }

    public function acf_active(){
        return function_exists('get_sub_field_object');
    }

}