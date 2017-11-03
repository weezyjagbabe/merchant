<?php
	$pageName = "Transactions"; 																			// Set the page name

	require_once './models/classes/Configurations.php'; 													// Include the configurations class
	require_once './controllers/userController.php'; 														// Include the user processor file
	require_once './models/classes/TransactionClass.php';
	if( !$UserClass -> userIsLoggedin() ) { $UserClass -> redirect( 'sign-in' ); } 							// If user is not logged in, redirect to signin page


    if( isset( $_GET["t"] ) ) { $serviceType = $_GET["t"]; }
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

                        <div class="sWidgets" align="center">
                            <div class="sWidget">
                                <div class="sparkContainer">
                                    <span>
                                        <?php
                                        $zero = 0;
                                        if ( !empty( $serviceType ) ) {
                                            $stuff = $TransactionClass ->getTotalAmount($serviceType);
                                            if(($stuff['total'] > 0)) {
                                                echo '<strong>GH¢ '.$stuff['total'].'</strong>';
                                            }else{
                                                echo '<strong>GH¢ '.$zero.'.00</strong>';
                                            }
                                        }else{
                                            $stuff = $TransactionClass ->getDefaultTotalAmount();
                                            if(($stuff['total'] > 0)) {
                                                echo '<strong>GH¢ '.$stuff['total'].'</strong>';
                                            }else{
                                                echo '<strong>GH¢ '.$zero.'.00</strong>';
                                            }
                                        }?>

                                    </span>
                                    <div class="sparklineBar"></div>
                                </div>
                                <span><a href="#">Total - Transacted <i></a></i></span>
                            </div>
                            <div class="sWidget">
                                <div class="sparkContainer">
                                    <span>
                                            <?php
                                            $zero = 0;
                                            if ( !empty( $serviceType ) ) {
                                                $stuff = $TransactionClass ->getTransactionCount($serviceType);
                                                if(($stuff['count'] > 0)) {
                                                    echo '<strong>'.$stuff['count'].' Transactions</strong>';
                                                }else{
                                                    echo '<strong>'.$zero.'</strong>';
                                                }
                                            }else{
                                                $stuff = $TransactionClass ->getDefaultTransactionCount();
                                                if(($stuff['count'] > 0)) {
                                                    echo '<strong>'.$stuff['count'].' Transactions</strong>';
                                                }else{
                                                    echo '<strong>'.$zero.'</strong>';
                                                }
                                            }?>

                                        </span>
                                    <div class="sparklinePie"></div>
                                </div>
                                <span> No of Transactions<i></i></span>
                            </div>
                            <div class="sWidget">
                                <div class="sparkContainer">
                                    <span>
                                            <?php
                                            $zero = 0;
                                            if ( !empty( $serviceType ) ) {
                                                $stuff = $TransactionClass ->getTotalBilling($serviceType);
                                                if(($stuff['billing'] > 0)) {
                                                    echo '<strong>GH¢ '.$stuff['billing'].'</strong>';
                                                }else{
                                                    echo '<strong>GH¢ '.$zero.'.00</strong>';
                                                }
                                            }else{
                                                $stuff = $TransactionClass ->getDefaultTotalBilling();
                                                if(($stuff['billing'] > 0)) {
                                                    echo '<strong>GH¢ '.$stuff['billing'].'</strong>';
                                                }else{
                                                    echo '<strong>GH¢ '.$zero.'.00</strong>';
                                                }
                                            }?>

                                    </span>
                                    <div class="sparklineBar03"></div>
                                </div>
                                <span><a href="#">Total - Billing<i></i></a></span>
                            </div>
                            <div class="sWidget">
                                <div class="sparkContainer">
                                    <span>
                                            <?php
                                            $zero = 0;
                                            if ( !empty( $serviceType ) ) {
                                                $bill = $TransactionClass ->getServiceTotalSettlement($serviceType);
                                                if(($bill['total'] > 0)) {
                                                    echo '<strong>GH¢ '.($bill['total']).'</strong>';
                                                }else{
                                                    echo '<strong>GH¢ '.$zero.'.00</strong>';
                                                }
                                            }else{
                                                $bill = $TransactionClass ->getServiceDefaultTotalSettlement();
                                                if(($bill['total'] > 0)) {
                                                    echo '<strong>GH¢ '.($bill['total']).'</strong>';
                                                }else{
                                                    echo '<strong>GH¢ '.$zero.'.00</strong>';
                                                }
                                            }?>
                                    </span>
                                    <div class="sparklineBar02"></div>
                                </div>
                                <span>Total - Settlement <i></i></span>
                            </div>
                        </div>

                        <div class="divider"><div><span></span></div></div>

						<!-- Begin table title -->
                        <div class="wContent">
						<ul class="nav nav-tabs" data-tabs="tabs">
							<li><a data-toggle="tab" ><img src="./models/img/icons/14x14/plus.png" alt="">Today's Transactions</a></li>
						</ul>
						<!-- End table title -->


						<div class="tab-content">
							<div class="tab-pane active" id="inbox">
								<table cellpading="0" cellspacing="0" border="0" class="dTable inboxTable" data-msg_rowlink="a">

									<thead align="left">
                                        <tr>
                                            <th>#</th>
                                            <th width="250">Transacted By</th>
                                            <th width="80">Reference No.</th>
                                            <th width="100">Retrieval No.</th>
                                            <th width="180">Date</th>
                                            <th width="100">Amount</th>
                                            <th width="800">Description</th>
                                        </tr>
									</thead>
                                    <tbody>
                                        <?php

                                        if ( !empty( $serviceType ) )
                                        {

                                            $cols = Array ( "userTitle, userFirstName, userLastName, transactionSRN, transactionRRN, transactionAmount, transactionDesc, transactionDate, transactionTime" );
                                            $Database -> where( 'providerKey', $TransactionClass ->getProviderKey($_SESSION['userSession']));
                                            $Database -> where( 'transactionStatus', 1 );
                                            $Database -> where( 'serviceKey', $TransactionClass ->getService($serviceType)  );
                                            $Database -> where( 'transactionDate', date('Y-m-d')  );
//                                            $Database -> where( 'transactionDate', date('Y-m-d')  );
                                            $transactions = $Database -> get( "tlr_transactions_view" );
                                            $counter = 1;

                                            foreach ( $transactions as $transaction )
                                            {
                                                ?>
                                                <tr>
                                                    <th class="even"><?php echo $counter; ?></th>
                                                    <td><?php
                                                        echo $fullname = $transaction['userTitle'] . ' ' . $transaction['userFirstName'] . ' ' . $transaction['userLastName'];
                                                        ?>
                                                    </td>
                                                    <td><?php echo $transaction['transactionSRN'] ?></td>
                                                    <td><?php echo $transaction['transactionRRN'] ?></td>
                                                    <td><?php echo date("M j", strtotime( $transaction['transactionDate'] ) ) . " at " . date("G:i", strtotime( $transaction['transactionTime'] ) ); ?></td>
                                                    <td><?php echo 'GH¢ '.$transaction['billingAmount'] ?></td>
                                                    <td><?php echo $transaction['transactionDesc'] ?></td>
                                                </tr>
                                                <?php
                                                $counter ++;
                                            }
                                        }
                                        else
                                        {
                                            $counter = 1;

                                            foreach ($TransactionClass ->getTodayTransaction($TransactionClass ->getProviderKey($_SESSION['userSession'])) as $transaction )
                                            {
                                                ?>

                                                <tr>
                                                  <th class="even"><?php echo $counter; ?></th>
                                                  <td><?php
                                                            echo $fullname = $transaction['userTitle'] . ' ' . $transaction['userFirstName'] . ' ' . $transaction['userLastName'];
                                                      ?>
                                                  </td>
                                                <td><?php echo $transaction['transactionSRN'] ?></td>
                                                <td><?php echo $transaction['transactionRRN'] ?></td>
                                                <td><?php echo date("M j", strtotime( $transaction['transactionDate'] ) ) . " at " . date("G:i", strtotime( $transaction['transactionTime'] ) ); ?></td>
                                                <td><?php echo 'GH¢ '.$transaction['billingAmount'] ?></td>
                                                <td><?php echo $transaction['transactionDesc'] ?></td>
                                                </tr><?php $counter++;
                                            }
                                        } ?>
                                    </tbody>
                                </table>
                             </div>
                        </div>
                    </div>

                      <div class="divider">
                          <div><span></span></div>
                      </div>

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