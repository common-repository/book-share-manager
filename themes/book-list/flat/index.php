<?php

/*
* @Author 		Jaed Mosharraf
* Copyright: 	2015 Jaed Mosharraf
*/

if ( ! defined('ABSPATH')) exit;  // if direct access

	$job_bm_list_per_page = 10;
	
	if ( get_query_var('paged') ) $paged = get_query_var('paged');
	elseif ( get_query_var('page') ) $paged = get_query_var('page');
	else $paged = 1;
	

	$sort_by = isset($_GET['sort_by'])   ? $_GET['sort_by'] : '';
	$data = isset($_GET['data'])   ? $_GET['data'] : '';

	$wp_query = new WP_Query(
		array (
			'post_type' => 'bsm_book',
			'orderby' => 'Date',
			'order' => 'DESC',
			'posts_per_page' => $job_bm_list_per_page,
			'paged' => $paged,	
		) );
	
	$html .= '<div class="book-list">';		
				
	if ( $wp_query->have_posts() ) :
		while ( $wp_query->have_posts() ) : $wp_query->the_post();	
			
			$bsm_book_name 		= get_the_title();
			$bsm_book_url 		= get_permalink();
			$bsm_user_id 		= get_post_meta(get_the_ID(),'bsm_user_id',true);
			$bsm_book_category	= get_post_meta(get_the_ID(),'bsm_book_category',true);
			$bsm_book_author	= get_post_meta(get_the_ID(),'bsm_book_author',true);
			$post_date			= get_the_date();
			
			$class_bsm_functions = new class_bsm_functions();
			
			$bsm_sharer_name 	= $class_bsm_functions->bsm_get_sharer_name($bsm_user_id);
			$bsm_category_name	= $class_bsm_functions->bsm_get_category($bsm_book_category);
			
			if ( $sort_by == 'sharer' && $data != $bsm_sharer_name )  continue;
			if ( $sort_by == 'category' && $data != $bsm_category_name )  continue;
			if ( $sort_by == 'date' && $data != $post_date )  continue;
				
			$html .= 
			'<div class="single">
				<div class="book-thumb"><img src="'.bsm_plugin_url .'themes/book-list/flat/images/book.png" /> </div>
				<div class="title"><a href="'.$bsm_book_url.'">'.$bsm_book_name.'</a></div>
				
				<div class="short_content">'.__('
					This Book is shared By - '.$bsm_sharer_name.'. 
					Book Category - '.$bsm_category_name.'.'
				,'bsm').'</div>
						
				<div class="bsm_button_small bsm_button_green book_list_meta a">
					<a href="?sort_by=available&data=available">'.__('Available','bsm').'</a></div>
				<div class="bsm_button_small bsm_button_navy_blue book_list_meta a">
					<a href="?sort_by=sharer&data='.$bsm_sharer_name.'">'.__($bsm_sharer_name,'bsm').'</a></div>
				<div class="bsm_button_small bsm_button_light_violate book_list_meta a">
					<a href="?sort_by=category&data='.$bsm_category_name.'">'.__($bsm_category_name,'bsm').'</a></div>
				<div class="bsm_button_small bsm_button_sky_blue book_list_meta a">
					<a href="?sort_by=date&data='.$post_date.'">'.__($post_date,'bsm').'</a></div>
					
			</div>';
		endwhile;
	
		$html .= '<div class="paginate">';
		$big = 999999999;
		$html .= paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '?paged=%#%',
			'current' => max( 1, $paged ),
			'total' => $wp_query->max_num_pages
			) );
		$html .= '</div >';	
	
	wp_reset_query();
	else:
		$html .= __('No job found','job_bm');	
	endif;		
				
	$html .= '</div>'; // .book-list	


