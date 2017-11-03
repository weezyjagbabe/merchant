<?php

require_once 'models/classes/EmailClass.php'; 						// Include the emailing class
//require_once 'models/classes/Database.php';
	class UserClass 
	{
		// Check the admin status based on the email address sent
		public function isEmailExist( $email )
		{
			$Database 			= new Database();
			$Database 			-> where( "email", $email );
			$corporate_users 	= $Database -> getOne( "tlr_corporate_users" );
			return $status 		= $corporate_users['email'];
		}

		// Check the admin status based on the email address sent
		public function userStatus( $email )
		{
			$Database = new Database();
			$Database -> where( "email", $email );
			$admin = $Database -> getOne( "tlr_corporate_users" );
			return $status = $admin['status'];
		}

		// Check the admin status based on the email address sent
		public function requestPasswordReset( $email, $code )
        {
            $Database = new Database();
            $cols = Array("email, fullName");
            $Database->where("email", $email);
            $admins = $Database->get("tlr_corporate_users");
            foreach ($admins as $admin) {
                $email = $admin['email'];
                $firstName = substr($admin['fullName'],0,strpos($admin['fullName'],' '));
                $lastName = substr($admin['fullName'],strpos($admin['fullName'],' '));

                $EmailClass = new EmailClass();
                $from = COMPANYEMAIL;
                $subject = 'Reset Password';

                $messageBody = $EmailClass->emailTemplate('Reset Password', $email, $firstName, $lastName, $code);
                if ($EmailClass->sendEmail($email, $from, $subject, $messageBody) == TRUE) {
                    return TRUE;
                } else {
                    return FALSE;
                }

            }
        }

		// Check the admin status based on the email address sent
		public function resetPassword( $newPassword, $email )
		{
			$Database = new Database();
			$Data = Array ( 'password' => $newPassword );
			$Database -> where ( 'email', $email );
			if( $Database -> update ( 'tlr_corporate_users', $Data ) == TRUE ) 
			{ return TRUE; } else { return FALSE; }
		}

		// Prepare the login details and log the admin in
		public function changePassword( $oldPassword, $newPassword, $adminID )
		{
			$Database = new Database();
			$Database -> where ( "adminID", $adminID );
			$admin = $Database -> getOne ( "tlr_corporate_users" );
			
			if ( $adminID == $admin['adminID'] && password_verify( $oldPassword, $admin['password'] ) == TRUE ) 
			{
				$Database = new Database();
				$Data = Array ( 'password' => $newPassword );
				$Database -> where ( 'adminID', $adminID );
				if( $Database -> update ( 'tlr_corporate_users', $Data ) == TRUE ) 
				{ return TRUE; } else { return FALSE; } 
			} 
			else { return FALSE; }
		}
		
		// Generate activation code
		public function editAccount( $adminTitle, $firstName, $lastName, $adminGender, $adminDOB, $adminRegion, $adminCity, $adminResAddress, $adminPhone, $adminID ) 
		{ 
			$Database = new Database();
			$Data = Array ( 'adminTitle' => $adminTitle, 'firstName' => $firstName, 'lastName' => $lastName, 'adminGender' => $adminGender, 'adminDOB' => $adminDOB, 'adminRegion' => $adminRegion, 'adminCity' => $adminCity, 'adminResAddress' => $adminResAddress, 'adminPhone' => $adminPhone );
			$Database -> where ( 'adminID', $adminID );
			if( $Database -> update ( 'tlr_corporate_users', $Data ) == TRUE ) 
			{ return TRUE; } else { return FALSE; }
		}

		// Prepare the login details and log the admin in
		public function logInUser( $email, $password )
		{
			$Database 			= new Database();
			$Database 			-> where ( "email", $email );
			$corporate_user 	= $Database -> getOne ( "tlr_corporate_users" );
			
			if ( $email == $corporate_user['email'] && password_verify( $password, $corporate_user['password'] ) == TRUE ) 
			{ $_SESSION['userSession'] = $corporate_user['acHolderKey']; return TRUE; }
			else { return FALSE; }
		}
		
		// Check if the admin is already logged in
		public function userIsLoggedin()
		{
			if( isset( $_SESSION['userSession'] ) ) { return TRUE; }
		}
		
		// Logout the admin
		public function logUserOut()
		{
			session_destroy();
			unset( $_SESSION['userSession'] );
			return TRUE;
		}
		
		// Redirect the admin to the appropriate page
		public function redirect( $url )
		{
			echo '<script>location.href=\''.$url.'\';</script>';
		}
		
		// Generate activation code
		public function generateCode( $lenth = 40 ) 
		{ 
			$range		=	array_merge( range( 'A', 'Z' ), range( 'a', 'z' ), range( 0, 9 ) ); 
			$out		=	''; 
		    for( $c = 0; $c < $lenth; $c++ ) 
		    { 
		       $out .= $range[mt_rand( 0, count( $range ) -1 ) ]; 
		    } 
		    return $out; 
		}
		
		// Encrypt the admin password
		public function encryptPassword( $password )
		{
			$password = password_hash( $password, PASSWORD_DEFAULT );
			return $password;
		}

	}
	
	$UserClass = new UserClass();																	// Create a new user object
//	if ( isset( $_SESSION['userSession'] ) && !empty( $_SESSION['userSession'] ) )
//	{
//		$Database = new Database();
//		$Database -> where( "acHolderKey", $_SESSION['userSession'] );
//		$admin = $Database -> getOne( "tlr_corporate_users" );
//		return $providerKey = $admin['providerKey'];
//	}


?>