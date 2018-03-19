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

class RoyPaymentLogo extends Module
{
	public function __construct()
	{
		$this->name = 'roypaymentlogo';
		$this->tab = 'front_office_features';
		$this->version = '1.0';
		$this->author = 'RoyThemes (PrestaShop module remake)';

		$this->bootstrap = true;
		parent::__construct();	

		$this->displayName = $this->l('Footer payment logos block.');
		$this->description = $this->l('Adds a block which displays all of your payment logos on footer.');
		$this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
	}

	public function install()
	{
        return (parent::install() AND Configuration::updateValue('ROY_PAYMENT_LOGO_ID', 1) &&
        $this->registerHook('displayHeader') &&
        $this->registerHook('displayFooter'));
	}

	public function uninstall()
	{
		Configuration::deleteByName('ROY_PAYMENT_LOGO_ID');
		return parent::uninstall();
	}

	public function getContent()
	{
		$html = '';

		if (Tools::isSubmit('submitConfiguration'))
			if (Validate::isUnsignedInt(Tools::getValue('ROY_PAYMENT_LOGO_ID')))
			{
				Configuration::updateValue('ROY_PAYMENT_LOGO_ID', (int)(Tools::getValue('ROY_PAYMENT_LOGO_ID')));
				$this->_clearCache('roypaymentlogo.tpl');
				$html .= $this->displayConfirmation($this->l('The settings have been updated.'));
			}

		$cmss = CMS::listCms($this->context->language->id);

		if (!count($cmss))
			$html .= $this->displayError($this->l('No CMS page is available.'));
		else
			$html .= $this->renderForm();

		return $html;
	}

	/**
	* Returns module content
	*
	* @param array $params Parameters
	* @return string Content
	*/
	public function hookdisplayFooter($params)
	{
		if (Configuration::get('PS_CATALOG_MODE'))
			return;

		if (!$this->isCached('roypaymentlogo.tpl', $this->getCacheId()))
		{
			if (!Configuration::get('ROY_PAYMENT_LOGO_ID'))
				return;
			$cms = new CMS(Configuration::get('ROY_PAYMENT_LOGO_ID'), $this->context->language->id);
			if (!Validate::isLoadedObject($cms))
				return;
			$this->smarty->assign('cms_payement_logo', $cms);
		}

		return $this->display(__FILE__, 'roypaymentlogo.tpl', $this->getCacheId());
	}

	public function hookHeader($params)
	{
		if (Configuration::get('PS_CATALOG_MODE'))
			return;
		$this->context->controller->addCSS(($this->_path).'roypaymentlogo.css', 'all');
	}
	
	public function renderForm()
	{
		$fields_form = array(
			'form' => array(
				'legend' => array(
					'title' => $this->l('Settings'),
					'icon' => 'icon-cogs'
				),
				'input' => array(
					array(
						'type' => 'select',
						'label' => $this->l('Destination page for the block\'s link'),
						'name' => 'ROY_PAYMENT_LOGO_ID',
						'required' => false,
						'default_value' => (int)$this->context->country->id,
						'options' => array(
							'query' => CMS::listCms($this->context->language->id),
							'id' => 'id_cms',
							'name' => 'meta_title'
						)
					),
				),
				'submit' => array(
					'title' => $this->l('Save'),
				)
			),
		);
		
		$helper = new HelperForm();
		$helper->show_toolbar = false;
		$helper->table =  $this->table;
		$lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
		$helper->default_form_language = $lang->id;
		$helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;
		$helper->identifier = $this->identifier;
		$helper->submit_action = 'submitConfiguration';
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->tpl_vars = array(
			'fields_value' => $this->getConfigFieldsValues(),
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id
		);

		return $helper->generateForm(array($fields_form));
	}
	
	public function getConfigFieldsValues()
	{		
		return array(
			'ROY_PAYMENT_LOGO_ID' => Tools::getValue('ROY_PAYMENT_LOGO_ID', Configuration::get('ROY_PAYMENT_LOGO_ID')),
		);
	}

}


