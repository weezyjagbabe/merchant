<?php
	$pageName = "Log In"; 																					// Set the page name
	
	require_once './models/classes/Configurations.php'; 													// Include the project configuration file
	require_once './controllers/userController.php';														// Include the user controller file
	
	if( $UserClass -> userIsLoggedin() != "" ) { $UserClass -> redirect( 'dashboard' ); }					// If user is already logged in, redirect to dashboard
	
	require_once './controllers/documentHeader.php'; 														// Include the document header
?>

	<!-- Begin page body -->
	<body>

		<!-- Begin all content wrapper -->
		<div class="mainContainer">
			<div class="loginWrap">
				<img src="./models/img/logomerchant2.png" alt="">
				<div class="loginContainer">
				
					<div class="loginHeader">
						<h5><img src="./models/img/icons/14x14/lock3.png" alt=""> Login</h5>
						<ul class="titleButtons">
							<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><img src="./models/img/icons/14x14/cog2.png" alt=""></a>
								<ul class="dropdown-menu pull-right">
									<li><a href="reset-password">Forgot password?</a></li>
									<li><a href="contact-us">Contact support</a></li>
								</ul>
							</li>
						</ul>
					</div>
					
					<?php if( isset( $message ) ) { echo $message; } ?>
					
					<!-- Begin form contents -->
					<form id="validate" action="" method="post" >
						<label for="email">Email</label>
						<div class="inputField">
							<input type="text" id="email" name="email" placeholder="email" required>
							<img src="./models/img/icons/14x14/envlope2.png" alt="">
						</div>
                
						<label for="password">Password</label>
						<div class="inputField">
							<input type="password" id="password" name="password" placeholder="password" required>
							<img src="./models/img/icons/14x14/lock3.png" alt="">
						</div>
						
						<!-- <div class="checkX">
							<label class="formButton"><input type="checkbox" name="check" checked> <span>Remember me</span></label>
						</div> -->
						
						<button type="submit" name="signIn" class="button noMargin sButton blockButton bSky">Log in</button>
					</form>
					<!-- End form contents -->
					
				</div>
			</div>
		</div>
		<!-- End all content wrapper -->

		<!-- Begin the page scripts -->
		<?php
			require_once './controllers/pageScripts.php'; // Include the page scripts
		?>
		<!-- Begin the page scripts -->
    
	</body>
	<!-- End page body -->
	
</html>