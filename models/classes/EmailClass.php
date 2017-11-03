<?php
	$stylesheet = 
	"
		<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
		<style type='text/css'>
			body { color: #FFF; font-family: 'Raleway', sans-serif; }
			.line { border-top: solid 1px #CCCCCC; }
			.logo { padding-top:6px }
			h1 { font-size: 25px; color: #002F56; text-transform:uppercase; }
			p { font-size: 15px; color: #8c8a8a; line-height: 23px; }
			a { color: #00B9F1; text-decoration: none; }
			a:hover { color: #002F56; }
			.email_container { width: 660px;  margin: 0 auto; color: #CCC; -moz-box-shadow: 0 0 5px #888; -webkit-box-shadow: 0 0 5px#888; box-shadow: 0 0 5px #888; }
			.header { width: 660px; border-top-left-radius: 5px; border-top-right-radius: 5px; }
			.email_content { width: 660px;  margin: auto 0; color: #CCC; }
			.button { background-color: #002F56; padding: 12px;vborder-radius: 5px; margin: 20px 0; -moz-border-radius: 5px; -webkit-border-radius: 5px; cursor:pointer; color:#ffffff !important; font-size:12px; font-weight: bolder; text-decoration:none; border: none; }
			.button:hover { background-color: #00B9F1; }
			.note { border-top: solid 1px #CCCCCC; border-bottom: solid 1px #CCCCCC; margin: 20px 0; font-family: 'Raleway', sans-serif; }
			.note p { padding 20px 0; margin: 20px 0; color: #800080; line-height: 20px; font-size: 12px; }
			.footer { width: 660px; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px; }
		</style>
	";
	
	$header = 
	"
		<body style='display: table; table-layout: fixed; width:100%; min-width:700px; background:#314b72;'>
			<div class='email_container'>
				<div class='header'>
					<img src='".IMAGES."others/account-activation.png' width='660px' />
				</div>
			
				<div class='email_content'>
	";
	
	$footer = "
			<div class='footer'>
				<img src='".IMAGES."others/footer-banner.png' width='660px' />
	";
	
	class EmailClass
	{
		
		public function sendEmail( $userEmail, $from, $subject, $messageBody ) 
		{
			$headers = "From: " . $from . "\r\n";
			$headers .= "Reply-To: ". $from . "\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			
			//send email
			if( mail( $userEmail, $subject, $messageBody, $headers ) == TRUE ){ return TRUE; } else{ return FALSE; }
		}
	
		public function emailTemplate( $templateName, $userEmail = "", $firstName = "", $lastName = "", $code = "" ) 
		{
			global $stylesheet;
			global $header;
			global $footer;
			 
			// Prepaer the message body for the account verification email
			if ( $templateName == "Account Verification" ) 
			{
				$message = "
				{$stylesheet}
				{$header}
						<div style='margin: 0 auto; padding: 0 40px;'>
							<p>Dear {$firstName } {$lastName},</p>
							<p>Welcome to the <a href='".LINK."'>".PRODUCTNAME.".</a> Ghana's leading online payment system! For security reasons, please verify your email to complete your registration.</p><br />
							
							<p>To verify, please click the button below.</p>
							<a href='".LINK."/activation-{$userEmail}-{$code}'><button class='button'>Activate your account now</button></a>
							
							<br /><div class='line'></div><br />
							
							<p>Or copy and paste the link below in to your web browser:</p>
							<p><a href='".LINK."/activation-{$userEmail}-{$code}'>href='".LINK."activation-{$userEmail}-{$code}'</a></p>
							
							<br />
							
							<p>Thanks</p>
							<p>".PRODUCTNAME." team</p>
							
							<div class='note'>
								<p>Note: Please do not reply to this email message. The message was sent from a notification-only address that cannot accept incoming emails</p>
							</div>
						</div>													
					</div>
				{$footer}";
				return $message;
			} 
			
			// Prepaer the message body for the password reset request email 
			else if ( $templateName == "Reset Password" ) 
			{
				// template asking the user to activate their account.
				$message = "
				{$stylesheet}
				{$header}
						<div style='margin: 0 auto; padding: 0 40px;'>
							<p>Dear {$firstName } {$lastName},</p>
							<p>You have recently requested to reset your password for your account at <a href='".LINK."'>".PRODUCTNAME."</a>.</p>
							
							<br />
							
							<p>Click the button below to reset your password</p>
							<a href='".LINK."/reset-password-{$userEmail}-{$code}'><button class='button'>Reset Your Password Now</button></a>
							<!-- <a href='".WWW."reset-password-{$userEmail}-{$code}'><button class='button'>Reset Your Password Now</button></a> -->
							
							<br />
							
							<p>Or copy and paste the link below in to your web browser:</p>
							<p><a href='".LINK."/reset-password-{$userEmail}-{$code}'>href='".LINK."/reset-password-{$userEmail}-{$code}'</a></p>
							<!-- <p><a href='".WWW."reset-password-{$userEmail}-{$code}'>href='".WWW."reset-password-{$userEmail}-{$code}'</a></p> -->
							
							<br />
							
							<p>If you did not request a password reset, please ignore this email or reply to let us now. This password link is only valid for the next 30 minutes.</p>
							
							<br />
							
							<p>Thanks</p>
							<p>".PRODUCTNAME." team</p>
							
							<p><strong>P.S.</strong> We also love hearing from you and helping you with any issues you have. Please reply to this email if you want to ask a question or just say hi.</p>
							
						</div>													
					</div>
				{$footer}";
				return $message;
			} 
		} 
		// Email_Template end.
		
	} // Class end.
	
	$EmailClass = new EmailClass();
?>