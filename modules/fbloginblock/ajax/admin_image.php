<?php
/**
 * StorePrestaModules SPM LLC.
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the EULA
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://storeprestamodules.com/LICENSE.txt
 *
 /*
 * 
 * @author    StorePrestaModules SPM <kykyryzopresto@gmail.com>
 * @category others
 * @package fbloginblock
 * @copyright Copyright (c) 2011 - 2014 SPM LLC. (http://storeprestamodules.com)
 * @license   http://storeprestamodules.com/LICENSE.txt
 */

include(dirname(__FILE__).'/../../../config/config.inc.php');
include(dirname(__FILE__).'/../../../init.php');
ob_start(); 
$status = 'success';
$message = '';

include_once(dirname(__FILE__).'/../classes/facebookhelp.class.php');
$obj_facebookhelp = new facebookhelp();

$action = $_REQUEST['action'];

switch ($action){
	case 'returnimage':
		$type = $_POST['type'];
		if($type == "facebook"){
			$obj_facebookhelp->deleteImage(array('type'=>1));
		} elseif($type == "google"){
			$obj_facebookhelp->deleteImage(array('type'=>2));
		} elseif($type == "paypal"){
			$obj_facebookhelp->deleteImage(array('type'=>3));
		} elseif($type == "facebooksmall"){
			$obj_facebookhelp->deleteImage(array('type'=>4));
		} elseif($type == "googlesmall"){
			$obj_facebookhelp->deleteImage(array('type'=>5));
		} elseif($type == "paypalsmall"){
			$obj_facebookhelp->deleteImage(array('type'=>6));
		} elseif($type == "twitter"){
			$obj_facebookhelp->deleteImage(array('type'=>7));
		} elseif($type == "twittersmall"){
			$obj_facebookhelp->deleteImage(array('type'=>8));
		} elseif($type == "yahoo"){
			$obj_facebookhelp->deleteImage(array('type'=>9));
		} elseif($type == "yahoosmall"){
			$obj_facebookhelp->deleteImage(array('type'=>10));
		} elseif($type == "linkedin"){
			$obj_facebookhelp->deleteImage(array('type'=>11));
		} elseif($type == "linkedinsmall"){
			$obj_facebookhelp->deleteImage(array('type'=>12));
		} elseif($type == "microsoft"){
			$obj_facebookhelp->deleteImage(array('type'=>13));
		} elseif($type == "microsoftsmall"){
			$obj_facebookhelp->deleteImage(array('type'=>14));
		} 
	break;
	default:
		$status = 'error';
		$message = 'Unknown parameters!';
	break;
}


$response = new stdClass();
$content = ob_get_clean();
$response->status = $status;
$response->message = $message;	
$response->params = array('content' => $content);

echo json_encode($response);

?>