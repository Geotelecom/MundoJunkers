<?php
class AdminScrapperDomainController extends AdminController {



/*
*
*/
public function __construct() 
{
        $this->context = Context::getContext();
        $this->bootstrap = true;
        parent::__construct();
}



/*
*
*/
public function display()
{
     $this->context->smarty->assign('content', $this->displaySearch());
     parent::display();   
}



/*
*
*/
function displaySearch()
{
    $c = "";
    ///////////////////////////////////////////////////////////
    // Verificar si estan les dades de configuració necesaria
    $server     = Configuration::get('AVE_SCRAPPER_SERVER');
    $email      = Configuration::get('AVE_SCRAPPER_EMAIL');
    $company    = Configuration::get('AVE_SCRAPPER_COMPANY');
    $token      = Configuration::get('AVE_SCRAPPER_TOKEN');
    if ($server == "" || $email == "" || $company == "" || $token == "")
    {
        $rutaconfig = AdminController::$currentIndex.'&controller=AdminModules&token='.Tools::getAdminTokenLite('AdminModules').'&configure=avescrapper&tab_module=others&module_name=avescrapper';
        $c .= $this->l('ERROR: Missing fields in configuration.') . "<BR/><a href='".$rutaconfig."'>" . $this->l('Check the module configuration.') . "</a>";
        return $c;
    }
    //////////////////////////////////////////////
    $default_lang = (int)Configuration::get('PS_LANG_DEFAULT');
    $action = strval(Tools::getValue('AVE_DOMAIN_ACTION'));
    //////////////////////////////////////////////


    //////////////////////////////////////////////
    //////////////////////////////////////////////
    // PLÀ I CONSULTES
    $id_plan                = "";
    $full_search            = "";
    $data["email"]          = $email;
    $data["token"]          = $token;
    $data_string            = json_encode($data);
    $ws                     = '/ws/plan/get';
    $server_url             = $server.$ws;
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
    //
    if($result === false)
    {
    }
    else
    {
        //
        $result = json_decode($result);
        if ($result->status == "ok")
        {
            $text_cm = "Monthly querys";
            $iso_code = $this->context->language->iso_code;
            if ($iso_code == "ca")
                $text_cm = "Consultes mensuals";
            if ($iso_code == "es")
                $text_cm = "Consultas mensuales";
            $id_plan         = $result->data->result->id_plan;
            $plan_name       = $result->data->result->plan_name;
            $act_consultes   = $result->data->result->act_consultes;
            $max_consultes   = $result->data->result->max_consultes;
            $full_search     = $result->data->result->full_search;
            if ($id_plan != "")
            {
                //$c .= "<div class='panel' style='text-align:right;'>";
                //$c .= "".$plan_name." - <B>".$text_cm.":</B> ".$act_consultes." / ".$max_consultes."";
                //$c .= "</div>";
            }
        }
    }
    //////////////////////////////////////////////
    //////////////////////////////////////////////


    //////////////////////////////////////////////
    //////////////////////////////////////////////
    // TAX (DOMAIN)
    if ($action == "changedtax")
    {
        //////////////////////////////////////////////
        // Dades
        $data["email"]          = $email;
        $data["token"]          = $token;
        $data["id_domain"]      = strval(Tools::getValue('did'));
        $data["tax_included"]   = strval(Tools::getValue('tax'));
        $data_string            = json_encode($data);
        $ws                     = '/ws/domain/tax';
        $server_url             = $server.$ws;
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
        //
        if($result === false)
        {
            $c .= $this->l('Error in update tax request: '.curl_error($ch));
        }
        else
        {
            $result = json_decode($result);
        }
        if (isset($result->status))
        {
            if ($result->status == "ok")
            {
                /**/
            }
            else
            {
                echo "Error in update tax request, incorrect configuration.";
                exit();
            }
        }
        else
        {
            echo "Error in update tax request.";
            exit();
        }
    }
    //////////////////////////////////////////////
    //////////////////////////////////////////////


    //////////////////////////////////////////////
    //////////////////////////////////////////////
    // TAX TYPE (DOMAIN)
    if ($action == "changedtaxtype")
    {
        //////////////////////////////////////////////
        // Dades
        $data["email"]          = $email;
        $data["token"]          = $token;
        $data["id_domain"]      = strval(Tools::getValue('did'));
        $data["tax_type"]       = strval(Tools::getValue('tax'));
        $data_string            = json_encode($data);
        $ws                     = '/ws/domain/taxtype';
        $server_url             = $server.$ws;
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
        //
        if($result === false)
        {
            $c .= $this->l('Error in update tax request: '.curl_error($ch));
        }
        else
        {
            $result = json_decode($result);
        }
        if (isset($result->status))
        {
            if ($result->status == "ok")
            {
                /**/          
            }
            else
            {
                echo "Error in update tax request, incorrect configuration.";
                exit();
            }
        }
        else
        {
            echo "Error in update tax request.";
            exit();
        }
    }
    //////////////////////////////////////////////
    //////////////////////////////////////////////


    //////////////////////////////////////////////
    //////////////////////////////////////////////
    // ESBORAR UNA MANUAL URL
    if (isset($_GET["AVE_SCRAPPER_ND_ACTION"]) && isset($_GET["id_manual_url"]))
    {
        if ($_GET["AVE_SCRAPPER_ND_ACTION"] == "delete_manual_url" && $_GET["id_manual_url"] != "")
        {
            //////////////////////////////////////////////
            // Fem la crida CURL
            $email          = Configuration::get('AVE_SCRAPPER_EMAIL');
            $token          = Configuration::get('AVE_SCRAPPER_TOKEN');
            // eliminar manual url
            $data["email"]          = $email;
            $data["token"]          = $token;
            $data["id_manual_url"]  = $_GET["id_manual_url"];
            $data_string      = json_encode($data);
            $ws               = '/ws/domain/removeurl';
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
            //
            //$c .= $result."<BR/>";
            //
            if($result === false)
            {
              $c .= $this->l('Error in remove manual url request: '.curl_error($ch));
            }
            else
            {
              $result = json_decode($result);  
            }
            if (isset($result->status))
            {
                if ($result->status == "ok")
                {
                    $c .= $this->l('Manual url removed');
                }
                else
                {
                  $c .= $this->l('Error in remove manual url request.');
                }
            }
            else
            {
                $c .= $this->l('Error in remove manual url request.');
            }
            //////////////////////////////////////////////
        }
    }
    //////////////////////////////////////////////
    //////////////////////////////////////////////



    //////////////////////////////////////////////
    // ESBORAR UN DOMNI
    if (isset($_GET["AVE_SCRAPPER_ND_ACTION"]) && isset($_GET["url_domain"]))
    {
        if ($_GET["AVE_SCRAPPER_ND_ACTION"] == "delete_domain" && $_GET["url_domain"] != "")
        {
            // Fem la crida CURL
            $email          = Configuration::get('AVE_SCRAPPER_EMAIL');
            $token          = Configuration::get('AVE_SCRAPPER_TOKEN');
            $url_domain     = urldecode($_GET["url_domain"]);
            if ($url_domain == "")
            {
                $c .= $this->l('Error in url domain, empty field');
            }
            else
            {
                //////////////////////////////////////////////
                //////////////////////////////////////////////
                // eliminar el domini
                $data["email"]          = $email;
                $data["token"]          = $token;
                $data["domain_url"]     = $url_domain;
                $data_string      = json_encode($data);
                $ws               = '/ws/domain/remove';
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
                  $c .= $this->l('Error in remove domain request: '.curl_error($ch));
                }
                else
                {
                  $result = json_decode($result);  
                }
                if (isset($result->status))
                {
                    if ($result->status == "ok")
                    {
                        $c .= $this->l('Domain removed');
                    }
                    else
                    {
                      $c .= $this->l('Error in remove domain request.');
                    }
                }
                else
                {
                    $c .= $this->l('Error in remove domain request.');
                }
                //////////////////////////////////////////////
                //////////////////////////////////////////////
            }
        }
    }
    //////////////////////////////////////////////


    //////////////////////////////////////////////
    // SUBMIT 1
    if (Tools::isSubmit('submit'.$this->name))
    {
        // Mirar si es vol crear un nou domini
        $action =  strval(Tools::getValue('AVE_SCRAPPER_ND_ACTION'));
        if ($action == "new_domain")
        {
            $email                  = Configuration::get('AVE_SCRAPPER_EMAIL');
            $token                  = Configuration::get('AVE_SCRAPPER_TOKEN');
            $domain_name            = strval(Tools::getValue('AVE_SCRAPPER_ND_NAME'));
            $domain_url             = strval(Tools::getValue('AVE_SCRAPPER_ND_URL'));
            $domain_sitemap         = strval(Tools::getValue('AVE_SCRAPPER_ND_SITEMAP'));
            $domain_tax_included    = strval(Tools::getValue('AVE_SCRAPPER_ND_TAX_INCLUDED'));
            $domain_tax_type        = strval(Tools::getValue('AVE_SCRAPPER_ND_TAX_TYPE'));
            if ($domain_name == "" || $domain_url == "")
            {
                $c .= $this->l('Error in new domain request, empty fields');
            }
            else
            {
                //////////////////////////////////////////////
                //////////////////////////////////////////////
                // Afegir el domini
                $data["email"]                  = $email;
                $data["token"]                  = $token;
                $data["domain_name"]            = $domain_name;
                $data["domain_url"]             = $domain_url;
                $data["domain_sitemap"]         = $domain_sitemap;
                $data["domain_tax_included"]    = $domain_tax_included;
                $data["domain_tax_type"]        = $domain_tax_type;
                //
                $data_string      = json_encode($data);
                $ws               = '/ws/domain/add';
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
                  $c .= $this->l('Error in new domain request: '.curl_error($ch));
                }
                else
                {
                  $result = json_decode($result);  
                }
                if (isset($result->status))
                {
                    if ($result->status == "ok")
                    {
                        $c .= $this->l('New domain Added');
                    }
                    else
                    {
                      $c .= $this->l('Error in new domain request.');
                    }
                }
                else
                {
                    $c .= $this->l('Error in new domain request.');
                }
                //////////////////////////////////////////////
                //////////////////////////////////////////////
            }
        }
    }
    //////////////////////////////////////////////
    //////////////////////////////////////////////
    // Recuperar la llista de dominis disponibles
    $listdomains      = array();
    $data["email"]    = $email;
    $data["token"]    = $token;
    $data_string      = json_encode($data);
    $ws               = '/ws/domain/list';
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
    //
    //$c .= $result . "<BR/>";
    //
    if($result === false)
    {
      $c .= $this->l('Error in domain list request: '.curl_error($ch));
    }
    else
    {
      $result = json_decode($result);
    }
    if (isset($result->status))
    {
        if ($result->status == "ok")
        {
            $listdomains = $result->data->result;
        }
        else
        {
          $c .= $this->l('Error in domain list request, incorrect configuration.');
        }
    }
    else
    {
        $c .= $this->l('Error in domain list request.');
    }
    ///////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////
    // Recollim els tipus de taxa disponibles
    $listtaxtype = array();
    $data["email"]    = $email;
    $data["token"]    = $token;
    $data_string      = json_encode($data);
    $ws               = '/ws/taxtype/list';
    $server_url       = $server.$ws;
    $ch = curl_init($server_url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
          'Content-Type: application/json',
          'Content-Length: ' . strlen($data_string))
    );
    $result = curl_exec($ch);
    //
    //$c .= $result . "<BR/>";
    //
    if($result === false)
    {
      $c .= $this->l('Error in tax list request: '.curl_error($ch));
    }
    else
    {
      $result = json_decode($result);
    }
    if (isset($result->status))
    {
        if ($result->status == "ok")
        {
            $listtaxtype = $result->data->result;
        }
        else
        {
          $c .= $this->l('Error in tax list request, incorrect configuration.');
        }
    }
    else
    {
        $c .= $this->l('Error in tax list request.');
    }
    ///////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////
    // Formulari per afegir dominis
    $default_lang = (int)Configuration::get('PS_LANG_DEFAULT');
    $listtaxincluded = array();
    $listtaxincluded[] = array("id"=>"1","name"=>$this->l('yes'));
    $listtaxincluded[] = array("id"=>"0","name"=>$this->l('no'));
    // 
    // Init Fields form array
    $fields_form[0]['form'] = array(
            'legend' => array(
            'title' => $this->l('New Domain') .
            " <span style='color: #959595; text-transform:none;'>". 
            $this->l('(Add a web where to search for the products.)')
            ."</span>",
        ),
        'input' => array(
            array(
                'type'  => 'text',
                'label' => $this->l('Name'),
                'name'  => 'AVE_SCRAPPER_ND_NAME',
                'size'  => 20,
                'desc'  => $this->l('The name to identify the web.'),
                'required' => true
            ),
            array(
                'type'  => 'text',
                'label' => $this->l('URL'),
                'name'  => 'AVE_SCRAPPER_ND_URL',
                'size'  => 50,
                'desc'  => $this->l('The URL of the web, type: http://www.dominio.com'),
                'required' => true
            ),
            array(
                'type'  => 'text',
                'label' => $this->l('SITEMAP'),
                'name'  => 'AVE_SCRAPPER_ND_SITEMAP',
                'desc'  => $this->l('It is not mandatory, only if you know it, is the URL where the sitemap is, usually of type: http://www.domain.com/sitemap.xml'),
                'size'  => 50
            ),
            array(
                'type'  => 'select',
                'label' => $this->l('Tax included'),
                'options' => array(
                    'query' => $listtaxincluded,
                    'id' => 'id',
                    'name' => 'name'  
                  ),
                'name'  => 'AVE_SCRAPPER_ND_TAX_INCLUDED',
                'required' => true
            ),
            array(
                'type'  => 'select',
                'label' => $this->l('Tax type'),
                'options' => array(
                    'query' => $listtaxtype,
                    'id' => 'id',
                    'name' => 'name'  
                  ),
                'name'  => 'AVE_SCRAPPER_ND_TAX_TYPE',
                'required' => true
            ),
            array(
                'type'  => 'hidden',
                'name'  => 'AVE_SCRAPPER_ND_ACTION',
            )
        ),
        //
        'submit' => array(
            'title' => $this->l('Add Domain'),
            'class' => 'btn btn-default pull-right'
        )
    );
    //
    $helper = new HelperForm();
    // Module, token and currentIndex
    $helper->module = $this;
    $helper->name_controller = $this->name;
    $helper->token = Tools::getAdminTokenLite('AdminScrapperDomain');
    $helper->currentIndex = AdminController::$currentIndex.'&controller=AdminScrapperDomain&save';
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
            'href' => AdminController::$currentIndex.'&controller=AdminScrapperDomain&save'.$this->name.
            '&token='.Tools::getAdminTokenLite('AdminScrapperDomain'),
        )
    );
    $helper->fields_value['AVE_SCRAPPER_ND_ACTION']   = "new_domain";
    $c .= $helper->generateForm($fields_form);
    ///////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////








    
    ///////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////
    // Llistat de dominis disponibles
    $c .= "<div class='panel'>";
    $c .= "<div class='panel-heading'>".$this->l('Domains list').
    " <span style='color: #959595; text-transform:none;'>". 
    $this->l('(It is important that the number of products found is greater than 0, to be able to perform searches.)')
    ."</span>".
    "</div>";
    //
    ////////////////////////////////////////////////
    ////////////////////////////////////////////////
    // SCRIPT
    $rutachangedtax = AdminController::$currentIndex.'&controller=AdminScrapperDomain&token='.
    Tools::getAdminTokenLite('AdminScrapperDomain').'&AVE_DOMAIN_ACTION=changedtax';
    $rutachangedtaxtype = AdminController::$currentIndex.'&controller=AdminScrapperDomain&token='.
    Tools::getAdminTokenLite('AdminScrapperDomain').'&AVE_DOMAIN_ACTION=changedtaxtype';
    $sure_tax = "Are you sure you want to change tax?";
    $iso_code = $this->context->language->iso_code;
    if ($iso_code == "ca")
        $sure_tax = "Esteu segur que voleu canviar d\'impost?";
    if ($iso_code == "es")
        $sure_tax = "¿Seguro que quieres cambiar impuestos?";
    $c .= "<script>
    $( document ).ready(function() {

        ////////////////////////////////////////////
        // Delete
        $('a.btn-delete').on('click', function(e) {
            var link = this;
            e.preventDefault();
            var r = confirm('".$this->l('Are you sure you want to delete?')."');
            if (r == true) window.location = link.href; 
        });
        ////////////////////////////////////////////

        ///////////////////////////////////////////
        // Change Tax
        $('.sel_domain_tax').on('change', function() {
            var tax = this.value;
            var did = $(this).attr('did');
            var ruta = '".$rutachangedtax."&did='+did+'&tax='+tax;
            var r = confirm('".$sure_tax."');
            if (r == true) 
            {
                window.location = ruta; 
            }
        });
        ///////////////////////////////////////////

        ///////////////////////////////////////////
        // Change Tax Type
        $('.sel_domain_tax_type').on('change', function() {
            var tax = this.value;
            var did = $(this).attr('did');
            var ruta = '".$rutachangedtaxtype."&did='+did+'&tax='+tax;
            var r = confirm('".$sure_tax."');
            if (r == true) 
            {
                window.location = ruta; 
            }
        });
        ///////////////////////////////////////////

    });
    </script>";
    ////////////////////////////////////////////////
    ////////////////////////////////////////////////
    if (count($listdomains) == 0)
        $c .= $this->l('No assigned domains.');
    $c .= "<table class='table tableDnD' >";
    $c .= "<thead>";
    $c .= "<tr>";
        //$c .= "<th>".$this->l('Id')."</th>";
        $c .= "<th>".$this->l('Name')."</th>";
        $c .= "<th>".$this->l('Url')."</th>";
        $c .= "<th>".$this->l('Tax included')."</th>";
        $c .= "<th>".$this->l('Tax type')."</th>";
        $c .= "<th>".$this->l('Sitemap')."</th>";
        if ($full_search == "1") $c .= "<th>".$this->l('Pages')."</th>";
        if ($full_search == "1") $c .= "<th>".$this->l('Products')."</th>";
        $c .= "<th>".$this->l('Delete')."</th>";
    $c .= "</tr>";
    $c .= "</thead>";
    foreach ($listdomains as $ld) 
    {
        $c .= "<tbody>";
        $c .= "<tr>";
            //$c .= "<td>".$ld->id."</td>";
            $c .= "<td>".$ld->name."</td>";
            // URL
            $url = $ld->url;
            if ($url != "")
                $url = "<a href='https://anonym.to/?".$url."' target='_blank'>".$url."</a>";
            $c .= "<td>".$url."</td>";
            //////////////////////////////
            // tax_included
            $dti = $ld->tax_included;
            $sel = "";
            $c .= "<td>";
                $c .= "<SELECT style='width:70px;' class='sel_domain_tax' did='".$ld->id."'>";
                if ($dti == "") $sel = "selected"; else $sel = "";
                if ($dti == "1") $sel = "selected"; else $sel = "";
                $c .= "<option value='1' ".$sel.">".$this->l('Yes')."</option>";
                if ($dti == "0") $sel = "selected"; else $sel = "";
                $c .= "<option value='0' ".$sel.">".$this->l('No')."</option>";
                $c .= "</SELECT>";
            $c .= "</td>";
            //////////////////////////////
            $c .= "<td>";
            $c .= "<SELECT style='width:70px;' class='sel_domain_tax_type' did='".$ld->id."'>";
            foreach ($listtaxtype as $tt) 
            {
                $sel = "";
                if ($tt->id == $ld->tax_type) $sel = "selected";
                $c .= "<option value='".$tt->id."' ".$sel.">".$tt->percent."%</option>";
            }
            $c .= "</SELECT>";
            $c .= "</td>";
            //////////////////////////////
            $c .= "<td>";
            if(!empty($ld->sitemap))
            {
                $tmp_sitemap=array();
                $maps=explode(',',$ld->sitemap);
                foreach($maps as $m)
                {
                    $tmp_sitemap[]='<a href="https://anonym.to/?'.$m.'" target="_blank">'.$m.'</a>';
                }
                $c .= implode($tmp_sitemap,"<br />");
            } 
            else
            {
                $c .= "-";
            }      
            $c .= "</td>";
            if ($full_search == "1") $c .= "<td>".$ld->pages."</td>";
            if ($full_search == "1") $c .= "<td>".$ld->products."</td>";
            $rutadelete = AdminController::$currentIndex.'&controller=AdminScrapperDomain&token='.
            Tools::getAdminTokenLite('AdminScrapperDomain').'&url_domain='.urlencode($ld->url).'&AVE_SCRAPPER_ND_ACTION=delete_domain';
            $c .= "<td><a href='".$rutadelete."' class='btn btn-default btn-delete'>";
            $c .= "<i class='process-icon-delete'></i>";
            $c .= "</a></td>";
            //
        $c .= "</tr>";
        $c .= "</tbody>";
    }
    $c .= "</table>";
    $c .= "</div>";
    ///////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////















    
    //////////////////////////////////////////////
    //////////////////////////////////////////////
    // SUBMIT 2
    if (Tools::isSubmit('submit'.$this->name))
    {
        // Mirar si es vol crear un nou domini
        $action =  strval(Tools::getValue('AVE_SCRAPPER_ND_ACTION'));
        if ($action == "new_sitemap")
        {
            $email          = Configuration::get('AVE_SCRAPPER_EMAIL');
            $token          = Configuration::get('AVE_SCRAPPER_TOKEN');
            $url_domain     = strval(Tools::getValue('AVE_SCRAPPER_ND_URL'));
            $url_sitemap    = strval(Tools::getValue('AVE_SCRAPPER_ND_SITEMAP'));
            if ($url_domain == "" || $url_sitemap == "")
            {
                $c .= $this->l('Error in new sitemap request, empty fields');
            }
            else
            {
                //////////////////////////////////////////////
                //////////////////////////////////////////////
                // Afegir el sitemap
                $data["email"]          = $email;
                $data["token"]          = $token;
                $data["url_domain"]     = $url_domain;
                $data["url_sitemap"]    = $url_sitemap;
                $data_string      = json_encode($data);
                $ws               = '/ws/domain/addsitemap';
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
                  $c .= $this->l('Error in new sitemap request: '.curl_error($ch));
                }
                else
                {
                  $result = json_decode($result);  
                }
                if (isset($result->status))
                {
                    if ($result->status == "ok")
                    {
                        $c .= $this->l('New sitemap Added');
                    }
                    else
                    {
                      $c .= $this->l('Error in new sitemap request.');
                    }
                }
                else
                {
                    $c .= $this->l('Error in new sitemap request.');
                }
                //////////////////////////////////////////////
                //////////////////////////////////////////////
            }
        }
    }
    ///////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////
    // Formulari per afegir Sitemaps
    if (count($listdomains) > 0)
    {
        $default_lang = (int)Configuration::get('PS_LANG_DEFAULT');
        // 
        // Init Fields form array
        $options = array();
        $fields_form[0]['form'] = array(
                'legend' => array(
                'title' => $this->l('Add Sitemap to Domain') .
                " <span style='color: #959595; text-transform:none;'>". 
                $this->l('(Add an extra sitemap to an existing domain to improve product search.)')
                ."</span>",
            ),
            'input' => array(
                array(
                    'type'  => 'select',
                    'label' => $this->l('Domain'),
                    'options' => array(
                        'query' => $listdomains,
                        'id' => 'url',
                        'name' => 'name'  
                      ),
                    'name'  => 'AVE_SCRAPPER_ND_URL',
                    'desc'  => $this->l('Select a domain from the existing ones.'),
                    'required' => true
                ),
                array(
                    'type'  => 'text',
                    'label' => $this->l('SITEMAP'),
                    'name'  => 'AVE_SCRAPPER_ND_SITEMAP',
                    'size'  => 50,
                    'desc'  => $this->l('The URL where the sitemap is, usually of type: http://www.domain.com/sitemap.xml'),
                     'required' => true
                ),
                array(
                    'type'  => 'hidden',
                    'name'  => 'AVE_SCRAPPER_ND_ACTION',
                )
            ),
            //
            'submit' => array(
                'title' => $this->l('Add Sitemap'),
                'class' => 'btn btn-default pull-right'
            )
        );
        //
        $helper = new HelperForm();
        // Module, token and currentIndex
        $helper->module = $this;
        $helper->name_controller = $this->name;
        $helper->token = Tools::getAdminTokenLite('AdminScrapperDomain');
        $helper->currentIndex = AdminController::$currentIndex.'&controller=AdminScrapperDomain&save';
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
                'href' => AdminController::$currentIndex.'&controller=AdminScrapperDomain&save'.$this->name.
                '&token='.Tools::getAdminTokenLite('AdminScrapperDomain'),
            )
        );
        $helper->fields_value['AVE_SCRAPPER_ND_ACTION']   = "new_sitemap";
        $c .= $helper->generateForm($fields_form);
    }
    //
    ///////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////
    // SUBMIT 3
    if (Tools::isSubmit('submit'.$this->name))
    {
        // Mirar si es vol crear un nou domini
        $action =  strval(Tools::getValue('AVE_SCRAPPER_ND_ACTION'));
        if ($action == "new_url")
        {
            $email          = Configuration::get('AVE_SCRAPPER_EMAIL');
            $token          = Configuration::get('AVE_SCRAPPER_TOKEN');
            $id_domain      = strval(Tools::getValue('AVE_SCRAPPER_PD_DOMAIN'));
            $url_product    = strval(Tools::getValue('AVE_SCRAPPER_PD_URL'));
            if ($id_domain == "" || $url_product == "")
            {
                $c .= $this->l('Error in new product request, empty fields');
            }
            else
            {
                //////////////////////////////////////////////
                //////////////////////////////////////////////
                // Afegir el sitemap
                $data["email"]          = $email;
                $data["token"]          = $token;
                $data["id_domain"]      = $id_domain;
                $data["url"]    = $url_product;
                $data_string      = json_encode($data);
                $ws               = 'ws/domain/addurl';
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
                  $c .= $this->l('Error in new product request: '.curl_error($ch));
                }
                else
                {
                  $result = json_decode($result);  
                }
                if (isset($result->status))
                {
                    if ($result->status == "ok")
                    {
                        $c .= $this->l('New product Added');
                    }
                    else
                    {
                      $c .= $this->l('Error in new product request');
                      $c .= "</BR><CENTER><STRONG>".$result->data->result."</STRONG></CENTER></BR></BR>";
                    }
                }
                else
                {
                    $c .= $this->l('Error in new product request.');
                }
                //////////////////////////////////////////////
                //////////////////////////////////////////////
            }
        }
    }
    //
    ///////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////
    // Formulari per afegir Productes
    if (count($listdomains) > 0)
    {
        $default_lang = (int)Configuration::get('PS_LANG_DEFAULT');
        $iso_code = $this->context->language->iso_code;
        $title_pd       = "Add Product to Domain";
        $field_url      = "The URL of the product.";
        $field_submit   = "Add Product";
        if ($iso_code == "ca") 
        {
            $title_pd       = "Afegir un producte al Domini";
            $field_url      = "L'URL del producte.";
            $field_submit   = "Afegir producte";
        }
        if ($iso_code == "es") 
        {
            $title_pd       = "Añadir un producto al Dominio";
            $field_url      = "La URL del producto.";
            $field_submit   = "Añadir producto";
        }
        if ($iso_code == "fr") 
        {
            $title_pd       = "Ajouter un produit au Domaine";
            $field_url      = "L'URL du produit.";
            $field_submit   = "Ajouter produit";
        }
        // 
        // Init Fields form array
        $options = array();
        $fields_form[0]['form'] = array(
                'legend' => array(
                'title' => $title_pd,
            ),
            'input' => array(
                array(
                    'type'  => 'select',
                    'label' => $this->l('Domain'),
                    'options' => array(
                        'query' => $listdomains,
                        'id' => 'id',
                        'name' => 'name'  
                      ),
                    'name'  => 'AVE_SCRAPPER_PD_DOMAIN',
                    'desc'  => $this->l('Select a domain from the existing ones.'),
                    'required' => true
                ),
                array(
                    'type'  => 'text',
                    'label' => $this->l('URL'),
                    'name'  => 'AVE_SCRAPPER_PD_URL',
                    'size'  => 50,
                    'desc'  => $field_url,
                     'required' => true
                ),
                array(
                    'type'  => 'hidden',
                    'name'  => 'AVE_SCRAPPER_ND_ACTION',
                )
            ),
            //
            'submit' => array(
                'title' => $field_submit,
                'class' => 'btn btn-default pull-right'
            )
        );
        //
        $helper = new HelperForm();
        // Module, token and currentIndex
        $helper->module = $this;
        $helper->name_controller = $this->name;
        $helper->token = Tools::getAdminTokenLite('AdminScrapperDomain');
        $helper->currentIndex = AdminController::$currentIndex.'&controller=AdminScrapperDomain&save';
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
                'href' => AdminController::$currentIndex.'&controller=AdminScrapperDomain&save'.$this->name.
                '&token='.Tools::getAdminTokenLite('AdminScrapperDomain'),
            )
        );
        $helper->fields_value['AVE_SCRAPPER_ND_ACTION']   = "new_url";
        $c .= $helper->generateForm($fields_form);
    }


    //////////////////////////////////////////////
    //////////////////////////////////////////////
    // Recuperar la llistat de urls manuals
    $listmanualurl    = array();
    $data["email"]    = $email;
    $data["token"]    = $token;
    $data_string      = json_encode($data);
    $ws               = '/ws/domain/listmanualurl';
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
    //
    //$c .= $result . "<BR/>";
    //
    if($result === false)
    {
      $c .= $this->l('Error in manual url list request: '.curl_error($ch));
    }
    else
    {
      $result = json_decode($result);
    }
    if (isset($result->status))
    {
        if ($result->status == "ok")
        {
            $listmanualurl = $result->data->result;
        }
        else
        {
          $c .= $this->l('Error in manual url list request, incorrect configuration.');
        }
    }
    else
    {
        $c .= $this->l('Error in manual url list request.');
    }
    //////////////////////////////////////////////
    //////////////////////////////////////////////


    ///////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////
    // Llistat de URLS manuals
    if (count($listmanualurl) > 0)
    {
        $default_lang = (int)Configuration::get('PS_LANG_DEFAULT');
        $iso_code = $this->context->language->iso_code;
        $mu_title   = "Products added manually";
        $mu_date    = "Date";
        $mu_pfound  = "Product found";
        $mu_pname   = "Product name";
        $mu_price   = "Price";
        $mu_tinc    = "Tax included";
        if ($iso_code == "ca") 
        {
            $mu_title   = "Productes afegits manualment";
            $mu_date    = "Data";
            $mu_pfound  = "Producte trobat";
            $mu_pname   = "Nom del producte";
            $mu_price   = "Preu";
            $mu_tinc    = "IVA inclòs";
        }
        if ($iso_code == "es") 
        {
            $mu_title   = "Productos añadidos manualmente";
            $mu_date    = "Fecha";
            $mu_pfound  = "Producto encontrado";
            $mu_pname   = "Nombre del producto";
            $mu_price   = "Precio";
            $mu_tinc    = "IVA incluido";
        }
        if ($iso_code == "fr") 
        {
            $mu_title   = "Produits ajoutés manuellement";
            $mu_date    = "Date";
            $mu_pfound  = "Produits trouvés";
            $mu_pname   = "Nom du produit";
            $mu_price   = "Prix";
            $mu_tinc    = "TVA incluse";
        }
        ///////////////////////////////////////////////////////////
        // Llistat de dominis disponibles
        $c .= "<div class='panel'>";
        $c .= "<div class='panel-heading'>".$mu_title."</div>";
        //
        if (count($listmanualurl) == 0)
            $c .= $this->l('No manual URL\'s data.');
        $c .= "<table class='table tableDnD' >";
        $c .= "<thead>";
        $c .= "<tr>";
            $c .= "<th>".$this->l('Domain')."</th>";
            $c .= "<th>".$this->l('Url')."</th>";
            $c .= "<th>".$mu_date."</th>";
            $c .= "<th>".$mu_pfound."</th>";
            $c .= "<th>".$mu_pname."</th>";
            if ($full_search == "1") $c .= "<th>".$mu_price."</th>";
            if ($full_search == "1") $c .= "<th>".$this->l('Domain')." ".$mu_tinc."</th>";
            $c .= "<th>".$this->l('Delete')."</th>";
        $c .= "</tr>";
        $c .= "</thead>";
        foreach ($listmanualurl as $lu) 
        {
            $c .= "<tbody>";
            $c .= "<tr>";
                $c .= "<td>".$lu->domain_name."</td>";
                $url = $lu->url;
                if ($url != "")
                    $url = "<a href='https://anonym.to/?".$url."' target='_blank'>".$url."</a>";
                $c .= "<td>".$url."</td>";
                $c .= "<td>".$lu->crawled_date."</td>";
                $c .= "<td>";
                    if ($lu->products_found == "0") $c .= $this->l('No');
                    if ($lu->products_found == "1") $c .= $this->l('Yes');
                $c .= "</td>";
                $c .= "<td>".$lu->product_name."</td>";
                if ($full_search == "1") $c .= "<td>".number_format($lu->product_price,2)."</td>";
                if ($full_search == "1") 
                {                
                    $c .= "<td>";
                        if ($lu->tax_included == "0") $c .= $this->l('No');
                        if ($lu->tax_included == "1") $c .= $this->l('Yes');
                    $c .= "</td>";
                }
                $rutadelete = AdminController::$currentIndex.'&controller=AdminScrapperDomain&token='.
                Tools::getAdminTokenLite('AdminScrapperDomain').'&id_manual_url='.$lu->manual_url_id.'&AVE_SCRAPPER_ND_ACTION=delete_manual_url';
                $c .= "<td><a href='".$rutadelete."' class='btn btn-default btn-delete'>";
                $c .= "<i class='process-icon-delete'></i>";
                $c .= "</a></td>";
            $c .= "</tr>";
            $c .= "</tbody>";
        }
        $c .= "</table>";
        $c .= "</div>";
        ///////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////
    }
    ///////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////


    //
    return $c;
}



}