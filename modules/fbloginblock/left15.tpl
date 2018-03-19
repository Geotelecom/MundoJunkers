{*
/**
 * StorePrestaModules SPM LLC.
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the EULA
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://storeprestamodules.com/LICENSE.txt
 *
 /*
 * 
 * @author    StorePrestaModules SPM <kykyryzopresto@gmail.com>
 * @category others
 * @package fbloginblock
 * @copyright Copyright (c) 2011 - 2014 SPM LLC. (http://storeprestamodules.com)
 * @license   http://storeprestamodules.com/LICENSE.txt
 */
*}

{if $fbloginblock_leftcolumnf == "leftcolumnf" || $fbloginblock_leftcolumng == "leftcolumng" 
    || $fbloginblock_leftcolumnp == "leftcolumnp" || $fbloginblock_leftcolumnt == "leftcolumnt" 
	|| $fbloginblock_leftcolumny == "leftcolumny" || $fbloginblock_leftcolumnl == "leftcolumnl"
	|| $fbloginblock_leftcolumnm == "leftcolumnm"}

{if !$fbloginblockislogged}

<div class="block">
		<h4 style="text-align:left;">{l s='Your account' mod='fbloginblock'}</h4>
<form action="{$base_dir_ssl}{if $fbloginblockis_rewrite == 1}{$fbloginblockiso_lang}{if $fbloginblockis15 == 1}login{else}authentication{/if}{else}authentication.php{/if}" method="post">
		<fieldset style="border-bottom:1px none #D0D3D8;border-top:none;background-color:#F1F2F4">
		<div class="form_content clearfix">
			<p class="text" style="padding-bottom:10px">
				<br/>
				<label for="email" style="margin-left:10px"><b>{l s='E-mail:' mod='fbloginblock'}</b></label>
				<br/>
				<span  style="margin-left:10px"><input type="text" id="email" name="email" 
							 value="{if isset($smarty.post.email)}{$smarty.post.email|escape:'htmlall'|stripslashes}{/if}" 
							 class="account_input" style="width:14em"/>
				</span>
			</p>
			<p class="text" style="padding-bottom:10px">
				<br/>
				<label for="passwd"  style="margin-left:10px"><b>{l s='Password:' mod='fbloginblock'}</b></label>
				<br/>
				<span  style="margin-left:10px"><input type="password" id="passwd" name="passwd" 
							 value="{if isset($smarty.post.passwd)}{$smarty.post.passwd|escape:'htmlall'|stripslashes}{/if}" 
							 class="account_input" style="width:14em"/>
				</span>
			</p>
				{if isset($back)}
					<input type="hidden" class="hidden" name="back" value="{$back|escape:'htmlall':'UTF-8'}"  style="margin-left:10px" />
				{/if}
				
				<div class="fbtwgblock-columns15">
				<input type="submit" id="SubmitLogin" name="SubmitLogin" class="button" 
						value="{l s='Log in' mod='fbloginblock'}" />
				<div style="clear:both"></div>
				{if $fbloginblock_leftcolumnf == "leftcolumnf" && $fbloginblockf_on == 1}
				<a href="javascript:void(0)" onclick="return fblogin();" 
				   title="Facebook" >
	   				<img src="{$fbloginblockfacebooksmallimg}" alt="Facebook"  />
	 			</a>
	 			{/if}
	 			{if $fbloginblock_leftcolumnt == "leftcolumnt" && $fbloginblockt_on == 1}
	 			<a href="javascript:void(0)" title="Twitter" 
				{if $fbloginblocktconf == 1}
		   		   onclick="javascript:popupWin = window.open('{$base_dir}modules/fbloginblock/twitter.php{if $fbloginblockorder_page == 1}?http_referer={$fbloginblockhttp_referer|urlencode}{/if}', 'login', 'location,width=600,height=600,top=0'); popupWin.focus();"
		   		{else}
					onclick="alert('{$terror|escape:'htmlall'}')"
				{/if}  
		   		>
						<img src="{$fbloginblocktwittersmallimg}" alt="Twitter" />
				</a>
				{/if}
	 			{if $fbloginblock_leftcolumng == "leftcolumng" && $fbloginblockg_on == 1}
	 			<a href="javascript:void(0)" title="Google" 
		   		   onclick="javascript:popupWin = window.open('{$base_dir}modules/fbloginblock/login.php?p=google{if $fbloginblockorder_page == 1}&http_referer={$fbloginblockhttp_referer|urlencode}{/if}', 'openId', 'location,width=512,height=512,top=0');popupWin.focus();">
						<img src="{$fbloginblockgooglesmallimg}" alt="Google" />
				</a>
				{/if}
				 {if $fbloginblock_leftcolumny == "leftcolumny" && $fbloginblocky_on == 1}
				<a href="javascript:void(0)" title="Yahoo"
		   			onclick="javascript:popupWin = window.open('{$base_dir}modules/fbloginblock/login.php?p=yahoo{if $fbloginblockorder_page == 1}&http_referer={$fbloginblockhttp_referer|urlencode}{/if}', 'openId', 'location,width=400,height=300,top=0');popupWin.focus();">
					<img src="{$fbloginblockyahoosmallimg}" alt="Yahoo"  />
				</a>
	 			{/if}
				{if $fbloginblock_leftcolumnp == "leftcolumnp" && $fbloginblockp_on == 1}
	 			<a href="javascript:void(0)" title="Paypal" 
			   		{if $fbloginblockpconf == 1} 
			   		   onclick="javascript:popupWin = window.open('{$base_dir}modules/fbloginblock/paypalconnect.php{if $fbloginblockorder_page == 1}?http_referer={$fbloginblockhttp_referer|urlencode}{/if}', 'openId', 'location,width=512,height=512,top=0');popupWin.focus();">
			   		{else}
						onclick="alert('{$perror|escape:'htmlall'}')">
					{/if}
		 				<img src="{$fbloginblockpaypalsmallimg}" alt="Paypal" />
				</a>
				{/if}
				{if $fbloginblock_leftcolumnl == "leftcolumnl" && $fbloginblockl_on == 1}
	 			<a href="javascript:void(0)" title="LinkedIn" 
		   		    {if $fbloginblocklconf == 1}  
		   		   		onclick="javascript:popupWin = window.open('{$base_dir}modules/fbloginblock/linkedin.php{if $fbloginblockorder_page == 1}?http_referer={$fbloginblockhttp_referer|urlencode}{/if}', 'openId', 'location,width=512,height=512,top=0');popupWin.focus();">
		   			{else}
				   		onclick="alert('{$lerror|escape:'htmlall'}')">
					{/if}
		 			<img src="{$fbloginblocklinkedinsmallimg}" alt="LinkedIn" />
				</a>
				{/if}
				{if $fbloginblock_leftcolumnm == "leftcolumnm" && $fbloginblockm_on == 1}
	 			<a href="javascript:void(0)" title="Microsoft Live" class="fbloginblock-last"
		   		{if $fbloginblockmconf == 1}
		   		   onclick="javascript:popupWin = window.open('{$base_dir}modules/fbloginblock/microsoft.php{if $fbloginblockorder_page == 1}?http_referer={$fbloginblockhttp_referer|urlencode}{/if}', 'openId', 'location,width=512,height=512,top=0');popupWin.focus();">
		   		{else}
		       		onclick="alert('{$merror|escape:'htmlall'}')">
				 {/if}
		        
		        	<img src="{$fbloginblockmicrosoftsmallimg}" alt="Microsoft Live" />
				</a>
				{/if}
				<div style="clear:both"></div>
				</div>
			<p class="lost_password" style="margin-top:10px;">
				<a style="margin-left:10px" href="{$base_dir}{if $fbloginblockis_rewrite == 1}{$fbloginblockiso_lang}password-recovery{else}password.php{/if}">{l s='Forgot your password?' mod='fbloginblock'}</a>
			</p>
			</div>
		</fieldset>
</form>
</div>

{else}
<div class="block">
		<h4 style="text-align:left;">{l s='Your account' mod='fbloginblock'}</h4>
		<div class="block_content" style="background-color:#F1F2F4">
		<br/>
		<p style="padding-left:10px">
			{l s='Welcome' mod='fbloginblock'},<br/> <b>{$customerName}</b> (<a href="{$base_dir}{if $fbloginblockis_rewrite == 1}{$fbloginblockiso_lang}{else}index.php{/if}?mylogout" 
											 title="{l s='Log out' mod='fbloginblock'}"
											 style="text-decoration:underline">{l s='Log out' mod='fbloginblock'}</a>)
		</p>
		<br/>
		
		<div style="padding-left:10px">
				<img src="{$img_dir}icon/my-account.gif" alt="{l s='Your Account' mod='fbloginblock'}"/>
				<a href="{$base_dir_ssl}{if $fbloginblockis_rewrite == 1}{$fbloginblockiso_lang}my-account{else}my-account.php{/if}" 
				   title="{l s='Your Account' mod='fbloginblock'}"><b>{l s='Your Account' mod='fbloginblock'}</b></a>
		</div>  
		 <br/> 
		<div style="padding-left:10px">
			<img src="{$img_dir}icon/cart.gif" alt="{l s='Your Shopping Cart' mod='fbloginblock'}"/>
			<a href="{$base_dir_ssl}{if $fbloginblockis_rewrite == 1}{$fbloginblockiso_lang}order{else}order.php{/if}" title="{l s='Your Shopping Cart' mod='fbloginblock'}"><b>{l s='Cart:' mod='fbloginblock'}</b></a>
			<span class="ajax_cart_quantity{if $cart_qties == 0} hidden{/if}">{$cart_qties}</span>
			<span class="ajax_cart_product_txt{if $cart_qties != 1} hidden{/if}">{l s='product' mod='fbloginblock'}</span>
			<span class="ajax_cart_product_txt_s{if $cart_qties < 2} hidden{/if}">{l s='products' mod='fbloginblock'}</span>
			
				<span class="ajax_cart_total{if $cart_qties == 0} hidden{/if}">
					{if $priceDisplay == 1}
						{convertPrice price=$cart->getOrderTotal(false, 4)}
					{else}
						{convertPrice price=$cart->getOrderTotal(true, 4)}
					{/if}
				</span>
			<span class="ajax_cart_no_product{if $cart_qties > 0} hidden{/if}">{l s='(empty)' mod='fbloginblock'}</span> 
		</div>
		 <br/>
		</div>
</div>

{/if}

{/if}