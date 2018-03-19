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

{if !$fbloginblockislogged}

{literal}
<style type="text/css">
.header_user_info_ps16{float:right;padding:9px;border-left: 1px solid #515151;}

.wrap a{text-decoration:none;opacity:1}
.wrap a:hover{text-decoration:none;opacity:0.5}
.width_fbloginblock{margin-top:12px}

.wrap1 a{text-decoration:none;opacity:1}
.wrap1 a:hover{text-decoration:none;opacity:0.5}
.width_fbloginblock1{width:40px}

.fbtwgblock-columns15{margin-top:10px;margin-left:10px}
.fbtwgblock-columns{margin-top:10px}

.fbtwgblock-columns15 a{float:left;margin-top:10px;margin-right:5px;opacity:1}
.fbtwgblock-columns15 a:hover{float:left;margin-top:10px;margin-right:5px;opacity:0.5}
.fbtwgblock-columns15 a.fbloginblock-last{margin-right:0px!important;}

.fbtwgblock-columns a{float:left;margin-top:10px;margin-right:5px;opacity:1}
.fbtwgblock-columns a:hover{float:left;margin-top:10px;margin-right:5px;opacity:0.5}
.fbtwgblock-columns a.fbloginblock-last{margin-right:0px!important;}

a.fbloginblock-log-in:hover{opacity:0.5}
a.fbloginblock-log-in{opacity:1} 
{/literal}
{if $fbloginblock_topf == "topf" || $fbloginblock_topg == "topg" 
|| $fbloginblock_topt == "topt" || $fbloginblock_topl == "topl"
|| $fbloginblock_topm == "topm"}
{literal}
#follow-teaser  {
	background-color:#F3F3F3;
	border-bottom:none;
	text-shadow:#7e9f5f 1px 1px;
	color:white;
	font-weight:bold;
	padding:10px 0;
	font-size:1.05em;
	/*margin-bottom:20px;*/
}
#follow-teaser .wrap {
    margin: auto;
    position: relative;
    width: auto;
	text-align:center
}

{/literal}
{/if}

{if $fbloginblock_footerf == "footerf" || $fbloginblock_footerg == "footerg" 
    || $fbloginblock_footert == "footert" 
     || $fbloginblock_footerl == "footerl"
	|| $fbloginblock_footerm == "footerm"}
{literal}
#follow-teaser-footer  {
	background-color:#F3F3F3;
	border-bottom:none;
	text-shadow:#7e9f5f 1px 1px;
	color:white;
	font-weight:bold;
	padding:10px 0;
	font-size:1.05em;
	width:100%;
	/*position:absolute;*/
	left:0px;
	margin-top:0px;
}
#follow-teaser-footer .wrap {
    margin: auto;
    position: relative;
    /*width: 52%;*/
	text-align:center
}

{/literal}
{/if}
{literal}
</style>
{/literal}
{/if}



{if !$fbloginblockislogged}

{literal}
<script type="text/javascript">
{/literal}
{if $fbloginblockis16 != 1}	
{literal}
<!--
//<![CDATA[
{/literal}
{/if}
{if $fbloginblock_footerf == "footerf" || $fbloginblock_footerg == "footerg" 
     || $fbloginblock_footert == "footert" 
     || $fbloginblock_footerl == "footerl"
    || $fbloginblock_footerm == "footerm"}
{literal}


$(document).ready(function() {
	var bottom_teaser = '<div id="follow-teaser-footer">'+
	'<div class="wrap">'+
	
	{/literal}
	{if $fbloginblock_footerf == "footerf" && $fbloginblockf_on == 1}{literal}
	'<a href="javascript:void(0)" onclick="return fblogin();" title="Facebook">'+
		'<img src="{/literal}{$fbloginblockfacebookimg}{literal}" class="width_fbloginblock" alt="Facebook"  />'+
	'</a>&nbsp;'+
	{/literal}
	{/if}
	{if $fbloginblock_footert == "footert" && $fbloginblockt_on == 1}{literal}
		'<a href="javascript:void(0)"'+
		{/literal}{if $fbloginblocktconf == 1}{literal} 
		   'onclick="javascript:popupWin = window.open(\'{/literal}{$base_dir}{literal}modules/fbloginblock/twitter.php{/literal}{if $fbloginblockorder_page == 1}{literal}?http_referer={/literal}{$fbloginblockhttp_referer|urlencode}{/if}{literal}\', \'login\', \'location,width=600,height=600,top=0\'); popupWin.focus();"'+
		 {/literal}{else}{literal}
			  'onclick="alert(\'{/literal}{$terror|escape:'htmlall'}{literal}\')"'+
		 {/literal}{/if}{literal}
			'title="Twitter">'+
			'<img src="{/literal}{$fbloginblocktwitterimg}{literal}" style="margin-top:12px" alt="Twitter" />'+
		'</a>&nbsp;'+
	{/literal}
	{/if}
	{if $fbloginblock_footerg == "footerg" && $fbloginblockg_on == 1}{literal}
	'<a href="javascript:void(0)" title="Google"'+
	   'onclick="javascript:popupWin = window.open(\'{/literal}{$base_dir}{literal}modules/fbloginblock/login.php?p=google{/literal}{if $fbloginblockorder_page == 1}{literal}&http_referer={/literal}{$fbloginblockhttp_referer|urlencode}{/if}{literal}\', \'openId\', \'location,width=512,height=512,top=0\');popupWin.focus();">'+
			'<img src="{/literal}{$fbloginblockgoogleimg}{literal}"  style="margin-top:12px" alt="Google" />'+
		'</a>&nbsp;'+
	{/literal}{/if}
	{if $fbloginblock_footery == "footery" && $fbloginblocky_on == 1}{literal}
	'<a href="javascript:void(0)" title="Yahoo"'+
	   'onclick="javascript:popupWin = window.open(\'{/literal}{$base_dir}{literal}modules/fbloginblock/login.php?p=yahoo{/literal}{if $fbloginblockorder_page == 1}{literal}&http_referer={/literal}{$fbloginblockhttp_referer|urlencode}{/if}{literal}\', \'openId\', \'location,width=400,height=300,top=0\');popupWin.focus();"'+
		'>'+
		'<img src="{/literal}{$fbloginblockyahooimg}{literal}" style="margin-top:12px" alt="Yahoo"  />'+
	'</a>&nbsp;'+
	{/literal}{/if}
	{if $fbloginblock_footerp == "footerp" && $fbloginblockp_on == 1}{literal}
	'<a href="javascript:void(0)" title="Paypal"'+
	{/literal}{if $fbloginblockpconf == 1}{literal} 
	   'onclick="javascript:popupWin = window.open(\'{/literal}{$base_dir}{literal}modules/fbloginblock/paypalconnect.php{/literal}{if $fbloginblockorder_page == 1}{literal}?http_referer={/literal}{$fbloginblockhttp_referer|urlencode}{/if}{literal}\', \'openId\', \'location,width=512,height=512,top=0\');popupWin.focus();">'+
    {/literal}{else}{literal}
			  'onclick="alert(\'{/literal}{$perror|escape:'htmlall'}{literal}\')">'+
	 {/literal}{/if}{literal}
			'<img src="{/literal}{$fbloginblockpaypalimg}{literal}"  style="margin-top:12px" alt="Paypal" />'+
		'</a>&nbsp;'+
	{/literal}{/if}
	{if $fbloginblock_footerl == "footerl" && $fbloginblockl_on == 1}{literal}
	'<a href="javascript:void(0)" title="LinkedIn"'+
	{/literal}{if $fbloginblocklconf == 1}{literal} 
	   'onclick="javascript:popupWin = window.open(\'{/literal}{$base_dir}{literal}modules/fbloginblock/linkedin.php{/literal}{if $fbloginblockorder_page == 1}{literal}?http_referer={/literal}{$fbloginblockhttp_referer|urlencode}{/if}{literal}\', \'openId\', \'location,width=512,height=512,top=0\');popupWin.focus();">'+
	{/literal}{else}{literal}
			  'onclick="alert(\'{/literal}{$lerror|escape:'htmlall'}{literal}\')">'+
	{/literal}{/if}{literal}   
			'<img src="{/literal}{$fbloginblocklinkedinimg}{literal}"  style="margin-top:12px" alt="LinkedIn" />'+
		'</a>&nbsp;'+
	{/literal}{/if}
	{if $fbloginblock_footerm == "footerm" && $fbloginblockm_on == 1}{literal}
	'<a href="javascript:void(0)" title="Microsoft Live"'+
	{/literal}{if $fbloginblockmconf == 1}{literal} 
	   'onclick="javascript:popupWin = window.open(\'{/literal}{$base_dir}{literal}modules/fbloginblock/microsoft.php{/literal}{if $fbloginblockorder_page == 1}{literal}?http_referer={/literal}{$fbloginblockhttp_referer|urlencode}{/if}{literal}\', \'openId\', \'location,width=512,height=512,top=0\');popupWin.focus();">'+
	{/literal}{else}{literal}
			  'onclick="alert(\'{/literal}{$merror|escape:'htmlall'}{literal}\')">'+
	{/literal}{/if}{literal}   
		
			'<img src="{/literal}{$fbloginblockmicrosoftimg}{literal}"  style="margin-top:12px" alt="Microsoft Live" />'+
		'</a>&nbsp;'+
	{/literal}{/if}{literal}
	
	
	
	'</div>'+ 
'</div>';

$('body').append(bottom_teaser);

    });
{/literal}   
    	
{/if}

{*}
{if $fbloginblock_topf == "topf" || $fbloginblock_topg == "topg" 
	|| $fbloginblock_topt == "topt" || $fbloginblock_topl == "topl"
	|| $fbloginblock_topm == "topm"}
{literal}


$(document).ready(function() {
	

	var top_teaser = '<div id="follow-teaser">'+
	'<div class="wrap">'+
	
	{/literal}{if $fbloginblock_topf == "topf" && $fbloginblockf_on == 1}{literal}
		'<a href="javascript:void(0)" onclick="return fblogin();" title="Facebook">'+
			'<img src="{/literal}{$fbloginblockfacebookimg}{literal}" class="width_fbloginblock"  alt="Facebook" />'+
		'</a>&nbsp;'+
		{/literal}
		{/if}
		{if $fbloginblock_topt == "topt" && $fbloginblockt_on == 1}{literal}
			'<a href="javascript:void(0)"'+ 
			{/literal}{if $fbloginblocktconf == 1}{literal} 
				   'onclick="javascript:popupWin = window.open(\'{/literal}{$base_dir}{literal}modules/fbloginblock/twitter.php{/literal}{if $fbloginblockorder_page == 1}{literal}?http_referer={/literal}{$fbloginblockhttp_referer|urlencode}{/if}{literal}\', \'login\', \'location,width=600,height=600,top=0\'); popupWin.focus();"'+
			 {/literal}{else}{literal}
						  'onclick="alert(\'{/literal}{$terror|escape:'htmlall'}{literal}\')"'+
			 {/literal}{/if}{literal}
				'title="Twitter">'+
				'<img src="{/literal}{$fbloginblocktwitterimg}{literal}" style="margin-top:12px" alt="Twitter" />'+
			'</a>&nbsp;'+
		{/literal}
		{/if}
		{if $fbloginblock_topg == "topg" && $fbloginblockg_on == 1}{literal}
		'<a href="javascript:void(0)" title="Google"'+
		   'onclick="javascript:popupWin = window.open(\'{/literal}{$base_dir}{literal}modules/fbloginblock/login.php?p=google{/literal}{if $fbloginblockorder_page == 1}{literal}&http_referer={/literal}{$fbloginblockhttp_referer|urlencode}{/if}{literal}\', \'openId\', \'location,width=512,height=512,top=0\');popupWin.focus();">'+
				'<img src="{/literal}{$fbloginblockgoogleimg}{literal}"  style="margin-top:12px" alt="Google" />'+
			'</a>&nbsp;'+
		{/literal}{/if}
		{if $fbloginblock_topy == "topy" && $fbloginblocky_on == 1}{literal}
		'<a href="javascript:void(0)" title="Yahoo"'+
		   'onclick="javascript:popupWin = window.open(\'{/literal}{$base_dir}{literal}modules/fbloginblock/login.php?p=yahoo{/literal}{if $fbloginblockorder_page == 1}{literal}&http_referer={/literal}{$fbloginblockhttp_referer|urlencode}{/if}{literal}\', \'openId\', \'location,width=400,height=300,top=0\');popupWin.focus();"'+
			'>'+
			'<img src="{/literal}{$fbloginblockyahooimg}{literal}" style="margin-top:12px" alt="Yahoo"  />'+
		'</a>&nbsp;'+
		{/literal}{/if}
		{if $fbloginblock_topp == "topp" && $fbloginblockp_on == 1}{literal}
		'<a href="javascript:void(0)" title="Paypal"'+
			{/literal}{if $fbloginblockpconf == 1}{literal} 
			   'onclick="javascript:popupWin = window.open(\'{/literal}{$base_dir}{literal}modules/fbloginblock/paypalconnect.php{/literal}{if $fbloginblockorder_page == 1}{literal}?http_referer={/literal}{$fbloginblockhttp_referer|urlencode}{/if}{literal}\', \'openId\', \'location,width=512,height=512,top=0\');popupWin.focus();">'+
		    {/literal}{else}{literal}
					  'onclick="alert(\'{/literal}{$perror|escape:'htmlall'}{literal}\')">'+
			 {/literal}{/if}{literal}
		'<img src="{/literal}{$fbloginblockpaypalimg}{literal}"  style="margin-top:12px" alt="Paypal" />'+
			'</a>&nbsp;'+
		{/literal}{/if}
		{if $fbloginblock_topl == "topl" && $fbloginblockl_on == 1}{literal}
		'<a href="javascript:void(0)" title="LinkedIn"'+
		{/literal}{if $fbloginblocklconf == 1}{literal} 
		   'onclick="javascript:popupWin = window.open(\'{/literal}{$base_dir}{literal}modules/fbloginblock/linkedin.php{/literal}{if $fbloginblockorder_page == 1}{literal}?http_referer={/literal}{$fbloginblockhttp_referer|urlencode}{/if}{literal}\', \'openId\', \'location,width=512,height=512,top=0\');popupWin.focus();">'+
		{/literal}{else}{literal}
				  'onclick="alert(\'{/literal}{$lerror|escape:'htmlall'}{literal}\')">'+
		{/literal}{/if}{literal}   
		  	'<img src="{/literal}{$fbloginblocklinkedinimg}{literal}"  style="margin-top:12px" alt="LinkedIn" />'+
			'</a>&nbsp;'+
		{/literal}{/if}
		{if $fbloginblock_topm == "topm" && $fbloginblockm_on == 1}{literal}
		'<a href="javascript:void(0)" title="Microsoft Live"'+

		{/literal}{if $fbloginblockmconf == 1}{literal} 
		   'onclick="javascript:popupWin = window.open(\'{/literal}{$base_dir}{literal}modules/fbloginblock/microsoft.php{/literal}{if $fbloginblockorder_page == 1}{literal}?http_referer={/literal}{$fbloginblockhttp_referer|urlencode}{/if}{literal}\', \'openId\', \'location,width=512,height=512,top=0\');popupWin.focus();">'+
		{/literal}{else}{literal}
				  'onclick="alert(\'{/literal}{$merror|escape:'htmlall'}{literal}\')">'+
		{/literal}{/if}{literal}	

		'<img src="{/literal}{$fbloginblockmicrosoftimg}{literal}"  style="margin-top:12px" alt="Microsoft Live" />'+
			'</a>&nbsp;'+
		{/literal}{/if}{literal}
	
	'</div>'+ 
'</div>';

$('body').prepend(top_teaser);

    });
   
    	
{/literal}
{/if}{*}

{if $blockfacebookappid != '' && $blockfacebooksecret != ''}
{literal}

$(document).ready(function(){

	//add div fb-root
	if ($('div#fb-root').length == 0)
	{
	    FBRootDom = $('<div>', {'id':'fb-root'});
	    $('body').prepend(FBRootDom);
	}

	(function(d){
        var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
        js = d.createElement('script'); js.id = id; js.async = true;
        js.src = "//connect.facebook.net/{/literal}{$fbloginblocklang}{literal}/all.js";
        d.getElementsByTagName('head')[0].appendChild(js);
      }(document));
});	

	function login(){
		$.post(baseDir+'modules/fbloginblock/ajax.php', 
					{action:'login',{/literal}{* secret:'{$blockfacebooksecret}',*}{literal} 
					appid:'{/literal}{$blockfacebookappid}{literal}'
					 }, 
		function (data) {
			if (data.status == 'success') {
						
				{/literal}{if $fbloginblockorder_page == 1}{literal}
					var url = "/{/literal}{$fbloginblockuri|urldecode}{literal}";
					window.location.href= url;
				{/literal}{else}{literal}		
					var url = "/{/literal}{$fbloginblockuri|urldecode}{literal}";
					window.location.href= url;
				{/literal}{/if}{literal}		
				
				
						
			} else {
				alert(data.message);
			}
		}, 'json');
	}
	function logout(){
				var url = "{/literal}{$base_dir}index.php?mylogout{literal}";
				$('#fb-log-out').html('');
				$('#fb-log-out').html('Log in');
				$('#fb-fname-lname').remove();
				window.location.href= url;
	}
	function greet(){
	   FB.api('/me', function(response) {
		   
		var src = 'https://graph.facebook.com/'+response.id+'/picture';
		$('#header_user_info span').append('<img style="margin-left:5px" height="20" src="'+src+'"/>');
			
		{/literal}{if !$fbloginblockislogged}{literal}
			login();
		{/literal}{/if}{literal}
		 });
	}


	   function fblogin(){
		   
			FB.init({appId: '{/literal}{$blockfacebookappid}{literal}', 
					status: true, 
					cookie: true, 
					xfbml: true,
		         	oauth: true});
         	
				FB.login(function(response) {
		            if (response.status == 'connected') {
			            login();
		            } else {
		                // user is not logged in
		                logout();
		            }
		        }, {scope:'email,user_birthday'});
		       
		        return false;
			}
	   {/literal}
{else}
{literal}
function fblogin(){
	  alert("{/literal}{$ferror|escape:'htmlall'}{literal}");
	return;	
}
{/literal}
{/if}
		   




{literal}
$(document).ready(function() {
	 var ph = '<div class="span3 block" style="text-align:center"><h4 class="title_block">{/literal}{l s='Conéctate' mod='fbloginblock'}{literal}</h4><p class="s_title_block">{/literal}{l s='Conéctate desde tu cuenta de Facebook o Google:' mod='fbloginblock'}{literal}</p>'+

	 //var ph = '<div class="wrap" style="text-align:center">'+
	{/literal}
		{if $fbloginblock_authpagef == "authpagef" && $fbloginblockf_on == 1}
	{literal}
	 '<a href="javascript:void(0)" onclick="return fblogin();" title="Facebook">'+
	   '<img src="{/literal}{$fbloginblockfacebookimg}{literal}" alt="Facebook" style="margin-top:12px"  />'+
	 '<\/a>&nbsp;'+
	 {/literal}
	 	{/if}
	 {if $fbloginblock_authpaget == "authpaget" && $fbloginblockt_on == 1}{literal}
		'<a href="javascript:void(0)"'+ 
		{/literal}{if $fbloginblocktconf == 1}{literal} 
			   'onclick="javascript:popupWin = window.open(\'{/literal}{$base_dir}{literal}modules/fbloginblock/twitter.php{/literal}{if $fbloginblockorder_page == 1}{literal}?http_referer={/literal}{$fbloginblockhttp_referer|urlencode}{/if}{literal}\', \'login\', \'location,width=600,height=600,top=0\'); popupWin.focus();"'+
		 {/literal}{else}{literal}
					  'onclick="alert(\'{/literal}{$terror|escape:'htmlall'}{literal}\')"'+
		 {/literal}{/if}{literal}
		 'title="Twitter">'+
			'<img src="{/literal}{$fbloginblocktwitterimg}{literal}" style="margin-top:12px" alt="Twitter" />'+
		'</a>&nbsp;'+
	 {/literal}
	 {/if}
		 
	 {if $fbloginblock_authpageg == "authpageg" && $fbloginblockg_on == 1}
	 {literal}
	 '<a href="javascript:void(0)" title="Google"'+
	   'onclick="javascript:popupWin = window.open(\'{/literal}{$base_dir}{literal}modules/fbloginblock/login.php?p=google{/literal}{if $fbloginblockorder_page == 1}{literal}&http_referer={/literal}{$fbloginblockhttp_referer|urlencode}{/if}{literal}\', \'openId\', \'location,width=512,height=512,top=0\');popupWin.focus();">'+
			'<img src="{/literal}{$fbloginblockgoogleimg}{literal}" alt="Google" style="margin-top:12px" />'+
		'</a>&nbsp;'+
	 {/literal}
	 {/if}
	 {if $fbloginblock_authpagey == "authpagey" && $fbloginblocky_on == 1}{literal}
		'<a href="javascript:void(0)" title="Yahoo"'+
		   'onclick="javascript:popupWin = window.open(\'{/literal}{$base_dir}{literal}modules/fbloginblock/login.php?p=yahoo{/literal}{if $fbloginblockorder_page == 1}{literal}&http_referer={/literal}{$fbloginblockhttp_referer|urlencode}{/if}{literal}\', \'openId\', \'location,width=400,height=300,top=0\');popupWin.focus();"'+
			'>'+
			'<img src="{/literal}{$fbloginblockyahooimg}{literal}" style="margin-top:12px" alt="Yahoo"  />'+
		'</a>&nbsp;'+
	 {/literal}{/if}
	 {if $fbloginblock_authpagep == "authpagep" && $fbloginblockp_on == 1}
	 {literal}
	 '<a href="javascript:void(0)" title="Paypal"'+
	 {/literal}{if $fbloginblockpconf == 1}{literal}
	   'onclick="javascript:popupWin = window.open(\'{/literal}{$base_dir}{literal}modules/fbloginblock/paypalconnect.php{/literal}{if $fbloginblockorder_page == 1}{literal}?http_referer={/literal}{$fbloginblockhttp_referer|urlencode}{/if}{literal}\', \'openId\', \'location,width=512,height=512,top=0\');popupWin.focus();">'+
     {/literal}{else}{literal}
			  'onclick="alert(\'{/literal}{$perror|escape:'htmlall'}{literal}\')">'+
	 {/literal}{/if}{literal}
  
			'<img src="{/literal}{$fbloginblockpaypalimg}{literal}" alt="Paypal" style="margin-top:12px" />'+
	 '</a>&nbsp;'+
	 {/literal}
		 {/if}
	 {if $fbloginblock_authpagel == "authpagel" && $fbloginblockl_on == 1}
	 {literal}
		 '<a href="javascript:void(0)" title="LinkedIn"'+
		 {/literal}{if $fbloginblocklconf == 1}{literal} 
		   'onclick="javascript:popupWin = window.open(\'{/literal}{$base_dir}{literal}modules/fbloginblock/linkedin.php{/literal}{if $fbloginblockorder_page == 1}{literal}?http_referer={/literal}{$fbloginblockhttp_referer|urlencode}{/if}{literal}\', \'openId\', \'location,width=512,height=512,top=0\');popupWin.focus();">'+
		 {/literal}{else}{literal}
				  'onclick="alert(\'{/literal}{$lerror|escape:'htmlall'}{literal}\')">'+
		{/literal}{/if}{literal}  
				'<img src="{/literal}{$fbloginblocklinkedinimg}{literal}" alt="LinkedIn" style="margin-top:12px" />'+
		 '</a>&nbsp;'+
	 {/literal}
	 {/if}
	 {if $fbloginblock_authpagem == "authpagem" && $fbloginblockm_on == 1}
		 {literal}
			 '<a href="javascript:void(0)" title="Microsoft Live"'+
			 
			    {/literal}{if $fbloginblockmconf == 1}{literal} 
				   'onclick="javascript:popupWin = window.open(\'{/literal}{$base_dir}{literal}modules/fbloginblock/microsoft.php{/literal}{if $fbloginblockorder_page == 1}{literal}?http_referer={/literal}{$fbloginblockhttp_referer|urlencode}{/if}{literal}\', \'openId\', \'location,width=512,height=512,top=0\');popupWin.focus();">'+
				{/literal}{else}{literal}
						  'onclick="alert(\'{/literal}{$merror|escape:'htmlall'}{literal}\')">'+
				{/literal}{/if}{literal}

				'<img src="{/literal}{$fbloginblockmicrosoftimg}{literal}" alt="Microsoft Live" style="margin-top:12px" />'+
			 '</a>'+
		 {/literal}
	 {/if}
	 {literal}
	'<\/div>';
	
    $('#logggin').after(ph);


    var ph_top = '&nbsp;'+
    {/literal}
		{if $fbloginblock_welcomef == "welcomef" && $fbloginblockf_on == 1}
	{literal}
       '<a class="fbloginblock-log-in" href="javascript:void(0)" {/literal}{if $fbloginblockis_ps5 == 1}style="padding-left:10px"{/if}{literal} onclick="return fblogin();" title="Facebook">'+
	   '<img src="{/literal}{$fbloginblockfacebooksmallimg}{literal}" alt="Facebook"  />'+
	 '<\/a>'+
	 {/literal}
	 	{/if}
	 {if $fbloginblock_welcomet == "welcomet" && $fbloginblockt_on == 1}{literal}
		'<a href="javascript:void(0)" title="Twitter" {/literal}{if $fbloginblockis_ps5 == 1}style="padding-left:10px"{/if}{literal}'+ 
		{/literal}{if $fbloginblocktconf == 1}{literal} 
			   'onclick="javascript:popupWin = window.open(\'{/literal}{$base_dir}{literal}modules/fbloginblock/twitter.php{/literal}{if $fbloginblockorder_page == 1}{literal}?http_referer={/literal}{$fbloginblockhttp_referer|urlencode}{/if}{literal}\', \'login\', \'location,width=600,height=600,top=0\'); popupWin.focus();"'+
		 {/literal}{else}{literal}
					  'onclick="alert(\'{/literal}{$terror|escape:'htmlall'}{literal}\')"'+
		 {/literal}{/if}{literal}
		'title="Twitter" class="fbloginblock-log-in">'+
	 			'<img src="{/literal}{$fbloginblocktwittersmallimg}{literal}"  alt="Twitter"/>'+
		'</a>'+
	 {/literal}
	 {/if}
	 {if $fbloginblock_welcomeg == "welcomeg" && $fbloginblockg_on == 1}
	 {literal}
	 '<a class="fbloginblock-log-in" href="javascript:void(0)" title="Google" {/literal}{if $fbloginblockis_ps5 == 1}style="padding-left:10px"{/if}{literal}'+
	   'onclick="javascript:popupWin = window.open(\'{/literal}{$base_dir}{literal}modules/fbloginblock/login.php?p=google{/literal}{if $fbloginblockorder_page == 1}{literal}&http_referer={/literal}{$fbloginblockhttp_referer|urlencode}{/if}{literal}\', \'openId\', \'location,width=512,height=512,top=0\');popupWin.focus();">'+
			'<img src="{/literal}{$fbloginblockgooglesmallimg}{literal}" alt="Google"  />'+
		'</a>'+
	 {/literal}
	 {/if}

	 {if $fbloginblock_welcomey == "welcomey" && $fbloginblocky_on == 1}{literal}
		'<a class="fbloginblock-log-in" href="javascript:void(0)" title="Yahoo" {/literal}{if $fbloginblockis_ps5 == 1}style="padding-left:10px"{/if}{literal}'+
		   'onclick="javascript:popupWin = window.open(\'{/literal}{$base_dir}{literal}modules/fbloginblock/login.php?p=yahoo{/literal}{if $fbloginblockorder_page == 1}{literal}&http_referer={/literal}{$fbloginblockhttp_referer|urlencode}{/if}{literal}\', \'openId\', \'location,width=400,height=300,top=0\');popupWin.focus();"'+
			'>'+
			'<img src="{/literal}{$fbloginblockyahoosmallimg}{literal}" alt="Yahoo"  />'+
		'</a>'+
	 {/literal}{/if}
		 
	 {if $fbloginblock_welcomep == "welcomep" && $fbloginblockp_on == 1}
	 {literal}
	 '<a class="fbloginblock-log-in" href="javascript:void(0)" title="Paypal" {/literal}{if $fbloginblockis_ps5 == 1}style="padding-left:10px"{/if}{literal}'+
	    {/literal}{if $fbloginblockpconf == 1}{literal}
		   'onclick="javascript:popupWin = window.open(\'{/literal}{$base_dir}{literal}modules/fbloginblock/paypalconnect.php{/literal}{if $fbloginblockorder_page == 1}{literal}?http_referer={/literal}{$fbloginblockhttp_referer|urlencode}{/if}{literal}\', \'openId\', \'location,width=512,height=512,top=0\');popupWin.focus();">'+
	     {/literal}{else}{literal}
		   	  'onclick="alert(\'{/literal}{$perror|escape:'htmlall'}{literal}\')">'+
		 {/literal}{/if}{literal}
	  
	  	'<img src="{/literal}{$fbloginblockpaypalsmallimg}{literal}" alt="Paypal" />'+
	 '</a>'+
	 {/literal}
		 {/if}
	{if $fbloginblock_welcomel == "welcomel" && $fbloginblockl_on == 1}
	 {literal}
	 '<a class="fbloginblock-log-in" href="javascript:void(0)" title="LinkedIn" {/literal}{if $fbloginblockis_ps5 == 1}style="padding-left:10px"{/if}{literal}'+
		 {/literal}{if $fbloginblocklconf == 1}{literal} 
		   'onclick="javascript:popupWin = window.open(\'{/literal}{$base_dir}{literal}modules/fbloginblock/linkedin.php{/literal}{if $fbloginblockorder_page == 1}{literal}?http_referer={/literal}{$fbloginblockhttp_referer|urlencode}{/if}{literal}\', \'openId\', \'location,width=512,height=512,top=0\');popupWin.focus();">'+
		{/literal}{else}{literal}
			  'onclick="alert(\'{/literal}{$lerror|escape:'htmlall'}{literal}\')">'+
		{/literal}{/if}{literal}  
				'<img src="{/literal}{$fbloginblocklinkedinsmallimg}{literal}" alt="LinkedIn" />'+
	 '</a>'+
	 {/literal}
		 {/if}

	{if $fbloginblock_welcomem == "welcomem" && $fbloginblockm_on == 1}
	 {literal}
	 '<a class="fbloginblock-log-in" href="javascript:void(0)" title="Microsoft Live" {/literal}{if $fbloginblockis_ps5 == 1}style="padding-left:10px"{/if}{literal}'+

	 	{/literal}{if $fbloginblockmconf == 1}{literal} 
		   'onclick="javascript:popupWin = window.open(\'{/literal}{$base_dir}{literal}modules/fbloginblock/microsoft.php{/literal}{if $fbloginblockorder_page == 1}{literal}?http_referer={/literal}{$fbloginblockhttp_referer|urlencode}{/if}{literal}\', \'openId\', \'location,width=512,height=512,top=0\');popupWin.focus();">'+
		{/literal}{else}{literal}
				  'onclick="alert(\'{/literal}{$merror|escape:'htmlall'}{literal}\')">'+
		{/literal}{/if}{literal}
		
	   	'<img src="{/literal}{$fbloginblockmicrosoftsmallimg}{literal}" alt="Microsoft Live" />'+
	 '</a>'+
	 {/literal}
	 {/if}
	 {literal}
	 '';

    if($('#header_user_info a'))
    	$('#header_user_info a').after(ph_top);

    // for PS 1.6 >
    if($('.header_user_info'))
		$('.header_user_info').after('<div class="header_user_info_ps16">'+ph_top+'<\/div>');
		
	
    });
{/literal}


	
{if $fbloginblockis16 != 1}
{literal}
	// ]]>
-->
{/literal}
{/if}
{literal}
</script>
{/literal}

{/if}
