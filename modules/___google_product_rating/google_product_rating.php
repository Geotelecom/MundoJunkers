<?php
if (!defined('_PS_VERSION_'))  exit;
require_once(dirname(__FILE__) . '/classes/ProductGPR.php');
class Google_Product_Rating extends Module
{
     public function __construct()
     {
        $this->name = 'google_product_rating';
        $this->tab = 'others';
        $this->version = '1.0.0';
        $this->author = 'Avellana Digital';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_); 
        $this->bootstrap = true;
        $this->context = Context::getContext();
        parent::__construct();
        $this->displayName = $this->l('Google Product Rating');
        $this->description = $this->l('Add ratings to products and get stars on Google search results');
        $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');


        $this->registerHook('displayGoogleProductRating');



     }

    public function install()
    {
        $sql='CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'product_google_rating` (
                  `id_product_google_rating` int(10) unsigned NOT NULL AUTO_INCREMENT,
                  `id_product` INT( 11 ) UNSIGNED NOT NULL,
                  `rating_value` DECIMAL(10,2) DEFAULT 0,
                  `rating_count` INT(10) DEFAULT 0,
                  `from_comments_module` TINYINT(1) DEFAULT 1,
                  `rating_disabled` TINYINT(1) DEFAULT 0,';
                  $sql.='PRIMARY KEY (`id_product_google_rating`),
                  UNIQUE  `PGR_UNIQ` (  `id_product` )
                ) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;';
        Db::getInstance()->execute($sql); 
            
        if (!parent::install()) return false;
        
        $this->registerHook('displayAdminProductsExtra');
        $this->registerHook('actionProductUpdate');
        $this->registerHook('actionProductDelete');
        $this->registerHook('actionProductAdd');

        $this->registerHook('displayFooterProduct');
        $this->registerHook('displayLeftColumnProduct');
        $this->registerHook('displayRightColumnProduct');
        $this->registerHook('displayGoogleProductRating');
        

        return true;
    }   
    
    public function uninstall() {
        $this->unregisterHook('displayAdminProductsExtra');
        $this->unregisterHook('actionProductUpdate');
        $this->unregisterHook('actionProductDelete');
        $this->unregisterHook('actionProductAdd');

        $this->unregisterHook('displayFooterProduct');
        $this->unregisterHook('displayLeftColumnProduct');
        $this->unregisterHook('displayRightColumnProduct');
        $this->unregisterHook('displayGoogleProductRating');
        
        Db::getInstance()->execute('DROP TABLE IF EXISTS '._DB_PREFIX_.'product_google_rating');
        return parent::uninstall();
    }

    public function hookDisplayAdminProductsExtra($params) {
        
        $id_product = Tools::getValue('id_product');
        $sampleObj = ProductGPRModel::loadByIdProduct($id_product);
        $vals=array();
        if(!empty($sampleObj) && isset($sampleObj->id))
        {
            $vals['rating_value']=$sampleObj->rating_value;
            $vals['rating_count']=$sampleObj->rating_count;
            $vals['from_comments_module']=$sampleObj->from_comments_module;
            $vals['rating_disabled']=$sampleObj->rating_disabled;
            
        }
        else
        {
            $vals['from_comments_module']=1;
            $vals['rating_disabled']=0;
        }


        if (Module::isInstalled('productcomments') && Module::isEnabled('productcomments'))
        {
            $vals['module_productcomment_enabled']=1;   
            include(_PS_MODULE_DIR_.'productcomments'.DIRECTORY_SEPARATOR.'ProductComment.php');
            $avg=Productcomment::getAverageGrade($id_product);
            if(!empty($avg['grade'])) $vals['avg']=$avg['grade'];
            $vals['comment_number']=Productcomment::getGradedCommentNumber($id_product);
        }
        
        else $vals['module_productcomment_enabled']=0;   
        $this->context->smarty->assign($vals);
        return $this->display(__FILE__, 'views/admin/gpr_form.tpl');
    }
    
    public function hookActionProductDelete($params) {    
        $id_product = Tools::getValue('id_product');
        $sampleObj = ProductGPRModel::loadByIdProduct($id_product);
        if(!empty($sampleObj) && isset($sampleObj->id_product_google_rating)){
            $sampleObj->delete();
        }
     }

    public function hookActionProductAdd($params){
        $this->saveProductGPR($params['id_product']);
    }

    public function hookActionProductUpdate($params) {
        $id_product = Tools::getValue('id_product');
        $this->saveProductGPR($id_product);
    }

    public function saveProductGPR($id_product)
    {
        $sampleObj = ProductGPRModel::loadByIdProduct($id_product);
        $sampleObj->rating_value = Tools::getValue('rating_value');
        $sampleObj->rating_count = Tools::getValue('rating_count');
        $sampleObj->from_comments_module = Tools::getValue('from_comments_module');
        $sampleObj->rating_disabled = Tools::getValue('rating_disabled');
        
        $sampleObj->id_product = $id_product;

        if(!empty($sampleObj) && isset($sampleObj->id_product_google_rating)){
            $sampleObj->update();
        } else {
            $sampleObj->add();
        }
    }
    public function showRating($params)
    {
        if(!empty(Tools::getValue('id_product')))
        {
       
            $id_product = Tools::getValue('id_product');
            $id_lang = $params['cart']->id_lang;
            $pgpr=ProductGPRModel::loadByIdProduct($id_product);

            if(!empty($pgpr) && isset($pgpr->id) && empty($pgpr->rating_disabled))
            {
                $product = new Product($id_product);
                $product_name = $product->name[(int)$id_lang];    

                if (Module::isInstalled('productcomments') && Module::isEnabled('productcomments')) $module_productcomment_enabled=1;
                else $module_productcomment_enabled=0;
                if($module_productcomment_enabled && !empty($pgpr->from_comments_module))
                {
                    include(_PS_MODULE_DIR_.'productcomments'.DIRECTORY_SEPARATOR.'ProductComment.php');
                    $avg=Productcomment::getAverageGrade($id_product);
                    if(!empty($avg['grade']))
                    {
                        $halfed=(round((($avg['grade']*10)/5))*5)/10;
                        $vals=array(
                            'rating_value'=>$avg['grade'],
                            'rating_count'=>Productcomment::getGradedCommentNumber($id_product), 
                            'halfed'=>$halfed,
                            'product_reviewed' => $product_name);
                        $this->context->smarty->assign($vals);
                        return $this->display(__FILE__, 'views/front/gpr_stars.tpl');
                    }
                    
                }
                elseif(empty($pgpr->from_comments_module) && !empty($pgpr->rating_value) && !empty($pgpr->rating_count))
                {
                    $halfed=(round((($pgpr->rating_value*10)/5))*5)/10;
                    $vals=array(
                        'rating_value'=>$pgpr->rating_value,
                        'rating_count'=>$pgpr->rating_count, 
                        'halfed'=>$halfed,
                        'product_reviewed' => $product_name);
                    $this->context->smarty->assign($vals);
                    return $this->display(__FILE__, 'views/front/gpr_stars.tpl');
                }
            }
        }
        return "";
    }

    public function hookDisplayFooterProduct($params)
    {
        return "";
    }

    public function hookDisplayLeftColumnProduct($params)
    {
        return $this->showRating($params);
 
    }

    public function hookDisplayRightColumnProduct($params)
    {
        return "";

    }
    
}