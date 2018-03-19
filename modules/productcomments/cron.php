<?php


include(dirname(__FILE__).'/../../config/config.inc.php');
include(dirname(__FILE__).'/../../init.php');
include(dirname(__FILE__).'/productcomments.php');

$clau = isset($_GET['clau'])?$_GET['clau']:$argv[1];


if ($clau)
{
	$secureKey = Configuration::get('productcomments_securekey');
	if (!empty($secureKey) AND $secureKey === $clau)
	{

		$tipus = isset($_GET['tipus'])?$_GET['tipus']:$argv[2];


		$productcomments = new productcomments();
		$productcomments->cronTask($tipus);

	}
}

?>