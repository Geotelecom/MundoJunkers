{*
 * ©2015 Heimdalapm
 *
 * @author    http://vikinguard.com
 * @copyright Copyright (C) 2015 vikinguard.com <@info@heimdalapm.com>
 *            All rights reserved.
 * @license   http://vikinguard.com/heimdal/EULA.html
 *}
 
<style>
#main{
 min-height: 100%;
    height: 100%;

}

#icon-AdminHeimdalapmDashboard{

	content: "\f000";
}

#content.bootstrap {
    padding: 0;
    transition-duration: 0.4s;
    transition-property: margin;
    transition-timing-function: ease-out;
    min-height: 100%;
    height: 100%;
}

.fill { 
	width:100%;
    min-height: 100%;
    height: 100%;
}
</style>

<iframe class="fill" src="https://vikinguard.com/heimdal/index.html?auto=true&email={$email|escape:'htmlall':'UTF-8'}&password={$password|urlencode}&version=PE{$version|escape:'htmlall':'UTF-8'}" />


