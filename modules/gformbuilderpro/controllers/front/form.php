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
include_once(_PS_MODULE_DIR_ . 'gformbuilderpro/classes/gformbuilderprofieldsModel.php');
include_once(_PS_MODULE_DIR_ . 'gformbuilderpro/classes/gformrequestModel.php');
class GformbuilderproFormModuleFrontController extends ModuleFrontController{
    public function __construct()
	{
		parent::__construct();
        if(version_compare(_PS_VERSION_,'1.6') ==-1){
            $this->display_column_left = false;
            $this->display_column_right = false;
        }else{
            $this->display_column_left = Context::getContext()->theme->hasLeftColumn();
            $this->display_column_right = Context::getContext()->theme->hasRightColumn();
        }
		$this->context = Context::getContext();
	}
    public function initContent()
    {
        parent::initContent();
        $formtemplates_dir = 'formtemplates/';
        $useSSL = (Configuration::get('PS_SSL_ENABLED') || Tools::usingSecureMode()) ? true : false;
        $protocol_content = ($useSSL) ? 'https://' : 'http://';
        $base_uri = $protocol_content.Tools::getHttpHost().__PS_BASE_URI__;
        $idform = (int)Tools::getValue('idform');
        $id_lang = (int)Tools::getValue('id_lang');
        $id_shop = (int)Tools::getValue('id_shop');
        $usingajax = (int)Tools::getValue('usingajax');
        $id_shop_group = (int)Shop::getContextShopGroupID();
        if($id_lang<=0){ $id_lang = (int)$this->context->language->id;}
        if($id_shop<=0){ $id_shop = (int)$this->context->shop->id;}
        if($idform<=0){ $idform = (int)Tools::getValue('id');}              
        $blackip = (bool)$this->isInBlacklistIp($id_shop_group,$id_shop);
        if($blackip){
            if($usingajax){
                Context::getContext()->smarty->assign(array(
        	        '_errors' => array($this->l('You are blocked.')),
                ));
                $tpl = _PS_MODULE_DIR_.'gformbuilderpro/views/templates/front/thankyou.tpl';
                $thankyou = Context::getContext()->smarty->fetch($tpl);
                $results = array(
                            'errors'=>'1',
                            'thankyou'=>$thankyou
                        );
                die(Tools::jsonEncode($results));
            }else{
                Tools::redirect('index.php?controller=pagenotfound');
                exit;
            }
        }else{
            if($idform > 0){
                
                $formObj = new gformbuilderproModel((int)$idform,(int)$id_lang,(int)$id_shop);
                if($formObj->active){
                    
                    
                    if((bool)$formObj->requiredlogin && !$this->context->customer->isLogged()){
                        if($usingajax){
                            Context::getContext()->smarty->assign(array(
                    	        '_errors' => array($this->l('You must login to access forms')),
                            ));
                            $tpl = _PS_MODULE_DIR_.'gformbuilderpro/views/templates/front/thankyou.tpl';
                            $thankyou = Context::getContext()->smarty->fetch($tpl);
                            $results = array(
                                        'errors'=>'1',
                                        'thankyou'=>$thankyou
                                    );
                            die(Tools::jsonEncode($results));
                        }else{
                            Tools::redirect('index.php?controller=authentication?back=my-account');
                            exit;
                        }
                    }else{
                        $sendemail = false;
                        $params = array();
                        $params['{shop_name}'] = Tools::safeOutput(Configuration::get('PS_SHOP_NAME', null, null, $id_shop));
			            $params['{shop_url}'] = Context::getContext()->link->getPageLink('index', true, Context::getContext()->language->id);
                        if(Tools::isSubmit('gSubmitForm')){
                            $formok = true;
                            if($formObj->id_gformbuilderpro > 0 && $formObj->active){
                                $fields = $formObj->fields;
                                if($fields !=''){
                                    $fieldsData = gformbuilderprofieldsModel::getAllFields($fields,$id_lang,$id_shop);
                                    $_errors = array();
                                    $attachfiles = array();
                                    $attachfiles_name = array();
                                    // check captcha first
                                    if($fieldsData){
                                        foreach($fieldsData as $fieldData){
                                            if($fieldData['type'] =='captcha' && $formok){
                                                $grecaptcharesponse = Tools::getValue('g-recaptcha-response');
                                                if(!empty($grecaptcharesponse)){
                                                    $id_shop_group = (int)Shop::getContextShopGroupID();
                                                    $secret = Configuration::get('GF_SECRET_KEY', null, $id_shop_group, $id_shop);
                                                    $verifyResponse = Tools::file_get_contents('https//www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$grecaptcharesponse);
                                                    $responseData = Tools::jsonDecode($verifyResponse);
                                                    if(is_object($responseData)){
                                                        if(!$responseData->success){
                                                            $formok = false;
                                                            $_errors[] = $this->l('Robot verification failed, please try again.');
                                                        }
                                                    }elseif(is_array($responseData))
                                                        if(!$responseData["success"]){
                                                            $formok = false;
                                                            $_errors[] = $this->l('Robot verification failed, please try again.');
                                                        }
                                                }else{
                                                    $formok = false;
                                                    $_errors[] = $this->l('Please click on the reCAPTCHA box.');
                                                }
                                            }
                                        }
                                    }
                                    if($fieldsData && $formok){
                                        foreach($fieldsData as $fieldData){
                                            if($fieldData['type'] !='captcha' && $fieldData['type'] !='html'){
                                                $field_data = Tools::getValue($fieldData['name']);
                                                $formok &= (bool)$this->validateForm($fieldData,$field_data,$_errors,$id_lang,$id_shop);
                                                if($formok){
                                                    if($fieldData['type'] =='select' || $fieldData['type'] =='colorchoose' || $fieldData['type'] =='checkbox')
                                                    {
                                                        $params['{'.$fieldData['name'].'}'] = '';
                                                        if(is_array($field_data) && !empty($field_data)){
                                                            $params['{'.$fieldData['name'].'}'] = implode(',',$field_data);
                                                        }else{
                                                            $params['{'.$fieldData['name'].'}'] = $field_data;
                                                        }
                                                        
                                                    }
                                                    elseif($fieldData['type'] =='imagethumb'){
                                                        $params['{'.$fieldData['name'].'}'] = '';
                                                        if(is_array($field_data) && !empty($field_data)){
                                                            $thumbs = array();
                                                            foreach($field_data as $thumb_data){
                                                                if($thumb_data !=''){
                                                                    $thumb = '<img style="max-width:120px;" src="'.$base_uri.'modules/gformbuilderpro/views/img/thumbs/'.$thumb_data.'" alt="'.$thumb_data.'">';
                                                                    $thumbs[] = $thumb;
                                                                }
                                                            }
                                                            $params['{'.$fieldData['name'].'}'] = implode(' ',$thumbs);
                                                        }elseif($field_data !=''){
                                                            
                                                            $thumb = '<img style="max-width:120px;" src="'.$base_uri.'modules/gformbuilderpro/views/img/thumbs/'.$field_data.'" alt="'.$field_data.'">';
                                                            $params['{'.$fieldData['name'].'}'] = $thumb;
                                                        }
                                                    }
                                                    elseif($fieldData['type'] =='product')
                                                    {
                                                        
                                                        $params['{'.$fieldData['name'].'}'] = '';
                                                        if(is_array($field_data) && !empty($field_data)){
                                                            $product_chooses = array();
                                                            foreach($field_data as $productid){
                                                                if($productid > 0){
                                                                    $product_name=Product::getProductName((int)$productid,null,(int)$id_lang);
                                                                    $product_link=$this->context->link->getProductLink($productid,null,null,null,(int)$id_lang,(int)$id_shop);
                                                                    $product_chooses[] = '<a href="'.$product_link.'" >'.$product_name.'</a>';
                                                                }
                                                            }
                                                            $params['{'.$fieldData['name'].'}'] = implode(',',$product_chooses);
                                                        }else{
                                                            if($field_data > 0){
                                                                $product_name=Product::getProductName((int)$field_data,null,(int)$id_lang);
                                                                $product_link=$this->context->link->getProductLink($field_data,null,null,null,(int)$id_lang,(int)$id_shop);
                                                                $product_choose = '<a href="'.$product_link.'" >'.$product_name.'</a>';
                                                                $params['{'.$fieldData['name'].'}'] = $product_choose;
                                                            }
                                                        }
                                                        
                                                    }elseif($fieldData['type'] == 'survey')
                                                    {
                                                        $surceyObj = new gformbuilderprofieldsModel($fieldData['id_gformbuilderprofields'],$id_lang,$id_shop);
                                                        $surcey_vals =   explode(',',$surceyObj->value);
                                                        $surcey_data = array();
                                                        foreach($surcey_vals as $key=>$surcey)
                                                            $surcey_data[] = $surcey.':'.(isset($field_data[$key]) ? $field_data[$key] : '');
                                                        $params['{'.$fieldData['name'].'}'] = implode(',',$surcey_data);
                                                    }
                                                    elseif($fieldData['type'] != 'fileupload') $params['{'.$fieldData['name'].'}'] = $field_data;
                                                }
                                            }
                                        }
                                    }
                                    if($formok){
                                        //upload file after form is validate ok
                                        foreach($fieldsData as $fieldData){
                                            if($formok && $fieldData['type'] =='fileupload'){
                                                $file_attachments = array();
                                        		$params['{'.$fieldData['name'].'}'] = '';
                                                $multi = (bool)$fieldData['multi'];
                                                if($multi){
                                                    if (isset($_FILES[$fieldData['name']]['name']) && !empty($_FILES[$fieldData['name']]['name']) && !empty($_FILES[$fieldData['name']]['tmp_name']))
                                            		{
                                            		    foreach(array_keys($_FILES[$fieldData['name']]['name']) as $key){
                                          		            if($_FILES[$fieldData['name']]['name'][$key]){
                                                		        $file_attachment = null;
                                                    			$file_attachment['rename'] = uniqid(). Tools::strtolower(Tools::substr($_FILES[$fieldData['name']]['name'][$key], -5));	
                                                    			$file_attachment['content'] = Tools::file_get_contents($_FILES[$fieldData['name']]['tmp_name'][$key]);
                                                    			$file_attachment['tmp_name'] = $_FILES[$fieldData['name']]['tmp_name'][$key];
                                                    			$file_attachment['name'] = $_FILES[$fieldData['name']]['name'][$key];
                                                    			$file_attachment['mime'] = $_FILES[$fieldData['name']]['type'][$key];
                                                    			$file_attachment['error'] = $_FILES[$fieldData['name']]['error'][$key];
                                                                if (isset($file_attachment['rename']) && !empty($file_attachment['rename']) && rename($file_attachment['tmp_name'], _PS_UPLOAD_DIR_.basename($file_attachment['rename']))) {
                                                                    $file_attachments[]= $file_attachment['rename'];
                                                                    @chmod(_PS_UPLOAD_DIR_.basename($file_attachment['rename']), 0664);
                                                                    $file_attachment['name'] = $file_attachment['rename'];
                                                                    $attachfiles[] = $file_attachment;
                                                                    $attachfiles_name[] = $file_attachment['name'];
                                                                }else{
                                                                    $_errors[] = $fieldData['label'].' '.$this->l(' An error occurred during the file-upload process.');
                                                                    $formok = false;
                                                                    break;
                                                                }
                                                            }
                                                        }
                                            		}
                                                    if($file_attachments)
                                                        $params['{'.$fieldData['name'].'}'] = implode(',',$file_attachments);
                                                }else{
                                                    if (isset($_FILES[$fieldData['name']]['name']) && !empty($_FILES[$fieldData['name']]['name']) && !empty($_FILES[$fieldData['name']]['tmp_name']))
                                            		{
                                            		    $file_attachment = null;
                                            			$file_attachment['rename'] = uniqid(). Tools::strtolower(Tools::substr($_FILES[$fieldData['name']]['name'], -5));	
                                            			$file_attachment['content'] = Tools::file_get_contents($_FILES[$fieldData['name']]['tmp_name']);
                                            			$file_attachment['tmp_name'] = $_FILES[$fieldData['name']]['tmp_name'];
                                            			$file_attachment['name'] = $_FILES[$fieldData['name']]['name'];
                                            			$file_attachment['mime'] = $_FILES[$fieldData['name']]['type'];
                                            			$file_attachment['error'] = $_FILES[$fieldData['name']]['error'];
                                                        if (isset($file_attachment['rename']) && !empty($file_attachment['rename']) && rename($file_attachment['tmp_name'], _PS_UPLOAD_DIR_.basename($file_attachment['rename']))) {
                                                            $params['{'.$fieldData['name'].'}'] = $file_attachment['rename'];
                                                            @chmod(_PS_UPLOAD_DIR_.basename($file_attachment['rename']), 0664);
                                                            $file_attachment['name'] = $file_attachment['rename'];
                                                            $attachfiles[] = $file_attachment;
                                                            $attachfiles_name[] = $file_attachment['name'];
                                                        }else{
                                                            $_errors[] = $fieldData['label'].' '.$this->l(' An error occurred during the file-upload process.');
                                                            $formok = false;
                                                            break;
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                        //#upload file after is validate ok
                                    }
                                    if($formok){
                                        
                                        $sendto = explode(',',$formObj->sendto);
                                        
                                        if($sendto){
                                            $subject = $formObj->subject;
                                            if($params){
                                                foreach($params as $key=>$value)
                                                    $subject = str_replace($key,$value,$subject);
                                            }
                                            $sendemail = true;
                                            $reply_to = null;
                                            $sender = $formObj->sender;
                                            if($sender!=''){
                                                $sendersubject = $formObj->subjectsender;
                                                if($params){
                                                    foreach($params as $key=>$value){
                                                        $sender = str_replace($key,$value,$sender);
                                                        $sendersubject = str_replace($key,$value,$sendersubject);
                                                    }
                                                }
                                                if(Validate::isEmail($sender)){
                                                    $reply_to = $sender;
                                                    if($formObj->sendtosender){
                                                        try{
                                                            $this->sendEmail($params,$formObj->id_gformbuilderpro,$sender,$sendersubject,$id_lang,$id_shop,null,true);
                                                        } catch (Exception $e) {}
                                                    }
                                                }
                                            }
                                            foreach($sendto as $email){
                                                try{ 
                                                    $this->sendEmail($params,$formObj->id_gformbuilderpro,$email,$subject,$id_lang,$id_shop,$attachfiles,false,$reply_to);
                                                } catch (Exception $e) {
                                                    $sendemail = false;
                                                }
                                            }
                                            
                                            if($formObj->saveemail){
                                                $requestObj = new gformrequestModel(null,null,$id_shop);
                                                $requestObj->id_gformbuilderpro = $formObj->id_gformbuilderpro;
                                                $requestObj->user_ip = Tools::getRemoteAddr();
                                                $requestObj->subject = $subject;
                                                $requestObj->request =$this->getEmailSendData($formObj->id_gformbuilderpro,$id_lang,$id_shop,$params);
                                                $requestObj->sendto = $formObj->sendto;
                                                $requestObj->attachfiles = implode(',',$attachfiles_name);
                                                $requestObj->jsonrequest = Tools::jsonEncode($params);
                                                $requestObj->date_add = date("Y-m-d H:i:s");
                                                $requestObj->save();
                                            }
                                            
                                        }
                                    }elseif($_errors)
                                        if($usingajax){
                                            Context::getContext()->smarty->assign(array(
                                    	        '_errors' => $_errors,
                                            ));
                                            $tpl = _PS_MODULE_DIR_.'gformbuilderpro/views/templates/front/thankyou.tpl';
                                            $thankyou = Context::getContext()->smarty->fetch($tpl);
                                            $results = array(
                                                'errors'=>'1',
                                                'thankyou'=>$thankyou
                                            );
                                            die(Tools::jsonEncode($results));
                                        }else{
                                            $this->context->smarty->assign(array(
                                    	        '_errors' => $_errors,
                                            ));
                                        }
                                }
                                if($usingajax){
                                    if($sendemail){
                                        Context::getContext()->smarty->assign(array(
                                	        'success_message' => $this->getThankyouData($formObj->success_message,$params),
                                            'errors'=>'0',
                                        ));
                                    }else{
                                        Context::getContext()->smarty->assign(array(
                                	        'success_message' => $this->getThankyouData($formObj->error_message,$params),
                                            'errors'=>'1',
                                        ));
                                    }
                                    $tpl = _PS_MODULE_DIR_.'gformbuilderpro/views/templates/front/thankyou.tpl';
                                    $thankyou = Context::getContext()->smarty->fetch($tpl);
                                    $results = array(
                                        'errors'=>($sendemail ? '0' : '1'),
                                        'thankyou'=>$thankyou,
                                        'autoredirect'=>(bool)$formObj->autoredirect,
                                        'timedelay'=>(int)$formObj->timedelay,
                                        'redirect_link'=>$formObj->redirect_link,
                                    );
                                    die(Tools::jsonEncode($results));
                                }else{
                                    if($sendemail){
                                        $this->context->smarty->assign(array(
                                	        'success_message' => $this->getThankyouData($formObj->success_message,$params),
                                            'autoredirect'=>(bool)$formObj->autoredirect,
                                            'timedelay'=>(int)$formObj->timedelay,
                                            'redirect_link'=>$formObj->redirect_link
                                        ));
                                    }else{
                                        $this->context->smarty->assign(array(
                                	        'success_message' => $this->getThankyouData($formObj->error_message,$params),
                                        ));
                                    }
                                    $this->setTemplate('thankyou.tpl');
                                   
                                } 
                            }else{
                                if($usingajax){
                                    Context::getContext()->smarty->assign(array(
                            	        '_errors' => array($this->l('Form not found')),
                                    ));
                                    $tpl = _PS_MODULE_DIR_.'gformbuilderpro/views/templates/front/thankyou.tpl';
                                    $thankyou = Context::getContext()->smarty->fetch($tpl);
                                    $results = array(
                                                'errors'=>'1',
                                                'thankyou'=>$thankyou
                                            );
                                    die(Tools::jsonEncode($results));
                                }else{
                                    $this->context->smarty->assign(array('path'=>$this->l('Form not found')));
                                    $this->setTemplate($formtemplates_dir.'notfound.tpl');
                                }
                            }
                        }   
                        else{
                            $template = $formtemplates_dir.$idform.'/'.$id_lang.'/'.$id_shop.'_form.tpl';
                            if(!file_exists(_PS_MODULE_DIR_.'gformbuilderpro/views/templates/front/'.$template)){
                                $formObj->parseTpl((int)$id_lang,(int)$id_shop);
                            }
                            if(file_exists(_PS_MODULE_DIR_.'gformbuilderpro/views/templates/front/'.$template)){
                                $id_shop_group = (int)Shop::getContextShopGroupID();
                                $url_rewrite = Context::getContext()->link->getModuleLink('gformbuilderpro','form',array('id'=>$idform,'rewrite'=>$formObj->rewrite));
                                if (!strpos($url_rewrite, 'index.php')){
                                    $url_rewrite = str_replace('?module=gformbuilderpro&controller=form','',$url_rewrite);
                                }
                                $this->context->smarty->assign(array(
                                    'sitekey'=>Configuration::get('GF_RECAPTCHA', null, $id_shop_group, $id_shop),
                                    'path'=>$formObj->title,
                                    'meta_title'=>$formObj->title,
                                    'meta_keywords' =>$formObj->metakeywords,
                        	        'meta_description' => $formObj->metadescription,
                                    'customerid'=>($this->context->customer->isLogged()) ? $this->context->customer->id : '0',
                                    'customername'=>($this->context->customer->isLogged()) ? $this->context->customer->firstname.' '.$this->context->customer->lastname : '',
                                    'customeremail'=>($this->context->customer->isLogged()) ? $this->context->customer->email : '',
                                    'productid'=>(Tools::getValue('id_product')) ? (int)Tools::getValue('id_product') : '0',
                                    'productname'=>(Tools::getValue('id_product')) ? Product::getProductName((int)Tools::getValue('id_product'),null,$this->context->language->id) : '',
                                    'shopname'=>$this->context->shop->name,
                                    'currencyname'=>$this->context->currency->name,
                                    'languagename'=>$this->context->language->name,
                                    'base_uri'=>$base_uri,
                                    'actionUrl'=>$url_rewrite,
                                ));
                                //get product data
                                $fields = $formObj->fields;
                                $fieldsData = gformbuilderprofieldsModel::getAllFields($fields,$id_lang,$id_shop);
                                if($fieldsData){
                                    foreach($fieldsData as $field){
                                        if($field['type'] == 'product'){
                                            $productids = explode(',',$field['extra']);
                                            if($productids){
                                                $productData = array();
                                                foreach($productids as $productid){
                                                    if($productid !=''){
                                                        $cover = Product::getCover((int)$productid);
                                                        $id_image = 0;
                                                        if(isset($cover['id_image'])) $id_image = (int)$cover['id_image'];
                                                        $productObj = new Product((int)$productid,false,(int)$id_lang,(int)$id_shop);
                                                        $productData[(int)$productid] =array(
                                                            'id'=>(int)$productid,
                                                            'name'=>Product::getProductName((int)$productid,null,(int)$id_lang),
                                                            'link'=>$this->context->link->getProductLink($productid,null,null,null,(int)$id_lang,(int)$id_shop),
                                                            'image_link' =>$this->context->link->getImageLink($productObj->link_rewrite,$id_image,Configuration::get('GF_PRODUCT_TYPE'))
                                                        );
                                                    }
                                                }
                                                $this->context->smarty->assign(array(
                                                        $field['name'].'product'=>$productData
                                                    )
                                                );
                                            }
                                                
                                        }
                                    }
                                }
                                $this->setTemplate($template);
                           }
                            else{
                                $this->context->smarty->assign(array('path'=>$this->l('Form not found')));
                                $this->setTemplate($formtemplates_dir.'notfound.tpl');
                            }
                        }
                    }
                }else{
                    
                    if($usingajax){
                        Context::getContext()->smarty->assign(array(
                	        '_errors' => array($this->l('Form not found')),
                        ));
                        $tpl = _PS_MODULE_DIR_.'gformbuilderpro/views/templates/front/thankyou.tpl';
                        $thankyou = Context::getContext()->smarty->fetch($tpl);
                        $results = array(
                                    'errors'=>'1',
                                    'thankyou'=>$thankyou
                                );
                        die(Tools::jsonEncode($results));
                    }else{
                        $this->context->smarty->assign(array('path'=>$this->l('Form not found')));
                        $this->setTemplate($formtemplates_dir.'notfound.tpl');
                    }
                    
                }
            }else{
                $this->context->smarty->assign(array('path'=>$this->l('Form not found')));
                $this->setTemplate($formtemplates_dir.'notfound.tpl');
            }
        }
    }
    public function validateForm($field='',$field_data,&$_errors,$id_lang,$id_shop){
        if($field != ''){
            if((bool)$field['required'] && empty($field_data) && $field['type'] !='fileupload'){ 
                $_errors[] = $this->l('Field ').$field['label'].$this->l(' is empty.');
                return false;
            }
            if($field['validate'] !=''){
                if($field['type'] == 'slider' && (bool)$field['multi']){
                    $field_data = explode('->',$field_data);
                    if(isset($field_data[0])){
                        $isok = gformbuilderprofieldsModel::gValidateField($field_data[0],$field['validate']);
                    }else{
                        $isok = false;
                    }
                    if($isok && isset($field_data[1])){
                        $isok = gformbuilderprofieldsModel::gValidateField($field_data[1],$field['validate']);
                    }else{
                        $isok = false;
                    }
                    if($isok && isset($field_data[2])){
                        $isok = false;
                    }
                }else
                    $isok = gformbuilderprofieldsModel::gValidateField($field_data,$field['validate']);
                if(!$isok) {
                    $_errors[] = sprintf($this->l('Field %s is not allowed.'), $field['label']);
                    return false;
                }
            } 
            switch ($field['type']) {
                case 'survey':
                    $surceyObj = new gformbuilderprofieldsModel($field['id_gformbuilderprofields'],$id_lang,$id_shop);
                    $surcey_vals =   explode(',',$surceyObj->value);
                    $surcey_colurms =   explode(',',$surceyObj->description);
                    foreach($surcey_vals as $key=>$surcey){
                        if((bool)$field['required']){
                            if(!isset($field_data[$key]) || $field_data[$key] == ''){
                                $_errors[] =  sprintf($this->l('Field %s is empty.'), $surcey);
                                return false;
                            }
                        }
                        elseif(isset($field_data[$key]) && $field_data[$key] !='' && !in_array($field_data[$key],$surcey_colurms)){
                            $_errors[] = sprintf($this->l('Field %s is not allowed.'), $surcey);
                            return false;
                        }
                    }
                    break;
                case 'checkbox':
                case 'radio':
                case 'select':
                case 'checkbox':
                    $fieldObj = new gformbuilderprofieldsModel($field['id_gformbuilderprofields'],$id_lang,$id_shop);
                    $option_vals =   explode(',',$fieldObj->value);
                    if((bool)$field['required']){
                        if(!isset($field_data) || empty($field_data)){
                            $_errors[] = sprintf($this->l('Field %s is empty.'), $field['label']);
                            return false;
                        }
                    }elseif(isset($field_data)){
                        if(is_array($field_data)){
                            foreach($field_data as $data)
                                if(!in_array($data,$option_vals) && $data !=''){
                                    $_errors[] = sprintf($this->l('Field %s is not allowed.'), $field['label']);
                                    return false;
                                }
                        }elseif(!in_array($field_data,$option_vals) && $field_data !=''){
                                $_errors[] = sprintf($this->l('Field %s is not allowed.'), $field['label']);
                                return false;
                        }
                    }
                    break;
                case 'colorchoose':
                case 'imagethumb':
                    $fieldObj = new gformbuilderprofieldsModel($field['id_gformbuilderprofields'],$id_lang,$id_shop);
                    $option_vals =   explode(',',$fieldObj->extra);
                    if((bool)$field['required']){
                        if(!isset($field_data) || empty($field_data)){
                            $_errors[] = sprintf($this->l('Field %s is empty.'), $field['label']);
                            return false;
                        }
                    }elseif(isset($field_data)){
                        if(is_array($field_data)){
                            foreach($field_data as $data)
                                if(!in_array($data,$option_vals) && $data !=''){
                                    $_errors[] = sprintf($this->l('Field %s is not allowed.'), $field['label']);
                                    return false;
                                }
                        }elseif(!in_array($field_data,$option_vals) && $field_data !=''){
                                $_errors[] = sprintf($this->l('Field %s is not allowed.'), $field['label']);
                                return false;
                        }
                    }
                    break;
                case 'survey':
                    $fieldObj = new gformbuilderprofieldsModel($field['id_gformbuilderprofields'],$id_lang,$id_shop);
                    $option_vals =   explode(',',$fieldObj->extra);
                    if((bool)$field['required']){
                        if(!isset($field_data) || empty($field_data)){
                            $_errors[] = sprintf($this->l('Field %s is empty.'), $field['label']);
                            return false;
                        }
                    }elseif(isset($field_data)){
                        if(is_array($field_data)){
                            foreach($field_data as $data)
                                if(!in_array($data,$option_vals) && $data !=''){
                                    $_errors[] = sprintf($this->l('Field %s is not allowed.'), $field['label']);
                                    return false;
                                }
                        }elseif(!in_array($field_data,$option_vals) && $field_data !=''){
                                $_errors[] = sprintf($this->l('Field %s is not allowed.'), $field['label']);
                                return false;
                        }
                    }
                    break;
                case 'fileupload':
                    $extension = explode(',',$field['extra']);
                    $multi = (bool)$field['multi'];
                    if($multi){
                        if (isset($_FILES[$field['name']]['name']) && !empty($_FILES[$field['name']]['name']) && !empty($_FILES[$field['name']]['tmp_name']))
                    	{
                    	    foreach(array_keys($_FILES[$field['name']]['name']) as $key){
                                if($_FILES[$field['name']]['name'][$key]){
                    		        $file_attachment = null;
                        			$file_attachment['tmp_name'] = $_FILES[$field['name']]['tmp_name'][$key];
                        			$file_attachment['name'] = $_FILES[$field['name']]['name'][$key];
                        			$file_attachment['error'] = $_FILES[$field['name']]['error'][$key];
                                    if (!empty($file_attachment['name']) && $file_attachment['error'] != 0) {
                                        $_errors[] = $field['label'].' '.$this->l(' An error occurred during the file-upload process.');
                                        return false;
                                    } elseif (!empty($file_attachment['name']) && 
                                        !in_array(Tools::strtolower(Tools::substr($file_attachment['name'], -3)), $extension) && 
                                        !in_array(Tools::strtolower(Tools::substr($file_attachment['name'], -4)), $extension)
                                        ) {
                                        $_errors[] = $field['label'].' '.$this->l('Bad file extension');
                                        return false;      
                                    }
                                }
                            }
                    	}
                        if($field['required'] && (!isset($_FILES[$field['name']]['name']) || empty($_FILES[$field['name']]['name']) || empty($_FILES[$field['name']]['tmp_name'])))
                        {
                    	    $_errors[] = sprintf($this->l('Field %s is empty.'), $field['label']);
                    	    return false;
                        }
                    }else{
                        if (isset($_FILES[$field['name']]['name']) && !empty($_FILES[$field['name']]['name']) && !empty($_FILES[$field['name']]['tmp_name']))
                    	{
                    		$file_attachment['tmp_name'] = $_FILES[$field['name']]['tmp_name'];
                    		$file_attachment['name'] = $_FILES[$field['name']]['name'];
                    		$file_attachment['error'] = $_FILES[$field['name']]['error'];
                    	}
                        if($field['required'] && $file_attachment == null){
                    	    $_errors[] = sprintf($this->l('Field %s is empty.'), $field['label']);
                    	    return false;
                        }elseif (!empty($file_attachment['name']) && $file_attachment['error'] != 0) {
                            $_errors[] = $field['label'].' '.$this->l(' An error occurred during the file-upload process.');
                            return false;
                        } elseif (!empty($file_attachment['name']) && 
                            !in_array(Tools::strtolower(Tools::substr($file_attachment['name'], -3)), $extension) && 
                            !in_array(Tools::strtolower(Tools::substr($file_attachment['name'], -4)), $extension)
                            ) {
                            $_errors[] = $field['label'].' '.$this->l('Bad file extension');
                            return false;        
                        }
                    }
                    break;  
            }
        }
        return true;
    }
    public function sendEmail($params,$id_form,$email,$subject,$id_lang,$id_shop,$attachfiles=null,$sender=false,$replyto=null){
        if(!$attachfiles) $attachfiles = null;
        if($sender){
            Mail::Send(
                (int)$id_lang,
                'sender_'.$id_form.'_'.$id_shop,
                $subject,
                $params,
                $email,
                'Admin',
                null, null, $attachfiles, null, _PS_MODULE_DIR_.'gformbuilderpro/mails/', false, (int)$id_shop,null,$replyto
            );
        }else{
            Mail::Send(
                (int)$id_lang,
                'form_'.$id_form.'_'.$id_shop,
                $subject,
                $params,
                $email,
                'Admin',
                null, null, $attachfiles, null, _PS_MODULE_DIR_.'gformbuilderpro/mails/', false, (int)$id_shop,null,$replyto
            );
        }
    }
    public function getEmailSendData($id_form,$id_lang,$id_shop,$params){
        $lang_iso_code = Language::getIsoById( (int)$id_lang);
        $template_html = Tools::file_get_contents(_PS_MODULE_DIR_.'gformbuilderpro/mails/'.$lang_iso_code.'/'.'form_'.$id_form.'_'.$id_shop.'.html');
        if($params)
            foreach($params as $key=>$value)
                $template_html = str_replace($key,$value,$template_html);
        return $template_html;
    }
    public function getThankyouData($message='',$params){
        if($params && $message !='')
            foreach($params as $key=>$value)
                $message = str_replace($key,$value,$message);
        return $message;
    }
    public function l($string, $specific = false)
	{
		return Translate::getModuleTranslation('gformbuilderpro', $string, ($specific) ? $specific : 'form');
	}
    public function isInBlacklistIp($id_shop_group,$id_shop){
        $backip = false;
        $user_ip = Tools::getRemoteAddr();
        $ips = array();
        $blacklisteds =  Configuration::get('GF_BLACKLISTED_IP', null, $id_shop_group, $id_shop);
        $ips = explode(',', $blacklisteds);
        $ips = array_map('trim', $ips);
        if (is_array($ips) && count($ips)) {
            foreach ($ips as $ip) {
                if (!$backip && !empty($ip) && preg_match('/^'.$ip.'.*/', $user_ip)) {
                    $backip = true;
                }
            }
        }
        return $backip;
    }
}