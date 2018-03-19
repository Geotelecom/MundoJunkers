<?php

/*
 * 2007-2013 PrestaShop 
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 *         DISCLAIMER   *
 * *************************************** */
/* Do not edit or add to this file if you wish to upgrade Prestashop to newer
 * versions in the future.
 * ****************************************************
 * @category   Belvg
 * @package    Belvg_SampleModule
 * @author    Alexander Simonchik <support@belvg.com>
 * @site    
 * @copyright  Copyright (c) 2010 - 2013 BelVG LLC. (http://www.belvg.com)
 * @license    http://store.belvg.com/BelVG-LICENSE-COMMUNITY.txt 
 */
//include_once(dirname(__FILE__).'/../aveproductsvideo.php');

class ProductGPRModel extends ObjectModel
{
    /** @var string Name */
    public $id_product_google_rating;
        
    /** @var integer */
    public $id_product;
    
    /** @var integer */
    public $rating_value;
    public $rating_count;
    public $from_comments_module;
    public $rating_disabled;
    
    /*public $video1;
    public $video2;
    public $video3;
    public $video4;*/
    
    /**
     * @see ObjectModel::$definition
     */
    public static $definition = array(
        'table' => 'product_google_rating',
        'primary' => 'id_product_google_rating',
        'multilang' => FALSE,
        'fields' => array(
            'id_product' => array('type' => self::TYPE_INT, 'validate' => 'isInt', 'required' => TRUE),
            'rating_value' =>  array('type' => self::TYPE_FLOAT, 'validate' => 'isFloat', 'required' => false),
            'rating_count' =>  array('type' => self::TYPE_INT, 'validate' => 'isInt', 'required' => false),
            'from_comments_module' =>  array('type' => self::TYPE_BOOL, 'validate' => 'isBool', 'required' => false),
            'rating_disabled' =>  array('type' => self::TYPE_BOOL, 'validate' => 'isBool', 'required' => false),

            /*'video1' =>  array('type' => self::TYPE_STRING, 'validate' => 'isUrl', 'required' => false, 'size' => 255),
            'video2' =>  array('type' => self::TYPE_STRING, 'validate' => 'isUrl', 'required' => false, 'size' => 255),
            'video3' =>  array('type' => self::TYPE_STRING, 'validate' => 'isUrl', 'required' => false, 'size' => 255),
            'video4' =>  array('type' => self::TYPE_STRING, 'validate' => 'isUrl', 'required' => false, 'size' => 255),*/
        ),
    );
    
    public static function loadByIdProduct($id_product){
        $result = Db::getInstance()->getRow('
            SELECT *
            FROM `'._DB_PREFIX_.'product_google_rating` 
            WHERE `id_product` = '.(int)$id_product
        );
              
        return new ProductGPRModel($result['id_product_google_rating']);
    }
    /*public static function getYoutubeIdFromUrl($url)
    {
        parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
        return (!empty($my_array_of_vars['v']))?$my_array_of_vars['v']:'';
    }*/
}
