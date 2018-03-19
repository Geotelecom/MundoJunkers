{*
* 2007-2014 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2014 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

<!-- Block payment logo module -->
<div id="roy_payment_logo_block_footer" class="roy_payment_logo_block">
{l s="Payment accept:"}
	<a href="{$link->getCMSLink($cms_payement_logo)|escape:'html'}">
		<img src="{$img_dir}paymentlogo_visa.png" class="pl_visa" alt="visa" width="50" height="30" />
		<img src="{$img_dir}paymentlogo_mastercard.png" class="pl_mastercard" alt="mastercard" width="50" height="30" />
		<img src="{$img_dir}paymentlogo_maestro.png" class="pl_maestro" alt="maestro" width="50" height="30" />
		<img src="{$img_dir}paymentlogo_discover.png" class="pl_discover" alt="discover" width="50" height="30" />
		<img src="{$img_dir}paymentlogo_paypal.png" class="pl_paypal" alt="paypal" width="50" height="30" />
	</a>
</div>
<!-- /Block payment logo module -->