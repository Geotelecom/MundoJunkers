<!-- Block user information module NAV  -->
{if $is_logged}
	<div class="header_user_info">
		<a class="logout" href="{$link->getPageLink('index', true, NULL, "mylogout")|escape:'html':'UTF-8'}" rel="nofollow" title="{l s='Log me out' mod='blockuserinfo'}">
			{l s='Sign out' mod='blockuserinfo'}
		</a>
	</div>
	<div class="header_user_info">
		<a href="{$link->getPageLink('my-account', true)|escape:'html':'UTF-8'}" title="{l s='View my customer account' mod='blockuserinfo'}" class="account" rel="nofollow"><span>{l s='My account'}</span></a>
	</div>
	<div class="header_user_info">
		<span class="userwelcome">{l s='Welcome,'}</span> <span class="usercustomer">{$cookie->customer_firstname} {$cookie->customer_lastname}</span></a>
	</div>
	{else}
		<div class="header_user_info">
			<a href="{$link->getPageLink('my-account', true)|escape:'html':'UTF-8'}" title="{l s='View my customer account' mod='blockuserinfo'}" class="account" rel="nofollow"><span>{l s='My account'}</span></a>
		</div>
		<div class="header_user_info">
			<a class="login" href="{$link->getPageLink('my-account', true)|escape:'html':'UTF-8'}" rel="nofollow" title="{l s='Login to your customer account' mod='blockuserinfo'}">
				{l s='Sign in' mod='blockuserinfo'}
			</a>
		</div>
{/if}

<!-- /Block usmodule NAV -->

