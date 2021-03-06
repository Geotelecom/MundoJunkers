<?php

//--------------------------------------------
function array2csv(array &$array)
{
   if (count($array) == 0) {
     return null;
   }
   ob_start();
   $df = fopen("php://output", 'w');
   //fputcsv($df, array_keys(reset($array)));
   foreach ($array as $row) {
      fputcsv($df, $row);
   }
   fclose($df);
   return ob_get_clean();
}
//--------------------------------------------
function download_send_headers($filename) 
{
    header('Content-Type: text/csv; charset=UTF-8');
    header('Content-Type: application/force-download; charset=UTF-8');
    header('Cache-Control: no-store, no-cache');
    header('Content-Disposition: attachment; filename="'.$filename.'"');
}
//--------------------------------------------



class AdminScrapperMatchingController extends AdminController {



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
     $this->context->smarty->assign('content', $this->displayMatching());
     parent::display();   
}


/*
*
*/
function displayMatching()
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
    $action = strval(Tools::getValue('AVE_MATCHING_ACTION'));


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


    ///////////////////////////////////////////////////////////
    // DATES HISTORIAL CSV GRAFIQUES
    $data_ini = "01-".date("m")."-".date("Y");
    $data_fi = date("t-m-Y");
    if ($action == "history_dates")
    {
        $data_ini = strval(Tools::getValue('AVE_MATCHING_DATA_INI'));
        $data_fi = strval(Tools::getValue('AVE_MATCHING_DATA_FI'));
    }
    ///////////////////////////////////////////////////////////


    //////////////////////////////////////////////
    //////////////////////////////////////////////
    // UPDATE MATCHING DATA
    if ($action == "matchingupdate")
    {
        $id_matching    = strval(Tools::getValue('id_matching'));
        $name           = strval(Tools::getValue('name'));
        $code           = strval(Tools::getValue('code'));
        $cost_price     = strval(Tools::getValue('cost_price'));
        if ($id_matching != "" && $name != "")
        {
            //////////////////////////////////////////////
            // Dades
            $data["email"]          = $email;
            $data["token"]          = $token;
            $data["id_matching"]    = $id_matching;
            $data["name"]           = $name;
            $data["code"]           = $code;
            $data["cost_price"]     = $cost_price;
            $data_string            = json_encode($data);
            $ws                     = '/ws/matching/update';
            $server_url             = $server.$ws;
            $ch = curl_init($server_url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                  'Content-Type: application/json',
                  'Content-Length: ' . strlen($data_string))
            );
            //////////////////////////////////////////////
            //
            $result = curl_exec($ch);
            //
            //echo "<PRE>";
            //var_export($result);
            //echo "</PRE>";
            //exit();
            //
            //
            if($result === false)
            {
                $c .= $this->l('Error in update matching: '.curl_error($ch));
            }
            else
            {
                $result = json_decode($result);
            }
            if (isset($result->status))
            {
                if ($result->status == "ok")
                {
                }
                else
                {
                    echo "Error in update matching, incorrect configuration.";
                    exit();
                }
            }
            else
            {
                echo "Error in update matching request.";
                exit();
            }
        }
    }
    //////////////////////////////////////////////
    //////////////////////////////////////////////


    //////////////////////////////////////////////
    //////////////////////////////////////////////
    // UPDATE PERIODICITY
    if ($action == "company_periodicity")
    {
        //////////////////////////////////////////////
        // Dades
        $data["email"]          = $email;
        $data["token"]          = $token;
        $data["periodicity"]    = strval(Tools::getValue('AVE_MATCHING_PERIODICITY'));
        $data_string            = json_encode($data);
        $ws                     = '/ws/company/addperiodicity';
        $server_url             = $server.$ws;
        $ch = curl_init($server_url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
              'Content-Type: application/json',
              'Content-Length: ' . strlen($data_string))
        );
        //////////////////////////////////////////////
        //
        $result = curl_exec($ch);
        //
        if($result === false)
        {
            $c .= $this->l('Error in update periodicity: '.curl_error($ch));
        }
        else
        {
            $result = json_decode($result);
        }
        if (isset($result->status))
        {
            if ($result->status == "ok")
            {
            }
            else
            {
                echo "Error in update periodicity, incorrect configuration.";
                exit();
            }
        }
        else
        {
            echo "Error in update periodicity request.";
            exit();
        }
    }
    //////////////////////////////////////////////
    //////////////////////////////////////////////


    ///////////////////////////////////////////////////////////
    // PERIODICITY
    $periodicity = "day";
    // Obtenir la perioditat del usuari
    $data["email"]          = $email;
    $data["token"]          = $token;
    $data_string            = json_encode($data);
    $ws                     = '/ws/company/getperiodicity';
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
    if($result === false) {}
    else
    {
        $result = json_decode($result);
    }
    if (isset($result->status))
    {
        if ($result->status == "ok")
        {
            $periodicity = $result->data->result;
        }
    }
    ///////////////////////////////////////////////////////////


    //////////////////////////////////////////////
    //////////////////////////////////////////////
    // TAX (PRODUCT)
    if ($action == "changeptax")
    {
        //////////////////////////////////////////////
        // Dades
        $data["email"]          = $email;
        $data["token"]          = $token;
        $data["matching_id"]    = strval(Tools::getValue('mid'));
        $data["product_id"]     = strval(Tools::getValue('pid'));
        $data["tax_included"]   = strval(Tools::getValue('tax'));
        $data_string            = json_encode($data);
        $ws                     = '/ws/matching/ptax';
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
    // TAX TYPE (PRODUCT)
    if ($action == "changeptaxtype")
    {
        //////////////////////////////////////////////
        // Dades
        $data["email"]          = $email;
        $data["token"]          = $token;
        $data["matching_id"]    = strval(Tools::getValue('mid'));
        $data["product_id"]     = strval(Tools::getValue('pid'));
        $data["tax_type"]   = strval(Tools::getValue('tax'));
        $data_string            = json_encode($data);
        $ws                     = '/ws/matching/ptaxtype';
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
            $c .= $this->l('Error in update tax type request: '.curl_error($ch));
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
                echo "Error in update tax type request, incorrect configuration.";
                exit();
            }
        }
        else
        {
            echo "Error in update tax type request.";
            exit();
        }
    }
    //////////////////////////////////////////////
    //////////////////////////////////////////////


    //////////////////////////////////////////////
    //////////////////////////////////////////////
    // CSV LAST DATE
    if ($action == "csvmatchingfulllastdate")
    {
        $filename = "data_full_ld_".time().".csv";
        //
        //////////////////////////////////////////////
        // Dades
        $data["email"]          = $email;
        $data["token"]          = $token;
        $data_string            = json_encode($data);
        $ws                     = '/ws/history/matchinglistfulllastdate';
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
        //echo "<PRE>"; var_export($result); echo "</PRE>"; exit();
        //
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
                $info = $result->data->result->info;
                $listproducts = $result->data->result->products;
            }
            else
            {
                echo "Error in matching request, incorrect configuration.";
                exit();
            }
        }
        else
        {
            echo "Error in matching request.";
            exit();
        }
        //////////////////////////////////////////////
        //////////////////////////////////////////////
        // output headers so that the file is downloaded rather than displayed
        download_send_headers($filename);
        //
        //////////////////////////////////////////////
        //////////////////////////////////////////////
        // Columnes
        $columns = array("Code","Domain","Product","Matching Code","Matching Cost Price","Price","Date");
        // ca
        $iso_code = $this->context->language->iso_code;
        if ($iso_code == "ca")
            $columns = array("Codi","Domini","Producte","Codi Matching","Preu cost Matching ","Preu","Data");
        if ($iso_code == "es")
            $columns = array("Codigo","Dominio","Producto","Código Matching","Precio coste Matching","Precio","Fecha");
        // output the column headings
        $output = array();
        $output[] = $columns;
        //
        $datos = array();
        $x=0;
        foreach ($listproducts as $lp) 
        {
            $datos[$x]["matching_name"]         = $lp->matching_name;
            $datos[$x]["name"]                  = $lp->name;
            $datos[$x]["domain_name"]           = $lp->domain_name;
            $datos[$x]["domain_url"]            = $lp->domain_url;
            $datos[$x]["url"]                   = $lp->url;
            $datos[$x]["fecha"]                 = $lp->history_fecha;
            $datos[$x]["price"]                 = number_format($lp->history_price,2);
            $datos[$x]["matching_code"]         = $lp->matching_code;
            $datos[$x]["matching_cost_price"]   = number_format($lp->matching_cost_price,2);
            $x++;
        }
        //
        foreach ($datos as $dt) 
        {
            $output[] = array($dt["matching_name"], $dt["domain_name"], $dt["name"], $dt["matching_code"], $dt["matching_cost_price"], $dt["price"], $dt["fecha"]);
        }
        //
        echo array2csv($output);
        //echo "<PRE>";
        //var_export($listproducts);
        //echo "</PRE>";
        exit();
    }
    //////////////////////////////////////////////
    //////////////////////////////////////////////


    //////////////////////////////////////////////
    //////////////////////////////////////////////
    // CSV BETWEEN DATES
    if ($action == "csvmatchingfull")
    {

        $filename = "data_full_".time().".csv";
        //
        //////////////////////////////////////////////
        // Dades
        $data["email"]          = $email;
        $data["token"]          = $token;
        $data["data_ini"]       = strval(Tools::getValue('data_ini'));
        $data["data_fi"]        = strval(Tools::getValue('data_fi'));
        $data_string            = json_encode($data);
        $ws                     = '/ws/history/matchinglistfull';
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
        //echo "<PRE>"; var_export($result); echo "</PRE>"; exit();
        //
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
                $info = $result->data->result->info;
                $listproducts = $result->data->result->products;
            }
            else
            {
                echo "Error in matching request, incorrect configuration.";
                exit();
            }
        }
        else
        {
            echo "Error in matching request.";
            exit();
        }
        //////////////////////////////////////////////
        //////////////////////////////////////////////
        // output headers so that the file is downloaded rather than displayed
        download_send_headers($filename);
        //
        //////////////////////////////////////////////
        //////////////////////////////////////////////
        // Columnes
        $columns = array("Code","Domain","Product","Matching Code","Matching Cost Price","Price","Date");
        // ca
        $iso_code = $this->context->language->iso_code;
        if ($iso_code == "ca")
            $columns = array("Codi","Domini","Producte","Codi Matching","Preu cost Matching ","Preu","Data");
        if ($iso_code == "es")
            $columns = array("Codigo","Dominio","Producto","Código Matching","Precio coste Matching","Precio","Fecha");
        // output the column headings
        $output = array();
        $output[] = $columns;
        //
        $datos = array();
        $x=0;
        foreach ($listproducts as $lp) 
        {
            $listhistory = $lp->history;
            $z = 0;
            foreach ($listhistory as $lh) 
            {
                $datos[$x]["matching_name"]         = $lp->matching_name;
                $datos[$x]["name"]                  = $lp->name;
                $datos[$x]["domain_name"]           = $lp->domain_name;
                $datos[$x]["domain_url"]            = $lp->domain_url;
                $datos[$x]["url"]                   = $lp->url;
                $datos[$x]["fecha"]                 = $lh->fecha;
                $datos[$x]["price"]                 = number_format($lh->price,2);
                $datos[$x]["matching_code"]         = $lp->matching_code;
                $datos[$x]["matching_cost_price"]   = number_format($lp->matching_cost_price,2);
                $x++;
            }
        }
        //
        foreach ($datos as $dt) 
        {
            $output[] = array($dt["matching_name"], $dt["domain_name"], $dt["name"], $dt["matching_code"], $dt["matching_cost_price"], $dt["price"], $dt["fecha"]);
        }
        //
        echo array2csv($output);
        //echo "<PRE>";
        //var_export($listproducts);
        //echo "</PRE>";
        exit();
    }


    //////////////////////////////////////////////
    //////////////////////////////////////////////
    // CSV
    if ($action == "csvmatching")
    {
        $id_matching = strval(Tools::getValue('id_matching'));
        if ($id_matching != "")
        {
            $matching_name = strval(Tools::getValue('AVE_MATCHING_NAME'));
            $filename = "data_".$id_matching."_".time().".csv";
            //
            //////////////////////////////////////////////
            // Dades
            $data["email"]          = $email;
            $data["token"]          = $token;
            $data["id_matching"]    = $id_matching;
            $data["data_ini"]       = strval(Tools::getValue('data_ini'));
            $data["data_fi"]        = strval(Tools::getValue('data_fi'));
            $data_string            = json_encode($data);
            $ws                     = '/ws/history/matchinglist';
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
                    $info = $result->data->result->info;
                    $listproducts = $result->data->result->products;
                }
                else
                {
                    echo "Error in matching request, incorrect configuration.";
                    exit();
                }
            }
            else
            {
                echo "Error in matching request.";
                exit();
            }
            //////////////////////////////////////////////
            // output headers so that the file is downloaded rather than displayed
            download_send_headers($filename);
            //
            //////////////////////////////////////////////
            //////////////////////////////////////////////
            // Columnes
            $columns = array("Code","Domain","Product","Matching Code","Matching Cost Price","Price","Date");
            // ca
            $iso_code = $this->context->language->iso_code;
            if ($iso_code == "ca")
                $columns = array("Codi","Domini","Producte","Codi Matching","Preu cost Matching ","Preu","Data");
            if ($iso_code == "es")
                $columns = array("Codigo","Dominio","Producto","Código Matching","Precio coste Matching","Precio","Fecha");
            // output the column headings
            $output = array();
            $output[] = $columns;
            //
            $matching_code       = $info->code;
            $matching_cost_price = $info->cost_price;
            //
            $datos = array();
            $x=0;
            foreach ($listproducts as $lp) 
            {
                $listhistory = $lp->history;
                $z = 0;
                foreach ($listhistory as $lh) 
                {
                    $datos[$x]["name"]          = $lp->name;
                    $datos[$x]["domain_name"]   = $lp->domain_name;
                    $datos[$x]["domain_url"]    = $lp->domain_url;
                    $datos[$x]["url"]           = $lp->url;
                    $datos[$x]["fecha"]         = $lh->fecha;
                    $datos[$x]["price"]         = number_format($lp->price,2);
                    $x++;
                }
            }
            //
            foreach ($datos as $dt) 
            {
                $output[] = array($matching_name, $dt["domain_name"], $dt["name"], $matching_code, $matching_cost_price, $dt["price"], $dt["fecha"]);
            }
            //
            echo array2csv($output);
            //////////////////////////////////////////////
            // DEBUG
            //echo "<PRE>";
            //var_export($output);
            //echo "<BR/>";
            //var_export($matching_name);
            //echo "</PRE>";
            //////////////////////////////////////////////
            // EOF
            exit();
        }
    }
    //////////////////////////////////////////////
    //////////////////////////////////////////////


    //////////////////////////////////////////////
    //////////////////////////////////////////////
    // History
    if ($action == "historymatching")
    {
        $info = array();
        $listproducts = array();
        $id_matching = strval(Tools::getValue('id_matching'));
        if ($id_matching != "")
        {
            //////////////////////////////////////////////
            $data["email"]          = $email;
            $data["token"]          = $token;
            $data["id_matching"]    = $id_matching;
            $data["data_ini"]       = strval(Tools::getValue('data_ini'));
            $data["data_fi"]        = strval(Tools::getValue('data_fi'));
            $data_string            = json_encode($data);
            $ws                     = '/ws/history/matchinglist';
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
                    $info = $result->data->result->info;
                    $listproducts = $result->data->result->products;
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
            //////////////////////////////////////////////
            // JS Libraries
            $c .= "\n";
            $c .= "<script src='"._MODULE_DIR_."avescrapper/js/flot/excanvas.js'></script>\n";
            $c .= "<script src='"._MODULE_DIR_."avescrapper/js/flot/jquery.flot.min.js'></script>\n";
            $c .= "<script src='"._MODULE_DIR_."avescrapper/js/flot/jquery.flot.resize.js'></script>\n";
            $c .= "<script src='"._MODULE_DIR_."avescrapper/js/flot/jquery.flot.pie.js'></script>\n";
            $c .= "<script src='"._MODULE_DIR_."avescrapper/js/flot/jquery.flot.stack.js'></script>\n";
            $c .= "<script src='"._MODULE_DIR_."avescrapper/js/flot/jquery.flot.categories.js'></script>\n";
            //
            $c .= "<div class='panel'>\n";
            $c .= "<div class='panel-heading'>\n";
            $c .= $this->l('Price History');
            $c .= "</div>";
            $c .= "<div id='rows'>\n";
            $c .= "<div id='col-md-12'>\n";
            // Info 
            $c .= "".$info->name."<br/>";
            //
            $c .= "<br/>\n";
            $c .= "<div id='placeholder' style='width: 100%; height: 400px;'></div>\n";
            $c .= "</div>\n";
            $c .= "</div>\n";
            $c .= "</div>\n";
            //
            $datos = array();
            $x = 0;
            foreach ($listproducts as $lp) 
            {
                $datos[$x]["name"]          = $lp->name;
                $datos[$x]["domain_name"]   = $lp->domain_name;
                $datos[$x]["domain_url"]    = $lp->domain_url;
                $datos[$x]["price"]         = $lp->price;
                $datos[$x]["url"]           = $lp->url;
                $listhistory = $lp->history;
                $z = 0;
                foreach ($listhistory as $lh) 
                {
                    $fecha = substr($lh->fecha, 0,10);
                    $datos[$x]["datos"] .= "['".$fecha."',".$lh->price."],";
                    $z++;
                }
                if ($x>0)
                    substr($datos[$x]["datos"], 0,-1);
                $x++;        
            }
            /////////////////////////////
            // order $datos by price desc
            $prices = array(); 
            foreach ($datos as $dt) 
            {    
                $prices[] = $dt['price'];
            } 
            array_multisort($prices, SORT_DESC, $datos);
            /////////////////////////////
            $c .= "<script type='text/javascript'>
            $( document ).ready(function() { ";
            foreach ($datos as $key => $dt) 
            {
                $c .= "var datos".$key." = [".$dt["datos"]."];\n";
            }    
            $c .= "
                $.plot('#placeholder', [
            ";        
            foreach ($datos as $key => $dt)
            {
                $c .= "{ label:'<a href=\"https://anonym.to/?".$dt["url"]."\" target=\"_blank\" >".$dt["name"]."</a> (<a href=\"https://anonym.to/?".$dt["domain_url"]."\"  target=\"_blank\" >".$dt["domain_name"]."</a>) <b>".number_format($dt["price"],2)."</b>',data:datos".$key."},";
            }
            $c .= "
                    ], {
                        series: {
                            lines: {
                                show: true
                            },
                            points: {
                                show: true
                            }
                        },
                        grid: {
                            hoverable: true,
                            clickable: true
                        },
                        yaxis: {
                            min: 0,
                            max: ".($info->max_price + 500)."
                            },
                        xaxis: {
                            mode: 'categories',
                            tickLength: 0
                        }
                    });
            });
            </script>\n";
        }
        //
        return $c;
    }


    //////////////////////////////////////////////
    //////////////////////////////////////////////
    // History
    if ($action == "history")
    {
        $listhistory = array();
        $id_product = strval(Tools::getValue('id_product'));
        if ($id_product != "")
        {
            //////////////////////////////////////////////
            $data["email"]          = $email;
            $data["token"]          = $token;
            $data["id_product"]     = $id_product;
            $data["data_ini"]       = strval(Tools::getValue('data_ini'));
            $data["data_fi"]        = strval(Tools::getValue('data_fi'));
            $data_string            = json_encode($data);
            $ws                     = '/ws/history/list';
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
                    $listhistory = $result->data->result->list;
                    $pinfo = $result->data->result->info;
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
            //////////////////////////////////////////////
            // JS Libraries
            $c .= "\n";
            $c .= "<script src='"._MODULE_DIR_."avescrapper/js/flot/excanvas.js'></script>\n";
            $c .= "<script src='"._MODULE_DIR_."avescrapper/js/flot/jquery.flot.min.js'></script>\n";
            $c .= "<script src='"._MODULE_DIR_."avescrapper/js/flot/jquery.flot.resize.js'></script>\n";
            $c .= "<script src='"._MODULE_DIR_."avescrapper/js/flot/jquery.flot.pie.js'></script>\n";
            $c .= "<script src='"._MODULE_DIR_."avescrapper/js/flot/jquery.flot.stack.js'></script>\n";
            $c .= "<script src='"._MODULE_DIR_."avescrapper/js/flot/jquery.flot.categories.js'></script>\n";
            //
            $c .= "<div class='panel'>\n";
            $c .= "<div class='panel-heading'>\n";
            $c .= $this->l('Price History');
            $c .= "</div>";
            $c .= "<div id='rows'>\n";
            $c .= "<div id='col-md-12'>\n";
            // Info 
            $c .= "<b>".$this->l('Name').":</b> ".$pinfo->name."<br/>";
            $c .= "<b>".$this->l('SKU').":</b> ".$pinfo->sku."<br/>";
            $c .= "<b>".$this->l('Actual Price').":</b> ".number_format($pinfo->price,2)."<br/>";
            $c .= "<b>".$this->l('Max. Price').":</b> ".number_format($pinfo->max_price,2)."<br/>";
            $c .= "<b>".$this->l('Min. Price').":</b> ".number_format($pinfo->min_price,2)."<br/>";
            $c .= "<b>".$this->l('Period').":</b> ".substr($pinfo->first_date,0,10)." / ".substr($pinfo->last_date,0,10)."<br/>";
            $c .= "<b>".$this->l('Domain').":</b> <a href='https://anonym.to/?".$pinfo->domain_url."' target='_blank'>".$pinfo->domain_name."</a><br/>";
            $c .= "<b>".$this->l('Url').":</b> <a href='https://anonym.to/?".$pinfo->url."' target='_blank'>".$pinfo->url."</a><br/>";
            //
            $c .= "<br/>\n";
            $c .= "<div id='placeholder' style='width: 100%; height: 400px;'></div>\n";
            $c .= "</div>\n";
            $c .= "</div>\n";
            $c .= "</div>\n";
            //
            $datos = "";
            $x = 0;
            foreach ($listhistory as $lh) 
            {
                $fecha = substr($lh->fecha, 0,10);
                $datos .= "['".$fecha."',".$lh->price."],";
                $x++;
            }
            if ($x == 0)
            {
                $c .= "<BR/><BR/><b>".$this->l('This product, at the moment has no price history.')."</b><BR/><BR/>";
            }
            $maxprice = $pinfo->max_price + 200;
            $datos = substr($datos, 0,-1);
            //
            $c .= "<script type='text/javascript'>
            $( document ).ready(function() {
                var datos = [".$datos."];
                $.plot('#placeholder', [{ label:'".$this->l('Price')."',data:datos}], {
                        series: {
                            lines: {
                                show: true
                            },
                            points: {
                                show: true
                            }
                        },
                        grid: {
                            hoverable: true,
                            clickable: true
                        },
                        yaxis: {
                            min: 0,
                            max: ".$maxprice."
                            },
                        xaxis: {
                            mode: 'categories',
                            tickLength: 0
                        }
                    });
            });
            </script>\n";
            //////////////////////////////////////////////
        }
    //
    return $c;
    }




    //////////////////////////////////////////////
    //////////////////////////////////////////////
    //else
    {
        //////////////////////////////////////////////
        //////////////////////////////////////////////
        // Delete Matching
        if ($action == "delete_matching")
        {
            $id_matching = strval(Tools::getValue('id_matching'));
            if ($id_matching != "")
            {
                $data["email"]          = $email;
                $data["token"]          = $token;
                $data["matching_id"]    = $id_matching;
                $data_string            = json_encode($data);
                $ws                     = '/ws/matching/deletematching';
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
                        $c .= $this->l('Matching deleted.');
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

        //////////////////////////////////////////////
        //////////////////////////////////////////////
        // Delete Matching Product
        $action =  strval(Tools::getValue('AVE_MATCHING_ACTION'));
        if ($action == "delete_matching_product")
        {
            $id_product = strval(Tools::getValue('id_product'));
            $id_matching = strval(Tools::getValue('id_matching'));
            if ($id_product != "" && $id_matching != "")
            {
                $data["email"]          = $email;
                $data["token"]          = $token;
                $data["matching_id"]    = $id_matching;
                $data["product_id"]     = $id_product;
                $data_string            = json_encode($data);
                $ws                     = '/ws/matching/removematchingproduct';
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
                        $c .= $this->l('Matching deleted.');
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

        //////////////////////////////////////////////
        //////////////////////////////////////////////
        // Filtre de cerca
        $fields_form[0]['form'] = array(
                'legend' => array(
                'title' => $this->l('Search').
                " <span style='color: #959595; text-transform:none;'>". 
                $this->l('(Search matching)')
                ."</span>",
            ),
            'input' => array(
                array(
                    'type'  => 'text',
                    'label' => $this->l('Search'),
                    'name'  => 'AVE_MATCHING_WORD',
                    'size'  => 20,
                    'desc'  => $this->l('Name of matching'),
                    'required' => true
                ),
                array(
                    'type'  => 'hidden',
                    'name'  => 'AVE_MATCHING_ACTION',
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
        $helper->token = Tools::getAdminTokenLite('AdminScrapperMatching');
        $helper->currentIndex = AdminController::$currentIndex.'&controller=AdminScrapperMatching&save';
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
                'href' => AdminController::$currentIndex.'&controller=AdminScrapperMatching&save'.$this->name.
                '&token='.Tools::getAdminTokenLite('AdminScrapperMatching'),
            )
        );
        $helper->fields_value['AVE_MATCHING_ACTION']   = "search";
        $c .= $helper->generateForm($fields_form);
        //////////////////////////////////////////////
        //////////////////////////////////////////////


        ////////////////////////////////////////////////
        ////////////////////////////////////////////////
        // Selector de dates historial csv grafiques
        $iso_code = $this->context->language->iso_code;
        $text_title     = "Dates of the history (CSV/GRAPHICS)";
        $text_submit    = "Update";
        $text_data_ini  = "Start date";
        $text_data_fi   = "End date";
        if ($iso_code == "ca")
        {
            $text_title     = "Dates de l'historial (CSV/GRÀFIQUES)";
            $text_submit    = "Actualitza";
            $text_data_ini  = "Data inici";
            $text_data_fi   = "Data final";
        }
        if ($iso_code == "es")
        {
            $text_title     = "Fechas del historial (CSV/GRÀFICAS)";
            $text_submit    = "Actualiza";
            $text_data_ini  = "Fecha inicio";
            $text_data_fi   = "Fecha final";
        }
        //
        $fields_form[0]['form'] = array(
                'legend' => array(
                'title' => $text_title,
            ),
            'input' => array(
                array(
                    'type'  => 'text',
                    'label' => $text_data_ini,
                    'name'  => 'AVE_MATCHING_DATA_INI',
                    'size'  => 5,
                    'required' => true
                ),
                array(
                    'type'  => 'text',
                    'label' => $text_data_fi,
                    'name'  => 'AVE_MATCHING_DATA_FI',
                    'size'  => 5,
                    'required' => true
                ),
                array(
                    'type'  => 'hidden',
                    'name'  => 'AVE_MATCHING_ACTION',
                )
            ),
            //
            'submit' => array(
                'title' => $text_submit,
                'class' => 'btn btn-default pull-right'
            )
        );
        //
        $helper = new HelperForm();
        // Module, token and currentIndex
        $helper->module = $this;
        $helper->name_controller = $this->name;
        $helper->token = Tools::getAdminTokenLite('AdminScrapperMatching');
        $helper->currentIndex = AdminController::$currentIndex.'&controller=AdminScrapperMatching&save';
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
                'href' => AdminController::$currentIndex.'&controller=AdminScrapperMatching&save'.$this->name.
                '&token='.Tools::getAdminTokenLite('AdminScrapperMatching'),
            )
        );
        // Default values
        $helper->fields_value['AVE_MATCHING_ACTION']    = "history_dates";
        $helper->fields_value['AVE_MATCHING_DATA_INI']  = $data_ini;
        $helper->fields_value['AVE_MATCHING_DATA_FI']   = $data_fi;
        //////////////////////////////////////////////
        // CSS Libraries
        $c .= "<link rel='stylesheet' href='"._MODULE_DIR_."avescrapper/js/jquery-ui-1.12.1/jquery-ui.min.css'>\n";
        // JS Libraries
        $c .= "<script src='"._MODULE_DIR_."avescrapper/js/jquery-1.12.4.min.js'></script>\n";
        $c .= "<script src='"._MODULE_DIR_."avescrapper/js/jquery-ui-1.12.1/jquery-ui.min.js'></script>\n";
        $c .= "<script>\n";
        $c .= "$(function() {\n";
        $c .= "$('#AVE_MATCHING_DATA_INI').datepicker({ dateFormat: 'dd-mm-yy' }).val();\n";
        $c .= "$('#AVE_MATCHING_DATA_FI').datepicker({ dateFormat: 'dd-mm-yy' }).val();\n";
        $c .= "});\n";
        $c .= "</script>\n";
        //////////////////////////////////////////////
        //
        $c .= $helper->generateForm($fields_form);
        ////////////////////////////////////////////////
        ////////////////////////////////////////////////


        ////////////////////////////////////////////////
        ////////////////////////////////////////////////
        // Periodicitat de les consultes
        $iso_code = $this->context->language->iso_code;
        $text_title         = "Frequency of consultations";
        $text_submit        = "Update";
        $text_periodicity   = "Periodicity";
        $text_day           = "Every Day";
        $text_week          = "Every Week";
        $text_month         = "Every Month";
        if ($iso_code == "ca")
        {
            $text_title         = "Periodicitat de les consultes";
            $text_submit        = "Actualitza";
            $text_periodicity   = "Periodicitat";
            $text_day           = "Cada Dia";
            $text_week          = "Cada Setmana";
            $text_month         = "Cada Mes";

        }
        if ($iso_code == "es")
        {
            $text_title         = "Periodicidad de las consultas";
            $text_submit        = "Actualiza";
            $text_periodicity   = "Periodicidad";
            $text_day           = "Cada Día";
            $text_week          = "Cada Semana";
            $text_month         = "Cada Mes";
        }
        //
        $period = array();
        $x = 0;
        $period[$x]["id"]   = "day";
        $period[$x]["name"] = $text_day;
        $x++;
        $period[$x]["id"]   = "week";
        $period[$x]["name"] = $text_week;
        $x++;
        $period[$x]["id"]   = "month";
        $period[$x]["name"] = $text_month;
        $x++;
        //
        $fields_form[0]['form'] = array(
                'legend' => array(
                'title' => $text_title,
            ),
            'input' => array(
                array(
                    'type'  => 'select',
                    'label' => $text_periodicity,
                    'options' => array(
                        'query' => $period,
                        'id' => 'id',
                        'name' => 'name'  
                      ),
                    'name'  => 'AVE_MATCHING_PERIODICITY',
                    'required' => true
                ),
                array(
                    'type'  => 'hidden',
                    'name'  => 'AVE_MATCHING_ACTION',
                )
            ),
            //
            'submit' => array(
                'title' => $text_submit,
                'class' => 'btn btn-default pull-right'
            )
        );
        //
        $helper = new HelperForm();
        // Module, token and currentIndex
        $helper->module = $this;
        $helper->name_controller = $this->name;
        $helper->token = Tools::getAdminTokenLite('AdminScrapperMatching');
        $helper->currentIndex = AdminController::$currentIndex.'&controller=AdminScrapperMatching&save';
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
                'href' => AdminController::$currentIndex.'&controller=AdminScrapperMatching&save'.$this->name.
                '&token='.Tools::getAdminTokenLite('AdminScrapperMatching'),
            )
        );
        // Default values
        $helper->fields_value['AVE_MATCHING_ACTION']        = "company_periodicity";
        $helper->fields_value['AVE_MATCHING_PERIODICITY']   = $periodicity;
        //
        $c .= $helper->generateForm($fields_form);
        ////////////////////////////////////////////////
        ////////////////////////////////////////////////


        ////////////////////////////////////////////////
        ////////////////////////////////////////////////
        $c .= "<div class='panel'>";
        ////////////////////////////
        // Botó CSV FULL entre dates
        $iso_code = $this->context->language->iso_code;
        $text_link = "Download full CSV between the selected dates";
        if ($iso_code == "ca")
            $text_link = "Descarrega tot el CSV entre les dates seleccionades";
        if ($iso_code == "es")
            $text_link = "Descarga todo el CSV entre las fechas seleccionadas";
        $rutafullcsv = AdminController::$currentIndex.'&controller=AdminScrapperMatching&token='.
        Tools::getAdminTokenLite('AdminScrapperMatching').'&AVE_MATCHING_ACTION=csvmatchingfull&data_ini='.$data_ini.'&data_fi='.$data_fi;
        $c .= "<a href='".$rutafullcsv."' class='btn btn-csv'><i style='' class='icon-file'></i> ".$text_link."</a> ";
        ////////////////////////////
        $c .= "<BR/>";
        ////////////////////////////
        // Botó CSV FULL last date
        $iso_code = $this->context->language->iso_code;
        $text_link = "Download all CSV from the last date";
        if ($iso_code == "ca")
            $text_link = "Descarrega tot el CSV de l'última data";
        if ($iso_code == "es")
            $text_link = "Descarga todo el CSV de la última fecha";
        $rutafullcsv = AdminController::$currentIndex.'&controller=AdminScrapperMatching&token='.
        Tools::getAdminTokenLite('AdminScrapperMatching').'&AVE_MATCHING_ACTION=csvmatchingfulllastdate&data_ini='.$data_ini.'&data_fi='.$data_fi;
        $c .= "<a href='".$rutafullcsv."' class='btn btn-csv'><i style='' class='icon-file'></i> ".$text_link."</a> ";
        ////////////////////////////
        $c .= "</div>";
        ////////////////////////////////////////////////
        ////////////////////////////////////////////////


        //////////////////////////////////////////////
        //////////////////////////////////////////////
        // Recuperar llistat de matchings
        $action =  strval(Tools::getValue('AVE_MATCHING_ACTION'));
        $word   = strval(Tools::getValue('AVE_MATCHING_WORD'));
        if ($action == "search" && $word != "")
        {
            // Amb Filtre
            $data["email"]    = $email;
            $data["token"]    = $token;
            $data["word"]     = $word;
            $data_string      = json_encode($data);
            $ws               = '/ws/matching/search';
            $server_url       = $server.$ws;
        }
        else
        {
            // Sense Filtre
            $data["email"]    = $email;
            $data["token"]    = $token;
            $data_string      = json_encode($data);
            $ws               = '/ws/matching/list';
            $server_url       = $server.$ws;
        }
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
        //echo "<PRE>";
        //var_export($result);
        //echo "</PRE>";
        //exit();
        //
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
        ////////////////////////////////////////////////
        ////////////////////////////////////////////////
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
        ////////////////////////////////////////////////
        ////////////////////////////////////////////////
        // SCRIPT
        $rutachangeptax = AdminController::$currentIndex.'&controller=AdminScrapperMatching&token='.
        Tools::getAdminTokenLite('AdminScrapperMatching').'&AVE_MATCHING_ACTION=changeptax';
        $rutachangeptaxtype = AdminController::$currentIndex.'&controller=AdminScrapperMatching&token='.
        Tools::getAdminTokenLite('AdminScrapperMatching').'&AVE_MATCHING_ACTION=changeptaxtype';
        $sure_tax = "Are you sure you want to change tax?";
        $tax_type = "Tax type";
        $iso_code = $this->context->language->iso_code;
        if ($iso_code == "ca")
        {
            $sure_tax = "Esteu segur que voleu canviar d\'impost?";
            $tax_type = "Tipus d'impost";
        }
        if ($iso_code == "es")
        {
            $sure_tax = "¿Seguro que quieres cambiar impuestos?";
            $tax_type = "Tipo de impesto";
        }
        $c .= "<script>
        $( document ).ready(function() {

            ///////////////////////////////////////////
            // Delete    
            $('a.btn-delete').on('click', function(e) {
                var link = this;
                e.preventDefault();
                var r = confirm('".$this->l('Are you sure you want to delete?')."');
                if (r == true) window.location = link.href; 
            });
            ///////////////////////////////////////////

            ///////////////////////////////////////////
            // Change Tax
            $('.sel_product_tax').on('change', function() {
                var tax = this.value;
                var pid = $(this).attr('pid');
                var mid = $(this).attr('mid');
                var ruta = '".$rutachangeptax."&pid='+pid+'&mid='+mid+'&tax='+tax;
                var r = confirm('".$sure_tax."');
                if (r == true) 
                {
                    window.location = ruta; 
                }
            });
            ///////////////////////////////////////////

            ///////////////////////////////////////////
            // Change Tax Type
            $('.sel_product_taxtype').on('change', function() {
                var tax = this.value;
                var pid = $(this).attr('pid');
                var mid = $(this).attr('mid');
                var ruta = '".$rutachangeptaxtype."&pid='+pid+'&mid='+mid+'&tax='+tax;
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
        if (count($listmatching) == 0)
            $c .= $this->l('No matching results.');
        ////////////////////////////////////////////////
        ////////////////////////////////////////////////
        $c .= "<script>";
        $c .= "$(document).ready(function() { \n";
            $c .= "$('.matching_button').click(function() { \n";
            $c .= "var id_matching = $(this).attr('id_matching'); \n";
            $c .= "var name = encodeURIComponent($('#matching_name_'+id_matching).val()); \n";
            $c .= "var code = encodeURIComponent($('#matching_code_'+id_matching).val()); \n";
            $c .= "var cost_price = encodeURIComponent($('#matching_cost_price_'+id_matching).val()); \n";
            $rutaupdmath = AdminController::$currentIndex.'&controller=AdminScrapperMatching&token='.Tools::getAdminTokenLite('AdminScrapperMatching').'&AVE_MATCHING_ACTION=matchingupdate';
            $c .= "var urlstr = '".$rutaupdmath."&id_matching='+id_matching+'&name='+name+'&code='+code+'&cost_price='+cost_price; \n";
            $c .= "window.location = urlstr; \n";
            $c .= "}); \n";
        $c .= "}); \n";
        $c .= "</script>";
        //------------------------------------------//
        $iso_code = $this->context->language->iso_code;
        $txt_code       = "Code";
        $txt_cost_price = "Cost Price";
        if ($iso_code == "ca")
        {
            $txt_code       = "Codi";
            $txt_cost_price = "Preu de Cost";
        }
        if ($iso_code == "es")
        {
            $txt_code       = "Código";
            $txt_cost_price = "Precio de Coste";
        }
        ////////////////////////////////////////////////
        ////////////////////////////////////////////////
        foreach ($listmatching as $lm) 
        {
            $c .= "<div class='panel'>";
            $c .= "<div class='panel-heading'>";
            //////////////////////////
            $c .= "<form style='display:inline;' id='matching_form_".$lm->id_matching."'>";
            $c .= "<input type='text' name='matching_name_".$lm->id_matching."' id='matching_name_".$lm->id_matching."' value='".$lm->name."' style='width:300px; height:20px; display:inline; margin-top:5px;'>";
            $c .= "&nbsp;&nbsp;";
            $c .= "<lable>".$txt_code.":</label>&nbsp;";
            $c .= "<input type='text' name='matching_code_".$lm->id_matching."' id='matching_code_".$lm->id_matching."' value='".$lm->code."' style='width:100px; height:20px; display:inline; margin-top:5px;'>";
            $c .= "&nbsp;&nbsp;";
            $c .= "<lable>".$txt_cost_price.":</label>&nbsp;";
            $c .= "<input type='text' name='matching_cost_price_".$lm->id_matching."' id='matching_cost_price_".$lm->id_matching."' value='".$lm->cost_price."' style='width:100px; height:20px; display:inline; margin-top:5px;'>";
            $c .= "&nbsp;&nbsp;&nbsp;&nbsp;";
            $c .= "<input type='button' class='matching_button' id='matching_button_".$lm->id_matching."' id_matching='".$lm->id_matching."' value='".$this->l('Update')."' style='height:30px; display:inline; margin-top:2px; padding-top:0px; font-size:12px;'>";
            $c .= "&nbsp;&nbsp;";
            $c .= "</form>";
            //////////////////////////
            $c .= "&nbsp;&nbsp;";
            $rutahistory = AdminController::$currentIndex.'&controller=AdminScrapperMatching&token='.
            Tools::getAdminTokenLite('AdminScrapperMatching').'&id_matching='.$lm->id_matching.'&AVE_MATCHING_ACTION=historymatching&data_ini='.$data_ini.'&data_fi='.$data_fi;
            $c .= "<a href='".$rutahistory."' class='btn btn-history'><i class='icon-signal'></i></a>";
            $c .= "&nbsp;&nbsp;";
            $rutacsv = AdminController::$currentIndex.'&controller=AdminScrapperMatching&token='.
            Tools::getAdminTokenLite('AdminScrapperMatching').'&id_matching='.$lm->id_matching.'&AVE_MATCHING_ACTION=csvmatching&AVE_MATCHING_NAME='.$lm->name.'&data_ini='.$data_ini.'&data_fi='.$data_fi;
            $c .= "<a href='".$rutacsv."' class='btn btn-csv'><i style='' class='icon-file'></i></a> ";
            $c .= "&nbsp;&nbsp;";
            $rutadelete = AdminController::$currentIndex.'&controller=AdminScrapperMatching&token='.
            Tools::getAdminTokenLite('AdminScrapperMatching').'&id_matching='.$lm->id_matching.'&AVE_MATCHING_ACTION=delete_matching';
            $c .= "<a href='".$rutadelete."' class='btn btn-delete'><i style='' class='icon-eraser'></i></a> ";
            $c .= "</div>";
            $c .= "<div class='row'>";
            $products = $lm->product;
            $c .= "<table class='table tableDnD' id='searchlist' >";
            $c .= "<thead>";
            $c .= "<tr>";
                $c .= "<th>".$this->l('Domain')."</th>";
                $c .= "<th>".$this->l('Product')."</th>";
                $c .= "<th>".$this->l('Sku')."</th>";
                $c .= "<th>".$this->l('Price')." (+".$this->l('IVA').")</th>";
                $c .= "<th>".$this->l('Date')."</th>";
                $c .= "<th>".$this->l('Url')."</th>";
                $c .= "<th>".$this->l('History')."</th>";
                $c .= "<th>".$this->l('Delete')."</th>";
                $c .= "<th>".$this->l('IVA')."</th>";
                $c .= "<th>".$tax_type."</th>";
            $c .= "</tr>";
            $c .= "</thead>";
            foreach ($products as $pr) 
            {
                $c .= "<tbody>";
                $c .= "<tr>";
                    $c .= "<td><a href='https://anonym.to/?".$pr->url."' target='_blank'>".$pr->domain_name."</a></td>";
                    $c .= "<td>".$pr->name."</td>";
                    $c .= "<td>".$pr->sku."</td>";
                    $c .= "<td>".number_format($pr->price,2)."</td>";
                    //////////////////////////////
                    $styletd = "";
                    if ($pr->fechaok == "no") $styletd = "style='background-color:#fded81;'";
                    $c .= "<td ".$styletd.">".$pr->fecha."</td>";
                    ///////////////////////////////
                    $c .= "<td><a href='https://anonym.to/?".$pr->url."' target='_blank'>".$pr->url."</a></td>";
                    $rutahistory = AdminController::$currentIndex.'&controller=AdminScrapperMatching&token='.
                    Tools::getAdminTokenLite('AdminScrapperMatching').'&id_product='.$pr->id_product.'&AVE_MATCHING_ACTION=history&data_ini='.$data_ini.'&data_fi='.$data_fi;
                    $c .= "<td><a href='".$rutahistory."' class='btn btn-default btn-history'><i class='icon-signal'></i></a></td>";
                    $rutadelete = AdminController::$currentIndex.'&controller=AdminScrapperMatching&token='.
                    Tools::getAdminTokenLite('AdminScrapperMatching').'&id_product='.$pr->id_product.'&id_matching='.$lm->id_matching.'&AVE_MATCHING_ACTION=delete_matching_product';
                    $c .= "<td><a href='".$rutadelete."' class='btn btn-default btn-delete'><i class='icon-eraser'></i></a></td>";
                    //////////////////////////////
                    // tax_included
                    $dti = $pr->domain_tax_included;
                    $pti = $pr->tax_included;
                    $sel = "";
                    $c .= "<td>";
                    $c .= "<SELECT style='width:110px;' class='sel_product_tax' pid='".$pr->id_product."' mid='".$lm->id_matching."'>";
                    if ($pti == "") $sel = "selected"; else $sel = "";
                    $txtdti = "";
                    if ($dti == "1") $txtdti = $this->l('Yes');
                    if ($dti == "0") $txtdti = $this->l('No');
                    $c .= "<option value='' ".$sel.">".$this->l('Domain')." (".$txtdti.")</option>";
                    if ($pti == "1") $sel = "selected"; else $sel = "";
                    $c .= "<option value='1' ".$sel.">".$this->l('Yes')."</option>";
                    if ($pti == "0") $sel = "selected"; else $sel = "";
                    $c .= "<option value='0' ".$sel.">".$this->l('No')."</option>";
                    $c .= "</SELECT>";
                    $c .= "</td>";
                    //////////////////////////////
                    // tax type
                    $c .= "<td>";
                    $c .= "<SELECT style='width:110px;' class='sel_product_taxtype' pid='".$pr->id_product."' mid='".$lm->id_matching."'>";
                    $c .= "<option value=''>Domini (".$pr->domain_tax_type_percent."%)</option>";
                    foreach ($listtaxtype as $ttype)
                    {
                        $sel = "";
                        if($pr->product_tax_type == $ttype->id) $sel = "selected";
                        $c .= "<option value='".$ttype->id."' ".$sel.">".$ttype->percent."%</option>";
                    }
                    $c .= "</SELECT>";
                    $c .= "</td>";
                    //////////////////////////////
                $c .= "</tr>";
                $c .= "</tbody>";
            }
            $c .= "</table>";
            $c .= "</div>";
            $c .= "</div>";
        }
        ////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////
    }
    //
    return $c;
}



}