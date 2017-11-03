<?php
$pageName = "Invoice"; 																				// Set the page name

require_once './models/classes/Configurations.php'; 													// Include the configurations class
require_once './controllers/userController.php';    // Include the user processor file
require_once './models/classes/TransactionClass.php';

if( !$UserClass -> userIsLoggedin() ) { $UserClass -> redirect( 'sign-in' ); } 							// If user is not logged in, redirect to signin page

if( isset( $_GET["t"] ) ) { $fromDate = $_GET["t"]; }else{ $UserClass ->redirect('previous-transactions');}
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
            <div class="wContent">
            <div class="invoice ">
                <div class="invoiceHead">
                    <img src="img/invoiceLogo.png" alt="">
                    <div class="invoiceInfo">
<!--                        Invoice ID and Settlement Date to be determined-->
                        <span>Invoice ID: #158732</span><br>
                        <i>Settled on January 31, 2017</i>
                    </div>
                </div>
                <?php

                    $param = Array ($TransactionClass ->getProviderKey($_SESSION['userSession']));
                    $query = 'SELECT companyName, companyEmail, companyPhone, companyAddress FROM tlr_transactions_view WHERE providerKey=? LIMIT 1 ';
                    $transactions = $Database -> rawQuery($query,$param);
                    $result = $transactions[0];

                    $companyName = $result['companyName'];
                    $companyEmail = $result['companyEmail'];
                    $companyPhone = $result['companyPhone'];
                    $companyAddress = $result['companyAddress'];

                    $refinedAddress = str_replace(",","</span><span>",$companyAddress);


                ?>
                <div class="invoiceData">
<!--                    <div class="invoiceFrom">-->
<!--                        <h4>From</h4>-->
<!--                        <span>Address Line</span>-->
<!--                        <span>Town</span>-->
<!--                        <span>Region/State</span>-->
<!--                        <span>Zip/Postal Code</span>-->
<!--                        <span>Mobile Phone: +4530422244</span>-->
<!--                        <span>Send To: me@company.com</span>-->
<!--                        <span>Payment due 10/06/2012</span>-->
<!--                    </div>-->

                    <div class="invoiceTo">
                        <h4><?php echo $companyName?></h4>
                        <span><?php echo $refinedAddress ?></span>
                        <span>Mobile Phone: <?php echo $companyPhone ?></span>
                        <span>Email: <?php echo $companyEmail?></span>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <table cellpading="0" class="dTable" border="0" cellspacing="0">
                    <thead>
                    <tr>
                        <th align="left" width="80">Reference no.</th>
                        <th align="left" width="170">Transacted By</th>
                        <th align="left">Description</th>
                        <th align="center" width="120">Transacted Amount</th>
                        <th align="center" width="80">Charge</th>
                        <th align="right" width="120">Settlement Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if(!empty($fromDate)){
//
                        $dd =  substr($fromDate,0,7);
                        $ddd = $dd.'%';
                        $param = Array ($TransactionClass ->getProviderKey($_SESSION['userSession']),1,$ddd);
                        $query = 'SELECT * FROM tlr_transactions_view WHERE providerKey=? AND transactionStatus=? AND transactionDate LIKE ?';
                        $transactions = $Database -> rawQuery($query,$param);
                        foreach ( $transactions as $transaction )
                        {
                            ?>
                            <tr>
                                <td><?php echo $transaction['transactionSRN']; ?></td>
                                <td><?php echo $transaction['userFirstName'] . " " . $transaction['userLastName']; ?></td>
                                <td><?php echo $transaction['transactionDesc']; ?></td>
                                <td align="center"><?php echo 'GH¢ '.$transaction['billingAmount']; ?></td>
                                <td align="center"><?php echo 'GH¢ '.$transaction['trasactionCharge']; ?></td>
                                <td align="right"><?php echo 'GH¢ '.$transaction['transactionAmount']; ?></td>
                            </tr>

                            <?php
                        }
                        $stuffs = $TransactionClass->getInvoiceTotals($fromDate);
                        foreach ($stuffs as $stuff){ ?>
                            <tr>
                                <td class="total" colspan="5">Subtotal</td>
                                <td align="right"><?php echo 'GH¢ '.$stuff['transactedAmount'] ?></td>
                            </tr>
                            <tr>
                                <td class="total" colspan="5">(Charge)</td>
                                <td align="right"><?php echo 'GH¢ '.$stuff['chargeAmount'] ?></td>
                            </tr>
                            <tr>
                                <td class="total" colspan="5">Total</td>
                                <td align="right"><?php echo 'GH¢ '.$stuff['settlementAmount'] ?></td>
                            </tr>
                            <tr>
                                <td class="total" colspan="5"></td>
                                <td align="right">

                                    <div class="btn-group">
                                        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                            Action
                                            <span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a target="_blank" href="export-pdf?t=<?php echo $dd?>">Export PDF</a></li>
                                            <li><a target="_blank" href="export-csv?t=<?php echo $dd?>">Export CSV</a></li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>
                          <?php
                        }
                    }

                    ?>


                    </tbody>
                </table>
                <div class="invoiceFooter">
                    <span>Thanks for your purchase and come back again soon.</span>
                    <img src="img/payment.png" alt="">
                    <div class="clearfix"></div>

                </div>
            </div>

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