/*
* @Author 		Jaed Mosharraf
* Copyright: 	2015 Jaed Mosharraf
*/

jQuery(document).ready(function($)
	{
			
		$(document).on('click', '.bsm_pop_up_close', function()
			{
				$('.bsm_want_to_share_pop_up_open').fadeOut();
				location.reload();
			})	
		
		$(document).on('click', '.bsm_success_close', function()
			{
				$('.bsm_want_to_share_pop_up_open').fadeOut();
				location.reload();
			})	
	
		$(document).on('click', '#bsm_start_share', function()
			{
				$('.bsm_want_to_share_pop_up_open').fadeIn();
			})
		
		
		
		$(document).on('click', '.bsm_form_1_next', function()
			{
				var bsm_user_id 	= $('input[name=bsm_user_id]').attr('value');
			
				if ( bsm_user_id.length < 7 ) $('input[name=bsm_user_id]').first().focus();
				
				if ( bsm_user_id.length >= 7 ) 
				{
					$.ajax(
						{
					type: 'POST',
					context: this,
					url:bsm_ajax.bsm_ajaxurl,
					data: {
						"action": "bsm_ajax_share_check_login", 
						"bsm_user_id":bsm_user_id,
						
					},
					success: function(data)
						{	
							var html = JSON.parse(data)
						
							var found 			= html['found'];
							var found_msg 		= html['found_msg'];
							var not_found_msg 	= html['not_found_msg'];
							
							if ( found == 'yes' )
							{
								$(this).html(found_msg);
								setTimeout(function()
								{ 
									$('.bsm_form_1_next').css("display","none");
									$('#bsm_share').css("display","block");
								}, 4000);
							}
							if ( found == 'no' )
							{
								$(this).html(not_found_msg);								
								setTimeout(function()
								{ 
									$('.bsm_form_1_next').css("display","none");
									$('#bsm_join').css("display","block");
								}, 4000);
							}		 
						}
					});
				}
			})
			
			
			
//============================Join Action Start===================================//

			$(document).on('click', '.bsm_join', function()
			{	
				var bsm_user_id 	 = $('input[name=bsm_user_id]').attr('value');
				var bsm_sharer_name	 = $('input[name=bsm_join_sharer_name]').attr('value');
				var bsm_user_pin 	 = $('input[name=bsm_join_sharer_pin]').attr('value');
				var bsm_sharer_dept  = $('#bsm_join_sharer_dept :selected').val();
				var bsm_sharer_email = $('input[name=bsm_join_sharer_email]').attr('value');
				var bsm_sharer_phone = $('input[name=bsm_join_sharer_phone]').attr('value');

				if ( bsm_user_id.length < 7 ) $('input[name=bsm_user_id]').first().focus();
				if ( bsm_sharer_name.length < 2 ) $('input[name=bsm_sharer_name]').first().focus();
				if ( bsm_user_pin.length != 5 ) $('input[name=bsm_user_pin]').first().focus();
				if ( bsm_sharer_dept.length == 0 ) $('select').first().focus();
				if( !isValidEmailAddress( bsm_sharer_email ) ) $('input[name=bsm_sharer_email]').first().focus();
				
				if ( bsm_user_id.length >= 7 && bsm_sharer_name.length >= 2 && bsm_user_pin.length == 5 && bsm_sharer_dept != 0 && isValidEmailAddress( bsm_sharer_email ) ) 
				{
					$.ajax(
						{
					type: 'POST',
					context: this,
					url:bsm_ajax.bsm_ajaxurl,
					data: {
						"action": "bsm_ajax_join", 
						"bsm_user_id":bsm_user_id,
						"bsm_sharer_name":bsm_sharer_name,
						"bsm_user_pin":bsm_user_pin,
						"bsm_sharer_dept":bsm_sharer_dept,
						"bsm_sharer_email":bsm_sharer_email,
						"bsm_sharer_phone":bsm_sharer_phone,
						
					},
					success: function(data)
						{					
							$(this).html(data);
							setTimeout(function()
							{ 
								$('.bsm_want_to_share_pop_up_open .bsm_form').css("display","none");
								$('#bsm_report_form_3').css("display","none");
								$('.bsm_report_header').css("display","none");
								$('#bsm_report_form_2').css("display","none");
								$('.bsm_form_1_next').css("display","none");
								$('.bsm_want_to_share_pop_up_open .bsm_join_success').css("display","block");
								$('#bsm_report_form_6').css("display","block");
							}, 3000);
						}
					});
				}
			})
//============================Join Action End ===================================//

			
			
			$(document).on('click', '.bsm_share', function()
			{	
				var bsm_user_id 	 	= $('input[name=bsm_user_id]').attr('value');
				var bsm_user_pin 	 	= $('input[name=bsm_user_pin]').attr('value');
				var bsm_book_category	= $('#bsm_book_category :selected').val();
				var bsm_book_name 		= $('input[name=bsm_book_name]').attr('value');
				var bsm_author_name 	= $('input[name=bsm_author_name]').attr('value');

				if ( bsm_user_id.length < 7 ) $('input[name=bsm_user_id]').first().focus();
				if ( bsm_user_pin.length != 5 ) $('input[name=bsm_user_pin]').first().focus();
				if ( bsm_book_category.length == 0 ) $('select').first().focus();
				if ( bsm_book_name.length < 2 ) $('input[name=bsm_book_name]').first().focus();
				if ( bsm_author_name.length < 2 ) $('input[name=bsm_author_name]').first().focus();
				
				if ( bsm_user_id.length >= 7 && bsm_user_pin.length == 5 && bsm_book_category.length > 0 && bsm_book_name.length >= 2 && bsm_author_name.length >= 2 ) 
				{
					$.ajax(
						{
					type: 'POST',
					context: this,
					url:bsm_ajax.bsm_ajaxurl,
					data: {
						"action": "bsm_ajax_share_done", 
						"bsm_user_id":bsm_user_id,
						"bsm_user_pin":bsm_user_pin,
						"bsm_book_category":bsm_book_category,
						"bsm_book_name":bsm_book_name,
						"bsm_author_name":bsm_author_name,
						
					},
					success: function(data)
						{
alert(data);							
							var html = JSON.parse(data)
						
							var share_success 	= html['share_success'];
							var share_error 	= html['share_error'];
							
							if ( share_success )
							{
								$(this).html(share_success);
								setTimeout(function()
								{ 
									$('.bsm_want_to_share_pop_up_open .bsm_form').css("display","none");
									$('.bsm_want_to_share_pop_up_open .bsm_share_success').css("display","block");
								}, 3000);
							}
							if ( share_error )
							{
								$(this).html(share_error);
							}
						}
					});
				}

			})

//================================ Extra Function =========================


	});
	
	function isValidEmailAddress(emailAddress) {
					var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
					return pattern.test(emailAddress);
				}
				
  function maxLengthCheck(object)
  {
    if (object.value.length > object.maxLength)
      object.value = object.value.slice(0, object.maxLength)
  }
