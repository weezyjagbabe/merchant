<?php
$pageName = "Settlements"; 																			// Set the page name

require_once './models/classes/Configurations.php'; 													// Include the configurations class
require_once './controllers/userController.php'; 														// Include the user processor file
require_once './models/classes/TransactionClass.php';
if( !$UserClass -> userIsLoggedin() ) { $UserClass -> redirect( 'sign-in' ); } 							// If user is not logged in, redirect to signin page

if( isset( $_GET["t"] ) ) { $fromDate = $_GET["t"]; }
require_once './controllers/documentHeader.php'; 														// Include the document header

?>
<!-- Begin page body -->

<body>



<!-- Begin all content wrapper -->
<div class="mainContainer ">

    <!-- Begin the page header, logo and left navigation section -->
    <?php
    require_once './views/pageHeaderLeftNav.php'; 												// Include the page header, logo and left navigation
    ?>
    <!-- End the page header, logo and left navigation section -->
    <!-- Begin content wrapper -->
    <div class="content ">

        <!-- Begin page user menu -->
        <?php
        require_once './views/pageUserMenu.php'; 												// Include the page user menu
        ?>
        <!-- End page user menu  -->
<!--        <div class="wcontent">-->
<!--        <div class="box-wrap antiscroll-wrap">-->
<!--            <div class="box">-->
<!--                <div class="antiscroll-inner">-->



                <!-- Begin inner content -->
        <div class="contentInner ">

            <div class="inbox">

                <div class="sWidgets" align="center">
                    <div class="sWidget">
                        <div class="sparkContainer">
                                    <span>
                                        <?php
                                        $zero = 0;
                                        if ( !empty( $fromDate ) ) {
                                            $stuffs = $TransactionClass ->getInvoiceTotals($fromDate);
                                            foreach ($stuffs as $stuff) {
                                                if (($stuff['transactedAmount'] > 0)) {
                                                    echo '<strong>GH¢ ' . $stuff['transactedAmount'] . '</strong>';
                                                } else {
                                                    echo '<strong>GH¢ ' . $zero . '.00</strong>';
                                                }
                                            }
                                        }else{
                                            $stuffs = $TransactionClass ->getInvoiceTotals(date('Y-m-d'));
                                            foreach ($stuffs as $stuff) {
                                                if (($stuff['transactedAmount'] > 0)) {
                                                    echo '<strong>GH¢ ' . $stuff['transactedAmount'] . '</strong>';
                                                } else {
                                                    echo '<strong>GH¢ ' . $zero . '.00</strong>';
                                                }
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
                                            if ( !empty( $fromDate ) ) {
                                                $stuffs = $TransactionClass ->getInvoiceTotals($fromDate);
                                                foreach ($stuffs as $stuff) {
                                                    if (($stuff['countNo'] > 0)) {
                                                        echo '<strong>' . $stuff['countNo'] . ' Transactions</strong>';
                                                    } else {
                                                        echo '<strong>' . $zero . '</strong>';
                                                    }
                                                }
                                            }else{
                                                $stuffs = $TransactionClass ->getInvoiceTotals(date('Y-m-d'));
                                                foreach ($stuffs as $stuff) {
                                                    if (($stuff['countNo'] > 0)) {
                                                        echo '<strong>' . $stuff['countNo'] . ' Transactions</strong>';
                                                    } else {
                                                        echo '<strong>' . $zero . '</strong>';
                                                    }
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
                                            if ( !empty( $fromDate ) ) {
                                                $stuffs = $TransactionClass ->getInvoiceTotals($fromDate);
                                                foreach ($stuffs as $stuff) {
                                                    if (($stuff['chargeAmount'] > 0)) {
                                                        echo '<strong>GH¢ ' . $stuff['chargeAmount'] . '</strong>';
                                                    } else {
                                                        echo '<strong>GH¢ ' . $zero . '.00</strong>';
                                                    }
                                                }
                                            }else{
                                                $stuffs = $TransactionClass ->getInvoiceTotals(date('Y-m-d'));
                                                foreach ($stuffs as $stuff) {
                                                    if (($stuff['chargeAmount'] > 0)) {
                                                        echo '<strong>GH¢ ' . $stuff['chargeAmount'] . '</strong>';
                                                    } else {
                                                        echo '<strong>GH¢ ' . $zero . '.00</strong>';
                                                    }
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
                                            if ( !empty( $fromDate ) ) {
                                                $stuffs = $TransactionClass ->getInvoiceTotals($fromDate);
                                                foreach ($stuffs as $stuff) {
                                                    if (($stuff['settlementAmount'] > 0)) {
                                                        echo '<strong>GH¢ ' . $stuff['settlementAmount'] . '</strong>';
                                                    } else {
                                                        echo '<strong>GH¢ ' . $zero . '.00</strong>';
                                                    }
                                                }
                                            }else{
                                                $stuffs = $TransactionClass ->getInvoiceTotals(date('Y-m-d'));
                                                foreach ($stuffs as $stuff) {
                                                    if (($stuff['settlementAmount'] > 0)) {
                                                        echo '<strong>GH¢ ' . $stuff['settlementAmount'] . '</strong>';
                                                    } else {
                                                        echo '<strong>GH¢ ' . $zero . '.00</strong>';
                                                    }
                                                }
                                            }?>
                                    </span>
                            <div class="sparklineBar02"></div>
                        </div>
                        <span>Total - Settlement <i></i></span>
                    </div>
                </div>

                <div class="divider"><div><span></span></div></div>


                <div class="wContent">
                <!-- Begin table title -->
                <ul class="nav nav-tabs" data-tabs="tabs">
                    <li><a data-toggle="tab" ><img src="./models/img/icons/14x14/plus.png" alt="">Settlements for (
                            <?php
                                if(!empty($fromDate)){
                                    $from = $fromDate.'01';
                                    $ff = mktime(0, 0, 0, date(substr($from, 5, 2)), date(substr($from, 8, 2)), date(substr($from, 0, 4)));
                                    echo date('F-Y',$ff);
                                } else {
                                    echo date('F-Y');
                                }
                            ?>)</a></li>
                </ul>
                <!-- End table title -->


                <div class="tab-content">
                    <div class="tab-pane active" id="inbox">
                        <table cellpading="0" cellspacing="0" border="0" class="dTable ">

                            <thead align="left">
                            <tr>
                                <th width="20">#</th>
                                <th width="200">Date</th>
                                <th width="200">Transacted Amount</th>
                                <th width="200">Billing Amount</th>
                                <th width="200">Settlement Amount</th>
                                <th width="200">Details</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                if(!empty($fromDate)){
//
                                        $counter = 1;
                                        $sumsettle = 0;
                                        $noOfDays = $TransactionClass->getNoOfDays($fromDate);
                                        for ($i = 1; $i <= $noOfDays; $i++) {
                                            $thisDate = $fromDate . '-' . date('d', mktime(0, 0, 0, 0, $i, 0));
                                            if (date('Y-m-d') > $thisDate) {
                                                $Database = new Database();
                                                $param = Array($TransactionClass->getProviderKey($_SESSION['userSession']), 1, $thisDate);
                                                $query = 'SELECT SUM(transactionAmount) AS settlementAmount, SUM(billingAmount) AS transactedAmount, SUM(trasactionCharge) AS chargeAmount, transactionDate FROM tlr_transactions_view WHERE providerKey=? AND transactionStatus=? AND transactionDate=? GROUP BY transactionDate';
                                                $transactions = $Database->rawQuery($query, $param);
                                                if (!empty($transactions)) {
                                                    foreach ($transactions as $transaction) {
                                                        ?>
                                                        <tr>
                                                            <th class="even"><?php echo $counter; ?></th>
                                                            <td><?php echo $transaction['transactionDate']; ?></td>
                                                            <td><?php echo 'GH¢ '.$transaction['transactedAmount']; ?></td>
                                                            <td><?php echo 'GH¢ '.$transaction['chargeAmount']; ?></td>
                                                            <td><?php echo 'GH¢ '.$transaction['settlementAmount']; ?></td>
                                                            <td><a href="invoice?t=<?php echo $transaction['transactionDate'] ?>">View Details </a></td>
                                                        </tr>
                                                        <?php
                                                        $counter++;
                                                    }
                                                }else{ ?>
                                                    <tr>
                                                        <th class="even"><?php echo $counter; ?></th>
                                                        <td><?php echo $thisDate; ?></td>
                                                        <td><?php echo 'GH¢ '.$sumsettle . '.00'; ?></td>
                                                        <td><?php echo 'GH¢ '.$sumsettle . '.00'; ?></td>
                                                        <td><?php echo 'GH¢ '.$sumsettle . '.00'; ?></td>
                                                        <td><a href="invoice?t=<?php echo $thisDate ?>">View Details </a></td>
                                                    </tr>
                                                    <?php
                                                        $counter++;
                                                }
                                            }
                                        }
                                }else {
                                    $counter = 1;
                                    $sumsettle = 0;
                                    $noOfDays = $TransactionClass->getNoOfDays(date('Y-m-d'));
                                    for ($i = 1; $i < date('d'); $i++) {
                                        $thisDate = date('Y-m') . '-' . date('d', mktime(0, 0, 0, 0, $i, 0));
                                        if (date('Y-m-d') > $thisDate) {
                                            $Database = new Database();
                                            $param = Array($TransactionClass->getProviderKey($_SESSION['userSession']), 1, $thisDate);
                                            $query = 'SELECT SUM(transactionAmount) AS settlementAmount, SUM(billingAmount) AS transactedAmount, SUM(trasactionCharge) AS chargeAmount, transactionDate FROM tlr_transactions_view WHERE providerKey=? AND transactionStatus=? AND transactionDate=? GROUP BY transactionDate';
                                            $transactions = $Database->rawQuery($query, $param);
                                            if (!empty($transactions)) {
                                                foreach ($transactions as $transaction) {
                                                    ?>
                                                    <tr>
                                                        <th class="even"><?php echo $counter; ?></th>
                                                        <td><?php echo $transaction['transactionDate']; ?></td>
                                                        <td><?php echo 'GH¢ '.$transaction['transactedAmount']; ?></td>
                                                        <td><?php echo 'GH¢ '.$transaction['chargeAmount']; ?></td>
                                                        <td><?php echo 'GH¢ '.$transaction['settlementAmount']; ?></td>
                                                        <td><a href="invoice?t=<?php echo $transaction['transactionDate'] ?>">View Details </a></td>
                                                    </tr>
                                                    <?php
                                                    $counter++;
                                                }
                                            }else{ ?>
                                                <tr>
                                                    <th class="even"><?php echo $counter; ?></th>
                                                    <td><?php echo $thisDate; ?></td>
                                                    <td><?php echo 'GH¢ '.$sumsettle . '.00'; ?></td>
                                                    <td><?php echo 'GH¢ '.$sumsettle . '.00'; ?></td>
                                                    <td><?php echo 'GH¢ '.$sumsettle . '.00'; ?></td>
                                                    <td><a href="invoice?t=<?php echo $thisDate ?>">View Details </a></td>
                                                </tr>
                                                <?php
                                                $counter++;
                                            }
                                        }
                                    }
                                }
                             ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
                    </div>
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
        </div>


            <div class="divider">
                <div><span></span></div>
            </div>
<!--        </div>-->

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