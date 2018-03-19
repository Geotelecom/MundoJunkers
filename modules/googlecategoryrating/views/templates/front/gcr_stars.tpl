{*
 *
 * Google Category Rating module for Prestashop by Avellana Digital
 *
 * @author     Avellana Digital SL
 * @copyright  Copyright (c) 2017 Avellana Digital - www.avellanadigital.com
 * @license    Commercial license
 * @version    1.0.0
*}
<div id="cgr_block">
  <div itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
    <span itemprop="itemreviewed">{$category_reviewed|escape:'htmlall':'UTF-8'}</span> 
  	<span itemprop="ratingValue">{$rating_value|escape:'htmlall':'UTF-8'}</span> {l s='out of' mod='googlecategoryrating'} <span itemprop="bestRating">5</span> {l s='based on' mod='googlecategoryrating'} <span itemprop="ratingCount">{$rating_count|escape:'htmlall':'UTF-8'}</span> {l s='user ratings.' mod='googlecategoryrating'}
  </div>
  <fieldset class="gprrating" style="display:none;">
      <input class="noUniform not_uniform" data-no-uniform="true" disabled type="radio" id="star5" name="rating" value="5" {if  $halfed eq 5} checked {/if}/><label class = "full" for="star5"></label>
      <input class="noUniform not_uniform" data-no-uniform="true" disabled type="radio" id="star4half" name="rating" value="4 and a half" {if $halfed eq 4.5}  checked {/if}/><label class="half" for="star4half" ></label>
      <input class="noUniform not_uniform" data-no-uniform="true" disabled type="radio" id="star4" name="rating" value="4" {if $halfed eq 4} checked {/if}/><label class = "full" for="star4" ></label>
      <input class="noUniform not_uniform" data-no-uniform="true" disabled type="radio" id="star3half" name="rating" value="3 and a half" {if $halfed eq 3.5} checked {/if}/><label class="half" for="star3half" ></label>
      <input class="noUniform not_uniform" data-no-uniform="true" disabled type="radio" id="star3" name="rating" value="3" {if $halfed eq 3} checked {/if}/><label class = "full" for="star3" ></label>
      <input class="noUniform not_uniform" data-no-uniform="true" disabled type="radio" id="star2half" name="rating" value="2 and a half" {if $halfed eq 2.5} checked {/if}/><label class="half" for="star2half" ></label>
      <input class="noUniform not_uniform" data-no-uniform="true" disabled type="radio" id="star2" name="rating" value="2" {if $halfed eq 2} checked {/if}/><label class = "full" for="star2" ></label>
      <input class="noUniform not_uniform" data-no-uniform="true" disabled type="radio" id="star1half" name="rating" value="1 and a half" {if $halfed eq 1.5} checked {/if}/><label class="half" for="star1half" ></label>
      <input class="noUniform not_uniform" data-no-uniform="true" disabled type="radio" id="star1" name="rating" value="1" {if $halfed eq 1} checked {/if}/><label class = "full" for="star1" ></label>
      <input class="noUniform not_uniform" data-no-uniform="true" disabled type="radio" id="starhalf" name="rating" value="half" {if $halfed eq 0.5} checked {/if}/><label class="half" for="starhalf" ></label>
  </fieldset>
</div>
{if $is_ps17}
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
{/if}
{literal}
<script>
$(document).ready(function() {
  $('#cgr_block').appendTo('.content_scene_cat');
});
</script>
<style>
#cgr_block {
  background: #fff;
  padding: 0px;
  margin-bottom: 1.5625rem;
  text-align: left;
  font-size: 11px;
}
.gprrating { 
  border: none;margin: auto;display: block;width: 133.6px;margin-top: 10px;
}
.gprrating > input { display: none; } 
.gprrating > label:before { 
  margin: 5px;
  font-size: 1.25em;
  font-family: FontAwesome;
  display: inline-block;
  content: "\f005";
}
.gprrating > .half:before { 
  content: "\f089";
  position: absolute;
}
.gprrating > label { 
  color: #ddd; 
 float: right; 
}
.gprrating > input:checked ~ label, 
.gprrating > label:hover ~ input:checked ~ label {
  color: #FFED85;
} 
</style>
{/literal}