<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://startupmasters.eu
 * @since      1.0.0
 *
 * @package    Smgoals
 * @subpackage Smgoals/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Smgoals
 * @subpackage Smgoals/admin
 * @author     Aleksandur Aleksiev <aleksanduralexiev@gmail.com>
 */
class Smgoals_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Smgoals_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Smgoals_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/smgoals-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Smgoals_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Smgoals_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/smgoals-admin.js', array( 'jquery' ), $this->version, false );

	}

	// Plugin Option Configuration

    public function add_admin_page(){
        $this->plugin_screen_hook_suffix = add_options_page(
            __('SM Goals Settings Page' , 'smgoals'),
            __('SM Goals' , 'smgoals'),
            'manage_options',
            $this->plugin_name,
            array($this , 'display_options_page')
        );
    }

    // End Plugin option configuration

    // Load the view for the plugin admin side

    public function display_options_page(){
        include_once 'partials/smgoals-admin-display.php';
    }
    // Load the view for the plugin admin side
}
