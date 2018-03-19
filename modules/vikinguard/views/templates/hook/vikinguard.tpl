{*
 * ©2015 Vikinguard
 *
 * @author    http://vikinguard.com
 * @copyright Copyright (C) 2015 heimdalapm.com <@info@heimdalapm.com>
 *            All rights reserved.
 * @license   http://vikinguard.com/heimdal/EULA.html
 *}
 
<script type="text/javascript">

var heimdalparam={};

var configCallBack = function(){
	BOOMR.init({
			beacon_url: "//eum.vikinguard.com"
	});
	BOOMR.addVar("customer","{$customer|escape:'htmlall':'UTF-8'}");
	BOOMR.addVar("shop","{$shop|escape:'htmlall':'UTF-8'}");
	BOOMR.addVar("version","PE{$version|escape:'htmlall':'UTF-8'}");
    info();
};


var info =function(){
	 for (key in heimdalparam){
    	BOOMR.addVar(key,heimdalparam[key]);
    
    }
};


var heimdaladdVar=function(key,value){
	heimdalparam[key]=value;
};


loadScript("//cdn.vikinguard.com/vikinguard.js", configCallBack);

function loadScript(u, c){
    var h = document.getElementsByTagName('head')[0];
    var s = document.createElement('script');
    s.type = 'text/javascript';
    s.src = u;
    s.onreadystatechange = c;
    s.onload = c;
    h.appendChild(s);
   
}
</script>
