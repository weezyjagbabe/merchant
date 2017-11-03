<?php
/**
 * Created by PhpStorm.
 * User: sbortey
 * Date: 10/08/2017
 * Time: 11:46 AM
 */

class TransactionClass
{
    public function __construct()
    {

    }

    public function getTodayTransaction( $providerKey )
    {
        $Database = new Database();
        $Database -> where ( 'providerKey', $providerKey );
        $Database -> where ('transactionDate',date('Y-m-d'));
        $Database -> where ('transactionStatus', 1);
        $stuff = $Database -> get ( 'tlr_transactions_view' );
        return $stuff;
    }

    public function getProviderKey( $acHolderKey)
    {
        $Database = new Database();
        $Database -> where( "acHolderKey", $acHolderKey );
        $admin = $Database -> getOne( "tlr_corporate_users" );
        return $providerKey = $admin['providerKey'];
    }

    public function getUserName ($userKey)
    {
        $Database = new Database();
        $Database -> where( "userKey", $userKey );
        $stuff = $Database -> get( "tlr_users" );
        return $stuff;
    }
    public function getLike($item)
    {
        switch ($item) {
            case 'January':
                return '%-01-%';
                break;

            case 'February':
                return '%-02-%';
                break;

            case 'March':
                return '%-03-%';
                break;

            case 'April':
                return '%-04-%';
                break;

            case 'May':
                return '%-05-%';
                break;

            case 'June':
                return '%-06-%';
                break;

            case 'July':
                return '%-07-%';
                break;

            case 'August':
                return '%-08-%';
                break;

            case 'September':
                return '%-09-%';
                break;

            case 'October':
                return '%-10-%';
                break;

            case 'November':
                return '%-11-%';
                break;

            case 'December':
                return '%-12-%';
                break;
        }
        return '';
    }

    public function getMinDate()
    {
        $Database = new Database();
        $param = Array ($this ->getProviderKey($_SESSION['userSession']),1);
        $query = 'SELECT MIN(transactionDate) AS minDate FROM tlr_transactions_view WHERE providerKey=? AND transactionStatus=?';
        $transactions = $Database -> rawQuery($query,$param);
        $stuff = $transactions[0];
        return $stuff['minDate'];

    }

    public function getMaxDate()
    {
        $Database = new Database();
        $param = Array ($this ->getProviderKey($_SESSION['userSession']),1);
        $query = 'SELECT MAX(transactionDate) AS maxDate FROM tlr_transactions_view WHERE providerKey=? AND transactionStatus=?';
        $transactions = $Database -> rawQuery($query,$param);
        $stuff = $transactions[0];
        return $stuff['maxDate'];

    }

    public function getService($item)
    {
        switch ($item) {
            case 'Bill Payment':
                return 'gdToNszSFJfS3fw';
                break;

            case 'AirTime Topup':
                return 'bh2o3ImoGJFBD74';
                break;

            case 'Funds Transfer':
                return 'eoODpCgB9bpusCu';
                break;
        }
        return '';
    }

    public function getCompanyName()
    {
        $Database = new Database();
        $Database->where('providerKey',$this->getProviderKey($_SESSION['userSession']));
        return $query['companyName'] = $Database->getOne('tlr_transactions_view','companyName');
    }

    public function getCompanyDetails()
    {
        $Database = new Database();
        $Database->where('providerKey',$this->getProviderKey($_SESSION['userSession']));
        return $query = $Database->get('tlr_services_providers',1,['companyName','companyAddress','companyEmail','companyPhone','companyLogo','aboutProvider']);
    }

    public function getInvoiceTotals($fromDate)
    {
        $Database = new Database();
        $dd =  substr($fromDate,0,7);
        $ddd = $dd.'%';
        $param = Array ($this ->getProviderKey($_SESSION['userSession']),1,$ddd);
        $query = 'SELECT COUNT(billingAmount) AS countNo ,SUM(billingAmount) as transactedAmount, SUM(trasactionCharge) as chargeAmount, SUM(transactionAmount) as settlementAmount FROM tlr_transactions_view WHERE providerKey=? AND transactionStatus=? AND transactionDate LIKE ?';
        return $transactions = $Database -> rawQuery($query,$param);

    }

    public function getOverallTotals()
    {
        $Database = new Database();
        $param = Array ($this ->getProviderKey($_SESSION['userSession']),1);
        $query = 'SELECT COUNT(billingAmount) AS countNo ,SUM(billingAmount) as transactedAmount, SUM(trasactionCharge) as chargeAmount, SUM(transactionAmount) as settlementAmount FROM tlr_transactions_view WHERE providerKey=? AND transactionStatus=?';
        return $transactions = $Database -> rawQuery($query,$param);

    }

    public function getFromDateTotalAmount($item)
    {
        $Database = new Database();
        $param = Array ($this ->getProviderKey($_SESSION['userSession']),1,$this ->getLike($item));
        $query = 'SELECT SUM(billingAmount) AS total FROM tlr_transactions_view WHERE providerKey=? AND transactionStatus=? AND transactionDate LIKE ?';
        $transactions = $Database -> rawQuery($query,$param);
        return $stuff = $transactions[0];
    }

    public function getDefaultFromDateTotalAmount()
    {
        $Database = new Database();
        $param = Array ($this ->getProviderKey($_SESSION['userSession']),1);
        $query = 'SELECT SUM(billingAmount) AS total FROM tlr_transactions_view WHERE providerKey=? AND transactionStatus=?';
        $transactions = $Database -> rawQuery($query,$param);
        return $stuff = $transactions[0];
    }

    public function getFromDateTotalSettlement($fromDate)
    {
        $Database = new Database();
        $param = Array ($this ->getProviderKey($_SESSION['userSession']),1,$this ->getLike($fromDate));
        $query = 'SELECT SUM(transactionAmount) AS total FROM tlr_transactions_view WHERE providerKey=? AND transactionStatus=? AND transactionDate LIKE ?';
        $transactions = $Database -> rawQuery($query,$param);
        return $stuff = $transactions[0];

    }

    public function getFromDateDefaultTotalSettlement()
    {
        $Database = new Database();
        $param = Array ($this ->getProviderKey($_SESSION['userSession']),1);
        $query = 'SELECT SUM(transactionAmount) AS total FROM tlr_transactions_view WHERE providerKey=? AND transactionStatus=?';
        $transactions = $Database -> rawQuery($query,$param);
        return $stuff = $transactions[0];

    }

    public function getServiceTotalSettlement($item)
    {
        $Database = new Database();
        $param = Array ($this ->getProviderKey($_SESSION['userSession']),1,$this ->getService($item),date('Y-m-d'));
        $query = 'SELECT SUM(transactionAmount) AS total FROM tlr_transactions_view WHERE providerKey=? AND transactionStatus=? AND serviceKey=? AND transactionDate=?';
        $transactions = $Database -> rawQuery($query,$param);
        return $stuff = $transactions[0];
    }

    public function getServiceDefaultTotalSettlement()
    {
        $Database = new Database();
        $param = Array ($this ->getProviderKey($_SESSION['userSession']),1,date('Y-m-d'));
        $query = 'SELECT SUM(transactionAmount) AS total FROM tlr_transactions_view WHERE providerKey=? AND transactionStatus=? AND transactionDate=?';
        $transactions = $Database -> rawQuery($query,$param);
        return $stuff = $transactions[0];
    }

    public function getTotalAmount($item)
    {
        $Database = new Database();
        $param = Array ($this ->getProviderKey($_SESSION['userSession']),1,$this ->getService($item),date('Y-m-d'));
        $query = 'SELECT SUM(billingAmount) AS total FROM tlr_transactions_view WHERE providerKey=? AND transactionStatus=? AND serviceKey=? AND transactionDate=?';
        $transactions = $Database -> rawQuery($query,$param);
        return $stuff = $transactions[0];
    }

    public function getDefaultTotalAmount()
    {
        $Database = new Database();
        $param = Array ($this ->getProviderKey($_SESSION['userSession']),1,date('Y-m-d'));
        $query = 'SELECT SUM(billingAmount) AS total FROM tlr_transactions_view WHERE providerKey=? AND transactionStatus=? AND transactionDate=?';
        $transactions = $Database -> rawQuery($query,$param);
        return $stuff = $transactions[0];
    }

    public function getTransactionCount($item)
    {
        $Database = new Database();
        $param = Array ($this ->getProviderKey($_SESSION['userSession']),1,$this ->getService($item),date('Y-m-d'));
        $query = 'SELECT COUNT(billingAmount) AS count FROM tlr_transactions_view WHERE providerKey=? AND transactionStatus=? AND serviceKey=? AND transactionDate=?';
        $transactions = $Database -> rawQuery($query,$param);
        return $stuff = $transactions[0];
    }

    public function getFromDateTransactionCount($item)
    {
        $Database = new Database();
        $param = Array ($this ->getProviderKey($_SESSION['userSession']),1,$this ->getLike($item));
        $query = 'SELECT COUNT(billingAmount) AS count FROM tlr_transactions_view WHERE providerKey=? AND transactionStatus=? AND transactionDate LIKE ?';
        $transactions = $Database -> rawQuery($query,$param);
        return $stuff = $transactions[0];
    }

    public function getDefaultTransactionCount()
    {
        $Database = new Database();
        $param = Array ($this ->getProviderKey($_SESSION['userSession']),1,date('Y-m-d'));
        $query = 'SELECT COUNT(billingAmount) AS count FROM tlr_transactions_view WHERE providerKey=? AND transactionStatus=? AND transactionDate=?';
        $transactions = $Database -> rawQuery($query,$param);
        return $stuff = $transactions[0];
    }

    public function getFromDateDefaultTransactionCount()
    {
        $Database = new Database();
        $param = Array ($this ->getProviderKey($_SESSION['userSession']),1);
        $query = 'SELECT COUNT(billingAmount) AS count FROM tlr_transactions_view WHERE providerKey=? AND transactionStatus=?';
        $transactions = $Database -> rawQuery($query,$param);
        return $stuff = $transactions[0];
    }

    public function getTotalBilling($item)
    {
        $Database = new Database();
        $param = Array ($this ->getProviderKey($_SESSION['userSession']),1,$this ->getService($item),date('Y-m-d'));
        $query = 'SELECT SUM(trasactionCharge)AS billing FROM tlr_transactions_view WHERE providerKey=? AND transactionStatus=? AND serviceKey=? AND transactionDate=?';
        $transactions = $Database -> rawQuery($query,$param);
        return $stuff = $transactions[0];
    }

    public function getFromDateTotalBilling($item)
    {
        $Database = new Database();
        $param = Array ($this ->getProviderKey($_SESSION['userSession']),1,$this ->getLike($item));
        $query = 'SELECT SUM(trasactionCharge)AS billing FROM tlr_transactions_view WHERE providerKey=? AND transactionStatus=? AND transactionDate LIKE ?';
        $transactions = $Database -> rawQuery($query,$param);
        return $stuff = $transactions[0];
    }

    public function getDefaultTotalBilling()
    {
        $Database = new Database();
        $param = Array ($this ->getProviderKey($_SESSION['userSession']),1,date('Y-m-d'));
        $query = 'SELECT SUM(trasactionCharge) AS billing FROM tlr_transactions_view WHERE providerKey=? AND transactionStatus=? AND transactionDate=?';
        $transactions = $Database -> rawQuery($query,$param);
        return $stuff = $transactions[0];
    }

    public function getFromDateDefaultTotalBilling()
    {
        $Database = new Database();
        $param = Array ($this ->getProviderKey($_SESSION['userSession']),1);
        $query = 'SELECT SUM(trasactionCharge) AS billing FROM tlr_transactions_view WHERE providerKey=? AND transactionStatus=?';
        $transactions = $Database -> rawQuery($query,$param);
        return $stuff = $transactions[0];
    }


    public function getNoOfDays($item)
    {
        switch ($item) {
            case date('Y').'-09':
                return 30;
                break;

            case date('Y').'-04':
                return 30;
                break;

            case date('Y').'-06':
                return 30;
                break;

            case date('Y').'-11':
                return 30;
                break;

            case date('Y').'-02':
                $j= date('Y');
                $j1= mktime(0,0,0,1,1,$j);
                if (date("L", $j1)){
                    return 29;
                    break;
                }else{
                    return 28;
                    break;
                }

        }
        return 31;
    }

    public function getSettlements($item)
    {


    }

}

$TransactionClass = new TransactionClass();