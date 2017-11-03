<?php
	$pageName = "Logout";																					// Set the page name
		
	require_once './models/classes/Configurations.php';														// Include the project configurations file
	require_once './controllers/userController.php';														// Include the user controller file
	require_once './controllers/documentHeader.php';														// Include the document header
		
	$UserClass -> logUserOut(); $UserClass -> redirect( 'sign-in' );										// Log the user out and redirect to home page
	if( !isset( $_SESSION['userSession'] ) ) { $UserClass -> redirect( 'sign-in' ); }						// If the user seeion is not set, redirect to home page
?>