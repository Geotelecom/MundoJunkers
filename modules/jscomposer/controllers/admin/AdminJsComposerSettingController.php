<?php

/*
 * 2007-2014 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
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
 *  @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 *  International Registered Trademark & Property of PrestaShop SA
 */

class AdminJsComposerSettingController extends AdminController {

    public function __construct() {
        $this->bootstrap = true;
        $this->className = 'Configuration';
        $this->table = 'Configuration';

        parent::__construct();

        $arr = array();
        $arr[] = array('id' => 'no', 'name' => 'No');
        $arr[] = array('id' => 'yes', 'name' => 'Yes');
        $tab_arr[] = array('id' => 'general', 'name' => 'General Style');
        $tab_arr[] = array('id' => 'classic', 'name' => 'Classic Style');



        parent::__construct();

        $this->fields_options = array(
            'email' => array(
                'title' => $this->l('General Setting for Visual Composer'),
                'icon' => 'icon-cogs',
                'fields' => array(
                    'vc_load_flex_js' => array(
                        'title' => $this->l('Load Flexslider JS:'),
                        'desc' => $this->l('if you want to load Flexslider JS from your theme or module.'),
                        'validation' => 'isGenericName',
                        'type' => 'select',
                        'identifier' => 'id',
                        'list' => $arr
                    ),
                    'vc_load_flex_css' => array(
                        'title' => $this->l('Load Flexslider CSS:'),
                        'desc' => $this->l('if you want to load Flexslider CSS from your theme or module.'),
                        'validation' => 'isGenericName',
                        'type' => 'select',
                        'identifier' => 'id',
                        'list' => $arr
                    ),
                    'vc_load_nivo_js' => array(
                        'title' => $this->l('Load NivoSlider JS:'),
                        'desc' => $this->l('if you want to load NivoSlider JS from your theme or module.'),
                        'validation' => 'isGenericName',
                        'type' => 'select',
                        'identifier' => 'id',
                        'list' => $arr
                    ),
                    'vc_load_nivo_css' => array(
                        'title' => $this->l('Load NivoSlider CSS:'),
                        'desc' => $this->l('if you want to load NivoSlider CSS from your theme or module.'),
                        'validation' => 'isGenericName',
                        'type' => 'select',
                        'identifier' => 'id',
                        'list' => $arr
                    ),
                    'vc_include_modules' => array(
                        'title' => $this->l('Include Modules'),
                        'desc' => $this->l('You can include modules by putting modules name here(e.g. blockcms) to be appear in visual composer shortcodes list. Put a module name per line.'),
                        'type' => 'textarea',
                        'identifier' => 'id',
                        'rows' => 7,
                        'cols' => 7,
                    ),
                    'vc_exclude_modules' => array(
                        'title' => $this->l('Exclude Modules'),
                        'desc' => $this->l('You can exclude modules by putting modules name here(e.g. blockcms) to be removed from visual composer shortcodes list. Put a module name per line.'),
                        'type' => 'textarea',
                        'identifier' => 'id',
                        'rows' => 7,
                        'cols' => 7,
                    ),
//                    'vc_custom_hook' => array(
//                        'title' => $this->l('Custom Hook'),
//                        'desc' => $this->l('Put custom hook name per line.'),
//                        'type' => 'textarea',
//                        'identifier' => 'id',
//                        'rows' => 7,
//                        'cols' => 7,
//                    ),
                ),
                'submit' => array('title' => $this->l('Save'))
            ),
        );
//    ksort($this->fields_options['email']['fields']);
    }

    public function initPageHeaderToolbar() {
        parent::initPageHeaderToolbar();

        $this->page_header_toolbar_btn['import_tinymcejs'] = array(
            'href' => self::$currentIndex . '&action=importtinymce&token=' . $this->token,
            'desc' => $this->l('Import Tinymce', null, null, false),
            'icon' => 'process-icon-import'
        );
    }

    public function renderList() {

        $custom_hook = unserialize(Configuration::get('vc_custom_hook'));
        $hook_list = array();
        if (!empty($custom_hook)) {
            foreach ($custom_hook as $inc) {
                $inc = trim($inc);
                $hook_list[] = $inc;
            }
        }
        
        //checking if update is available------------------
      if (Tools::isSubmit('check_update')) {
        $jsComposerObject = vc_manager();
        $jscomposer_key = Configuration::get('jscomposer_purchase_key', false);
		if(empty($jscomposer_key)){
			$jscomposer_key = 'empty';
		}
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'http://smartdatasoft.net/verify/',
            CURLOPT_USERAGENT => 'Smartdatasoft cURL Request',
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => array(
                'purchase_key' => $jscomposer_key,
                'operation' => 'check_update',
                'domain' => $_SERVER['HTTP_HOST'],
                'module' => $jsComposerObject->name,
                'version' => $jsComposerObject->version
            )
        ));
        $resp = curl_exec($curl);
        curl_close($curl);

        $respAarray = (array) Tools::jsonDecode($resp);
        if (!empty($respAarray)) {
            if ($respAarray['status'] == 1) {
                $latest_version =  $respAarray['current_version'];
                $update_details = '<div class="active-status update-available pull-right">'
                    . '<i class="icon-refresh"></i> Update Available'
                    . '</div>';
                $update_disable = '';
				Configuration::updateValue('jscomposer_new_version', $latest_version);
            }
            $message = $this->l($respAarray['msg']);
            $jsComposerObject->adminDisplayWarning(html_entity_decode($message));
        }  
    }
        //checking if update is available------------------






        $css = "
            <style>
            .active-status {
            background: #e74c3c;
            padding: 5px 18px;
            font-size: 17px;
            border-radius: 4px;
            color: white;
            font-weight: bold;
            margin: -17px 0px 17px 0px;
            }
            .activated {
            background: #27ae60; 
            }
            .not-activated {
            background: #e74c3c; 
            }
            .update-available{
            background: #e67e22; 
            }
            .reminder-msg{
                font-size: 13px;
                margin: 10px 0px;
            }
            .update-msg{
               font-weight: bold;
                font-size: 13px;
                padding: 7px 0px;
            }
            .code-helper{
            margin: 35px 0px 10px 0px;
            font-size: 13px;
            }
            </style>
    ";
        $jscomposer_status = Configuration::get('jscomposer_status', '0');
        if ($jscomposer_status == '1') {
            $activation_details = $css . '<div class="active-status activated pull-right">'
                    . '<i class="icon-check-circle-o"></i> Module Activated'
                    . '</div>';
            $disable_status = 'disabled';
            $below_message = '<div class="reminder-msg">In order to register your purchase code on another domain, deregister it first by clicking the button below.</div>';
            $active_button = "";
            $deactive_button = "<input type='submit' value='DeActivate' name='deactivateVc' id ='deactivateVc' class='btn btn-primary' />";
        } else {
            $activation_details = $css . '<div class="active-status not-activated pull-right">'
                    . '<i class="icon-ban"></i> Not Activated'
                    . '</div>';
            $disable_status = '';
            $below_message = '<div class="reminder-msg" >Reminder ! One registration per Website. If registered elsewhere please deactivate that registration first.</div>';

            $active_button = "<input type='submit' value='Activate' name='activateVc' id ='activateVc' class='btn btn-primary' />";
            $deactive_button = "";
        }

        $purchase_key = Configuration::get('jscomposer_purchase_key', '');
        $html = "<form method='post' action='' name='lisenceForm'>";

        $html .="<div class='row'>"
                . "<div class='col-md-6'>"
                . "<div class='panel' style='max-width:550px;'>"
                . "<div class='panel-heading'>Module Activation</div>"
                . "<div class='panel-body'>"
                . $activation_details
                . "<div class='code-helper'><i class='icon-credit-card'></i> You can learn how to find your purchase key <a target='_blank' href='http://www.themepunch.com/faq/where-to-find-the-purchase-code/'>here</a></div>"
                . "<input $disable_status type='text' name='purchase_key' value='" . $purchase_key . "' class='form-control' id='purchase_key' />";
        if ($disable_status == 'disabled') {
            $html .= "<input type='hidden' name='purchase_key' value='" . $purchase_key . "' />";
        }                   

        $jsComposerObject = JsComposer::$instance;
        $update_disable = '';
        if(!isset($latest_version)){
            $latest_version= Configuration::get('jscomposer_new_version', $jsComposerObject->version);
        }
        if($jscomposer_status != '1'){
            $update_disable= "disabled";
        }
		if(Tools::version_compare($latest_version, $jsComposerObject->version, '>')){
			$update_details = '<div class="active-status update-available pull-right">'
                    . '<i class="icon-refresh"></i> Update Available'
                    . '</div>';
        }elseif(!isset($update_details)){
            $update_details = '<div class="active-status activated pull-right">'
                    . '<i class="icon-check-circle-o"></i> Module is up-to-date'
                    . '</div>';
        }
        
        $html .= $below_message;
        $html .= $active_button;
        $html .= $deactive_button
                . "</div>"
                . "</div>"
                . "</div>"
                . "<div class='col-md-6'>"
                . "<div class='panel' style='max-width:550px; '>"
                . "<div class='panel-heading'>Module Updates</div>"
                . "<div class='panel-body'>"
                . $update_details
                . "<h4>Installed Version</h4>"
                . "<div>".$jsComposerObject->version."</div>"
                . "<h4>Latest Available Version</h4>"
                . "<div>".$latest_version."</div>"
                . "<div style='margin-bottom:10px;margin-top:10px;'><input type='submit' value='Check for Updates' name='check_update' id ='check_update' class='btn btn-default' /></div>"
                . "<input $update_disable type='submit' value='Update' name='updateVc' id ='updateVc' class='btn btn-primary' />"
                . "</div>"
                . "</div>"
                . "</div>"
                . "</div>";

        $html .= "</form>";
        $html .= '<div class="panel">';

        $html .='<div class="panel-heading" >
            Custom Hook <span class="badge">' . count($hook_list) . '</span>
                <span class="panel-heading-action" style="width: 121px; font-size: 18px;">
                              <a id="desc-image_type-new" href="#" data-toggle="modal" data-target="#myModal">
                            <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Add new Hook" data-html="true" data-placement="top">
                                <i class="process-icon-new" style="margin-left: -72px;
    font-size: 20px;"> Add New Hook</i>
                            </span> 
                        </a>
      
                    </div>
                    ';




        $html .='<div class="table-responsive-row clearfix">';
        //-----------

        $html .='<table class="table">';
        $html .='<thead>';
        $html .='<tr class="nodrag nodrop"> ';
        $html .='<th class="fixed-width-xs">';
        $html .='<span class="title_box active">Hook Name</span>';
        $html .='</th> ';
        $html .='<th class="fixed-width-xs center">';
        $html .='<span class="title_box active">Description</span>';
        $html .='</th> ';
        $html .=' <th class="fixed-width-xs"> ';
        $html .=' </th>';
        $html .='</tr>';
        $html .=' </thead>';
        $html .='<tbody >';
        foreach ($hook_list as $inc) {
            $url = $_SERVER['REQUEST_URI'] . '&deleteCustomHook=' . $inc;
            $html .='<tr> ';
            $html .=' <td class=" fixed-width-xs"> ';
            $html .= $inc;
            $html .='</td> ';
            $html .=' <td class=" fixed-width-xs"> ';
            $html .= 'This block is attached to custom hook. To display it in .tpl file use:<strong> {hook h="' . $inc . '"}</strong>';
            $html .='</td> ';
            $html .='<td  class="">  ';
            $html .='<div class="btn-group pull-right">';
            $html .=' <a href="' . $url . '" class="btn btn-default confirm-delete" title="Delete" class="confirm-delete">';
            $html .='  <i class="icon-trash"></i> Delete';
            $html .=' </a>';
            $html .=' </div>    ';
            $html .='  </td>';
            $html .=' </tr>';
        }
        if (empty($hook_list)) {
            $html .=' <tr>';
            $html .='<td class="list-empty" colspan="3">';
            $html .=' <div class="list-empty-msg">';
            $html .='<i class="icon-warning-sign list-empty-icon"></i>';
            $html .='   No records found';
            $html .=' </div>';
            $html .='  </td>';
            $html .='</tr> ';
        }
        $html .='  </tbody>';
        $html .=' </table>  ';

        //---------
        $html .='</div></div>';
        $html .='  
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <form method="post" action="">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add new hook</h4>
      </div>
      <div class="modal-body">
        <p>Put custom hook name</p>
        
        <input type="text" name="vc_custom_hook">
        
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-default value="submit" name="customhookadd" >
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
</form>
  </div>
</div>';

        $html.='<script type="text/javascript">
    $(document).ready(function () {


        $(".confirm-delete").click(function () {
            if (confirm(\'Delete the Custom hook?\')) {
                return true;
            } else {
                return false;
            }
        });
    });
</script>';

        return $html;
    }

    public function initContent() {


        if (Tools::isSubmit('deactivateVc')) {

            $jsComposerObject = JsComposer::$instance;
            Configuration::updateValue('jscomposer_purchase_key', Tools::getValue('purchase_key'));
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_URL => 'http://smartdatasoft.net/verify/',
                CURLOPT_USERAGENT => 'Smartdatasoft cURL Request',
                CURLOPT_POST => 1,
                CURLOPT_POSTFIELDS => array(
                    'purchase_key' => Tools::getValue('purchase_key'),
                    'operation' => 'deactivate',
                    'domain' => $_SERVER['HTTP_HOST'],
                    'module' => $jsComposerObject->name,
                    'version' => $jsComposerObject->version,
                     'theme_name' => basename(_THEME_DIR_)
                )
            ));
            $resp = curl_exec($curl);

            curl_close($curl);

            $respAarray = (array) Tools::jsonDecode($resp);
            if (!empty($respAarray)) {

                if ($respAarray['status'] == 1) {
                    Configuration::updateValue('jscomposer_status', '0');
                    $message = $this->l($respAarray['msg']);
                    $jsComposerObject->adminDisplayWarning(html_entity_decode($message));
                }
            } else {
                $message = $this->l('Error while deactivating');
                $jsComposerObject->adminDisplayWarning(html_entity_decode($message));
            }
            
        }
        
        if (Tools::isSubmit('activateVc')) {
            $jsComposerObject = JsComposer::$instance;
            Configuration::updateValue('jscomposer_purchase_key', Tools::getValue('purchase_key'));

            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_URL => 'http://smartdatasoft.net/verify/',
                CURLOPT_USERAGENT => 'Smartdatasoft cURL Request',
                CURLOPT_POST => 1,
                CURLOPT_POSTFIELDS => array(
                    'purchase_key' => Tools::getValue('purchase_key'),
                    'operation' => 'activate',
                    'domain' => $_SERVER['HTTP_HOST'],
                    'module' => $jsComposerObject->name,
                    'version' => $jsComposerObject->version,
                     'theme_name' => basename(_THEME_DIR_)
                )
            ));
            $resp = curl_exec($curl);
            curl_close($curl);


            // die($respAarray['msg']);
            $respAarray = (array) Tools::jsonDecode($resp);
            if (!empty($respAarray)) {
                $message = $this->l($respAarray['msg']);
                $jsComposerObject->adminDisplayWarning(html_entity_decode($message));
                if ($respAarray['status'] == 1) {
                    Configuration::updateValue('jscomposer_status', '1');
                }
            } else {
                $message = $this->l("Activation error");
                $jsComposerObject->adminDisplayWarning(html_entity_decode($message));
            }
        }
        if (Tools::isSubmit('updateVc')) {
            $jsComposerObject = JsComposer::$instance;
            Configuration::updateValue('jscomposer_purchase_key', Tools::getValue('purchase_key'));
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_URL => 'http://smartdatasoft.net/verify/',
                CURLOPT_USERAGENT => 'Smartdatasoft cURL Request',
                CURLOPT_POST => 1,
                CURLOPT_POSTFIELDS => array(
                    'purchase_key' => Tools::getValue('purchase_key'),
                    'operation' => 'update',
                    'domain' => $_SERVER['HTTP_HOST'],
                    'module' => $jsComposerObject->name,
                    'version' => $jsComposerObject->version
                )
            ));
            $resp = curl_exec($curl);
            curl_close($curl);

            $respAarray = (array)Tools::jsonDecode($resp);
            if (!empty($respAarray)){
                if ($respAarray['status'] == 1 && isset($respAarray['archive']) && !empty($respAarray['archive'])){
				
                    $file = base64_decode($respAarray['archive']);
                    $new = _PS_MODULE_DIR_ . 'jscomposer/jscomposer.zip';
					
                    //    header('Content-Description: File Transfer');
                    //    header('Content-Type: application/octet-stream');
                    //    header('Content-Disposition: attachment; filename='.basename($file));
                    //    header('Expires: 0');
                    //    header('Cache-Control: must-revalidate');
                    //    header('Pragma: public');
                    //    header('Content-Length: ' . filesize($file));
                    //    ob_clean();
                    //    flush();
                    //    readfile($file);
                    //    exit;
					// I am new code...

                    file_put_contents($new, $file);

                    $zip = new ZipArchive;
                    if ($zip->open($new) === TRUE) {
                        $zip->extractTo(_PS_MODULE_DIR_);
                        $zip->close();
						@unlink($new);
                        $url = Context::getContext()->link->getAdminLink('AdminModules');
                        Tools::redirectAdmin($url);
                    }
                } else {
                    $message = $this->l($respAarray['msg']);
                    $jsComposerObject->adminDisplayWarning(html_entity_decode($message));
                }
            } else {
                $message = $this->l('Error while updating');
                $jsComposerObject->adminDisplayWarning(html_entity_decode($message));
            }
        }


        if (isset($_REQUEST['deleteCustomHook'])) {
            $deleteCustomHook = $_REQUEST['deleteCustomHook'];
            if ($deleteCustomHook != '') {

                $old_hook_list = unserialize(Configuration::get('vc_custom_hook'));

                if ($old_hook_list == '') {
                    $old_hook_list = array();
                }

//                foreach($old_hook_list as $key => $hook){
//                    if(in_array($deleteCustomHook, $old_hook_list)){
//                        unset($old_hook_list[$key]);
//                    } 
//                }
                $key = array_search($deleteCustomHook, $old_hook_list);

                unset($old_hook_list[$key]);

                $updated_hook_list = serialize($old_hook_list);
                Configuration::updateValue('vc_custom_hook', $updated_hook_list);
                $mod_obj = Module::getInstanceByName('jscomposer');
                $id_hook = Hook::getIdByName($deleteCustomHook);
                $mod_obj->unregisterHook($id_hook);

                $url = $this->context->link->getAdminLink('AdminJsComposerSetting', true);
                Tools::redirectAdmin($url);
            }
        }

        if (Tools::isSubmit('customhookadd')) {
            $old_hook_list = unserialize(Configuration::get('vc_custom_hook'));

            if (isset($old_hook_list) && ($old_hook_list == '')) {
                $old_hook_list = array();
            }
            $new_hook = Tools::getValue('vc_custom_hook');

            if (in_array($new_hook, $old_hook_list)) {
                $new_hook = '';
            } else {
                $old_hook_list[] = $new_hook;
            }


            $updated_hook_list = serialize($old_hook_list);
            Configuration::updateValue('vc_custom_hook', $updated_hook_list);
            if ($new_hook != '') {
                //$new_hook_list = explode("\n", $new_hook_list);
//            foreach ($new_hook_list as $inc) {
                $inc = trim($new_hook);

                $mod_obj = Module::getInstanceByName('jscomposer');
                $mod_obj->registerHook($inc);
//            }
            }
        }

        parent::initContent();
    }

//    public function beforeUpdateOptions()
//    {
//       // echo $_SERVER['REQUEST_URI'];die();
//        $old_hook_list = unserialize(Configuration::get('vc_custom_hook'));
//        
//        if($old_hook_list==''){
//            $old_hook_list = array();
//        }
//        $new_hook = Tools::getValue('vc_custom_hook');
//        
//        if(in_array($new_hook, $old_hook_list)){
//            $new_hook='';
//        }else{
//            $old_hook_list[] = $new_hook;
//        }
//
//          
//        $updated_hook_list=  serialize($old_hook_list); 
//        Configuration::updateValue('vc_custom_hook', $updated_hook_list);
//        
////        $old_hook_list = array();
//       // $new_hook_list = array();
//
//       // $hook_remove_list = array();
//
////        if (!empty($old_hook)) {
////            $old_hook = explode("\n", $old_hook);
////            foreach ($old_hook as $inc) {
////                $inc = trim($inc);
////                $old_hook_list [] = $inc;
////            }
////        }
//
//        
////        if (!empty($new_hook)) {
////            $new_hook = explode("\n", $new_hook);
////            foreach ($new_hook as $inc) {
////                $inc = trim($inc); 
////                if(!in_array($inc, $old_hook_list)){
////                    $old_hook_list []= $inc;
////                    $new_hook_list[] = $inc;
////                } 
////            }
////        }
//// 
//      
//       // var_dump($new_hook_list);die();
////        $hook_remove_list = array_diff($new_hook_list, $old_hook_list);
//        /*
//          print_r($new_hook_list );
//          print_r($old_hook_list );
//          print_r($hook_remove_list );
//         */
////        foreach ($hook_remove_list as $handle) {
////            $handle = trim($handle);
////
////            $mod_obj = Module::getInstanceByName('jscomposer');
////            $id_hook = Hook::getIdByName($handle);
////            $mod_obj->unregisterHook($id_hook);
////        }
//        //print_r(Configuration::get('vc_custom_hook'));
//        if ($new_hook!='') {
//            //$new_hook_list = explode("\n", $new_hook_list);
////            foreach ($new_hook_list as $inc) {
//                $inc = trim($new_hook);
//
//                $mod_obj = Module::getInstanceByName('jscomposer');
//                $mod_obj->registerHook($inc);
////            }
//        }
//        // $_POST['vc_custom_hook'] =  $fonts;
//    }

    public function initHeader() {
        if (Tools::getValue('action') == 'importtinymce') {
            JsComposer::installTinymce(false);
            $redirect = $this->context->link->getAdminLink('AdminJsComposerSetting') . '&importsuccess=true';
            Tools::redirectAdmin($redirect);
        }
        parent::initHeader();
    }

}
