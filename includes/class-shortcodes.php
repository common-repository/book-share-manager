<?php

/*
* @Author 		Jaed Mosharraf
* Copyright: 	2015 Jaed Mosharraf
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 

class class_bsm_shortcodes{
	
    public function __construct()
	{
		add_shortcode( 'bsm_want_to_share', array( $this, 'bsm_want_to_share_button_display' ) );		
		add_shortcode( 'bsm_book_list', array( $this, 'bsm_book_list_display' ) );		
		add_shortcode( 'bsm_book_single', array( $this, 'bsm_book_single_display' ) );		
	}

	
	public function bsm_want_to_share_button_display($atts, $content = null ) 
	{
			$atts = shortcode_atts(
				array(
					'themes' => 'flat',
					), $atts);
	
			$html = '';
			$themes = $atts['themes'];
					
			$class_bsm_functions = new class_bsm_functions();
			$bsm_themes_dir = $class_bsm_functions->bsm_themes_dir();
			$bsm_themes_url = $class_bsm_functions->bsm_themes_url();

			echo '<link  type="text/css" media="all" rel="stylesheet"  href="'.$bsm_themes_url[$themes].'/style.css" >';				

			include $bsm_themes_dir[$themes].'/index.php';				
			return $html;
	}	
	
	public function bsm_book_list_display($atts, $content = null ) 
	{
			$atts = shortcode_atts(
				array(
					'themes' => 'flat',
					), $atts);
	
			$html = '';
			$themes = $atts['themes'];
					
			$class_bsm_functions = new class_bsm_functions();
			$bsm_book_list_themes_dir = $class_bsm_functions->bsm_book_list_themes_dir();
			$bsm_book_list_themes_url = $class_bsm_functions->bsm_book_list_themes_url();

			echo '<link  type="text/css" media="all" rel="stylesheet"  href="'.$bsm_book_list_themes_url[$themes].'/style.css" >';				

			include $bsm_book_list_themes_dir[$themes].'/index.php';				
			return $html;
	}	
	
	public function bsm_book_single_display($atts, $content = null ) 
	{
			$atts = shortcode_atts(
				array(
					'bsm_book_post_id' => '',	
					'themes' => 'flat',
					), $atts);
	
			$html = '';
			$bsm_book_post_id = $atts['bsm_book_post_id'];
			$themes = $atts['themes'];
			
			
			$class_bsm_functions = new class_bsm_functions();
			$bsm_single_book_display_themes_dir = $class_bsm_functions->bsm_single_book_display_themes_dir();
			$bsm_single_book_display_themes_url = $class_bsm_functions->bsm_single_book_display_themes_url();

			echo '<link  type="text/css" media="all" rel="stylesheet"  href="'.$bsm_single_book_display_themes_url[$themes].'/style.css" >';				

			include $bsm_single_book_display_themes_dir[$themes].'/index.php';				
			
			return $html;
	}	
	
	
		
} new class_bsm_shortcodes();