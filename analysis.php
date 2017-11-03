<?php
	$pageName = "Analysis"; 																				// Set the page name

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
                    <div class="inbox">
                        <div class="row-fluid">
                            <div class="span6">
                                <div class="widget">
                                    <div class="wTitle">
                                        <h5>Simple chartline</h5>
                                    </div>

                                    <div class="wContent" align="center">
                                        <div class="wContentInner">
                                            <div class="chart" id="chartLine01"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="span6">
                                <div class="widget">
                                    <div class="wTitle">
                                        <h5>Another chartline</h5>
                                    </div>

                                    <div class="wContent" align="center">
                                        <div class="wContentInner">
                                            <div class="chart" id="chartLine02"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row-fluid">
                            <div class="span6">
                                <div class="widget">
                                    <div class="wTitle">
                                        <h5>Pie chart</h5>
                                    </div>

                                    <div class="wContent" align="center">
                                        <div class="wContentInner">
                                            <div class="chart" id="chartPie01"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="span6">
                                <div class="widget">
                                    <div class="wTitle">
                                        <h5>Live updating chart</h5>
                                    </div>

                                    <div class="wContent" align="center">
                                        <div class="wContentInner">
                                            <div class="chart" id="liveChart01"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    </div>

					<div class="divider"><div><span></span></div></div>
				</div>
				<!-- End inner content -->
                </div>
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