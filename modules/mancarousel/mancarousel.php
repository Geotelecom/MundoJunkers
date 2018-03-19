<?php

/*
 * Man Carousel v1.3.1.
 *
 * @author kik-off.com <info@kik-off.com>
 */

if (!defined('_PS_VERSION_')) {
    exit;
}

class ManCarousel extends Module
{
    private $_html = '';
    private $user_groups;
    private $hide_form;

    public function __construct()
    {
        $this->name = 'mancarousel';
        $this->tab = 'front_office_features';
        $this->version = '1.3.1';
        $this->author = 'kik-off';
        $this->need_instance = 0;
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Man Carousel');
        $this->description = $this->l('Smooth manufacturer carousel.');
        $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);

        $this->mancarousel = $this->getManCarouselConfig();
    }

    public function install()
    {
        Configuration::updateValue('MAN_CAROUSEL', serialize(array(2, 'small_default', 6000, 1, 1, 1, 1, 1, 'scroll', 500, 1, 1, 0)));

        if (parent::install() == false
            or !$this->registerHook('displayHeader')
            or !$this->registerHook('displayTop')
            or !$this->registerHook('displayTopColumn')
            or !$this->registerHook('displayHome')
	    or !$this->registerHook('displayHomeTab')
	    or !$this->registerHook('displayHomeTabContent')
            or !$this->registerHook('displayFooter')
            or !$this->registerHook('actionObjectManufacturerUpdateAfter')
            or !$this->registerHook('actionObjectManufacturerDeleteAfter')
            or !$this->registerHook('actionObjectManufacturerAddAfter')
        ) {
            return false;
        }

        return true;
    }

    public function uninstall()
    {
        if (parent::uninstall() == false ||
            !Configuration::deleteByName('MAN_CAROUSEL')
        ) {
            return false;
        }

        return true;
    }

    public function getContent()
    {
        if (Tools::isSubmit('manCarouselFormSubmit')) {
            $hook = Tools::getValue('hook');
            $type = Tools::getValue('type');
            $time = Tools::getValue('time');
            $start = Tools::getValue('start');
            $random = Tools::getValue('random');
            $circular = Tools::getValue('circular');
            $infinite = Tools::getValue('infinite');
            $mouseover_pause = Tools::getValue('mouseover_pause');
            $fx = Tools::getValue('fx');
            $fx_time = Tools::getValue('fx_time');
            $grayscale = Tools::getValue('grayscale');
            $nb_products = Tools::getValue('nb_products');
            $nb = Tools::getValue('nb');

            if (Configuration::updateValue('MAN_CAROUSEL', serialize(array((int) $hook, $type, (int) $time, (int) $start, (int) $random, (int) $circular, (int) $infinite, (int) $mouseover_pause, $fx, (int) $fx_time, (int) $grayscale, (int) $nb_products, (int) $nb)))) {
                $this->clearCache();
                Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'&conf=4');
            }
        }

        $this->_html .= '<style type="text/css">#imprint{width:100%;text-align:right;}#imprint-logo{float:left;}#imprint-logo img{vertical-align:top;}</style>';

        $helper = $this->initForm();
        $helper->fields_value = $this->mancarousel;

        $this->_html .= $helper->generateForm($this->fields_form);

        $this->_html .= '
        <div id="imprint" class="panel">
            <span id="imprint-logo"><a href="http://kik-off.com" target="_blank" title="http://kik-off.com"><img src="' . $this->_path . 'img/logo_kik_off.gif" alt="" /></a> ' . $this->displayName . ' v' . $this->version . '</span>
            <span id="imprint-text">' . $this->l('Module by') . ': <a href="http://kik-off.com" target="_blank" title="http://kik-off.com">kik-off.com</a>, <a href="mailto:support@kik-off.com">support@kik-off.com</a></span>
        </div>';

        return $this->_html;
    }

    protected function initForm()
    {
        $default_lang = (int) Configuration::get('PS_LANG_DEFAULT');

        $fx_options = array(
            array('value' => 'none','name' => $this->l('None')),
            array('value' => 'scroll','name' => $this->l('Scroll')),
            array('value' => 'directscroll','name' => $this->l('Direct scroll')),
            array('value' => 'fade','name' => $this->l('Fade')),
            array('value' => 'crossfade','name' => $this->l('Crossfade')),
            array('value' => 'cover','name' => $this->l('Cover')),
            array('value' => 'cover-fade','name' => $this->l('Cover fade')),
            array('value' => 'uncover','name' => $this->l('Uncover')),
            array('value' => 'uncover-fade','name' => $this->l('Uncover fade')),
        );

        $this->fields_form[0]['form'] = array(
            'legend' => array(
                'title' => $this->displayName,
                'icon' => 'icon-cogs',
            ),
            'input' => array(
                array(
                    'type' => 'radio',
                    'label' => $this->l('Display in'),
                    'name' => 'hook',
                    'hint' => $this->l('Select the hook where you want to display the block.'),
                    'values' => array(
                        array(
                            'id' => 'hook_0',
                            'value' => 0,
                            'label' => $this->l('Top'),
                        ),
                        array(
                            'id' => 'hook_3',
                            'value' => 3,
                            'label' => $this->l('Top column'),
                        ),
                        array(
                            'id' => 'hook_1',
                            'value' => 1,
                            'label' => $this->l('Home'),
                        ),
                        array(
                            'id' => 'hook_2',
                            'value' => 2,
                            'label' => $this->l('Footer'),
                        ),
                    ),
                ),
                array(
                    'type' => 'select',
                    'label' => $this->l('Select image type'),
                    'name' => 'type',
                    'class' => 'chosen',
                    'options' => array(
                        'query' => ImageType::getImagesTypes('manufacturers'),
                        'id' => 'name',
                        'name' => 'name',
                    ),
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->l('Grayscale logos'),
                    'name' => 'grayscale',
                    'values' => array(
                        array(
                            'id' => 'grayscale_on',
                            'value' => 1,
                            'label' => $this->l('Enabled'),
                        ),
                        array(
                            'id' => 'grayscale_off',
                            'value' => 0,
                            'label' => $this->l('Disabled'),
                        ),
                    ),
                    'is_bool' => true,
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->l('Products quantity'),
                    'name' => 'nb_products',
                    'values' => array(
                        array(
                            'id' => 'nb_products_on',
                            'value' => 1,
                            'label' => $this->l('Enabled'),
                        ),
                        array(
                            'id' => 'nb_products_off',
                            'value' => 0,
                            'label' => $this->l('Disabled'),
                        ),
                    ),
                    'is_bool' => true,
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Maximum items to load'),
                    'name' => 'nb',
                    'class' => 'fixed-width-sm',
                    'hint' => $this->l('Set the maximum number of manufacturers that can be loaded. Set to "0" to disable this feature.'),
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->l('Auto start'),
                    'name' => 'start',
                    'values' => array(
                        array(
                            'id' => 'start_on',
                            'value' => 1,
                            'label' => $this->l('Enabled'),
                        ),
                        array(
                            'id' => 'start_off',
                            'value' => 0,
                            'label' => $this->l('Disabled'),
                        ),
                    ),
                    'is_bool' => true,
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Paused'),
                    'name' => 'time',
                    'class' => 'fixed-width-sm',
                    'hint' => $this->l('The amount of milliseconds the carousel will pause if autostart is enabled.'),
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->l('Random'),
                    'name' => 'random',
                    'values' => array(
                        array(
                            'id' => 'random_on',
                            'value' => 1,
                            'label' => $this->l('Enabled'),
                        ),
                        array(
                            'id' => 'random_off',
                            'value' => 0,
                            'label' => $this->l('Disabled'),
                        ),
                    ),
                    'is_bool' => true,
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->l('Circular'),
                    'name' => 'circular',
                    'hint' => $this->l('Determines whether the carousel should be circular.'),
                    'values' => array(
                        array(
                            'id' => 'circular_on',
                            'value' => 1,
                            'label' => $this->l('Enabled'),
                        ),
                        array(
                            'id' => 'circular_off',
                            'value' => 0,
                            'label' => $this->l('Disabled'),
                        ),
                    ),
                    'is_bool' => true,
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->l('Infinite'),
                    'name' => 'infinite',
                    'hint' => $this->l('Determines whether the carousel should be infinite. Note: It is possible to create a non-circular, infinite carousel, but it is not possible to create a circular, non-infinite carousel.'),
                    'values' => array(
                        array(
                            'id' => 'infinite_on',
                            'value' => 1,
                            'label' => $this->l('Enabled'),
                        ),
                        array(
                            'id' => 'infinite_off',
                            'value' => 0,
                            'label' => $this->l('Disabled'),
                        ),
                    ),
                    'is_bool' => true,
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->l('Mouseover pause'),
                    'name' => 'mouseover_pause',
                    'values' => array(
                        array(
                            'id' => 'mouseover_pause_on',
                            'value' => 1,
                            'label' => $this->l('Enabled'),
                        ),
                        array(
                            'id' => 'mouseover_pause_off',
                            'value' => 0,
                            'label' => $this->l('Disabled'),
                        ),
                    ),
                    'is_bool' => true,
                ),
                array(
                    'type' => 'select',
                    'label' => $this->l('Transition'),
                    'name' => 'fx',
                    'class' => 'chosen',
                    'options' => array(
                        'query' => $fx_options,
                        'id' => 'value',
                        'name' => 'name',
                    ),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Duration'),
                    'name' => 'fx_time',
                    'class' => 'fixed-width-sm',
                    'hint' => $this->l('Duration of the transition in milliseconds'),
                ),
            ),
            'submit' => array(
                'title' => $this->l('Save'),
            ),
        );

        $helper = new HelperForm();
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->default_form_language = $default_lang;
        $helper->allow_employee_form_lang = $default_lang;
        $helper->title = $this->displayName;
        $helper->submit_action = 'manCarouselFormSubmit';
        $helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->name;

        return $helper;
    }

    private function getManCarouselConfig()
    {
        $getConfig = unserialize(Configuration::get('MAN_CAROUSEL'));

        $mancarousel = array();
        $mancarousel['hook'] = $getConfig[0];
        $mancarousel['type'] = $getConfig[1];
        $mancarousel['time'] = (int) $getConfig[2];
        $mancarousel['start'] = (int) $getConfig[3];
        $mancarousel['random'] = (int) $getConfig[4];
        $mancarousel['circular'] = (int) $getConfig[5];
        $mancarousel['infinite'] = (int) $getConfig[6];
        $mancarousel['mouseover_pause'] = (int) $getConfig[7];
        $mancarousel['fx'] = $getConfig[8];
        $mancarousel['fx_time'] = (int) $getConfig[9];
        $mancarousel['grayscale'] = (int) $getConfig[10];
        $mancarousel['nb_products'] = (int) $getConfig[11];
        $mancarousel['nb'] = (int) $getConfig[12];

        return $mancarousel;
    }

    public function clearCache()
    {
        $this->_clearCache('mancarousel.tpl');
    }

    public function hookActionObjectManufacturerUpdateAfter($params)
    {
        $this->clearCache();
    }

    public function hookActionObjectManufacturerDeleteAfter($params)
    {
        $this->clearCache();
    }

    public function hookActionObjectManufacturerAddAfter($params)
    {
        $this->clearCache();
    }

    public function hookHeader($params)
    {
        $this->context->controller->addCSS($this->_path.'css/'.$this->name.'.css', 'all');
        $this->context->controller->addJS($this->_path.'js/jquery.carouFredSel-6.2.1-packed.js');
        $this->context->controller->addJS($this->_path.'js/jquery.ba-throttle-debounce.min.js');
        $this->context->controller->addJS($this->_path.'js/'.$this->name.'.js');
    }

    private function _createManCarousel()
    {
        if (!$this->isCached('mancarousel.tpl', $this->getCacheId())) {
            if ($this->mancarousel['nb'] > 0) {
                $manufacturers = Manufacturer::getManufacturers(true, (int) $this->context->language->id, true, 1, $this->mancarousel['nb']);
            } else {
                $manufacturers = Manufacturer::getManufacturers(true, (int) $this->context->language->id);
            }

            $mancarousel_items = array();

            foreach ($manufacturers as $key => $manufacturer) {
                if (file_exists(_PS_MANU_IMG_DIR_.$manufacturer['id_manufacturer'].'-'.$this->mancarousel['type'].'.jpg') && $manufacturer['nb_products'] > 0) {
                    $mancarousel_items[$key]['name'] = $manufacturer['name'];
                    $mancarousel_items[$key]['link'] = $this->context->link->getmanufacturerLink($manufacturer['id_manufacturer'], $manufacturer['link_rewrite']);
                    $mancarousel_items[$key]['nb_products'] = $manufacturer['nb_products'];
                    $mancarousel_items[$key]['img_src'] = $this->context->link->getMediaLink(_PS_IMG_.'m/'.$manufacturer['id_manufacturer'].'-'.$this->mancarousel['type'].'.jpg');
                } else {
                    unset($manufacturer);
                }
            }

            $mancarousel_items = array_values($mancarousel_items);

            $image_size = Image::getSize($this->mancarousel['type']);

            Media::addJsDef(
                array(
                    'mancarousel_circular' => (bool)$this->mancarousel['circular'],
                    'mancarousel_infinite' => (bool)$this->mancarousel['infinite'],
                    'mancarousel_start' => (bool)$this->mancarousel['start'],
                    'mancarousel_time' => $this->mancarousel['time'],
                    'mancarousel_fx' => $this->mancarousel['fx'],
                    'mancarousel_fx_time' => $this->mancarousel['fx_time'],
                    'mancarousel_mouseover_pause' => (bool)$this->mancarousel['mouseover_pause'],
                    'mancarousel_image_size' => $image_size,
                )
            );

            $this->context->smarty->assign(array(
                'PS_DISPLAY_SUPPLIERS' => Configuration::get('PS_DISPLAY_SUPPLIERS'),
                'mancarousel' => $this->mancarousel,
                'image_size' => $image_size,
                'mancarousel_items' => $mancarousel_items,
            ));
        }

        return true;
    }

    public function hookDisplayTopColumn($params)
    {
        if ($this->mancarousel['hook'] == 3) {
            $this->_createManCarousel();

            return $this->display(__FILE__, 'mancarousel.tpl', $this->getCacheId());
        }
    }

    public function hookDisplayFooter($params)
    {
        if ($this->mancarousel['hook'] == 2) {
            $this->_createManCarousel();

            return $this->display(__FILE__, 'mancarousel.tpl', $this->getCacheId());
        }
    }

    public function hookDisplayHomeTab($params)
    {
    }

    public function hooDisplayHomeTabContent($params)
    {
	return $this->hookDisplayHome($params);
    }

    public function hookDisplayHome($params)
    {
        if ($this->mancarousel['hook'] == 1) {
            $this->_createManCarousel();

            return $this->display(__FILE__, 'mancarousel.tpl', $this->getCacheId());
        }
    }

    public function hookDisplayTop($params)
    {
        if ($this->mancarousel['hook'] == 0) {
            $this->_createManCarousel();

            return $this->display(__FILE__, 'mancarousel.tpl', $this->getCacheId());
        }
    }
}
