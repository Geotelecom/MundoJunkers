<?php
class AdminScrapperInfoController extends AdminController {



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
    $iso_code = $this->context->language->iso_code;


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
    ///////////////////////////////////////////////////////////


    //////////////////////////////////////////////
    //////////////////////////////////////////////
    // PLÀ I CONSULTES
    $id_plan = "";
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
            if ($id_plan != "")
            {
                $c .= "<div class='panel' style='text-align:right;'>";
                $c .= "".$plan_name." - <B>".$text_cm.":</B> ".$act_consultes." / ".$max_consultes."";
                $c .= "</div>";
            }
        }
    }
    //////////////////////////////////////////////
    //////////////////////////////////////////////



    //////////////////////////////////////////////
    //////////////////////////////////////////////
    $c .= "<div class='panel'>";
    $c .= "<div class='panel-heading'>";
    if ($iso_code == "es")
        $c .= "¿Cómo hacer \"Matching de un producto\"?";
    if ($iso_code == "ca")
        $c .= "Com fer \"Matching d'un producte\"?";
    if ($iso_code == "en")
        $c .= "How to \"Matching a product\"?";
    $c .= "</div>";
    $c .= "<span style='color: #959595;'>";
    if ($iso_code == "es")
        $c .= "
        <strong>1.-</strong> Vamos al apartado \"Búsqueda\" y introducimos el nombre en el Buscador.
        <BR/><BR/>
        <strong>2.-</strong> Si no aparece el producto en la búsqueda, pero conocemos su URL:
        <BR/>
        Vamos al apartado \"Dominios\", en la parte inferior \"Añadir un producto al Dominio\", seleccionamos el \"Dominio\", (si no existe, primero se tendrá que crear con \"Nuevo Dominio\") y introducimos la \"URL\".
        <BR/>
        Si la página de la URL que ha introducido tiene la estructura correcta, el producto se añadirá, y aparecerá en el listado de esta misma página \"Productos Añadidos Manualmente\", y podrá volver al apartado \"Búsqueda\" para realizar el \"Matching\".
        <BR/><BR/>
        <strong>3.-</strong> Una vez en el apartado \"Búsqueda\" con los resultados de la misma.
        <BR/>
        Marcamos, los productos en los que queremos realizar un grupo de \"Matching\", con el \"checkbox\", de la columna \"Matching\". Al final de la misma página, si deseamos crear un nuevo grupo de \"Matching\", introducimos el \"Nombre\" y guardamos, o si queremos añadir los productos a un \"Matching\" existente, lo seleccionamos del desplegable y guardamos.
        ";
    if ($iso_code == "ca")
        $c .= "
        <strong>1.-</strong> Anem a l'apartat \"Recerca\" i introduïm el nom al Cercador.
        <BR/><BR/>
        <strong>2.-</strong> Si no apareix el producte a la recerca, però coneixem la seva URL:
        <BR/>
        Anem a l'apartat \"Dominis\", a la part inferior \"Afegeix un producte al Domini\", seleccionem el \"Domini\", (si no hi ha, primer s'haurà de crear amb \"Nou Domini\") i introduïm la \"URL\".
        <BR/>
        Si la pàgina de la URL que ha introduït té l'estructura correcta, el producte s'afegirà, i apareixerà al llistat d'aquesta mateixa pàgina \"Productes afegits Manualment\", i podrà tornar a l'apartat \"Recerca\" per realitzar el \"Matching\".
        <BR/><BR/>
        <strong>3.-</strong> Un cop a l'apartat \"Cerca\" amb els resultats de la mateixa.
        <BR/>
        Marquem, els productes en què volem realitzar un grup de \"Matching\", amb el \"checkbox\", de la columna \"Matching\". Al final de la mateixa pàgina, si volem crear un nou grup de \"Matching\", introduïm el \"Nom\" i guardem, o si volem afegir els productes a un \"Matching\" existent, el seleccionem del desplegable i guardem.
        ";
    if ($iso_code == "en")
        $c .= "
        1. - Let's go to the \"Search\" section and enter the name in the search engine.
        <BR/><BR/>
        2. - If the product does not appear in the search, but we know its URL:
        <BR/>
        Let's go to the \"Domains\" section, in the lower part \"Add a product to Domain\", select the \"Domain\", (if it doesn't exist, first you will have to create it with \"New Domain\") and enter the \"URL\".
        <BR/>
        If the URL page you entered has the correct structure, the product will be added, and will appear in the list of this page \"Manually Added Products\", and you can return to the \"Search\" section to perform the \"Matching\".
        <BR/><BR/>
        3. - Once in the \"Search\" section with its results.
        <BR/>
        We mark the products in which we want to carry out a group of \"Matching\", with the \"checkbox\", in the column \"Matching\". At the bottom of the same page, if we want to create a new group of \"Matching\", enter the \"Name\" and save, or if we want to add the products to an existing \"Matching\", select it from the dropdown and save.
        ";
    $c .= "</span>";
    $c .= "</div>";
    //////////////////////////////////////////////
    //////////////////////////////////////////////
    $c .= "<div class='panel'>";
    $c .= "<div class='panel-heading'>".$this->l('The importance of Sitemap.')."</div>";
    $c .= "<span style='color: #959595;'>";
    if ($iso_code == "ca")
        $c .= "El sistema de recerca de productes, es basa en les pàgines que estan relacionades al 'sitemap', del domini, si les pàgines dels productes no estan relacionades al 'sitemap', és molt possible que el sistema no localitzi els productes. Per això s'ofereix l'opció d'afegir pàgines de 'sitemap' al domini de forma extra.";
    if ($iso_code == "es")
        $c .= "El sistema de búsqueda de productos, se basa en las páginas  que están relacionadas en el 'sitemap', del dominio, si las páginas de los productos no están relacionadas en el 'sitemap', es muy posible que el sistema no localice los productos. Por eso se ofrece la opción de añadir páginas de 'sitemap' al dominio de forma extra.";
    if ($iso_code == "en")
        $c .= "The product search system, based on the pages that are related in the 'sitemap', of the domain, if the product pages are not related in the 'sitemap', it is very possible that the system does not locate the products. That's why it offers the option to add 'sitemap' pages to the domain extra.";
    $c .= "</span>";
    $c .= "</div>";
    //////////////////////////////////////////////
    //////////////////////////////////////////////
    $c .= "<div class='panel'>";
    $c .= "<div class='panel-heading'>".$this->l('Search for products in new Domains.')."</div>";
    $c .= "<span style='color: #959595;'>";
    if ($iso_code == "ca")
        $c .= "Un cop afegit un nou domini, el servidor central ha de processar les pàgines del seu 'sitemap', en recerca de productes, això no és un procés immediat i pot trigar a processar tots els productes per a la seva recerca, diversos dies, si us plau tingui paciència.";
    if ($iso_code == "es")
        $c .= "Una vez añadido un nuevo dominio, el servidor central tiene que procesar las páginas de su 'sitemap', en búsqueda de productos, esto no es un proceso inmediato y puede tardar en procesar todos los productos para su búsqueda, varios días, por favor tenga paciencia.";
    if ($iso_code == "en")
        $c .= "Once a new domain is added, the central server has to process the pages of your 'sitemap', in search of products, this is not an immediate process and may take time to process all products for your search, several days, please be patient.";
    $c .= "</span>";
    $c .= "</div>";
    //////////////////////////////////////////////
    //////////////////////////////////////////////
    $c .= "<div class='panel'>";
    $c .= "<div class='panel-heading'>".$this->l('Anonymous redirect of links to product sheet.')."</div>";
    $c .= "<span style='color: #959595;'>";
    if ($iso_code == "ca")
        $c .= "Quan feu una cerca de productes, i seleccioneu l'enllaç d'un producte, (per veure-ho a la web original), passareu per un servidor intermediari d'URL'S, en aquest cas 'https://anonym.to/', per evitar que la web destí detecti d'on provenen les peticions.";
    if ($iso_code == "es")
        $c .= "Cuando realice una búsqueda de productos, i seleccione el enlace de un producto, (para verlo en la web original), será redirigido por un proxy de URL'S, en este caso 'https://anonym.to/', para evitar que la web destino detecte de dónde provienen las peticiones.";
    if ($iso_code == "en")
        $c .= "When you perform a product search, and select a product link, (to see it on the original website), it will be redirected by a URL's proxy, in this case 'https://anonym.to/', to prevent the Web destination to detect where the requests come from.";
    $c .= "</span>";
    $c .= "</div>";
    //////////////////////////////////////////////
    //////////////////////////////////////////////
    //
    return $c;
}



}