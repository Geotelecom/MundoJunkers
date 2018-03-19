<?php
/*
* 2007-2014 PrestaShop
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
*  @copyright  2007-2014 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

if (!defined('_PS_VERSION_'))
	exit;

class RoyBrands extends Module
{
    public function __construct()
    {
        $this->name = 'roybrands';
        $this->tab = 'front_office_features';
        $this->version = 1.0;
		$this->author = 'RoyThemes';
		$this->need_instance = 0;

		parent::__construct();

		$this->displayName = $this->l('Roy Brands block');
        $this->description = $this->l('Displays Brands / Manufacturers Slider');
		$this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
    }

	public function install()
	{
		$this->_clearCache('*');
		Configuration::updateValue('RBC_AUTO', true);

		if (!parent::install()
			|| !$this->registerHook('displayHeader')
            || !$this->registerHook('displayAdditionalHome')
			|| !$this->registerHook('actionObjectManufacturerDeleteAfter')
			|| !$this->registerHook('actionObjectManufacturerAddAfter')
			|| !$this->registerHook('actionObjectManufacturerUpdateAfter')
		)
			return false;

		return true;
	}

	public function hookDisplayAdditionalHome($params)
	{
		if (!$this->isCached('roybrands.tpl', $this->getCacheId()))
		{
			$manufacturers = Manufacturer::getManufacturers();
			foreach ($manufacturers as &$manufacturer)
			{
				$manufacturer['image'] = $this->context->language->iso_code.'-default';
				if (file_exists(_PS_MANU_IMG_DIR_.$manufacturer['id_manufacturer'].'-'.ImageType::getFormatedName('small').'.jpg'))
					$manufacturer['image'] = $manufacturer['id_manufacturer'];
			}

			$this->smarty->assign(array(
				'manufacturers' => $manufacturers,
				'display_link_manufacturer' => Configuration::get('PS_DISPLAY_SUPPLIERS'),
			));
		}
		return $this->display(__FILE__, 'roybrands.tpl', $this->getCacheId());
	}

	public function hookDisplayHome($params)
	{
		return $this->hookDisplayAdditionalHome($params);
	}

	public function hookDisplayTopColumn($params)
	{
		return $this->hookDisplayAdditionalHome($params);
	}
	
	public function hookDisplayHomeTabContent($params)
	{
		return $this->hookDisplayAdditionalHome($params);
	}
	
	public function hookDisplayHeader($params)
	{
		$this->context->controller->addCSS(($this->_path).'css/roybrands.css', 'all');
//		$this->context->controller->addJS($this->_path.'js/roybrands.js');
	}
	
	public function hookActionObjectManufacturerUpdateAfter($params)
	{
		$this->_clearCache('roybrands.tpl');
	}

	public function hookActionObjectManufacturerAddAfter($params)
	{
		$this->_clearCache('roybrands.tpl');
	}

	public function hookActionObjectManufacturerDeleteAfter($params)
	{
		$this->_clearCache('roybrands.tpl');
	}
	
}