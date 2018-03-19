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

function upgrade_module_2_2_1($object)
{
    $json_networks = $object->jsonDecode(Configuration::get('OPC_SOCIAL_NETWORKS'));

    $json_networks->facebook->class_icon = 'fa-pts-facebook';
    $json_networks->google->class_icon = 'fa-pts-google';

    Configuration::updateValue('OPC_SOCIAL_NETWORKS', $object->jsonEncode($json_networks));

    if (file_exists(dirname(__FILE__).'/../lib/upload_update.php')) {
        unlink(dirname(__FILE__).'/../lib/upload_update.php');
    }
    if (file_exists(dirname(__FILE__).'/../log/get_logs.php')) {
        unlink(dirname(__FILE__).'/../log/get_logs.php');
    }
    if (file_exists(dirname(__FILE__).'/../actions.php')) {
        unlink(dirname(__FILE__).'/../actions.php');
    }

    return true;
}
