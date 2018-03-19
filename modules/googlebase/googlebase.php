<?php

class GoogleBase extends Module
{
	private $_html = '';
	private $_postErrors = array();
	private $_cookie;
	
	public function __construct()
	{
		global $cookie;
		$this->_cookie = $cookie;
		$this->name = 'googlebase';
		$this->tab = 'Tools';
		$this->version = '0.6.4a';
		
		/* The parent construct is required for translations and must be called before the following */
		parent::__construct();
		
		$this->page = basename(__FILE__, '.php');
		
		// Create the feed in our default base directory
		if (!Configuration::get('googlebase_filepath'))
			Configuration::updateValue('googlebase_filepath', addslashes($this->defaultOutputFile()));
		if (!Configuration::get('googlebase_domain'))
			Configuration::updateValue('googlebase_domain', $_SERVER['HTTP_HOST']);
		if (!Configuration::get('googlebase_psdir'))
			Configuration::updateValue('googlebase_psdir', __PS_BASE_URI__);

		// generate securekey
		if (!Configuration::get('googlebase_securekey'))
			Configuration::updateValue('googlebase_securekey', strtoupper(Tools::passwdGen(16)));			
			
		//if (!Configuration::get('googlebase_description'))
		//	$this->warning = $this->l('No tienes configurado un feed de productos');
		$this->displayName = $this->l('Google Base Feed Products');
		$this->description = $this->l('Generación google base feed');
	}
	
	public function uninstall()
	{
		// Should cleanup the config variables to play nice
		Configuration::deleteByName('googlebase_filepath');
		Configuration::deleteByName('googlebase_domain');
		Configuration::deleteByName('googlebase_psdir');
		Configuration::deleteByName('googlebase_description');
		Configuration::deleteByName('googlebase_securekey');
		
		parent::uninstall();
	}
	
	private function directory()
	{
		return dirname(__FILE__).'/../../'; // move up to the __PS_BASE_URI__ directory
	}
	

	
	private function winFixFilename($file)
	{
		return str_replace('\\\\','\\',$file);
	}

	private function defaultOutputFile()
	{
	
		//$multishop = (int)Context::getContext()->shop->getContextShopID();
	
		// PHP on windows seems to return a trailing '\' where as on unix it doesn't
		$output_dir = realpath($this->directory());
		$dir_separator = '/';
		
		// If there's a windows directory separator on the end, 
		// then don't add the unix one too when building the final output file
		if (substr($output_dir, -1, 1)=='\\')
			$dir_separator = '';
		
		//$output_file = $output_dir.$dir_separator.strtolower(Language::getIsoById($this->_cookie->id_lang)).'_googlebase.xml'; 
		/*if($multishop == 2) {
			$output_file = $output_dir.$dir_separator.'gooxml/IDIOMA_ahorraclima.xml';		
		} else {*/
			$output_file = $output_dir.$dir_separator.'gooxml/IDIOMA_mundojunkers.xml';		
		//}

		return $output_file;
	}

	
	private function can_write($filename)
	{
		// Test if we can write the file specified in the config screen
		@unlink($filename);
		$fp = @fopen($filename, 'wb');
		@fclose($fp);
		return file_exists($filename); 
	}
		
	private function getPath($id_category, $path = '', $id_lang)
	{                
		//require_once("ave_convert.php");
		$category = new Category(intval($id_category), intval($id_lang));
				
		if (!Validate::isLoadedObject($category))
			//die (Tools::displayError());
                        return false;

		if ($category->id == 1 || $category->id == 2)
			{
			//return htmlentities(html_entity_decode($path),ENT_COMPAT,"UTF-8");
			//$code = htmlentities(html_entity_decode($path),ENT_COMPAT,"UTF-8");
			//require_once "html_convert_entities.php";
			return $path;
			//return html_convert_entities($code);
			}
		
		$pipe = ' > ';

		$category_name = $this->hideCategoryPosition($category->name);
		
		if ($path != $category_name)
			$path = $category_name.($path!='' ? $pipe.$path : '');

		return $this->getPath(intval($category->id_parent), $path, $id_lang);
	}
	
	public static function hideCategoryPosition($name)
	{
		//Tools::displayAsDeprecated();
		return preg_replace('/^[0-9]+\./', '', $name);
	}

	
	private function file_url()
	{
		$languages = Language::getLanguages(true);
		
		foreach($languages AS $lang) {
			$filename = $this->winFixFilename(str_replace('IDIOMA', Language::getIsoById($lang['id_lang']), Configuration::get('googlebase_filepath')));
			$root_path = realpath($this->directory());
			$file = str_replace($root_path,'', $filename);
			
			$separator = '';
			
			if (substr($file, 0, 1)=='\\')
				substr_replace($file, '/', 0, 1);
				
			if (substr($file, 0, 1)!='/')
				$separator = '/';
			
			return 'http://'.$_SERVER['HTTP_HOST'].$separator.$file;		
		}
		

	}
	
	private function _addToFeed($str, $id_lang)
	{
		$filename = $this->winFixFilename(str_replace('IDIOMA', Language::getIsoById($id_lang), Configuration::get('googlebase_filepath')));

		//var_dump($filename);

		if(file_exists($filename))
		{
			$fp = fopen($filename, 'ab');
			fwrite($fp, $str, strlen($str));
			fclose($fp);
		}
	} 
	
	
	private function _postProcess($id_lang)
	{
		global $cookie;
		require_once "ave_convert.php";



		$description = Configuration::get('googlebase_description');
		$domain = Configuration::get('googlebase_domain');
		$psdir = Configuration::get('googlebase_psdir');
		
		$link = new Link();
		$Products = Product::getProducts(intval($id_lang), 0, NULL, 'id_product', 'ASC');

		if($Products)
		{
			

			$this->_addToFeed("<?xml version=\"1.0\" encoding=\"UTF-8\" ?>\n\n"
			. "<rss version =\"2.0\" xmlns:g=\"http://base.google.com/ns/1.0\">\n\n"
            . "<channel>\n"
	        . "<title>Google Base feed for ".$domain."</title>\n"
	        . "<description><![CDATA[".$description."]]></description>\n"
	        . "<link>http://".$domain."/</link>\n"
			. "\n", $id_lang);
			
			//$multishop = (int)Context::getContext()->shop->getContextShopID();
				
			//if(Configuration::get('PS_SSL_ENABLED'))
			//	$http = 'https://';
			//else
				$http = 'http://';
					
			$items = "";
			foreach ($Products AS $Product)
			{
				/*echo '<pre>';
				print_r($Product);
				exit;*/
			  if ((int)$Product['active'] == 1) {                                
				//$image = Image::getImages(intval($id_lang), $Product['id_product']);
				$image = Image::getCover((int)$Product['id_product']);
				//$image_folder = Image::getImgFolderStatic($image['id_image']);
				//$imatge = 'img/p/'.$image_folder.''.$image['id_image'].'.jpg';

				//$expire_date = date('Y-m-d', strtotime("+30 days"));
				$product_link = $link->getProductLink($Product['id_product'], $Product['link_rewrite'], null, null, $id_lang);
					
				// Make 1.1 result look like 1.2
				//if (strpos( $product_link, $http) === false )        
				//	$product_link = $http.$_SERVER['HTTP_HOST'].$product_link;
				// remove the start to get a URI relative to __PS_BASE_URI__
				//$product_link = str_replace($http.$_SERVER['HTTP_HOST'].__PS_BASE_URI__,'',$product_link);                 				
				// Then build a full url according to the settings
				//$product_link = $http.$domain.$psdir.$product_link; 
				
				
				$product_link = str_replace('http://',$http,$product_link);    
	
	
				$items .= "<item>\n"
				//. "<g:id>"."pdlt".strtolower(Language::getIsoById($id_lang))."-".$Product['id_product']."</g:id>\n"			
				. "<g:id>mundojunk".Language::getIsoById($id_lang).$Product['id_product']."</g:id>\n"			
				. "<title><![CDATA[".$Product['name']."]]></title>\n";
				
				
				$substitueix = array('- ', ' -');			
				$marca = str_replace($substitueix, '', $Product['manufacturer_name']);			
				
				$existeix = 0;
		
				/*if((int)$Product['id_product'] == 1350 || (int)$Product['id_product'] == 1749 || (int)$Product['id_product'] == 1753 )	{
					$existeix = 0;
					$Product['ean13'] = false;
					$Product['reference'] = false;
				}*/

				if($marca) { $items .= "<g:brand><![CDATA[".$marca."]]></g:brand>\n"; $existeix++; }
				if($Product['ean13']) { $items .= "<g:gtin><![CDATA[".$Product['ean13']."]]></g:gtin>\n"; $existeix++; }				
				if($Product['reference']) { $items .= "<g:mpn><![CDATA[".$Product['reference']."]]></g:mpn>\n"; $existeix++; }
				
			
				$items .= "<g:identifier_exists>".($existeix >= 2 ? 'TRUE' : 'FALSE')."</g:identifier_exists>\n";

				$items.= "<g:condition>".$this->l('new')."</g:condition>\n";
				$items.= "<description><![CDATA[".substr(strip_tags($Product['description']), 0, 5000)."]]></description>\n";
				
				//. "<guid>".((int)$multishop == 2 ? 'org' : 'sil')."-".$Product['id_product']."</guid>\n";
				
				if (isset($image['id_image'])) {
					//	$items .= "<g:image_link>".'http://'.$domain.$psdir.'img/p/'.$image[0]['id_product'].'-'.$image[0]['id_image'].'-large.jpg'."</g:image_link>\n"; 
						// PER PRESTASHOP 1.4 
					//	$items .= "<g:image_link>".'http://'.$domain.$psdir.$Product['id_product'].'-'.$image[0]['id_image'].'-large_default/'.$Product['link_rewrite'].'.jpg'."</g:image_link>\n";
		
					$items .= "<g:image_link><![CDATA[".$http.$domain.$psdir.$image['id_image'].'-thickbox_default/'.$Product['link_rewrite'].'.jpg'."]]></g:image_link>\n";
					//$items .= "<g:image_link>".$http.$domain.$psdir.$imatge."</g:image_link>\n";
				
					$imatges = Image::getImages($id_lang, $Product['id_product']);
				
					foreach($imatges AS $imge) {
						if($imge['id_image'] != $image['id_image']) {
							//	$image_a_folder = Image::getImgFolderStatic($imge['id_image']);
							//	$imatge_a = 'img/p/'.$image_a_folder.''.$imge['id_image'].'.jpg';					
							//	$items .= "<g:additional_image_link>".$http.$domain.$psdir.$imatge_a."</g:additional_image_link>\n";	
							$items .= "<g:additional_image_link><![CDATA[".$http.$domain.$psdir.$imge['id_image'].'-thickbox_default/'.$Product['link_rewrite'].'.jpg'."]]></g:additional_image_link>\n";
						}					
					}
			
				}
			
				$price = Product::getPriceStatic(intval($Product['id_product']), true, NULL, 2, null, false, false);
				$price_s = Product::getPriceStatic(intval($Product['id_product']), true, NULL, 2);		

				
				
				$iso_lang = Language::getIsoById($id_lang);					
			
				$items .= "<link><![CDATA[".$product_link."]]></link>\n"
				//. "<g:price>".Product::getPriceStatic(intval($Product['id_product']))."</g:price>\n"
				. "<g:price>". $price." EUR</g:price>\n";
				
				
				if($price_s < $price) {
					$items .= "<g:sale_price>".$price_s." EUR</g:sale_price>\n";			
				}
				
				$items .= "<g:product_type>".$this->getPath($Product['id_category_default'], '', $id_lang)."</g:product_type>\n";
				
				$dispo = '';

				if(!$Product['available_for_order']) {
					$dispo = 'out of stock';
					$quantity = 0;
				} else {
					if((int)$Product['out_of_stock'] == 0) {
						$dispo = 'out of stock';
						
					} elseif((int)$Product['out_of_stock'] == 1 || (int)$Product['out_of_stock'] == 2) {
					
						$dispo = 'in stock';		
						
						if((int)$Product['quantity'] == 0) {	
							$dispo = 'in stock';				
						}
					}

					$quantity = Product::getQuantity($Product['id_product'], 0);

				}


				
				$items .= "<g:availability>".((int)$quantity > 0 ? 'in stock' : $dispo)."</g:availability>\n";
				//$items .= "<g:availability>".$dispo."</g:availability>\n";

				
				$items .= "<g:shipping>\n";
					//$items .= "<g:country>".(strtoupper($iso_lang) == 'EN' ? 'UK' : strtoupper($iso_lang))."</g:country>\n";		 
					
					
					$id_country = Country::getByIso('us');
					$id_zone = Country::getIdZone((int)$id_country);

					
					$carriers = Carrier::getCarriers($id_lang);
					$id_default_carrier = Carrier::getDefaultCarrierSelection($carriers);
					
					$carrier = new Carrier($id_default_carrier);


					
					
					if($carrier->shipping_method == 1)
						$shipping = $carrier->getDeliveryPriceByWeight(($Product['weight'] ? $Product['weight'] : 0), $id_zone);
					else if($carrier->shipping_method == 2)
						$shipping = $carrier->getDeliveryPriceByPrice($price, $id_zone);

		 			
						
					if($shipping)
						$items .= "<g:price>".(floor(($shipping*100))/100)." EUR</g:price>\n";
					else
						$items .= "<g:price>0.00 EUR</g:price>\n";

				$items .= "</g:shipping>\n"; 

/* 	35 	Calderas 	
	36 	Aires Acondicionados 		
	56 	Calentadores y termos 	
	59 	Radiadores 	
	64 	Estufas 
	67 	Termostatos 
	68 	Tratamiento Agua 		
	71 	Ventiladores 		
	72 	Humidificadores 		
	73 	Deshumidificadores 		
	74 	Fabricantes 		
	93 	Bombas de Calor 	*/		

					$categories_disp = array(150, 155, 157, 209, 221);

					$categories_prod = Product::getProductCategories((int)$Product['id_product']);
					$categoria_principal = 0;

					foreach($categories_prod AS $kk => $catcat) {

						if(in_array((int)$catcat, $categories_disp))
							$categoria_principal = (int)$catcat;

					}

					if($categoria_principal == 0) {

						if(in_array((int)$Product['id_category_default'], $categories_disp)) {

							$categoria_principal = (int)$Product['id_category_default'];

						} else {
							$categoria = new Category((int)$Product['id_category_default']);

							if (in_array((int)$categoria->id_parent, $categories_disp)) {
								$categoria_principal = (int)$categoria->id_parent;
								
							} else {

								$categoria2 = new Category((int)$categoria->id_parent);

								if (in_array((int)$categoria2->id_parent, $categories_disp))
									$categoria_principal = (int)$categoria2->id_parent;
								else {
									$categoria3 = new Category((int)$categoria2->id_parent);

									if (in_array((int)$categoria3->id_parent, $categories_disp)) {
										$categoria_principal = (int)$categoria3->id_parent;
									} else {
										$categoria_principal = 0;
									}

								}
							}

						}
						

					}



					/*if((int)$Product['id_product'] == 120) {
						var_dump($categoria_principal);
					}*/


					switch ((int)$categoria_principal) {
						case 150:
							$items .= "<g:google_product_category>3082</g:google_product_category>\n"; // 3082	Casa y jardín	Electrodomésticos	Control del clima	Calderas
						break;
						case 150:
							$items .= "<g:google_product_category>605</g:google_product_category>\n"; // 605	Casa y jardín	Electrodomésticos	Control del clima	Sistemas de aire acondicionado
						break;
						case 157:
							$items .= "<g:google_product_category>621</g:google_product_category>\n"; // 621	Casa y jardín	Electrodomésticos	Calentadores de agua
						break;
						case 209:
							$items .= "<g:google_product_category>2060</g:google_product_category>\n"; // 2060	Casa y jardín	Electrodomésticos	Control del clima	Radiadores
						break;
						case 26:
							$items .= "<g:google_product_category>2649</g:google_product_category>\n"; // 2649	Casa y jardín	Electrodomésticos	Control del clima	Estufas para terrazas
						break;
						default:
							$items .= "<g:google_product_category>1626</g:google_product_category>\n"; // 1626	Casa y jardín	Electrodomésticos	Control del clima

					}


	// 27 ventiladores
					// 28 calderas condensación
				
				
			
				//if ($Product['weight']>0)
					//$items .= "<g:weight>".$Product['weight']." ".Configuration::get('PS_WEIGHT_UNIT')."</g:weight>\n";
				$items .= "</item>\n\n";
			  }
		
		/*		$producte = new Product((int)$Product['id_product']);
				$combination = $producte->getAttributeCombinaisons(intval($cookie->id_lang));	
				
				

				
				foreach($combination AS $combi) {
				
					
					$product = new Product((int)$combi['id_product']);		
					
					$image = Combination::getWsImages((int)$combi['id_product_attribute']);
					
					
					$product_link = $link->getProductLink((int)$combi['id_product'], $product->link_rewrite[3]);
					
					if (strpos( $product_link, 'http://' ) === false)        
						$product_link = 'http://'.$_SERVER['HTTP_HOST'].$product_link;
						
					$product_link = str_replace('http://'.$_SERVER['HTTP_HOST'].__PS_BASE_URI__,'',$product_link);   				
					$product_link = 'http://'.$domain.$psdir.$product_link; 

					$items_combi .= "<item>\n"
					. "<g:id>"."pdlt".strtolower(Language::getIsoById($this->_cookie->id_lang))."-".$combi['id_product']."_".$combi['id_product_attribute']."-".$combi['id_attribute']."</g:id>\n"			
					. "<title><![CDATA[".$product->name[3]." ".$combi['group_name']." ".$combi['attribute_name']."]]></title>\n";		

					$substitueix = array('- ', ' -');			
					$marca = str_replace($substitueix, '', $product->manufacturer_name);	
					
					$items_combi .= "<g:brand><![CDATA[".$marca."]]></g:brand>\n";
					$items_combi .= "<g:gtin>".$combi['ean13']."</g:gtin>\n";					
					// HASTA AQUI!!!
					
					$items_combi.= "<g:condition>".$this->l('new')."</g:condition>\n";
					$items_combi.= "<description><![CDATA[".ave_convert(strip_tags($product->description_short[3]))."]]></description>\n"					
					. "<guid>"."pdlt".strtolower(Language::getIsoById($this->_cookie->id_lang))."-".$combi['id_product']."_".$combi['id_product_attribute']."-".$combi['id_attribute']."</guid>\n";					
					

					if (isset($image[0])) {
						$items_combi .= "<g:image_link>".'http://'.$domain.$psdir.$combi['id_product'].'-'.$image[0]['id'].'-large/'.$product->link_rewrite[3].'.jpg'."</g:image_link>\n";
					} else {
							$image_prod = Image::getImages(intval($this->_cookie->id_lang), $combi['id_product']);
							if (isset($image_prod[0])) {
								$items_combi .= "<g:image_link>".'http://'.$domain.$psdir.$combi['id_product'].'-'.$image_prod[0]['id_image'].'-large/'.$product->link_rewrite.'.jpg'."</g:image_link>\n";
							}					
					}

					$items_combi .= "<link>".$product_link."</link>\n"
					//. "<g:price>".Product::getPriceStatic(intval($combi['id_product']))."</g:price>\n"
					. "<g:price>".Product::getPriceStatic(intval($combi['id_product']), true, $combi['id_product_attribute'], 2)."</g:price>\n"
					. "<g:product_type>".$this->getPath($product->id_category_default, '')."</g:product_type>\n";


						if($product->out_of_stock == 0 || $product->out_of_stock == 2) {
							$dispo = 'out of stock';
							
						} elseif($product->out_of_stock == 1) {

							$dispo = 'in stock';		
							
							if($product->quantity == 0) {	
								$dispo = 'available for order';				
							}
						}


						$items_combi .= "<g:availability>".($combi['quantity'] > 0 ? 'in stock' : $dispo)."</g:availability>\n";

						if ($combi['weight']>0)
							$items_combi .= "<g:weight>".$combi['weight']." ".Configuration::get('PS_WEIGHT_UNIT')."</g:weight>\n";
						$items_combi .= "</item>\n\n";
						
				}*/	

	  		  
			}  

/*var_dump($items);
exit;*/
/*var_dump($items_combi);
*/
			  
			  $items = $items;
			  
			$this->_addToFeed("$items</channel>\n</rss>\n" , $id_lang);
		}		
		$res = file_exists($this->winFixFilename(str_replace('IDIOMA', Language::getIsoById($id_lang), Configuration::get('googlebase_filepath'))));
		$this->_html .= '<h3 class="'. ($res ? 'conf confirm' : 'alert error') .'" style="margin-bottom: 20px">';
		$this->_html .= $res ? $this->l('Feed file successfully generated') : $this->l('Error while creating feed file');
		$this->_html .= '</h3>';
	
	}
	
	private function _displayFeed()
	{
		$languages = Language::getLanguages(true);
		foreach($languages AS $lang) {
			$filename = $this->winFixFilename(str_replace('IDIOMA', Language::getIsoById($lang['id_lang']), Configuration::get('googlebase_filepath')));
			if(file_exists($filename))
			{
				$fp = fopen($filename, 'rb');
				$fstat = fstat($fp);
				fclose($fp);
				
				$this->_html .= '<fieldset><legend><img src="../img/admin/enabled.gif" alt="" class="middle" />'.$this->l('Feed Generated').'</legend>';
				if (strpos($filename,realpath($this->directory())) === FALSE)
				{
					$this->_html .= '<p><b>'.$filename.'</b></p><br />';
				} else {
					$this->_html .= '<p><a href="'.$this->file_url().'"><b>'.$this->file_url().'</b></a></p><br />';
				}
				$this->_html .= '<div style="font-size:20px;">'.$this->l('FITXER XML ACTUALITZAT:').' <b>'.date('m/d/Y H:i:s', $fstat['mtime']).'</b></div><br />';
				$this->_html .= '</fieldset>';
				
				// show secure key

				$this->_html .= $this->l('Secure Key').' <b>'.Configuration::get('googlebase_securekey').'</b><br />';
				$this->_html .= '</fieldset>';		
				
			} else {
				$this->_html .= '<fieldset><legend><img src="../img/admin/delete.gif" alt="" class="middle" />'.$this->l('No Feed Generated').'</legend>';
				$this->_html .= '<br /><h3 class="alert error" style="margin-bottom: 20px">No feed file has been generated at this location yet!</h3>';
				$this->_html .= '</fieldset>';
			}		
		}		

	}
	
	private function _displayForm()
	{
	/*(isset($_POST['filepath']) ? $_POST['filepath'] : $this->winFixFilename(Configuration::get('googlebase_filepath')))*/
		$this->_html .=
			'<form action="'.$_SERVER['REQUEST_URI'].'" method="post">
				<br />
				<center><input name="btnSubmit" class="button" value="'.((!file_exists($this->winFixFilename(Configuration::get('googlebase_filepath')))) ? $this->l('Generate feed file') : $this->l('Update feed file')).'" type="submit" /></center>
				<hr />
				<fieldset>
					<legend><img src="../img/admin/cog.gif" alt="" class="middle" />'.$this->l('Standard Settings').'</legend>
					<fieldset class="space">
						<p style="font-size: smaller;"><img src="../img/admin/unknown.gif" alt="" class="middle" />'.$this->l('The minimum <em>required</em> configuration is to define a description for your feed. This should be text (not html), up to a maximum length of 10,000 characters. Ideally, greater than 15 characters and 3 words.').'</p>
					</fieldset>
					<br />
					<label>'.$this->l('Feed Description: ').'</label>
					<div class="margin-form">
						<textarea name="description" rows="5" cols="80" >'.Tools::getValue('description', Configuration::get('googlebase_description')).'</textarea>
						<p class="clear">'.$this->l('Example:').' Our range of fabulous products</p>
					</div>
					<label>'.$this->l('Output Location: ').'</label>
					<div class="margin-form">
						<input name="filepath" type="text" style="width: 600px;" value="'.$this->defaultOutputFile().'"/>
						<p class="clear">'.$this->l('Example (default):').' '.$this->defaultOutputFile().'</p>
					</div>
				</fieldset>
				<fieldset>
					<legend><img src="../img/admin/cog.gif" alt="" class="middle" />'.$this->l('Advanced Settings').'</legend>
					<fieldset class="space">
						<p style="font-size: smaller;"><img src="../img/admin/unknown.gif" alt="" class="middle" />'.$this->l('The following settings allow you to create a feed based on a remote server configuration, for example when generating a feed on a local server installation for use on a live server. These should not normally be modified. Note that the Shop Base should specify the PrestaShop directory on the remote server and end in a \'/\'. The module will clean and replace invalid entries where possible.').'</p>
					</fieldset>
					<br />
					<label>'.$this->l('Domain: ').'</label>
					<div class="margin-form">
						<input name="domain" type="text" style="width: 600px;" value="'.Tools::getValue('domain', Configuration::get('googlebase_domain')).'"/>
						<p class="clear">'.$this->l('Example (default):').' '.$_SERVER['HTTP_HOST'].'</p>
					</div>
					<label>'.$this->l('Shop Base: ').'</label>
					<div class="margin-form">
						<input name="psdir" type="text" style="width: 600px;" value="'.Tools::getValue('psdir', Configuration::get('googlebase_psdir')).'"/>
						<p class="clear">'.$this->l('Example (default):').' '.__PS_BASE_URI__.'</p>
					</div>
				</fieldset>
				<br />
				<input name="btnSubmit" class="button" value="'.((!file_exists($this->winFixFilename(Configuration::get('googlebase_filepath')))) ? $this->l('Generate feed file') : $this->l('Update feed file')).'" type="submit" />
			</form>';
	}
		
	private function _postValidation()
	{
		// Used $_POST here to allow us to modify them directly - naughty I know :)
		if (empty($_POST['domain']) OR strlen($_POST['domain']) < 3)
		{
			$this->_postErrors[] = $this->l('Domain is required/invalid.');
		} else {
			// Clean the domain name, just in case someone puts more than just a plain domain name in there
			$domain_split = explode('/',str_replace('http://','', $_POST['domain']));
			$_POST['domain']=$domain_split[0];
		}

		if (empty($_POST['psdir']))
		{
			$this->_postErrors[] = $this->l('Shop base is required.');
		} else {
			// Need to be absolutely sure that $psdir starts and ends with a '/'
			if (substr($_POST['psdir'], -1, 1)!='/')
				$_POST['psdir'] = $_POST['psdir'].'/';
			if (substr($_POST['psdir'], 0, 1)!='/')
				$_POST['psdir'] = '/'.$_POST['psdir'];
		}
		
		if (empty($_POST['description']) OR strlen($_POST['description']) > 10000)
			$this->_postErrors[] = $this->l('Description is invalid');
		// could check that this is a valid path, but the next test will
		// do that for us anyway
		// But first we need to get rid of the escape characters
		
		$languages = Language::getLanguages(true);
		
		/*foreach($languages AS $lang) {
			$_POST['filepath'] = $this->winFixFilename(str_replace('IDIOMA', Language::getIsoById($lang['id_lang']), Configuration::get('googlebase_filepath')));
			if (empty($_POST['filepath']) OR (strlen($_POST['filepath']) > 255))
				$this->_postErrors[] = $this->l('The target location is invalid');
			
			if (!$this->can_write($_POST['filepath']))
				$this->_postErrors[] = $this->l('The output location is invalid.<br />Cannot write to').' '.$_POST['filepath'];		
		}*/
		

	}
	
	function getContent()
	{
		$this->_html .= '<h2>'.$this->l('Google Base Products Feed').'</h2>';
		
		if (Tools::isSubmit('btnSubmit'))
		{			
			$this->_postValidation();
			
			if (!sizeof($this->_postErrors))
			{
				Configuration::updateValue('googlebase_description', Tools::getValue('description'));
				Configuration::updateValue('googlebase_filepath', addslashes($_POST['filepath'])); // the Tools class kills the windows file name separators :(				
				Configuration::updateValue('googlebase_domain', Tools::getValue('domain')); // may have been "fixed" by the validation function
				Configuration::updateValue('googlebase_psdir', Tools::getValue('psdir'));	// may have been "fixed" by the validation function
				// Go try and generate the feed
				$languages = Language::getLanguages(true);	
				foreach($languages AS $lang) {
						$this->_postProcess($lang['id_lang']);
				}				
			}
			else
			{
				foreach ($this->_postErrors AS $err)
				{
					$this->_html .= '<div class="alert error">'.$err.'</div>';
				}
			}
		}
			
		$this->_displayFeed();
		$this->_displayForm();
		
		return $this->_html;
	}
	
		public function cronTask() {


		$languages = Language::getLanguages(true);
		
		foreach($languages AS $lang) {


		$filename = $this->winFixFilename(str_replace('IDIOMA', $lang['iso_code'], Configuration::get('googlebase_filepath')));


		//Create file empty.
			if(file_exists($filename))
			{
				$fp = fopen($filename, 'w');
				fclose($fp);
			}


		// Go try and generate the feed
				$this->_postProcess($lang['id_lang']);
		}
		
	}
	
	

}
?>
