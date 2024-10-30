<?php

/*
* @Author 		Jaed Mosharraf
* Copyright: 	2015 Jaed Mosharraf
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 

class class_bsm_post_types{
	
	public function __construct(){
		add_action( 'init', array( $this, 'bsm_post_type_sharer' ), 0 );
		add_action( 'init', array( $this, 'bsm_post_type_book' ), 0 );
	}
	
	public function bsm_post_type_sharer()
	{
		//if ( post_type_exists( "sharer" ) ) return;

		$labels = array(
                'name' => _x('BSM Sharer', 'bsm_sharer'),
                'singular_name' => _x('bsm_sharer', 'bsm_sharer'),
                'edit_item' => __('Edit BSM Sharer'),
                'view_item' => __('View BSM Sharer'),
                'search_items' => __('Search BSM Sharer'),
                'not_found' =>  __('Nothing found'),
                'not_found_in_trash' => __('Nothing found in Trash'),
                'parent_item_colon' => ''
        );
 
        $args = array(
                'labels' => $labels,
                'public' => true,
                'show_ui' => true,
                'query_var' => true,
                'menu_icon' => null,
                'rewrite' => true,
                'capability_type' => 'post',
				//'capabilities' => array('create_posts' => false,),
                'hierarchical' => false,
                'menu_position' => null,
				'map_meta_cap'          => true,
				'publicly_queryable' 	=> true,
				'exclude_from_search' 	=> false,
                'supports' 		=> array('title','thumbnail'),
				'menu_icon' => 'dashicons-media-spreadsheet',
		
          ); 
		register_post_type( 'bsm_sharer' , $args );
	}
	
	public function bsm_post_type_book()
	{
		if ( post_type_exists( "bsm_book" ) ) return;

		$labels = array(
                'name' => _x('BSM Book', 'bsm_book'),
                'singular_name' => _x('bsm_book', 'bsm_book'),
                'edit_item' => __('Edit BSM Book'),
                'view_item' => __('View BSM Book'),
                'search_items' => __('Search BSM Book'),
                'not_found' =>  __('Nothing found'),
                'not_found_in_trash' => __('Nothing found in Trash'),
                'parent_item_colon' => ''
        );
 
        $args = array(
                'labels' => $labels,
                'public' => true,
                'show_ui' => true,
                'query_var' => true,
                'menu_icon' => null,
                'rewrite' => true,
                'capability_type' => 'post',
				//'capabilities' => array('create_posts' => false,),
                'hierarchical' => false,
                'menu_position' => null,
				'map_meta_cap'          => true,
				'publicly_queryable' 	=> true,
				'exclude_from_search' 	=> false,
                'supports' 		=> array('title','thumbnail'),
				'menu_icon' => 'dashicons-media-spreadsheet',
		
          ); 
		register_post_type( 'bsm_book' , $args );
	}
} new class_bsm_post_types();