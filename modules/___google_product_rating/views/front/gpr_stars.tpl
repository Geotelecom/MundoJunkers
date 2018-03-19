<div itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating" style="padding: 10px 0px 20px;text-align: left;font-size: 12px;color: #909090;">
  {*}<span itemprop="itemreviewed">{$product_reviewed|escape:'htmlall':'UTF-8'}</span> {*}
	<span itemprop="ratingValue">{$rating_value}</span> {l s='out of' mod='google_product_rating'} <span itemprop="bestRating">5</span> {l s='based on' mod='google_product_rating'} <span itemprop="ratingCount">{$rating_count}</span> {l s='user ratings.' mod='google_product_rating'}
</div>

{*<fieldset class="rating">
    <input disabled type="radio" id="star5" name="rating" value="5" {if  $halfed eq 1} checked {/if}/><label class = "full" for="star5"></label>
    <input disabled type="radio" id="star4half" name="rating" value="4 and a half" {if $halfed eq 4.5}  checked {/if}/><label class="half" for="star4half" ></label>
    <input disabled type="radio" id="star4" name="rating" value="4" {if $halfed eq 4} checked {/if}/><label class = "full" for="star4" ></label>
    <input disabled type="radio" id="star3half" name="rating" value="3 and a half" {if $halfed eq 3.5} checked {/if}/><label class="half" for="star3half" ></label>
    <input disabled type="radio" id="star3" name="rating" value="3" {if $halfed eq 3} checked {/if}/><label class = "full" for="star3" ></label>
    <input disabled type="radio" id="star2half" name="rating" value="2 and a half" {if $halfed eq 2.5} checked {/if}/><label class="half" for="star2half" ></label>
    <input disabled type="radio" id="star2" name="rating" value="2" {if $halfed eq 2} checked {/if}/><label class = "full" for="star2" ></label>
    <input disabled type="radio" id="star1half" name="rating" value="1 and a half" {if $halfed eq 1.5} checked {/if}/><label class="half" for="star1half" ></label>
    <input disabled type="radio" id="star1" name="rating" value="1" {if $halfed eq 1} checked {/if}/><label class = "full" for="star1" ></label>
    <input disabled type="radio" id="starhalf" name="rating" value="half" {if $halfed eq 0.5} checked {/if}/><label class="half" for="starhalf" ></label>
</fieldset>
{literal}
<style>
.rating { 
  border: none;
  float: left;
}
.rating > input { display: none; } 
.rating > label:before { 
  margin: 5px;
  font-size: 1.25em;
  font-family: FontAwesome;
  display: inline-block;
  content: "\f005";
}
.rating > .half:before { 
  content: "\f089";
  position: absolute;
}
.rating > label { 
  color: #ddd; 
 float: right; 
}
.rating > input:checked ~ label, 
.rating > label:hover ~ input:checked ~ label {
  color: #FFED85;
} 
</style>
{/literal}*}