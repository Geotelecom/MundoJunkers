<?php
/**
* The file is controller. Do not modify the file if you want to upgrade the module in future
* 
* @author    Globo Software Solution JSC <contact@globosoftware.net>
* @copyright 2015 GreenWeb Team
* @link	     http://www.globosoftware.net
* @license   please read license in file license.txt
*/

include_once(_PS_MODULE_DIR_ . 'gformbuilderpro/classes/gformbuilderproModel.php');
include_once(_PS_MODULE_DIR_ . 'gformbuilderpro/classes/gformrequestModel.php');
class AdminGformrequestController extends ModuleAdminController
{
    public function __construct()
    {
        $download = Tools::getValue('download');
        if($download!=''){
            if(file_exists(_PS_UPLOAD_DIR_.$download)){
                header('Content-Transfer-Encoding: binary');
                header('Content-Type: '.$download);
                header('Content-Length: '.filesize(_PS_UPLOAD_DIR_.$download));
                header('Content-Disposition: attachment; filename="'.utf8_decode($download).'"');
                @set_time_limit(0);
                readfile(_PS_UPLOAD_DIR_.$download);
            }
            exit;
        }
        
        $this->className = 'gformrequestModel';
        $this->table = 'gformrequest';
        $this->meta_title = $this->l('Forms Request');
        $this->deleted = false;
        $this->explicitSelect = true;
        $this->context = Context::getContext();
        $this->lang = false;
        $this->bootstrap = true;
        $this->_defaultOrderBy = 'id_gformrequest';
        $this->_defaultOrderWay = 'desc';
        $this->filter = false;
        if (Shop::isFeatureActive()) {
            Shop::addTableAssociation($this->table, array('type' => 'shop'));
        }
        $this->bulk_actions = array(
			'delete' => array(
				'text' => $this->l('Delete selected'),
				'confirm' => $this->l('Delete selected items?'),
				'icon' => 'icon-trash'
			)
		);
        $this->position_identifier = 'id_gformrequest';
        $this->addRowAction('view');
        $this->addRowAction('delete');
        $this->_select = ' fb.title as fbtitle ';
        $this->_join = ' LEFT JOIN `'._DB_PREFIX_.'gformbuilderpro` f ON (a.`id_gformbuilderpro` = f.`id_gformbuilderpro`) 
                        LEFT JOIN `'._DB_PREFIX_.'gformbuilderpro_lang` fb ON (a.`id_gformbuilderpro` = fb.`id_gformbuilderpro` AND fb.id_lang = '.(int)$this->context->language->id.') 
                        LEFT JOIN `'._DB_PREFIX_.'gformbuilderpro_shop` fc ON (a.`id_gformbuilderpro` = fc.`id_gformbuilderpro` AND fc.id_shop = '.(int)$this->context->shop->id.')';
        $titles_array = array();
        $forms = gformbuilderproModel::getAllBlock();        
        foreach ($forms as $form) {
            $titles_array[$form['id_gformbuilderpro']] = $form['title'];
        }        
        $this->fields_list = array(
            'id_gformrequest' => array(
                'title' => $this->l('ID'),
                'type' => 'int',
                'width' => 'auto',
                'orderby' => false),
            'fbtitle' => array(
                'title' => $this->l('Form Title'),
                'filter_key' => 'a!id_gformbuilderpro',
                'type' => 'select',
                'list' => $titles_array,
                'filter_type' => 'int',
                'order_key' => 'fb!fbtitle'
            ),               
            'subject' => array(
                'title' => $this->l('Mail Subject'),
                'type' => 'text',
                'width' => 'auto',
                'orderby' => false,
                'filter_key' => 'a!subject'
                ),
            'sendto' => array(
                'title' => $this->l('Sent To'),
                'type' => 'text',
                'width' => 'auto',
                'orderby' => false,
                'filter_key' => 'a!sendto'),
            'date_add' => array(
                'title' => $this->l('Date'),
                'type' => 'datetime',
                'width' => 'auto',
                'orderby' => false,
                'filter_key' => 'a!date_add'),
            );
        parent::__construct();
    }
    public function initToolbar()
    {
        parent::initToolbar();
        unset($this->toolbar_btn['new']);
    }
    public function initToolBarTitle()
    {
        $this->toolbar_title[] = $this->l('Form');
        $this->toolbar_title[] = $this->l('Received Data');
    }
    public function renderView(){
        $idrequest = (int)Tools::getValue('id_gformrequest');
        $extension = array('jpg','jpeg','gif','png');
        if($idrequest > 0){
            $requestObj = new gformrequestModel($idrequest);
            if(version_compare(_PS_VERSION_,'1.6') != -1)
                $this->initPageHeaderToolbar();
            $this->tpl_view_vars = array(
                'id_gformbuilderpro'=>$requestObj->id_gformbuilderpro,
                'user_ip'=>$requestObj->user_ip,
                'subject'=>$requestObj->subject,
                'request'=>$requestObj->request,
                'date_add'=>$requestObj->date_add,
                'requestdownload'=>$this->context->link->getAdminLink('AdminGformrequest').'&download=',
                'backurl'=>$this->context->link->getAdminLink('AdminGformrequest')
            );
            if($requestObj->attachfiles !=''){
                $attachfiles = explode(',',$requestObj->attachfiles);
                foreach($attachfiles as $file){
                    if($file !='' && file_exists(_PS_UPLOAD_DIR_.$file)){
                        if(in_array(Tools::strtolower(Tools::substr($file, -3)), $extension) || 
                            in_array(Tools::strtolower(Tools::substr($file, -4)), $extension)){
                             $this->tpl_view_vars['attachfiles'][] = array('isImage'=>true,'name'=>$file);   
                        }else{
                            $this->tpl_view_vars['attachfiles'][] = array('isImage'=>false,'name'=>$file);
                        }
                    }
                        
                }
            }
            $this->base_tpl_view = 'viewrequest.tpl';
        }
        return parent::renderView();
    }
}
?>