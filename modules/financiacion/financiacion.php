<?php


if (!defined('_PS_VERSION_'))
	exit;

class Financiacion extends PaymentModule
{
	protected $_html = '';
	protected $_postErrors = array();

	public function __construct()
	{
		$this->name = 'financiacion';
		$this->tab = 'payments_gateways';
		$this->version = '1.1.1';
		$this->author = 'PrestaShop';
		$this->controllers = array('payment', 'validation');
		$this->is_eu_compatible = 1;

		$this->currencies = true;
		$this->currencies_mode = 'checkbox';

		$this->bootstrap = true;
		parent::__construct();

		$this->displayName = $this->l('Financiación');
		$this->description = $this->l('Accept payments for your products via bank wire transfer.');
		$this->confirmUninstall = $this->l('Are you sure about removing these details?');
		if (!count(Currency::checkPaymentCurrencies($this->id)))
			$this->warning = $this->l('No currency has been set for this module.');

	}

	public function install()
	{
		if (!parent::install() || !$this->registerHook('payment') || ! $this->registerHook('displayPaymentEU') || !$this->registerHook('paymentReturn'))
			return false;
		return true;
	}

	public function uninstall()
	{
		if (!parent::uninstall())
			return false;
		return true;
	}

	protected function _postValidation()
	{

	}

	protected function _postProcess()
	{

	}

	protected function _displayFinanciacion()
	{
		return $this->display(__FILE__, 'infos.tpl');
	}

	public function getContent()
	{
			Configuration::updateValue('PS_OS_FINANCIACION', 15);
	}

	public function hookPayment($params)
	{
		if (!$this->active)
			return;
		if (!$this->checkCurrency($params['cart']))
			return;

		$this->smarty->assign(array(
			'this_path' => $this->_path,
			'this_path_bw' => $this->_path,
			'this_path_ssl' => Tools::getShopDomainSsl(true, true).__PS_BASE_URI__.'modules/'.$this->name.'/'
		));
		return $this->display(__FILE__, 'payment.tpl');
	}

	public function hookDisplayPaymentEU($params)
	{
		if (!$this->active)
			return;

		if (!$this->checkCurrency($params['cart']))
			return;

		$payment_options = array(
			'cta_text' => $this->l('Pay by Financiación'),
			'logo' => Media::getMediaPath(_PS_MODULE_DIR_.$this->name.'/financiacion.jpg'),
			'action' => $this->context->link->getModuleLink($this->name, 'validation', array(), true)
		);

		return $payment_options;
	}

	public function hookPaymentReturn($params)
	{
		if (!$this->active)
			return;

		$state = $params['objOrder']->getCurrentState();
		if (in_array($state, array(Configuration::get('PS_OS_FINANCIACION'), Configuration::get('PS_OS_OUTOFSTOCK'), Configuration::get('PS_OS_OUTOFSTOCK_UNPAID'))))
		{
			$this->smarty->assign(array(
				'total_to_pay' => Tools::displayPrice($params['total_to_pay'], $params['currencyObj'], false),
				'total_to_pay_ga' => $params['total_to_pay'],
				'status' => 'ok',
				'id_order' => $params['objOrder']->id,
				'order_info' => $params['objOrder'],
				'products_info' => $params['objOrder']->getProductsDetail()
			));
			if (isset($params['objOrder']->reference) && !empty($params['objOrder']->reference))
				$this->smarty->assign('reference', $params['objOrder']->reference);
		}
		else
			$this->smarty->assign('status', 'failed');
		return $this->display(__FILE__, 'payment_return.tpl');
	}

	public function checkCurrency($cart)
	{
		$currency_order = new Currency($cart->id_currency);
		$currencies_module = $this->getCurrency($cart->id_currency);

		if (is_array($currencies_module))
			foreach ($currencies_module as $currency_module)
				if ($currency_order->id == $currency_module['id_currency'])
					return true;
		return false;
	}

	public function renderForm()
	{

	}

	public function getConfigFieldsValues()
	{

	}
}
