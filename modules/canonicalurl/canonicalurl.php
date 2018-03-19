<?php
/*
* 2007-2013 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2013 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

if (!defined('_PS_VERSION_'))
	exit;

class Canonicalurl extends Module
{

	public function __construct()
	{
		$this->name = 'canonicalurl';
		$this->tab = 'seo';
		$this->version = 1.0;
		$this->author = 'Bartomeu';
                $this->need_instance = 0;

		parent::__construct();

		$this->displayName = $this->l('Canonical URL for Prestashop');
		$this->description = $this->l('Display Canonical URL. Can establish one principal domain for multishop');
	}

	public function install()
	{
		if (!parent::install() || !$this->registerHook('header'))
			return false;
		Configuration::updateValue('USE_CANONICAL_DEFAULT_URL', 0);
		Configuration::updateValue('CANONICAL_DEFAULT_URL', '');
                
		return true;
	}
        
        /* Canonical URL configuration section
	 *
	 * @return HTML page (template) to use the addon 
	 */
	public function getContent()
	{
		/* Store the posted parameters and generate a new Google Sitemap files for the current Shop */
		if (Tools::isSubmit('SubmitCanonicalUrl'))
		{                        
			Configuration::updateValue('USE_CANONICAL_DEFAULT_URL', pSQL(Tools::getValue('use_canonical')));
			Configuration::updateValue('CANONICAL_DEFAULT_URL',  pSQL(Tools::getValue('canonical_url')));			
		}
                
                $shops = Shop::getShops();
                $shops_url = array();
                foreach($shops as $shop) {                    
                    $shops_url[] = 'http://'.$shop['domain'] . $shop['uri'];
                }
                
		$this->context->smarty->assign(array(
			'url_form' => './index.php?tab=AdminModules&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'&tab_module='.$this->tab.'&module_name='.$this->name,
			'use_canonical' => Configuration::get('USE_CANONICAL_DEFAULT_URL'),
			'canonical_url' => Configuration::get('CANONICAL_DEFAULT_URL'),
                        'shops_url' => $shops_url
		));

		return $this->display(__FILE__, 'tpl/configuration.tpl');
	}
        
	public function hookHeader($params)
	{                        
                $base_canonical = "";
                //Mirem quina és la base, si una unificada o la per defecte que hi hagi
		if((int)Configuration::get('USE_CANONICAL_DEFAULT_URL') === 1) 
                    $base_canonical = Configuration::get('CANONICAL_DEFAULT_URL');
                else
                    $base_canonical = _PS_BASE_URL_SSL_;
                
                //Mirem en quina pàgina estem
                if (Tools::getValue('fc') == 'module' && $module_name != '' && (Module::getInstanceByName($module_name) instanceof PaymentModule))
			$page_name = 'module-payment-submit';
		// @retrocompatibility Are we in a module ?
		elseif (preg_match('#^'.preg_quote($this->context->shop->physical_uri, '#').'modules/([a-zA-Z0-9_-]+?)/(.*)$#', $_SERVER['REQUEST_URI'], $m))
			$page_name = 'module-'.$m[1].'-'.str_replace(array('.php', '/'), array('', '-'), $m[2]);
		else
		{
			$page_name = Dispatcher::getInstance()->getController();
			$page_name = (preg_match('/^[0-9]/', $page_name)) ? 'page_'.$page_name : $page_name;
		}                               
            
                //Segons la pàgina generem la canonical url
                if ($page_name == 'index' || $page_name == 'search')
                    $base_canonical = $base_canonical.'/'.__PS_BASE_URI__;
                elseif ($page_name == 'category' || $page_name == 'best-sales' || $page_name == 'cart' || $page_name == 'discount' 
                        || $page_name == 'manufacturer' || $page_name == 'new-products' || $page_name == 'prices-drop')
                    $base_canonical = $base_canonical.preg_replace('/[?&](.*)/','',$_SERVER['REQUEST_URI']);
                else  
                    $base_canonical = $base_canonical.$_SERVER['REQUEST_URI'];

		//Evitem dobles barres porculeres
		$base_canonical = str_replace('//','/',$base_canonical);
		//Pero corregim el http://
		$base_canonical = str_replace(':/','://',$base_canonical);
                  
                $this->context->smarty->assign(array(
                        'base_canonical' => $base_canonical,
		));

		return $this->display(__FILE__, 'tpl/header.tpl');
	}

	
}
