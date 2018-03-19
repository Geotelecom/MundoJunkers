<?php
/*
* 2013 Ha!*!*y
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* It is available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
*
* DISCLAIMER
* This code is provided as is without any warranty.
* No promise of being safe or secure
*
*  @author      Ha!*!*y <ha99ys@gmail.com>
*  @copyright   2012-2013 Ha!*!*y
*  @license     http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  @code sorce: http://prestashop.com
*/
class ProductController extends ProductControllerCore
{
	/*
	* module: cleanurls
	* date: 2016-06-14 02:33:16
	* version: 0.42
	*/
	public function init()
	{
		if (Tools::getValue('product_rewrite'))
		{
			$url_id_pattern = '/.*?([0-9]+)\-([a-zA-Z0-9-]*)\.html/';
			$rewrite_url = Tools::getValue('product_rewrite');
			$sql = 'SELECT `id_product`
				FROM `'._DB_PREFIX_.'product_lang`
				WHERE `link_rewrite` = \''.$rewrite_url.'\' 
					OR `link_rewrite` = \''.$rewrite_url.'-detail\'
					AND `id_lang` = '. Context::getContext()->language->id;
			if (Shop::isFeatureActive() && Shop::getContext() == Shop::CONTEXT_SHOP)
			{
				$sql .= ' AND `id_shop` = '.(int)Shop::getContextShopID();
			}
			$id_product = Db::getInstance(_PS_USE_SQL_SLAVE_)->getValue($sql);
			
			if($id_product > 0)
			{
				$_GET['id_product'] = $id_product;
			}
			else if(preg_match($url_id_pattern, $_SERVER['REQUEST_URI'], $url_split))
			{
				$url_id_product = $url_split[1];
				$sql = 'SELECT `id_product`
					FROM `'._DB_PREFIX_.'product_lang`
					WHERE `id_product` = \''.$url_id_product.'\' AND `id_lang` = '. Context::getContext()->language->id;
				if (Shop::isFeatureActive() && Shop::getContext() == Shop::CONTEXT_SHOP)
				{
					$sql .= ' AND `id_shop` = '.(int)Shop::getContextShopID();
				}
					
				$id_product = Db::getInstance(_PS_USE_SQL_SLAVE_)->getValue($sql);
				if($id_product > 0)
				{
					$_GET['id_product'] = $id_product;
				}
				else
				{
					header('HTTP/1.1 404 Not Found');
					header('Status: 404 Not Found');
				}
			}
			else {
				//Is a category perhaps?
				$sql = 'SELECT `id_category`
					FROM `'._DB_PREFIX_.'category_lang`
					WHERE `link_rewrite` = \''.$rewrite_url.'\' 
						OR `link_rewrite` = \''.$rewrite_url.'-detail\'
						AND `id_lang` = '. Context::getContext()->language->id;
				if (Shop::isFeatureActive() && Shop::getContext() == Shop::CONTEXT_SHOP)
				{
					$sql .= ' AND `id_shop` = '.(int)Shop::getContextShopID();
				}
				$id_category = Db::getInstance(_PS_USE_SQL_SLAVE_)->getValue($sql);
			
				if($id_category > 0)
				{
					$category_link = Context::getContext()->link->getCategoryLink($id_category, null, null);
				        header('HTTP/1.0 301 Moved Permanently');
				        header('Cache-Control: no-cache');
				        header('Location: '.$category_link);
				        exit;
				}
				else {
					//Or maybe a CMS?
					$sql = 'SELECT cl.`id_cms`
						FROM `'._DB_PREFIX_.'cms_lang` cl
						LEFT JOIN `'._DB_PREFIX_.'cms_alias` ca ON ( ca.`id_cms` = cl.`id_cms` )
						WHERE ( cl.`link_rewrite` = \''.$rewrite_url.'\' AND `id_lang` = '. Context::getContext()->language->id .') 
							OR `alias` = \''.$rewrite_url.'\'';
					if (Shop::isFeatureActive() && Shop::getContext() == Shop::CONTEXT_SHOP)
					{
						$sql .= ' AND `id_shop` = '.(int)Shop::getContextShopID();
					}

					$id_cms = Db::getInstance(_PS_USE_SQL_SLAVE_)->getValue($sql);
			
					if($id_cms > 0)
					{
						$cms_link = Context::getContext()->link->getCMSLink($id_cms, null, null);
						header('HTTP/1.0 301 Moved Permanently');
						header('Cache-Control: no-cache');
						header('Location: '.$cms_link);
						exit;
					}
					else
					{
						header('HTTP/1.1 404 Not Found');
						header('Status: 404 Not Found');
					}
				}
			}
		}
		parent::init();
	}
}
