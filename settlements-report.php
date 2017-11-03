<?php
$pageName = "Settlements Report"; 																			// Set the page name

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


                <div class="sWidgets" align="center">
                    <div class="sWidget">
                        <div class="sparkContainer">
                                    <span>
                                        <?php
                                            $zero = 0;
                                            $stuffs = $TransactionClass ->getOverallTotals();
                                            foreach ($stuffs as $stuff) {
                                                if (($stuff['transactedAmount'] > 0)) {
                                                    echo '<strong>GH¢ ' . $stuff['transactedAmount'] . '</strong>';
                                                } else {
                                                    echo '<strong>GH¢ ' . $zero . '.00</strong>';
                                                }
                                            }
                                        ?>

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
                                                $stuffs = $TransactionClass ->getOverallTotals();
                                                foreach ($stuffs as $stuff) {
                                                    if (($stuff['countNo'] > 0)) {
                                                        echo '<strong>' . $stuff['countNo'] . ' Transactions</strong>';
                                                    } else {
                                                        echo '<strong>' . $zero . '</strong>';
                                                    }
                                                }
                                            ?>

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
                                                $stuffs = $TransactionClass ->getOverallTotals();
                                                foreach ($stuffs as $stuff) {
                                                    if (($stuff['chargeAmount'] > 0)) {
                                                        echo '<strong>GH¢ ' . $stuff['chargeAmount'] . '</strong>';
                                                    } else {
                                                        echo '<strong>GH¢ ' . $zero . '.00</strong>';
                                                    }
                                                }
                                            ?>

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
                                                $stuffs = $TransactionClass ->getOverallTotals();
                                                foreach ($stuffs as $stuff) {
                                                    if (($stuff['settlementAmount'] > 0)) {
                                                        echo '<strong>GH¢ ' . $stuff['settlementAmount'] . '</strong>';
                                                    } else {
                                                        echo '<strong>GH¢ ' . $zero . '.00</strong>';
                                                    }
                                                }
                                            ?>
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
                    <li><a data-toggle="tab" ><img src="./models/img/icons/14x14/plus.png" alt="">Settlements for (<?php
                            $d = $TransactionClass->getMinDate();
                            $e = date('Y-m-d');

                            $e = mktime(0, 0, 0, date(substr($e,5,2))-1  , date(substr($e,8,2)), date(substr($e,0,4)));
                            echo date('F-Y',strtotime($d)).' to '.date('F-Y',$e)?>)</a></li>
                </ul>
                <!-- End table title -->


                <div class="tab-content">
                    <div class="tab-pane active" id="inbox">
                        <table cellpading="0" cellspacing="0" border="0" class="dTable " data-msg_rowlink="a" >

                            <thead align="left">
                            <tr>
                                <th width="20">#</th>
                                <th width="120">Date</th>
                                <th width="140">Transacted Amount</th>
                                <th width="140">Billing Amount</th>
                                <th width="140">Settlement Amount</th>
                                <th width="10">Details</th>
                                <!--                                <th width="800">Description</th>-->
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $counter = 1;
                            $minDate = $TransactionClass->getMinDate();
                            $maxDate = date('Y-m-d');
                            while($minDate < $maxDate){
                                $sumtranc = 0;
                                $sumbill= 0;
                                $sumsettle = 0;
                                $zero = 0;

                                $minDate = mktime(0, 0, 0, date(substr($minDate,5,2))  , date(substr($minDate,8,2)), date(substr($minDate,0,4)));
                                $dd = date('Y-m', $minDate);
                                $ddd = date('Y-m-d',$minDate);

                                $thisDate = $dd.'%';
                                if(date('Y-m') > $dd) {
                                    $Database = new Database();
                                    $param = Array ($TransactionClass ->getProviderKey($_SESSION['userSession']),1,$thisDate);
                                    $query = 'SELECT SUM(billingAmount) AS transactionAmount, SUM(trasactionCharge) AS billingAmount, SUM(transactionAmount) AS settlementAmount, transactionDate FROM tlr_transactions_view WHERE providerKey=? AND transactionStatus=? AND transactionDate LIKE ? GROUP BY transactionDate';
                                    $transactions = $Database -> rawQuery($query,$param);


                                    foreach ($transactions as $transaction) {
                                        $sumtranc = $sumtranc + $transaction['transactionAmount'];
                                        $sumbill = $sumbill + $transaction['billingAmount'];
                                        $sumsettle = $sumsettle + $transaction['settlementAmount'];
                                    }

                                ?>
                                <tr>
                                    <th class="even"><?php echo $counter; ?></th>
                                    <td><?php
                                        $df = $dd.'-01';
                                        $df = mktime(0, 0, 0, date(substr($df, 5, 2)), date(substr($df, 8, 2)), date(substr($df, 0, 4)));
                                        echo date('F-Y',$df);
                                        ?>
                                    </td>
                                    <td><?php if ($sumtranc > 0 ) {echo 'GH¢ '.$sumtranc;} else{ echo 'GH¢ '.$zero.'.00'; } ?></td>
                                    <td><?php if ($sumbill > 0 ) {echo 'GH¢ '.$sumbill;} else {echo 'GH¢ '.$zero.'.00';} ?></td>
                                    <td><?php if ($sumsettle > 0 ) {echo 'GH¢ '.$sumsettle;} else {echo 'GH¢ '.$zero.'.00';}  ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                                Action
                                                <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a href="invoice?t=<?php echo $dd?>">View Invoice</a></li>
                                                <li><a href="settlements?t=<?php echo $dd?>">View Details</a></li>
                                                <li><a target="_blank" href="export-pdf?t=<?php echo $dd?>">Export PDF</a></li>
                                                <li><a target="_blank" href="export-csv?t=<?php echo $dd?>">Export CSV</a></li>
                                            </ul>
                                        </div>

                                    </td>
                                </tr>
                                <?php
                                $counter++;

                                $nextDate = mktime(0, 0, 0, date(substr($ddd,5,2))+1  , date(substr($ddd,8,2)), date(substr($ddd,0,4)));
                                $minDate = date('Y-m-d', $nextDate);}
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>

                    </div>
                </div>
            </div>

            <div class="divider">
                <div><span></span></div>
            </div>
            <div class="divider">
                <div><span></span></div>
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