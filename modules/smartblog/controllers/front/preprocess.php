<?php

include_once(dirname(__FILE__).'/../../classes/controllers/FrontController.php');
include_once(dirname(__FILE__).'/../../smartblog.php');

class smartblogPreprocessModuleFrontController extends smartblogModuleFrontController
{
	public $ssl = true;
	public $_report = '';
	private $_postsObject;
        
	public function init()
	{
		if (Tools::getValue('blog_rewrite'))
		{
			$rewrite_url = Tools::getValue('blog_rewrite');
			$sql = 'SELECT `id_smart_blog_post`
				FROM `'._DB_PREFIX_.'smart_blog_post_lang`
				WHERE `link_rewrite` = \''.$rewrite_url.'\' 
					AND `id_lang` = '. Context::getContext()->language->id;
			$id_blog = Db::getInstance(_PS_USE_SQL_SLAVE_)->getValue($sql);

			if($id_blog > 0)
			{
				$options = array( 'id_post' => $id_blog, 'slug' => $rewrite_url );
				$link = Smartblog::GetSmartBlogLink('smartblog_post',$options);
				header('HTTP/1.0 301 Moved Permanently');
				header('Cache-Control: no-cache');
				header('Location: '.$link);
				exit;
			}
			else
			{
				$rewrite_url = Tools::getValue('blog_rewrite');
				$sql = 'SELECT `id_smart_blog_category`
					FROM `'._DB_PREFIX_.'smart_blog_category_lang`
					WHERE `link_rewrite` = \''.$rewrite_url.'\' 
						AND `id_lang` = '. Context::getContext()->language->id;
				$id_blog = Db::getInstance(_PS_USE_SQL_SLAVE_)->getValue($sql);

				if($id_blog > 0)
				{
					$options = array( 'id_category' => $id_blog, 'slug' => $rewrite_url );
					$link = Smartblog::GetSmartBlogLink('smartblog_category',$options);
					header('HTTP/1.0 301 Moved Permanently');
					header('Cache-Control: no-cache');
					header('Location: '.$link);
					exit;
				}
				else {
					header('HTTP/1.0 301 Moved Permanently');
					header('Cache-Control: no-cache');
					header('Location: '.Smartblog::GetSmartBlogLink('smartblog'));
				}	
			}	
		}
		else
		{
			header('HTTP/1.0 301 Moved Permanently');
			header('Cache-Control: no-cache');
			header('Location: '.Smartblog::GetSmartBlogLink('smartblog'));
		}
	}


}
