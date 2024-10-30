<?php

/*
* @Author 		Jaed Mosharraf
* Copyright: 	2015 Jaed Mosharraf
*/

if ( ! defined('ABSPATH')) exit;  // if direct access
	
	$bsm_book_name 		= get_the_title();
	$bsm_book_url 		= get_permalink();
	$bsm_user_id 		= get_post_meta(get_the_ID(),'bsm_user_id',true);
	$bsm_book_category	= get_post_meta(get_the_ID(),'bsm_book_category',true);
	$bsm_book_author	= get_post_meta(get_the_ID(),'bsm_book_author',true);
	$post_date			= get_the_date();
	
	$class_bsm_functions = new class_bsm_functions();
	$bsm_sharer_name 	= $class_bsm_functions->bsm_get_sharer_name($bsm_user_id);
	$bsm_category_name	= $class_bsm_functions->bsm_get_category($bsm_book_category);
			
			$html .='<div class="bsm_book_single">';
			$html .= 
			'<div class="bsm_book_info">
				<div class="book_info book-thumb">
					<img src="'.bsm_plugin_url .'themes/book-list/flat/images/book.png" /> </div>
				
				<div class="book_title">
					<i class="fa fa-book"></i>
					<a href="'.$bsm_book_url.'">'.$bsm_book_name.'</a></div>
			
				<br>				
				<div class="book_info_meta bsm_button_small bsm_button_green a">
					'.__(' <i class="fa fa-hand-o-right"></i> Available','bsm').'</div>
				
				<br>	
				<div class="book_info_meta bsm_button_small bsm_button_navy_blue a">
					'.__(' <i class="fa fa-share-alt"></i> ','bsm').'
					<a href="'.site_url().'/book-list/?sort_by=sharer&data='.$bsm_sharer_name.'">'.__($bsm_sharer_name,'bsm').'</a></div>
					
				<br>
				<div class="book_info_meta bsm_button_small bsm_button_light_violate a">
					'.__(' <i class="fa fa-hand-o-right"></i> ','bsm').'
					<a href="'.site_url().'/book-list/?sort_by=category&data='.$bsm_category_name.'">'.__($bsm_category_name,'bsm').'</a></div>
				
				<br>
				<div class="book_info_meta bsm_button_small bsm_button_sky_blue a">
					'.__(' <i class="fa fa-hand-o-right"></i> ','bsm').'
					<a href="'.site_url().'/book-list/?sort_by=date&data='.$post_date.'">'.__($post_date,'bsm').'</a></div>
					
			</div>';
	$html .= '<br></br>';
 	
	//if ( shortcode_exists( 'bsm_book_list' ) ) $html .= 'Short Code Exists';
	
	$html .='<div class="bsm_book_action ">
				
				<div class="inline bsm_button_medium bsm_button_green">
					'.__('<i class="fa fa-hand-o-right"></i> Get Now','bsm').'</div>';
	
	// check if report is install and active 
	if ( shortcode_exists( 'bsm_report_this_book' ) ):
	$html.='		<div class="inline bsm_button_medium bsm_button_red">
						'.__('<i class="fa fa-exclamation-triangle"></i>' . do_shortcode('[bsm_report_this_book]') ,'bsm').'</div>
			';
	endif;
		
	$html .='	<div class="inline bsm_button_medium bsm_button_facebook">
						'.__('<i class="fa fa-facebook"></i> Share This','bsm').'</div>
				
			</div>';
			
	$html .= '</div>'; // end bsm_book_single