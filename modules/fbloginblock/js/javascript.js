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

function return_default_img(type,text){
        	if(confirm(text))
        	{
        	if(type=="google")
        		$('#imageg').css('opacity',0.5);
        	if(type=="googlesmall")
        		$('#imagegsmall').css('opacity',0.5);
        	
        	if(type=="facebook")
        		$('#imagef').css('opacity',0.5);	
        	if(type=="facebooksmall")
        		$('#imagefsmall').css('opacity',0.5);
        		
        	
        	
        	if(type=="twitter")
        		$('#imaget').css('opacity',0.5);
        	if(type=="twittersmall")
        		$('#imagetsmall').css('opacity',0.5);
        	
        	
        	if(type=="linkedin")
        		$('#imagel').css('opacity',0.5);
        	if(type=="linkedinsmall")
        		$('#imagelsmall').css('opacity',0.5);
        	
        	if(type=="microsoft")
        		$('#imagem').css('opacity',0.5);
        	if(type=="microsoftsmall")
        		$('#imagemsmall').css('opacity',0.5);
        	
        	$.post('../modules/fbloginblock/ajax/admin_image.php', {
        		action:'returnimage',
        		type : type
        	}, 
        	function (data) {
        		if (data.status == 'success') {
        			
        			if(type=="twitter"){
                		$('#imaget').css('opacity',1);
                		var count = Math.random();
            			document.getElementById('imaget').src = "";
            			document.getElementById('imaget').src = "../modules/fbloginblock/img/twitter.png?re=" + count;
            			$('#imaget-click').remove();
        			}
        			if(type=="twittersmall"){
                		$('#imagetsmall').css('opacity',1);
                		var count = Math.random();
            			document.getElementById('imagetsmall').src = "";
            			document.getElementById('imagetsmall').src = "../modules/fbloginblock/img/twitter-small.png?re=" + count;
            			$('#imaget-clicksmall').remove();
        			}
        			if(type=="google"){
                		$('#imageg').css('opacity',1);
                		var count = Math.random();
            			document.getElementById('imageg').src = "";
            			document.getElementById('imageg').src = "../modules/fbloginblock/img/google.png?re=" + count;
            			$('#imageg-click').remove();
        			}
        			if(type=="googlesmall"){
                		$('#imagegsmall').css('opacity',1);
                		var count = Math.random();
            			document.getElementById('imagegsmall').src = "";
            			document.getElementById('imagegsmall').src = "../modules/fbloginblock/img/google-small.png?re=" + count;
            			$('#imageg-clicksmall').remove();
        			}
        			if(type=="facebook"){
                		$('#imagef').css('opacity',1);
                		var count = Math.random();
            			document.getElementById('imagef').src = "";
            			document.getElementById('imagef').src = "../modules/fbloginblock/img/facebook.png?re=" + count;
            			$('#imagef-click').remove();
        			}
        			if(type=="facebooksmall"){
                		$('#imagefsmall').css('opacity',1);
                		var count = Math.random();
            			document.getElementById('imagefsmall').src = "";
            			document.getElementById('imagefsmall').src = "../modules/fbloginblock/img/facebook-small.png?re=" + count;
            			$('#imagef-clicksmall').remove();
        			}
        		
        			
        			if(type=="linkedin"){
                		$('#imagel').css('opacity',1);
                		var count = Math.random();
            			document.getElementById('imagel').src = "";
            			document.getElementById('imagel').src = "../modules/fbloginblock/img/linkedin.png?re=" + count;
            			$('#imagel-click').remove();
        			}
        			
        			if(type=="linkedinsmall"){
                		$('#imagelsmall').css('opacity',1);
                		var count = Math.random();
            			document.getElementById('imagelsmall').src = "";
            			document.getElementById('imagelsmall').src = "../modules/fbloginblock/img/linkedin-small.png?re=" + count;
            			$('#imagel-clicksmall').remove();
        			}
        			
        			if(type=="microsoft"){
                		$('#imagem').css('opacity',1);
                		var count = Math.random();
            			document.getElementById('imagem').src = "";
            			document.getElementById('imagem').src = "../modules/fbloginblock/img/microsoft.png?re=" + count;
            			$('#imagem-click').remove();
        			}
        			
        			if(type=="microsoftsmall"){
                		$('#imagemsmall').css('opacity',1);
                		var count = Math.random();
            			document.getElementById('imagemsmall').src = "";
            			document.getElementById('imagemsmall').src = "../modules/fbloginblock/img/microsoft-small.png?re=" + count;
            			$('#imagem-clicksmall').remove();
        			}
                	
        		} else {
        			if(type=="twitter")
                		$('#imaget').css('opacity',1);
        			if(type=="twittersmall")
                		$('#imagetsmall').css('opacity',1);
        			if(type=="google")
                		$('#imageg').css('opacity',1);
        			if(type=="googlesmall")
                		$('#imagegsmall').css('opacity',1);
        			if(type=="facebook")
                		$('#imagef').css('opacity',1);	
        			if(type=="facebooksmall")
                		$('#imagefsmall').css('opacity',1);
        			if(type=="linkedin")
                		$('#imagel').css('opacity',1);	
        			if(type=="linkedinsmall")
                		$('#imagelsmall').css('opacity',1);
        			
        			if(type=="microsoft")
                		$('#imagem').css('opacity',1);	
        			if(type=="microsoftsmall")
                		$('#imagemsmall').css('opacity',1);
        			
        			alert(data.message);
        		}
        		
        	}, 'json');
        	}

        }