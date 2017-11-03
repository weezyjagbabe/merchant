<?php
$pageName = "Export CSV"; 																				// Set the page name
require_once './models/classes/Configurations.php'; 													// Include the configurations class
require_once './controllers/userController.php';    // Include the user processor file
require_once './models/classes/TransactionClass.php';
if( !$UserClass -> userIsLoggedin() ) { $UserClass -> redirect( 'sign-in' ); } 							// If user is not logged in, redirect to signin page
if( isset( $_GET["t"] ) ) { $fromDate = $_GET["t"]; }else{ $UserClass ->redirect('previous-transactions');}

function array2csv(array &$array)
{
    if (count($array) == 0) {
        return null;
    }
    ob_start();
    $df = fopen("php://output", 'w');
    fputcsv($df, array_keys(reset($array)));
    foreach ($array as $row) {
        fputcsv($df, $row);
    }
    fclose($df);
    return ob_get_clean();
}

function download_send_headers($filename) {
    // disable caching
    $now = gmdate("D, d M Y H:i:s");
    header("Expires: {$now} GMT");
    header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
    header("Last-Modified: {$now} GMT");

    // force download
    header("Content-Type: application/force-download");
    header("Content-Type: application/octet-stream");
    header("Content-Type: application/download");

    // disposition / encoding on response body
    header("Content-Disposition: attachment;filename={$filename}");
    header("Content-Transfer-Encoding: binary");
}


if(!empty($fromDate)) {
    $dd = substr($fromDate, 0, 7);
    $ddd = $dd . '%';
    $param = Array($TransactionClass->getProviderKey($_SESSION['userSession']), 1, $ddd);
    $query = 'SELECT transactionSRN AS RefernceNo, userFirstName AS FirstName, userLastName AS LastName, transactionDesc AS Description, billingAmount AS transactedAmount, trasactionCharge AS chargeAmount, transactionAmount AS settlementAmount FROM tlr_transactions_view WHERE providerKey=? AND transactionStatus=? AND transactionDate LIKE ?';
    $transactions = $Database->rawQuery($query, $param);

//    $stuffs = $TransactionClass->getInvoiceTotals($fromDate);

    $from = $fromDate . '01';
    $ff = mktime(0, 0, 0, date(substr($from, 5, 2)), date(substr($from, 8, 2)), date(substr($from, 0, 4)));

    download_send_headers("data_export_" . date('F-Y', $ff) . ".csv");
    echo array2csv($transactions);
    die();

}
?>
