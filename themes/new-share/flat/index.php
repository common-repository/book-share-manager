<?php

/*
* @Author 		Jaed Mosharraf
* Copyright: 	2015 Jaed Mosharraf
*/

if ( ! defined('ABSPATH')) exit;  // if direct access
	
	//session_start();
	
	$html .= 	
	'<div id="bsm_start_share" class="bsm-want-to-share-button">
		<span class="bsm_button_medium bsm_button_green"> '.__('Share Now','bsm').' </span>
	</div>
				
	<div class="bsm_want_to_share_pop_up_open">
		<div class="bsm_pop_up_input bsm_form">
			<div class="bsm_pop_up_close">X</div>
			
			<div class="bsm_pop_up_header">
				<p class="bsm_header_message"><span>
					<i class="fa fa-thumbs-o-up"></i> Great !!! 
				</p>
			</div>

			<input class="bsm_input_item bsm_input_id" type="number" name="bsm_user_id" value="100904100" placeholder="ID Number (Required)"/> 
			
			<div id="bsm_share">
				<input class="bsm_input_item bsm_input_pin" type="number" name="bsm_user_pin" value="" placeholder="PIN Code (Required)" max=5/> 
				
				<select class="bsm_input_item" name="bsm_book_category" id="bsm_book_category">
					<option value="" selected="selected">Select Book Category</option>
					<option value="1">Computer Science and Engineering</option>
					<option value="2">Electronics and Telecommunications</option>
					<option value="3">Math</option>
					<option value="4">Physics</option>
					<option value="5">Women and Gender Studies</option>
					<option value="6">Accounting and Information System</option>
				</select>
				
				<input class="bsm_input_item bsm_input_name" type="text" name="bsm_book_name" value="" placeholder="Book Name (Required)"/> 
				<input class="bsm_input_item bsm_input_name" type="text" name="bsm_author_name" value="" placeholder="Author Name (Required)"/> 
			
				<br><br>
				<span style="color:#1565FF; padding:5px;">
					'.__('By clicking below, You agree with our Terms','bsm').'
				</span>	
				<br>
				<div class="bsm_share bsm_button_medium bsm_button_green">Share Now <i class="fa fa-share-alt"></i></div>			
			</div>
			
			
			<div id="bsm_join">
				<input class="bsm_input_item bsm_input_name" type="text" name="bsm_join_sharer_name" value="Jaed" placeholder="Full Name (Required)"/> 
				<input class="bsm_input_item bsm_input_pin" type="number" name="bsm_join_sharer_pin" value="12345" placeholder="Set a PIN Code (Required)" max=5/> 
				
				<select class="bsm_input_item" name="bsm_sharer_dept" id="bsm_join_sharer_dept">
					<option value="" selected="selected">Select Your Department</option>
					<option value="1">Computer Science and Engineering</option>
					<option value="2">Electronics and Telecommunications</option>
					<option value="3">Math</option>
					<option value="4">Physics</option>
					<option value="5">Women and Gender Studies</option>
					<option value="6">Accounting and Information System</option>
				</select>
							
				<input class="bsm_input_item bsm_input_email" type="email" name="bsm_join_sharer_email" value="jaedm97@gmail.com" placeholder="Email (Required)"/>
				<input class="bsm_input_item bsm_input_phone" type="number" name="bsm_join_sharer_phone" value="01727967674" placeholder="Your Phone"/>
						
				<br><br>
				<span style="color:#1565FF; padding:5px;">
					'.__('By clicking below, You agree with our Terms','bsm').'
				</span>	
				<br>
				<div class="bsm_join bsm_button_medium bsm_button_green">Join <i class="fa fa-user-plus"></i></div>			
			</div>
			
			
			
			<br><br>
			<div class="bsm_form_1_next bsm_button_medium bsm_button_green">Next <i class="fa fa-arrow-right"></i></div>
			
		</div>
		
		<div class="bsm_pop_up_input bsm_join_success">
			<div class="bsm_pop_up_header">
				<p class="bsm_header_message"><span>
					<i style="font-size:100px;" class="fa fa-check-circle-o"></i> <br>
					Success<br>
					Please check your email
				</p>
			</div>
			<div class="bsm_success_close bsm_button_medium bsm_button_green">Click here to Close</div>
		</div>
		
		<div class="bsm_pop_up_input bsm_share_success">
			<div class="bsm_pop_up_header">
				<p class="bsm_header_message"><span>
					<i style="font-size:100px;" class="fa fa-check-circle-o"></i> <br>
					Success<br>
					Thank You for Sharing Book
				</p>
			</div>
			<div class="bsm_success_close bsm_button_medium bsm_button_green">Click here to Close</div>
		</div>
		
		
	</div>';
	
	
	
	