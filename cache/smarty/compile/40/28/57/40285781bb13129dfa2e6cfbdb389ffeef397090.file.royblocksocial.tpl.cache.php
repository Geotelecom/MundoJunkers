<?php /* Smarty version Smarty-3.1.19, created on 2018-03-01 16:58:45
         compiled from "/var/www/vhosts/mundojunkers.es/httpdocs/themes/modez/modules/royblocksocial/royblocksocial.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20953107185a982335f25f81-49000439%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '40285781bb13129dfa2e6cfbdb389ffeef397090' => 
    array (
      0 => '/var/www/vhosts/mundojunkers.es/httpdocs/themes/modez/modules/royblocksocial/royblocksocial.tpl',
      1 => 1493215253,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20953107185a982335f25f81-49000439',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'facebook_url' => 0,
    'twitter_url' => 0,
    'rss_url' => 0,
    'youtube_url' => 0,
    'google_plus_url' => 0,
    'pinterest_url' => 0,
    'instagram_url' => 0,
    'vk_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a98233601be64_48047201',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a98233601be64_48047201')) {function content_5a98233601be64_48047201($_smarty_tpl) {?>

<section id="social_block">
    <div class="social_block_container">
        <h4><?php echo smartyTranslate(array('s'=>'Follow us','mod'=>'royblocksocial'),$_smarty_tpl);?>
</h4>
        <ul>
            <?php if ($_smarty_tpl->tpl_vars['facebook_url']->value!='') {?>
                <li class="facebook">
                    <a target="_blank" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['facebook_url']->value,'html','UTF-8');?>
" title="Sigue ClimAhorro en <?php echo smartyTranslate(array('s'=>'Facebook','mod'=>'royblocksocial'),$_smarty_tpl);?>
">
                        <span><?php echo smartyTranslate(array('s'=>'Facebook','mod'=>'royblocksocial'),$_smarty_tpl);?>
</span>
                    </a>
                </li>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['twitter_url']->value!='') {?>
                <li class="twitter">
                    <a target="_blank" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['twitter_url']->value,'html','UTF-8');?>
" title="Sigue ClimAhorro en Twitter">
                        <span><?php echo smartyTranslate(array('s'=>'Twitter','mod'=>'royblocksocial'),$_smarty_tpl);?>
</span>
                    </a>
                </li>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['rss_url']->value!='') {?>
                <li class="rss">
                    <a target="_blank" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['rss_url']->value,'html','UTF-8');?>
" title="Sigue ClimAhorro en <?php echo smartyTranslate(array('s'=>'RSS','mod'=>'royblocksocial'),$_smarty_tpl);?>
">
                        <span><?php echo smartyTranslate(array('s'=>'RSS','mod'=>'royblocksocial'),$_smarty_tpl);?>
</span>
                    </a>
                </li>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['youtube_url']->value!='') {?>
                <li class="youtube">
                    <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['youtube_url']->value,'html','UTF-8');?>
" title="Sigue ClimAhorro en <?php echo smartyTranslate(array('s'=>'Youtube','mod'=>'royblocksocial'),$_smarty_tpl);?>
">
                        <span><?php echo smartyTranslate(array('s'=>'Youtube','mod'=>'royblocksocial'),$_smarty_tpl);?>
</span>
                    </a>
                </li>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['google_plus_url']->value!='') {?>
                <li class="google-plus">
                    <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['google_plus_url']->value,'html','UTF-8');?>
" title="Sigue ClimAhorro en <?php echo smartyTranslate(array('s'=>'Google Plus','mod'=>'royblocksocial'),$_smarty_tpl);?>
">
                        <span><?php echo smartyTranslate(array('s'=>'Google Plus','mod'=>'royblocksocial'),$_smarty_tpl);?>
</span>
                    </a>
                </li>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['pinterest_url']->value!='') {?>
                <li class="pinterest">
                    <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['pinterest_url']->value,'html','UTF-8');?>
" title="Sigue ClimAhorro en <?php echo smartyTranslate(array('s'=>'Pinterest','mod'=>'royblocksocial'),$_smarty_tpl);?>
">
                        <span><?php echo smartyTranslate(array('s'=>'Pinterest','mod'=>'royblocksocial'),$_smarty_tpl);?>
</span>
                    </a>
                </li>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['instagram_url']->value!='') {?>
                <li class="instagram">
                    <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['instagram_url']->value,'html','UTF-8');?>
" title="Sigue ClimAhorro en <?php echo smartyTranslate(array('s'=>'Instagram','mod'=>'royblocksocial'),$_smarty_tpl);?>
">
                        <span><?php echo smartyTranslate(array('s'=>'Instagram','mod'=>'royblocksocial'),$_smarty_tpl);?>
</span>
                    </a>
                </li>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['vk_url']->value!='') {?>
                <li class="vk">
                    <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['vk_url']->value,'html','UTF-8');?>
" title="Sigue ClimAhorro en <?php echo smartyTranslate(array('s'=>'VK.com','mod'=>'royblocksocial'),$_smarty_tpl);?>
">
                        <span><?php echo smartyTranslate(array('s'=>'VK.com','mod'=>'royblocksocial'),$_smarty_tpl);?>
</span>
                    </a>
                </li>
            <?php }?>
        </ul>
    </div>
</section>
<?php }} ?>
