<?php
$pageName = "DashboardChart"; 																				// Set the page name

require_once './models/classes/Configurations.php'; 													// Include the configurations class
require_once './controllers/userController.php'; 														// Include the user processor file
require_once './models/classes/TransactionClass.php';
if( !$UserClass -> userIsLoggedin() ) { $UserClass -> redirect( 'sign-in' ); }


$sinContent = array();
$cosContent = array();
$dates = array();


$counter = 1;
$minDate = $TransactionClass->getMinDate();
$maxDate = date('Y-m-d');
while($minDate <= $maxDate) {
    $sumtranc = 0;
    $sumbill = 0;
    $sumsettle = 0;
    $zero = 0;

    $minDate = mktime(0, 0, 0, date(substr($minDate, 5, 2)), date(substr($minDate, 8, 2)), date(substr($minDate, 0, 4)));
    $dd = date('Y-m', $minDate);
    $ddd = date('Y-m-d', $minDate);

    $thisDate = $dd . '%';
//    if (date('Y-m') > $dd) {
        $Database = new Database();
        $param = Array($TransactionClass->getProviderKey($_SESSION['userSession']), 1, $thisDate);
        $query = 'SELECT SUM(billingAmount) AS transactionAmount, SUM(trasactionCharge) AS billingAmount, SUM(transactionAmount) AS settlementAmount, transactionDate FROM tlr_transactions_view WHERE providerKey=? AND transactionStatus=? AND transactionDate LIKE ? GROUP BY transactionDate';
        $transactions = $Database->rawQuery($query, $param);


        foreach ($transactions as $transaction) {
            $sumtranc = $sumtranc + $transaction['transactionAmount'];
            $sumbill = $sumbill + $transaction['billingAmount'];
//            $sumsettle = $sumsettle + $transaction['settlementAmount'];

//        }

    }array_push($sinContent, $sumtranc);
    array_push($cosContent, $sumbill);
    $todate = date ('M j', $minDate);
    array_push($dates, $ddd);
    $nextDate = mktime(0, 0, 0, date(substr($ddd,5,2))+1  , date(substr($ddd,8,2)), date(substr($ddd,0,4)));
    $minDate = date('Y-m-d', $nextDate);
}
$Visa = 0;
$Date = date('Y-m');
$thisDate = $Date.'%';
$Database = new Database();
$param = Array($TransactionClass->getProviderKey($_SESSION['userSession']), 1, $thisDate, 'Vis%');
$query = 'SELECT SUM(billingAmount) AS transactionAmount FROM tlr_transactions_view WHERE providerKey=? AND transactionStatus=? AND transactionDate LIKE ? AND paymentSourceName LIKE ? GROUP BY transactionDate';
$transactions = $Database->rawQuery($query, $param);
    foreach ($transactions as $transaction){
        $Visa = $Visa + $transaction['transactionAmount'];
    }

$Master = 0;
$Date = date('Y-m');
$thisDate = $Date.'%';
$Database = new Database();
$param = Array($TransactionClass->getProviderKey($_SESSION['userSession']), 1, $thisDate, 'Master%');
$query = 'SELECT SUM(billingAmount) AS transactionAmount FROM tlr_transactions_view WHERE providerKey=? AND transactionStatus=? AND transactionDate LIKE ? AND paymentSourceName LIKE ? GROUP BY transactionDate';
$transactions = $Database->rawQuery($query, $param);
foreach ($transactions as $transaction){
    $Master = $Master + $transaction['transactionAmount'];
}

$MTN = 0;
$Date = date('Y-m');
$thisDate = $Date.'%';
$Database = new Database();
$param = Array($TransactionClass->getProviderKey($_SESSION['userSession']), 1, $thisDate, 'mtn%');
$query = 'SELECT SUM(billingAmount) AS transactionAmount FROM tlr_transactions_view WHERE providerKey=? AND transactionStatus=? AND transactionDate LIKE ? AND paymentSourceName LIKE ? GROUP BY transactionDate';
$transactions = $Database->rawQuery($query, $param);
foreach ($transactions as $transaction){
    $MTN = $MTN + $transaction['transactionAmount'];
}

$Airtel = 0;
$Date = date('Y-m');
$thisDate = $Date.'%';
$Database = new Database();
$param = Array($TransactionClass->getProviderKey($_SESSION['userSession']), 1, $thisDate, 'airtel%');
$query = 'SELECT SUM(billingAmount) AS transactionAmount FROM tlr_transactions_view WHERE providerKey=? AND transactionStatus=? AND transactionDate LIKE ? AND paymentSourceName LIKE ? GROUP BY transactionDate';
$transactions = $Database->rawQuery($query, $param);
foreach ($transactions as $transaction){
    $Airtel = $Airtel + $transaction['transactionAmount'];
}

$Tigo = 0;
$Date = date('Y-m');
$thisDate = $Date.'%';
$Database = new Database();
$param = Array($TransactionClass->getProviderKey($_SESSION['userSession']), 1, $thisDate, 'tigo%');
$query = 'SELECT SUM(billingAmount) AS transactionAmount FROM tlr_transactions_view WHERE providerKey=? AND transactionStatus=? AND transactionDate LIKE ? AND paymentSourceName LIKE ? GROUP BY transactionDate';
$transactions = $Database->rawQuery($query, $param);
foreach ($transactions as $transaction){
    $Tigo = $Tigo + $transaction['transactionAmount'];
}


$Vodafone = 0;
$Date = date('Y-m');
$thisDate = $Date.'%';
$Database = new Database();
$param = Array($TransactionClass->getProviderKey($_SESSION['userSession']), 1, $thisDate, 'voda%');
$query = 'SELECT SUM(billingAmount) AS transactionAmount FROM tlr_transactions_view WHERE providerKey=? AND transactionStatus=? AND transactionDate LIKE ? AND paymentSourceName LIKE ? GROUP BY transactionDate';
$transactions = $Database->rawQuery($query, $param);
foreach ($transactions as $transaction){
    $Vodafone = $Vodafone + $transaction['transactionAmount'];
}


$GHLink = 0;
$Date = date('Y-m');
$thisDate = $Date.'%';
$Database = new Database();
$param = Array($TransactionClass->getProviderKey($_SESSION['userSession']), 1, $thisDate, 'GH Lin%');
$query = 'SELECT SUM(billingAmount) AS transactionAmount FROM tlr_transactions_view WHERE providerKey=? AND transactionStatus=? AND transactionDate LIKE ? AND paymentSourceName LIKE ? GROUP BY transactionDate';
$transactions = $Database->rawQuery($query, $param);
foreach ($transactions as $transaction){
    $GHLink = $GHLink + $transaction['transactionAmount'];
}



header('Content-Type: application/json');
echo json_encode(['counter' => sizeof($sinContent), 'sineContent' => $sinContent, 'cosContent' => $cosContent, 'dates' => $dates, 'visa' => $Visa, 'mastercard' => $Master, 'mtn' => $MTN, 'airtel' =>$Airtel, 'tigo' => $Tigo, 'vodafone' => $Vodafone, 'GHLink' => $GHLink]);