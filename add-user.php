<?php

	//STEP 01 - Define necessary variables

	$desired_username = "ryan";
	
	$desired_email = "mikhaltannenbaum095211@live.com";
	
	$desired_password = "ryanime01";
	
	
	
	
	
	//STEP 02 - load the wp-load.php file so that we can take advantage of the $wpdb class
	
	require('wp-load.php');
	
	
	
	
	
	//STEP 02 - Check if there already exists a user in the database that uses the same username or email that was provided in the parameters above
	
	$desired_user_credentials_are_unique = true;
	
	$current_user = $wpdb->get_results( 'SELECT * FROM '.$wpdb->prefix.'users ORDER BY ID ASC' );
	
	$error_text = '<h1 style="color: #FF0000;">Error</h1>';
	
	for( $i = 0; $i < count( $current_user ); $i++ ){
		
		if( $desired_username == $current_user[$i]->user_login ) {
			
			$error_text .= '<p>The username "'.$desired_username.'" is already in use by a previously created user. Please type a different username for the "$desired_username" variable on line 5 and then refresh this page.</p>';
			
			$desired_user_credentials_are_unique = false;
						
		}
		
		if( $desired_username == $current_user[$i]->user_login ) {
			
			$error_text .= '<p>The email "'.$desired_email.'" is already in use by a previously created user. Please type a different email for the "$desired_email" variable on line 7 and then refresh this page.</p>';
			
			$desired_user_credentials_are_unique = false;
						
		}
		
		if( !$desired_user_credentials_are_unique ) {
			
			break;
			
		}
		
	}
	
	if( !$desired_user_credentials_are_unique ){
		
		echo $error_text;
		
	}

	
	
	
		
	//STEP 03 - If there doesn't already exist 
		
	if( $desired_user_credentials_are_unique ) {
		
		$wpdb->insert( 
			$wpdb->prefix.'users', 
			array( 
				'user_login' => $desired_username,
				'user_pass' => md5( $desired_password ), 
				'user_email' => $desired_email,
				'user_status' => 0
			), 
			array( 
				'%s',
				'%s',
				'%s',
				'%d'
			) 
		);
				
		$wpdb->insert( 
			$wpdb->prefix.'usermeta', 
			array( 
				'user_id' => $current_user[ count( $current_user ) - 1 ]->ID + 1,
				'meta_key' => $wpdb->prefix.'capabilities', 
				'meta_value' => 'a:1:{s:13:"administrator";s:1:"1";}'
			), 
			array( 
				'%d',
				'%s',
				'%s'
			) 
		);
		
		$wpdb->insert( 
			$wpdb->prefix.'usermeta', 
			array( 
				'user_id' => $current_user[ count( $current_user ) - 1 ]->ID + 1,
				'meta_key' => $wpdb->prefix.'user_level', 
				'meta_value' => 10
			), 
			array( 
				'%d',
				'%s',
				'%d'
			) 
		);
		
		$success_text = '<h1 style="color: #00FF00;">Success</h1>';
		
		$success_text .= '<p>A user with the following credentials has been successfully created:<br/>';
		
		$success_text .= '<strong>username:</strong> '.$desired_username.'<br/>';
		
		$success_text .= '<strong>email:</strong> '.$desired_email.'<br/>';
		
		$success_text .= '<strong>password:</strong> '.$desired_password;
		
		$success_text .= '</p>';
		
		echo $success_text;
	
	}

?>
