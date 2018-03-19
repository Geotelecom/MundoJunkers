<?php
define("SCRAPPER_SERVER", "http://www.scrapingprecios.com/public/");

if (!defined('_PS_VERSION_'))  exit;

class AveScrapper extends Module {



  /*
  *
  */
  public function __construct() 
  {
      $this->name                   = 'avescrapper';
      $this->tab                    = 'others';
      $this->version                = '1.0.0';
      $this->author                 = 'Avellana Digital';
      $this->need_instance          = 0;
      $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
      $this->bootstrap              = true;
      $this->context                = Context::getContext();
      parent::__construct();
      $this->displayName            = $this->l('Avellana Digital: Comparador de productos');
      $this->description            = $this->l('Comparador de productos');
      $this->confirmUninstall       = $this->l('Are you sure you want to uninstall?');
  }



  /*
  *
  */
  public function install()
  {
     if (!parent::install()) return false;
    $this->CreateScrapperTabs();

    return true;
  }   



  /*
  *
  */
  public function uninstall() 
  {

      $tab4 = new Tab((int)Tab::getIdFromClassName('AdminScrapperMatching'));
      $tab4->delete();
      $tab3 = new Tab((int)Tab::getIdFromClassName('AdminScrapperInfo'));
      $tab3->delete();
      $tab1 = new Tab((int)Tab::getIdFromClassName('AdminScrapperSearch'));
      $tab1->delete();
      $tab2 = new Tab((int)Tab::getIdFromClassName('AdminScrapperDomain'));
      $tab2->delete();
      $tabMain = new Tab((int)Tab::getIdFromClassName('AdminScrapper'));
      $tabMain->delete();
      // Uninstall Module
      if (!parent::uninstall())
          return false;
      //        
      return true;
  }



  /*
  *
  */
  public function getContent () 
  {
    // Configuració
    $output = null;
    if (Tools::isSubmit('submit'.$this->name))
    {
        Configuration::updateValue('AVE_SCRAPPER_SERVER',   strval(Tools::getValue('AVE_SCRAPPER_SERVER')));
        Configuration::updateValue('AVE_SCRAPPER_EMAIL',    strval(Tools::getValue('AVE_SCRAPPER_EMAIL')));
        Configuration::updateValue('AVE_SCRAPPER_COMPANY',  strval(Tools::getValue('AVE_SCRAPPER_COMPANY')));
        Configuration::updateValue('AVE_SCRAPPER_TOKEN',    trim(strval(Tools::getValue('AVE_SCRAPPER_TOKEN'))));
        $output .= $this->displayConfirmation($this->l('Settings updated'));
    }
    //
    $server     = Configuration::get('AVE_SCRAPPER_SERVER');
    $email      = Configuration::get('AVE_SCRAPPER_EMAIL');
    $company    = Configuration::get('AVE_SCRAPPER_COMPANY');
    $token      = Configuration::get('AVE_SCRAPPER_TOKEN');
    //
    if ($server == "" || $email == "" || $company == "")
      $output .= $this->displayError($this->l('Missing fields in configuration.'));
    //
    if ($server != "" && $email != "" && $company != "" && $token == "")
    {
      // Sol·licitar el token
      $data["email"]    = $email;
      $data["company"]  = $company;
      $data_string      = json_encode($data);
      $ws               = '/ws/user/add';
      $server_url       = $server.$ws;
      $ch = curl_init($server_url);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
      curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
              'Content-Type: application/json',
              'Content-Length: ' . strlen($data_string))
      );
      //
      $result = curl_exec($ch);
      if($result === false)
      {
          $output .= $this->displayError($this->l('Error in token request: '.curl_error($ch)));
      }
      else
      {
          $result = json_decode($result);  
      }
      if (isset($result->status))
      {
        if ($result->status == "ok")
        {
          $output .= $this->displayConfirmation($this->l('The token has been sent to your email: '.$email));
        }
        else
        {
          $output .= $this->displayError($this->l('Error in token request, incorrect configuration.'));
        }
      }
      else
      {
        $output .= $this->displayError($this->l('Error in token request.'));
      }
    }
    //  
    return $output.$this->displayForm();
  }



  /*
  *
  */
  public function displayForm()
  {
    // Get default language
    $default_lang = (int)Configuration::get('PS_LANG_DEFAULT');
    // 
    // Init Fields form array
    $fields_form[0]['form'] = array(
            'legend' => array(
            'title' => $this->l('Settings'),
        ),
        'input' => array(
            array(
                'type' => 'text',
                'label' => $this->l('SERVER SCRAPPER'),
                'name' => 'AVE_SCRAPPER_SERVER',
                'size' => 20,
                'required' => true
            ),
            array(
                'type' => 'text',
                'label' => $this->l('E-MAIL'),
                'name' => 'AVE_SCRAPPER_EMAIL',
                'size' => 20,
                'required' => true
            ),
            array(
                'type' => 'text',
                'label' => $this->l('COMPANY'),
                'name' => 'AVE_SCRAPPER_COMPANY',
                'size' => 20,
                'required' => true
            ),
            array(
                'type' => 'text',
                'label' => $this->l('TOKEN'),
                'name' => 'AVE_SCRAPPER_TOKEN',
                'size' => 20,
                'desc' => 'If you do not have a token, when you save the data you will receive it by e-mail',
            )
        ),
        //
        'submit' => array(
            'title' => $this->l('Save'),
            'class' => 'btn btn-default pull-right'
        )
    );
    //     
    $helper = new HelperForm();
    // Module, token and currentIndex
    $helper->module = $this;
    $helper->name_controller = $this->name;
    $helper->token = Tools::getAdminTokenLite('AdminModules');
    $helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->name;
    // Language
    $helper->default_form_language = $default_lang;
    $helper->allow_employee_form_lang = $default_lang;
    // Title and toolbar
    $helper->title = $this->displayName;
    $helper->show_toolbar = true;        // false -> remove toolbar
    $helper->toolbar_scroll = true;      // yes - > Toolbar is always visible on the top of the screen.
    $helper->submit_action = 'submit'.$this->name;
    $helper->toolbar_btn = array(
        'save' =>
        array(
            'desc' => $this->l('Save'),
            'href' => AdminController::$currentIndex.'&configure='.$this->name.'&save'.$this->name.
            '&token='.Tools::getAdminTokenLite('AdminModules'),
        ),
        'back' => array(
            'href' => AdminController::$currentIndex.'&token='.Tools::getAdminTokenLite('AdminModules'),
            'desc' => $this->l('Back to list')
        )
    );
    //
    $server = Configuration::get('AVE_SCRAPPER_SERVER');
    if($server == "") $server = SCRAPPER_SERVER;
    $helper->fields_value['AVE_SCRAPPER_SERVER']    = $server;
    //
    $email = Configuration::get('AVE_SCRAPPER_EMAIL');
    if($email == "") $email = Configuration::get('PS_SHOP_EMAIL');
    $helper->fields_value['AVE_SCRAPPER_EMAIL']     = $email;
    //
    $company = Configuration::get('AVE_SCRAPPER_COMPANY');
    if($company == "") $company = Configuration::get('PS_SHOP_NAME');
    $helper->fields_value['AVE_SCRAPPER_COMPANY']   = $company;
    //
    $helper->fields_value['AVE_SCRAPPER_TOKEN']     = Configuration::get('AVE_SCRAPPER_TOKEN');
    //     
    return $helper->generateForm($fields_form);
  }



  /*
  *
  */
  private function CreateScrapperTabs()
  {
      $langs = Language::getLanguages();
      $id_lang = (int)Configuration::get('PS_LANG_DEFAULT');
      //
      $smarttab = new Tab();
      $smarttab->class_name = "AdminScrapper";
      $smarttab->module = "";
      $smarttab->id_parent = 0;
      foreach($langs as $l){
              $smarttab->name[$l['id_lang']] = $this->l('Comparator');
      }
      $smarttab->save();
      $tab_id = $smarttab->id;
      //
      $tabvalue = array(
          array(
              'class_name' => 'AdminScrapperDomain',
              'module' => 'avescrapper',
              'name' => $this->l('Domains'),
          ),
          array(
              'class_name' => 'AdminScrapperSearch',
              'module' => 'avescrapper',
              'name' => $this->l('Search'),
          ),
          array(
              'class_name' => 'AdminScrapperMatching',
              'module' => 'avescrapper',
              'name' => $this->l('Matching'),
          ),
          array(
              'class_name' => 'AdminScrapperInfo',
              'module' => 'avescrapper',
              'name' => $this->l('Information'),
          ),
      );
      //
      foreach ($tabvalue as $tab)
      {
          $newtab = new Tab();
          $newtab->class_name = $tab['class_name'];
          $newtab->id_parent = $tab_id;
          $newtab->module = $tab['module'];
          foreach ($langs as $l) {
              $newtab->name[$l['id_lang']] = $this->l($tab['name']);
          }
          $newtab->save();
      }
      return true;
  }



}
?>