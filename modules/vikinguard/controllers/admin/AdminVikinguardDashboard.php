<?php
/**
 * ©2015 Heimdalapm
 *
 * @author    http://heimdalapm.com
 * @copyright Copyright (C) 2015 heimdalapm.com <@info@heimdalapm.com>
 *            All rights reserved.
 * @license   http://vikinguard.com/heimdal/EULA.html
 */

class AdminVikinguardDashboardController extends ModuleAdminController
{
    public function __construct()
    {
        $this->bootstrap = true;
        $this->display = 'view';
        $this->meta_title = $this->l('Your Merchant Expertise');

        parent::__construct();

    }

    public function initContent()
    {

        $this->context->smarty->assign(array('version'=>Configuration::get('HEIMDALAPM_VERSION'),'email'=>Configuration::get('HEIMDALAPM_EMAIL'),'password'=>Configuration::get('HEIMDALAPM_PASSWORD')));
        $this->setTemplate('vikinguardiframe.tpl');
    }
    public function createTemplate($tpl_name)
    {
    // $this->override_folder = Tools::toUnderscoreCase(substr($this->controller_name, 5)).'/';
        error_log($this->getTemplatePath().$this->override_folder.$tpl_name.$this->viewAccess());
        if (file_exists($this->getTemplatePath().$this->override_folder.$tpl_name)&&$this->viewAccess()) {
            
            return $this->context->smarty->createTemplate($this->getTemplatePath().$this->override_folder.$tpl_name, $this->context->smarty);
        }
        return parent::createTemplate($tpl_name);
    }

/**
* Get path to back office templates for the module
*
* @return string
*/
    public function getTemplatePath()
    {
        return _PS_MODULE_DIR_.$this->module->name.'/views/templates/admin/';
    }
}
