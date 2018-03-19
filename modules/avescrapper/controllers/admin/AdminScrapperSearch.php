<?php
class AdminScrapperSearchController extends AdminController {



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
public function display(){
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
    //
    $default_lang = (int)Configuration::get('PS_LANG_DEFAULT');
    $action =  strval(Tools::getValue('AVE_SCRAPPER_ND_ACTION'));


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


    //
    if ($action == "matching")
    {
        ///////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////
        // SUBMIT MATCHING
        $c .= "<BR/><BR/><div class='panel'>";
        $c .= "<div class='panel-heading'>".$this->l('Matching result')."</div>";
        $matching_word      =  strval(Tools::getValue('AVE_MATCHING_WORD'));
        $matching_existing  =  strval(Tools::getValue('AVE_MATCHING_EXISTING'));
        $matching_json      =  strval(Tools::getValue('AVE_MATCHING_JSON'));
        // CONTROL D'ERRORS
        $error = "";
        if (count(json_decode($matching_json)) == 0) $error .= $this->l('ERROR: Please select products.')."<BR/>";
        if ($matching_word == "" && $matching_existing == "") $error .= $this->l('ERROR: Please select a Matching name, or Matching from the existing list.')."<BR/>";
        if ($error != "")
        {
            $c .= "<span class='error'>".$error."</span>";
        }
        else
        {
            $email  = Configuration::get('AVE_SCRAPPER_EMAIL');
            $token  = Configuration::get('AVE_SCRAPPER_TOKEN');
            //////////////////////////////////////////////
            //////////////////////////////////////////////
            // Nou Matching
            if ($matching_word != "")
            {
                $data["email"]    = $email;
                $data["token"]    = $token;
                $data["name"]     = $matching_word;
                $data["products"] = $matching_json;
                $data_string      = json_encode($data);
                $ws               = '/ws/matching/new';
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
                  $c .= $this->l('Error in matching request: '.curl_error($ch));
                }
                else
                {
                  $result = json_decode($result);  
                }
                if (isset($result->status))
                {
                    if ($result->status == "ok")
                    {
                        $c .= $this->l('Matching added correctly.');
                    }
                    else
                    {
                      $c .= $this->l('Error in matching request, incorrect configuration.');
                    }
                }
                else
                {
                    $c .= $this->l('Error in matching request.');
                }
            }
            //////////////////////////////////////////////
            //////////////////////////////////////////////
            // Existing Matching
            else
            {
                if ($matching_existing != "")
                {

                    $data["email"]    = $email;
                    $data["token"]    = $token;
                    $data["matching_id"] = $matching_existing;
                    $data["products"] = $matching_json;
                    $data_string      = json_encode($data);
                    $ws               = '/ws/matching/add';
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
                      $c .= $this->l('Error in matching request: '.curl_error($ch));
                    }
                    else
                    {
                      $result = json_decode($result);  
                    }
                    if (isset($result->status))
                    {
                        if ($result->status == "ok")
                        {
                            $c .= $this->l('Matching added correctly.');
                        }
                        else
                        {
                          $c .= $this->l('Error in matching request, incorrect configuration.');
                        }
                    }
                    else
                    {
                        $c .= $this->l('Error in matching request.');
                    }
                }
            }
            //////////////////////////////////////////////
            //////////////////////////////////////////////
        }
        $c .= "</div><BR/><BR/>";
        ///////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////
    }
    //else
    {
        ///////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////
        // Formulari per cercar productes
        // 
        // Init Fields form array
        $fields_form[0]['form'] = array(
                'legend' => array(
                'title' => $this->l('Search').
                " <span style='color: #959595; text-transform:none;'>". 
                $this->l('(Search products to compare prices)')
                ."</span>",
            ),
            'input' => array(
                array(
                    'type'  => 'text',
                    'label' => $this->l('Search'),
                    'name'  => 'AVE_SCRAPPER_WORD',
                    'size'  => 20,
                    'desc'  => $this->l('Name of product, reference ...'),
                    'required' => true
                ),
                array(
                    'type'  => 'hidden',
                    'name'  => 'AVE_SCRAPPER_ND_ACTION',
                )
            ),
            //
            'submit' => array(
                'title' => $this->l('Search'),
                'class' => 'btn btn-default pull-right'
            )
        );
        //
        $helper = new HelperForm();
        // Module, token and currentIndex
        $helper->module = $this;
        $helper->name_controller = $this->name;
        $helper->token = Tools::getAdminTokenLite('AdminScrapperSearch');
        $helper->currentIndex = AdminController::$currentIndex.'&controller=AdminScrapperSearch&save';
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
                'desc' => $this->l('Search'),
                'href' => AdminController::$currentIndex.'&controller=AdminScrapperSearch&save'.$this->name.
                '&token='.Tools::getAdminTokenLite('AdminScrapperSearch'),
            )
        );
        $helper->fields_value['AVE_SCRAPPER_ND_ACTION']   = "search";
        $c .= $helper->generateForm($fields_form);
        ///////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////
        $c .= $this->l("* Do not include '-' in case of looking for specific model (Ex: 6085 instead of 6-085)");
        //////////////////////////////////////////////
        //////////////////////////////////////////////
        // SUBMIT 
        if (Tools::isSubmit('submit'.$this->name))
        {

            $action =  strval(Tools::getValue('AVE_SCRAPPER_ND_ACTION'));
            if ($action == "search")
            {
                    $email          = Configuration::get('AVE_SCRAPPER_EMAIL');
                    $token          = Configuration::get('AVE_SCRAPPER_TOKEN');
                    $word           = strval(Tools::getValue('AVE_SCRAPPER_WORD'));
                    if ($word == "")
                    {
                        $c .= "<BR/><BR/>".$this->l('Error in search request, empty field');
                    }
                    else
                    {
                        //////////////////////////////////////////////
                        //////////////////////////////////////////////
                        // Recuperar el resultat de la cerca
                        $listsearch       = array();
                        $data["email"]    = $email;
                        $data["token"]    = $token;
                        $data["word"]     = $word;
                        $data_string      = json_encode($data);
                        $ws               = '/ws/product/search';
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
                        //$c .= "<BR/><BR/>".$result ."<BR/>";
                        //
                        if($result === false)
                        {
                          $c .= $this->l('Error in search request: '.curl_error($ch));
                        }
                        else
                        {
                          $result = json_decode($result);  
                        }
                        if (isset($result->status))
                        {
                            if ($result->status == "ok")
                            {
                                $listsearch = $result->data->result;
                            }
                            else
                            {
                              $c .= $this->l('Error in search request, incorrect configuration.');
                            }
                        }
                        else
                        {
                            $c .= $this->l('Error in search request.');
                        }
                        ///////////////////////////////////////////////////////////
                        ///////////////////////////////////////////////////////////
                        //
                        ///////////////////////////////////////////////////////////
                        ///////////////////////////////////////////////////////////
                        // Mostrar les Resultats de la cerca
                        $c .= "<BR/><BR/><div class='panel'>";
                        $c .= "<div class='panel-heading'>".$this->l('Search result for:')." ".$word."</div>";
                        if (count($listsearch) == 0)
                            $c .= $this->l('No search results.');
                        $c .= "<table class='table tableDnD' id='searchlist' >";
                        $c .= "<thead>";
                        $c .= "<tr>";
                            $c .= "<th>".$this->l('Matching')."</th>";
                            $c .= "<th>".$this->l('Domain')."</th>";
                            $c .= "<th>".$this->l('Product')."</th>";
                            if ($full_search == "1") $c .= "<th>".$this->l('Price')."</th>";
                            $c .= "<th>".$this->l('Url')."</th>";
                        $c .= "</tr>";
                        $c .= "</thead>";
                        foreach ($listsearch as $ls) 
                        {
                            $c .= "<tbody>";
                            $c .= "<tr>";
                                $c .= "<td><input type='checkbox' class='checkbox' id_product='".$ls->id_product."' name='cbmatch_".$ls->id_product."' value='Yes' /></td>";
                                $c .= "<td><a href='https://anonym.to/?".$ls->domain_url."' target='_blank'>".$ls->domain_name."</a></td>";
                                $c .= "<td>".$ls->product_name."</td>";
                                if ($full_search == "1") $c .= "<td>".number_format($ls->price,2)."</td>";
                                $c .= "<td><a href='https://anonym.to/?".$ls->url."' target='_blank'>".$ls->url."</a></td>";
                            $c .= "</tr>";
                            $c .= "</tbody>";
                        }
                        $c .= "</table>";
                        ////////////////////////////////////////
                        ////////////////////////////////////////
                        // JAVASCRIPT
                        $c .= "
                        <script>
                        $( document ).ready(function() {
                            //
                            var valproduct='[]';
                            $('#AVE_MATCHING_JSON').val(valproduct);
                            var objproduct = JSON.parse(valproduct);
                            //
                            $('#searchlist .checkbox').click(function() {
                                var id_product = $(this).attr('id_product');
                                if ($(this).is(':checked')) 
                                {
                                    // Add
                                    if(!ExistInJson(objproduct, id_product))
                                    {
                                        objproduct.push(id_product);    
                                    }
                                    RefreshJsonInput();
                                }
                                else
                                {
                                    // Remove
                                    RemovefromJson(objproduct, id_product);
                                    RefreshJsonInput();
                                }
                            });
                            //
                            function RefreshJsonInput()
                            {
                                valproduct = JSON.stringify(objproduct);
                                $('#AVE_MATCHING_JSON').val(valproduct);
                            }
                            //
                            function ExistInJson(json, val) 
                            {
                                var ret = 0;
                                $(json).each(function(index, data){
                                    if(data == val)
                                        ret++;
                                })
                                return ret > 0;
                            }
                            //
                            function RemovefromJson(json, val)
                            {
                                $(json).each(function(index, data){
                                    if(data == val)
                                    {
                                        // remove
                                        json.splice(index,1);
                                    }
                                })
                            }
                            //
                        });
                        </script>";
                        ////////////////////////////////////////
                        ////////////////////////////////////////
                        $c .= "</div>";
                        //////////////////////////////////////////////
                        //////////////////////////////////////////////
                        // Recuperar llistat de matchings
                        $data["email"]    = $email;
                        $data["token"]    = $token;
                        $data_string      = json_encode($data);
                        $ws               = '/ws/matching/list';
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
                          $c .= $this->l('Error in matching request: '.curl_error($ch));
                        }
                        else
                        {
                          $result = json_decode($result);  
                        }
                        if (isset($result->status))
                        {
                            if ($result->status == "ok")
                            {
                                $listmatching = $result->data->result;
                            }
                            else
                            {
                              $c .= $this->l('Error in matching request, incorrect configuration.');
                            }
                        }
                        else
                        {
                            $c .= $this->l('Error in matching request.');
                        }
                        //
                        $selmatching = array();
                        $selmatching[0]["id"]      = "";
                        $selmatching[0]["name"]    = "-=".$this->l('Select Matching')."=-";
                        $x=1;
                        foreach ($listmatching as $lm) 
                        {
                            $selmatching[$x]["id"]      = $lm->id_matching;
                            $selmatching[$x]["name"]    = $lm->name;
                            $x++;  
                        }
                        ///////////////////////////////////////////////////////////
                        ////////////////////////////////////////////////////////////
                        // Formulari Matching
                        //
                        /////////////////////////////
                        // Init Fields form array
                        $fields_form[0]['form'] = array(
                                'legend' => array(
                                'title' => $this->l('Matching'),
                            ),
                            'input' => array(
                                array(
                                    'type'  => 'text',
                                    'label' => $this->l('New Matching'),
                                    'name'  => 'AVE_MATCHING_WORD',
                                    'size'  => 20,
                                    'desc'  => $this->l('Name for the new matching'),
                                    'required' => false
                                ),
                                array(
                                    'type'  => 'select',
                                    'label' => $this->l('Existing Matching'),
                                    'options' => array(
                                        'query' => $selmatching,
                                        'id' => 'id',
                                        'name' => 'name'  
                                      ),
                                    'name'  => 'AVE_MATCHING_EXISTING',
                                    'desc'  => $this->l('Select a matching from the existing ones.'),
                                    'required' => false
                                ),
                                array(
                                    //'type'  => 'textarea',
                                    //'label' => $this->l('JSON'),
                                    'type'  => 'hidden',
                                    'name'  => 'AVE_MATCHING_JSON',
                                    'required' => false
                                ),
                                array(
                                    'type'  => 'hidden',
                                    'name'  => 'AVE_SCRAPPER_ND_ACTION',
                                )
                            ),
                            //
                            'submit' => array(
                                'title' => $this->l('Matching'),
                                'class' => 'btn btn-default pull-right'
                            )
                        );
                        //
                        $helper = new HelperForm();
                        // Module, token and currentIndex
                        $helper->module = $this;
                        $helper->name_controller = $this->name;
                        $helper->token = Tools::getAdminTokenLite('AdminScrapperSearch');
                        $helper->currentIndex = AdminController::$currentIndex.'&controller=AdminScrapperSearch&save';
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
                                'desc' => $this->l('Search'),
                                'href' => AdminController::$currentIndex.'&controller=AdminScrapperSearch&save'.$this->name.
                                '&token='.Tools::getAdminTokenLite('AdminScrapperSearch'),
                            )
                        );
                        $helper->fields_value['AVE_SCRAPPER_ND_ACTION']   = "matching";
                        $c .= $helper->generateForm($fields_form);
                        ///////////////////////////////////////////////////////////
                        ///////////////////////////////////////////////////////////
                    }
             }
        }
        //////////////////////////////////////////////
        //////////////////////////////////////////////
        //
    }
    //
    return $c;
}



}