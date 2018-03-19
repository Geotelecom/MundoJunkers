<?php
/**
 * Google Category Rating module for Prestashop by Avellana Digital
 *
 * @author    Avellana Digital SL
 * @copyright Copyright (c) 2017 Avellana Digital - www.avellanadigital.com
 * @license   Commercial license
 * @version    1.0.0
 */

class CategoryGCRModel extends ObjectModel
{
    /** @var string Name */
    public $id_category_google_rating;

    /** @var integer */
    public $id_category;

    /** @var integer */
    public $rating_value;
    public $rating_count;
    public $from_comments_module;
    public $rating_disabled;


    /** @see ObjectModel::$definition */
    public static $definition = array(
                'table' => 'category_google_rating',
                'primary' => 'id_category_google_rating',
                'multilang' => false,
                'fields' => array(
                    'id_category' => array('type' => self::TYPE_INT, 'validate' => 'isInt', 'required' => true),
                    'rating_value' =>  array('type' => self::TYPE_FLOAT, 'validate' => 'isFloat', 'required' => false),
                    'rating_count' =>  array('type' => self::TYPE_INT, 'validate' => 'isInt', 'required' => false),
                    'from_comments_module' =>  array(
                        'type' => self::TYPE_BOOL,
                        'validate' => 'isBool',
                        'required' => false),
                    'rating_disabled' =>  array('type' => self::TYPE_BOOL, 'validate' => 'isBool', 'required' => false)
                    ),
                );

    public static function loadByIdCategory($id_category)
    {
        $result = Db::getInstance()->getRow('SELECT * FROM `'._DB_PREFIX_.'category_google_rating`
            WHERE `id_category` = '.(int)$id_category);

        return new CategoryGCRModel($result['id_category_google_rating']);
    }
}
