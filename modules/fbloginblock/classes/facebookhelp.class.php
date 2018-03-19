<?php
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

class facebookhelp extends Module{
	
	private $_width = 400;
	private $_height = 400;
	private $_name = 'fbloginblock';
	
	
    
    
    
	
	
	
	public function getImages($data = null){
			$admin = isset($data['admin'])?$data['admin']:0;
			global $smarty;
			 if(version_compare(_PS_VERSION_, '1.5', '>')){
	        	$id_shop = Context::getContext()->shop->id;
	         } else {
	        	$id_shop = 0;
	         }
	         
	         if(!$admin){
	         
	         $_http_host = '';
	         if(defined('_MYSQL_ENGINE_')){
				$_http_host = isset($smarty->tpl_vars['base_dir_ssl']->value)?$smarty->tpl_vars['base_dir_ssl']->value:$smarty->tpl_vars['base_dir']->value;
			 } else {
			    $_http_host = isset($smarty->_tpl_vars['base_dir_ssl'])?$smarty->_tpl_vars['base_dir_ssl']:$smarty->_tpl_vars['base_dir'];
			 }
		
			if($_http_host == 'http://' || $_http_host == 'http:///'
	    	   || $_http_host == 'https://' || $_http_host == 'https:///'){
	    	   	if (Configuration::get('PS_SSL_ENABLED') == 1)
					$type_url = "https://";
				else
					$type_url = "http://";
	    	   $_http_host = $type_url.$_SERVER['HTTP_HOST']."/";
	    	   }
        
	         } else {
	         	$_http_host = "../";
	         }
			// Facebook connect image
			
			$sql = 'SELECT * FROM `'._DB_PREFIX_   .$this->_name.'_img` 
		        	WHERE `type` = 1 AND `id_shop` = '.$id_shop.'';
			$data_facebook = Db::getInstance()->GetRow($sql);
			$img_blockfacebook = (isset($data_facebook['img'])?$data_facebook['img']:'');
			$img_facebook = dirname(__FILE__).DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."upload".DIRECTORY_SEPARATOR.$this->_name.DIRECTORY_SEPARATOR.$img_blockfacebook;
			
			
			$uploaded_img = 0;
			if(strlen($img_blockfacebook)>0){
				if(@filesize($img_facebook)>0){
					$uploaded_img = 1;
				}
			}
			if($uploaded_img){
				$facebook = $_http_host."upload/".$this->_name."/".$img_blockfacebook;
			} else {
				$facebook = $_http_host.'modules/'.$this->_name.'/img/facebook.png';
			}
			
			
			// Facebook connect small image
			
			$sql = 'SELECT * FROM `'._DB_PREFIX_   .$this->_name.'_img` 
		        	WHERE `type` = 4 AND `id_shop` = '.$id_shop.'';
			$data_facebooksmall = Db::getInstance()->GetRow($sql);
			$img_blockfacebooksmall = (isset($data_facebooksmall['img'])?$data_facebooksmall['img']:'');
			$img_facebooksmall = dirname(__FILE__).DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."upload".DIRECTORY_SEPARATOR.$this->_name.DIRECTORY_SEPARATOR.$img_blockfacebooksmall;
			
			
			$uploaded_imgsmall = 0;
			if(strlen($img_blockfacebooksmall)>0){
				if(@filesize($img_facebooksmall)>0){
					$uploaded_imgsmall = 1;
				}
			}
			if($uploaded_imgsmall){
				$facebooksmall = $_http_host."upload/".$this->_name."/".$img_blockfacebooksmall;
			} else {
				$facebooksmall = $_http_host.'modules/'.$this->_name.'/img/facebook-small.png';
			}
			
			// Paypal connect image
			
			$sql = 'SELECT * FROM `'._DB_PREFIX_   .$this->_name.'_img` 
		        	WHERE `type` = 3 AND `id_shop` = '.$id_shop.'';
			$data_paypal = Db::getInstance()->GetRow($sql);
			$img_paypal = (isset($data_paypal['img'])?$data_paypal['img']:'');
			$img_block_paypal = dirname(__FILE__).DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."upload".DIRECTORY_SEPARATOR.$this->_name.DIRECTORY_SEPARATOR.$img_paypal;
			
			$uploaded_imgauth = 0;
			if(strlen($img_paypal)>0){
				if(@filesize($img_block_paypal)>0){
					$uploaded_imgauth = 1;
				}
			}
			if($uploaded_imgauth){
				$paypal = $_http_host."upload/".$this->_name."/".$img_paypal;
			} else {
				$paypal = $_http_host.'modules/'.$this->_name.'/img/paypal.png';
			}
			
			// Paypal connect small image
			
			$sql = 'SELECT * FROM `'._DB_PREFIX_   .$this->_name.'_img` 
		        	WHERE `type` = 6 AND `id_shop` = '.$id_shop.'';
			$data_paypalsmall = Db::getInstance()->GetRow($sql);
			$img_paypalsmall = (isset($data_paypalsmall['img'])?$data_paypalsmall['img']:'');
			$img_block_paypalsmall = dirname(__FILE__).DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."upload".DIRECTORY_SEPARATOR.$this->_name.DIRECTORY_SEPARATOR.$img_paypalsmall;
			
			$uploaded_imgauthsmall = 0;
			if(strlen($img_paypalsmall)>0){
				if(@filesize($img_block_paypalsmall)>0){
					$uploaded_imgauthsmall = 1;
				}
			}
			if($uploaded_imgauthsmall){
				$paypalsmall = $_http_host."upload/".$this->_name."/".$img_paypalsmall;
			} else {
				$paypalsmall = $_http_host.'modules/'.$this->_name.'/img/paypal-small.png';
			}
			
			
			// Google connect image
			
			$sql = 'SELECT * FROM `'._DB_PREFIX_   .$this->_name.'_img` 
		        	WHERE `type` = 2 AND `id_shop` = '.$id_shop.'';
			$data_google = Db::getInstance()->GetRow($sql);
			$img_google = (isset($data_google['img'])?$data_google['img']:'');
			$img_block_google = dirname(__FILE__).DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."upload".DIRECTORY_SEPARATOR.$this->_name.DIRECTORY_SEPARATOR.$img_google;
			
			$uploaded_google = 0;
			if(strlen($img_google)>0){
				if(@filesize($img_block_google)>0){
					$uploaded_google = 1;
				}
			}
			if($uploaded_google){
				$google = $_http_host."upload/".$this->_name."/".$img_google;
			} else {
				$google = $_http_host.'modules/'.$this->_name.'/img/google.png';
			}
			
			// Google connect small image
			
			$sql = 'SELECT * FROM `'._DB_PREFIX_   .$this->_name.'_img` 
		        	WHERE `type` = 5 AND `id_shop` = '.$id_shop.'';
			$data_googlesmall = Db::getInstance()->GetRow($sql);
			$img_googlesmall = (isset($data_googlesmall['img'])?$data_googlesmall['img']:'');
			$img_block_googlesmall = dirname(__FILE__).DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."upload".DIRECTORY_SEPARATOR.$this->_name.DIRECTORY_SEPARATOR.$img_googlesmall;
			
			$uploaded_googlesmall = 0;
			if(strlen($img_googlesmall)>0){
				if(@filesize($img_block_googlesmall)>0){
					$uploaded_googlesmall = 1;
				}
			}
			if($uploaded_googlesmall){
				$googlesmall = $_http_host."upload/".$this->_name."/".$img_googlesmall;
			} else {
				$googlesmall = $_http_host.'modules/'.$this->_name.'/img/google-small.png';
			}
			
			
			// Twitter connect image
			
			$sql = 'SELECT * FROM `'._DB_PREFIX_   .$this->_name.'_img` 
		        	WHERE `type` = 7 AND `id_shop` = '.$id_shop.'';
			$data_twitter = Db::getInstance()->GetRow($sql);
			$img_twitter = (isset($data_twitter['img'])?$data_twitter['img']:'');
			$img_block_twitter = dirname(__FILE__).DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."upload".DIRECTORY_SEPARATOR.$this->_name.DIRECTORY_SEPARATOR.$img_twitter;
			
			$uploaded_twitter = 0;
			if(strlen($img_twitter)>0){
				if(@filesize($img_block_twitter)>0){
					$uploaded_twitter = 1;
				}
			}
			if($uploaded_twitter){
				$twitter = $_http_host."upload/".$this->_name."/".$img_twitter;
			} else {
				$twitter = $_http_host.'modules/'.$this->_name.'/img/twitter.png';
			}
			
			// Twitter connect small image
			
			$sql = 'SELECT * FROM `'._DB_PREFIX_   .$this->_name.'_img` 
		        	WHERE `type` = 8 AND `id_shop` = '.$id_shop.'';
			$data_twittersmall = Db::getInstance()->GetRow($sql);
			$img_twittersmall = (isset($data_twittersmall['img'])?$data_twittersmall['img']:'');
			$img_block_twittersmall = dirname(__FILE__).DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."upload".DIRECTORY_SEPARATOR.$this->_name.DIRECTORY_SEPARATOR.$img_twittersmall;
			
			$uploaded_twittersmall = 0;
			if(strlen($img_twittersmall)>0){
				if(@filesize($img_block_twittersmall)>0){
					$uploaded_twittersmall = 1;
				}
			}
			if($uploaded_twittersmall){
				$twittersmall = $_http_host."upload/".$this->_name."/".$img_twittersmall;
			} else {
				$twittersmall = $_http_host.'modules/'.$this->_name.'/img/twitter-small.png';
			}
			
			
			// Yahoo connect image
			
			$sql = 'SELECT * FROM `'._DB_PREFIX_   .$this->_name.'_img` 
		        	WHERE `type` = 9 AND `id_shop` = '.$id_shop.'';
			$data_yahoo = Db::getInstance()->GetRow($sql);
			$img_yahoo = (isset($data_yahoo['img'])?$data_yahoo['img']:'');
			$img_block_yahoo = dirname(__FILE__).DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."upload".DIRECTORY_SEPARATOR.$this->_name.DIRECTORY_SEPARATOR.$img_yahoo;
			
			$uploaded_yahoo = 0;
			if(strlen($img_yahoo)>0){
				if(@filesize($img_block_yahoo)>0){
					$uploaded_yahoo = 1;
				}
			}
			if($uploaded_yahoo){
				$yahoo = $_http_host."upload/".$this->_name."/".$img_yahoo;
			} else {
				$yahoo = $_http_host.'modules/'.$this->_name.'/img/yahoo.png';
			}
			
			// Yahoo connect small image
			
			$sql = 'SELECT * FROM `'._DB_PREFIX_   .$this->_name.'_img` 
		        	WHERE `type` = 10 AND `id_shop` = '.$id_shop.'';
			$data_yahoosmall = Db::getInstance()->GetRow($sql);
			$img_yahoosmall = (isset($data_yahoosmall['img'])?$data_yahoosmall['img']:'');
			$img_block_yahoosmall = dirname(__FILE__).DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."upload".DIRECTORY_SEPARATOR.$this->_name.DIRECTORY_SEPARATOR.$img_yahoosmall;
			
			$uploaded_yahoosmall = 0;
			if(strlen($img_yahoosmall)>0){
				if(@filesize($img_block_yahoosmall)>0){
					$uploaded_yahoosmall = 1;
				}
			}
			if($uploaded_yahoosmall){
				$yahoosmall = $_http_host."upload/".$this->_name."/".$img_yahoosmall;
			} else {
				$yahoosmall = $_http_host.'modules/'.$this->_name.'/img/yahoo-small.png';
			}
			
			
			// Linkedin connect image
			
			$sql = 'SELECT * FROM `'._DB_PREFIX_   .$this->_name.'_img` 
		        	WHERE `type` = 11 AND `id_shop` = '.$id_shop.'';
			$data_linkedin = Db::getInstance()->GetRow($sql);
			$img_linkedin = (isset($data_linkedin['img'])?$data_linkedin['img']:'');
			$img_block_linkedin = dirname(__FILE__).DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."upload".DIRECTORY_SEPARATOR.$this->_name.DIRECTORY_SEPARATOR.$img_linkedin;
			
			$uploaded_linkedin = 0;
			if(strlen($img_linkedin)>0){
				if(@filesize($img_block_linkedin)>0){
					$uploaded_linkedin = 1;
				}
			}
			if($uploaded_linkedin){
				$linkedin = $_http_host."upload/".$this->_name."/".$img_linkedin;
			} else {
				$linkedin = $_http_host.'modules/'.$this->_name.'/img/linkedin.png';
			}
			
			// linkedin connect small image
			
			$sql = 'SELECT * FROM `'._DB_PREFIX_   .$this->_name.'_img` 
		        	WHERE `type` = 12 AND `id_shop` = '.$id_shop.'';
			$data_linkedinsmall = Db::getInstance()->GetRow($sql);
			$img_linkedinsmall = (isset($data_linkedinsmall['img'])?$data_linkedinsmall['img']:'');
			$img_block_linkedinsmall = dirname(__FILE__).DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."upload".DIRECTORY_SEPARATOR.$this->_name.DIRECTORY_SEPARATOR.$img_linkedinsmall;
			
			$uploaded_linkedinsmall = 0;
			if(strlen($img_linkedinsmall)>0){
				if(@filesize($img_block_linkedinsmall)>0){
					$uploaded_linkedinsmall = 1;
				}
			}
			if($uploaded_linkedinsmall){
				$linkedinsmall = $_http_host."upload/".$this->_name."/".$img_linkedinsmall;
			} else {
				$linkedinsmall = $_http_host.'modules/'.$this->_name.'/img/linkedin-small.png';
			}
			
			
			// Microsoft connect image
			
			$sql = 'SELECT * FROM `'._DB_PREFIX_   .$this->_name.'_img` 
		        	WHERE `type` = 13 AND `id_shop` = '.$id_shop.'';
			$data_microsoft = Db::getInstance()->GetRow($sql);
			$img_microsoft = (isset($data_microsoft['img'])?$data_microsoft['img']:'');
			$img_block_microsoft = dirname(__FILE__).DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."upload".DIRECTORY_SEPARATOR.$this->_name.DIRECTORY_SEPARATOR.$img_microsoft;
			
			$uploaded_microsoft = 0;
			if(strlen($img_microsoft)>0){
				if(@filesize($img_block_microsoft)>0){
					$uploaded_microsoft = 1;
				}
			}
			if($uploaded_microsoft){
				$microsoft = $_http_host."upload/".$this->_name."/".$img_microsoft;
			} else {
				$microsoft = $_http_host.'modules/'.$this->_name.'/img/microsoft.png';
			}
			
			// Microsoft connect small image
			
			$sql = 'SELECT * FROM `'._DB_PREFIX_   .$this->_name.'_img` 
		        	WHERE `type` = 14 AND `id_shop` = '.$id_shop.'';
			$data_microsoftsmall = Db::getInstance()->GetRow($sql);
			$img_microsoftsmall = (isset($data_microsoftsmall['img'])?$data_microsoftsmall['img']:'');
			$img_block_microsoftsmall = dirname(__FILE__).DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."upload".DIRECTORY_SEPARATOR.$this->_name.DIRECTORY_SEPARATOR.$img_microsoftsmall;
			
			$uploaded_microsoftsmall = 0;
			if(strlen($img_microsoftsmall)>0){
				if(@filesize($img_block_microsoftsmall)>0){
					$uploaded_microsoftsmall = 1;
				}
			}
			if($uploaded_microsoftsmall){
				$microsoftsmall = $_http_host."upload/".$this->_name."/".$img_microsoftsmall;
			} else {
				$microsoftsmall = $_http_host.'modules/'.$this->_name.'/img/microsoft-small.png';
			}
			
			return array('facebook'=>$facebook,'facebook_block'=> $img_blockfacebook, 
						 'facebooksmall'=>$facebooksmall, 'facebook_blocksmall' => $img_blockfacebooksmall,
						 'paypal'=>$paypal, 'paypal_block' => $img_paypal,
						 'paypalsmall'=>$paypalsmall, 'paypal_blocksmall' => $img_paypalsmall,
						 'google' => $google, 'google_block' => $img_google,
						 'googlesmall' => $googlesmall, 'google_blocksmall' => $img_googlesmall ,
						 'twitter' => $twitter, 'twitter_block' => $img_twitter,
						 'twittersmall' => $twittersmall, 'twitter_blocksmall' => $img_twittersmall, 
						 'yahoo' => $yahoo, 'yahoo_block' => $img_yahoo,
						 'yahoosmall' => $yahoosmall, 'yahoo_blocksmall' => $img_yahoosmall,
						 'linkedin' => $linkedin, 'linkedin_block' => $img_linkedin,
						 'linkedinsmall' => $linkedinsmall, 'linkedin_blocksmall' => $img_linkedinsmall,
						 'microsoft' => $microsoft, 'microsoft_block' => $img_microsoft,
						 'microsoftsmall' => $microsoftsmall, 'microsoft_blocksmall' => $img_microsoftsmall   
						    
						 );
			}
	
	
	public function saveImage($data = null){
		
		$error = 0;
		$error_text = '';
		$custom_type_img = $data['type'];
		
		$files = $_FILES['post_image_'.$custom_type_img];
		
		############### files ###############################
		if(!empty($files['name']))
			{
		      if(!$files['error'])
		      {
				  $type_one = $files['type'];
				  $ext = explode("/",$type_one);
				  
				  if(strpos('_'.$type_one,'image')<1)
				  {
				  	$error_text = $this->l('Invalid file type, please try again!');
				  	$error = 1;

				  }elseif(!in_array($ext[1],array('png','x-png','gif','jpg','jpeg','pjpeg'))){
				  	$error_text = $this->l('Wrong file format, please try again!');
				  	$error = 1;
				  	
				  } else {
				  	
				  		
				  		
				  		$data_img = $this->getImages(array('admin'=>1));
				  		if($custom_type_img == "facebook"){
				  			$type_page = 1;
				  			$img_old_del = $data_img['facebook_block']; 
				  					
				  		} elseif($custom_type_img == "google"){
				  			$type_page = 2;
				  			$img_old_del = $data_img['google_block']; 		
				  		} elseif($custom_type_img == "paypal"){
				  			$type_page = 3;
				  			$img_old_del = $data_img['paypal_block']; 		
				  		} elseif($custom_type_img == "facebooksmall"){
				  			$type_page = 4;
				  			$img_old_del = $data_img['facebook_blocksmall']; 		
				  		} elseif($custom_type_img == "linkedin"){
				  			$type_page = 11;
				  			$img_old_del = $data_img['linkedin_block']; 		
				  		} elseif($custom_type_img == "microsoft"){
				  			$type_page = 13;
				  			$img_old_del = $data_img['microsoft_block']; 		
				  		} elseif($custom_type_img == "googlesmall"){
				  			$type_page = 5;
				  			$img_old_del = $data_img['google_blocksmall']; 		
				  		} elseif($custom_type_img == "paypalsmall"){
				  			$type_page = 6;
				  			$img_old_del = $data_img['paypal_blocksmall']; 		
				  		} elseif($custom_type_img == "twitter"){
				  			$type_page = 7;
				  			$img_old_del = $data_img['twitter_block']; 		
				  		} elseif($custom_type_img == "twittersmall"){
				  			$type_page = 8;
				  			$img_old_del = $data_img['twitter_blocksmall']; 		
				  		} elseif($custom_type_img == "yahoo"){
				  			$type_page = 9;
				  			$img_old_del = $data_img['yahoo_block']; 		
				  		} elseif($custom_type_img == "yahoosmall"){
				  			$type_page = 10;
				  			$img_old_del = $data_img['yahoo_blocksmall']; 		
				  		} elseif($custom_type_img == "linkedinsmall"){
				  			$type_page = 12;
				  			$img_old_del = $data_img['linkedin_blocksmall']; 		
				  		} elseif($custom_type_img == "microsoftsmall"){
				  			$type_page = 14;
				  			$img_old_del = $data_img['microsoft_blocksmall']; 		
				  		}
    					
    					
				  		if(strlen($img_old_del)>0){
				  			// delete old img
				  			$name_thumb = current(explode(".",$img_old_del));
				  			unlink(dirname(__FILE__).DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."upload".DIRECTORY_SEPARATOR.$this->_name.DIRECTORY_SEPARATOR.$img_old_del);
				  		} 
					
				  			
					  	srand((double)microtime()*1000000);
					 	$uniq_name_image = uniqid(rand());
					 	$type_one = substr($type_one,6,strlen($type_one)-6);
					 	$filename = $uniq_name_image.'.'.$type_one; 
					 	
						move_uploaded_file($files['tmp_name'], dirname(__FILE__).DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."upload".DIRECTORY_SEPARATOR.$this->_name.DIRECTORY_SEPARATOR.$filename);
						
						/*$this->copyImage(array('dir_without_ext'=>dirname(__FILE__).DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."upload".DIRECTORY_SEPARATOR.$this->_name.DIRECTORY_SEPARATOR.$uniq_name_image,
												'name'=>dirname(__FILE__).DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."upload".DIRECTORY_SEPARATOR.$this->_name.DIRECTORY_SEPARATOR.$filename)
										);*/
						
						
						$img_return = $uniq_name_image.'.jpg';
						$img_return = $filename;
			  		
				  		$this->_updateImgDB(array('type_page' => $type_page,
				  								  'img' => $img_return
				  							     )
				  							);

				  }
				}
				
			}  
			
		return array('error' => $error,
					 'error_text' => $error_text);
	
	
	}
	
	private function _updateImgDB($data = null){
		
		$type_page = $data['type_page'];
		$img = $data['img'];
		
		if(version_compare(_PS_VERSION_, '1.5', '>')){
	       	$id_shop = Context::getContext()->shop->id;
	    } else {
	      	$id_shop = 0;
	    }
	         
		
		$sql = 'SELECT count(*) as count FROM `'._DB_PREFIX_   .$this->_name.'_img` 
		        	WHERE `type` = '.$type_page.' AND `id_shop` = '.$id_shop.'';
		$data_exists = Db::getInstance()->GetRow($sql);
		
		if($data_exists['count']){
			// delete and insert
			$sql = 'DELETE FROM `'._DB_PREFIX_.$this->_name.'_img` 
						   WHERE `type` = '.$type_page.' 
						   AND `id_shop` = '.$id_shop.'';
			if(version_compare(_PS_VERSION_, '1.5', '>')){
				Db::getInstance()->Execute($sql);
			} else {
				defined('_MYSQL_ENGINE_')?Db::getInstance()->ExecuteS($sql):Db::getInstance()->Execute($sql);
			}
		} else {
			// only insert new
		}
		// insert
		$sql = 'INSERT INTO `'._DB_PREFIX_.$this->_name.'_img` 
						   SET `type` = '.$type_page.', 
						       `id_shop` = '.$id_shop.',
						       `img` = \''.pSQL($img).'\'
						       ';
		
		if(version_compare(_PS_VERSION_, '1.5', '>')){
			Db::getInstance()->Execute($sql);
		} else {
			defined('_MYSQL_ENGINE_')?Db::getInstance()->ExecuteS($sql):Db::getInstance()->Execute($sql);
		}
	}
	
	public function deleteImage($data){
		$type = $data['type'];
		
		if(version_compare(_PS_VERSION_, '1.5', '>')){
		       	$id_shop = Context::getContext()->shop->id;
		    } else {
		      	$id_shop = 0;
		    }
	    
		$sql = 'SELECT * FROM `'._DB_PREFIX_   .$this->_name.'_img` 
		        	WHERE `type` = '.$type.' AND `id_shop` = '.$id_shop.'';
		$data = Db::getInstance()->GetRow($sql);
		$img_delete = (isset($data['img'])?$data['img']:'');
			
		    
		   $sql = 'DELETE FROM `'._DB_PREFIX_.$this->_name.'_img` 
						   WHERE `type` = '.$type.' 
						   AND `id_shop` = '.$id_shop.'';
			if(version_compare(_PS_VERSION_, '1.5', '>')){
				Db::getInstance()->Execute($sql);
			} else {
				defined('_MYSQL_ENGINE_')?Db::getInstance()->ExecuteS($sql):Db::getInstance()->Execute($sql);
			}
			
		
		@unlink(dirname(__FILE__).DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."upload".DIRECTORY_SEPARATOR.$this->_name.DIRECTORY_SEPARATOR.$img_delete);
				  		
	}
	
	
	/*	
	public function copyImage($data){
	
		$filename = $data['name'];
		$dir_without_ext = $data['dir_without_ext'];
		$width = $this->_width;
		$height = $this->_height;
		
		if (!$width){ $width = 85; };
		if (!$height){ $height = 85; };
		// Content type
		$size_img = getimagesize($filename);
		// Get new dimensions
		list($width_orig, $height_orig) = getimagesize($filename);
		$ratio_orig = $width_orig/$height_orig;
		
		if($width_orig>$height_orig){
		$height =  $width/$ratio_orig;
		}else{ 
		$width = $height*$ratio_orig;
		}
		if($width_orig<$width){
			$width = $width_orig;
			$height = $height_orig;
		}
	
			$image_p = imagecreatetruecolor($width, $height);
		$bgcolor=ImageColorAllocate($image_p, 255, 255, 255);
		//   
		imageFill($image_p, 5, 5, $bgcolor);
	
		if ($size_img[2]==2){ $image = imagecreatefromjpeg($filename);}                         
		else if ($size_img[2]==1){  $image = imagecreatefromgif($filename);}                         
		else if ($size_img[2]==3) { $image = imagecreatefrompng($filename); }
	
		imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
		// Output
		$users_img = $dir_without_ext.'.jpg';
		if ($size_img[2]==2)  imagejpeg($image_p, $users_img, 100);                         
		else if ($size_img[2]==1)  imagejpeg($image_p, $users_img, 100);                        
		else if ($size_img[2]==3)  imagejpeg($image_p, $users_img, 100);
		imageDestroy($image_p);
		imageDestroy($image);
		unlink($filename);

	}*/
	
	
}