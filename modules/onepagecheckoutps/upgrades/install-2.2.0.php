<?php
/**
 * We offer the best and most useful modules PrestaShop and modifications for your online store.
 *
 * We are experts and professionals in PrestaShop
 *
 * @category  PrestaShop
 * @category  Module
 * @author    PresTeamShop.com <support@presteamshop.com>
 * @copyright 2011-2016 PresTeamShop
 * @license   see file: LICENSE.txt
 */

function upgrade_module_2_2_0($object)
{
    $object = $object;

    $name_tab = array();
    $languages = Language::getLanguages(false);
    foreach ($languages as $lang) {
        $name_tab[$lang['id_lang']] = 'AdminActionsOPC';
    }

    $tab = new Tab();
    $tab->class_name = 'AdminActionsOPC';
    $tab->module = 'onepagecheckoutps';
    $tab->name = $name_tab;
    $tab->save();

    return true;
}
