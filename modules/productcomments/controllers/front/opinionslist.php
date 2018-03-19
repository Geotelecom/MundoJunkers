<?php

// Include Module
include_once(dirname(__FILE__).'/../../productcomments.php');
// Include Models
include_once(dirname(__FILE__).'/../../ProductComment.php');
include_once(dirname(__FILE__).'/../../ProductCommentCriterion.php');

class ProductCommentsOpinionsListModuleFrontController extends ModuleFrontController
{
	public function __construct()
	{
		parent::__construct();

		$this->context = Context::getContext();
	}

	public function init()
	{
		/*if (!$this->context->customer->isLogged()) 
			Tools::redirect('index.php?controller=authentication');*/

		parent::init();
	}	

	public function initContent()
	{
		parent::initContent();

		if (Tools::isSubmit('action'))
		{
			switch(Tools::getValue('action'))
			{
				case 'report_abuse':
					$this->ajaxProcessReportAbuse();
					break;
				case 'comment_is_usefull':
					$this->ajaxProcessCommentIsUsefull();
					break;
			}
		}

		$pagina = (!Tools::getValue('p') || Tools::getValue('p') < 1 ? 1 : Tools::getValue('p'));

		$comments = ProductComment::getByProduct(0, $pagina, 10);
		$total_comments = (int)ProductComment::getCommentNumber(0);
		$actuals_comments = count($comments)*(int)$pagina;

		
		if(count($comments) == 0)
			Tools::redirect('index.php');


		$this->context->smarty->assign(array(
			'comments' => $comments,
			'pg' => (int)$pagina,
			'nbComments' => $total_comments
		));


		//$this->context->controller->pagination((int)ProductComment::getCommentNumber(0));

		return $this->setTemplate('opinions_list.tpl');
	}

	
}
