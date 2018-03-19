<?php
/*
 * 2007-2015 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http:* If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http:*
 *  @author PrestaShop SA <contact@prestashop.com>
 *  @copyright  2007-2015 PrestaShop SA
 *  @license    http:*  International Registered Trademark & Property of PrestaShop SA
 */
class CategoryController extends CategoryControllerCore {
    /*
    * module: jscomposer
    * date: 2016-02-09 03:58:59
    * version: 4.3.13
    */
    public function initContent() {
        $description = $this->category->description;
        parent::initContent();
        if (Module::isInstalled('jscomposer') && (bool) Module::isEnabled('jscomposer')) {
            $this->context->smarty->assign(
                array(
                    'description_short' => JsComposer::do_shortcode($description),
                )
            );
            $this->category->description = JsComposer::do_shortcode($description);
        }
        if (Module::isInstalled('smartshortcode') && (bool) Module::isEnabled('smartshortcode')) {
            
            $this->context->smarty->assign(
                array(
                    'description_short' => smartshortcode::do_shortcode($description),                
                )
            );
            $this->category->description = smartshortcode::do_shortcode($description);            
        }
    }
}
