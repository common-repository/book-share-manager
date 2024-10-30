<?php

/*
* @Author 		Jaed Mosharraf
* Copyright: 	2015 Jaed Mosharraf
*/
	
	$bsm_user_id = (int)$_POST['bsm_user_id'];
	
	$wp_query = new WP_Query(
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
				
		if ( $wp_query->found_posts > 0 ) 
			$html['found'] = 'yes';
		else 
			$html['found'] = 'no';
		
?>