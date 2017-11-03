<?php
	require_once './models/classes/Database.php'; 															// Include the configurations class
	require_once './models/functions/functions.php';														// Include the functions file
	require_once './models/classes/UserClass.php'; 															// Include the user class

	// If the POST data is signIn, then do the following
	if( isset( $_POST['signIn'] ) )
	{
		$email					=	$_POST['email'];
		$password				=	$_POST['password'];
		
		// Confirm the passwords entered
		if ( ( $email != NULL ) && ( $password != NULL ) ) 
		{
			// Check if the email address entered already exist in our database
			if( $UserClass -> isEmailExist( $email ) == NULL ) 
			{ return $message = '<div class="alert alert-error"><button class="close" data-dismiss="alert">×</button><strong>Error!</strong> Incorrect email or password.</div>'; }
			
			// Check if the admin account status is active
			elseif( $UserClass -> userStatus( $email ) == 0 )
			{ return $message = '<div class="alert alert-error"><button class="close" data-dismiss="alert">×</button><strong>Error!</strong> Account not activated.</div>'; }

			// Check if the admin account status is suspended
			elseif( $UserClass -> userStatus( $email ) == 2 )
			{ return $message = '<div class="alert alert-error"><button class="close" data-dismiss="alert">×</button><strong>Error!</strong> Account is suspended.</div>'; }

			// Validate the credentials and log the admin in
			else 
			{
				// If the credentials are right, log the admin in
				if ( $UserClass -> logInUser( $email, $password ) == TRUE ) { $UserClass -> redirect('dashboard'); }
				
				// The credentials are wrong. Print the error message on screen
				else { return $message = '<div class="alert alert-error"><button class="close" data-dismiss="alert">×</button><strong>Error!</strong> Incorrect email or password.</div>'; }
			}
		}
		
		// The admin has entered nothing on both fields therefore show the error message
		else 
		{ return $message = '<div class="alert alert-error"><button class="close" data-dismiss="alert">×</button><strong>Error!</strong> Empty email or password field.</div>'; }
	}
	
	// check if the admin has clicked on request update account button and process the form
	if( isset( $_POST['changePassword'] ) )
	{
		$oldPassword			=	$_POST['oldPassword'];
		$newPassword			=	$_POST['newPassword'];
		$confirmNewPassword		=	$_POST['confirmNewPassword'];
		$adminID				=	$_POST['adminID'];
		
		// Check if the old password field is not empty
		if ( !empty( $oldPassword ) ) 
		{
			if ( $newPassword == $confirmNewPassword )
			{
				$newPassword				=	$UserClass -> encryptPassword( $newPassword ); // Encript the password
				if( $UserClass -> changePassword( $oldPassword, $newPassword, $adminID ) == TRUE )
				{ return $message = '<div class="alert alert-success"><button class="close" data-dismiss="alert">×</button><strong>Success!</strong>  Your password is changed.</div>'; }
				else { return $message = '<div class="alert alert-error"><button class="close" data-dismiss="alert">×</button><strong>Error!</strong> Problem occured. Please try again later.</div>'; }
			} 
			else { return $message = '<div class="alert alert-error"><button class="close" data-dismiss="alert">×</button><strong>Error!</strong> The new passwords entered do not match.</div>'; }
		}
		// The old password field is empty therefore send the error message
		else { return $message = '<div class="alert alert-error"><button class="close" data-dismiss="alert">×</button><strong>Error!</strong> The old password field cannot be empty.</div>'; }
	}
	
	// check if the admin has clicked on change password button and process the form
	if( isset( $_POST['requestPasswordReset'] ) )
	{
		$email				=	$_POST['email'];
		
		// Check if the email address entered exist in our database
		if( $UserClass -> isEmailExist( $email ) != NULL ) 
		{
			$code						=	$UserClass -> generateCode(); // Generate activation code
			// Call the reset admin password method
			if( $UserClass -> requestPasswordReset( $email, $code ) == TRUE )
			{ return $message = '<div class="alert alert-success"><button class="close" data-dismiss="alert">×</button><strong>Success!</strong>  Check your email for password reset.</div>'; }
			else { return $message = '<div class="alert alert-error"><button class="close" data-dismiss="alert">×</button><strong>Error!</strong>  A problem occured. Try again later.</div>'; }
		}
		else { return $message = '<div class="alert alert-error"><button class="close" data-dismiss="alert">×</button><strong>Error!</strong> The email address entered does not exist.</div>'; }
	}

	// check if the admin has clicked on reset password button and process the form
	if( isset( $_POST['resetPassword'] ) )
	{
		$newPassword			=	$_POST['newPassword'];
		$confirmNewPassword		=	$_POST['confirmNewPassword'];
		$email				    =	$_POST['userEmail'];
		
		// Check if the new password and the confirm new password are the same
		if ( $newPassword == $confirmNewPassword )
		{
			$newPassword				=	$UserClass -> encryptPassword( $newPassword ); // Encrypt the password
			if( $UserClass -> resetPassword( $newPassword, $email ) == TRUE )
			{ return $message = '<div class="alert alert-success"><button class="close" data-dismiss="alert">×</button><strong>Success!</strong>  Password has been reset. Sign in now</div>'; }
			else { return $message = '<div class="alert alert-error"><button class="close" data-dismiss="alert">×</button><strong>Error!</strong>  A problem occured. Try again later.</div>'; }
		} 
		
		// The passwords entered do not match
		else { return $message = '<div class="alert-box error"><span>Error: </span>The new passwords entered do not match.</div>'; }
	}

	// check if the admin has clicked on request update account button and process the form
	if( isset( $_POST['editAccount'] ) )
	{
		$adminTitle				=	$_POST['adminTitle'];
		$firstName				=	$_POST['firstName'];
		$lastName				=	$_POST['lastName'];
		$adminGender			=	$_POST['adminGender'];
		$adminDOB				=	$_POST['adminDOB'];
		$adminRegion			=	$_POST['adminRegion'];
		$adminCity				=	$_POST['adminCity'];
		$adminResAddress		=	$_POST['adminResAddress'];
		$adminPhone				=	$_POST['adminPhone'];
		$adminID				=	$_POST['adminID'];
		
		if ( $UserClass -> editAccount( $adminTitle, $firstName, $lastName, $adminGender, $adminDOB, $adminRegion, $adminCity, $adminResAddress, $adminPhone, $adminID ) == TRUE )
		{ return $message = '<div class="alert alert-success"><button class="close" data-dismiss="alert">×</button><strong>Success!</strong>  Your account has been updated.</div>'; } 
		else{ return $message = '<div class="alert alert-error"><button class="close" data-dismiss="alert">×</button><strong>Error!</strong> There was a problem updating your account. Try again later.</div>'; } 
	}
?>