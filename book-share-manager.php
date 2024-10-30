<?php
/*
Plugin Name: Book Share Manager
Plugin URI: http://bsm.co.nf/
Description: It will make your website to a Book sharing website. It will work in a single institution with some feature.
Version: 1.0.0
Author: Jaed Mosharraf
Author URI: http://bsm.co.nf/
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 


class BookShareManager {
	
	public function __construct(){
	
	define('bsm_plugin_url', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );
	define('bsm_plugin_dir', plugin_dir_path( __FILE__ ) );
	define('bsm_wp_url', 'https://wordpress.org/plugins/book-share-manager/' );
	define('bsm_wp_reviews', 'http://wordpress.org/support/view/plugin-reviews/book-share-manager' );
	define('bsm_pro_url','http://bsm.co.nf/' );
	define('bsm_demo_url', 'http://bsm.co.nf/' );
	define('bsm_conatct_url', 'http://bsm.co.nf/contact/' );
	define('bsm_qa_url', 'http://bsm.co.nf/qa/' );
	define('bsm_plugin_name', 'Book Share Manager' );
	define('bsm_plugin_version', '1.0.0' );
	define('bsm_customer_type', 'free' );
	define('bsm_share_url', 'https://wordpress.org/plugins/book-share-manager/' );
	
	// Class
	require_once( plugin_dir_path( __FILE__ ) . 'includes/class-post-types.php');	
	require_once( plugin_dir_path( __FILE__ ) . 'includes/class-post-meta.php');	
	require_once( plugin_dir_path( __FILE__ ) . 'includes/class-post-meta-book.php');	
	require_once( plugin_dir_path( __FILE__ ) . 'includes/class-shortcodes.php');	
	require_once( plugin_dir_path( __FILE__ ) . 'includes/class-functions.php');
		

	// Function's
	require_once( plugin_dir_path( __FILE__ ) . 'includes/functions.php');

	add_action( 'admin_enqueue_scripts', 'wp_enqueue_media' );
	add_action( 'wp_enqueue_scripts', array( $this, 'bsm_front_scripts' ) );
	add_action( 'admin_enqueue_scripts', array( $this, 'bsm_admin_scripts' ) );
	
	}

	public function job_bm_report_install()
	{
		do_action( 'job_bm_report_action_install' );
	}		
		
	public function job_bm_report_uninstall()
	{
		do_action( 'job_bm_report_action_uninstall' );
	}		
		
	public function job_bm_report_deactivation()
	{
		do_action( 'job_bm_report_action_deactivation' );
	}
		
	public function bsm_front_scripts()
	{
		wp_enqueue_script('jquery');

		wp_enqueue_script('bsm_js', plugins_url( '/js/scripts.js' , __FILE__ ) , array( 'jquery' ));
		wp_localize_script( 'bsm_js', 'bsm_ajax', array( 'bsm_ajaxurl' => admin_url( 'admin-ajax.php')));

		wp_enqueue_style('bsm_style', bsm_plugin_url.'css/style.css');

		wp_enqueue_style('font-awesome', bsm_plugin_url.'css/font-awesome.css');
		wp_enqueue_style('font-awesome', bsm_plugin_url.'css/font-awesome.min.css');
		
		//JaedAdmin
		wp_enqueue_style('JaedAdmin', bsm_plugin_url.'JaedAdmin/css/JaedAdmin.css');
		wp_enqueue_script('JaedAdmin', plugins_url( 'JaedAdmin/js/JaedAdmin.js' , __FILE__ ) , array( 'jquery' ));		
	}

	public function bsm_admin_scripts()
	{
		wp_enqueue_script('jquery');
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script('jquery-ui-autocomplete');		

		wp_enqueue_script('bsm_admin_js', plugins_url( '/admin/js/scripts.js' , __FILE__ ) , array( 'jquery' ));
		wp_localize_script( 'bsm_admin_js', 'bsm_ajax', array( 'bsm_ajaxurl' => admin_url( 'admin-ajax.php')));
		wp_enqueue_style('bsm_admin_style', bsm_plugin_url.'admin/css/style.css');

		//JaedAdmin
		wp_enqueue_style('JaedAdmin', bsm_plugin_url.'JaedAdmin/css/JaedAdmin.css');		
		wp_enqueue_script('JaedAdmin', plugins_url( 'JaedAdmin/js/JaedAdmin.js' , __FILE__ ) , array( 'jquery' ));
	}
	
	
} new BookShareManager();