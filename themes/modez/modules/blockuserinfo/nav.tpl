<!-- Block user information module NAV  -->
<div id="header_user_info">
<ul>
{if $is_logged}
	<li>
		<span class="userwelcome">{l s='Welcome,' mod='blockuserinfo'}</span> <span class="usercustomer">{$cookie->customer_firstname} {$cookie->customer_lastname}</span></a>
	</li>
	<li>
		<a href="{$link->getPageLink('my-account', true)|escape:'html':'UTF-8'}" title="{l s='View my customer account' mod='blockuserinfo'}" class="account" rel="follow"><span>{l s='My account' mod='blockuserinfo'}</span></a>
	</li>
	<li>
		<a class="logout" href="{$link->getPageLink('index', true, NULL, "mylogout")|escape:'html':'UTF-8'}" rel="follow" title="{l s='Log me out' mod='blockuserinfo'}">
			{l s='Sign out' mod='blockuserinfo'}
		</a>
	</li>
	{else}
		<li>
			<a href="{$link->getPageLink('my-account', true)|escape:'html':'UTF-8'}" title="{l s='View my customer account' mod='blockuserinfo'}" class="account" rel="follow"><span>{l s='My account' mod='blockuserinfo'}</span></a>
		</li>
		<li>
			<a class="login" href="{$link->getPageLink('my-account', true)|escape:'html':'UTF-8'}" rel="follow" title="{l s='Login to your customer account' mod='blockuserinfo'}">
				{l s='Sign in' mod='blockuserinfo'}
			</a>
		</li>
{/if}
</ul>
</div>
<!-- /Block usmodule NAV -->

