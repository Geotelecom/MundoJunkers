<?php
/**
 * We offer the best and most useful modules PrestaShop and modifications for your online store.
 *
 * We are experts and professionals in PrestaShop
 *
 * @category  PrestaShop
 * @category  Module
 * @author    PresTeamShop.com <support@presteamshop.com>
 * @copyright 2011-2015 PresTeamShop
 * @license   see file: LICENSE.txt
 */

$files = glob(dirname(__FILE__).'/*.log', GLOB_BRACE);
foreach ($files as $file) {
    echo basename($file).'</br>';
}