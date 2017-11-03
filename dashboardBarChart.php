<?php
$pageName = "DashboardBarChart"; 																				// Set the page name

require_once './models/classes/Configurations.php'; 													// Include the configurations class
require_once './controllers/userController.php'; 														// Include the user processor file
require_once './models/classes/TransactionClass.php';
if( !$UserClass -> userIsLoggedin() ) { $UserClass -> redirect( 'sign-in' ); }

$sumsettle = 0;
$sinContent = array();
$dates = array();
//$prevmonth = strtotime('-2 month');
$preMonth = date ('Y-m');
$preMonth = $preMonth.'%';
//var_dump($preMonth);
$nonewOfDays = $TransactionClass->getNoOfDays($preMonth);
//for ($i = 1; $i < $nonewOfDays; $i++) {
//    $prevDate = date ('Y-m', $prevmonth) . '-' . date('d', mktime(0, 0, 0, 0, $i, 0));
$Database = new Database();
$param = Array($TransactionClass->getProviderKey($_SESSION['userSession']), 1, $preMonth);
$query = 'SELECT SUM(billingAmount) AS transactedAmount, transactionDate FROM tlr_transactions_view WHERE providerKey=? AND transactionStatus=? AND transactionDate LIKE ? GROUP BY transactionDate';
$transactions = $Database->rawQuery($query, $param);
?>

<?php
if (!empty($transactions)) {
    foreach ($transactions as $transaction) {
        array_push($sinContent,  $transaction['transactedAmount']);
        array_push($dates, $transaction['transactionDate']);
    }
}else{
//            array_push($sinContent, $sumsettle);
}

//}


//$xStart = 0; $yStart = 0; $numberOfY = 1; $length = sizeof($sinContent);
//
//$y1 = $yStart;
//$x = $xStart;
//$dataPoints = array();
//
//for($i = 0; $i < $length; $i++){
//    $y1 = $sinContent[$i] + 1;//rand(0, 10) - 5;
//    $x = $xStart + $i;

    //$dataPoint = array("x" => $xStart, "y" => $y1);
//    $dataPoint = array($x, $y1);
//    array_push($dataPoints, $dataPoint);
//}

//    return $dataPoints;



//$dataPoints = array(
//    array("y" => 6, "label" => "Apple"),
//    array("y" => 4, "label" => "Mango"),
//    array("y" => 5, "label" => "Orange"),
//    array("y" => 7, "label" => "Banana"),
//    array("y" => 4, "label" => "Pineapple"),
//    array("y" => 6, "label" => "Pears"),
//    array("y" => 7, "label" => "Grapes"),
//    array("y" => 5, "label" => "Lychee"),
//    array("y" => 4, "label" => "Jackfruit")
//);

header('Content-Type: application/json');
echo json_encode(['labels' =>$sinContent, 'dates' => $dates]);