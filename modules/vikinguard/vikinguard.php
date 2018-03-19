<?php
/**
 * ©2015 Vikinguard
 *
 * @author    http://vikinguard.com
 * @copyright Copyright (C) 2015 vikinguard.com <@info@heimdalapm.com>
 *            All rights reserved.
 * @license   http://vikinguard.com/heimdal/EULA.html
 */
if (! defined ( '_PS_VERSION_' )) {
	exit ();
}
class Vikinguard extends Module {
	protected static $products = array();
	
	public function __construct() {
		$this->name = 'vikinguard';
		$this->tab = 'analytics_stats';
		$this->version = '3.1.2';
		Configuration::updateValue ( 'HEIMDALAPM_VERSION', $this->version );
		$this->author = 'Vikinguard team';
		$this->ps_versions_compliancy = array (
				'min' => '1.5',
				'max' => _PS_VERSION_ 
		);
		$this->module_key = '9014d08fb3371c3ac971d58cbe5e8f41';
		parent::__construct ();
		$this->page = basename ( __FILE__, '.php' );
		$this->displayName = $this->l ( 'Vikinguard' );
		$this->description = $this->l ( 'It checks your site uptime and real user experience. This module provides all the infomation about your site\'s perfomance. ' );
	}
	public function getContent() {
		$output = '';
		$cache = false;
		$configurationEmail = Configuration::get ( 'HEIMDALAPM_EMAIL' );
		$configurationPassword = Configuration::get ( 'HEIMDALAPM_PASSWORD' );
		$customerid = ( string ) Configuration::get ( 'HEIMDALAPM_CUSTOMER' );
		$shopid = ( string ) Configuration::get ( 'HEIMDALAPM_SHOP' );
		$action = Tools::getValue ( 'action', '' );
		
		if ($action == "reconfigured") {
			Configuration::updateValue ( 'HEIMDALAPM_EMAIL', null );
			Configuration::updateValue ( 'HEIMDALAPM_PASSWORD', null );
			return $output . $this->mailRender ();
		}
		if ($action == "signup") {
			Configuration::updateValue ( 'HEIMDALAPM_EMAIL_TMP', Tools::getValue ( 'heimdalapm_email', '' ) );
			return $output . $this->signupRender ();
		}
		if ($action == "configuration") {
			Configuration::updateValue ( 'HEIMDALAPM_EMAIL_TMP', Tools::getValue ( 'heimdalapm_email', '' ) );
			return $output . $this->configurationRender ();
		}
		if ($action == "multishop") {
			// Configuration::updateValue('HEIMDALAPM_EMAIL_TMP', Tools::getValue('heimdalapm_email', ''));
			Configuration::updateValue ( 'HEIMDALAPM_EMAIL', Tools::getValue ( 'heimdalapm_email', '' ) );
			Configuration::updateValue ( 'HEIMDALAPM_PASSWORD', Tools::getValue ( 'heimdalapm_password', '' ) );
			Configuration::updateValue ( 'HEIMDALAPM_CUSTOMER', Tools::getValue ( 'heimdalapm_customer', '' ) );
			return $output . $this->multishopRender ();
		}
		if ($action == "configured" || (($configurationEmail != null || $configurationEmail != "") && ($configurationPassword != null || $configurationPassword != "") && ($customerid != null || $customerid != "") && ($shopid != null || $shopid != ""))) {
			if ($action == "configured") {
				$this->_clearCache ( 'vikinguard.tpl' );
				$cache = true;
				// Configuration::updateValue('HEIMDALAPM_EMAIL', Tools::getValue('heimdalapm_email', ''));
				// Configuration::updateValue('HEIMDALAPM_PASSWORD', Tools::getValue('heimdalapm_password', ''));
				Configuration::updateValue ( 'HEIMDALAPM_CUSTOMER', Tools::getValue ( 'heimdalapm_customer', '' ) );
				Configuration::updateValue ( 'HEIMDALAPM_SHOP', Tools::getValue ( 'heimdalapm_shop', '' ) );
			}
			
			return $output . $this->configuredRender ( $cache );
		}
		
		return $output . $this->mailRender ();
	}
	public function mailRender() {
		$currentIndex = $this->context->link->getAdminLink ( 'AdminModules', false ) . '&configure=' . $this->name . '&tab_module=' . $this->tab . '&module_name=' . $this->name;
		$token = Tools::getAdminTokenLite ( 'AdminModules' );
		$name = $this->context->shop->name;
		$domain = 'http://' . $this->context->shop->domain_ssl . $this->context->shop->physical_uri . $this->context->shop->virtual_uri;
		return '<div class="panel" height="100%">
	<div class="row">
		<div class="col-lg-12">' . $this->displayName . '</div>
		<img src="https://vikinguard.com/heimdalapp/api/external/analytic/installation" width="0px" height="0px" style="display: none;"></img>
	</div>
	<hr />
	<div>
		<div class="row">
			<div class="col-lg-12">


				<p>
				<div class="col-lg-12 text-center" height="100%">
					<p></p>
					<div class="row">
						<div id="register" data-toggle="validator" class="form-signin">

							<h2 class="form-signin-heading">' . $this->l ( 'Please introduce a mail to configure your ' ) . " " . $this->l ( ' account.' ) . '</h2>

							<div class="form-group" id="sep">

								<input type="email" id="checkEmail" class="form-control"
									placeholder="' . $this->l ( 'Mail address' ) . '" required autofocus
									data-error="' . $this->l ( 'That email address is invalid' ) . '" required name="mail" title="' . $this->l ( 'If you want to sign up, introduce your mail. If you are already registered, use your mail to sign in.' ) . '">
								</input> <label for="inputPassword" class="sr-only">' . $this->l ( 'Mail' ) . '</label>



							</div>
        		
        					

							<button id="enviar" class="btn btn-lg btn-primary btn-block"
								type="submit">' . $this->l ( 'Send!' ) . '</button>

						</div>
						<div class="row" style="padding-bottom:50px;">
						<a href="https://www.vikinguard.com/support/">' . $this->l ( 'Do you have any problem? Please click here.' ) . '</a>
						<!--<iframe width="100%" height="100%" src="https://vikinguard.com/heimdal"></iframe>-->
        				</div>
        			    <div class="row">
        				<hr/>
        				<div class="row" style="font-size:9px;">
        					<strong>' . $this->l ( 'We are not going to spam you:' ) . '</strong>' . $this->l ( 'We are committed to keeping your e-mail address confidential. We do not sell, rent, or lease our subscription lists to third parties, and we will not provide your personal information to any third party individual, government agency, or company at any time unless compelled to do so by law.' ) . '
        				</div>
        	
					</div>
				</div>

			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
			   		function validateEmail(email) {
    						var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
   							 return re.test(email);
					}
				document.getElementById("enviar").addEventListener("click", function () {
								
			   		var email=document.getElementById("checkEmail").value; 		
			   		var send=true;
			   		var text="";
		   		
			   		if(!validateEmail(email)){
						text=text+"' . $this->l ( 'Check your email configuration\n' ) . '";
			   			send=false;
					}
	
			   		if(send){
			 
						checkcallbackajax("https://vikinguard.com/heimdalapp/api/external/customer/exists/"+email)
			   				.done( function(data,statusCode) {});
					}else{
						alert(text);					
					}
				});
				
				function checkcallbackajax (uri, data) {
			     var request = {
			            url: uri,
			            contentType: "application/json",
			            accepts: "application/json",
			            cache: false,
			            dataType: \'jsonp\',
			            data: \'jsonp\',
    						success: function(json) {
			   					if(json.exists){
										var email=document.getElementById("checkEmail").value; 
										window.location.replace("' . addslashes ( $currentIndex ) . '&token=' . addslashes ( $token ) . '&action=configuration&heimdalapm_email="+encodeURIComponent(email));	
								}else{
										var email=document.getElementById("checkEmail").value; 
										window.location.replace("' . addslashes ( $currentIndex ) . '&token=' . addslashes ( $token ) . '&action=signup&heimdalapm_email="+encodeURIComponent(email));	
       							}
    						},
    						error: function(e) {
								alert("' . $this->l ( 'Communication problem. Please try again later.' ) . '");
       		
    					}
	     			};
										
			        return $.ajax(request);
		   		  };
								
				</script>
	';
	}
	public function configuredRender($cache) {
		$currentIndex = $this->context->link->getAdminLink ( 'AdminModules', false ) . '&configure=' . $this->name . '&tab_module=' . $this->tab . '&module_name=' . $this->name;
		$token = Tools::getAdminTokenLite ( 'AdminModules' );
		$name = $this->context->shop->name;
		$domain = 'http://' . $this->context->shop->domain_ssl . $this->context->shop->physical_uri . $this->context->shop->virtual_uri;
		$configurationEmail = Configuration::get ( 'HEIMDALAPM_EMAIL' );
		$configurationPassword = Configuration::get ( 'HEIMDALAPM_PASSWORD' );
		$customerid = ( string ) Configuration::get ( 'HEIMDALAPM_CUSTOMER' );
		$shopid = ( string ) Configuration::get ( 'HEIMDALAPM_SHOP' );
		$text = '
				<div class="panel" height="100%">
				<div class="row" >
						
						<div class="col-lg-12">
				
							<img src="' . addslashes ( $this->_path ) . '/views/img/heimdal.png" class="img-responsive" width="304" "/>
						</div>
						<div class="col-lg-12">
							' . $this->displayName . ' ' . $this->l ( 'is configured' ) . ' 
						</div>
						<div class="col-lg-12">
						<a href="' . addslashes ( $currentIndex ) . '&token=' . addslashes ( $token ) . '&action=reconfigured">' . $this->l ( ' to reset the configuration' ) . '</a>
						</div>
						<div class="col-lg-12">		
						<a href="https://vikinguard.com/heimdal/index.html?auto=true&email=encodeURIComponent('.$configurationEmail.')&password=encodeURIComponent('.$configurationPassword.')&version=PE'.$this->version.'" target="_blank">' . $this->l ( 'Vikinguard console' ) . '</a>	
						</div>
				</div>
				</div>
				';
		if ($cache) {
			
			$text = $text . '<script>alert("' . $this->l ( 'Please refresh you cache.' ) . '");</script>';
		}
		
		return $text;
	}
	public function configurationRender() {
		$currentIndex = $this->context->link->getAdminLink ( 'AdminModules', false ) . '&configure=' . $this->name . '&tab_module=' . $this->tab . '&module_name=' . $this->name;
		$token = Tools::getAdminTokenLite ( 'AdminModules' );
		$name = $this->context->shop->name;
		$domain = 'http://' . $this->context->shop->domain_ssl . $this->context->shop->physical_uri . $this->context->shop->virtual_uri;
		return '<div class="panel" height="100%">
	<div class="row">
		<div class="col-lg-12">' . $this->displayName . '</div>
	</div>
	<hr />
	<div>
		<div class="row">
			<div class="col-lg-12">

				<p>
				<div class="col-lg-12 text-center" height="100%">
					<p></p>
					<div id="register" data-toggle="validator" class="form-signin">

						<h2 class="form-signin-heading">' . $this->l ( 'Introduce your password to reconfigure the module.' ) . '</h2>


						<div class="form-group" id="sep">

							<input type="email" id="signinEmail" class="form-control"
								placeholder="' . $this->l ( 'Email address' ) . '" required autofocus
								data-error="' . $this->l ( 'That email address is invalid' ) . '" required name="mail"
								value="' . addslashes ( Configuration::get ( 'HEIMDALAPM_EMAIL_TMP' ) ) . '">
							</input> <label for="' . $this->l ( 'inputPassword' ) . '" class="sr-only">Mail</label>

						</div>

						<div class="form-group">
							<input type="password" data-minlength="6" class="form-control"
								id="signinPassword" placeholder="' . $this->l ( 'Password' ) . '" required
								name="password" data-error="' . $this->l ( 'minimum 6 caracters' ) . '"> </input> <label
								for="inputPassword" class="sr-only">' . $this->l ( 'Password' ) . '</label>

						</div>
						<div class="form-group">
							' . $this->l ( 'Did you forget your password? Click' ) . '<a
								href="https://vikinguard.com/heimdal/index.html?action=forgot"
								target="_blank">' . " " . $this->l ( ' here.' ) . '</a>
							<button id="enviar" class="btn btn-lg btn-primary btn-block"
								type="submit">' . $this->l ( 'Sign in' ) . '</button>
						</div>





					</div>

					<!--<iframe width="100%" height="100%" src="https://vikinguard.com/heimdal"></iframe>-->
				</div>
			</div>
		</div>
	</div>
</div>






<script src="' . addslashes ( $this->_path ) . '/js/validator.min.js"></script>
<script type="text/javascript">
				
			    
				
				

				document.getElementById("enviar").addEventListener("click", function () {
								
			   	var email=document.getElementById("signinEmail").value;
			   	var password=document.getElementById("signinPassword").value;
				
				remembercallbackajax("https://vikinguard.com/heimdalapp/api/external/user/credentials/?email="+encodeURIComponent(email)+"&password="+encodeURIComponent(password)+"").done();		
							
			
				});
			   		
			 
				
						
			  function remembercallbackajax (uri, data) {
	 		
			    		 var request = {
			     		       	url: uri,
			    	           	contentType: "application/json",
			       		       	accepts: "application/json",
			            		cache: false,
			            		dataType: \'jsonp\',
			            		data: \'jsonp\',
    							success: function(json) {
			   						if (typeof json.message != \'undefined\'){
										alert("check your password");
									}else{
			   						
			   							var email=document.getElementById("signinEmail").value;
			   							var password=document.getElementById("signinPassword").value;  
										window.location.replace("' . addslashes ( $currentIndex ) . '&token=' . addslashes ( $token ) . '&action=multishop&heimdalapm_email="+encodeURIComponent(email)+"&heimdalapm_password="+encodeURIComponent(password)
												+"&heimdalapm_customer="+encodeURIComponent(json.customerId)
												+"&heimdalapm_customer_info=" + encodeURIComponent(JSON.stringify(json)));		
       								}
    							},
    							error: function(e) {
									alert("' . $this->l ( 'Communication problem. Please try again later.' ) . '");
       		
    							}
	     					};
										
										
			        return $.ajax(request);
		   		  };
				</script>
	';
	}
	public function multishopRender() {
		$currentIndex = $this->context->link->getAdminLink ( 'AdminModules', false ) . '&configure=' . $this->name . '&tab_module=' . $this->tab . '&module_name=' . $this->name;
		$token = Tools::getAdminTokenLite ( 'AdminModules' );
		$name = $this->context->shop->name;
		$domain = 'http://' . $this->context->shop->domain_ssl . $this->context->shop->physical_uri . $this->context->shop->virtual_uri;
		$customerInfo = stripcslashes ( Tools::getValue ( 'heimdalapm_customer_info', '' ) );
		
		$combo = "";
		$customer_info_decoded = json_decode ( $customerInfo );
		foreach ( $customer_info_decoded->shops as $element ) {
			$desc = $element->shopName;
			$desc .= " (";
			$desc .= $element->shopURL;
			$desc .= ")";
			$combo .= ' <option value=' . $element->shopId . '>' . $desc . '</option>';
		}
		
		$rights = $customer_info_decoded->rights;
		
		$firstPart = '<div class="panel" height="100%">
	<div class="row">
		<div class="col-lg-12">' . $this->displayName . '</div>
	</div>
	<hr />
	<div>
		<div class="row">
			<div class="col-lg-12">
				<p>
				<div class="col-lg-12 text-center" height="100%">
					<p></p>
					<div id="register" data-toggle="validator" class="form-signin">
						
						<h2 class="form-signin-heading">' . $this->l ( 'Select an existing shop ...' ) . '</h2>

						<div class="form-group">
								
							<label for="inputPassword" class="sr-only">' . $this->l ( 'Your Shop Name' ) . '</label>
							<select id="multishop_selector" name="shop" class="heimdal--input form-control">
								' . addslashes ( $combo ) . '
							</select>
								
						
							
						</div>
									
						<button id="selectShop" class="btn btn-lg btn-primary btn-block" type="submit">' . $this->l ( 'Use this shop' ) . '</button>';
		$secondPart = '<hr />
							 		
					<h2 class="form-signin-heading">' . $this->l ( '... or add a new one' ) . '</h2>

					<div class="form-group" title="' . $this->l ( 'This is just a name to refer to your shop.' ) . '">
						<input type="text" id="addShopName" class="form-control"
							placeholder="' . $this->l ( 'Customer name' ) . '" required autofocus
							data-error="' . $this->l ( 'Customer' ) . '" required name="customer" value="' . addslashes ( $name ) . '" size="50">
						</input>
						<div class="help-block with-errors">
						<label for="inputPassword" class="sr-only">' . $this->l ( 'Your Shop Name' ) . '</label>
						</div>
					</div>

					<div class="form-group" title="' . $this->l ( 'The module is going to use this address to monitor the uptime of your shop. Please, check the http and https is correct configured. Do not use private or localhost address, use your public ip or domain to allow' ) . $this->displayName . $this->l ( 'to access to your shop.' ) . '">
						<input type="text" id="addShopUrl" class="form-control"
							placeholder="' . $this->l ( 'Shop URL' ) . '" required autofocus data-error="Customer"
							required name="customer" value="' . addslashes ( $domain ) . '" size="50"> </input>
						<div class="help-block with-errors">
							<label for="inputPassword" class="sr-only">' . $this->l ( 'Your Shop Address' ) . '</label>

						</div>
					</div>

					<div class="checkbox">
						<input type="checkbox" id="signupTerms" checked="checked"
							data-error="' . $this->l ( 'you must accept ' ) . $this->displayName . $this->l ( '\'s terms' ) . '" required
							name="agree"></input>' . $this->l ( ' I agree to the' ) . '<a
							href="https://vikinguard.com/heimdal/EULA.html">' . $this->l ( 'Terms of
							Service.' ) . '</a>
						<div class="help-block with-errors"></div>
					</div>

					<button id="addMultishop" class="btn btn-lg btn-primary btn-block"
								type="submit">Sign up</button>
				</div>
			</div>

					<!--<iframe width="100%" height="100%" src="https://vikinguard.com/heimdal"></iframe>-->';
		
		$secondPartBis = '
		
					
					<div class="checkbox">
						<input type="checkbox" id="signupTerms" checked="checked"
							data-error="' . $this->l ( 'you must accept ' ) . $this->displayName . $this->l ( '\'s terms' ) . '" required
							name="agree"></input>' . $this->l ( ' I agree to the' ) . '<a
							href="https://vikinguard.com/heimdal/EULA.html">' . $this->l ( 'Terms of
							Service.' ) . '</a>
						<div class="help-block with-errors"></div>
					</div>';
		
		$thirdPart = '</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
				var said=false;
		   		function validateEmail(email) {
    					var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
   						 return re.test(email);
				}
				
				document.getElementById("selectShop").addEventListener("click", function () {
					var shopId = document.getElementById("multishop_selector").value;
					var customerId = "' . ( string ) Configuration::get ( 'HEIMDALAPM_CUSTOMER' ) . '";
					
					if(!document.getElementById("signupTerms").checked){
						alert("' . $this->l ( 'You must accept the terms' ) . '");						
					}else{
						window.location.replace("' . addslashes ( $currentIndex ) . '&token=' . addslashes ( $token ) . '&action=configured&heimdalapm_customer=" + encodeURIComponent(customerId)
							+ "&heimdalapm_shop=" + encodeURIComponent(shopId));
    				}
    			});
				
				document.getElementById("addMultishop").addEventListener("click", function () {
				    var shopName=document.getElementById("addShopName").value;
					var shopURL=document.getElementById("addShopUrl").value;
					var customerId = "' . ( string ) Configuration::get ( 'HEIMDALAPM_CUSTOMER' ) . '";
					var email="' . addslashes ( Configuration::get ( 'HEIMDALAPM_EMAIL_TMP' ) ) . '";
					var password="' . addslashes ( Configuration::get ( 'HEIMDALAPM_PASSWORD' ) ) . '";
			   		
			   		var send=true;
			   		var text="";
			   		
			   		if(shopName<6){
						text="' . $this->l ( 'Customer Name too short' ) . '\n";
			   			send=false;
					}
			   		
			   		if(!strStartsWith(shopURL,\'http\')){
						text=text+"' . $this->l ( 'Short url must start by http:// or https://' ) . '\n";
			   			send=false;
					}
			   				
					if(!document.getElementById("signupTerms").checked){
						text=text+"' . $this->l ( 'You must accept the terms' ) . '\n";
			   			send=false;
					}
			   				
			   		if((shopURL.indexOf("localhost") > -1)||(shopURL.indexOf("127.0.0.1") > -1)){
			   			if(!said){
			   				text="' . $this->l ( 'We have noticed that you configured the module to monitor a demo/test environment (localhost or 127.0.0.1). Please note that without real traffic and no public URL, you will not be able to monitor neither uptime neither real user experience and you will lose some important functionalities of our tool' ) . '";
			   				send=false;
			   			}
			   			said=true;
					}

					if(send){
						addShopCallbackajax("https://vikinguard.com/heimdalapp/api/external/customer/"+encodeURIComponent(customerId)+"/shop?"
							+"&mail=" + encodeURIComponent(email) + "&password=" + encodeURIComponent(password)
							+ "&shopName=" + encodeURIComponent(shopName) + "&shopUrl=" + encodeURIComponent(shopURL)
							).done( function(data,statusCode) {
					});
					}else{
						alert(text);					
					}
				});
			   		
			   	function strStartsWith(str, prefix) {
    					return str.indexOf(prefix) === 0;
				}
				
				function addShopCallbackajax (uri, data) {
				     var request = {
			            url: uri,
			            contentType: "application/json",
			            accepts: "application/json",
			            cache: false,
			            dataType: \'jsonp\',
			            data: \'jsonp\',
    						success: function(json) {
    							if ( json.status != 200) {
									alert(json.message+"("+json.status+")");
								} else {
							
									window.location.replace("' . addslashes ( $currentIndex ) . '&token=' . addslashes ( $token ) . '&action=configured"
										+ "&heimdalapm_customer=" + encodeURIComponent(json.customerId)
										+ "&heimdalapm_shop=" + encodeURIComponent(json.id));
								}
    						},
    						error: function(e) {
								alert("Communication problem. Please try again later.");
       		
    					}
	     			};
			        return $.ajax(request);
		   		  };

</script>';
		
		$others = '
				<div class="panel" height="100%">
				<div class="row" >
						
						<div class="col-lg-12">
				
							<img src="' . addslashes ( $this->_path ) . '/views/img/heimdal.png" class="img-responsive" width="304" "/>
						</div>
						<h2>
							 ' . $this->l ( 'you do not have enough rights to configure this shop.' ) . ' 
						</h2>
						
						<a href="' . addslashes ( $currentIndex ) . '&token=' . addslashes ( $token ) . '&action=reconfigured">' . $this->l ( ' to configure again.' ) . '</a>
								
				</div>
				</div>';
		
		if ($rights == "CUSTOMER_ADMIN") {
			return $firstPart . $secondPart . $thirdPart;
		}
		if ($rights == "SHOP_ADMIN") {
			return $firstPart . $secondPartBis . $thirdPart;
		}
		if ($rights == "NO_ADMIN") {
			return $others;
		}
	}
	public function signupRender() {
		$currentIndex = $this->context->link->getAdminLink ( 'AdminModules', false ) . '&configure=' . $this->name . '&tab_module=' . $this->tab . '&module_name=' . $this->name;
		$token = Tools::getAdminTokenLite ( 'AdminModules' );
		$name = $this->context->shop->name;
		$domain = 'http://' . $this->context->shop->domain_ssl . $this->context->shop->physical_uri . $this->context->shop->virtual_uri;
		
		return '<div class="panel" height="100%">
	<div class="row">
		<div class="col-lg-12">' . $this->displayName . '</div>
	</div>
	<hr />
	<div>
		<div class="row">
			<div class="col-lg-12">


				<p>
				<div class="col-lg-12 text-center" height="100%">
					<p></p>
					<div id="register" data-toggle="validator" class="form-signin">

						<h2 class="form-signin-heading">' . $this->l ( '1) Select a password:' ) . '</h2>
        		
        		
        		
        		
        		
        		
        				<div class="form-group" id="sep">

							 <label for="inputPassword" class="sr-only">' . $this->l ( 'Mail' ) . '</label> ' . addslashes ( Configuration::get ( 'HEIMDALAPM_EMAIL_TMP' ) ) . '

						</div>

						<div class="form-group">
							<input type="password" data-minlength="6" class="form-control"
								id="signupPassword" placeholder="' . $this->l ( 'Password' ) . '" required
								name="password" data-error="' . $this->l ( 'minimum 6 caracters' ) . '"> </input> <label
								for="inputPassword" class="sr-only">' . $this->l ( 'Choose a Password' ) . '</label>

						</div>

						
							<div class="form-group">

								<input type="password" class="form-control" id="signupConfirm"
									data-match="#signupPassword"
									data-match-error="' . $this->l ( 'Whoops, these don\'t match' ) . '"
									placeholder="' . $this->l ( 'Confirm' ) . '" required name="confirm"></input>
								<div class="help-block with-errors"></div>
								<label for="inputPassword" class="sr-only">' . $this->l ( 'Confirm the Password' ) . '</label>

							</div>
        		

							 		
<h2 class="form-signin-heading">' . $this->l ( '2) Review/Modify: ' ) . '</h2>

						<div class="form-group" title="' . $this->l ( 'This is just a name to refer to your shop.' ) . '">
							<input type="text" id="signupCustomer" class="form-control"
								placeholder="' . $this->l ( 'Customer name' ) . '" required autofocus
								data-error="' . $this->l ( 'Customer' ) . '" required name="customer" value="' . addslashes ( $name ) . '">
							</input>
							<div class="help-block with-errors"></div>
							<label for="inputPassword" class="sr-only">' . $this->l ( 'Your Shop Name' ) . '</label>
						</div>





						<div class="form-group" title="' . $this->l ( 'The module is going to use this address to monitor the uptime of your shop. Please, check the http and https is correct configured. Do not use private or localhost address, use your public ip or domain to allow' ) . $this->displayName . $this->l ( 'to access to your shop.' ) . '">
							<input type="url" id="signupShop" class="form-control"
								placeholder="' . $this->l ( 'Shop URL' ) . '" required autofocus data-error="Customer"
								required name="customer" value="' . addslashes ( $domain ) . '"> </input>
							<div class="help-block with-errors">
								<label for="inputPassword" class="sr-only">' . $this->l ( 'Your Shop Address' ) . '</label>

							</div>
						</div>


					

							<div class="checkbox">


								<input type="checkbox" id="signupTerms" checked="checked"
									data-error="' . $this->l ( 'you must accept ' ) . $this->displayName . $this->l ( '\'s terms' ) . '" required
									name="agree"></input>' . $this->l ( ' I agree to the' ) . '<a
									href="https://vikinguard.com/heimdal/EULA.html">' . $this->l ( 'Terms of
									Service.' ) . '</a>

								<div class="help-block with-errors"></div>

							</div>

							<button id="enviar" class="btn btn-lg btn-primary btn-block"
								type="submit">Sign up</button>
						</div>


					</div>

					<!--<iframe width="100%" height="100%" src="https://vikinguard.com/heimdal"></iframe>-->
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
				
			
				var said=false;
			   		
			   		function validateEmail(email) {
    						var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
   							 return re.test(email);
					}
				
				
				
				

				document.getElementById("enviar").addEventListener("click", function () {
								
 					
				    var customerName=document.getElementById("signupCustomer").value;
			   		var email="' . addslashes ( Configuration::get ( 'HEIMDALAPM_EMAIL_TMP' ) ) . '";
			   		var password=document.getElementById("signupPassword").value;
					var shopURL=document.getElementById("signupShop").value;
			   		var confirm=document.getElementById("signupConfirm").value;
			   		
			   		
			   		var send=true;
			   		var text="";
			   		
			   		
			   		
			   		
			   		
			   		if(customerName.length<6){
						text="' . $this->l ( 'Customer Name too short' ) . '\n";
			   			send=false;
	
					}
			   		
			   		if(!strStartsWith(shopURL,\'http\')){
						text=text+"' . $this->l ( 'Short url must start by http:// or https://' ) . '\n";
			   			send=false;
	
					}
			   				
			  
			   		
			   		if(confirm.length<6){
						text=text+"' . $this->l ( 'Password too short' ) . '\n";
			   			send=false;
	
					}
			   		
			   		if(confirm!=password){
						text=text+"' . $this->l ( 'Whoops, these passwords don\'t match' ) . '\n";
			   			send=false;
	
					}
			   		
			   		if(!validateEmail(email)){
						text=text+"' . $this->l ( 'Check your email configuration' ) . '\n";
			   			send=false;
	
					}
			   		if(!document.getElementById("signupTerms").checked){
						text=text+"' . $this->l ( 'You must accept the terms' ) . '\n";
			   			send=false;
	
					}
			   				
			   		if((shopURL.indexOf("localhost") > -1)||(shopURL.indexOf("127.0.0.1") > -1)){
						
			   			if(!said){
			   				text="' . $this->l ( 'We have noticed that you configured the module to monitor a demo/test environment (localhost or 127.0.0.1). Please note that without real traffic and no public URL, you will not be able to monitor neither uptime neither real user experience and you will lose some important functionalities of our tool' ) . '";
			   			
			   				send=false;
			   				}
			   				said=true;
			   				
	
					}
			   		
			   		
			   		if(send){
			   		
			   		

					signupcallbackajax("https://vikinguard.com/heimdalapp/api/external/customer?customerName="+encodeURIComponent(customerName)+"&mail="+encodeURIComponent(email)+"&password="+encodeURIComponent(password)+"&shopName="+encodeURIComponent(shopURL)).done( function(data,statusCode) {
							
							
	
												});
									
					}else{
						alert(text);					
					}
					
			
				});
			   		
			   	function strStartsWith(str, prefix) {
    					return str.indexOf(prefix) === 0;
				}
				
				
				function signupcallbackajax (uri, data) {
	 		
			     var request = {
			            url: uri,
			            contentType: "application/json",
			            accepts: "application/json",
			            cache: false,
			            dataType: \'jsonp\',
			            data: \'jsonp\',
    						success: function(json) {
			   					if(json.autocreation==false){
										alert(json.feedback);
								}else{
								
									var email="' . addslashes ( Configuration::get ( 'HEIMDALAPM_EMAIL_TMP' ) ) . '";
			   						var password=document.getElementById("signupPassword").value;
									

									window.location.replace("' . addslashes ( $currentIndex ) . '&token=' . addslashes ( $token ) . '&action=configured&heimdalapm_customer="+encodeURIComponent(json.customerId)+"&heimdalapm_shop="+encodeURIComponent(json.shops[0].shopId)
									+"&heimdalapm_email="+encodeURIComponent(email)+"&heimdalapm_password="+encodeURIComponent(password)+"&submit_signup=true");	
       							}
    						},
    						error: function(e) {
								alert("Communication problem. Please try again later.");
       		
    					}
	     			};
										
										
			        return $.ajax(request);
		   		  };
								
				</script>
	';
	}
	public function getConfigFieldsValues() {
		return array (
				'heimdalapm_email' => Tools::getValue ( 'heimdalapm_email', Configuration::get ( 'HEIMDALAPM_EMAIL' ) ),
				'heimdalapm_password' => Tools::getValue ( 'heimdalapm_password', Configuration::get ( 'HEIMDALAPM_PASSWORD' ) ),
				'heimdalapm_customerid' => Tools::getValue ( 'heimdalapm_customerid', ( string ) Configuration::get ( 'HEIMDALAPM_CUSTOMER' ) ),
				'heimdalapm_shopid' => Tools::getValue ( 'heimdalapm_shopid', ( string ) Configuration::get ( 'HEIMDALAPM_SHOP' ) ) 
		);
	}
	public function hookHeader($params) {
		$customerid = ( string ) Configuration::get ( 'HEIMDALAPM_CUSTOMER' );
		$shopid = ( string ) Configuration::get ( 'HEIMDALAPM_SHOP' );
		$configured = (($customerid != null) && ($shopid != null));
		$version = $this->version;
		$this->smarty->assign ( array (
				'customer' => ( string ) $customerid,
				'shop' => ( string ) $shopid,
				'configured' => $configured,
				'version' => $version 
		) );
		
		return $this->display ( __FILE__, 'views/templates/hook/vikinguard.tpl' );
	}
	public function hookOrderConfirmation($params) {
		$order = $params ['objOrder'];
		if (Validate::isLoadedObject ( $order )) {
			
			$order_products = array ();
			$cart = new Cart ( $order->id_cart );
			foreach ( $cart->getProducts () as $order_product )
				$order_products [] = $this->wrapProduct ( $order_product, "ORDER" );
			
			$currency = new Currency ( $this->context->currency->id );
			$transaction = array (
					'id' => $order->id,
					'revenue' => $order->total_paid,
					'tax' => $order->total_paid_tax_incl - $order->total_paid_tax_excl,
					'currency' => $currency->iso_code 
			);
			
			return $this->sendOrder ( $order_products, $transaction );
		}
	}
	public function hookProductFooter($params) {
		$controller_name = Tools::getValue ( 'controller' );
		if ($controller_name == 'product') {
			$vg_product = $this->wrapProduct ( ( array ) $params ['product'], "DETAIL" );
			
			return $this->sendInfo ( "detail", Tools::jsonEncode ( $vg_product ) );
		}
	}
	
	public function wrapProductCart($product, $extras, $index = 0, $full = false)
	{
		$ga_product = '';
	
		$variant = null;
		if (isset($product['attributes_small']))
			$variant = $product['attributes_small'];
		elseif (isset($extras['attributes_small']))
		$variant = $extras['attributes_small'];
	
		$product_qty = 1;
		if (isset($extras['qty']))
			$product_qty = $extras['qty'];
		elseif (isset($product['cart_quantity']))
		$product_qty = $product['cart_quantity'];
	
		if ($full)
		{
			$product_id = 0;
			if (!empty($product['reference']))
				$product_id = $product['reference'];
			else if (!empty($product['id_product']))
				$product_id = $product['id_product'];
			else if (!empty($product['id']))
				$product_id = $product['id'];
			
			$product_pk = 0;
			if (! empty ( $product ['id_product'] ))
				$product_pk = $product ['id_product'];
			else if (! empty ( $product ['id'] ))
				$product_pk = $product ['id'];
	
			
			
			$currency = new Currency ( $this->context->currency->id );
			
			$ga_product = array(
					'id' => $product_id,
					'name' => $product['name'],
					'category' => $product['category'],
					'quantity' => $product_qty,
					'currency' => $currency->iso_code,
					'pvp' => number_format(Product::getPriceStatic ( ( int ) $product_pk ),'2')
					
			);
	
			$ga_product = array_map('urlencode', $ga_product);
		}
	
		return $ga_product;
	}
	public function hookActionCartSave() {
		if (! isset ( $this->context->cart ))
			return;
		
		$cart = array (
				'controller' => Tools::getValue ( 'controller' ),
				'addAction' => Tools::getValue ( 'add' ) ? 'add' : '',
				'removeAction' => Tools::getValue ( 'delete' ) ? 'delete' : '',
				'extraAction' => Tools::getValue ( 'op' ),
				'qty' => ( int ) Tools::getValue ( 'qty', 1 ) 
		);
		
		$cart_products = $this->context->cart->getProducts ();
		if (isset ( $cart_products ) && count ( $cart_products ))
			foreach ( $cart_products as $cart_product )
				if ($cart_product ['id_product'] == Tools::getValue ( 'id_product' ))
					$add_product = $cart_product;
		
		if ($cart ['removeAction'] == 'delete') {
			$add_product_object = new Product ( ( int ) Tools::getValue ( 'id_product' ), true, ( int ) Configuration::get ( 'PS_LANG_DEFAULT' ) );
			if (Validate::isLoadedObject ( $add_product_object )) {
				$add_product ['name'] = $add_product_object->name;
				$add_product ['manufacturer_name'] = $add_product_object->manufacturer_name;
				$add_product ['category'] = $add_product_object->category;
				$add_product ['reference'] = $add_product_object->reference;
				$add_product ['link_rewrite'] = $add_product_object->link_rewrite;
				$add_product ['link'] = $add_product_object->link_rewrite;
				$add_product ['price'] = $add_product_object->price;
				$add_product ['ean13'] = $add_product_object->ean13;
				$add_product ['id_product'] = Tools::getValue ( 'id_product' );
				$add_product ['id_category_default'] = $add_product_object->id_category_default;
				$add_product ['out_of_stock'] = $add_product_object->out_of_stock;
				$add_product = Product::getProductProperties ( ( int ) Configuration::get ( 'PS_LANG_DEFAULT' ), $add_product );
			}
		}
		
		if (isset ( $add_product ) && ! in_array ( ( int ) Tools::getValue ( 'id_product' ), self::$products )) {
			self::$products [] = ( int ) Tools::getValue ( 'id_product' );
			$ga_products = $this->wrapProductCart ( $add_product, $cart, 0, true );
			
			if (array_key_exists ( 'id_product_attribute', $ga_products ) && $ga_products ['id_product_attribute'] != '' && $ga_products ['id_product_attribute'] != 0)
				$id_product = $ga_products ['id_product_attribute'];
			else
				$id_product = Tools::getValue ( 'id_product' );
			
			if (isset ( $this->context->cookie->vg_cart ))
				$gacart = unserialize ( $this->context->cookie->vg_cart );
			else
				$gacart = array ();
			
			if ($cart ['removeAction'] == 'delete')
				$ga_products ['quantity'] = - 1;
			elseif ($cart ['extraAction'] == 'down') {
				if (array_key_exists ( $id_product, $gacart ))
					$ga_products ['quantity'] = $gacart [$id_product] ['quantity'] - $cart ['qty'];
				else
					$ga_products ['quantity'] = $cart ['qty'] * - 1;
			} elseif (Tools::getValue ( 'step' ) <= 0) // Sometimes cartsave is called in checkout
{
				if (array_key_exists ( $id_product, $gacart ))
					$ga_products ['quantity'] = $gacart [$id_product] ['quantity'] + $cart ['qty'];
			}
			
			$gacart [$id_product] = $ga_products;
			$this->context->cookie->vg_cart = serialize ( $gacart );
		}
	}
	public function hookFooter() {
		$vg_scripts = "";
		$cart_scripts="";
		$controller_name = Tools::getValue ( 'controller' );
		
		
		if (isset ( $this->context->cookie->vg_cart )) {
			
			$gacarts = unserialize ( $this->context->cookie->vg_cart );
			$i=0;
			$j=0;
			foreach ( $gacarts as $gacart ) {
				
				if ($gacart ['quantity'] > 0) {
					$cart_scripts .= 'heimdaladdVar("addToCart['.$i.']",\'' . Tools::jsonEncode ( $gacart ) . '\');';
					$i++;
				} elseif ($gacart ['quantity'] < 0) {
					$gacart ['quantity'] = abs ( $gacart ['quantity'] );
					$cart_scripts .= 'heimdaladdVar("removeFromCart['.$j.']",\'' . Tools::jsonEncode ( $gacart ) . '\');';
					$j++;
				}
				
			}
			unset ( $this->context->cookie->vg_cart );
		}
		
		if ($controller_name == 'order' || $controller_name == 'orderopc') {
			
			$step = Tools::getValue ( 'step' );
			if (empty ( $step ))
				$step = 0;
			if ($step > 0){
				return;
			}
			$cart_products = $this->context->cart->getProducts ();
			if (isset ( $cart_products ) && count ( $cart_products ))
				foreach ( $cart_products as $cart_product ) {
					
					$products [] = $this->wrapProduct ( $cart_product, "CHECKOUT" );
				}
			if (isset ( $products )) {
				$cart = $this->createCart ( $products );
			}
			$vg_scripts .= '<script type="text/javascript">' . $cart . 'heimdaladdVar("checkout",' . ( int ) $step . ');'.$cart_scripts.'</script>';
		}else{
			
			$vg_scripts .= '<script type="text/javascript">' .$cart_scripts.'</script>';
		}
		
		return $vg_scripts;
	}
	
	
	
	
	
	
	public function wrapProduct($product, $type) {
		$vg_product = '';
		$product_id = 0;
		if (! empty ( $product ['reference'] ))
			$product_id = $product ['reference'];
		else if (! empty ( $product ['id_product'] ))
			$product_id = $product ['id_product'];
		else if (! empty ( $product ['id'] ))
			$product_id = $product ['id'];
		
		$product_pk = 0;
		if (! empty ( $product ['id_product'] ))
			$product_pk = $product ['id_product'];
		else if (! empty ( $product ['id'] ))
			$product_pk = $product ['id'];
		
		$currency = new Currency ( $this->context->currency->id );
		
		if ($type == "CART" || $type == "ORDER" ||$type == "CHECKOUT") {
			$vg_product = array (
					'id' => $product_id,
					'name' => $product ['name'],
					'category' => $product ['category'],
				//	'price' => number_format ( $product ['price'], '2' ),
					'currency' => $currency->iso_code,
					'pvp' =>number_format ( Product::getPriceStatic ( ( int ) $product_pk ), '2' ),
					'quantity' => $product ['quantity'] 
			);
		} else {
			if ($type == "DETAIL") {
				$vg_product = array (
						'id' => $product_id,
						'name' => $product ['name'],
						'category' => $product ['category'],
					//	'price' => number_format ( $product ['price'], '2' ),
						'currency' => $currency->iso_code,
						'pvp' => number_format(Product::getPriceStatic ( ( int ) $product_pk ),'2') 
				);
			}
		}
		$vg_product = array_map ( 'urlencode', $vg_product );
		return $vg_product;
	}
	public function install() {
		$this->installModuleTab ( 'Vikinguard Dashboard', 'Dashboard', 'Home' );
		$this->_clearCache ( 'vikinguard.tpl' );
		return (parent::install () && $this->registerHook ( 'header' ) && $this->registerHook ( 'productfooter' ) && $this->registerHook ( 'orderConfirmation' ) && $this->registerHook ( 'actionCartSave' ) && $this->registerHook ( 'footer' ));
	}
	public function uninstall() {
		if (! parent::uninstall ()) {
			return false;
		}
		$this->uninstallModuleTab ( "Dashboard" );
		Configuration::updateValue ( 'HEIMDALAPM_VERSION', "" );
		$this->_clearCache ( 'vikinguard.tpl' );
		return true;
	}
	private function installModuleTab($title, $class_sfx = '', $parent = '') {
		$class = 'Admin' . Tools::ucfirst ( $this->name ) . Tools::ucfirst ( $class_sfx );
		@copy ( _PS_MODULE_DIR_ . $this->name . '/logo.gif', _PS_IMG_DIR_ . 't/' . $class . '.gif' );
		
		if ($parent == '') {
			$position = Tab::getCurrentTabId ();
		} else {
			$position = Tab::getIdFromClassName ( $parent );
		}
		
		$tab1 = new Tab ();
		$tab1->class_name = "AdminVikinguardDashboard";
		$tab1->module = $this->name;
		$tab1->id_parent = ( integer ) $position;
		$langs = Language::getLanguages ( false );
		foreach ( $langs as $l ) {
			$tab1->name [$l ['id_lang']] = $title;
		}
		if ($parent == - 1) {
			$tab1->id_parent = - 1;
			$id_tab1 = $tab1->add ();
		} else {
			$id_tab1 = $tab1->add ( true, false );
		}
	}
	private function uninstallModuleTab($class_sfx = '') {
		$tabClass = 'Admin' . Tools::ucfirst ( $this->name ) . Tools::ucfirst ( $class_sfx );
		$idTab = Tab::getIdFromClassName ( $tabClass );
		if ($idTab != 0) {
			$tab = new Tab ( $idTab );
			$tab->delete ();
			return true;
		}
		return false;
	}
	public function sendInfo($type, $code) {
		return '<script type="text/javascript">
					heimdaladdVar("' . $type . '",\'' . $code . '\');
				</script>';
	}
	public function sendOrder($products, $order) {
		if (! is_array ( $products ))
			return;
		
		$js = '';
		$i = 0;
		foreach ( $products as $product ) {
			$js .= 'heimdaladdVar("productOrder[' . $i . ']",\'' . Tools::jsonEncode ( $product ) . '\');';
			$i = $i + 1;
		}
		
		$js .= 'heimdaladdVar("totalOrder",\'' . Tools::jsonEncode ( $order ) . '\');';
		
		return '<script type="text/javascript">' . $js . '</script>';
	}
	public function createCart($products) {
		if (! is_array ( $products ))
			return;
		
		$js = '';
		$i = 0;
		foreach ( $products as $product ) {
			$js .= 'heimdaladdVar("productCheckout[' . $i . ']",\'' . Tools::jsonEncode ( $product ) . '\');';
			$i = $i + 1;
		}
		
		return $js;
	}
}
