<?php

/**
 * Export Products
 * @category export
 *
 * @author Oavea - Oavea.com
 * @copyright Oavea / PrestaShop
 * @license http://www.opensource.org/licenses/osl-3.0.php Open-source licence 3.0
 * @version 2.5.3
 */
class AdminExportProductsController extends ModuleAdminController
{

    public $available_fields;

    public function __construct()
    {
        $this->bootstrap = true;

        $this->meta_title = $this->l('Export Products');
        parent::__construct();
        if (!$this->module->active) {
            Tools::redirectAdmin($this->context->link->getAdminLink('AdminHome'));
        }

        $this->available_fields = array(
            'id' => array('label' => 'ID'),
            'active' => array('label' => 'Activo (0/1)'),
            'name' => array('label' => 'Nombre'),
            'categories' => array('label' => 'Categorías (x,y,z...)'),
            'price_tex' => array('label' => 'Precio sin IVA'),
            'price_tin' => array('label' => 'Precio con IVA'),
            'id_tax_rules_group' => array('label' => 'ID regla de impuestos'),
            'wholesale_price' => array('label' => 'Precio al por mayor'),
            'on_sale' => array('label' => 'En rebaja (0/1)'),
            'reduction_price' => array('label' => 'Valor del descuento'),
            'reduction_percent' => array('label' => 'Porcentaje del descuento'),
            'reduction_from' => array('label' => 'Descuento desde (aaaa-mm-dd)'),
            'reduction_to' => array('label' => 'Descuento hasta (aaaa-mm-dd)'),
            'reference' => array('label' => 'Referencia n.'),
            'supplier_reference' => array('label' => 'N. de referencia proveedor'),
            'supplier_name' => array('label' => 'Proveedor'),
            'manufacturer_name' => array('label' => 'Fabricante'),
            'ean13' => array('label' => 'EAN13'),
            'upc' => array('label' => 'UPC'),
            'ecotax' => array('label' => 'Ecotasa'),
            'width' => array('label' => 'Ancho'),
            'height' => array('label' => 'Alto'),
            'depth' => array('label' => 'Profundidad'),
            'weight' => array('label' => 'Peso'),
            'quantity' => array('label' => 'Cantidad'),
            'minimal_quantity' => array('label' => 'Cantidad mínima'),
            'visibility' => array('label' => 'Visible en'),
            'additional_shipping_cost' => array('label' => 'Coste adicional del envío'),
            'unity' => array('label' => 'Unidad para el precio unitario'),
            'unit_price' => array('label' => 'Precio unitario'),
            'description_short' => array('label' => 'Descripción corta'),
            'description' => array('label' => 'Descripción'),
            'tags' => array('label' => 'Etiquetas (x,y,z...)'),
            'meta_title' => array('label' => 'Meta title'),
            'meta_keywords' => array('label' => 'Meta palabras clave'),
            'meta_description' => array('label' => 'Meta descripción'),
            'link_rewrite' => array('label' => 'Enlace reescrito'),
            'available_now' => array('label' => 'Texto para cuando está disponible'),
            'available_later' => array('label' => 'Texto para cuando se permiten pedidos en espera'),
            'available_for_order' => array('label' => 'Disponible para pedidos (0 = No, 1 = Sí)'),
            'available_date' => array('label' => 'Fecha de disponibilidad del producto'),
            'date_added' => array('label' => 'Fecha de creación del producto'),
            'show_price' => array('label' => 'Mostrar Precio (0 = No, 1 = Sí)'),
            'image' => array('label' => 'URLs de las imágenes (x,y,z...)'),
            'delete_existing_images' => array(
                'label' => 'Elimine las imágenes existentes (0 = No, 1 = Sí)'
            ),
            'features' => array('label' => 'Característica (Nombre:Valor:Posición:Personalizado)'),
            'online_only' => array('label' => 'Sólo disponible por internet (0 = No, 1 = Sí)'),
            'condition' => array('label' => 'Condición'),
            'customizable' => array('label' => 'Personalizable (0 = No, 1 = Sí)'),
            'uploadable_files' => array('label' => 'Se pueden subir ficheros (0 = No, 1 = Sí)'),
            'text_fields' => array('label' => 'Campos de texto (0 = No, 1 = Sí)'),
            'out_of_stock' => array('label' => 'Cuando no haya existencias'),
            'shop' => array(
                'label' => 'ID / Nombre de la tienda',
                'help' => 'Ignorar este campo si no tienes una Multitienda. Si lo dejas vacío la tienda por defecto se utilizará',
            ),
            'advanced_stock_management' => array(
                'label' => 'Gestor avanzado de inventario',
                'help' => 'Activar Control de Stock avanzado en el producto (0 = No, 1 = Sí).',
            ),
            'depends_on_stock' => array(
                'label' => 'Dependiendo del stock',
                'help' => '0 = Usar cantidad usada en el producto, 1 = Usar cantidad del almacen.',
            ),
            'warehouse' => array(
                'label' => 'Almacén',
                'help' => 'ID del almacén para guardar.'
            ),
        );

    }

    public function renderView()
    {

        return $this->renderConfigurationForm();

    }

    public function renderConfigurationForm()
    {
        $lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
        $langs = Language::getLanguages();
        $id_shop = (int)$this->context->shop->id;

        foreach ($langs as $key => $language) {
            $options[] = array('id_option' => $language['id_lang'], 'name' => $language['name']);
        }

        $cats = $this->getCategories(
            $lang->id,
            true,
            $id_shop
        );

        $pricetax = array(
            array('id_option' => 'price_tin', 'name' => 'Precio con IVA'),
            array('id_option' => 'price_tex', 'name' => 'Precio sin IVA')
        );

        $categories[] = array('id_option' => 99999, 'name' => 'Todas');

        foreach ($cats as $key => $cat) {
            $categories[] = array('id_option' => $cat['id_category'], 'name' => $cat['name']);
        }

        $inputs = array(
            array(
                'type' => 'select',
                'label' => $this->l('Idioma'),
                'desc' => $this->l('Seleccione idioma a exportar'),
                'name' => 'export_language',
                'class' => 't',
                'options' => array(
                    'query' => $options,
                    'id' => 'id_option',
                    'name' => 'name'
                ),
            ),
            array(
                'type' => 'text',
                'label' => $this->l('Delimitador'),
                'name' => 'export_delimiter',
                'value' => ';',
                'desc' => $this->l('El carácter que separará en el archivo cada campo')
            ),
            array(
                'type' => 'radio',
                'label' => $this->l('¿Exportar productos activos?'),
                'name' => 'export_active',
                'values' => array(
                    array('id' => 'active_off', 'value' => 0, 'label' => 'No, exportar todos los productos.'),
                    array('id' => 'active_on', 'value' => 1, 'label' => 'Sí, exportar sólo productos activos'),
                ),
                'is_bool' => true,
            ),
            array(
                'type' => 'select',
                'label' => $this->l('Categoría Productos'),
                'desc' => $this->l('Seleccione la categoría de productos que quiere exportar'),
                'name' => 'export_category',
                'class' => 't',
                'options' => array(
                    'query' => $categories,
                    'id' => 'id_option',
                    'name' => 'name'
                ),
            ),
        );


        $pricetintex = array(
            array(
                'type' => 'select',
                'label' => $this->l('Precio con IVA o sin IVA'),
                'desc' => $this->l('Seleccione si quiere el precio del producto con o sin IVA.'),
                'name' => 'export_tax',
                'class' => 't export_tax',
                'options' => array(
                    'query' => $pricetax,
                    'id' => 'id_option',
                    'name' => 'name'
                )
            )
        );
        $inputs = array_merge(
            $inputs,
            $pricetintex
        );


        $fields_form = array(
            'form' => array(
                'legend' => array(
                    'title' => $this->l('Opciones de Exportación'),
                    'icon' => 'icon-cogs'
                ),
                'input' => $inputs,
                'submit' => array(
                    'title' => $this->l('Exportar'),
                )
            ),
        );

        $helper = new HelperForm();
        $helper->show_toolbar = false;

        $helper->default_form_language = $lang->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get(
            'PS_BO_ALLOW_EMPLOYEE_FORM_LANG'
        ) : 0;
        $this->fields_form = array();
        $helper->identifier = $this->identifier;
        $helper->submit_action = 'submitExport';
        $helper->currentIndex = self::$currentIndex;
        $helper->token = Tools::getAdminTokenLite('AdminExportProducts');
        $helper->tpl_vars = array(
            'fields_value' => $this->getConfigFieldsValues(),
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id
        );

        return $helper->generateForm(array($fields_form));
    }


    public function getConfigFieldsValues()
    {
        return array(
            'export_active' => false,
            'export_category' => 'all',
            'export_delimiter' => ';',
            'export_language' => (int)Configuration::get('PS_LANG_DEFAULT'),
            'export_tax' => 'price_tin'
        );
    }

    public function postProcess()
    {

        if (Tools::isSubmit('submitExport')) {
            $delimiter = Tools::getValue('export_delimiter');
            $id_lang = Tools::getValue('export_language');
            $id_shop = (int)$this->context->shop->id;

            set_time_limit(0);
            $fileName = 'products_' . date("Y_m_d_H_i_s") . '.csv';
            header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
            header('Content-Description: File Transfer');
            header("Content-type: text/csv");
            header("Content-Disposition: attachment; filename={$fileName}");
            header("Expires: 0");
            header("Pragma: public");
            echo "\xEF\xBB\xBF";

            $f = fopen(
                'php://output',
                'w'
            );

            $export_tax = Tools::getValue('export_tax');
            if ($export_tax == 'price_tin') {
                unset($this->available_fields['price_tex']);
            } elseif ($export_tax == 'price_tex') {
                unset($this->available_fields['price_tin']);
            }


            foreach ($this->available_fields as $field => $array) {
                $titles[] = $array['label'];
            }

            fputcsv(
                $f,
                $titles,
                $delimiter,
                '"'
            );

            $export_active = (Tools::getValue('export_active') == 0 ? false : true);
            $export_category = (Tools::getValue('export_category') == 99999 ? false : Tools::getValue(
                'export_category'
            ));

            $products = Product::getProducts(
                $id_lang,
                0,
                0,
                'id_product',
                'ASC',
                $export_category,
                $export_active
            );


        


            foreach ($products as $product) {
                $line = array();
                $p = new Product(
                    $product['id_product'],
                    true,
                    $id_lang,
                    $id_shop
                );

                /*echo '<pre>';
                var_dump($p);
                exit;*/

                $p->loadStockData();
                foreach ($this->available_fields as $field => $array) {
                    if (isset($p->$field) && !is_array($p->$field)) {
                        $line[$field] = $p->$field ? $p->$field : '';
                    } else {
                        switch ($field) {
                            case 'categories':

                                $cats = $p->getProductCategoriesFull(
                                    $p->id,
                                    $id_lang
                                );
                                $cat_array = array();
                                foreach ($cats as $cat) {
                                    $cat_array[] = $cat['name'];
                                }

                                $line['categories'] = implode(
                                    ",",
                                    $cat_array
                                );
                                break;
                            case 'price_tex':
                            case 'price_tin':
                                $line['price_tex'] = $p->getPrice(
                                    false,
                                    null,
                                    2,
                                    null,
                                    false,
                                    false,
                                    1
                                );
                                $line['price_tin'] = $p->getPrice(
                                    true,
                                    null,
                                    2,
                                    null,
                                    false,
                                    false,
                                    1
                                );


                                if ($export_tax == 'price_tin') {
                                    unset($line['price_tex']);
                                } else {
                                    unset($line['price_tin']);
                                }

                                break;
                            case 'upc':
                                $line['upc'] = $p->upc ? $p->upc : ' ';

                                break;
                            case 'features':
                                $line['features'] = '';
                                $features = $p->getFrontFeatures($id_lang);
                                $position = 1;
                                $features_array = array();
                                foreach ($features as $feature) {
                                    array_push(
                                        $features_array,
                                        $feature['name'] . ':' . $feature['value'] . ':' . $position . ':1'
                                    );
                                    $position++;
                                }
                                $line['features'] = implode(
                                    ',',
                                    $features_array
                                );

                                break;
                            case 'reduction_price':
                                $specificPrice = SpecificPrice::getSpecificPrice(
                                    $p->id,
                                    $id_shop,
                                    0,
                                    0,
                                    0,
                                    0
                                );

                                $line['reduction_price'] = '';
                                $line['reduction_percent'] = '';
                                $line['reduction_from'] = '';
                                $line['reduction_to'] = '';

                                if ($specificPrice['reduction_type'] == 'amount') {
                                    $line['reduction_price'] = $specificPrice['reduction'];
                                } elseif ($specificPrice['reduction_type'] == 'percentage') {
                                    $line['reduction_percent'] = $specificPrice['reduction'] * 100;
                                }

                                if ($line['reduction_price'] != '' || $line['reduction_percent'] != '') {
                                    if ($specificPrice['from'] != '0000-00-00 00:00:00') {
                                        if(method_exists(new Tools, 'date_format')) {
                                            $line['reduction_from'] = Tools::date_format(
                                                date_create($specificPrice['from']),
                                                'Y-m-d'
                                            );
                                        } else {
                                            $date = Tools::dateFormat(array(
                                                      'date' => date_create($specificPrice['from'])), $this->context->smarty);
                                            $line['reduction_from'] = $date->format('Y-m-d');
                                        }
                                    }

                                    if ($specificPrice['to'] != '0000-00-00 00:00:00') {
                                        if(method_exists(new Tools, 'date_format')) {
                                            $line['reduction_to'] = Tools::date_format(
                                                date_create($specificPrice['to']),
                                                'Y-m-d'
                                            );
                                        } else {
                                            $date = Tools::dateFormat(array(
                                                      'date' => date_create($specificPrice['to'])), $this->context->smarty);
                                            $line['reduction_to'] = $date->format('Y-m-d');
                                        }

                                    }

                                }


                                break;
                            case 'tags':
                                $tags = $p->getTags($id_lang);

                                $line['tags'] = $tags;

                                break;
                            case 'image':

                                $link = new Link();
                                $imagelinks = array();
                                $images = $p->getImages($id_lang);
                                foreach ($images as $image) {
                                    $imagelinks[] = Tools::getShopProtocol() . $link->getImageLink(
                                            $p->link_rewrite,
                                            $p->id . '-' . $image['id_image']
                                        );
                                }
                                $line['image'] = implode(
                                    ",",
                                    $imagelinks
                                );

                                break;
                            case 'delete_existing_images':
                                $line['delete_existing_images'] = 0;

                                break;
                            case 'shop':
                                $line['shop'] = $id_shop;

                                break;
                            case 'warehouse':
                                $warehouses = Warehouse::getWarehousesByProductId($p->id);
                                $line['warehouse'] = '';
                                if (!empty($warehouses)) {
                                    $line['warehouse'] = implode(
                                        ',',
                                        array_map(
                                            array($this, 'getWarehouses'),
                                            $warehouses
                                        )
                                    );
                                }

                                break;
                            case 'date_added':
                                $date = new DateTime($p->date_add);
                                $line['date_add'] = $date->format("Y-m-d");
                                break;
                        }
                    }
                }

                if (!array_key_exists(
                    $field,
                    $line
                )
                ) {
                    $line[$field] = '';
                }

                fputcsv(
                    $f,
                    $line,
                    $delimiter,
                    '"'
                );
            }
            fclose($f);
            die();
        }
    }

    public function initContent()
    {
        $this->content = $this->renderView();
        parent::initContent();
    }

    public function getWarehouses($id_warehouses)
    {
        return $id_warehouses['id_warehouse'];
    }

    public function getCategories(
        $id_lang,
        $active,
        $id_shop
    ) {
        $result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS(
            '
			SELECT *
			FROM `' . _DB_PREFIX_ . 'category` c
			LEFT JOIN `' . _DB_PREFIX_ . 'category_lang` cl ON c.`id_category` = cl.`id_category`
			WHERE ' . ($id_shop ? 'cl.`id_shop` = ' . (int)$id_shop : '') . ' ' . ($id_lang ? 'AND `id_lang` = ' . (int)$id_lang : '') . '
			' . ($active ? 'AND `active` = 1' : '') . '
			' . (!$id_lang ? 'GROUP BY c.id_category' : '') . '
			ORDER BY c.`level_depth` ASC, c.`position` ASC'
        );

        return $result;
    }
}
