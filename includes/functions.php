<?php
/*
* @Author 		Jaed Mosharraf
* Copyright: 	2015 Jaed Mosharraf
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 


	
//========================================satrt share =================================
	function bsm_ajax_share_check_login()
	{
		$html = array();
		
		require_once( plugin_dir_path( __FILE__ ) . '/require-bsm-check.php');
		
		$html['found_msg'] = '<div> Please wait <i class="fa fa-refresh fa-spin"></i> </div>';
		$html['not_found_msg'] = '<div> Unknown <i class="fa fa-exclamation-triangle"></i> Please wait <i class="fa fa-refresh fa-spin"></i> </div>';
		
	
		echo json_encode($html);
		die();
	}

	
add_action('wp_ajax_bsm_ajax_share_check_login', 'bsm_ajax_share_check_login');
add_action('wp_ajax_nopriv_bsm_ajax_share_check_login', 'bsm_ajax_share_check_login');

//========================================join =================================
	function bsm_ajax_join()
	{
		$html = '';
		
		require_once( plugin_dir_path( __FILE__ ) . '/require-bsm-join.php');
		
		echo $html;
		die();
	}

add_action('wp_ajax_bsm_ajax_join', 'bsm_ajax_join');
add_action('wp_ajax_nopriv_bsm_ajax_join', 'bsm_ajax_join');

//======================================== Share Finish =================================
	function bsm_ajax_share_done()
	{
		$html = array();
		
		require_once( plugin_dir_path( __FILE__ ) . '/require-bsm-share.php');
		
		echo json_encode($html);
		die();
	}

add_action('wp_ajax_bsm_ajax_share_done', 'bsm_ajax_share_done');
add_action('wp_ajax_nopriv_bsm_ajax_share_done', 'bsm_ajax_share_done');




add_filter('pre_get_posts', 'filter_search');
function filter_search($query) 
	{
		if ($query->is_search) 
			$query->set('post_type', array('post', 'bsm_book'));
		return $query;
	}