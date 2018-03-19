<?php

// Include Module
include_once(dirname(__FILE__).'/../../productcomments.php');
// Include Models
include_once(dirname(__FILE__).'/../../ProductComment.php');
include_once(dirname(__FILE__).'/../../ProductCommentCriterion.php');

class ProductCommentsOpinionsModuleFrontController extends ModuleFrontController
{
	public function __construct()
	{
		parent::__construct();

		$this->context = Context::getContext();
	}

	public function init()
	{
		if (!$this->context->customer->isLogged()) 
			Tools::redirect('index.php?controller=authentication');


		parent::init();
	}	

	public function initContent()
	{
		parent::initContent();

		if (Tools::isSubmit('action'))
		{
			switch(Tools::getValue('action'))
			{
				case 'add_comment':
					$this->ajaxProcessAddComment();
					break;
				case 'report_abuse':
					$this->ajaxProcessReportAbuse();
					break;
				case 'comment_is_usefull':
					$this->ajaxProcessCommentIsUsefull();
					break;
			}
		}

		$productcomments = new ProductComments();




		$id_guest = (!$id_customer = (int)$this->context->cookie->id_customer) ? (int)$this->context->cookie->id_guest : false;
		
		$tipus = Tools::getValue('tipo');

		if(Tools::getValue('id') && ($tipus == 'servicio' || $tipus == 'productos')) {


			$customer = $this->context->customer;
			//$orders = Order::getCustomerOrders($customer->id);
			$orders = Order::getByReference(Tools::getValue('id'));

			if(isset($orders) && count($orders) > 0) {

				foreach($orders AS $order) {

					if ($order->id && (int)$order->id_customer == (int)$customer->id) {

						$completat = false;
						$orderinfo = new Order($order->id);

						if($orderinfo->valid && $orderinfo->invoice_date != '0000-00-00 00:00:00') {

							if($orderinfo->envia_servicio == 1 && $tipus == 'servicio' && strtotime(date('Y-m-d H:i:s')) >= strtotime ( '+'.Configuration::get('PRODUCT_COMMENTS_FORM_SERVICE').' day' , strtotime ( $orderinfo->invoice_date ) )) {


									$customerComment = ProductComment::getByCustomer((int)0, (int)$this->context->cookie->id_customer, true, (int)$id_guest, $orderinfo->reference);

									if($customerComment)
										$completat = true;

									$criterions = ProductCommentCriterion::getByProduct((int)0, $this->context->language->id);
																

									$this->context->smarty->assign(array(
										'logged' => $this->context->customer->isLogged(true),
										'action_url' => '',
										'tipus' => 1,
										'completat' => $completat,
										'pedido' => $orderinfo,
										'criterions' => $criterions,
										'ref' => $order->reference,
										'product_comment_path' => '/climahorro/modules/productcomments/',
										'delay' => Configuration::get('PRODUCT_COMMENTS_MINIMAL_TIME'),
										'secure_key' => $productcomments->secure_key,
										'productcomments_controller_url' => $this->context->link->getModuleLink('productcomments', 'opinions'),
										'productcomments_url_rewriting_activated' => Configuration::get('PS_REWRITING_SETTINGS', 0)
								   ));

							} else if ($orderinfo->envia_productos == 1 && $tipus == 'productos' && strtotime(date('Y-m-d H:i:s')) >= strtotime ( '+'.Configuration::get('PRODUCT_COMMENTS_FORM_PRODUCTS').' day' , strtotime ( $orderinfo->invoice_date ) )) {

								$products = $orderinfo->getProductsDetail();
								$productes = array();
								$ids = '';
								$tots = 0;
								$i = 0;

								foreach($products AS $product) {

									$customerComment = ProductComment::getByCustomer((int)$product['product_id'], (int)$this->context->cookie->id_customer, true, (int)$id_guest, $orderinfo->reference);

									if(!$customerComment) {
										$productinf = new Product($product['product_id']);

										$averages = ProductComment::getAveragesByProduct((int)$productinf->id, $this->context->language->id);
										$averageTotal = 0;
										foreach ($averages as $average)
											$averageTotal += (float)($average);

										$productes[$productinf->id]['averageTotal'] = count($averages) ? ($averageTotal / count($averages)) : 0;

										$image = Product::getCover((int)$productinf->id);
										$productes[$productinf->id]['cover_image'] = $this->context->link->getImageLink($productinf->link_rewrite[$this->context->language->id], $image['id_image'], 'medium_default');

										$productes[$productinf->id]['name'] = $productinf->name[$this->context->language->id];
										$productes[$productinf->id]['description_short'] = $productinf->description_short[$this->context->language->id];

										$productes[$productinf->id]['criterions'] = ProductCommentCriterion::getByProduct((int)$productinf->id, $this->context->language->id);

										$ids .= $productinf->id.',';
									} else
										$i++;

									$tots++;
								}

								$ids = trim($ids, ',');


								if($tots == $i)
									$completat = true;


								$this->context->smarty->assign(array(
									'logged' => $this->context->customer->isLogged(true),
									'action_url' => '',
									'ids' => $ids,
									'tipus' => 2,
									'completat' => $completat,
									'pedido' => $orderinfo,
									'productes' => $productes,
									'ref' => $order->reference,
									'product_comment_path' => '/climahorro/modules/productcomments/',
									'allow_guests' => (int)Configuration::get('PRODUCT_COMMENTS_ALLOW_GUESTS'),
									'delay' => Configuration::get('PRODUCT_COMMENTS_MINIMAL_TIME'),
									'id_product_comment_form' => (int)Tools::getValue('id_product'),
									'secure_key' => $productcomments->secure_key,
									'mediumSize' => Image::getSize(ImageType::getFormatedName('medium')),
									'nbComments' => (int)ProductComment::getCommentNumber((int)Tools::getValue('id_product')),
									'productcomments_controller_url' => $this->context->link->getModuleLink('productcomments', 'opinions'),
									'productcomments_url_rewriting_activated' => Configuration::get('PS_REWRITING_SETTINGS', 0)
							   ));

							}
							else
								Tools::redirect('index.php?controller=authentication');	
								// NO HA PASADO X DIAS PARA RESPONDER O NO ES NINGUNO DE LOS TIPOS


						}
						else
							Tools::redirect('index.php?controller=authentication');
							// PEDIDO NO VALIDADO

						
					}
					else
						Tools::redirect('index.php?controller=authentication');
						// NO EXISTE ID PEDIDO O LA REFERENCIA DEL PEDIDO NO ES DEL CLIENTE CONECTADO

				}
			} else
				Tools::redirect('index.php?controller=authentication');


		} else
			Tools::redirect('index.php?controller=authentication');



		return $this->setTemplate('opiniones.tpl');
	}

	protected function ajaxProcessAddComment()
	{
		$module_instance = new ProductComments();

		$result = true;
		$id_guest = 0;
		$id_customer = $this->context->customer->id;
		if (!$id_customer)
			$id_guest = $this->context->cookie->id_guest;


		$orders = Order::getByReference(Tools::getValue('ref'));
		$ref_valid = false;

		if(isset($orders)) {

			foreach($orders AS $order) {

				if ($order->id && (int)$order->id_customer == (int)$id_customer)
					$ref_valid =  true;
				
			}
		} else
			$errors[] = $module_instance->l('No existe el pedido al que se hace referencia', 'default');
		

		$errors = array();
		// Validation
		if (!Validate::isInt(Tools::getValue('id_product')))
			$errors[] = $module_instance->l('Product ID is incorrect', 'default');
		if (!Tools::getValue('ref') || !$ref_valid)
			$errors[] = $module_instance->l('Referencia de pedido incorrecta', 'default');
		if (!Tools::getValue('title') || !Validate::isGenericName(Tools::getValue('title')))
			$errors[] = $module_instance->l('Title is incorrect', 'default');
		if (!Tools::getValue('content') || !Validate::isMessage(Tools::getValue('content')))
			$errors[] = $module_instance->l('Comment is incorrect', 'default');
		if (!$id_customer && (!Tools::isSubmit('customer_name') || !Tools::getValue('customer_name') || !Validate::isGenericName(Tools::getValue('customer_name'))))
			$errors[] = $module_instance->l('Customer name is incorrect', 'default');
		if (!$this->context->customer->id && !Configuration::get('PRODUCT_COMMENTS_ALLOW_GUESTS'))
			$errors[] = $module_instance->l('You must be connected in order to send a comment', 'default');
		if (!count(Tools::getValue('criterion')))
			$errors[] = $module_instance->l('You must give a rating', 'default');

		$servicio = false;

		if(Tools::getValue('id_product') == '0') {
			$servicio = true;
		}
		else 
		{
			$product = new Product(Tools::getValue('id_product'));
			if (!$product->id)
				$errors[] = $module_instance->l('Product not found', 'default');
		}


		if (!count($errors))
		{
			$customer_comment = ProductComment::getByCustomer(Tools::getValue('id_product'), $id_customer, true, $id_guest);
			if (!$customer_comment || ($customer_comment && (strtotime($customer_comment['date_add']) + (int)Configuration::get('PRODUCT_COMMENTS_MINIMAL_TIME')) < time()))
			{

				$comment = new ProductComment();
				$comment->content = strip_tags(Tools::getValue('content'));
				$comment->id_product = (int)Tools::getValue('id_product');
				$comment->id_customer = (int)$id_customer;
				$comment->id_guest = $id_guest;
				$comment->order_reference = Tools::getValue('ref');
				$comment->customer_name = Tools::getValue('customer_name');
				if (!$comment->customer_name)
					$comment->customer_name = pSQL($this->context->customer->firstname.' '.$this->context->customer->lastname);
				$comment->title = Tools::getValue('title');
				$comment->grade = 0;
				$comment->validate = 0;
				$comment->save();

				$grade_sum = 0;
				foreach(Tools::getValue('criterion') as $id_product_comment_criterion => $grade)
				{
					$grade_sum += $grade;
					$product_comment_criterion = new ProductCommentCriterion($id_product_comment_criterion);
					if ($product_comment_criterion->id)
						$product_comment_criterion->addGrade($comment->id, $grade);
				}

				if (count(Tools::getValue('criterion')) >= 1)
				{
					$comment->grade = $grade_sum / count(Tools::getValue('criterion'));
					// Update Grade average of comment
					$comment->save();
				}
				$result = true;
				Tools::clearCache(Context::getContext()->smarty, $this->getTemplatePath('productcomments-reviews.tpl'));
			}
			else
			{
				$result = false;
				$errors[] = $module_instance->l('Please wait before posting another comment', 'default').' '.Configuration::get('PRODUCT_COMMENTS_MINIMAL_TIME').' '.$module_instance->l('seconds before posting a new comment', 'default');
			}
		}
		else
			$result = false;

		die(Tools::jsonEncode(array(
			'result' => $result,
			'errors' => $errors
		)));
	}

	protected function ajaxProcessReportAbuse()
	{
		if (!Tools::isSubmit('id_product_comment'))
			die('0');

		if (ProductComment::isAlreadyReport(Tools::getValue('id_product_comment'), $this->context->cookie->id_customer))
			die('0');

		if (ProductComment::reportComment((int)Tools::getValue('id_product_comment'), $this->context->cookie->id_customer))
			die('1');

		die('0');
	}

	protected function ajaxProcessCommentIsUsefull()
	{
		if (!Tools::isSubmit('id_product_comment') || !Tools::isSubmit('value'))
			die('0');

		if (ProductComment::isAlreadyUsefulness(Tools::getValue('id_product_comment'), $this->context->cookie->id_customer))
			die('0');

		if (ProductComment::setCommentUsefulness((int)Tools::getValue('id_product_comment'), (bool)Tools::getValue('value'), $this->context->cookie->id_customer))
			die('1');

		die('0');
	}
}
