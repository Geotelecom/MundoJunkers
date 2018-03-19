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

include(dirname(__FILE__).'/../../config/config.inc.php');
include(dirname(__FILE__).'/../../init.php');
ob_start();
$status = 'success';
$message = '';

$action = $_REQUEST['action'];


switch ($action){
	case 'login':
		include(dirname(__FILE__).'/lib/Facebook/Exception.php');
		include(dirname(__FILE__).'/lib/Facebook/Api.php');
		
		//$secret = $_REQUEST['secret'];
		$secret = Configuration::get('fbloginblocksecret');
		$appid = $_REQUEST['appid'];
		$facebook = new Facebook_Api(array(
		  'appId'  => $appid,
		  'secret' => $secret,
		  'cookie' => true,
		));
		
		$fb_session = $facebook->getSession();
		
		// 	Session based API call.
		if ($fb_session) {
		  try {
		    $uid = $facebook->getUser();
		    $me = $facebook->api('/me');
		  } catch (Facebook_Exception $e) {
		    $status = 'error';
			$message = $e;
		  }
		}
		
		if(version_compare(_PS_VERSION_, '1.5', '>')){
        	$id_shop = Context::getContext()->shop->id;
        } else {
        	$id_shop = 0;
        }
        
         if(empty($me['email'])){
        	$status = 'error';
			$message = 'You don\'t have primary email in your Facebook Account. Go to Facebook -> Settings -> General -> Email and set Primary email!';
        } else {
        
		
		if (is_array($me)) {
			$sql= 'SELECT `customer_id`
					FROM `'._DB_PREFIX_.'fb_customer`
					WHERE `fb_id` = '.$me['id'].' AND `id_shop` = '.$id_shop.'
					LIMIT 1';
			$result = Db::getInstance()->ExecuteS($sql);
			
			if(sizeof($result)>0)
				$customer_id = $result[0]['customer_id'];
			else
				$customer_id = 0;
		}
		
		$exists_mail = 0;
		//chek for dublicate
		if(!empty($me['email'])){
			if(version_compare(_PS_VERSION_, '1.5', '>')){
			$sql = 'SELECT * FROM `'._DB_PREFIX_   .'customer` 
		        	WHERE `active` = 1 AND `email` = \''.pSQL($me['email']).'\'  
		        	AND `deleted` = 0 '.(defined('_MYSQL_ENGINE_')?"AND `is_guest` = 0":"").' AND `id_shop` = '.$id_shop.'';
			} else {
			$sql = 'SELECT * FROM `'._DB_PREFIX_   .'customer` 
		        	WHERE `active` = 1 AND `email` = \''.pSQL($me['email']).'\'  
		        	AND `deleted` = 0 '.(defined('_MYSQL_ENGINE_')?"AND `is_guest` = 0":"").'';
			}
			$result_exists_mail = Db::getInstance()->GetRow($sql);
			if($result_exists_mail)
				$exists_mail = 1;
		}
		
		$auth = 0;
		if($customer_id && $exists_mail){
			$auth = 1;
		}

		if(empty($customer_id) &&  $exists_mail){
			// insert record into customerXfacebook table
			$sql = 'INSERT into `'._DB_PREFIX_.'fb_customer` SET
						   customer_id = '.$result_exists_mail['id_customer'].', 
						   fb_id = '.$me['id'].',
						   id_shop = '.$id_shop.' ';
			Db::getInstance()->Execute($sql);
			
			$auth = 1;
		}
		
		
		
		if($auth){
			global $cookie;
			
			// authentication
			if(version_compare(_PS_VERSION_, '1.5', '>')){
			$sql = 'SELECT * FROM `'._DB_PREFIX_   .'customer` 
		        	WHERE `active` = 1 AND `email` = \''.pSQL($me['email']).'\'  
		        	AND `deleted` = 0 '.(defined('_MYSQL_ENGINE_')?"AND `is_guest` = 0":"").' AND `id_shop` = '.$id_shop.'
		        	'; 	
			} else {
			$sql = 'SELECT * FROM `'._DB_PREFIX_   .'customer` 
		        	WHERE `active` = 1 AND `email` = \''.pSQL($me['email']).'\'  
		        	AND `deleted` = 0 '.(defined('_MYSQL_ENGINE_')?"AND `is_guest` = 0":"").'
		        	'; 
			}
			$result = Db::getInstance()->GetRow($sql);
			
			if ($result){
			    $customer = new Customer();
			    
			    $customer->id = $result['id_customer'];
		        foreach ($result AS $key => $value)
		            if (key_exists($key, $customer))
		                $customer->{$key} = $value;
	        }
	        
	        $cookie->id_customer = intval($customer->id);
	        $cookie->customer_lastname = $customer->lastname;
	        $cookie->customer_firstname = $customer->firstname;
	        $cookie->logged = 1;
	        $cookie->passwd = $customer->passwd;
	        $cookie->email = $customer->email;
	        if (Configuration::get('PS_CART_FOLLOWING') AND (empty($cookie->id_cart) 
	        	OR Cart::getNbProducts($cookie->id_cart) == 0))
	            $cookie->id_cart = intval(Cart::lastNoneOrderedCart(intval($customer->id)));
			if(version_compare(_PS_VERSION_, '1.5', '>')){
				Hook::exec('authentication');
			} else {
			       	Module::hookExec('authentication');
			}
	        
	   	
		} else {
			$fb_id = $me['id'];
		
			//// create new user ////
			$gender = ($me['gender'] == 'male')?1:2;
			if(version_compare(_PS_VERSION_, '1.5', '>')){
				$id_default_group = 3;
 			} else {
				$id_default_group = 1;
 			}
			$firstname = pSQL($me['first_name']);
			$lastname = pSQL($me['last_name']);
			$email = $me['email'];

			// generate passwd
			srand((double)microtime()*1000000);
			$passwd = substr(uniqid(rand()),0,12);
			$real_passwd = $passwd; 
			$passwd = md5(pSQL(_COOKIE_KEY_.$passwd)); 
			
			$last_passwd_gen = date('Y-m-d H:i:s', strtotime('-'.Configuration::get('PS_PASSWD_TIME_FRONT').'minutes'));
			$secure_key = md5(uniqid(rand(), true));
			$active = 1;
			$date_add = date('Y-m-d H:i:s'); //'2011-04-04 18:29:15';
			$date_upd = $date_add;
			
			if(strlen($me['first_name'])==0 || strlen($me['last_name']) == 0){
				$status = 'error';
				$message = 'Empty First Name and Last Name!';
				exit;
			}
			$birthday = null;
			if(strlen($me['birthday'])>0){
				$birthday = strtotime($me['birthday']);
				$birthday = date("Ymd",$birthday);
			}


			if(version_compare(_PS_VERSION_, '1.5', '>')){
				
				$id_shop_group = Context::getContext()->shop->id_shop_group;
				
				$sql = 'insert into `'._DB_PREFIX_.'customer` SET 
						   id_shop = '.$id_shop.', id_shop_group = '.$id_shop_group.',
						   id_gender = '.$gender.', id_default_group = '.$id_default_group.',
						   firstname = \''.$firstname.'\', lastname = \''.$lastname.'\',
						   email = \''.$email.'\', passwd = \''.$passwd.'\',
						   birthday = \''.$birthday.'\',
						   last_passwd_gen = \''.$last_passwd_gen.'\',
						   secure_key = \''.$secure_key.'\', active = '.$active.',
						   date_add = \''.$date_add.'\', date_upd = \''.$date_upd.'\' ';
			
			} else {

			$sql = 'insert into `'._DB_PREFIX_.'customer` SET 
						   id_gender = '.$gender.', id_default_group = '.$id_default_group.',
						   firstname = \''.$firstname.'\', lastname = \''.$lastname.'\',
						   email = \''.$email.'\', passwd = \''.$passwd.'\',
						   birthday = \''.$birthday.'\',
						   last_passwd_gen = \''.$last_passwd_gen.'\',
						   secure_key = \''.$secure_key.'\', active = '.$active.',
						   date_add = \''.$date_add.'\', date_upd = \''.$date_upd.'\' ';
			
			}
			
			Db::getInstance()->Execute($sql);
			$insert_id = Db::getInstance()->Insert_ID();
				
			
			
			// insert record in customer group
			if(version_compare(_PS_VERSION_, '1.5', '>')){
				$id_group = 3; // customer
			} else {
				$id_group = 1;
			}
			$sql = 'INSERT into `'._DB_PREFIX_.'customer_group` SET 
						   id_customer = '.$insert_id.', id_group = '.$id_group.' ';
			Db::getInstance()->Execute($sql);
			
			
			
			
			// insert record into customerXfacebook table
			$sql_exists= 'SELECT `customer_id`
					FROM `'._DB_PREFIX_.'fb_customer`
					WHERE `fb_id` = '.$me['id'].' AND `id_shop` = '.$id_shop.'
					LIMIT 1';
			$result_exists = Db::getInstance()->ExecuteS($sql_exists);
			if(sizeof($result_exists)>0)
				$customer_id = $result_exists[0]['customer_id'];
			else
				$customer_id = 0;
				
			if($customer_id){
				$sql_del = 'DELETE FROM `'._DB_PREFIX_.'fb_customer` WHERE `customer_id` = '.$customer_id.' AND `id_shop` = '.$id_shop.'';
				Db::getInstance()->Execute($sql_del);
				
			}
			
				$sql = 'INSERT into `'._DB_PREFIX_.'fb_customer` SET
							   customer_id = '.$insert_id.', fb_id = '.$fb_id.', id_shop = '.$id_shop.' ';
				Db::getInstance()->Execute($sql);
							
			//// end create new user ///
			
			
			// auth customer
			global $cookie;
			$customer = new Customer();
	        $authentication = $customer->getByEmail(trim($email), trim($real_passwd));
	        if (!$authentication OR !$customer->id) {
	        	$status = 'error';
				$message = 'authentication failed!';
	        }
	        else
	        {
	            $cookie->id_customer = intval($customer->id);
	            $cookie->customer_lastname = $customer->lastname;
	            $cookie->customer_firstname = $customer->firstname;
	            $cookie->logged = 1;
	            $cookie->passwd = $customer->passwd;
	            $cookie->email = $customer->email;
	            if (Configuration::get('PS_CART_FOLLOWING') AND (empty($cookie->id_cart) OR Cart::getNbProducts($cookie->id_cart) == 0))
	                $cookie->id_cart = intval(Cart::lastNoneOrderedCart(intval($customer->id)));
		        if(version_compare(_PS_VERSION_, '1.5', '>')){
					Hook::exec('authentication');
				} else {
				       	Module::hookExec('authentication');
				}
	        }
			
			
			Mail::Send(intval($cookie->id_lang), 'account', 'Welcome!', 
    						array('{firstname}' => $customer->firstname, 
    							  '{lastname}' => $customer->lastname, 
    							  '{email}' => $customer->email, 
    							  '{passwd}' => $real_passwd), 
    							  $customer->email,
    							  $customer->firstname.' '.$customer->lastname);
			
		}
		
        }
		
	break;
	case 'logout':
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