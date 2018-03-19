<?php

include(dirname(__FILE__).'/../../config/config.inc.php');
include(dirname(__FILE__).'/../../init.php');
include(dirname(__FILE__).'/googlebase.php');

if($_GET['avellana'] == 1)
{
	$productes = Product::getProducts(1, 0, NULL, 'id_product', 'ASC');
	//var_dump($productes);
	//exit; //  'id_tax_rules_group
	foreach($productes AS $prod) {
		//var_dump($prod['id_product']);

		//if((int)$prod['id_product'] > 104)
		//{	
				$preu_noiva = $prod['price'];



				if((int)$prod['price'] > 0)
				{
			
					$price = Product::getPriceStatic(intval($prod['id_product']), true, NULL, 2, null, false, false);
					//$price_s = Product::getPriceStatic(intval($prod['id_product']), true, NULL, 2);		
					//$iva = Tax::getProductTaxRate($prod['id_product']);

					echo 'ID PROD: '.$prod['id_product'].'<br>preu normal: '.$price.'<br>';
					//echo 'preu reduit que s\'ha de guardar: '.$price_s.'<br>';
					//echo 'preu abstracte original 30%: '.($price_s/0.70).'<br>';
					//echo 'es guardarà '.(float)number_format($price_s / (1 + $iva / 100), 6, '.', '');
					//echo '<br><br>';

					$producte = new Product((int)$prod['id_product']);


					if($producte->financia_mesos > 0) {
						
						echo '<br>'.(float)number_format($price / (int)$producte->financia_mesos, 6, '.', '').'<br>';



						$producte->financia_price = (float)number_format($price / (int)$producte->financia_mesos, 6, '.', '');
						
						if($producte->update())
						{
							echo 'Guardat '.$producte->financia_price.'<br><br>';
						}

						//exit;

					}


					/*$conta_specifics = count(SpecificPrice::getByProductId($prod['id_product']));

					if($conta_specifics > 0) {
						if(SpecificPrice::deleteByProductId((int)$prod['id_product']))
						{
							$producte = new Product((int)$prod['id_product']);
							$producte->price = (float)number_format($price_s / (1 + $iva / 100), 6, '.', '');
							if($producte->update())
								echo '<br> <b>OK PROD '.$prod['id_product'].': '.$producte->price.'</b><br>';			
						}
					}*/

				}

		//}
		



/*
		
		$percent = (float)$iva/100;

		var_dump($preu_noiva);
		$afegeix_preu = $preu_noiva * $percent;
		var_dump($afegeix_preu);

		$preufinal = $preu_noiva + $afegeix_preu;

		var_dump($preufinal);
		exit;*/
	}
exit;
}


$kkey = (isset($_GET['secure_key']) ? $_GET['secure_key'] : $argv[1]);
if (isset($kkey))
{

	$secureKey = Configuration::get('googlebase_securekey');
	if (!empty($secureKey) AND $secureKey === $kkey)
	{

		$gbase = new GoogleBase();
		$gbase->cronTask();

	}
}

?>