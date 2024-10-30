<?php

/*
* @Author 		Jaed Mosharraf
* Copyright: 	2015 Jaed Mosharraf
*/
	
	$bsm_user_id 		= (int)$_POST['bsm_user_id'];	
	$bsm_user_pin		= (int)$_POST['bsm_user_pin'];	
	$bsm_book_category	= (int)$_POST['bsm_book_category'];
	$bsm_book_name		= sanitize_text_field($_POST['bsm_book_name']);
	$bsm_author_name	= sanitize_text_field($_POST['bsm_author_name']);
	
	if ( !empty($bsm_user_id) || !empty($bsm_sharer_name) || !empty($bsm_book_category) || !empty($bsm_book_name) || !empty($bsm_author_name)  ) 
	{
		if ( fn_check_user( $bsm_user_id, $bsm_user_pin ) == 1 )
		{
			$share_post = array(
				'post_type'   => 'bsm_book',
				'post_title'    => $bsm_book_name,
				'post_status'   => 'publish',
			  
			);
			
			$bsm_share_book_post_ID = wp_insert_post($share_post, true);
			
			update_post_meta($bsm_share_book_post_ID,'bsm_user_id',$bsm_user_id);
			update_post_meta($bsm_share_book_post_ID,'bsm_book_category',$bsm_book_category);
			update_post_meta($bsm_share_book_post_ID,'bsm_book_author',$bsm_author_name);
			
			$html['share_success'] = 'Please wait <i class="fa fa-refresh fa-spin"></i>';
		}
		else $html['share_error'] = '<div> Invalid PIN <i class="fa fa-exclamation-triangle"> Try Again </div>'; 
	}
	else $html['share_error'] = '<div> Error Data <i class="fa fa-exclamation-triangle"> Try Again </div>';
	
	
	function fn_check_user($bsm_user_id, $bsm_user_pin)
	{
		$wp_query = new WP_Query(
				array (
				'post_type' => 'bsm_sharer',
				'post_status' => 'publish',					
				'meta_query' => array(
					array(
						'key' => 'bsm_user_id',
						'value' => $bsm_user_id,
					),
					array(
						'key' => 'bsm_user_pin',
						'value' => $bsm_user_pin,
					),
				) ));
					
			if ( $wp_query->found_posts > 0 ) return 1;
			else return 0;
	}
?>