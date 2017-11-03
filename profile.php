<?php
	$pageName = "Dashboard"; 																				// Set the page name

	require_once './models/classes/Configurations.php'; 													// Include the configurations class
	require_once './controllers/userController.php'; 														// Include the user processor file
    require_once './models/classes/TransactionClass.php';
	if( !$UserClass -> userIsLoggedin() ) { $UserClass -> redirect( 'sign-in' ); } 							// If user is not logged in, redirect to signin page
	
	require_once './controllers/documentHeader.php'; 														// Include the document header
?>
	
	<!-- Begin page body -->
	<body>

		<!-- Begin all content wrapper -->
		<div class="mainContainer">

			<!-- Begin the page header, logo and left navigation section -->
			<?php
				require_once './views/pageHeaderLeftNav.php'; 												// Include the page header, logo and left navigation
			?>
			<!-- End the page header, logo and left navigation section -->

			<!-- Begin content wrapper -->
			<div class="content">
			
				<!-- Begin page user menu -->
				<?php
					require_once './views/pageUserMenu.php'; 												// Include the page user menu
				?>
				<!-- End page user menu -->

				<!-- Begin inner content -->
				<div class="contentInner">

                    <div class="divider"><div><span></span></div></div>

                    <div class="wContent">
                        <div class="adressScroll">
                            <?php $companyDetails = $TransactionClass->getCompanyDetails();
                            foreach ($companyDetails as $detail){
                            ?>
                            <div class="formField">
                                <div class="adressAvatar">

                                    <img src="<?php echo $detail['companyLogo'] ?>" alt="">
                                </div>
                                <div class="adressField">

                                    <address>
                                        <strong><?php echo $detail['companyName']; ?></strong><br>
                                        <?php echo str_replace(',','<br>',$detail['companyAddress'])?><br>
                                        <abbr title="Phone">Phone:</abbr> <?php echo $detail['companyPhone'] ?><br>
                                        <a href="mailto:#"><?php echo $detail['companyEmail']; ?></a>
                                    </address>


                                </div>
                                <div class="doActions fRight" align="right">
                                    <a href="#" rel="tipsyS" title="Edit Details" class="ctrlButton"><img src="models/img/icons/14x14/pen1.png" alt=""></a>
                                    <a href="profile" rel="tipsyS" title="Open profile" class="ctrlButton"><img src="models/img/icons/14x14/member2.png" alt=""></a>
                                    <div>
                                        <span class="label bOlive">User online</span>
                                    </div>
                                </div>
                                <div class="adressField">
                                <address>
                                    <br><br>
                                    <strong>About <?php echo $detail['companyName']; ?></strong><br>
                                    <span><?php echo $detail['aboutProvider']?></span>
                                </address>
                                </div>
                                <div class="clearfix"></div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
					<div class="divider"><div><span></span></div></div>
				</div>
				<!-- End inner content -->

			</div>
			<!-- End content wrapper -->

		</div>
		<!-- Ednd all content wrapper -->

		<!-- Begin the page scripts -->
		<?php
			require_once './controllers/pageScripts.php'; 													// Include the page scripts
		?>
		<!-- Begin the page scripts -->
    
	</body>
	<!-- End page body -->
	
</html>