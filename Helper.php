<?php

namespace App\Helpers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Auth;
use DB;
use DateTime;
use DateTimeZone;

class Helper {

    public const CRS_API_URL = 'https://api-sandbox.stitchcredit.com:443/api';
    public const CRS_USER  = 'mcroak@bkassistant.net';
    public const CRS_PASSWORD = 'dk2HeBm8epEuWb2VdaL8';
    public const SUCCESS =1;
    public const YES = 1;
    public const NO = 0;
    public const  SUFFIX_SR = 1;
    public const  SUFFIX_JR = 2;
    public const  SUFFIX_II = 3;
    public const  SUFFIX_III = 4;
    public const ACTIVE = 1;
    public const INACTIVE = 0;
    public const MARRIED = 1;
    public const UNMARRIED = 0;

    public const VEHICLE_CARS_TK = 1;
    public const VEHICLE_MOTORCYCLE = 2;
    public const VEHICLE_WATERCRAFT = 3;
    public const VEHICLE_AIRCRAFT = 4;
    public const VEHICLE_MOTOR_HOME = 5;
    public const VEHICLE_RECREATINAL_VEHICLE = 6;

    public const CHECKING_ACNT = 1;
    public const SAVING_ACNT = 2;
    public const CHECKING_SAVING_ACNT = 3;
    public const CERTIF_DEPT = 4;
    public const OTHER_FINANCIAL = 5;

    public const ACT_TYPE_401K=1;
    public const ACT_TYPE_PENSION_PLAN = 2;
    public const ACT_TYPE_IRA = 3;
    public const ACT_TYPE_KEOGH = 4;
    public const ACT_TYPE_ADDITIONAL = 5;
    public const ACT_TYPE_RETIREMENT = 6;

    public const SECURITY_ELECTRONIC = 1;
    public const SECURITY_GAS = 2;
    public const SECURITY_ON_RENTAL_UNIT = 3;
    public const SECURITY_PREPAID_RENT = 4;
    public const SECURITY_TELEPHONE = 5;
    public const SECURITY_WATER = 6;
    public const SECURITY_RENTAL_FURNITURE =7;
    public const SECURITY_HEATING_OIL =8;
    public const SECURITY_OTHER =9;

    public const FAMILY_CHILD_SUPPORT = 1;
    public const FAMILY_ALIMONY = 2;
    public const FAMILY_DIVORCE_SETTLEMENT = 3;
    public const FAMILY_PROPERTY_SETTLEMENT = 4;

    public const CLIENT_TYPE_INDIVIDUAL_NOT_MARRIED = 1;
    public const CLIENT_TYPE_INDIVIDUAL_MARRIED = 2;
    public const CLIENT_TYPE_JOINT_MARRIED = 3;
    public const ANDROID_APP_URL = 'https://play.google.com/store/apps/details?id=com.bkassistant.scannerapp';
    public const IOS_APP_URL = 'https://apps.apple.com/us/app/bk-assistant/id1619964805';

    public const PAYROLL_ASSISTANT_TYPE_DEBTOR = 1;
    public const PAYROLL_ASSISTANT_TYPE_CODEBTOR = 2;
    public const PAYROLL_ASSISTANT_TYPE_BOTH = 3;

    public const TEXT_SPACING_SINGLE = 1;
    public const TEXT_SPACING_TWO = 2;
    public const TEXT_SPACING_THREE = 3;

    public const FONT_SIZE_NORMAL = 1;
    public const FONT_SIZE_SMALL = 2;
    public const FONT_SIZE_MEDIUM = 3;
    public const FONT_SIZE_LARGE = 4;

    public const FONT_STYLE_NORMAL = 1;
    public const FONT_STYLE_UPPERCASE = 2;
    public const FONT_STYLE_CAPITALIZE = 3;
    public const FONT_STYLE_LOWERCASE = 4;
    public const DEBTOR_RESIDENTARRAY = ['Current_Mortgage_Statement_1_1', 'Current_Mortgage_Statement_2_1', 'Current_Mortgage_Statement_3_1', 'Current_Mortgage_Statement_1_2', 'Current_Mortgage_Statement_2_2', 'Current_Mortgage_Statement_3_2', 'Current_Mortgage_Statement_1_3','Current_Mortgage_Statement_2_3','Current_Mortgage_Statement_3_3','Current_Mortgage_Statement_1_4','Current_Mortgage_Statement_2_4','Current_Mortgage_Statement_3_4','Current_Mortgage_Statement_1_5','Current_Mortgage_Statement_2_5','Current_Mortgage_Statement_3_5'];
    public const CODEBTOR_VEHICLEARRAY = ['Current_Auto_Loan_Statement', 'Current_Auto_Loan_Statement_1', 'Current_Auto_Loan_Statement_2', 'Current_Auto_Loan_Statement_3', 'Current_Auto_Loan_Statement_4'];
    public const OTHERLOANARRAY = ['Other_Loan_Statement_1','Other_Loan_Statement_2'];
  
    /** Production details *//*
    public const PINWHEEL_API_SECRET = '5abbc87ac5a9cfe48619d2b660ed71ec7fdebf19b00e34caf44b60a408c211cc';
    public const PINWHEEL_API_KEY = '526379371d33947056d55d8f62bac84eb3e346403dee784cb04bba45b212cbf2';
    public const PINWHEEL_API_SERVER = 'api';
    */
    /** Development details */
    public const PINWHEEL_API_SECRET = '60e2b4128547d01fdb8323b39273da9ffa5eb8733c75acb28ebfc299dd3cda96';
    public const PINWHEEL_API_KEY = 'a6f425355a1f367133972cff69a75e43dda199bbf13aa63c1130aa93df800a4e';
    public const PINWHEEL_API_SERVER = 'development';

    public const OWNBY_FORM_VALUES = [2,4];


    public const BASIC_INFO_DASHBOARD_VIDEO = 1;
    public const BASIC_INFO_STEP1_VIDEO = 2;
    public const BASIC_INFO_STEP2_VIDEO = 3;
    public const BASIC_INFO_STEP3_VIDEO = 4;
    public const BASIC_INFO_STEP4_VIDEO = 5;
    public const BASIC_INFO_STEP5_VIDEO = 6;
    public const BASIC_INFO_STEP6_VIDEO = 7;
    public const PROPERTY_DASHBOARD_VIDEO = 8;
    public const PROPERTY_STEP1_VIDEO = 9;
    public const PROPERTY_STEP2_VIDEO = 10;
    public const PROPERTY_STEP3_VIDEO = 11;
    public const PROPERTY_STEP4_VIDEO = 12;
    public const PROPERTY_STEP5_VIDEO = 13;
    public const PROPERTY_STEP6_VIDEO = 14;
    public const DEBT_TAB_VIDEO = 15;
    public const DEBT_TAB_BASIC_VIDEO = 16;
    public const DEBT_TAB_PREMIUM_VIDEO = 17;
    public const INCOME_DEBTOR_EMPLOYEE_VIDEO = 18;
    public const INCOME_CO_DEBTOR_EMPLOYEE_VIDEO = 19;
    public const INCOME_DEBTOR_INCOME_VIDEO = 20;
    public const INCOME_CO_DEBTOR_INCOME_VIDEO = 21;
    public const INCOME_PROFIT_LOSS_PDF_VIDEO = 22;
    public const INCOME_SPOUSE_PROFIT_LOSS_PDF_VIDEO = 23;
    public const EXPENSE_DEBTOR_VIDEO = 24;
    public const EXPENSE_CO_DEBTOR_VIDEO = 25;
    public const SOFA_TAB_VIDEO = 26;
    public const SOFA_TAB_VIDEO_STEP_2 = 70;
    public const SOFA_TAB_VIDEO_STEP_3 = 71;
    public const SOFA_TAB_VIDEO_1 = 48;
    public const SOFA_TAB_VIDEO_2 = 49;
    public const SOFA_TAB_VIDEO_3 = 50;
    public const SOFA_TAB_VIDEO_4 = 51;
    public const INVITE_CLIENT_VIDEO = 27;


    public const MAIN_DOCUMENT_TUTORIAL_VIDEO = 28;
    public const DRIVING_LIC_TUTORIAL_VIDEO = 29;
    public const MORTGAGE_LOAN_TUTORIAL_VIDEO = 30;
    public const AUTO_LOAN_TUTORIAL_VIDEO = 31;
    public const SSN_ITIN_TUTORIAL_VIDEO = 32;

    public const VEHICLE_REGISTRATION_VIDEO = 39;
    public const VEHICLE_INFORMATION_VIDEO = 40;
    public const LAST_YEAR_TAX_RETURN_VIDEO = 41;
    public const YEAR_BEFORE_TAX_RETURN_VIDEO = 42;
    public const MISC_DOCUMENT_VIDEO = 43;
    public const MISC_DOCUMENT_W2_VIDEO = 44;
    public const MISC_DOCUMENT_W2_YEAR_BEFORE_VIDEO = 45;
    public const MAIN_MOBILE_APP_VIDEO = 46;
    public const PAYSTUB_TUTORIAL_VIDEO = 47;

    public const GUIDE_PAGE_TUTORIAL_VIDEO = 33;

    public const LANDING_PAGE_MAIN_VIDEO = 34;
    public const LANDING_PAGE_AFTER_MAIN_VIDEO = 35;
    public const LANDING_PAGE_CREDITORS_VIDEO = 36;
    public const LANDING_PAGE_PAYROLL_VIDEO = 37;
    public const LANDING_PAGE_FULL_APP_VIDEO = 38;


    public const ATTORNEY_DASHBOARD_VIDEO = 52;
    public const ATTORNEY_CLIENT_MANAGEMENT_VIDEO = 53;
    public const ATTORNEY_CLIENT_QUESTIONNAIRE_VIDEO = 54;
    public const ATTORNEY_UPLOAD_CLIENT_DOCUMENT_VIDEO = 55;
    public const ATTORNEY_SEND_RECEIVE_SIGNED_DOC_VIDEO = 56;
    public const ATTORNEY_UPLOAD_CREDIT_REPORT_VIDEO = 57;
    public const ATTORNEY_CREDITORS_CREDIT_REPORT_VIDEO = 58;
    public const ATTORNEY_PAYROLL_ASSISTANT_VIDEO = 59;
    public const ATTORNEY_SPOUSE_PAYROLL_ASSISTANT_VIDEO = 60;
    public const ATTORNEY_ADDITIOANL_DOCUMENT_UPLOAD = 61;
    public const ATTORNEY_CHAT_MANAGEMENT = 62;
    public const ATTORNEY_TRANSACTION_MANAGEMENT = 63;
    public const ATTORNEY_SETTINGS = 64;
    public const LANDING_PAGE_PRICING_PLAN_VIDEO = 65;
    public const ATTORNEY_SETTING_SUBSCRIPTION = 67;
    public const ATTORNEY_SETTING_PETITION_PREP = 68;
    public const ATTORNEY_SETTING_WELCOME_VIDEO = 69;
  

    public const LANDING_PAGE_SUBSCRIPTION_VIDEO = 66;

    //Send/Receive Signed Docs
    //signed_document

    public static function getPinWheelEvents($key = null){
        $arr = [
            'employment.added' => 'employment.added',
            'paystubs.added' => 'paystubs.added',
            'paystubs.documents.added' => 'paystubs.documents.added',
            'paystubs.fully_synced' => 'paystubs.fully_synced',
            'paystubs.ninety_days_synced' => 'paystubs.ninety_days_synced',
            'paystubs.thirty_days_synced' => 'paystubs.thirty_days_synced',
            'paystubs.seven_days_synced' => 'paystubs.seven_days_synced'
        ];

        if($key == null){
            return $arr;
        }

        return static::returnArrValue($arr, $key);
    }

    public static function getSpacingTypeArray($key = null){
        $arr = [
            self::TEXT_SPACING_SINGLE =>  "Single Line",
            self::TEXT_SPACING_TWO => "Two Lines",
            self::TEXT_SPACING_THREE => "Three Lines"
        ];
        if($key == null){
            return $arr;
        }
        return static::returnArrValue($arr, $key);
    }

    public static function getFontSizeArray($key = null){
        $arr=  [
            self::FONT_SIZE_NORMAL =>  "Normal",
            self::FONT_SIZE_SMALL => "Small",
            self::FONT_SIZE_MEDIUM => "Medium",
            self::FONT_SIZE_LARGE => "Large"
        ];
        if($key == null){
            return $arr;
        }
        return static::returnArrValue($arr, $key);
    }

    public static function getFontSizeSelection($code = '')
    {
        $sizearrayList = self::getFontSizeArray();
        return self::createSelectionFromArray($sizearrayList,$code);
    }

    public static function getTextSpacingSelection($code = '')
    {
        $spacingarrayList = self::getSpacingTypeArray();
        return self::createSelectionFromArray($spacingarrayList,$code);
    }

    public static function getFontStyleArray($key = null){
        $arr=  [
            self::FONT_STYLE_NORMAL =>  "Normal",
            self::FONT_STYLE_UPPERCASE => "Uppercase",
            self::FONT_STYLE_CAPITALIZE => "Capitalize",
            self::FONT_STYLE_LOWERCASE  => "Lowercase"
        ];
        if($key == null){
            return $arr;
        }
        return static::returnArrValue($arr, $key);
    }

    public static function getFontStyleSelection($code = '')
    {
        $stylearrayList = self::getFontStyleArray();
        return self::createSelectionFromArray($stylearrayList,$code);
    }

    public static function getClientTypeArray($key = null){
        $arr = [
            static::CLIENT_TYPE_INDIVIDUAL_NOT_MARRIED => "Individual Not Married",
            static::CLIENT_TYPE_INDIVIDUAL_MARRIED => "Individual Married",
            static::CLIENT_TYPE_JOINT_MARRIED => "Joint Married (Additional $12.95)"
        ];

        return static::returnArrValue($arr, $key);
    }

    public static function getPayrollAssistantArray($key = null){
        $arr = [
            0 => "None",
            static::PAYROLL_ASSISTANT_TYPE_DEBTOR => "Debtor 1",
            static::PAYROLL_ASSISTANT_TYPE_CODEBTOR => "Debtor 2 - Spouse",
            static::PAYROLL_ASSISTANT_TYPE_BOTH => "Debtor 1 & 2"
        ];

        return static::returnArrValue($arr, $key);
    }

    public static function getClientTypeLabelArray($key = null){
        $arr = [
            static::CLIENT_TYPE_INDIVIDUAL_NOT_MARRIED => "Individual Not Married",
            static::CLIENT_TYPE_INDIVIDUAL_MARRIED => "Individual Married",
            static::CLIENT_TYPE_JOINT_MARRIED => "Joint Married"
        ];

        return static::returnArrValue($arr, $key);
    }

    public static function getActiveInactiveArray($key = null){
        $arr = [
            static::ACTIVE => "Active",
            static::INACTIVE => "Archived"
        ];

        return static::returnArrValue($arr, $key);
    }

    public static function getClientTypeSelection($code = '')
    {
        $ctypearrayList = self::getClientTypeArray();
        return self::createSelectionFromArray($ctypearrayList,$code);
    }

    public static function getMonthArray($key = null)
    {
        $arr = [];
        foreach(range(1,6) as $val){
            $arr[date("n-Y",mktime(0,0,0,date("m")-$val,1,date("Y")))] =  date("F Y",mktime(0,0,0,date("m")-$val,1,date("Y")));
        }
        return static::returnArrValue($arr, $key);
    }

    public static function getPaystubMonthYearArray($key = null)
    {
        $arr = [];
        foreach(range(0,5) as $val){
            $arr[$val] =  ['yearmonth' => date("Ym",mktime(0,0,0,date("m")-$val,1,date("Y"))), 'displayname' => date("M, Y",mktime(0,0,0,date("m")-$val,1,date("Y")))];
        }
        return static::returnArrValue($arr, $key);
    }

    public static function getMonthYearArray()
    {
        $arr = [];
        foreach(range(1,6) as $val){
            $arr[date("m-Y",mktime(0,0,0,date("m")-$val+1,1,date("Y")))] =  date("M, Y",mktime(0,0,0,date("m")-$val+1,1,date("Y")));
        }
       return  $arr;
    }

    public static function getAttornyMonthYearArray()
    {
        $arr = [];
        foreach(range(1,6) as $val){
            $arr[date("Ym",mktime(0,0,0,date("m")-$val+1,1,date("Y")))] =  date("F Y",mktime(0,0,0,date("m")-$val+1,1,date("Y")));
        }
       return  $arr;
    }

    public static function familySupportArray($key=null, $return = 0)
    {
        $arr = [
            self::FAMILY_CHILD_SUPPORT => "Child support",
            self::FAMILY_ALIMONY => "Alimony and/or maintenance",
            self::FAMILY_DIVORCE_SETTLEMENT => "Divorce settlement",
            self::FAMILY_PROPERTY_SETTLEMENT => "Property settlement"
        ];
        if($return){
            return $arr;
        }
        return static::returnArrValue($arr, $key);
    }


    public static function installmentPaymentArray($key=null)
    {
        $arr = [
            1 => "Car Payment for Vehicle 1",
            2 => "Car Payment for Vehicle 2",
            3 => "Other 1 (Describe)",
            4 => "Other 2 (Describe)",
        ];
        return static::returnArrValue($arr, $key);
    }


    public static function installmentPaymentSelection($code=null)
    {
        $installarrayList = self::installmentPaymentArray();
        return self::createSelectionFromArray($installarrayList,$code);
    }


    public static function getMarriedArray($key=null)
    {
        $arr = [
            self::MARRIED => "Married",
            self::UNMARRIED => "Not Married"
        ];
        return static::returnArrValue($arr, $key);
    }

    public static function getYesNoArray($key=null)
    {
        $arr = [
            self::YES => "Yes",
            self::NO => "No"
        ];
        return static::returnArrValue($arr, $key);
    }

    public static function familySupportSelection($code = '')
    {
        $fsarrayList = self::familySupportArray();
        return self::createSelectionFromArray($fsarrayList,$code);
    }

    public static function securityDepositedArray($key=null, $return = 0){
        $arr = [
            self::SECURITY_ELECTRONIC => "Electric",
            self::SECURITY_GAS => "Gas",
            self::SECURITY_HEATING_OIL => "Heating Oil",
            self::SECURITY_ON_RENTAL_UNIT => "Security deposit on rental unit",
            self::SECURITY_PREPAID_RENT => "Prepaid rent",
            self::SECURITY_TELEPHONE => "Telephone",
            self::SECURITY_WATER => "Water",
            self::SECURITY_RENTAL_FURNITURE => "Rented furniture",
            self::SECURITY_OTHER => "Other"
        ];
        if($return){
            return $arr;
        }
        return static::returnArrValue($arr, $key);
    }

    public static function securityDepositedSelection($code = '')
    {
        $secdeparrayList = self::securityDepositedArray();
        return self::createSelectionFromArray($secdeparrayList,$code);
    }

    public static function accountTypeArray($key=null, $return = 0)
    {
        $arr = [
            self::ACT_TYPE_401K => "401(k) or similar plan",
            self::ACT_TYPE_PENSION_PLAN => "Pension plan",
            self::ACT_TYPE_IRA => "IRA",
            self::ACT_TYPE_RETIREMENT => 'Retirement account',
            self::ACT_TYPE_KEOGH => "Keogh",
            self::ACT_TYPE_ADDITIONAL => "Additional account"
        ];
        if($return){
            return $arr;
        }
        return static::returnArrValue($arr, $key);
    }


    public static function accountTypeSelection($code = '')
    {
        $actypearrayList = self::accountTypeArray();
        return self::createSelectionFromArray($actypearrayList,$code);
    }

    public static function getSuffixArray($key = null)
    {
        $arr = [
            self::SUFFIX_SR => 'Sr.',
            self::SUFFIX_JR => 'Jr.',
            self::SUFFIX_II => 'II',
            self::SUFFIX_III => 'III'
        ];
        return static::returnArrValue($arr, $key);
    }

    public static function returnArrValue($arr, $key)
    {
        if ($key === null) {
            return $arr;
        } elseif (array_key_exists($key, $arr)) {
            return $arr[$key];
        } else {
            return '';
        }
    }

    public static function validate_value($string)
    {
        return (!empty($string))?$string:"";
    }

    public static function formatPrice($val, $numberFormat = 1,  $displaySymbol = 1, $stringFormat = 0)
    {
        $val = (float)($val);
        $currencyValue = 1;
        $currencySymbolLeft = '$';
        $currencySymbolRight = '';
        $val = $val * $currencyValue;
        $sign = '';
        if ($val < 0) {
            $val = abs($val);
            $sign = '-';
        }
        if ($numberFormat && !$stringFormat) {
            $val = number_format($val, 2);
        } else {
            $afterDecimal = $val - floor($val);
            $val = (0 < $afterDecimal ? number_format($val, 2, '.', '') : $val);
        }
        if ($stringFormat) {
            $val = static::numberStringFormat($val);
        }
        if ($displaySymbol) {
            $sign .= ' ';

           return  trim($sign . $currencySymbolLeft . $val . $currencySymbolRight) ;
        }
        return trim($sign . $val);
    }
    public static function numberStringFormat($number)
    {
        $prefixes = 'KMGTPEZY';
        if ($number >= 1000) {
            for ($i = -1; $number >= 1000; ++$i) {
                $number = $number / 1000;
            }
            return floor($number) . $prefixes[$i];
        }
        return $number;
    }

	public static function validate_key_value($key,$string, $returnFormat= "", $allowComma = 0)
    {
        if (!empty($returnFormat) && isset($string[$key])) {
            return self::formatSwitchStatement($key,$string, $returnFormat, $allowComma);
        } else {
            return self::getDefaultValueForKeyValue($key,$string, $returnFormat);
        }
    }
    private static function formatSwitchStatement($key,$string, $returnFormat, $allowComma) {
        switch ($returnFormat) {
            case 'float':
                return self::numberFormatWithComma($key,$string, $allowComma);
                break;
            case 'phone':
                $data = $string[$key];
                return preg_replace('~.*(\d{3})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '$1-$2-$3', $data);
                break;
            case 'comma':
                $data = $string[$key];
                return number_format((float)$data, 2, '.', ',');
                break;

            default:
                return number_format((float)$string[$key], 2, '.', '');
                break;
        }
    }
    private static function numberFormatWithComma($key,$string, $allowComma) {
        if(!$allowComma){
            return number_format((float)$string[$key], 2, '.', '');
        }else{
            return number_format((float)$string[$key], 2, '.', ',');
        }
    }
    private static function getDefaultValueForKeyValue($key,$string, $returnFormat) {
        if(!empty($returnFormat) && $returnFormat == 'float') {
            return (!empty($string[$key])) ? $string[$key] : "0.00";
        }
        return (!empty($string[$key])) ? $string[$key] : "";
    }

    public static function priceFormt($val){
        return number_format((float)$val, 2, '.', '');
    }

    public static function priceFormtWithComma($val){
        $val = str_replace(',', '', $val);
        return isset($val) ? number_format((float)$val, 2, '.', ',') : 0.00;
    }


    public static function ssnFormt($data){
        $ssn = preg_replace('/[^\d]/', '', $data);
        return preg_replace('/^(\d{3})(\d{2})(\d{4})$/', '$1-$2-$3', $ssn);
    }

	public static function validate_key_toggle($key,$string,$match)
    {
        return (isset($string[$key]) && $string[$key] == $match) ? "checked='checked'" : "";
    }
	public static function validate_key_option($key,$string,$match)
    {
        return (isset($string[$key]) && $string[$key]==$match)?"selected='selected'":"";
    }
	public static function validate_key_option_loop($key,$string,$k,$match)
    {
        return (isset($string[$key][$k]) && $string[$key][$k]==$match)?"selected='selected'":"";
    }

    public static function validate_key_loop_value_match($key,$string,$k,$match)
    {
        return  (!empty($string[$key][$k])) && $string[$key][$k] == $match ? 1 :0;
    }

    public static function validate_key_value_match($key,$string,$match)
    {
        return  (!empty($string[$key])) && $string[$key] == $match ? 1 :0;
    }

	public static function validate_key_loop_value($key,$string,$k)
    {
        return  (!empty($string[$key][$k]))?$string[$key][$k]:"";
    }
    public static function validate_key_array_value($k,$string,$key)
    {
        return  (!empty($string[$key][$k]))?$string[$key][$k]:"";
    }
    public static function validate_key_loop_value_exclude_comma($key,$string,$k)
    {
        return  (!empty($string[$key][$k]))? str_replace(",", "", $string[$key][$k]) :"";
    }
    public static function bciString($string)
    {
        return (isset($string) && !empty($string)) ? str_replace(",", "",$string) : '';

    }

    public static function formatPinwheelPrice($price)
    {
        return $price != 0 ? number_format($price/100,2,".", "") : 0;

    }

    public static function validate_key_value_exclude_comma($key,$string)
    {
        return (isset($string[$key]) && !empty($string[$key]))?str_replace(",", "", $string[$key]):"";
    }
	public static function validate_key_loop_toggle($key,$string,$match,$k)
    {
        return (isset($string[$key][$k]) && $string[$key][$k]==$match)?"checked='checked'":"";
    }
	public static function validate_toggle($string,$match)
    {
        return (isset($string) && $string==$match)?"checked='checked'":"";
    }

	public static function key_hide_show($key,$string)
    {
        return (isset($string[$key]) && $string[$key]==0)?"hide-data":"";
    }

	public static function key_hide_show_ownedby($key,$string)
    {
        return (isset($string[$key]) && in_array($string[$key],[2,4]))?"":"hide-data";
    }

    public static function key_hide_show_v($key,$string)
    {
        return (isset($string[$key]) && $string[$key]==1)?"":"hide-data";
    }


	public static function key_hide_show_v2($key,$string)
    {
        return (isset($string[$key]) && $string[$key] ==0) ? "" : "hide-data";
    }

    public static function validateDateFormat($dateString){
        if (!isset($dateString) || empty($dateString)) {
            return false;
        }
        $pattern = "/^([0-9]{1,2})\\/([0-9]{1,2})\\/([0-9]{4})$/";
        if (!preg_match($pattern, $dateString, $matches)){
            return false;
        }

        if (!checkdate($matches[1], $matches[2], $matches[3])){
            return false;
        }

        return true;
    }

	public static function hide_show($string)
    {
        return (isset($string) && $string==0)?"hide-data":"";
    }
	public static function key_display($key,$string)
    {
        return (isset($string[$key]) && $string[$key]==1)?"Yes":"No";
    }

    public static function keyDisplayRemoveYes($key,$string)
    {
        return (isset($string[$key]) && $string[$key]==1) ? "" : ":None";
    }

    public static function current($val)
    {
        return is_array($val) ? current($val) : $val;
    }

    public static function valueFromObjectArray($key,$object,$k)
    {
        return  (!empty($object->$key) && !empty($object->$key[$k])) ? $object->$key[$k] : "";
    }

    public static function valueFromObject($key,$object)
    {
        return  (!empty($object->$key) && !empty($object->$key)) ? $object->$key : "";
    }

    public static function renderJsonError($msg)
    {
        self::dieWithJsonData(0, ['msg' => $msg]);
    }

    public static function renderJsonSuccess($msg, $data = array())
    {
        self::dieWithJsonData(self::SUCCESS, $data + ['msg' => $msg]);

    }

    public static function renderApiError($msg)
    {
       return ['message' => $msg,"status"=> false] + ['data' => null];
    }

    public static function renderApiSuccess($msg, $data = array())
    {
        return $data + ['message' => $msg,"status"=> true];
    }

    public static function dieWithJsonData($status, $data, $convertToString = 0)
    {
        $data['status'] = "0";
        if ($status === self::SUCCESS) {
            $data['status'] = "1";
        } else {
            $data['status'] = $status;
        }

        array_walk_recursive($data, "static::replaceNullWithEmptyString", $convertToString);
        header('Content-Type: application/json; charset=utf-8');
        return(json_encode($data, 0));
    }

    public static function getChapterName($key=null)
    {
        $arr = ['chapter7' => 'Chapter 7','chapter11' => 'Chapter 11','chapter12' => 'Chapter 12','chapter13' => 'Chapter 13'];
        return is_array(static::returnArrValue($arr, $key)) ? '' : static::returnArrValue($arr, $key);
    }


    public static function replaceNullWithEmptyString(&$item, $convertToString)
    {
        if ($convertToString == true) {
            if (is_array($item)) {
                array_walk_recursive($item, "self::replaceNullWithEmptyString", $convertToString);
            }
        }
    }

    public static function getAccountArray($code = '', $return = 0)
    {
        $accntarray = [self::CHECKING_ACNT => "Checking account",
        self::SAVING_ACNT => "Saving account",
        self::CHECKING_SAVING_ACNT => "Checking & Savings account",
        self::CERTIF_DEPT => "Certificates of deposit",
        self::OTHER_FINANCIAL => "Other financial"];
        if($return){
            return $accntarray;
        }
        $acclist='';
        foreach($accntarray as $key => $account){
            $selected = !empty($code) && $code == $key ?  'selected' : '';
            $acclist .= "<option value='".$key."' ".$selected.">".$account."</option>";
        }
        return $acclist;
    }

    public static function getIndex($property){
        $property_type =0;
        if (!empty($property['type_value'])) {
            $property_type = self::getPropertyType($property['type_value']);
        }
        return $property_type;
    }

    public static function getPropertyType($propertyTypeValue) {
        switch ($propertyTypeValue) {
            case 'cash':
                $property_type = 16;
                break;
            case 'bank':
            case 'savings_account':
            case 'other_financial_account':
                $property_type = 17;
                break;
            case 'mutual_funds':
                $property_type = 18;
                break;
            case 'traded_stocks':
                $property_type = 19;
                break;
            case 'government_corporate_bonds':
                $property_type = 20;
                break;
            case 'retirement_pension':
                $property_type = 21;
                break;
            case 'security_deposits':
                $property_type = 22;
                break;
            case 'annuities':
                $property_type = 23;
                break;
            case 'education_ira':
                $property_type = 24;
                break;
            case 'trusts_life_estates':
                $property_type = 25;
                break;
            case 'patents_copyrights':
                $property_type = 26;
                break;
            case 'licenses_franchises':
                $property_type = 27;
                break;
            case 'tax_refunds':
                $property_type = 28;
                break;
            case 'alimony_child_support':
                $property_type = 29;
                break;
            case 'unpaid_wages':
                $property_type = 30;
                break;
            case 'insurance_policies':
                $property_type = 31;
                break;
            case 'inheritances':
                $property_type = 32;
                break;
            case 'injury_claims':
                $property_type = 33;
                break;
            case 'lawsuits':
                $property_type = 34;
                break;
            case 'other_claims':
                $property_type = 35;
                break;
            default:
                $property_type = 36;
                break;
        }

        return $property_type;
    }


    public static function getAccountKeyValue($key = '')
    {
        $arr = [self::CHECKING_ACNT => "Checking account",
        self::SAVING_ACNT => "Saving account",
        self::CHECKING_SAVING_ACNT => "Checking & Savings account",
        self::CERTIF_DEPT => "Certificates of deposit",
        self::OTHER_FINANCIAL => "Other financial"];

        return static::returnArrValue($arr, $key);
    }

    public static function getVehiclesSelections($code = '')
    {
        $varrayList = [
            self::VEHICLE_CARS_TK => "Vehicle (Cars, vans, trucks, tractors, sport utility vehicles)",
            self::VEHICLE_MOTORCYCLE => "Motorcycle",
            self::VEHICLE_WATERCRAFT => "Watercraft",
            self::VEHICLE_AIRCRAFT => "Aircraft",
            self::VEHICLE_MOTOR_HOME => "Motor Home",
            self::VEHICLE_RECREATINAL_VEHICLE => "Recreational Vehicles"
        ];
        return self::createSelectionFromArray($varrayList,$code);
    }


    public static function getVehiclesArray($code = '', $return = 0)
    {

        $arrayList = [
            self::VEHICLE_CARS_TK => "Vehicle (Cars, vans, trucks, tractors, sport utility vehicles)",
            self::VEHICLE_MOTORCYCLE => "Motorcycle",
            self::VEHICLE_WATERCRAFT => "Watercraft",
            self::VEHICLE_AIRCRAFT => "Aircraft",
            self::VEHICLE_MOTOR_HOME => "Motor Home",
            self::VEHICLE_RECREATINAL_VEHICLE => "Recreational Vehicles"
        ];
        if ($return) {
            return $arrayList;
        }

        return static::returnArrValue($arrayList, $code);

    }

    public static function getVehiclesTypeArray($code = '', $return = 0)
    {

        $arrayList = [
            self::VEHICLE_CARS_TK => "Vehicle",
            self::VEHICLE_RECREATINAL_VEHICLE => "Recreational"
        ];
        if ($return) {
            return $arrayList;
        }

        return static::returnArrValue($arrayList, $code);

    }

    public static function irsState($code)
    {
        $item = [
            'code' => 'PA',
            'address_heading' => 'Internal Revenue Service',
            'add1' => 'P.O. Box 7346',
            'add2' => 'Philadelphia, PA 19101',
            'city'=> 'Philadelphia',
            'zip' => '19101'
           ];

           if($code==null){
               return $item;
           }
            if($code == $item['code']){
                return $item;
            }

           return [];
    }

    public static function lastchar($str)
    {
        $n = 4;
        $start = strlen($str) - $n;
        return substr($str, $start);
    }

    public static function getDebtCardSelections()
    {
        return [''=>"Choose Debt",'2'=>"Credit Card Debt (Such as Visa, Mastercard, American Express, etc.)",'3'=>"Collection, Past Due, and/or Charged Off Account",'4'=>"Other Debt (Any type of unsecured debt not already listed)",'5'=>"Student Loan",'6'=>"Law Suit (Pending or concluded as judgment)",'7'=>"Cash Advances"];
    }

    public static function getDebtCardSelectionsForAttorney()
    {
       return ['1'=>"Choose Debt",'2'=>"Credit card purchases",'3'=>"Collection Account",'4'=>"Other Debt",'5'=>"Student Loan",'6'=>"Law Suit",'7'=>"Cash Advances"];
    }

    public static function getArrayByKey($key, $array)
    {
        foreach($array as $doc){
            if ($doc['document_type'] == $key) {
                return $doc;
            }
        }
        return [];
    }

    public static function getArrayByKeyArray($key, $arraylist,$name)
    {
        $images = [];
        foreach($arraylist as $doc){
            if ($doc['document_type'] == $key) {
                if(in_array($key,\App\Models\ClientDocumentUploaded::MULTIPLE_DOC_ALLOWED_FOR)){
                    $doc['document_name'] = $name;
                    array_push($images, $doc);
                }else{
                   return $doc;

                }
            }
        }
        return $images;

    }

    public static function getUnreadNotificationCount()
    {
        $count = 0;
        if (Auth::user()->role == \App\Models\USER::CLIENT) {
            $count = Auth::user()->notifications_count;
        }

        return $count;
    }

    public static function getDocuments($clientType, $includeproperty = 0, $includesub= 0)
    {
        $docs = [];
        switch ($clientType) {
            case Helper::CLIENT_TYPE_INDIVIDUAL_NOT_MARRIED:
                $docs = \App\Models\ClientDocumentUploaded::getNotMarriedDocuments($includesub);
                break;
            case Helper::CLIENT_TYPE_INDIVIDUAL_MARRIED:
                $docs =  \App\Models\ClientDocumentUploaded::getIndividualMarriedDocuments($includesub);
                break;
            case Helper::CLIENT_TYPE_JOINT_MARRIED:
                $docs = \App\Models\ClientDocumentUploaded::getJointMarriedDocuments($includesub);
                break;
            default:
               $docs = [];
                break;
        }
        if ($includeproperty) {
            $docs = $docs+self::propertyTypes();
        }
        return  $docs;
    }

    public static function dbDateToDisplay($db_date, $includeTime = false){
        $timeFormat ='';
        if(in_array($db_date,['','0000-00-00','0000-00-00 00:00:00'])){
            return '';
        }
        if($includeTime){
            $timeFormat = ' h:i:s a';
        }
       return date('m/d/Y'.$timeFormat ,strtotime($db_date));
    }

    public static function propertyTypes()
    {
        return self::getResidence()+self::getVehicle();

    }

    public static function getVehicle()
    {
        return \App\Models\ClientDocumentUploaded::getAutoloanKeyValue();
    }
    public static function getVehicleForAppSelection()
    {
        return \App\Models\ClientDocumentUploaded::getAutoloanKeyValueForAppSelection();
    }

    public static function getResidence()
    {
       return \App\Models\ClientDocumentUploaded::getResidenceKeyValue();
    }

    public static function getDocumentImage($key=null)
    {
        $arr = \App\Models\ClientDocumentUploaded::getDocumentTypes();
        return Helper::returnArrValue($arr, $key);
    }

    public static function getMiscDocs()
    {
        return \App\Models\ClientDocumentUploaded::getMiscDocs();
    }

    public static function getAllDocument()
    {
        return \App\Models\ClientDocumentUploaded::getAllDocuments();
    }

    public static function Attachment_upload($request){

        $validate = Validator::make($request->all(),[
                'attachment' => 'required|mimes:jpg,jpeg,png|max:20480',
                'to_user_id' => 'required',
            ],[
                'attachment.required' => 'Please upload file.',
                'attachment.max' => 'Attachment size should not be greater than 20MB.',
                'attachment.mimes' => 'Attachment type should be jpg, jpeg, png.',
                'to_user_id.required' => 'Please enter to user id.',
            ]
        );

        if($validate->fails()){
            return response()->json(['message' => $validate->errors()->first()],422);
        }
        $extension = '.' . $request->file('attachment')->getClientOriginalExtension();

        $destination_path = storage_path() . DIRECTORY_SEPARATOR . env('CHAT_STORAGE_FILE');
        $image_name = date('mdYHis') . rand(10,1000) . uniqid() . $extension;

        $image = $request->file('attachment');
        $image->move($destination_path,$image_name);
        return response()->json(['message' => 'success', 'data' => $image_name],200);
    }

    public static function client_chat_global(){
        $admin = \App\Models\User::first();
        $attorney = Auth::user();
        $pluck_attroney_clients_ids = \App\Models\ClientsAttorney::whereAttorneyId($attorney->id)->pluck('client_id');
        $pluck_attroney_clients_ids = collect($pluck_attroney_clients_ids)->merge([$admin->id]);
        $authUserId = $attorney->id;
        $clients= \App\Models\User::select('users.id','users.name','users.role','users.socket_id','messages.message as message','messages.sent_at',DB::raw("(CASE WHEN messages.type = 2 THEN 'Image' ELSE messages.message END ) AS 'message'"),DB::raw("(SELECT COUNT(*) FROM messages WHERE (messages.to_user_id = '$authUserId') AND (messages.from_user_id = users.id) AND messages.status = 1) as unread_count")
          )
          ->whereIn('users.id',$pluck_attroney_clients_ids)
          ->leftJoin('messages', function($query) use ($authUserId){
              $query->on('messages.id', DB::raw("(SELECT MAX(messages.id) FROM messages WHERE (messages.from_user_id = '$authUserId' OR messages.to_user_id = '$authUserId') AND (messages.from_user_id = users.id OR messages.to_user_id = users.id))"));
          })->orderBy('messages.sent_at', 'DESC')->get();

         return ['clients' => $clients, 'attorney' => $attorney, 'admin' => $admin];
    }

    public static function find_client_attorney_id(){
		$client_id = Auth::user()->id;
		$find_client_attorney = \App\Models\ClientsAttorney::whereClientId($client_id)->first();
        $find_attorney =  \App\Models\ClientsAttorney::with('getuserattorney')->whereClientId($client_id)->first();
        if(!empty($find_attorney)){
            $find_client_attorney['attorney_username'] = $find_attorney->getuserattorney->name;
        }

		return $find_client_attorney;
	}

    public static function AdminAttorneyChatListing()
    {
        $authUserId = Auth::user()->id;
        $attorney= \App\Models\User::select('users.id','users.name','users.socket_id','messages.message as message','messages.sent_at',DB::raw("(CASE WHEN messages.type = 2 THEN 'Image' ELSE messages.message END ) AS 'message'"),DB::raw("(SELECT COUNT(*) FROM messages WHERE (messages.to_user_id = '$authUserId') AND (messages.from_user_id = users.id) AND messages.status = 1) as unread_count")
        )
        ->where('users.role', \App\Models\User::ATTORNEY)
        ->leftJoin('messages', function($query) use ($authUserId){
            $query
            ->on('messages.id', DB::raw("(SELECT MAX(messages.id) FROM messages WHERE (messages.from_user_id = '$authUserId' OR messages.to_user_id = '$authUserId') AND (messages.from_user_id = users.id OR messages.to_user_id = users.id))"));
        })->orderBy('messages.sent_at', 'DESC')->get();
         return $attorney;
    }


    /*public static function getSubscriptionRadioButtons($code='')
    {
        $arrayList = \App\Models\AttorneySubscription::packageNameArray();
        $list='';
        foreach($arrayList as $key => $value){
            $selected = !empty($code) && $code == $key ?  'selected' : '';
            $list .= "<option value='".$key."' ".$selected.">".$value."</option>";
        }
        return $list;
    }*/

    public static function getPayrollAssitantSelection($code='')
    {
        $rollarrayList =self::getPayrollAssistantArray();
        return self::createSelectionFromArray($rollarrayList,$code);
    }

    public static function getIncomeDescArray($array=array())
    {
        if(empty($array))
        {
            return $array;
        }
        if(isset($array['profit_loss_type']) && $array['profit_loss_type'] == 1){
            return [];
        }
        uasort($array, function($a, $b){
            $ascending = false;
            $format   = 'm-Y';
            $zone = new DateTimeZone('UTC');
            $d1 = DateTime::createFromFormat($format, $a['profit_loss_month'], $zone)->getTimestamp();
            $d2 = DateTime::createFromFormat($format, $b['profit_loss_month'], $zone)->getTimestamp();
            return $ascending ? ($d1 - $d2) : ($d2 - $d1);
        });

        return $array;
    }



    // Chat GLOBAL FUNCTIONS END

    public static function getTitleAndDescription()
    {
        if(request()->routeIs('register')){
            return [
                "title" => "Register | Register now to manage your account and invite your clients to our system.",
                "description" => "Register now to manage your account and invite your clients to our system."
            ];
        }else if(request()->routeIs('login')){
            return [
                "title" => "Attorney Login | Manage account and invite client",
                "description" => "Login into your attorney dashboard to manage your clients."
            ];
        }else if(request()->routeIs('client_login')){
            return [
                "title" => "Client Login | Login to manage your client account",
                "description" => "Login into your client dashboard to manage your questionnaire."
            ];
        }else if(request()->routeIs('facts')){
            return [
                "title" => "Facts | Why BK Assistant's software is unique?",
                "description" => "Our software was developed by bankruptcy paralegals, not attorneys or software engineers. The reason that’s important is in most law firms, the legal assistants and paralegals are getting the questionnaires filled out and all documents from the clients."
            ];
        }else if(request()->routeIs('about')){
            return [
                "title" => "About | Why BK Assistant's software is unique?",
                "description" => "Our software was developed by bankruptcy paralegals, not attorneys or software engineers. The reason that’s important is in most law firms, the legal assistants and paralegals are getting the questionnaires filled out and all documents from the clients."
            ];
        }else{
            return [
                "title" => "BK Assistant | Welcome To BK Assistant, Inc.",
                "description" => "Bringing 21st Century Technology To The Bankruptcy Business"
            ];
        }
    }

    public static function schD($key)
    {
        $arr = [
        1=>[
            'noBox' => '',
            'checkIfClaimRelatesTo' => 'Check if this claim relates to a',
            'debtorA' => 'check 2',
            'debtorB' => 'check 2',
            'debtorC' => 'check 2',
            'debtorD' => 'check 2',
            'debtor1' => 'debtor 1',
            'debtor2' => 'debtor 2',
            'debtor1and2' => 'Debtor 1 and 2',
            'debtorOneOrAnother' => 'One of debtors and another',
            'last4Digits' => 'account number',
            'columnA' => 'undefined',
            'columnB' => 'undefined_2',
            'columnC' => 'undefined_3',
            'propertyClaim' => 'As of the date you file the claim is Check all that apply',
            'contingent' => 'Contingent',
            'inliquidated' => 'Unliquidated',
            'disputed' => 'Disputed',
            'anAgreementYouMade' => 'An agreement you made such as mortgage or secured',
            'statutoryLien' => 'Statutory lien such as tax lien mechanics lien',
            'judgementLien' => 'Judgment lien from a lawsuit',
            'otherRightToOffset' => 'Other including a right to offset',
            'otherTextField' => 'undefined_4',
            ],
            2 => [
            'noBox' => '',
            'checkIfClaimRelatesTo' => 'Check if this claim relates to a_2',
            'debtorA' => 'check 3',
            'debtorB' => 'check 3',
            'debtorC' => 'check 3',
            'debtorD' => 'check 3',
            'debtor1' => 'debtor 1',
            'debtor2' => 'debtor 2',
            'debtor1and2' => 'debtor 1 and 2',
            'debtorOneOrAnother' => 'One of debtors and another',
            'last4Digits' => 'account number 2',
            'columnA' => 'undefined_5',
            'columnB' => 'undefined_6',
            'columnC' => 'undefined_7',
            'propertyClaim' => 'As of the date you file the claim is Check all that apply_2',
            'contingent' => 'Contingent_2',
            'inliquidated' => 'Unliquidated_2',
            'disputed' => 'Disputed_2',
            'anAgreementYouMade' => 'An agreement you made such as mortgage or secured_2',
            'statutoryLien' => 'Statutory lien such as tax lien mechanics lien_2',
            'judgementLien' => 'Judgment lien from a lawsuit_2',
            'otherRightToOffset' => 'Other including a right to offset_2',
            'otherTextField' => 'undefined_8',
            ]];
        return static::returnArrValue($arr, $key);
     }

     private static function partD1Node1()
     {
         return [
             'noBox' => 'undefined_12',
             'checkIfClaimRelatesTo' => 'Check if this claim relates to a_3',
             'debtorA' => 'check 4',
             'debtorB' => 'check 4',
             'debtorC' => 'check 4',
             'debtorD' => 'check 4',
             'debtor1' => 'debtor 1',
             'debtor2' => 'debtor 2',
             'debtor1and2' => 'Debtor 1 and 2',
             'debtorOneOrAnother' => 'One of debtors and another',
             'last4Digits' => 'account number 3',
             'columnA' => 'undefined_10',
             'columnB' => 'undefined_13',
             'columnC' => 'undefined_15',
             'propertyClaim' => 'As of the date you file the claim is Check all that apply_3',
             'contingent' => 'Contingent_3',
             'inliquidated' => 'Unliquidated_3',
             'disputed' => 'Disputed_3',
             'anAgreementYouMade' => 'An agreement you made such as mortgage or secured_3',
             'statutoryLien' => 'Statutory lien such as tax lien mechanics lien_3',
             'judgementLien' => 'Judgment lien from a lawsuit_3',
             'otherRightToOffset' => 'Other including a right to offset_3',
             'otherTextField' => 'undefined_11',
         ];
     }
    private static function partD1Node2($type="")
    {
        return [
            'noBox' => 'undefined_19.1',
            'checkIfClaimRelatesTo' => 'Check if this claim relates to a_4',
            'debtorA' => (($type=="D1") ? 'check 5' : ''),
            'debtorB' => '',
            'debtorC' => '',
            'debtorD' => '',
            'debtor1' => (($type=="D1") ? 'On' : ''),
            'debtor2' => '',
            'debtor1and2' => '',
            'debtorOneOrAnother' => '',
            'last4Digits' => 'account number 4',
            'columnA' => 'undefined_14',
            'columnB' => 'undefined_17',
            'columnC' => 'undefined_18',
            'propertyClaim' => 'As of the date you file the claim is Check all that apply_4',
            'contingent' => 'Contingent_4',
            'inliquidated' => 'Unliquidated_4',
            'disputed' => 'Disputed_4',
            'anAgreementYouMade' => 'An agreement you made such as mortgage or secured_4',
            'statutoryLien' => 'Statutory lien such as tax lien mechanics lien_4',
            'judgementLien' => 'Judgment lien from a lawsuit_4',
            'otherRightToOffset' => 'Other including a right to offset_4',
            'otherTextField' => 'undefined_16'
        ];
    }
     private static function partD1Node3()
     {
         return [
             'noBox' => 'undefined_19.2',
             'checkIfClaimRelatesTo' => 'Check if this claim relates to a_5',
             'debtorA' => 'Debtor 1 only_5',
             'debtorB' => 'Debtor 2 only_5',
             'debtorC' => 'Debtor 1 and Debtor 2 only_5',
             'debtorD' => 'At least one of the debtors and another_5',
             'debtor1' => 'On',
             'debtor2' => 'On',
             'debtor1and2' => 'On',
             'debtorOneOrAnother' => 'On',
             'last4Digits' => 'account number 5',
             'columnA' => 'undefined_20',
             'columnB' => 'undefined_22',
             'columnC' => 'undefined_25',
             'propertyClaim' => 'As of the date you file the claim is Check all that apply_5',
             'contingent' => 'Contingent_5',
             'inliquidated' => 'Unliquidated_5',
             'disputed' => 'Disputed_5',
             'anAgreementYouMade' => 'An agreement you made such as mortgage or secured_5',
             'statutoryLien' => 'Statutory lien such as tax lien mechanics lien_5',
             'judgementLien' => 'Judgment lien from a lawsuit_5',
             'otherRightToOffset' => 'Other including a right to offset_5',
             'otherTextField' => 'undefined_21'
         ];
     }

     public static function partD1($key)
     {
         $arr =
             [
              1 => self::partD1Node1(),
              2 => self::partD1Node2('D1'),
              3 => self::partD1Node3()
             ];

             return static::returnArrValue($arr, $key);
     }

     public static function partDStep1($key)
     {
         $arr = [
             1 => self::partD1Node1(),
             2 => self::partD1Node2('D1'),
             3 => self::partD1Node3()
         ];

         return static::returnArrValue($arr, $key);
     }

    public static function schDStep2($key)
    {

        $arr = [
            1 => ['noBox' => 'be notified for any debts in Part 1 do not fill out or submit this page.0',
                'name' => 'Name',
                'street' => 'Number_6',
                'city' => 'Street 2',
                'state' => 'Street 3',
                'zip' => 'Street 4',
                'lineCreditor' => 'On which line in Part 1 did you enter the creditor',
                'Last4Digit' => 'account number 6',
            ],
            2 => [
                'noBox' => '1',
                'name' => 'Name_2',
                'street' => 'Number_7',
                'city' => 'Street 2_2',
                'state' => 'Street 3_2',
                'zip' => 'Street 4_2',
                'lineCreditor' => 'undefined_26',
                'Last4Digit' => 'account number 7',
            ],
            3 => [
                'noBox' => 'be notified for any debts in Part 1 do not fill out or submit this page.2',
                'name' => 'Name_3',
                'street' => 'Number_8',
                'city' => 'Street 2_3',
                'state' => 'Street 3_3',
                'zip' => 'Street 4_3',
                'lineCreditor' => 'undefined_27',
                'Last4Digit' => 'account number 8',
            ],
            4 => [
                'noBox' => 'be notified for any debts in Part 1 do not fill out or submit this page.3',
                'name' => 'Name_4',
                'street' => 'Number_9-106',
                'city' => 'Street 2_4',
                'state' => 'Street 3_4',
                'zip' => 'Street 4_4',
                'lineCreditor' => 'On which line in Part 1 did you enter the creditor_4',
                'Last4Digit' => 'account number',
            ],
            5 => [
                'noBox' => 'be notified for any debts in Part 1 do not fill out or submit this page.4.0',
                'name' => 'Name_5',
                'street' => 'Number_10',
                'city' => 'Street 2_5',
                'state' => 'Street 3_5',
                'zip' => 'Street 4_5',
                'lineCreditor' => 'On which line in Part 1 did you enter the creditor_5',
                'Last4Digit' => 'account number 10',
            ],
            6 => [
                'noBox' => 'be notified for any debts in Part 1 do not fill out or submit this page.4.1',
                'name' => 'Name_6',
                'street' => 'Number_11',
                'city' => 'Street 2_6',
                'state' => 'Street 3_6',
                'zip' => 'Street 4_6',
                'lineCreditor' => 'On which line in Part 1 did you enter the creditor_6',
                'Last4Digit' => 'account number 11',
            ]];

            return static::returnArrValue($arr, $key);
    }

    public static function getEFPage1($key){
        $arr = [ 1=> [
            "noBox" 				=> 'temp',
            "creditorName"			=> 'Creditors Name',
            "addressLineA"			=> 'Street',
            "addressLineB" 			=> '1',
            "city" 					=> '2',
            "state" 				=> '3',
            "zip"					=> '4',
            "last4Digits" 			=> 'account number',
            "whenDebtIncurred"		=> 'Date debt was incurred',
            "priorityTypeA" 		=> 'Domestic support obligations',
            "priorityTypeB" 		=> 'Taxes and ceratin other debts you owe the government',
            "priorityTypeC" 		=> 'Claims for death or personal injury while intoxicated',
            "priorityTypeD" 		=> 'Other',
            "priorityTypeOtherText"	=> 'Other unsecurecured claim 2.1',
            "totalClaim"			=> 'undefined',
            "priorityAmount" 		=> 'undefined_2',
            "nonpriorityAmount"		=> 'undefined_3',
            "debtor"				=> 'check 1',
            "debtorA"				=> 'debtor 1',
            "debtorB"				=> 'debtor 2',
            "debtorAandB"			=> 'Debtor 1 and 2',
            "debtorOneOrAnother" 	=> 'One of debtors and another',
            "checkIfThisClaim"	    => 'Check if this claim relates to a',
            "claimSubjectToOffset" 	=> 'check2',
            "contingent"			=> 'Contingent',
            "unliquidated" 			=> 'Unliquidated',
            "disputed"				=> 'Disputed',
        ],
         2 => [
            "noBox" 				=> 'temp',
            "creditorName"			=> 'Creditors Name_2',
            "addressLineA"			=> 'Street_2',
            "addressLineB" 			=> '1_2',
            "city" 					=> '2_2',
            "state" 				=> '3_2',
            "zip"					=> 'fill_27.0',
            "last4Digits" 			=> 'account number 2',
            "whenDebtIncurred"		=> 'Date debt was incurred_2',
            "priorityTypeA" 		=> 'Domestic support obligations_2',
            "priorityTypeB" 		=> 'Taxes and ceratin other debts you owe the government_2',
            "priorityTypeC" 		=> 'Claims for death or personal injury while intoxicated_2',
            "priorityTypeD" 		=> 'Other_2',
            "priorityTypeOtherText"	=> 'Other unsecurecured claim 2.2',
            "totalClaim"			=> 'undefined_5',
            "priorityAmount" 		=> 'undefined_6',
            "nonpriorityAmount"		=> 'undefined_7',
            "debtor"				=> 'check 2',
            "debtorA"				=> 'debtor 1',
            "debtorB"				=> 'debtor 2',
            "debtorAandB"			=> 'debtor 1 and 2',
            "debtorOneOrAnother" 	=> 'One of debtors and another',
            "checkIfThisClaim"	    => 'Check if this claim relates to a_2',
            "claimSubjectToOffset" 	=> 'check3',
            "contingent"			=> 'Contingent_2',
            "unliquidated" 			=> 'Unliquidated_2',
            "disputed"				=> 'Disputed_2',
         ]];
         return static::returnArrValue($arr, $key);

    }


    public static function SchdEFPage2($key){
        $arr = [
            1 => [
            "noBox"					=> 'undefined_12',
            "creditorName"			=> 'Creditors Name_3',
            "addressLineA"			=> 'Street_3',
            "addressLineB" 			=> '1_3',
            "city" 					=> '2_3',
            "state" 				=> '3_3',
            "zip"					=> '4_3',
            "last4Digits" 			=> 'account number 3',
            "whenDebtIncurred"		=> 'Date debt was incurred_3',
            "priorityTypeA" 		=> 'Domestic support obligations_3',
            "priorityTypeB" 		=> 'Taxes and ceratin other debts you owe the government_3',
            "priorityTypeC" 		=> 'Claims for death or personal injury while intoxicated_3',
            "priorityTypeD" 		=> 'Other_3',
            "priorityTypeOtherText"	=> 'Other unsecurecured claim 2.3',
            "totalClaim"			=> 'undefined_10',
            "priorityAmount" 		=> 'undefined_13',
            "nonpriorityAmount"		=> 'undefined_15',
            "debtor"				=> 'check 3',
            "debtorA"				=> 'debtor 1',
            "debtorB"				=> 'debtor 2',
            "debtorAandB"			=> 'Debtor 1 and 2',
            "debtorOneOrAnother" 	=> 'One of debtors and another',
            "checkIfThisClaim"	    => 'Check if this claim relates to a_3',
            "claimSubjectToOffset" 	=> 'check4',
            "contingent"			=> 'Contingent_3',
            "unliquidated" 			=> 'Unliquidated_3',
            "disputed"				=> 'Disputed_3',
            ],
            2 => [
            "noBox" 				=> 'undefined_19.mid',
            "creditorName"			=> 'Creditors Name_4',
            "addressLineA"			=> 'Street_4',
            "addressLineB" 			=> '1_4',
            "city" 					=> '2_4',
            "state" 				=> '3_4',
            "zip"					=> '4_4',
            "last4Digits" 			=> 'account number 4',
            "whenDebtIncurred"		=> 'Date debt was incurred_4',
            "priorityTypeA" 		=> 'Domestic support obligations_4',
            "priorityTypeB" 		=> 'Taxes and ceratin other debts you owe the government_4',
            "priorityTypeC" 		=> 'Claims for death or personal injury while intoxicated_4',
            "priorityTypeD" 		=> 'Other_4',
            "priorityTypeOtherText"	=> 'Other unsecurecured claim 2.4',
            "totalClaim"			=> 'undefined_14',
            "priorityAmount" 		=> 'undefined_17',
            "nonpriorityAmount"		=> 'undefined_18',
            "debtor"				=> 'check 4',
            "debtorA"				=> 'debtor 1',
            "debtorB"				=> 'debtor 2',
            "debtorAandB"			=> 'debtor 1 and 2',
            "debtorOneOrAnother" 	=> 'On',
            "checkIfThisClaim"	    => 'Check if this claim relates to a_4',
            "claimSubjectToOffset" 	=> 'check5',
            "contingent"			=> 'Contingent_4',
            "unliquidated" 			=> 'Unliquidated_4',
            "disputed"				=> 'Disputed_4',
            ],
            3 => [
            "noBox" 				=> 'undefined_19.low',
            "creditorName"			=> 'Creditors Name_5',
            "addressLineA"			=> 'Street_5',
            "addressLineB" 			=> '1_5',
            "city" 					=> '2_5',
            "state" 				=> '3_5',
            "zip"					=> '4_5',
            "last4Digits" 			=> 'account number 5',
            "whenDebtIncurred"		=> 'Date debt was incurred_5',
            "priorityTypeA" 		=> 'Domestic support obligations_5',
            "priorityTypeB" 		=> 'Taxes and ceratin other debts you owe the government_5',
            "priorityTypeC" 		=> 'Claims for death or personal injury while intoxicated_5',
            "priorityTypeD" 		=> 'Other_5',
            "priorityTypeOtherText"	=> 'Other unsecurecured claim 2.5',
            "totalClaim"			=> 'undefined_20',
            "priorityAmount" 		=> 'undefined_22',
            "nonpriorityAmount"		=> 'undefined_25',
            "debtor"				=> 'check 5',
            "debtorA"				=> 'debtor 1',
            "debtorB"				=> 'debtor 2',
            "debtorAandB"			=> 'debtor 1 and 2',
            "debtorOneOrAnother" 	=> 'one of debtors and another',
            "checkIfThisClaim"	    => 'Check if this claim relates to a_5',
            "claimSubjectToOffset" 	=> 'check6',
            "contingent"			=> 'Contingent_5',
            "unliquidated" 			=> 'Unliquidated_5',
            "disputed"				=> 'Disputed_5',
            ]
        ];
        return static::returnArrValue($arr, $key);
    }
    public static function schedule_ef_part2_page1($key)
    {
        $arr = [
            1=>[
                'box_no'                        => 'undefined_4.4',
                'name'                          => 'Creditors Name_6',
                'last_4_digits'                 => 'account number 6',
                'total_claim'                   => 'Total_26',
                'street'                        => 'Street_6',
                'debt_incurred'                 => 'Date debt was incurred_6',
                'city'                          => 'City 4.1',
                'state'                         => 'State 4.1',
                'zip'                           => 'Zip 4.1',
                'contingent_checkbox'           => 'Contingent_6',
                'unliquidated_checkbox'         => 'Unliquidated_6',
                'disputed_checkbox'             => 'Disputed_6',
                'debtor_radio'                  => 'check 6',
                'debtor_A'                      => 'debtor 1',
                'debtor_B'                      => 'debtor 2',
                'debtor_A_and_B'                => 'debtor 1 and 2',
                'debtor_one_or_another'         => 'On',
                'student_checkbox'              => 'Student loans_6',
                'obligations_checkbox'          => 'Obligations arising out of divorce_6',
                'check_if_this_clain_checkbox'  => 'Check if this claim relates to a_6',
                'debt_checkbox'                 => 'Debts in pension plans_6',
                'other_checkbox'                => 'Other_9',
                'other_textbox'                 => 'Other unsecurecured claim 4.1',
                'claim_subject_radio'           => 'check8',
                'value_no'                      => 'no',
                'value_yes'                     => 'yes',
                'value_on'                      => 'On',
                'page_no'                       => 'fill_27.1.2',
                'total_page'                    => 'fill_27.1.3',
            ],
            2=>[
                'box_no'                        => 'undefined_4.5',
                'name'                          => 'Creditors Name_7',
                'last_4_digits'                 => 'account number 7',
                'total_claim'                   => 'Total_27',
                'street'                        => 'Street_7',
                'debt_incurred'                 => 'Date debt was incurred_7',
                'city'                          => 'City 4.2',
                'state'                         => 'State 4.2',
                'zip'                           => 'Zip 4.2',
                'contingent_checkbox'           => 'Contingent_7',
                'unliquidated_checkbox'         => 'Unliquidated_7',
                'disputed_checkbox'             => 'Disputed_7',
                'debtor_radio'                  => 'check 7',
                'debtor_A'                      => 'debtor 1',
                'debtor_B'                      => 'debtor 2',
                'debtor_A_and_B'                => 'debtor 1 and 2',
                'debtor_one_or_another'         => 'On',
                'student_checkbox'              => 'Student loans_7',
                'obligations_checkbox'          => 'Obligations arising out of divorce_7',
                'check_if_this_clain_checkbox'  => 'Check if this claim relates to a_7',
                'debt_checkbox'                 => 'Debts in pension plans_7',
                'other_checkbox'                => 'Other_10',
                'other_textbox'                 => 'Other unsecurecured claim 4.2',
                'claim_subject_radio'           => 'check9',
                'value_no'                      => 'no',
                'value_yes'                     => 'yes',
                'value_on'                      => 'On',
                'page_no'                       => 'fill_27.1.2',
                'total_page'                    => 'fill_27.1.3',
            ],
            3=>[
                'box_no'                        => 'undefined_4.6',
                'name'                          => 'Creditors Name_8',
                'last_4_digits'                 => 'account number 8',
                'total_claim'                   => 'Total_28',
                'street'                        => 'Street_8',
                'debt_incurred'                 => 'Date debt was incurred_8',
                'city'                          => 'City 4.3',
                'state'                         => 'State 4.3',
                'zip'                           => 'Zip 4.3',
                'contingent_checkbox'           => 'Contingent_8',
                'unliquidated_checkbox'         => 'Unliquidated_8',
                'disputed_checkbox'             => 'Disputed_8',
                'debtor_radio'                  => 'check 8',
                'debtor_A'                      => 'debtor 1',
                'debtor_B'                      => 'debtor 2',
                'debtor_A_and_B'                => 'debtor 1 and 2',
                'debtor_one_or_another'         => 'On',
                'student_checkbox'              => 'Student loans_8',
                'obligations_checkbox'          => 'Obligations arising out of divorce_8',
                'check_if_this_clain_checkbox'  => 'Check if this claim relates to a_8',
                'debt_checkbox'                 => 'Debts in pension plans_8',
                'other_checkbox'                => 'Other_11',
                'other_textbox'                 => 'Other unsecurecured claim 4.3',
                'claim_subject_radio'           => 'check10',
                'value_no'                      => 'no',
                'value_yes'                     => 'yes',
                'value_on'                      => 'On',
                'page_no'                       => 'fill_27.1.2',
                'total_page'                    => 'fill_27.1.3',
            ],
        ];
        return static::returnArrValue($arr, $key);
     }

public static function schedule_ef_part2($key)
    {
        $arr = [
            1=>[
                'box_no'                        => 'undefined_4.1',
                'name'                          => 'Creditors Name_9',
                'last_4_digits'                 => 'account number 9',
                'total_claim'                   => 'Total_29',
                'street'                        => 'Street_9',
                'debt_incurred'                 => 'Date debt was incurred_9',
                'city'                          => 'City 4.4',
                'state'                         => 'State 4.4',
                'zip'                           => 'Zip 4.4',
                'contingent_checkbox'           => 'Contingent_9',
                'unliquidated_checkbox'         => 'Unliquidated_9',
                'disputed_checkbox'             => 'Disputed_9',
                'debtor_radio'                  => 'check 9',
                'debtor_A'                      => 'debtor 1',
                'debtor_B'                      => 'debtor 2',
                'debtor_A_and_B'                => 'debtor 1 and 2',
                'debtor_one_or_another'         => 'On',
                'student_checkbox'              => 'Student loans_9',
                'obligations_checkbox'          => 'Obligations arising out of divorce_9',
                'check_if_this_clain_checkbox'  => 'Check if this claim relates to a_9',
                'debt_checkbox'                 => 'Debts in pension plans_9',
                'other_checkbox'                => 'Other_6',
                'other_textbox'                 => 'Other unsecurecured claim 4.4',
                'claim_subject_radio'           => 'check11',
                'value_no'                      => 'no',
                'value_yes'                     => 'yes',
                'value_on'                      => 'On',
                'page_no'                       => 'fill_27.1.4',
                'total_page'                    => 'fill_27.1.5',
            ],
            2=>[
                'box_no'                        => 'undefined_4.2',
                'name'                          => 'Creditors Name_10',
                'last_4_digits'                 => 'account number 10',
                'total_claim'                   => 'Total_30',
                'street'                        => 'Street_10',
                'debt_incurred'                 => 'Date debt was incurred_10',
                'city'                          => 'City 4.5',
                'state'                         => 'State 4.5',
                'zip'                           => 'Zip 4.5',
                'contingent_checkbox'           => 'Contingent_10',
                'unliquidated_checkbox'         => 'Unliquidated_10',
                'disputed_checkbox'             => 'Disputed_10',
                'debtor_radio'                  => 'check 10',
                'debtor_A'                      => 'debtor 1',
                'debtor_B'                      => 'debtor 2',
                'debtor_A_and_B'                => 'debtor 1 and 2',
                'debtor_one_or_another'         => 'On',
                'student_checkbox'              => 'Student loans_10',
                'obligations_checkbox'          => 'Obligations arising out of divorce_10',
                'check_if_this_clain_checkbox'  => 'Check if this claim relates to a_10',
                'debt_checkbox'                 => 'Debts in pension plans_10',
                'other_checkbox'                => 'Other_7',
                'other_textbox'                 => 'Other unsecurecured claim 4.5',
                'claim_subject_radio'           => 'check12',
                'value_no'                      => 'no',
                'value_yes'                     => 'yes',
                'value_on'                      => 'On',
                'page_no'                       => 'fill_27.1.4',
                'total_page'                    => 'fill_27.1.5',
            ],
            3=>[
                'box_no'                        => 'undefined_4.3',
                'name'                          => 'Creditors Name_11',
                'last_4_digits'                 => 'account number 11',
                'total_claim'                   => 'Total_31',
                'street'                        => 'Street_11',
                'debt_incurred'                 => 'Date debt was incurred_11',
                'city'                          => 'City 4.6',
                'state'                         => 'State 4.6',
                'zip'                           => 'Zip 4.6',
                'contingent_checkbox'           => 'Contingent_11',
                'unliquidated_checkbox'         => 'Unliquidated_11',
                'disputed_checkbox'             => 'Disputed_11',
                'debtor_radio'                  => 'check 11',
                'debtor_A'                      => 'debtor 1',
                'debtor_B'                      => 'debtor 2',
                'debtor_A_and_B'                => 'debtor 1 and 2',
                'debtor_one_or_another'         => 'On',
                'student_checkbox'              => 'Student loans_11',
                'obligations_checkbox'          => 'Obligations arising out of divorce_11',
                'check_if_this_clain_checkbox'  => 'Check if this claim relates to a_11',
                'debt_checkbox'                 => 'Debts in pension plans_11',
                'other_checkbox'                => 'Other_8',
                'other_textbox'                 => 'Other unsecurecured claim 4.6',
                'claim_subject_radio'           => 'check13',
                'value_no'                      => 'no',
                'value_yes'                     => 'yes',
                'value_on'                      => 'On',
                'page_no'                       => 'fill_27.1.4',
                'total_page'                    => 'fill_27.1.5',
            ],
        ];
        return static::returnArrValue($arr, $key);
     }

     public static function schedule_ef_part_3($key){

        $arr =  [1 => [
            'noBox' 				=> '',
            'creditorName' 			=> 'Creditors Name_12',
            'addressLineA'			=> 'Street_12',
            'addressLineB' 			=> '',
            'city' 					=> 'City 5.1',
            'state' 				=> 'State 5.1',
            'zip' 					=> 'Zip 5.1',
            'last4Digits' 			=> 'account number 12',
            'lineOf'				=> 'Referenced line 5.1',
            'checkPriority' 		=> 'check14',
         ],
         2 => [
            'noBox' 				=> '',
            'creditorName' 			=> 'Creditors Name_13',
            'addressLineA'			=> 'Street_13',
            'addressLineB' 			=> '',
            'city' 					=> 'City 5.2',
            'state' 				=> 'State 5.2',
            'zip' 					=> 'Zip 5.2',
            'last4Digits' 			=> 'account number 13',
            'lineOf'				=> 'Referenced line 5.2',
            'checkPriority' 		=> 'check15',
         ],
         3 => [
            'noBox' 				=> '',
            'creditorName' 			=> 'Creditors Name_14',
            'addressLineA'			=> 'Street_14',
            'addressLineB' 			=> '',
            'city' 					=> 'City 5.3',
            'state' 				=> 'State 5.3',
            'zip' 					=> 'Zip 5.3',
            'last4Digits' 			=> 'account number 14',
            'lineOf'				=> 'Referenced line 5.3',
            'checkPriority' 		=> 'check16',
         ],
         4 => [
            'noBox' 				=> '',
            'creditorName' 			=> 'Creditors Name_15',
            'addressLineA'			=> 'Street_15',
            'addressLineB' 			=> '',
            'city' 					=> 'City 5.4',
            'state' 				=> 'State 5.4',
            'zip' 					=> 'Zip 5.4',
            'last4Digits' 			=> 'account number 15',
            'lineOf'				=> 'Referenced line 5.4',
            'checkPriority' 		=> 'check17',
        ],5 => [
            'noBox' 				=> '',
            'creditorName' 			=> 'Creditors Name_16',
            'addressLineA'			=> 'Street_16',
            'addressLineB' 			=> '',
            'city' 					=> 'City 5.5',
            'state' 				=> 'State 5.5',
            'zip' 					=> 'Zip 5.5',
            'last4Digits' 			=> 'account number 16',
            'lineOf'				=> 'Referenced line 5.5',
            'checkPriority' 		=> 'check18',
         ],6 => [
            'noBox' 				=> '',
            'creditorName' 			=> 'Creditors Name_17',
            'addressLineA'			=> 'Street_17',
            'addressLineB' 			=> '',
            'city' 					=> 'City 5.6',
            'state' 				=> 'State 5.6',
            'zip' 					=> 'Zip 5.6',
            'last4Digits' 			=> 'account number 17',
            'lineOf'				=> 'Referenced line 5.6',
            'checkPriority' 		=> 'check19',
            ],
            7 =>  [
            'noBox' 				=> '',
            'creditorName' 			=> 'Creditors Name_18',
            'addressLineA'			=> 'Street_18',
            'addressLineB' 			=> '',
            'city' 					=> 'City 5.7',
            'state' 				=> 'State 5.7',
            'zip' 					=> 'Zip 5.7',
            'last4Digits' 			=> 'account number 18',
            'lineOf'				=> 'Referenced line 5.7',
            'checkPriority' 		=> 'check20'
         ]];
         return static::returnArrValue($arr, $key);
     }

    public static function schedule_ef_part4($key)
    {
        $arr = [
        1=>[
            '6a' => 'Total_6a',
            '6b' => 'Total_6b',
            '6c' => 'Total_6c',
            '6d' => 'Total_6d',
            '6e' => 'Total_6e',
            '6f' => 'Total_6f',
            '6g' => 'Total_6g',
            '6h' => 'Total_6h',
            '6i' => 'Total_6i',
            '6j' => 'Total_6j',
            'page_no' => 'fill_27.1.8',
            'total_page' => 'fill_27.1.7',
            ]
            ];
        return static::returnArrValue($arr, $key);
     }

     public static function dependent_relationship($relation = null)
     {
        $arrayList = [
            '1' => "Son",
            '2' => "Daughter",
            '3' => "Stepson",
            '4' => "Stepdaughter",
            '5' => "Foster Son",
            '6' => "Foster Daughter",
            '7' => "Nephew",
            '8' => "Niece",
            '9' => "Father",
            '10' => "Mother",
            '11' => "Brother",
            '12' => "Sister",
            '13' => "Grandson",
            '14' => "Granddaughter",
            '15' => "Grandfather",
            '16' => "Grandmother",
            '17' => "Uncle",
            '18' => "Aunt",
            '19' => "Son-In-Low",
            '20' => "Daughter-In-Low",
            '21' => "Father-In-Low",
            '22' => "Mother-In-Low",
            '23' => "Husband",
            '24' => "Wife",
            '25' => "Spouse"
        ];

        $list='';
        foreach($arrayList as $value){
            $selected = !empty($relation) && $relation == $value ?  'selected' : '';
            $list .= "<option value='".$value."' ".$selected.">".$value."</option>";
        }

        return $list;
     }

     public static function getVehiclesClientSelections($code = '')
     {

         $arrayList = [
             self::VEHICLE_CARS_TK => "Vehicle (Cars, vans, trucks, tractors, sport utility vehicles)",
             self::VEHICLE_RECREATINAL_VEHICLE => "Watercraft, aircraft, motor homes, ATVs and other recreational vehicles, other vehicles, and accessories"
         ];

         $vlist='';

         foreach($arrayList as $key => $vehicle){
             $selected = !empty($code) && $code == $key ?  'selected' : '';
             $vlist .= "<option value='".$key."' ".$selected.">".$vehicle."</option>";
         }
         return $vlist;

     }

     public static function getSourceOfIncomeArray($key = null)
     {
         $arr =  array(
            1 =>  'Alimony / Maintenance',
            2 => 'Child Support',
            3 => "Disability (EDD)",
            4 => "Early Retirement Distributions",
            5 => "Household Contributions",
            6 => 'Interest/Dividends',
            7 => 'Rental Income',
            8 => 'Retirement Income',
            9 => 'Social Security Benefits',
            10 => "VA Disability",
            -1 => 'Other',
         );
         if($key !="" || $key ==null){
            $arr;
         }

         return static::returnArrValue($arr, $key);
     }

    public static function getSourceOfIncomeSelection($code = '')
    {
        $soiarrayList = self::getSourceOfIncomeArray();
        return self::createSelectionFromArray($soiarrayList,$code);
    }

    public static function getVideoTypes($key=null)
    {
        $arr =  [
            'website' => 'Website Client Videos',
            'attorney' => 'Attorney Videos',
            'mobile' => "Mobile App Videos",
            'misc' => "Landing Page & Misc Videos"
        ];
        if($key==null){
            return $arr;
        }
        return static::returnArrValue($arr, $key);
    }

    public static function getVideoTypesSelection($code = '')
    {
        $vtarrayList = self::getVideoTypes();
        return self::createSelectionFromArray($vtarrayList,$code);
    }

    private static function createSelectionFromArray($arrayList,$code='')
    {
        $list='';
        foreach($arrayList as $key => $value){
            $selected = !empty($code) && $code == $key ?  'selected' : '';
            $list .= "<option value='".$key."' ".$selected.">".$value."</option>";
        }
        return $list;
    }

    public static function getAllVideosTypes($key = null)
    {
        $arr = self::getWebsiteVideosTypes() + self::getMobileVideosTypes() + self::getAttorneyVideosTypes() + self::getMiscVideosTypes();
        if($key==null){
            return $arr;
        }
        return static::returnArrValue($arr, $key);
    }

    public static function getWebsiteVideosTypes($key = null)
    {
        $arr = [
            self::BASIC_INFO_DASHBOARD_VIDEO => "Basic Information Dashboard",
            self::BASIC_INFO_STEP1_VIDEO => "Debtor's Basic Information",
            self::BASIC_INFO_STEP2_VIDEO => "Co-Debtor's/Spouse's Information",
            self::BASIC_INFO_STEP3_VIDEO => "Prior and/or Pending Bankruptcy Cases",
            self::BASIC_INFO_STEP4_VIDEO => "Debtors Who Reside as Tenants of Residential Property",
            self::BASIC_INFO_STEP5_VIDEO => "Business Owned as a Sole Proprietor/Hazardous Property",
            self::PROPERTY_DASHBOARD_VIDEO => "Property Dashboard",
            self::PROPERTY_STEP1_VIDEO => "Property (Vehicle, Recreational)",
            self::PROPERTY_STEP2_VIDEO => "Personal and Household Items",
            self::PROPERTY_STEP3_VIDEO => "Financial Assets",
            self::PROPERTY_STEP4_VIDEO => "Business-Related Assets",
            self::PROPERTY_STEP5_VIDEO => "Farm and Commercial Fishing-Related Property",
            self::PROPERTY_STEP6_VIDEO => "Miscellaneous Property",
            self::DEBT_TAB_VIDEO => "Debt Tab",
            self::DEBT_TAB_BASIC_VIDEO => "Debt Tab with Basic Subscription",
            self::DEBT_TAB_PREMIUM_VIDEO => "Debt Tab with Premium Subscription",
            self::INCOME_DEBTOR_EMPLOYEE_VIDEO => "Debtor's Income Tab Employment Information",
            self::INCOME_CO_DEBTOR_EMPLOYEE_VIDEO => "Co-debtor's Income Tab Employment Information",
            self::INCOME_DEBTOR_INCOME_VIDEO => "Debtor's Monthly Income",
            self::INCOME_CO_DEBTOR_INCOME_VIDEO => "Co-Debtor's Monthly Income",
            self::INCOME_PROFIT_LOSS_PDF_VIDEO => "Debtor's Monthly Profit/loss",
            self::INCOME_SPOUSE_PROFIT_LOSS_PDF_VIDEO => "Co-Debtor's Monthly Profit/loss",
            self::EXPENSE_DEBTOR_VIDEO => "Debtor's Monthly Expenses",
            self::EXPENSE_CO_DEBTOR_VIDEO => "Co-Debtor's Monthly Expenses",
            self::SOFA_TAB_VIDEO => "SOFA tab video",
            self::SOFA_TAB_VIDEO_STEP_2 => "SOFA tab step 2 video",
            self::SOFA_TAB_VIDEO_STEP_3 => "SOFA tab step 3 video",
            self::SOFA_TAB_VIDEO_1 => "SOFA tab Debtor's Income",
            self::SOFA_TAB_VIDEO_2 => "SOFA tab Spouse's Income",
            self::SOFA_TAB_VIDEO_3 => "SOFA tab Debtor's Income (Other than employment)",
            self::SOFA_TAB_VIDEO_4 => "SOFA tab Spouse's Income (Other than employment)",



        ];
        if($key==null){
            return $arr;
        }
        return static::returnArrValue($arr, $key);
    }

    public static function getMobileVideosTypes($key = null)
    {
        $arr = [
            self::MAIN_MOBILE_APP_VIDEO =>  "Main Mobile app screen",
            self::MAIN_DOCUMENT_TUTORIAL_VIDEO => "Main Document Screen Tutorial",
            self::DRIVING_LIC_TUTORIAL_VIDEO => "Driving Lic Tutorial",
            self::MORTGAGE_LOAN_TUTORIAL_VIDEO => "Mortgage loan Tutorial",
            self::AUTO_LOAN_TUTORIAL_VIDEO => "Auto loan Tutorial",
            self::SSN_ITIN_TUTORIAL_VIDEO => "SSN/ITIN Tutorial",
            self::PAYSTUB_TUTORIAL_VIDEO => "Paystub Tutorial",
            self::VEHICLE_REGISTRATION_VIDEO => "Vehicle Registration",
            self::VEHICLE_INFORMATION_VIDEO => "Vehicle Information",
            self::LAST_YEAR_TAX_RETURN_VIDEO => "Last Years Tax Returns",
            self::YEAR_BEFORE_TAX_RETURN_VIDEO => "Year Before Tax Returns",
            self::MISC_DOCUMENT_VIDEO => "Misc. Documents",
            self::MISC_DOCUMENT_W2_VIDEO => "W2 Last Year",
            self::MISC_DOCUMENT_W2_YEAR_BEFORE_VIDEO => "W2 Year Before"
        ];
        if($key==null){
            return $arr;
        }
        return static::returnArrValue($arr, $key);
    }

    public static function getAttorneyVideosTypes($key = null)
    {
        $arr = [
            self::INVITE_CLIENT_VIDEO => 'Invite Client',
            self::ATTORNEY_DASHBOARD_VIDEO => 'Attorney Welcome Video',
            self::ATTORNEY_CLIENT_MANAGEMENT_VIDEO  => 'Client Management',
            self::ATTORNEY_CLIENT_QUESTIONNAIRE_VIDEO  => 'Client Questionnaire',
            self::ATTORNEY_UPLOAD_CLIENT_DOCUMENT_VIDEO  => 'Upload Client Documents',
            self::ATTORNEY_SEND_RECEIVE_SIGNED_DOC_VIDEO  => 'Send/Receive Signed Docs',
            self::ATTORNEY_UPLOAD_CREDIT_REPORT_VIDEO  => 'Upload Credit Report',
            self::ATTORNEY_CREDITORS_CREDIT_REPORT_VIDEO  => 'Creditors (Credit Report)',
            self::ATTORNEY_PAYROLL_ASSISTANT_VIDEO  => 'Payroll Assistant',
            self::ATTORNEY_SPOUSE_PAYROLL_ASSISTANT_VIDEO  => 'Payroll Assistant (Spouse)',
            self::ATTORNEY_ADDITIOANL_DOCUMENT_UPLOAD  => 'Document Management',
            self::ATTORNEY_CHAT_MANAGEMENT  => 'Chat Management',
            self::ATTORNEY_TRANSACTION_MANAGEMENT => 'Transactions Management',
            self::LANDING_PAGE_PRICING_PLAN_VIDEO => "Attorney Subscription Plan Video",
            self::ATTORNEY_SETTINGS => 'Attorney Settings',
            self::ATTORNEY_SETTING_SUBSCRIPTION => 'Attorney settings Subscriptions',
            self::ATTORNEY_SETTING_PETITION_PREP => 'Attorney settings Petition Prep',
            self::ATTORNEY_SETTING_WELCOME_VIDEO => 'Attorney Settings Welcome Video'
        ];
        if($key==null){
            return $arr;
        }
        return static::returnArrValue($arr, $key);
    }

    public static function getMiscVideosTypes($key = null)
    {
        $arr = [
            self::GUIDE_PAGE_TUTORIAL_VIDEO => "Guide Page Tutorial Video",
            self::LANDING_PAGE_MAIN_VIDEO => "Landing Page main Video",
            self::LANDING_PAGE_AFTER_MAIN_VIDEO => "Landing Page after main Video",
            self::LANDING_PAGE_CREDITORS_VIDEO => "Landing Page Creditors Video",
            self::LANDING_PAGE_PAYROLL_VIDEO => "Landing Page Payroll Video",
            self::LANDING_PAGE_FULL_APP_VIDEO => "Landing Page Full app Video",
            self::LANDING_PAGE_SUBSCRIPTION_VIDEO => "Landing Page Subscription Video",
        ];
        if($key==null){
            return $arr;
        }
        return static::returnArrValue($arr, $key);
    }

    public static function getMobileVideoTypeSelection($code = '')
    {
        $mvarrayList = self::getMobileVideosTypes();
        return self::createSelectionFromArray($mvarrayList,$code);
    }

    public static function getWebVideoTypeSelection($code = '')
    {
        $mvtarrayList = self::getWebsiteVideosTypes();
        return self::createSelectionFromArray($mvtarrayList,$code);
    }

    public static function getAttorneyVideosTypeSelection($code = '')
    {
        $atvarrayList = self::getAttorneyVideosTypes();
        return self::createSelectionFromArray($atvarrayList,$code);
    }

    public static function getMiscVideosTypeSelection($code = '')
    {
        $atvarrayList = self::getMiscVideosTypes();
        return self::createSelectionFromArray($atvarrayList,$code);
    }

    

    public static function getAdminVideos()
    {
        $videoArray = \App\Models\WebsiteVideo::select('id','section','english_video','spanish_video','media_type','webview_english_video','webview_spanish_video')
        ->groupBy("section")->where("section", "!=", null)->get()->keyBy('section');
       return  !empty($videoArray->toArray()) ? $videoArray->toArray() : [];

    }

    public static function stmtIntNames()
    {
        return [
            0 => [
                'name' => 'Creditors Name 1a',
                'desc' => 'PropertyDescription 1a',
                'check1' => 'check1 1a',
                'check4Explain' => 'Explain2 1a',
                'check2' => 'check2 1a'
            ],
            1 => [
                'name' => 'Creditors Name 1b',
                'desc' => 'PropertyDescription 1b',
                'check1' => 'check1 1b',
                'check4Explain' => 'Explain2 1b',
                'check2' => 'check2 1b'
            ],
            2 => [
                'name' => 'Creditors Name 1c',
                'desc' => 'PropertyDescription 1c',
                'check1' => 'check1 1c',
                'check4Explain' => 'Explain2 1c',
                'check2' => 'check2 1c'
            ],
            3 => [
                'name' => 'Creditors Name 1d',
                'desc' => 'PropertyDescription 1d',
                'check1' => 'check1 1d',
                'check4Explain' => 'Explain2 1d',
                'check2' => 'check2 1d'
            ]
        ];
    }

    public static function getAttorneyVideos($section)
    {
        $tutorial = \App\Models\WebsiteVideo::select('section','english_video','spanish_video')->where("section", "=", $section)->first();
        return  ['en' => $tutorial['english_video']??'', 'sp' => $tutorial['spanish_video']??''];
    }

    public static function getVideos($tutorial)
    {
        $videos = ['en' => $tutorial['english_video']??'', 'sp' =>  $tutorial['spanish_video']??''];;
        $web_view = Session::get('web_view');
        if(@$web_view && $tutorial['media_type'] == 'website'){
            $videos =  ['en' => isset($tutorial['webview_english_video']) && !empty($tutorial['webview_english_video'])?$tutorial['webview_english_video']:($tutorial['english_video']??''), 'sp' =>   isset($tutorial['webview_spanish_video']) && !empty($tutorial['webview_spanish_video'])?$tutorial['webview_spanish_video']:($tutorial['spanish_video']??'')];
        }
        return $videos;
    }

    public static function setModelAndGetUpdateArray($modelData) {
        $finalUpdatedArray = [];
        if (!empty($modelData)) {
            foreach ($modelData->toArray() as $key => $value) {
                $data = [];
                if (is_array(json_decode($value, 1))) {
                    $data[$key] = json_decode($value, 1);
                    if (!empty($data[$key])) {
                        foreach ($data[$key] as $subKey => $subValue) {
                            $finalUpdatedArray[$subKey] = $subValue;
                        }
                    }
                } else {
                    $finalUpdatedArray[$key] = $value;
                }
            }
        }
        return $finalUpdatedArray;
    }

    public static function getFinacialAffairsUpdateArray($finacialAffairs) {
        $finacialAffairs			=	(!empty($finacialAffairs)) ? $finacialAffairs->toArray():[];
        $finalUpdatedArray		=	[];
        if (!empty($finacialAffairs)) {
            foreach ($finacialAffairs as $key => $value) {
                if (is_array(json_decode($value, 1))) {
                    if (in_array($key, ['community_property_state','domestic_partner'])) {
                        $finalUpdatedArray[$key]=array_values(json_decode($value, 1));
                    } else {
                        $finalUpdatedArray[$key]=json_decode($value, 1);
                    }
                } else {
                    $finalUpdatedArray[$key]=$value;
                }
            }
        }
        return $finalUpdatedArray;
    }
    
    public static function getPlantype($key = null){
        $arr = [
            100 => '',
            101 => '',
            102 => '',
            1 => ''
        ];
        
        if($key==null){
            return $arr;
        }
        return static::returnArrValue($arr, $key);
    }
}
