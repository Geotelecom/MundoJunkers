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

class fbloginblock extends Module
{
	private $_http_referer;
	private $_is15;
	private $_is16;
	private $_translations;
	private $_multiple_lang;
	
	
	public function __construct()	
 	{
 	 	$this->name = 'fbloginblock';
 	 	$this->version = '1.3.7';
 	 	$this->tab = 'others';
 	 	$this->author = 'storeprestamodules.com';
 	 	$this->module_key = "86adfe9f51496e857a90dfc487b2e79a";
 	 	
 	 	if(version_compare(_PS_VERSION_, '1.5', '>'))
			$this->_is15 = 1;
		else
			$this->_is15 = 0;
			
		if(version_compare(_PS_VERSION_, '1.6', '>'))
			$this->_is16 = 1;
		else
			$this->_is16 = 0;
			
		if(version_compare(_PS_VERSION_, '1.6', '>')){
			if(sizeof(Language::getLanguages())>1){
				$this->_multiple_lang = 1;
			} else {
				$this->_multiple_lang = 0;
			}
		} else {
			
			// ps 1.3
			if(version_compare(_PS_VERSION_, '1.4', '<'))
				$this->_multiple_lang = 0;
			else
				$this->_multiple_lang = 1;
				
		}
		
		//$this->bootstrap = true;
			
		parent::__construct();
		$this->page = basename(__FILE__, '.php');
		$this->displayName = $this->l('Facebook, Twitter, Google, LinkedIn, Microsoft Connects (5 in 1)');
		$this->description = $this->l('Add Facebook, Twitter, Google, LinkedIn, Microsoft Connects (5 in 1)');
		$this->confirmUninstall = $this->l('Are you sure you want to remove it ? Be careful, all your configuration and your data will be lost');
		
		$this->_http_referer = isset($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:'';
		
		
		$this->_translations = array('facebook'=>$this->l('Error: Please fill Facebook App Id and Facebook Secret Key in the module settings'),
									 'twitter'=>$this->l('Error: Please fill Consumer key and Consumer secret in the module settings'),
									 'linkedin'=>$this->l('Error: Please fill LinkedIn API Key and LinkedIn Secret Key in the module settings'),
									 'microsoft'=>$this->l('Error: Please fill Microsoft Live Client ID and Microsoft Live Client Secret in the module settings'),
									 'paypal'=>$this->l('Error: Please fill Paypal Client ID, Paypal Secret, Callback URL in the module settings!')
									 );
		
		$this->initContext();
 	}
 	
	private function initContext()
	{
	  if (version_compare(_PS_VERSION_, '1.5', '>'))
	    $this->context = Context::getContext();
	  else
	  {
	    global $smarty, $cookie;
	    $this->context = new StdClass();
	    $this->context->smarty = $smarty;
	    $this->context->cookie = $cookie;
	  }
	}
 	
	public function install()
	{
		
	 	if (!parent::install())
	 		return false;
	 		
	 	//microsoft connect
	 	Configuration::updateValue($this->name.'m_on', 1);
			
	 	Configuration::updateValue($this->name.'_topm', 'topm');
	 	Configuration::updateValue($this->name.'_rightcolumnm', 'rightcolumnm');
	 	Configuration::updateValue($this->name.'_leftcolumnm', 'leftcolumnm');
	 	Configuration::updateValue($this->name.'_authpagem', 'authpagem');
	 	Configuration::updateValue($this->name.'_welcomem', 'welcomem');
	 		
	 	// linkedin connect
	 	Configuration::updateValue($this->name.'l_on', 1);
			
	 	Configuration::updateValue($this->name.'_topl', 'topl');
	 	Configuration::updateValue($this->name.'_rightcolumnl', 'rightcolumnl');
	 	Configuration::updateValue($this->name.'_leftcolumnl', 'leftcolumnl');
	 	Configuration::updateValue($this->name.'_authpagel', 'authpagel');
	 	Configuration::updateValue($this->name.'_welcomel', 'welcomel');

	 
	 	//twitter connect
	 	Configuration::updateValue($this->name.'t_on', 1);
		
	 	Configuration::updateValue($this->name.'_topt', 'topt');
	 	Configuration::updateValue($this->name.'_rightcolumnt', 'rightcolumnt');
	 	Configuration::updateValue($this->name.'_leftcolumnt', 'leftcolumnt');
	 	Configuration::updateValue($this->name.'_authpaget', 'authpaget');
	 	Configuration::updateValue($this->name.'_welcomet', 'welcomet');
	 	
	 	
	 	// facebook connect
	 	Configuration::updateValue($this->name.'f_on', 1);
			
	 	Configuration::updateValue($this->name.'_topf', 'topf');
	 	Configuration::updateValue($this->name.'_rightcolumnf', 'rightcolumnf');
	 	Configuration::updateValue($this->name.'_leftcolumnf', 'leftcolumnf');
	 	Configuration::updateValue($this->name.'_authpagef', 'authpagef');
	 	Configuration::updateValue($this->name.'_welcomef', 'welcomef');
	 	
	 	// google connect
	 	Configuration::updateValue($this->name.'g_on', 1);
	 	
	 	// changes OAuth 2.0
	 	if(version_compare(_PS_VERSION_, '1.6', '>')){
			$_http_host = Tools::getShopDomainSsl(true, true).__PS_BASE_URI__; 
		} else {
			$_http_host = _PS_BASE_URL_.__PS_BASE_URI__;
		}
		Configuration::updateValue($this->name.'oru', $_http_host.'modules/'.$this->name.'/login.php');
		// changes OAuth 2.0
	 	
		
			
	 	Configuration::updateValue($this->name.'_topg', 'topg');
	 	Configuration::updateValue($this->name.'_rightcolumng', 'rightcolumng');
	 	Configuration::updateValue($this->name.'_leftcolumng', 'leftcolumng');
	 	
	 	Configuration::updateValue($this->name.'_authpageg', 'authpageg');
	 	Configuration::updateValue($this->name.'_welcomeg', 'welcomeg');
	 	
	 	
	 	if (!$this->registerHook('leftColumn') 
			|| !$this->registerHook('rightColumn') 
			|| !$this->registerHook('header') 
			|| !$this->createCustomerTbl() 
	 		|| !$this->_createFolderAndSetPermissions()
	 		|| !$this->createUserTwitterTable()
	 		
	 		)
			return false;
	 	
	 	return true;
	}
	
	public function uninstall()
	{
		
		
		if (!$this->uninstallTable() || !parent::uninstall()
			)
			return false;
		return true;
	}
	
	public function uninstallTable() {
		Db::getInstance()->Execute('DROP TABLE IF EXISTS '._DB_PREFIX_.$this->name.'_img');
		return true;
	}
	
	
	private function _createFolderAndSetPermissions(){
		
		$prev_cwd = getcwd();
		
		$module_dir = dirname(__FILE__).DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."upload".DIRECTORY_SEPARATOR;
		@chdir($module_dir);
		
		//folder logo
		
		$module_dir_img = $module_dir.$this->name.DIRECTORY_SEPARATOR; 
		@mkdir($module_dir_img, 0777);

		@chdir($prev_cwd);
		
		return true;
	} 
	
	public function createCustomerTbl()
	{
	
		
		$db = Db::getInstance();
		
		$query = 'CREATE TABLE IF NOT EXISTS '._DB_PREFIX_.'fb_customer (
				  `customer_id` int(10) NOT NULL,
				  `fb_id` bigint(20) NOT NULL,
				  `id_shop` int(11) NOT NULL default \'0\',
				  UNIQUE KEY `FBLOGINBLOCK_CUSTOMER` (`customer_id`,`fb_id`,`id_shop`)
				  ) ENGINE=InnoDB DEFAULT CHARSET=utf8';
		$db->Execute($query);

		$sql = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.$this->name.'_img` (
					  `id` int(11) NOT NULL auto_increment,
					  `img` text,
					  `id_shop` int(11) NOT NULL default \'0\',
					  `type` int(11) NOT NULL default \'1\' 
					  COMMENT \'1 - Facebook, 2 - Google, 3 - Paypal, 
					  4 - Facebook small, 5 - Google small, 6 - Paypal small, 
					  7 - Twitter, 8 - Twitter small, 9 - Yahoo, 10 - Yahoo small,
					  11 - LinkedIn, 12 - LinkedIn Small,  
					  13 - Microsoft, 14 - Microsoft Small  \',
					  PRIMARY KEY  (`id`)
					) ENGINE=InnoDB DEFAULT CHARSET=utf8;';
		$db->Execute($sql);
		
		return true;
			
	
	}
	
	public function createUserTwitterTable(){
		
		$db = Db::getInstance();
		$query = 'CREATE TABLE IF NOT EXISTS '._DB_PREFIX_.'tw_customer (
				   `id` int(11) NOT NULL AUTO_INCREMENT,
					  `twitter_id` bigint(20) NOT NULL,
					  `user_id` int(11) NOT NULL,
					  `id_shop` int(11) NOT NULL default \'0\',
					   UNIQUE KEY `FBTWCONNECT_CUSTOMER` (`twitter_id`,`user_id`,`id_shop`),
					  PRIMARY KEY (`id`)
					) ENGINE='.(defined('_MYSQL_ENGINE_')?_MYSQL_ENGINE_:"MyISAM").'  DEFAULT CHARSET=utf8';
		$db->Execute($query);
		return true;
		
	}
	
	
 public function hookHeader($params){

 		if(!Tools::getValue('content_only')) {
	    	$smarty = $this->context->smarty;
			$cookie = $this->context->cookie;
			
			
			
	    	$data_fb = $this->getfacebooklib((int)$params['cookie']->id_lang);
			$smarty->assign($this->name.'lang', $data_fb['lng_iso']);
			
	    	$is_ps5 = 0;
	    	if(version_compare(_PS_VERSION_, '1.5', '>')){
	    		$is_ps5 = 1;	
	    	}
	    	$smarty->assign($this->name.'is_ps5', $is_ps5);
	    	
	    	$is_logged = isset($cookie->id_customer)?$cookie->id_customer:0;
			$smarty->assign($this->name.'islogged', $is_logged);
	    	
			// facebook connect
			include_once(dirname(__FILE__).'/classes/facebookhelp.class.php');
			$obj = new facebookhelp();
	    	$data_img = $obj->getImages();
	    	
	    	$facebookimg = $data_img['facebook'];
	    	$facebooksmallimg = $data_img['facebooksmall'];
	    	
	    	$smarty->assign($this->name.'facebookimg', $facebookimg);
	    	$smarty->assign($this->name.'facebooksmallimg', $facebooksmallimg);
	    	
	    	$smarty->assign('blockfacebookappid', Configuration::get($this->name.'appid'));
	    	$smarty->assign('blockfacebooksecret', Configuration::get($this->name.'secret'));
	    	
	    	$smarty->assign($this->name.'f_on', Configuration::get($this->name.'f_on'));

	    	$smarty->assign($this->name.'_topf', Configuration::get($this->name.'_topf'));
	    	$smarty->assign($this->name.'_footerf', Configuration::get($this->name.'_footerf'));
	    	$smarty->assign($this->name.'_authpagef', Configuration::get($this->name.'_authpagef'));
	    	$smarty->assign($this->name.'_welcomef', Configuration::get($this->name.'_welcomef'));
	    	
	    	
	    	$id_lang = (int)$cookie->id_lang;
	    	
	    	$iso_lang = Language::getIsoById(intval($id_lang))."/";   
				
			if(!$this->_multiple_lang)
				$iso_lang = "";   
				
			
			// if order page    
	        if(version_compare(_PS_VERSION_, '1.5', '>')){
		        $data = explode("?",$this->_http_referer);
		    	$data  = end($data);
		    	$data_url_rewrite_on = explode("/",$this->_http_referer);
		    	$data_url_rewrite_on = end($data_url_rewrite_on);
		    	
		    	$link = new Link();
				$my_account = $link->getPageLink("my-account", true, $id_lang);
		    	
		        if(version_compare(_PS_VERSION_, '1.6', '>')){
					$_http_host = Tools::getShopDomainSsl(true, true).__PS_BASE_URI__; 
				} else {
					$_http_host = _PS_BASE_URL_.__PS_BASE_URI__;
				}
				
		    	if(Configuration::get('PS_REWRITING_SETTINGS'))
		    		$uri = str_replace($_http_host,'',$my_account);
		    	else 
		    		$uri = 'index.php?controller=my-account&id_lang='.$id_lang;
		    	$order_page = 0;
		        if($data == 'controller=order' || $data_url_rewrite_on == 'order'){
		        	$order_page = 1;
		    		if($data == 'controller=order')
		    			$uri = 'index.php?controller=order&step=1&id_lang='.$id_lang;
		    		elseif($data_url_rewrite_on == 'order')
		    		 	$uri = $iso_lang.'order?step=1';
		    		 	
		    	}
		    	$smarty->assign($this->name.'order_page', $order_page);
		    } else {
		    	$data = explode("/",$this->_http_referer);
		    	$data  = end($data);
		    	
		    	if(Configuration::get('PS_REWRITING_SETTINGS') && version_compare(_PS_VERSION_, '1.4', '>'))
		    		$uri = $iso_lang.'my-account';
		    	else 
		    		$uri = 'my-account.php?id_lang='.$id_lang;
		    	$order_page = 0;
		    	if($data == 'order.php' 
		    	|| $data == 'order'
		    	){
		    		$order_page = 1;
		    		if($data == 'order.php')
		    			$uri = 'order.php?step=1&id_lang='.$id_lang;
		    		elseif($data == 'order')
		    		 	$uri = $iso_lang.'order?step=1';
		    		 	
		    	}
		    	$smarty->assign($this->name.'order_page', $order_page);
		    }
	    	// if order page    
	        $smarty->assign($this->name.'uri', $uri);
		    
	    	// facebook connect
	    	
	    	
	    	// google connect
			$googleimg = $data_img['google'];
	    	$googlesmallimg = $data_img['googlesmall'];
	    	
	    	$smarty->assign($this->name.'googleimg', $googleimg);
	    	$smarty->assign($this->name.'googlesmallimg', $googlesmallimg);
	    	
	    	$smarty->assign($this->name.'g_on', Configuration::get($this->name.'g_on'));

	    	$smarty->assign($this->name.'_topg', Configuration::get($this->name.'_topg'));
	    	$smarty->assign($this->name.'_footerg', Configuration::get($this->name.'_footerg'));
	    	$smarty->assign($this->name.'_authpageg', Configuration::get($this->name.'_authpageg'));
	    	$smarty->assign($this->name.'_welcomeg', Configuration::get($this->name.'_welcomeg'));
	    	
	    	// google connect
	    	
	    	// paypal connect
			$paypalimg = $data_img['paypal'];
	    	$paypalsmallimg = $data_img['paypalsmall'];
	    	
	    	$smarty->assign($this->name.'paypalimg', $paypalimg);
	    	$smarty->assign($this->name.'paypalsmallimg', $paypalsmallimg);
	    	
	    	$smarty->assign($this->name.'p_on', Configuration::get($this->name.'p_on'));

	    	$smarty->assign($this->name.'_topp', Configuration::get($this->name.'_topp'));
	    	$smarty->assign($this->name.'_footerp', Configuration::get($this->name.'_footerp'));
	    	$smarty->assign($this->name.'_authpagep', Configuration::get($this->name.'_authpagep'));
	    	$smarty->assign($this->name.'_welcomep', Configuration::get($this->name.'_welcomep'));
	    	
			$clientid = Configuration::get($this->name.'clientid');
			$psecret = Configuration::get($this->name.'psecret');
			$pcallback = Configuration::get($this->name.'pcallback');
			
			if(strlen($clientid)>0 && strlen($psecret)>0 && strlen($pcallback)>0){
				$smarty->assign($this->name.'pconf', 1);
	    	} else {
	    		$smarty->assign($this->name.'pconf', 0);
	    	}
	    	// paypal connect
	    	
	    	// twitter connect
			$twitterimg = $data_img['twitter'];
	    	$twittersmallimg = $data_img['twittersmall'];
	    	
	    	$smarty->assign($this->name.'twitterimg', $twitterimg);
	    	$smarty->assign($this->name.'twittersmallimg', $twittersmallimg);
	    	
	    	$smarty->assign($this->name.'t_on', Configuration::get($this->name.'t_on'));

	    	$smarty->assign($this->name.'_topt', Configuration::get($this->name.'_topt'));
	    	$smarty->assign($this->name.'_footert', Configuration::get($this->name.'_footert'));
	    	$smarty->assign($this->name.'_authpaget', Configuration::get($this->name.'_authpaget'));
	    	$smarty->assign($this->name.'_welcomet', Configuration::get($this->name.'_welcomet'));
	    	
	    	$consumer_key = Configuration::get($this->name.'twitterconskey');
			$consumer_secret = Configuration::get($this->name.'twitterconssecret');
			if(strlen($consumer_key)>0 && strlen($consumer_secret)>0){
				$smarty->assign($this->name.'tconf', 1);
	    	} else {
	    		$smarty->assign($this->name.'tconf', 0);
	    	}

	    	// twitter connect
	    	
	    	// yahoo connect
			$yahooimg = $data_img['yahoo'];
	    	$yahoosmallimg = $data_img['yahoosmall'];
	    	
	    	$smarty->assign($this->name.'yahooimg', $yahooimg);
	    	$smarty->assign($this->name.'yahoosmallimg', $yahoosmallimg);
	    	
	    	$smarty->assign($this->name.'y_on', Configuration::get($this->name.'y_on'));

	    	$smarty->assign($this->name.'_topy', Configuration::get($this->name.'_topy'));
	    	$smarty->assign($this->name.'_footery', Configuration::get($this->name.'_footery'));
	    	$smarty->assign($this->name.'_authpagey', Configuration::get($this->name.'_authpagey'));
	    	$smarty->assign($this->name.'_welcomey', Configuration::get($this->name.'_welcomey'));
	    	
	    	// yahoo connect
	    	
	    	// linkedin connect
			$linkedinimg = $data_img['linkedin'];
	    	$linkedinsmallimg = $data_img['linkedinsmall'];
	    	
	    	$smarty->assign($this->name.'linkedinimg', $linkedinimg);
	    	$smarty->assign($this->name.'linkedinsmallimg', $linkedinsmallimg);
	    	
	    	$smarty->assign($this->name.'l_on', Configuration::get($this->name.'l_on'));

	    	$smarty->assign($this->name.'_topl', Configuration::get($this->name.'_topl'));
	    	$smarty->assign($this->name.'_footerl', Configuration::get($this->name.'_footerl'));
	    	$smarty->assign($this->name.'_authpagel', Configuration::get($this->name.'_authpagel'));
	    	$smarty->assign($this->name.'_welcomel', Configuration::get($this->name.'_welcomel'));
	    	
			$lapikey = Configuration::get($this->name.'lapikey');
			$lsecret = Configuration::get($this->name.'lsecret');
			
			if(strlen($lapikey)>0 && strlen($lsecret)>0){
				$smarty->assign($this->name.'lconf', 1);
	    	} else {
	    		$smarty->assign($this->name.'lconf', 0);
	    	}
	    	// linkedin connect
	    	
	    	
	    	// microsoft connect
			$microsoftimg = $data_img['microsoft'];
	    	$microsoftsmallimg = $data_img['microsoftsmall'];
	    	
	    	$smarty->assign($this->name.'microsoftimg', $microsoftimg);
	    	$smarty->assign($this->name.'microsoftsmallimg', $microsoftsmallimg);
	    	
	    	$smarty->assign($this->name.'m_on', Configuration::get($this->name.'m_on'));

	    	$smarty->assign($this->name.'_topm', Configuration::get($this->name.'_topm'));
	    	$smarty->assign($this->name.'_footerm', Configuration::get($this->name.'_footerm'));
	    	$smarty->assign($this->name.'_authpagem', Configuration::get($this->name.'_authpagem'));
	    	$smarty->assign($this->name.'_welcomem', Configuration::get($this->name.'_welcomem'));
	    	
			$mclientid = Configuration::get($this->name.'mclientid');
			$mclientsecret = Configuration::get($this->name.'mclientsecret');
			
			if(strlen($mclientid)>0 && strlen($mclientsecret)>0){
				$smarty->assign($this->name.'mconf', 1);
	    	} else {
	    		$smarty->assign($this->name.'mconf', 0);
	    	}
	    	// microsoft connect
	    	
	    	$smarty->assign($this->name.'http_referer', $this->_http_referer);
	    	
	    	$smarty->assign($this->name.'is16', $this->_is16);
			
	    	
	    	$data_errors = $this->_translations;
	    	$smarty->assign('ferror', $data_errors['facebook']);
	    	$smarty->assign('terror', $data_errors['twitter']);
	    	$smarty->assign('lerror', $data_errors['linkedin']);
	    	$smarty->assign('merror', $data_errors['microsoft']);
	    	$smarty->assign('perror', $data_errors['paypal']);
	    	
	    	return $this->display(__FILE__, 'head.tpl');
    	}
    }
	
	
public  function hookLeftColumn($params)
	{
		$smarty = $this->context->smarty;
		$cookie = $this->context->cookie;
		
		
		$data_fb = $this->getfacebooklib((int)$params['cookie']->id_lang);
		$smarty->assign($this->name.'lang', $data_fb['lng_iso']);
		
    	global $cart;
    	
    	$is_logged = isset($params['cookie']->id_customer)?$params['cookie']->id_customer:0;
    	
		$smarty->assign(array(
			'cart' => $cart,
			'cart_qties' => $cart->nbProducts(),
			'logged' => $is_logged,
			'customerName' => ($cookie->logged ? $cookie->customer_firstname.' '.$cookie->customer_lastname : false),
			'firstName' => ($cookie->logged ? $cookie->customer_firstname : false),
			'lastName' => ($cookie->logged ? $cookie->customer_lastname : false)
		));
		
		
		$smarty->assign($this->name.'islogged', $is_logged);
		
		// facebook connect
		include_once(dirname(__FILE__).'/classes/facebookhelp.class.php');
		$obj = new facebookhelp();
    	$data_img = $obj->getImages();
    	
    	$facebookimg = $data_img['facebook'];
    	$facebooksmallimg = $data_img['facebooksmall'];
    	
    	$smarty->assign($this->name.'facebookimg', $facebookimg);
    	$smarty->assign($this->name.'facebooksmallimg', $facebooksmallimg);
    	
    	$smarty->assign($this->name.'f_on', Configuration::get($this->name.'f_on'));

    	$smarty->assign($this->name.'_leftcolumnf', Configuration::get($this->name.'_leftcolumnf'));
    	
    	// facebook connect
    	
    	
    	// google connect
		$googleimg = $data_img['google'];
    	$googlesmallimg = $data_img['googlesmall'];
    	
    	$smarty->assign($this->name.'googleimg', $googleimg);
    	$smarty->assign($this->name.'googlesmallimg', $googlesmallimg);
    	
    	$smarty->assign($this->name.'g_on', Configuration::get($this->name.'g_on'));

    	$smarty->assign($this->name.'_leftcolumng', Configuration::get($this->name.'_leftcolumng'));
    		
    	// google connect
    	
    	// paypal connect
		$paypalimg = $data_img['paypal'];
    	$paypalsmallimg = $data_img['paypalsmall'];
    	
    	$smarty->assign($this->name.'paypalimg', $paypalimg);
    	$smarty->assign($this->name.'paypalsmallimg', $paypalsmallimg);
    	
    	$smarty->assign($this->name.'p_on', Configuration::get($this->name.'p_on'));

    	$smarty->assign($this->name.'_leftcolumnp', Configuration::get($this->name.'_leftcolumnp'));
    	
		$clientid = Configuration::get($this->name.'clientid');
		$psecret = Configuration::get($this->name.'psecret');
		$pcallback = Configuration::get($this->name.'pcallback');
		if(strlen($clientid)>0 && strlen($psecret)>0 && strlen($pcallback)>0){
			$smarty->assign($this->name.'pconf', 1);
    	} else {
    		$smarty->assign($this->name.'pconf', 0);
    	}
    	// paypal connect
    	
    	// twitter connect
		$twitterimg = $data_img['twitter'];
    	$twittersmallimg = $data_img['twittersmall'];
    	
    	$smarty->assign($this->name.'twitterimg', $twitterimg);
    	$smarty->assign($this->name.'twittersmallimg', $twittersmallimg);
    	
    	$smarty->assign($this->name.'t_on', Configuration::get($this->name.'t_on'));

    	$smarty->assign($this->name.'_leftcolumnt', Configuration::get($this->name.'_leftcolumnt'));
		
    	$consumer_key = Configuration::get($this->name.'twitterconskey');
		$consumer_secret = Configuration::get($this->name.'twitterconssecret');
		if(strlen($consumer_key)>0 && strlen($consumer_secret)>0){
			$smarty->assign($this->name.'tconf', 1);
    	} else {
    		$smarty->assign($this->name.'tconf', 0);
    	}
    	// twitter connect
    	
    	// linkedin connect
		$linkedinimg = $data_img['linkedin'];
    	$linkedinsmallimg = $data_img['linkedinsmall'];
    	
    	$smarty->assign($this->name.'linkedinimg', $linkedinimg);
    	$smarty->assign($this->name.'linkedinsmallimg', $linkedinsmallimg);
    	
    	$smarty->assign($this->name.'l_on', Configuration::get($this->name.'l_on'));

    	$smarty->assign($this->name.'_leftcolumnl', Configuration::get($this->name.'_leftcolumnl'));
    	
		$lapikey = Configuration::get($this->name.'lapikey');
		$lsecret = Configuration::get($this->name.'lsecret');
		
		if(strlen($lapikey)>0 && strlen($lsecret)>0){
			$smarty->assign($this->name.'lconf', 1);
    	} else {
    		$smarty->assign($this->name.'lconf', 0);
    	}
    	
    	// linkedin connect
    	$id_lang = (int)$cookie->id_lang;
    	
    	$iso_lang = Language::getIsoById(intval($id_lang))."/";   
			
    	if(!$this->_multiple_lang)
			$iso_lang = "";   
			
    	$smarty->assign($this->name.'iso_lang', $iso_lang);
    	  
    	if(Configuration::get('PS_REWRITING_SETTINGS') && version_compare(_PS_VERSION_, '1.4', '>')){
    		$smarty->assign($this->name.'is_rewrite', 1);
    	} else {
    		$smarty->assign($this->name.'is_rewrite',0);
    	}
    	
		
    	// if order page    
        if(version_compare(_PS_VERSION_, '1.5', '>')){
	        $data = explode("?",$this->_http_referer);
	    	$data  = end($data);
	    	$data_url_rewrite_on = explode("/",$this->_http_referer);
	    	$data_url_rewrite_on = end($data_url_rewrite_on);
	    	
	    	$order_page = 0;
	        if($data == 'controller=order' || $data_url_rewrite_on == 'order'){
	        	$order_page = 1;
	    		 	
	    	}
	    	$smarty->assign($this->name.'order_page', $order_page);
	    } else {
	    	$data = explode("/",$this->_http_referer);
	    	$data  = end($data);
	    	
	    	$order_page = 0;
	    	if($data == 'order.php' 
	    	|| $data == 'order'
	    	){
	    		$order_page = 1;
	    		 	
	    	}
	    	$smarty->assign($this->name.'order_page', $order_page);
	    }
    	// if order page 
    	
    	// yahoo connect
		$yahooimg = $data_img['yahoo'];
    	$yahoosmallimg = $data_img['yahoosmall'];
    	
    	$smarty->assign($this->name.'yahooimg', $yahooimg);
    	$smarty->assign($this->name.'yahoosmallimg', $yahoosmallimg);
    	
    	$smarty->assign($this->name.'y_on', Configuration::get($this->name.'y_on'));

    	$smarty->assign($this->name.'_leftcolumny', Configuration::get($this->name.'_leftcolumny'));
    	
    	// yahoo connect
    	
    	$smarty->assign($this->name.'http_referer', $this->_http_referer);
    	$smarty->assign($this->name.'is15', $this->_is15);
    	
		
    		// microsoft connect
		$microsoftimg = $data_img['microsoft'];
    	$microsoftsmallimg = $data_img['microsoftsmall'];
    	
    	$smarty->assign($this->name.'microsoftimg', $microsoftimg);
    	$smarty->assign($this->name.'microsoftsmallimg', $microsoftsmallimg);
    	
    	$smarty->assign($this->name.'m_on', Configuration::get($this->name.'m_on'));

    	$smarty->assign($this->name.'_leftcolumnm', Configuration::get($this->name.'_leftcolumnm'));
    	
		$mclientid = Configuration::get($this->name.'mclientid');
		$mclientsecret = Configuration::get($this->name.'mclientsecret');
		
		if(strlen($mclientid)>0 && strlen($mclientsecret)>0){
			$smarty->assign($this->name.'mconf', 1);
    	} else {
    		$smarty->assign($this->name.'mconf', 0);
    	}
    	
    	// microsoft connect
    	$data_errors = $this->_translations;
    	$smarty->assign('ferror', $data_errors['facebook']);
    	$smarty->assign('terror', $data_errors['twitter']);
    	$smarty->assign('lerror', $data_errors['linkedin']);
    	$smarty->assign('merror', $data_errors['microsoft']);
    	$smarty->assign('perror', $data_errors['paypal']);
		
		if(version_compare(_PS_VERSION_, '1.5', '>')){
			return $this->display(__FILE__, 'left15.tpl');
		} else {
			return $this->display(__FILE__, 'left.tpl');
		}

		
	}
	
	public function hookRightColumn($params)
	{
		$smarty = $this->context->smarty;
		$cookie = $this->context->cookie;
		
		
		$data_fb = $this->getfacebooklib((int)$params['cookie']->id_lang);
		$smarty->assign($this->name.'lang', $data_fb['lng_iso']);
			
    	global $cart;
    	
    	$is_logged = isset($params['cookie']->id_customer)?$params['cookie']->id_customer:0;
		
		$smarty->assign(array(
			'cart' => $cart,
			'cart_qties' => $cart->nbProducts(),
			'logged' => $is_logged,
			'customerName' => ($cookie->logged ? $cookie->customer_firstname.' '.$cookie->customer_lastname : false),
			'firstName' => ($cookie->logged ? $cookie->customer_firstname : false),
			'lastName' => ($cookie->logged ? $cookie->customer_lastname : false)
		));
		
		// facebook connect
		include_once(dirname(__FILE__).'/classes/facebookhelp.class.php');
		$obj = new facebookhelp();
    	$data_img = $obj->getImages();

    	$facebookimg = $data_img['facebook'];
    	$facebooksmallimg = $data_img['facebooksmall'];
    	
    	$smarty->assign($this->name.'facebookimg', $facebookimg);
    	$smarty->assign($this->name.'facebooksmallimg', $facebooksmallimg);
    	
    	$smarty->assign($this->name.'f_on', Configuration::get($this->name.'f_on'));

    	$smarty->assign($this->name.'_rightcolumnf', Configuration::get($this->name.'_rightcolumnf'));
    	
    	// facebook connect
    	
    	
    	// google connect
		$googleimg = $data_img['google'];
    	$googlesmallimg = $data_img['googlesmall'];
    	
    	$smarty->assign($this->name.'googleimg', $googleimg);
    	$smarty->assign($this->name.'googlesmallimg', $googlesmallimg);
    	
    	$smarty->assign($this->name.'g_on', Configuration::get($this->name.'g_on'));

    	$smarty->assign($this->name.'_rightcolumng', Configuration::get($this->name.'_rightcolumng'));
    		
    	// google connect
    	
    	// paypal connect
		$paypalimg = $data_img['paypal'];
    	$paypalsmallimg = $data_img['paypalsmall'];
    	
    	$smarty->assign($this->name.'paypalimg', $paypalimg);
    	$smarty->assign($this->name.'paypalsmallimg', $paypalsmallimg);
    	
    	$smarty->assign($this->name.'p_on', Configuration::get($this->name.'p_on'));

    	$smarty->assign($this->name.'_rightcolumnp', Configuration::get($this->name.'_rightcolumnp'));
		
    	$clientid = Configuration::get($this->name.'clientid');
		$psecret = Configuration::get($this->name.'psecret');
		$pcallback = Configuration::get($this->name.'pcallback');
		if(strlen($clientid)>0 && strlen($psecret)>0 && strlen($pcallback)>0){
			$smarty->assign($this->name.'pconf', 1);
    	} else {
    		$smarty->assign($this->name.'pconf', 0);
    	}
    	// paypal connect
    	
    	// twitter connect
		$twitterimg = $data_img['twitter'];
    	$twittersmallimg = $data_img['twittersmall'];
    	
    	$smarty->assign($this->name.'twitterimg', $twitterimg);
    	$smarty->assign($this->name.'twittersmallimg', $twittersmallimg);
    	
    	$smarty->assign($this->name.'t_on', Configuration::get($this->name.'t_on'));

    	$smarty->assign($this->name.'_rightcolumnt', Configuration::get($this->name.'_rightcolumnt'));
		
    	$consumer_key = Configuration::get($this->name.'twitterconskey');
		$consumer_secret = Configuration::get($this->name.'twitterconssecret');
		if(strlen($consumer_key)>0 && strlen($consumer_secret)>0){
			$smarty->assign($this->name.'tconf', 1);
    	} else {
    		$smarty->assign($this->name.'tconf', 0);
    	}
    	// twitter connect
    	
    	// linkedin connect
		$linkedinimg = $data_img['linkedin'];
    	$linkedinsmallimg = $data_img['linkedinsmall'];
    	
    	$smarty->assign($this->name.'linkedinimg', $linkedinimg);
    	$smarty->assign($this->name.'linkedinsmallimg', $linkedinsmallimg);
    	
    	$smarty->assign($this->name.'l_on', Configuration::get($this->name.'l_on'));

    	$smarty->assign($this->name.'_rightcolumnl', Configuration::get($this->name.'_rightcolumnl'));
    	
		$lapikey = Configuration::get($this->name.'lapikey');
		$lsecret = Configuration::get($this->name.'lsecret');
		
		if(strlen($lapikey)>0 && strlen($lsecret)>0){
			$smarty->assign($this->name.'lconf', 1);
    	} else {
    		$smarty->assign($this->name.'lconf', 0);
    	}
    	
    	// linkedin connect
		
    	$smarty->assign($this->name.'islogged', $is_logged);
		
    	$id_lang = (int)$cookie->id_lang;
    	
		$iso_lang = Language::getIsoById(intval($id_lang))."/";   
			
    	if(!$this->_multiple_lang)
			$iso_lang = "";   
			
		$smarty->assign($this->name.'iso_lang', $iso_lang);
		
		
		if(Configuration::get('PS_REWRITING_SETTINGS') && version_compare(_PS_VERSION_, '1.4', '>')){
    		$smarty->assign($this->name.'is_rewrite', 1);
    	} else {
    		$smarty->assign($this->name.'is_rewrite',0);
    	}
    	
    	
    	// if order page    
        if(version_compare(_PS_VERSION_, '1.5', '>')){
	        $data = explode("?",$this->_http_referer);
	    	$data  = end($data);
	    	$data_url_rewrite_on = explode("/",$this->_http_referer);
	    	$data_url_rewrite_on = end($data_url_rewrite_on);
	    	
	    	$order_page = 0;
	        if($data == 'controller=order' || $data_url_rewrite_on == 'order'){
	        	$order_page = 1;
	    		 	
	    	}
	    	$smarty->assign($this->name.'order_page', $order_page);
	    } else {
	    	$data = explode("/",$this->_http_referer);
	    	$data  = end($data);
	    	
	    	$order_page = 0;
	    	if($data == 'order.php' 
	    	|| $data == 'order'
	    	){
	    		$order_page = 1;
	    		 	
	    	}
	    	$smarty->assign($this->name.'order_page', $order_page);
	    }
    	// if order page 
    	
    	
    	// yahoo connect
		$yahooimg = $data_img['yahoo'];
    	$yahoosmallimg = $data_img['yahoosmall'];
    	
    	$smarty->assign($this->name.'yahooimg', $yahooimg);
    	$smarty->assign($this->name.'yahoosmallimg', $yahoosmallimg);
    	
    	$smarty->assign($this->name.'y_on', Configuration::get($this->name.'y_on'));

    	$smarty->assign($this->name.'_rightcolumny', Configuration::get($this->name.'_rightcolumny'));
    	
    	// yahoo connect
    	
    	$smarty->assign($this->name.'http_referer', $this->_http_referer);
    	$smarty->assign($this->name.'is15', $this->_is15);
    	
    	
    	// microsoft connect
		$microsoftimg = $data_img['microsoft'];
    	$microsoftsmallimg = $data_img['microsoftsmall'];
    	
    	$smarty->assign($this->name.'microsoftimg', $microsoftimg);
    	$smarty->assign($this->name.'microsoftsmallimg', $microsoftsmallimg);
    	
    	$smarty->assign($this->name.'m_on', Configuration::get($this->name.'m_on'));

    	$smarty->assign($this->name.'_rightcolumnm', Configuration::get($this->name.'_rightcolumnm'));
    	
		$mclientid = Configuration::get($this->name.'mclientid');
		$mclientsecret = Configuration::get($this->name.'mclientsecret');
		
		if(strlen($mclientid)>0 && strlen($mclientsecret)>0){
			$smarty->assign($this->name.'mconf', 1);
    	} else {
    		$smarty->assign($this->name.'mconf', 0);
    	}
    	
    	// microsoft connect
    	
    	
    	$data_errors = $this->_translations;
    	$smarty->assign('ferror', $data_errors['facebook']);
    	$smarty->assign('terror', $data_errors['twitter']);
    	$smarty->assign('lerror', $data_errors['linkedin']);
    	$smarty->assign('merror', $data_errors['microsoft']);
    	$smarty->assign('perror', $data_errors['paypal']);
    	
		if(version_compare(_PS_VERSION_, '1.5', '>')){
			return $this->display(__FILE__, 'right15.tpl');
		} else {
			return $this->display(__FILE__, 'right.tpl');
		}		
	}
	

	
    
    public function getfacebooklib($id_lang){
    	
    	$lang = new Language((int)$id_lang);
		
    	$lng_code = isset($lang->language_code)?$lang->language_code:$lang->iso_code;
    	if(strstr($lng_code, '-')){
			$res = explode('-', $lng_code);
			$language_iso = strtolower($res[0]).'_'.strtoupper($res[1]);
		} else {
			$language_iso = strtolower($lng_code).'_'.strtoupper($lng_code);
		}
			
			
		if (!in_array($language_iso, $this->getfacebooklocale()))
			$language_iso = "en_US";
		
		if (Configuration::get('PS_SSL_ENABLED') == 1)
			$url = "https://";
		else
			$url = "http://";
		
		return array('url'=>$url . 'connect.facebook.net/'.$language_iso.'/all.js#xfbml=1',
					  'lng_iso' => $language_iso);
    }
    
	public function getfacebooklocale()
	{
		$locales = array();

		if (($xml=simplexml_load_file(_PS_MODULE_DIR_ . $this->name."/lib/facebook_locales.xml")) === false)
			return $locales;
			
		$result = $xml->xpath('/locales/locale/codes/code/standard/representation');

		foreach ($result as $locale)
		{
			list($k, $node) = each($locale);
			$locales[] = $node;
		}
			
		return $locales;
	}
    
	
	public function getContent()
    {
    	
    	global $currentIndex;

    	$cookie = $this->context->cookie;
		
    	$this->_html = '';
    	
    	$this->_html .= $this->_headercssfiles();
    	
    	include_once(dirname(__FILE__).'/classes/facebookhelp.class.php');
		$obj = new facebookhelp();
			
		
			
        if (Tools::isSubmit('submitt'))
        {
       	   // twitter connect
       	    Configuration::updateValue($this->name.'twitterconskey', Tools::getValue('twitterconskey'));
	    	Configuration::updateValue($this->name.'twitterconssecret', Tools::getValue('twitterconssecret'));
	    
        	Configuration::updateValue($this->name.'t_on', Tools::getValue('t_on'));
		 		
        	Configuration::updateValue($this->name.'_topt', Tools::getValue('topt'));
        	Configuration::updateValue($this->name.'_rightcolumnt', Tools::getValue('rightcolumnt'));
        	Configuration::updateValue($this->name.'_leftcolumnt', Tools::getValue('leftcolumnt'));
        	Configuration::updateValue($this->name.'_footert', Tools::getValue('footert'));
        	Configuration::updateValue($this->name.'_authpaget', Tools::getValue('authpaget'));
        	Configuration::updateValue($this->name.'_welcomet', Tools::getValue('welcomet'));
        	
        	
			// save twitter connect image	
			if(!empty($_FILES['post_image_twitter']['name'])){
				$obj->saveImage(array('type'=>'twitter'));	
			}
			
	        // save twitter connect small image	
			if(!empty($_FILES['post_image_twittersmall']['name'])){
				$obj->saveImage(array('type'=>'twittersmall'));	
			}
        	$this->_html .= '<script>init_tabs(2);</script>';
			
        	// twitter connect
        }
        	
        if (Tools::isSubmit('submitf'))
        {
       	
        	// facebook connect
        	Configuration::updateValue($this->name.'appid', Tools::getValue('appid'));
        	Configuration::updateValue($this->name.'secret', Tools::getValue('secret'));
        	
        	Configuration::updateValue($this->name.'f_on', Tools::getValue('f_on'));
		 		
        	Configuration::updateValue($this->name.'_topf', Tools::getValue('topf'));
        	Configuration::updateValue($this->name.'_rightcolumnf', Tools::getValue('rightcolumnf'));
        	Configuration::updateValue($this->name.'_leftcolumnf', Tools::getValue('leftcolumnf'));
        	Configuration::updateValue($this->name.'_footerf', Tools::getValue('footerf'));
        	Configuration::updateValue($this->name.'_authpagef', Tools::getValue('authpagef'));
        	Configuration::updateValue($this->name.'_welcomef', Tools::getValue('welcomef'));
        	
		 	
			
			// save facebook connect image	
			if(!empty($_FILES['post_image_facebook']['name'])){
				$obj->saveImage(array('type'=>'facebook'));	
			}
			
	        // save facebook connect small image	
			if(!empty($_FILES['post_image_facebooksmall']['name'])){
				$obj->saveImage(array('type'=>'facebooksmall'));	
			}
			
			$this->_html .= '<script>init_tabs(8);</script>';
			
			
        }

        if (Tools::isSubmit('submitg'))
        {
        
        	// google connect
        	Configuration::updateValue($this->name.'g_on', Tools::getValue('g_on'));
		 		
        	Configuration::updateValue($this->name.'_topg', Tools::getValue('topg'));
        	Configuration::updateValue($this->name.'_rightcolumng', Tools::getValue('rightcolumng'));
        	Configuration::updateValue($this->name.'_leftcolumng', Tools::getValue('leftcolumng'));
        	Configuration::updateValue($this->name.'_footerg', Tools::getValue('footerg'));
        	Configuration::updateValue($this->name.'_authpageg', Tools::getValue('authpageg'));
        	Configuration::updateValue($this->name.'_welcomeg', Tools::getValue('welcomeg'));
        	
        	// changes OAuth 2.0
	 	
		 	Configuration::updateValue($this->name.'oci', Tools::getValue('oci'));
        	Configuration::updateValue($this->name.'ocs', Tools::getValue('ocs'));
        	Configuration::updateValue($this->name.'oru', Tools::getValue('oru'));
        	
        	// changes OAuth 2.0
	 	
			
			// save google connect image	
			if(!empty($_FILES['post_image_google']['name'])){
				$obj->saveImage(array('type'=>'google'));	
			}
			
	        // save google connect image	
			if(!empty($_FILES['post_image_googlesmall']['name'])){
				$obj->saveImage(array('type'=>'googlesmall'));	
			}
			$this->_html .= '<script>init_tabs(3);</script>';
        }
        	
        

         if (Tools::isSubmit('submitl'))
        {
			// linkedin connect
        	
			Configuration::updateValue($this->name.'lapikey', Tools::getValue('lapikey'));
        	Configuration::updateValue($this->name.'lsecret', Tools::getValue('lsecret'));
			
        	Configuration::updateValue($this->name.'l_on', Tools::getValue('l_on'));
		 		
        	Configuration::updateValue($this->name.'_topl', Tools::getValue('topl'));
        	Configuration::updateValue($this->name.'_rightcolumnl', Tools::getValue('rightcolumnl'));
        	Configuration::updateValue($this->name.'_leftcolumnl', Tools::getValue('leftcolumnl'));
        	Configuration::updateValue($this->name.'_footerl', Tools::getValue('footerl'));
        	Configuration::updateValue($this->name.'_authpagel', Tools::getValue('authpagel'));
        	Configuration::updateValue($this->name.'_welcomel', Tools::getValue('welcomel'));
        	
		 	
			
			// save linkedin connect image	
			if(!empty($_FILES['post_image_linkedin']['name'])){
				$obj->saveImage(array('type'=>'linkedin'));	
			}
			
	        // save linkedin connect small image	
			if(!empty($_FILES['post_image_linkedinsmall']['name'])){
				$obj->saveImage(array('type'=>'linkedinsmall'));	
			}
			
			$this->_html .= '<script>init_tabs(6);</script>';
        }
			
         if (Tools::isSubmit('submitm'))
        {
        	// microsoft connect
        	
			Configuration::updateValue($this->name.'mclientid', Tools::getValue('mclientid'));
        	Configuration::updateValue($this->name.'mclientsecret', Tools::getValue('mclientsecret'));
			
        	Configuration::updateValue($this->name.'m_on', Tools::getValue('m_on'));
		 		
        	Configuration::updateValue($this->name.'_topm', Tools::getValue('topm'));
        	Configuration::updateValue($this->name.'_rightcolumnm', Tools::getValue('rightcolumnm'));
        	Configuration::updateValue($this->name.'_leftcolumnm', Tools::getValue('leftcolumnm'));
        	Configuration::updateValue($this->name.'_footerm', Tools::getValue('footerm'));
        	Configuration::updateValue($this->name.'_authpagem', Tools::getValue('authpagem'));
        	Configuration::updateValue($this->name.'_welcomem', Tools::getValue('welcomem'));
        	
		 	
			
			// save microsoft connect image	
			if(!empty($_FILES['post_image_microsoft']['name'])){
				$obj->saveImage(array('type'=>'microsoft'));	
			}
			
	        // save microsoft connect small image	
			if(!empty($_FILES['post_image_microsoftsmall']['name'])){
				$obj->saveImage(array('type'=>'microsoftsmall'));	
			}
			$this->_html .= '<script>init_tabs(7);</script>';
        }	
    	
        $this->_html .= $this->_displayForm();
        
        if(version_compare(_PS_VERSION_, '1.6', '>')){
        	$this->_html .= $this->renderForm();
        }
        
        return $this->_html;
    }
    
    
public function renderForm()
	{
		//$helper = new HelperForm();
	}
	

    
    
private function _displayForm()
     {
     	
     	
     	$_html = '';
     	
     	  $_html .= '
        <form action="'.Tools::safeOutput($_SERVER['REQUEST_URI']).'" enctype="multipart/form-data" method="post" >';
      
     	  
     	$_html .= '
		<fieldset>
					<legend><img src="../modules/'.$this->name.'/logo.gif"  />
					'.$this->displayName.':</legend>
					
					
		<fieldset class="'.$this->name.'-menu">
			<legend>'.$this->l('Settings').':</legend>
		<ul class="leftMenu">
			<li><a href="javascript:void(0)" onclick="tabs_custom(1)" id="tab-menu-1" class="selected"><img src="../modules/'.$this->name.'/logo.gif" />'.$this->l('Welcome').'</a></li>
			
			<li><a href="javascript:void(0)" onclick="tabs_custom(8)" id="tab-menu-8" class="selected"><img src="../modules/'.$this->name.'/img/settings_f.png" />'.$this->l('Facebook Settings').'</a></li>
			<li><a href="javascript:void(0)" onclick="tabs_custom(2)" id="tab-menu-2"><img src="../modules/'.$this->name.'/img/settings_t.png"  />'.$this->l('Twitter Settings').'</a></li>
			<li><a href="javascript:void(0)" onclick="tabs_custom(3)" id="tab-menu-3"><img src="../modules/'.$this->name.'/img/settings_g.png"  />'.$this->l('Google Settings').'</a></li>
			<li><a href="javascript:void(0)" onclick="tabs_custom(6)" id="tab-menu-6"><img src="../modules/'.$this->name.'/img/settings_l.png"  />'.$this->l('LinkedIn Settings').'</a></li>
			<li><a href="javascript:void(0)" onclick="tabs_custom(7)" id="tab-menu-7"><img src="../modules/'.$this->name.'/img/settings_m.png"  />'.$this->l('Microsoft Settings').'</a></li>
			
			</ul>
		</fieldset>
			
			<div class="'.$this->name.'-content">';
				$_html .= '<div id="tabs-1">'.$this->_welcome().'</div>';
				$_html .= '<div id="tabs-8">'.$this->_drawFacebookSettingsForm().'</div>';
				$_html .= '<div id="tabs-2">'.$this->_drawTwitterSettingsForm().'</div>';
				$_html .= '<div id="tabs-3">'.$this->_drawGoogleSettingsForm().'</div>';
     			$_html .= '<div id="tabs-6">'.$this->_drawLinkedInSettingsForm().'</div>';
     			$_html .= '<div id="tabs-7">'.$this->_drawMicrosoftSettingsForm().'</div>';
     			
     			
     			
     			
     		
			$_html .= '</div>';
				
			$_html .= '<div style="clear:both"></div>';
			
			
			$_html .= '</div>';
			
			
		
		$_html .= '</fieldset>	';
			
		return $_html;
     	
    }
    
private function _welcome(){
 		$cookie = $this->context->cookie;
 		
		$current_language = (int)$cookie->id_lang;
		$iso_lng = Language::getIsoById(intval($current_language));
		$time = time();
		$_html  = '';
		
		if(version_compare(_PS_VERSION_, '1.5', '<')){
			$width = 600;
		} else {
			$width = 670;
		}
		
    	$_html .= '<fieldset>
					<legend><img src="../modules/'.$this->name.'/logo.gif" />'.$this->l('Welcome').'</legend>
					
					';
    	
    	$_html .=  $this->l('Welcome and thank you for purchasing the module.').
    			'<br/><br/>
    			<iframe src="http://storeprestamodules.com/promo.php?ts='.$time.'&amp;version='.$this->version.'&amp;name='.$this->name.'&amp;lang='.$iso_lng.'" class="storeprestamodulespromoiframe" 
    			style="border: 1px solid #CCCCCC !important;height: 550px !important;overflow: auto !important;width: '.$width.'px !important;"></iframe>
    			';
    	$_html .=	'</fieldset>'; 
    			
    	return $_html;
    }
    
    
     private function _drawMicrosoftSettingsForm(){
    	$_html = '';
    	
    	$_html .= '<fieldset>
					<legend><img src="../modules/'.$this->name.'/img/settings_m.png" />'.$this->l('Microsoft Live Settings').'</legend>
					
					';
    	
    	// enable or disable vouchers
    	$_html .= '<label>'.$this->l('Enable or Disable Microsoft Live Connect').':</label>
				<div class="margin-form">
				
					<input type="radio" value="1" id="text_list_on" name="m_on" onclick="enableOrDisableMicrosoft(1)"
							'.(Tools::getValue('m_on', Configuration::get($this->name.'m_on')) ? 'checked="checked" ' : '').'>
					<label for="dhtml_on" class="t"> 
						<img alt="'.$this->l('Enabled').'" title="'.$this->l('Enabled').'" src="../img/admin/enabled.gif">
					</label>
					
					<input type="radio" value="0" id="text_list_off" name="m_on" onclick="enableOrDisableMicrosoft(0)"
						   '.(!Tools::getValue('m_on', Configuration::get($this->name.'m_on')) ? 'checked="checked" ' : '').'>
					<label for="dhtml_off" class="t">
						<img alt="'.$this->l('Disabled').'" title="'.$this->l('Disabled').'" src="../img/admin/disabled.gif">
					</label>
					
					<p class="clear">'.$this->l('Enable or Disable Microsoft Live Connect').'.</p>
				</div>';
    	
    	$_html .= '<script type="text/javascript">
			    	function enableOrDisableMicrosoft(id)
						{
						if(id==0){
							$("#block-microsoft-settings").hide(200);
						} else {
							$("#block-microsoft-settings").show(200);
						}
							
						}
					</script>';
    	
		$_html .= '<div id="block-microsoft-settings" '.(Configuration::get($this->name.'m_on')==1?'style="display:block"':'style="display:none"').'>';
    	
    	
		// Facebook Application Id
    	$_html .= '<label>'.$this->l('Microsoft Live Client ID').':</label>
    			
    				<div class="margin-form">
					<input type="text" name="mclientid"  style="width:274px"
			                		value="'.Tools::getValue('mclientid', Configuration::get($this->name.'mclientid')).'">
					<p class="clear">'.$this->l('This is the "Microsoft Live Client ID" you need to get for your application to work. You can get it from here').' <a href="https://account.live.com/developers/applications/create?tou=1" style="color:green;text-decoration:underline" target="_blank">
									 	https://account.live.com/developers/applications/create?tou=1</a>
										<br/>
									'.$this->l('or').'
									<br/>
					'.$this->l('To configure the "Microsoft Live Client ID" read Installation_guid.pdf , which is located in the folder  with the module.').'
					<br/>
					'.$this->l('or').'
					<br/>
					'.$this->l('Read our blog').' <a href="http://storeprestamodules.com/blog/how-to-configure-microsoft-live-client-id-and-microsoft-live-client-secret/"
									 style="color:green;text-decoration:underline" target="_blank">
									 '.$this->l('How to configure Microsoft Live Client ID and Microsoft Live Client Secret?').'</a>
										
					</p>
				</div>';
    	
    	// Facebook Secret Key
		$_html .= '<label>'.$this->l('Microsoft Live Client Secret').':</label>
    			
    				<div class="margin-form">
					<input type="text" name="mclientsecret"  style="width:274px"
			                		value="'.Tools::getValue('mclientsecret', Configuration::get($this->name.'mclientsecret')).'">
					<p class="clear">'.$this->l('This is the "Microsoft Live Client Secret" you need to get for your application to work. You can get it from here').' <a href="https://account.live.com/developers/applications/create?tou=1" style="color:green;text-decoration:underline" target="_blank">
									 	https://account.live.com/developers/applications/create?tou=1</a>
										<br/>
									'.$this->l('or').'
									<br/>
					'.$this->l('To configure the "Microsoft Live Client Secret" read Installation_guid.pdf , which is located in the folder  with the module.').'
					<br/>
					'.$this->l('or').'
					<br/>
					'.$this->l('Read our blog').' <a href="http://storeprestamodules.com/blog/how-to-configure-microsoft-live-client-id-and-microsoft-live-client-secret/"
									 style="color:green;text-decoration:underline" target="_blank">
									 '.$this->l('How to configure Microsoft Live Client ID and Microsoft Live Client Secret?').'</a>
										
					</p>
				
				</div>';
		
		// Position Facebook Connect
    	$_html .= '<label>'.$this->l('Position Microsoft Live Connect Button').':</label>
    			
    				';
    	$prefix = "m";
    	
    	$top = Configuration::get($this->name.'_top'.$prefix);
		$rightcolumn = Configuration::get($this->name.'_rightcolumn'.$prefix);
		$leftcolumn  = Configuration::get($this->name.'_leftcolumn'.$prefix);
		$footer = Configuration::get($this->name.'_footer'.$prefix);
		$authpage  = Configuration::get($this->name.'_authpage'.$prefix);
		$welcome = Configuration::get($this->name.'_welcome'.$prefix);
		
		ob_start();?>
		<style>
			.choose_hooks input{margin-bottom: 10px}
		</style>
        		
        		<div class="margin-form choose_hooks">
	    			<table style="width:80%;">
	    				<tr>
	    					<td style="width: 33%">Top</td>
	    					<td style="width: 33%">Right Column</td>
	    					<td style="width: 33%">Left Column</td>
	    				</tr>
	    				<tr>
	    					<td>
	    						<input type="checkbox" name="top<?php echo $prefix?>" <?php echo ($top == 'top'.$prefix ? 'checked="checked"' : '')?> value="top<?php echo $prefix?>"/>
	    					</td>
	    					<td>
	    						<input type="checkbox" name="rightcolumn<?php echo $prefix?>" <?php echo ($rightcolumn == 'rightcolumn'.$prefix ? 'checked="checked"' : '')?> value="rightcolumn<?php echo $prefix?>"/>
	    					</td>
	    					<td>
	    						<input type="checkbox" name="leftcolumn<?php echo $prefix?>" <?php echo ($leftcolumn == 'leftcolumn'.$prefix ? 'checked="checked"' : '') ?> value="leftcolumn<?php echo $prefix?>"/>
	    					</td>
	    				</tr>
	    				<tr>
	    					<td>Footer</td>
	    					<td>Authentication page</td>
	    					<td>Near with text Welcome</td>
	    				</tr>
	    				<tr>
	    					<td>
	    						<input type="checkbox" name="footer<?php echo $prefix?>" <?php echo ($footer == 'footer'.$prefix ? 'checked="checked"' : '')?> value="footer<?php echo $prefix?>"/>
	    					</td>
	    					<td>
	    						<input type="checkbox" name="authpage<?php echo $prefix?>" <?php echo ($authpage == 'authpage'.$prefix ? 'checked="checked"' : '')?> value="authpage<?php echo $prefix?>"/>
	    					</td>
	    					<td>
	    						<input type="checkbox" name="welcome<?php echo $prefix?>" <?php echo ($welcome == 'welcome'.$prefix ? 'checked="checked"' : '')?> value="welcome<?php echo $prefix?>"/>
	    					</td>
	    				</tr>
	    				
	    			</table>
	    		</div>
				

		<?php 	$_html .= ob_get_contents();
		ob_end_clean();
					
		
		$_html .= '<label>'.$this->l('Microsoft Live Connect Image').'</label>
    			
    				<div class="margin-form">
					<input type="file" name="post_image_microsoft" id="post_image_microsoft" />';
    	
    	include_once(dirname(__FILE__).'/classes/facebookhelp.class.php');
		$obj = new facebookhelp();
    	$data_img = $obj->getImages(array('admin'=>1));
    	
    	
    	$_html .= '&nbsp;&nbsp;&nbsp;<img id="imagem" src="'.$data_img['microsoft'].'">';
    	
    	if(strlen($data_img['microsoft_block'])>0)
    		$_html .= '&nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" id="imagem-click" style="text-decoration:underline" onclick="return_default_img(\'microsoft\',\''.$this->l('Are you sure you want to remove this item?').'\')">'.$this->l('Click here to return the default image').'</a>';
		
		$_html .= '<p>Allow formats *.jpg; *.jpeg; *.png; *.gif.</p>';
    	$_html .= '</div>';
    	
    	
    	$_html .= '<label>'.$this->l('Microsoft Live Connect Small Image').'</label>
    			
    				<div class="margin-form">
					<input type="file" name="post_image_microsoftsmall" id="post_image_microsoftsmall" />';
    	
    	
    	$_html .= '&nbsp;&nbsp;&nbsp;<img id="imagemsmall" src="'.$data_img['microsoftsmall'].'">';
    	
    	if(strlen($data_img['microsoft_blocksmall'])>0)
    		$_html .= '&nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" id="imagem-clicksmall" style="text-decoration:underline" onclick="return_default_img(\'microsoftsmall\',\''.$this->l('Are you sure you want to remove this item?').'\')">'.$this->l('Click here to return the default image').'</a>';
		
		$_html .= '<p>Allow formats *.jpg; *.jpeg; *.png; *.gif.</p>';
    	$_html .= '</div>';
		
    	
    	$_html .= '</div>';
    	
		$_html .= $this->_updateButton(array('name'=>'Microsoft','prefix'=>'m'));
    	
    	
		$_html .=	'</fieldset>'; 
		
		
    	
    	return $_html;
    }
    

    private function _drawLinkedInSettingsForm(){
    	$_html = '';
    	
    	$_html .= '<fieldset>
					<legend><img src="../modules/'.$this->name.'/img/settings_l.png" />'.$this->l('LinkedIn Settings').'</legend>
					
					';
    	
    	// enable or disable vouchers
    	$_html .= '<label>'.$this->l('Enable or Disable LinkedIn Connect').':</label>
				<div class="margin-form">
				
					<input type="radio" value="1" id="text_list_on" name="l_on" onclick="enableOrDisableLinkedIn(1)"
							'.(Tools::getValue('l_on', Configuration::get($this->name.'l_on')) ? 'checked="checked" ' : '').'>
					<label for="dhtml_on" class="t"> 
						<img alt="'.$this->l('Enabled').'" title="'.$this->l('Enabled').'" src="../img/admin/enabled.gif">
					</label>
					
					<input type="radio" value="0" id="text_list_off" name="l_on" onclick="enableOrDisableLinkedIn(0)"
						   '.(!Tools::getValue('l_on', Configuration::get($this->name.'l_on')) ? 'checked="checked" ' : '').'>
					<label for="dhtml_off" class="t">
						<img alt="'.$this->l('Disabled').'" title="'.$this->l('Disabled').'" src="../img/admin/disabled.gif">
					</label>
					
					<p class="clear">'.$this->l('Enable or Disable LinkedIn Connect').'.</p>
				</div>';
    	
    	$_html .= '<script type="text/javascript">
			    	function enableOrDisableLinkedIn(id)
						{
						if(id==0){
							$("#block-linkedin-settings").hide(200);
						} else {
							$("#block-linkedin-settings").show(200);
						}
							
						}
					</script>';
    	
		$_html .= '<div id="block-linkedin-settings" '.(Configuration::get($this->name.'l_on')==1?'style="display:block"':'style="display:none"').'>';
    	
    	
		// Facebook Application Id
    	$_html .= '<label>'.$this->l('LinkedIn API Key').':</label>
    			
    				<div class="margin-form">
					<input type="text" name="lapikey"  style="width:274px"
			                		value="'.Tools::getValue('lapikey', Configuration::get($this->name.'lapikey')).'">
					<p class="clear">'.$this->l('This is the "LinkedIn API Key" you need to get for your application to work. You can get it from here').' <a href="https://www.linkedin.com/secure/developer" style="color:green;text-decoration:underline" target="_blank">
									 	https://www.linkedin.com/secure/developer</a>
										<br/>
									'.$this->l('or').'
									<br/>
					'.$this->l('To configure the "LinkedIn API Key" read Installation_guid.pdf , which is located in the folder  with the module.').'
					<br/>
					'.$this->l('or').'
					<br/>
					'.$this->l('Read our blog').' <a href="http://storeprestamodules.com/blog/how-to-configure-linkedin-api-key-and-linedin-secret-key/"
									 style="color:green;text-decoration:underline" target="_blank">
									 '.$this->l('How to configure LinkedIn API Key and LinkedIn Secret Key?').'</a>
										
					</p>
				</div>';
    	
    	// Facebook Secret Key
		$_html .= '<label>'.$this->l('LinkedIn Secret Key').':</label>
    			
    				<div class="margin-form">
					<input type="text" name="lsecret"  style="width:274px"
			                		value="'.Tools::getValue('lsecret', Configuration::get($this->name.'lsecret')).'">
					<p class="clear">'.$this->l('This is the "LinkedIn Secret Key" you need to get for your application to work. You can get it from here').' <a href="https://www.linkedin.com/secure/developer" style="color:green;text-decoration:underline" target="_blank">
									 	https://www.linkedin.com/secure/developer</a>
										<br/>
									'.$this->l('or').'
									<br/>
					'.$this->l('To configure the "LinkedIn Secret Key" read Installation_guid.pdf , which is located in the folder  with the module.').'
					<br/>
					'.$this->l('or').'
					<br/>
					'.$this->l('Read our blog').' <a href="http://storeprestamodules.com/blog/how-to-configure-linkedin-api-key-and-linedin-secret-key/"
									 style="color:green;text-decoration:underline" target="_blank">
									 '.$this->l('How to configure LinkedIn API Key and LinkedIn Secret Key?').'</a>
										
					</p>
				
				</div>';
		
		// Position Facebook Connect
    	$_html .= '<label>'.$this->l('Position LinkeIn Connect Button').':</label>
    			
    				';
    	$prefix = "l";
    	
    	$top = Configuration::get($this->name.'_top'.$prefix);
		$rightcolumn = Configuration::get($this->name.'_rightcolumn'.$prefix);
		$leftcolumn  = Configuration::get($this->name.'_leftcolumn'.$prefix);
		$footer = Configuration::get($this->name.'_footer'.$prefix);
		$authpage  = Configuration::get($this->name.'_authpage'.$prefix);
		$welcome = Configuration::get($this->name.'_welcome'.$prefix);
		
		ob_start();?>
		<style>
			.choose_hooks input{margin-bottom: 10px}
		</style>
        		
        		<div class="margin-form choose_hooks">
	    			<table style="width:80%;">
	    				<tr>
	    					<td style="width: 33%">Top</td>
	    					<td style="width: 33%">Right Column</td>
	    					<td style="width: 33%">Left Column</td>
	    				</tr>
	    				<tr>
	    					<td>
	    						<input type="checkbox" name="top<?php echo $prefix?>" <?php echo ($top == 'top'.$prefix ? 'checked="checked"' : '')?> value="top<?php echo $prefix?>"/>
	    					</td>
	    					<td>
	    						<input type="checkbox" name="rightcolumn<?php echo $prefix?>" <?php echo ($rightcolumn == 'rightcolumn'.$prefix ? 'checked="checked"' : '')?> value="rightcolumn<?php echo $prefix?>"/>
	    					</td>
	    					<td>
	    						<input type="checkbox" name="leftcolumn<?php echo $prefix?>" <?php echo ($leftcolumn == 'leftcolumn'.$prefix ? 'checked="checked"' : '') ?> value="leftcolumn<?php echo $prefix?>"/>
	    					</td>
	    				</tr>
	    				<tr>
	    					<td>Footer</td>
	    					<td>Authentication page</td>
	    					<td>Near with text Welcome</td>
	    				</tr>
	    				<tr>
	    					<td>
	    						<input type="checkbox" name="footer<?php echo $prefix?>" <?php echo ($footer == 'footer'.$prefix ? 'checked="checked"' : '')?> value="footer<?php echo $prefix?>"/>
	    					</td>
	    					<td>
	    						<input type="checkbox" name="authpage<?php echo $prefix?>" <?php echo ($authpage == 'authpage'.$prefix ? 'checked="checked"' : '')?> value="authpage<?php echo $prefix?>"/>
	    					</td>
	    					<td>
	    						<input type="checkbox" name="welcome<?php echo $prefix?>" <?php echo ($welcome == 'welcome'.$prefix ? 'checked="checked"' : '')?> value="welcome<?php echo $prefix?>"/>
	    					</td>
	    				</tr>
	    				
	    			</table>
	    		</div>
				

		<?php 	$_html .= ob_get_contents();
		ob_end_clean();
					
		
		$_html .= '<label>'.$this->l('LinkedIn Connect Image').'</label>
    			
    				<div class="margin-form">
					<input type="file" name="post_image_linkedin" id="post_image_linkedin" />';
    	
    	include_once(dirname(__FILE__).'/classes/facebookhelp.class.php');
		$obj = new facebookhelp();
    	$data_img = $obj->getImages(array('admin'=>1));
    	
    	
    	$_html .= '&nbsp;&nbsp;&nbsp;<img id="imagel" src="'.$data_img['linkedin'].'">';
    	
    	if(strlen($data_img['linkedin_block'])>0)
    		$_html .= '&nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" id="imagel-click" style="text-decoration:underline" onclick="return_default_img(\'linkedin\',\''.$this->l('Are you sure you want to remove this item?').'\')">'.$this->l('Click here to return the default image').'</a>';
		
		$_html .= '<p>Allow formats *.jpg; *.jpeg; *.png; *.gif.</p>';
    	$_html .= '</div>';
    	
    	
    	$_html .= '<label>'.$this->l('LinkedIn Connect Small Image').'</label>
    			
    				<div class="margin-form">
					<input type="file" name="post_image_linkedinsmall" id="post_image_linkedinsmall" />';
    	
    	
    	$_html .= '&nbsp;&nbsp;&nbsp;<img id="imagelsmall" src="'.$data_img['linkedinsmall'].'">';
    	
    	if(strlen($data_img['linkedin_blocksmall'])>0)
    		$_html .= '&nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" id="imagel-clicksmall" style="text-decoration:underline" onclick="return_default_img(\'linkedinsmall\',\''.$this->l('Are you sure you want to remove this item?').'\')">'.$this->l('Click here to return the default image').'</a>';
		
		$_html .= '<p>Allow formats *.jpg; *.jpeg; *.png; *.gif.</p>';
    	$_html .= '</div>';
		
    	
    	$_html .= '</div>';
		
    	$_html .= $this->_updateButton(array('name'=>'LinkedIn','prefix'=>'l'));
    	
    	
		$_html .=	'</fieldset>'; 
		
		
    	
    	return $_html;
    }
    
    

    
private function _drawTwitterSettingsForm(){
    	$_html = '';
    	
    	$_html .= '<fieldset>
					<legend><img src="../modules/'.$this->name.'/img/settings_t.png"  />'.$this->l('Twitter Settings').'</legend>';

    	// enable or disable vouchers
    	$_html .= '<label>'.$this->l('Enable or Disable Twitter Connect').':</label>
				<div class="margin-form">
				
					<input type="radio" value="1" id="text_list_on" name="t_on" onclick="enableOrDisableTwitter(1)"
							'.(Tools::getValue('t_on', Configuration::get($this->name.'t_on')) ? 'checked="checked" ' : '').'>
					<label for="dhtml_on" class="t"> 
						<img alt="'.$this->l('Enabled').'" title="'.$this->l('Enabled').'" src="../img/admin/enabled.gif">
					</label>
					
					<input type="radio" value="0" id="text_list_off" name="t_on" onclick="enableOrDisableTwitter(0)"
						   '.(!Tools::getValue('t_on', Configuration::get($this->name.'t_on')) ? 'checked="checked" ' : '').'>
					<label for="dhtml_off" class="t">
						<img alt="'.$this->l('Disabled').'" title="'.$this->l('Disabled').'" src="../img/admin/disabled.gif">
					</label>
					
					<p class="clear">'.$this->l('Enable or Disable Twitter Connect').'.</p>
				</div>';
    	
    	$_html .= '<script type="text/javascript">
			    	function enableOrDisableTwitter(id)
						{
						if(id==0){
							$("#block-twitter-settings").hide(200);
						} else {
							$("#block-twitter-settings").show(200);
						}
							
						}
					</script>';
    	
		$_html .= '<div id="block-twitter-settings" '.(Configuration::get($this->name.'t_on')==1?'style="display:block"':'style="display:none"').'>';
    	
    	
		$_html .= '<label>'.$this->l('Consumer key:').'</label>
    			
    				<div class="margin-form">
					<input type="text" name="twitterconskey"  style="width:274px"
			               value="'.Tools::getValue('twitterconskey', Configuration::get($this->name.'twitterconskey')).'"
			               >
			          <p class="clear">'.$this->l('This is the "Consumer key" you need to get for your application to work. You can get it from here').'<a href="https://twitter.com/apps" style="color:green;text-decoration:underline" target="_blank">
									 	https://twitter.com/apps</a>
										<br/>
									'.$this->l('or').'
									<br/>
					'.$this->l('To configure the "Consumer key" read Installation_guid.pdf , which is located in the folder  with the module.').'
					<br/>
					'.$this->l('or').'
					<br/>
					'.$this->l('Read our blog').' <a href="http://storeprestamodules.com/blog/how-to-configure-twitter-consumer-key-and-twitter-consumer-secret/"
									 style="color:green;text-decoration:underline" target="_blank">
									 '.$this->l('How to configure Twitter Consumer Key and Twitter Consumer Secret ?').'</a>
										
					</p>
					
			       </div>';
		
		$_html .= '<label>'.$this->l('Consumer secret:').'</label>
    			
    				<div class="margin-form">
					<input type="text" name="twitterconssecret"  style="width:274px"
			               value="'.Tools::getValue('twitterconssecret', Configuration::get($this->name.'twitterconssecret')).'">
					  <p class="clear">'.$this->l('This is the "Consumer secret" you need to get for your application to work.  You can get it from here').' <a href="https://twitter.com/apps" style="color:green;text-decoration:underline" target="_blank">
									 	https://twitter.com/apps</a>
										<br/>
									'.$this->l('or').'
									<br/>
					'.$this->l('To configure the "Consumer secret" read Installation_guid.pdf , which is located in the folder  with the module.').'
					<br/>
					'.$this->l('or').'
					<br/>
					'.$this->l('Read our blog').' <a href="http://storeprestamodules.com/blog/how-to-configure-twitter-consumer-key-and-twitter-consumer-secret/"
									 style="color:green;text-decoration:underline" target="_blank">
									 '.$this->l('How to configure Twitter Consumer Key and Twitter Consumer Secret ?').'</a>
										
					</p>
					
					
					
			       </div>';
		
		
		// Position Twitter Connect
    	$_html .= '<label>'.$this->l('Position Twitter Connect Button').':</label>
    			
    				';
    	$prefix = "t";
    	
    	$top = Configuration::get($this->name.'_top'.$prefix);
		$rightcolumn = Configuration::get($this->name.'_rightcolumn'.$prefix);
		$leftcolumn  = Configuration::get($this->name.'_leftcolumn'.$prefix);
		$footer = Configuration::get($this->name.'_footer'.$prefix);
		$authpage  = Configuration::get($this->name.'_authpage'.$prefix);
		$welcome = Configuration::get($this->name.'_welcome'.$prefix);
		
		ob_start();?>
		<style>
			.choose_hooks input{margin-bottom: 10px}
		</style>
        		
        		<div class="margin-form choose_hooks">
	    			<table style="width:80%;">
	    				<tr>
	    					<td style="width: 33%">Top</td>
	    					<td style="width: 33%">Right Column</td>
	    					<td style="width: 33%">Left Column</td>
	    				</tr>
	    				<tr>
	    					<td>
	    						<input type="checkbox" name="top<?php echo $prefix?>" <?php echo ($top == 'top'.$prefix ? 'checked="checked"' : '')?> value="top<?php echo $prefix?>"/>
	    					</td>
	    					<td>
	    						<input type="checkbox" name="rightcolumn<?php echo $prefix?>" <?php echo ($rightcolumn == 'rightcolumn'.$prefix ? 'checked="checked"' : '')?> value="rightcolumn<?php echo $prefix?>"/>
	    					</td>
	    					<td>
	    						<input type="checkbox" name="leftcolumn<?php echo $prefix?>" <?php echo ($leftcolumn == 'leftcolumn'.$prefix ? 'checked="checked"' : '') ?> value="leftcolumn<?php echo $prefix?>"/>
	    					</td>
	    				</tr>
	    				<tr>
	    					<td>Footer</td>
	    					<td>Authentication page</td>
	    					<td>Near with text Welcome</td>
	    				</tr>
	    				<tr>
	    					<td>
	    						<input type="checkbox" name="footer<?php echo $prefix?>" <?php echo ($footer == 'footer'.$prefix ? 'checked="checked"' : '')?> value="footer<?php echo $prefix?>"/>
	    					</td>
	    					<td>
	    						<input type="checkbox" name="authpage<?php echo $prefix?>" <?php echo ($authpage == 'authpage'.$prefix ? 'checked="checked"' : '')?> value="authpage<?php echo $prefix?>"/>
	    					</td>
	    					<td>
	    						<input type="checkbox" name="welcome<?php echo $prefix?>" <?php echo ($welcome == 'welcome'.$prefix ? 'checked="checked"' : '')?> value="welcome<?php echo $prefix?>"/>
	    					</td>
	    				</tr>
	    				
	    			</table>
	    		</div>
				

		<?php 	$_html .= ob_get_contents();
		ob_end_clean();
					
		
		$_html .= '<label>'.$this->l('Twitter Connect Image').'</label>
    			
    				<div class="margin-form">
					<input type="file" name="post_image_twitter" id="post_image_twitter" />';
    	
    	include_once(dirname(__FILE__).'/classes/facebookhelp.class.php');
		$obj = new facebookhelp();
    	$data_img = $obj->getImages(array('admin'=>1));
    	
    	
    	$_html .= '&nbsp;&nbsp;&nbsp;<img id="imaget" src="'.$data_img['twitter'].'">';
    	
    	if(strlen($data_img['twitter_block'])>0)
    		$_html .= '&nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" id="imaget-click" style="text-decoration:underline" onclick="return_default_img(\'twitter\',\''.$this->l('Are you sure you want to remove this item?').'\')">'.$this->l('Click here to return the default image').'</a>';
		
		$_html .= '<p>Allow formats *.jpg; *.jpeg; *.png; *.gif.</p>';
    	$_html .= '</div>';
		
    	
    	$_html .= '<label>'.$this->l('Twitter Connect Small Image').'</label>
    			
    				<div class="margin-form">
					<input type="file" name="post_image_twittersmall" id="post_image_twittersmall" />';
    	
    	$_html .= '&nbsp;&nbsp;&nbsp;<img id="imagetsmall" src="'.$data_img['twittersmall'].'">';
    	
    	if(strlen($data_img['twitter_blocksmall'])>0)
    		$_html .= '&nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" id="imaget-clicksmall" style="text-decoration:underline" onclick="return_default_img(\'twittersmall\',\''.$this->l('Are you sure you want to remove this item?').'\')">'.$this->l('Click here to return the default image').'</a>';
		
		$_html .= '<p>Allow formats *.jpg; *.jpeg; *.png; *.gif.</p>';
    	$_html .= '</div>';
		
		$_html .= '</div>';
		
		$_html .= $this->_updateButton(array('name'=>'Twitter','prefix'=>'t'));
    	
		
		$_html .= '</fieldset>';
    	
    	return $_html;
    }
    
	
    
	private function _drawGoogleSettingsForm(){
    	$_html = '';
    	
    	$_html .= '<fieldset>
					<legend><img src="../modules/'.$this->name.'/img/settings_g.png" />'.$this->l('Google Settings').'</legend>
					
					';
    	
    	// enable or disable vouchers
    	$_html .= '<label>'.$this->l('Enable or Disable Google Connect').':</label>
				<div class="margin-form">
				
					<input type="radio" value="1" id="text_list_on" name="g_on" onclick="enableOrDisableGoogle(1)"
							'.(Tools::getValue('g_on', Configuration::get($this->name.'g_on')) ? 'checked="checked" ' : '').'>
					<label for="dhtml_on" class="t"> 
						<img alt="'.$this->l('Enabled').'" title="'.$this->l('Enabled').'" src="../img/admin/enabled.gif">
					</label>
					
					<input type="radio" value="0" id="text_list_off" name="g_on" onclick="enableOrDisableGoogle(0)"
						   '.(!Tools::getValue('g_on', Configuration::get($this->name.'g_on')) ? 'checked="checked" ' : '').'>
					<label for="dhtml_off" class="t">
						<img alt="'.$this->l('Disabled').'" title="'.$this->l('Disabled').'" src="../img/admin/disabled.gif">
					</label>
					
					<p class="clear">'.$this->l('Enable or Disable Google Connect').'.</p>
				</div>';
    	
    	$_html .= '<script type="text/javascript">
			    	function enableOrDisableGoogle(id)
						{
						if(id==0){
							$("#block-google-settings").hide(200);
						} else {
							$("#block-google-settings").show(200);
						}
							
						}
					</script>';
    	
		$_html .= '<div id="block-google-settings" '.(Configuration::get($this->name.'g_on')==1?'style="display:block"':'style="display:none"').'>';
    	
    	// changes OAuth 2.0
	 	
		// Google Client Id
		$_html .= '<label>'.$this->l('Google Client Id').':</label>
    			
    				<div class="margin-form">
					<input type="text" name="oci"  style="width:350px"
			                		value="'.Tools::getValue('oci', Configuration::get($this->name.'oci')).'">
					<p class="clear">'.$this->l('This is the "Google Client Id" you need to get for your application to work. You can get it from here').' <a href="https://console.developers.google.com/project" style="color:green;text-decoration:underline" target="_blank">
									 	https://console.developers.google.com/project</a>
										<br/>
									'.$this->l('or').'
									<br/>
					'.$this->l('To configure the "Google Client Id" read Installation_guid.pdf , which is located in the folder  with the module.').'
					<br/>
					'.$this->l('or').'
					<br/>
					'.$this->l('Read our blog').' <a href="http://storeprestamodules.com/blog/how-to-configure-google-client-id-and-google-client-secret/"
									 style="color:green;text-decoration:underline" target="_blank">
									 '.$this->l('How to configure Google Client Id and Google Client Secret?').'</a>
										
					</p>
				</div>';
    	
    	// Google Client Secret
		$_html .= '<label>'.$this->l('Google Client Secret').':</label>
    			
    				<div class="margin-form">
					<input type="text" name="ocs"  style="width:350px"
			                		value="'.Tools::getValue('ocs', Configuration::get($this->name.'ocs')).'">
					<p class="clear">'.$this->l('This is the "Google Client Secret" you need to get for your application to work. You can get it from here').' <a href="https://console.developers.google.com/project" style="color:green;text-decoration:underline" target="_blank">
									 	https://console.developers.google.com/project</a>
										<br/>
									'.$this->l('or').'
									<br/>
					'.$this->l('To configure the "Google Client Secret" read Installation_guid.pdf , which is located in the folder  with the module.').'
					<br/>
					'.$this->l('or').'
					<br/>
					'.$this->l('Read our blog').' <a href="http://storeprestamodules.com/blog/how-to-configure-google-client-id-and-google-client-secret/"
									 style="color:green;text-decoration:underline" target="_blank">
									 '.$this->l('How to configure Google Client Id and Google Client Secret?').'</a>
										
					</p>
				
				</div>';
		
		
		$_html .= '<label>'.$this->l('Google Callback URL').':</label>
    			
    				<div class="margin-form">
					<input type="text" name="oru"  style="width:350px"
			                		value="'.Tools::getValue('oru', Configuration::get($this->name.'oru')).'">
					<p class="clear">'.$this->l('This is the "Google Callback URL" you need to get for your application to work. You can get it from here').' <a href="https://console.developers.google.com/project" style="color:green;text-decoration:underline" target="_blank">
									 	https://console.developers.google.com/project</a>
										<br/>
									'.$this->l('or').'
									<br/>
					'.$this->l('To configure the "Google Callback URL" read Installation_guid.pdf , which is located in the folder  with the module.').'
					<br/>
					'.$this->l('or').'
					<br/>
					'.$this->l('Read our blog').' <a href="http://storeprestamodules.com/blog/how-to-configure-google-client-id-and-google-client-secret/"
									 style="color:green;text-decoration:underline" target="_blank">
									 '.$this->l('How to configure Google Client Id and Google Client Secret?').'</a>
										
					</p>
				
				</div>';
		// changes OAuth 2.0
	 	
		
		
		// Position Google Connect
    	$_html .= '<label>'.$this->l('Position Google Connect Button').':</label>
    			
    				';
    	$prefix = "g";
    	
    	$top = Configuration::get($this->name.'_top'.$prefix);
		$rightcolumn = Configuration::get($this->name.'_rightcolumn'.$prefix);
		$leftcolumn  = Configuration::get($this->name.'_leftcolumn'.$prefix);
		$footer = Configuration::get($this->name.'_footer'.$prefix);
		$authpage  = Configuration::get($this->name.'_authpage'.$prefix);
		$welcome = Configuration::get($this->name.'_welcome'.$prefix);
		
		ob_start();?>
		<style>
			.choose_hooks input{margin-bottom: 10px}
		</style>
        		
        		<div class="margin-form choose_hooks">
	    			<table style="width:80%;">
	    				<tr>
	    					<td style="width: 33%">Top</td>
	    					<td style="width: 33%">Right Column</td>
	    					<td style="width: 33%">Left Column</td>
	    				</tr>
	    				<tr>
	    					<td>
	    						<input type="checkbox" name="top<?php echo $prefix?>" <?php echo ($top == 'top'.$prefix ? 'checked="checked"' : '')?> value="top<?php echo $prefix?>"/>
	    					</td>
	    					<td>
	    						<input type="checkbox" name="rightcolumn<?php echo $prefix?>" <?php echo ($rightcolumn == 'rightcolumn'.$prefix ? 'checked="checked"' : '')?> value="rightcolumn<?php echo $prefix?>"/>
	    					</td>
	    					<td>
	    						<input type="checkbox" name="leftcolumn<?php echo $prefix?>" <?php echo ($leftcolumn == 'leftcolumn'.$prefix ? 'checked="checked"' : '') ?> value="leftcolumn<?php echo $prefix?>"/>
	    					</td>
	    				</tr>
	    				<tr>
	    					<td>Footer</td>
	    					<td>Authentication page</td>
	    					<td>Near with text Welcome</td>
	    				</tr>
	    				<tr>
	    					<td>
	    						<input type="checkbox" name="footer<?php echo $prefix?>" <?php echo ($footer == 'footer'.$prefix ? 'checked="checked"' : '')?> value="footer<?php echo $prefix?>"/>
	    					</td>
	    					<td>
	    						<input type="checkbox" name="authpage<?php echo $prefix?>" <?php echo ($authpage == 'authpage'.$prefix ? 'checked="checked"' : '')?> value="authpage<?php echo $prefix?>"/>
	    					</td>
	    					<td>
	    						<input type="checkbox" name="welcome<?php echo $prefix?>" <?php echo ($welcome == 'welcome'.$prefix ? 'checked="checked"' : '')?> value="welcome<?php echo $prefix?>"/>
	    					</td>
	    				</tr>
	    				
	    			</table>
	    		</div>
				

		<?php 	$_html .= ob_get_contents();
		ob_end_clean();
					
		
		$_html .= '<label>'.$this->l('Google Connect Image').'</label>
    			
    				<div class="margin-form">
					<input type="file" name="post_image_google" id="post_image_google" />';
    	
    	include_once(dirname(__FILE__).'/classes/facebookhelp.class.php');
		$obj = new facebookhelp();
    	$data_img = $obj->getImages(array('admin'=>1));
    	
    	
    	$_html .= '&nbsp;&nbsp;&nbsp;<img id="imageg" src="'.$data_img['google'].'">';
    	
    	if(strlen($data_img['google_block'])>0)
    		$_html .= '&nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" id="imageg-click" style="text-decoration:underline" onclick="return_default_img(\'google\',\''.$this->l('Are you sure you want to remove this item?').'\')">'.$this->l('Click here to return the default image').'</a>';
		
		$_html .= '<p>Allow formats *.jpg; *.jpeg; *.png; *.gif.</p>';
    	$_html .= '</div>';
		
    	
    	$_html .= '<label>'.$this->l('Google Connect Small Image').'</label>
    			
    				<div class="margin-form">
					<input type="file" name="post_image_googlesmall" id="post_image_googlesmall" />';
    	
    	
    	
    	$_html .= '&nbsp;&nbsp;&nbsp;<img id="imagegsmall" src="'.$data_img['googlesmall'].'">';
    	
    	if(strlen($data_img['google_blocksmall'])>0)
    		$_html .= '&nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" id="imageg-clicksmall" style="text-decoration:underline" onclick="return_default_img(\'googlesmall\',\''.$this->l('Are you sure you want to remove this item?').'\')">'.$this->l('Click here to return the default image').'</a>';
		
		$_html .= '<p>Allow formats *.jpg; *.jpeg; *.png; *.gif.</p>';
    	$_html .= '</div>';
    	
    	$_html .= '</div>';
		
    	$_html .= $this->_updateButton(array('name'=>'Google','prefix'=>'g'));
    	
    	
		$_html .=	'</fieldset>'; 
		
		
    	
    	return $_html;
    }
    
	private function _drawFacebookSettingsForm(){
    	$_html = '';
    	
    	$_html .= '<fieldset>
					<legend><img src="../modules/'.$this->name.'/img/settings_f.png" />'.$this->l('Facebook Settings').'</legend>
					
					';
    	
    	// enable or disable vouchers
    	$_html .= '<label>'.$this->l('Enable or Disable Facebook Connect').':</label>
				<div class="margin-form">
				
					<input type="radio" value="1" id="text_list_on" name="f_on" onclick="enableOrDisableFacebook(1)"
							'.(Tools::getValue('f_on', Configuration::get($this->name.'f_on')) ? 'checked="checked" ' : '').'>
					<label for="dhtml_on" class="t"> 
						<img alt="'.$this->l('Enabled').'" title="'.$this->l('Enabled').'" src="../img/admin/enabled.gif">
					</label>
					
					<input type="radio" value="0" id="text_list_off" name="f_on" onclick="enableOrDisableFacebook(0)"
						   '.(!Tools::getValue('f_on', Configuration::get($this->name.'f_on')) ? 'checked="checked" ' : '').'>
					<label for="dhtml_off" class="t">
						<img alt="'.$this->l('Disabled').'" title="'.$this->l('Disabled').'" src="../img/admin/disabled.gif">
					</label>
					
					<p class="clear">'.$this->l('Enable or Disable Facebook Connect').'.</p>
				</div>';
    	
    	$_html .= '<script type="text/javascript">
			    	function enableOrDisableFacebook(id)
						{
						if(id==0){
							$("#block-facebook-settings").hide(200);
						} else {
							$("#block-facebook-settings").show(200);
						}
							
						}
					</script>';
    	
		$_html .= '<div id="block-facebook-settings" '.(Configuration::get($this->name.'f_on')==1?'style="display:block"':'style="display:none"').'>';
    	
    	
		// Facebook Application Id
    	$_html .= '<label>'.$this->l('Facebook Application Id:').'</label>
    			
    				<div class="margin-form">
					<input type="text" name="appid"  style="width:274px"
			                		value="'.Tools::getValue('appid', Configuration::get($this->name.'appid')).'">
					<p class="clear">'.$this->l('This is the "Facebook Application Id" you need to get for your application to work. You can get it from here').' <a href="http://developers.facebook.com/setup" style="color:green;text-decoration:underline" target="_blank">
									 	http://developers.facebook.com/setup</a>
										<br/>
									'.$this->l('or').'
									<br/>
					'.$this->l('To configure the "Facebook Application Id" read Installation_guid.pdf , which is located in the folder  with the module.').'
					<br/>
					'.$this->l('or').'
					<br/>
					'.$this->l('Read our blog').' <a href="http://storeprestamodules.com/blog/how-to-configure-facebook-app-id-and-facebook-secret-key/"
									 style="color:green;text-decoration:underline" target="_blank">
									 '.$this->l('How to configure Facebook App Id and Facebook Secret Key?').'</a>
										
					</p>
				</div>';
    	
    	// Facebook Secret Key
		$_html .= '<label>'.$this->l('Facebook Secret Key:').'</label>
    			
    				<div class="margin-form">
					<input type="text" name="secret"  style="width:274px"
			                		value="'.Tools::getValue('secret', Configuration::get($this->name.'secret')).'">
					<p class="clear">'.$this->l('This is the "Facebook Secret Key" you need to get for your application to work. You can get it from here').' <a href="http://developers.facebook.com/setup" style="color:green;text-decoration:underline" target="_blank">
									 	http://developers.facebook.com/setup</a>
										<br/>
									'.$this->l('or').'
									<br/>
					'.$this->l('To configure the "Facebook Secret Key" read Installation_guid.pdf , which is located in the folder  with the module.').'
					<br/>
					'.$this->l('or').'
					<br/>
					'.$this->l('Read our blog').' <a href="http://storeprestamodules.com/blog/how-to-configure-facebook-app-id-and-facebook-secret-key/"
									 style="color:green;text-decoration:underline" target="_blank">
									 '.$this->l('How to configure Facebook App Id and Facebook Secret Key?').'</a>
										
					</p>
				
				</div>';
		
		// Position Facebook Connect
    	$_html .= '<label>'.$this->l('Position Facebook Connect Button').':</label>
    			
    				';
    	$prefix = "f";
    	
    	$top = Configuration::get($this->name.'_top'.$prefix);
		$rightcolumn = Configuration::get($this->name.'_rightcolumn'.$prefix);
		$leftcolumn  = Configuration::get($this->name.'_leftcolumn'.$prefix);
		$footer = Configuration::get($this->name.'_footer'.$prefix);
		$authpage  = Configuration::get($this->name.'_authpage'.$prefix);
		$welcome = Configuration::get($this->name.'_welcome'.$prefix);
		
		ob_start();?>
		<style>
			.choose_hooks input{margin-bottom: 10px}
		</style>
        		
        		<div class="margin-form choose_hooks">
	    			<table style="width:80%;">
	    				<tr>
	    					<td style="width: 33%">Top</td>
	    					<td style="width: 33%">Right Column</td>
	    					<td style="width: 33%">Left Column</td>
	    				</tr>
	    				<tr>
	    					<td>
	    						<input type="checkbox" name="top<?php echo $prefix?>" <?php echo ($top == 'top'.$prefix ? 'checked="checked"' : '')?> value="top<?php echo $prefix?>"/>
	    					</td>
	    					<td>
	    						<input type="checkbox" name="rightcolumn<?php echo $prefix?>" <?php echo ($rightcolumn == 'rightcolumn'.$prefix ? 'checked="checked"' : '')?> value="rightcolumn<?php echo $prefix?>"/>
	    					</td>
	    					<td>
	    						<input type="checkbox" name="leftcolumn<?php echo $prefix?>" <?php echo ($leftcolumn == 'leftcolumn'.$prefix ? 'checked="checked"' : '') ?> value="leftcolumn<?php echo $prefix?>"/>
	    					</td>
	    				</tr>
	    				<tr>
	    					<td>Footer</td>
	    					<td>Authentication page</td>
	    					<td>Near with text Welcome</td>
	    				</tr>
	    				<tr>
	    					<td>
	    						<input type="checkbox" name="footer<?php echo $prefix?>" <?php echo ($footer == 'footer'.$prefix ? 'checked="checked"' : '')?> value="footer<?php echo $prefix?>"/>
	    					</td>
	    					<td>
	    						<input type="checkbox" name="authpage<?php echo $prefix?>" <?php echo ($authpage == 'authpage'.$prefix ? 'checked="checked"' : '')?> value="authpage<?php echo $prefix?>"/>
	    					</td>
	    					<td>
	    						<input type="checkbox" name="welcome<?php echo $prefix?>" <?php echo ($welcome == 'welcome'.$prefix ? 'checked="checked"' : '')?> value="welcome<?php echo $prefix?>"/>
	    					</td>
	    				</tr>
	    				
	    			</table>
	    		</div>
				

		<?php 	$_html .= ob_get_contents();
		ob_end_clean();
					
		
		$_html .= '<label>'.$this->l('Facebook Connect Image').'</label>
    			
    				<div class="margin-form">
					<input type="file" name="post_image_facebook" id="post_image_facebook" />';
    	
    	include_once(dirname(__FILE__).'/classes/facebookhelp.class.php');
		$obj = new facebookhelp();
    	$data_img = $obj->getImages(array('admin'=>1));
    	
    	
    	$_html .= '&nbsp;&nbsp;&nbsp;<img id="imagef" src="'.$data_img['facebook'].'">';
    	
    	if(strlen($data_img['facebook_block'])>0)
    		$_html .= '&nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" id="imagef-click" style="text-decoration:underline" onclick="return_default_img(\'facebook\',\''.$this->l('Are you sure you want to remove this item?').'\')">'.$this->l('Click here to return the default image').'</a>';
		
		$_html .= '<p>Allow formats *.jpg; *.jpeg; *.png; *.gif.</p>';
    	$_html .= '</div>';
    	
    	
    	$_html .= '<label>'.$this->l('Facebook Connect Small Image').'</label>
    			
    				<div class="margin-form">
					<input type="file" name="post_image_facebooksmall" id="post_image_facebooksmall" />';
    	
    	
    	$_html .= '&nbsp;&nbsp;&nbsp;<img id="imagefsmall" src="'.$data_img['facebooksmall'].'">';
    	
    	if(strlen($data_img['facebook_blocksmall'])>0)
    		$_html .= '&nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" id="imagef-clicksmall" style="text-decoration:underline" onclick="return_default_img(\'facebooksmall\',\''.$this->l('Are you sure you want to remove this item?').'\')">'.$this->l('Click here to return the default image').'</a>';
		
		$_html .= '<p>Allow formats *.jpg; *.jpeg; *.png; *.gif.</p>';
    	$_html .= '</div>';
		
    	
    	$_html .= '</div>';
		
    	$_html .= $this->_updateButton(array('name'=>'Facebook','prefix'=>'f'));
    	
		$_html .=	'</fieldset>'; 
		
		
    	
    	return $_html;
    }
    
 private function _updateButton($data){
 	
 		$name = isset($data['name'])?$data['name']:'';
 		$prefix = isset($data['prefix'])?$data['prefix']:'';
 		
    	$_html = '';
    	$_html .= '<p class="center" style="text-align:center;border: 1px solid #EBEDF4; padding: 10px; margin-top: 10px;">
					<input type="submit" name="submit'.$prefix.'" value="'.$this->l('Update').' '.$name.' '.$this->l('settings').'" 
                		   class="button"  />
                	</p>';
    	
    	$_html .=	'</form>';
    	
    	return $_html;
    	
    }
    
    
private function _headercssfiles(){
		$_html = '';
    
		$_html .= '<script type="text/javascript" src="../modules/'.$this->name.'/js/javascript.js"></script>';
    	
		$_html .= '<link rel="stylesheet" href="../modules/'.$this->name.'/css/custom_menu.css" type="text/css" />';
    	$_html .= '<script type="text/javascript" src="../modules/'.$this->name.'/js/custom_menu.js"></script>';
    
    	return $_html;
	}
	
	public function translateCustom(){
		return array('billing_address'=>$this->l('Delivery Address'));
	}		
}