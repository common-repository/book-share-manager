<?php

/*
* @Author 		Jaed Mosharraf
* Copyright: 	2015 Jaed Mosharraf
*/
	
	$bsm_user_id 		= (int)$_POST['bsm_user_id'];	
	$bsm_sharer_name	= sanitize_text_field($_POST['bsm_sharer_name']);
	$bsm_user_pin		= (int)$_POST['bsm_user_pin'];	
	$bsm_sharer_dept	= (int)$_POST['bsm_sharer_dept'];
	$bsm_sharer_email	= sanitize_text_field($_POST['bsm_sharer_email']);
	$bsm_sharer_phone	= sanitize_text_field($_POST['bsm_sharer_phone']);
	
	if ( isValidEmail($bsm_sharer_email) == 'true' || !empty($bsm_user_id) || !empty($bsm_sharer_name) || !empty($bsm_user_pin) || !empty($bsm_sharer_dept) ) 
	{
		$join_post = array(
			'post_type'   => 'bsm_sharer',
			'post_title'    => $bsm_sharer_name,
			'post_status'   => 'publish',
		  
		);
		
		$bsm_join_post_ID = wp_insert_post($join_post, true);

		update_post_meta($bsm_join_post_ID,'bsm_user_id',$bsm_user_id);
		update_post_meta($bsm_join_post_ID,'bsm_user_pin',$bsm_user_pin);
		update_post_meta($bsm_join_post_ID,'bsm_sharer_dept',$bsm_sharer_dept);
		update_post_meta($bsm_join_post_ID,'bsm_sharer_email',$bsm_sharer_email);
		update_post_meta($bsm_join_post_ID,'bsm_sharer_phone',$bsm_sharer_phone);
		
		$html .= 'Please wait <i class="fa fa-refresh fa-spin"></i>';
	}
	else $html .= '<div> Error Data <i class="fa fa-exclamation-triangle"> Try Again </div>';
	
	
	function isValidEmail( $email )
	{
		$pattern = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';
		if ( preg_match( $pattern, $email ) === 1 ) return 'true';
		else return 'false';
	}

?>