<?php
/**
 * Google Category Rating module for Prestashop by Avellana Digital
 *
 * @author    Avellana Digital SL
 * @copyright Copyright (c) 2017 Avellana Digital - www.avellanadigital.com
 * @license   Commercial license
 * @version    1.0.0
 */

if (!defined('_PS_VERSION_')) {
    exit;
}

require_once(dirname(__FILE__).'/classes/CategoryGCR.php');

class GoogleCategoryRating extends Module
{
    public function __construct()
    {
        $this->name = 'googlecategoryrating';
        $this->tab = 'others';
        $this->version = '1.0.0';
        $this->author = 'Avellana Digital SL';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
        $this->bootstrap = true;
        $this->context = Context::getContext();
        parent::__construct();
        $this->displayName = $this->l('Google Category Rating');
        $this->description = $this->l('Add ratings to categories and get stars on Google search results');
        $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');
    }

    public function install()
    {
        $sql = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'category_google_rating` (
		`id_category_google_rating` int(10) unsigned NOT NULL AUTO_INCREMENT,
		`id_category` INT( 11 ) UNSIGNED NOT NULL,
		`rating_value` DECIMAL(10,2) DEFAULT 0,
		`rating_count` INT(10) DEFAULT 0,
		`from_comments_module` TINYINT(1) DEFAULT 1,
		`rating_disabled` TINYINT(1) DEFAULT 0,';

        $sql .= 'PRIMARY KEY (`id_category_google_rating`),
		UNIQUE  `PGR_UNIQ` (  `id_category` )
		) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;';

        Db::getInstance()->execute($sql);

        if (!parent::install()) {
            return false;
        }

        $this->registerHook('displayBackOfficeCategory');
        $this->registerHook('actionCategoryUpdate');
        $this->registerHook('actionCategoryDelete');
        $this->registerHook('actionCategoryAdd');

        $this->registerHook('displayLeftColumn');
        $this->registerHook('displayRightColumn');

        return true;
    }

    public function uninstall()
    {
        $this->unregisterHook('displayBackOfficeCategory');
        $this->unregisterHook('actionCategoryUpdate');
        $this->unregisterHook('actionCategoryDelete');
        $this->unregisterHook('actionCategoryAdd');

        $this->unregisterHook('displayLeftColumn');
        $this->unregisterHook('displayRightColumn');

        Db::getInstance()->execute('DROP TABLE IF EXISTS '._DB_PREFIX_.'category_google_rating');
        return parent::uninstall();
    }

    public function hookDisplayBackOfficeCategory($params)
    {
        $id_category = Tools::getValue('id_category');
        $lang = ($this->context->cookie->id_lang ? $this->context->cookie->id_lang : Configuration::get('PS_LANG_DEFAULT'));

        if (Tools::isSubmit('updatecategory') && $id_category)
        {

            $sampleObj = CategoryGCRModel::loadByIdCategory($id_category);
            $vals = array();
            $vals['is_ps17'] = (_PS_VERSION_ >= 1.7 ? true : false);

            if (!empty($sampleObj) && isset($sampleObj->id)) {
                $vals['rating_value'] = $sampleObj->rating_value;
                $vals['rating_count'] = $sampleObj->rating_count;
                $vals['from_comments_module'] = $sampleObj->from_comments_module;
                $vals['rating_disabled'] = $sampleObj->rating_disabled;
            } else {
                $vals['from_comments_module']=1;
                $vals['rating_disabled']=0;
            }

            if (Module::isInstalled('productcomments') && Module::isEnabled('productcomments')) {
                $vals['module_productcomment_enabled'] = 1;
                include(_PS_MODULE_DIR_.'productcomments'.DIRECTORY_SEPARATOR.'ProductComment.php');
                
                $product_list = Product::getProducts($lang, 0,0, 'id_product', 'ASC', $id_category, true); 
                $avg_aux = '';
                $rating_count = 0;

                foreach ($product_list as $product)
                {
                    $avg = Productcomment::getAverageGrade($product['id_product']);
                    $avg_aux += $avg['grade'];

                    if (!empty($avg['grade'])) {
                        $rating_count += Productcomment::getGradedCommentNumber($product['id_product']);
                    }
                }

                if (!empty($avg_aux)) {
                    $vals['avg'] = $avg_aux/$rating_count;
                }
                
                $vals['comment_number']=$rating_count;

            } else {
                $vals['module_productcomment_enabled'] = 0;
            }


            $this->context->smarty->assign($vals);

            return $this->display(__FILE__, 'views/templates/admin/gcr_form.tpl');

        }        

    }

    public function hookActionCategoryDelete($params)
    {
        $id_category = Tools::getValue('id_category');
        $sampleObj = CategoryGCRModel::loadByIdCategory($id_category);

        if (!empty($sampleObj) && isset($sampleObj->id_category_google_rating)) {
            $sampleObj->delete();
        }
    }

    public function hookActionCategoryAdd($params)
    {
        if(Tools::getValue('controller') == 'AdminCategories' && isset($params['id_category']))
            $this->saveCategoryGCR($params['id_category']);
    }

    public function hookActionCategoryUpdate($params)
    {
        $id_category = Tools::getValue('id_category');
        if ($id_category)
            $this->saveCategoryGCR($id_category);
    }

    public function saveCategoryGCR($id_category)
    {
        $sampleObj = CategoryGCRModel::loadByIdCategory($id_category);
        $sampleObj->rating_value = Tools::getValue('rating_value');
        $sampleObj->rating_count = Tools::getValue('rating_count');
        $sampleObj->from_comments_module = Tools::getValue('from_comments_module');
        $sampleObj->rating_disabled = Tools::getValue('rating_disabled');

        $sampleObj->id_category = $id_category;

        if (!empty($sampleObj) && isset($sampleObj->id_category_google_rating)) {
            $sampleObj->update();
        } else {
            $sampleObj->add();
        }
    }

    public function showRating($params)
    {
        $id_lang = ($this->context->cookie->id_lang ? $this->context->cookie->id_lang : Configuration::get('PS_LANG_DEFAULT'));

        if (_PS_VERSION_ >= 1.7) {
            $id_category = Tools::getValue('id_category');
        } else {
            $id_category = Tools::getValue('id_category');
        }

        if (!empty($id_category)) {
            $cgcr = CategoryGCRModel::loadByIdCategory($id_category);

            if (!empty($cgcr) && isset($cgcr->id) && empty($cgcr->rating_disabled)) {
                if (Module::isInstalled('productcomments') && Module::isEnabled('productcomments')) {
                    $module_productcomment_enabled = 1;
                } else {
                    $module_productcomment_enabled = 0;
                }

                $category = new Category($id_category);
                $category_name = $category->name[(int)$id_lang];

                if ($module_productcomment_enabled && !empty($cgcr->from_comments_module)) {
                    include(_PS_MODULE_DIR_.'productcomments'.DIRECTORY_SEPARATOR.'ProductComment.php');

                    $product_list = Product::getProducts($id_lang, 0, 0, 'id_product', 'ASC', $id_category, true);
                    $halfed = 0;
                    $rating_count = 0;
                    $avg_aux = '';

                    foreach ($product_list as $product) {
                        $avg = Productcomment::getAverageGrade($product['id_product']);
                        $avg_aux += $avg['grade'];

                        if (!empty($avg['grade'])) {
                            $rating_count += Productcomment::getGradedCommentNumber($product['id_product']);
                        }
                    }

                    if (!empty($avg_aux)) {
                        $avg = $avg_aux/$rating_count;

                        $halfed = (round((($avg*10)/5))*5)/10;

                        $vals = array(
                        'rating_value' => $avg,
                        'rating_count' => $rating_count,
                        'halfed' => $halfed,
                        'is_ps17' => (_PS_VERSION_ >= 1.7 ? true : false),
                        'category_reviewed' => $category_name
                        );

                        $this->context->smarty->assign($vals);

                        return $this->display(__FILE__, 'views/templates/front/gcr_stars.tpl');
                    }
                } elseif (empty($cgcr->from_comments_module) && !empty($cgcr->rating_value)
                    && !empty($cgcr->rating_count)) {
                    $halfed = (round((($cgcr->rating_value*10)/5))*5)/10;
                    $vals = array(
                    'rating_value' => $cgcr->rating_value,
                    'rating_count' => $cgcr->rating_count,
                    'halfed' => $halfed,
                    'is_ps17' => (_PS_VERSION_ >= 1.7 ? true : false),
                    'category_reviewed' => $category_name
                    );

                    $this->context->smarty->assign($vals);

                    return $this->display(__FILE__, 'views/templates/front/gcr_stars.tpl');
                }
            }
        }

        return "";
    }

    public function hookDisplayLeftColumn($params)
    {
        if ($this->context->controller->php_self == 'category')
            return $this->showRating($params);
    }

    public function hookDisplayRightColumn($params)
    {
        if ($this->context->controller->php_self == 'category')
            return $this->showRating($params);
    }
}
