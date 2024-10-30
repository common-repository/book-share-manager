<?php

/*
* @Author 		Jaed Mosharraf
* Copyright: 	2015 Jaed Mosharraf
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 

class class_bsm_functions{
	

	public function bsm_themes($themes = array())
	{
		$themes = array(
					'flat'=>'Flat',		
				);
		foreach(apply_filters( 'bsm_themes', $themes ) as $theme_key=> $theme_name)
			$theme_list[$theme_key] = $theme_name;
		return $theme_list;
	}
	
	public function bsm_themes_dir($themes_dir = array())
	{
		$main_dir = bsm_plugin_dir.'themes/new-share/';
		$themes_dir = array(
						'flat'=>$main_dir.'flat',
					);
			
		foreach(apply_filters( 'bsm_themes_dir', $themes_dir ) as $theme_key=> $theme_dir)
			$theme_list_dir[$theme_key] = $theme_dir;
		return $theme_list_dir;
	}

	public function bsm_themes_url($themes_url = array())
	{
		$main_url = bsm_plugin_url.'themes/new-share/';
		$themes_url = array(
						'flat'=>$main_url.'flat',
					);
			
		foreach(apply_filters( 'bsm_themes_url', $themes_url ) as $theme_key=> $theme_url)
			$theme_list_url[$theme_key] = $theme_url;
		return $theme_list_url;
	}
	
	public function bsm_book_list_themes_dir($themes_dir = array())
	{
		$main_dir = bsm_plugin_dir.'themes/book-list/';
		$themes_dir = array(
						'flat'=>$main_dir.'flat',
					);
			
		foreach(apply_filters( 'bsm_book_list_themes_dir', $themes_dir ) as $theme_key=> $theme_dir)
			$theme_list_dir[$theme_key] = $theme_dir;
		return $theme_list_dir;
	}

	public function bsm_book_list_themes_url($themes_url = array())
	{
		$main_url = bsm_plugin_url.'themes/book-list/';
		$themes_url = array(
						'flat'=>$main_url.'flat',
					);
			
		foreach(apply_filters( 'bsm_book_list_themes_url', $themes_url ) as $theme_key=> $theme_url)
			$theme_list_url[$theme_key] = $theme_url;
		return $theme_list_url;
	}
	
	
	// Book Single ============================================
	public function bsm_single_book_display_themes_dir($themes_dir = array())
	{
		$main_dir = bsm_plugin_dir.'themes/book-single/';
		$themes_dir = array(
						'flat'=>$main_dir.'flat',
					);
			
		foreach(apply_filters( 'bsm_single_book_display_themes_dir', $themes_dir ) as $theme_key=> $theme_dir)
			$theme_list_dir[$theme_key] = $theme_dir;
		return $theme_list_dir;
	}

	public function bsm_single_book_display_themes_url($themes_url = array())
	{
		$main_url = bsm_plugin_url.'themes/book-single/';
		$themes_url = array(
						'flat'=>$main_url.'flat',
					);
			
		foreach(apply_filters( 'bsm_single_book_display_themes_url', $themes_url ) as $theme_key=> $theme_url)
			$theme_list_url[$theme_key] = $theme_url;
		return $theme_list_url;
	}
	
	
	
	// Extra Functions
	
	public function bsm_get_category( $category_id )
	{
		$category_name = '';
		switch ( $category_id )
		{
			case "1":
				$category_name = 'Computer Science and Engineering';
				break;
			case "2":
				$category_name = 'Electronics and Telecommunication Engineering';
				break;
			case "3":
				$category_name = 'Math';
				break;
			case "4":
				$category_name = 'Physics';
				break;
			case "5":
				$category_name = 'Women and Gender Studies';
				break;
			case "6":
				$category_name = 'Accounting and Information System';
				break;
				
			default:
				$category_name = 'N/A';
		}
		return $category_name;
	}
	
	public function bsm_get_sharer_name( $bsm_user_id )
	{
		$sharer_name = '';
		
		$wp_query_get_sharer_name = new WP_Query(
			array (
				'post_type' => 'bsm_sharer',
				'post_status' => 'publish',
				'meta_query' => array(
					array(
						'key' => 'bsm_user_id',
						'value' => $bsm_user_id,
							
						),					
					),
			) );
		
		if ( $wp_query_get_sharer_name->found_posts > 0 )
			$wp_query_get_sharer_name->the_post();
		else $sharer_name = 'N/A';
		
		$sharer_name = get_the_title();
		wp_reset_query();
		
		return $sharer_name;
	}
	
	
		
} new class_bsm_functions();