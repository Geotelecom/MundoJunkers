/**
* This is main js file. Don't edit the file if you want to update module in future.
* 
* @author    Globo Software Solution JSC <contact@globosoftware.net>
* @copyright 2015 GreenWeb Team
* @link	     http://www.globosoftware.net
* @license   please read license in file license.txt
*/
if (typeof $.uniform !== 'undefined')
    if (typeof $.uniform.defaults !== 'undefined')
    {
    	if (typeof contact_fileDefaultHtml !== 'undefined')
    		$.uniform.defaults.fileDefaultHtml = contact_fileDefaultHtml;
    	if (typeof contact_fileButtonHtml !== 'undefined')
    		$.uniform.defaults.fileButtonHtml = contact_fileButtonHtml;
    }
var CaptchaCallback = function(){
        $('.g-recaptcha').each(function(index, el) {
            grecaptcha.render(this, {'sitekey' : $(this).data('sitekey')});
        });
    };    
$(document).ready(function(){   
     if($('.htmlinput').length > 0){
         tinymce.init({ selector:'.htmlinput' });
     }
     if($('.mColorPickerInput').length > 0)
        $('.mColorPickerInput').each( function() {
                $(this).minicolors({
                    control: $(this).attr('data-control') || 'hue',
                    defaultValue: $(this).attr('data-defaultValue') || '',
                    format: $(this).attr('data-format') || 'hex',
                    keywords: $(this).attr('data-keywords') || '',
                    inline: $(this).attr('data-inline') === 'true',
                    letterCase: $(this).attr('data-letterCase') || 'lowercase',
                    opacity: $(this).attr('data-opacity'),
                    position: $(this).attr('data-position') || 'bottom left',
                    swatches: $(this).attr('data-swatches') ? $(this).attr('data-swatches').split('|') : [],
                    change: function(value, opacity) {
                        if( !value ) return;
                        if( opacity ) value += ', ' + opacity;
                        if( typeof console === 'object' ) {
                            //console.log(value);
                        }
                    },
                    theme: 'bootstrap'
                });

            });
     if($( ".datepicker").length > 0){
        $( ".datepicker" ).datepicker({ 
            changeYear: true,
            changeMonth: true,
        });
     }
     if($( ".time_input").length > 0){
        $( ".time_input").each(function(){
            rel = $(this).attr('name');
            time = $('.'+rel+'_hour').val()+':'+$('.'+rel+'_minute').val();
            if($('.'+rel+'_apm').length > 0){
                time = time+' '+$('.'+rel+'_apm').val();
            }
            $(this).val(time);
        })
     }
     $('.time_select').change(function(){
        rel = $(this).attr('rel');
        time = $('.'+rel+'_hour').val()+':'+$('.'+rel+'_minute').val();
        if($('.'+rel+'_apm').length > 0){
            time = time+' '+$('.'+rel+'_apm').val();
        }
        $('input[name="'+rel+'"]').val(time);
     });
     gformbuilderpro_overlay = '<div id="gformbuilderpro_overlay"><div class="container"><div class="content"><div class="circle"></div></div></div></div></div>';
     $('.grating').change(function(){
            rateval = $(this).val();
            ratename = $(this).attr('name');
            for(i=1;i<=5;i++){
                if(i > rateval){
                    $('.'+ratename+'star'+i).removeClass('active');
                }else{
                    $('.'+ratename+'star'+i).addClass('active');
                }
            }
     });
     $('.slider-range').each(function(){
        $(this).slider({
              range: "min",
              value: $('#'+$(this).data('id')).val(),
              min: $('#'+$(this).data('id')).data('min'),
              max: $('#'+$(this).data('id')).data('max'),
              step: $('#'+$(this).data('id')).data('range'),
              slide: function( event, ui ) {
                $('#'+$(this).data('id')).val(ui.value);
                $('#'+$(this).data('id')+'-value').html(ui.value);
              }
        });
     });
     $('.slider-range-multi').each(function(){
        valmin = $('#'+$(this).data('id')).data('valmin');
        valmax = $('#'+$(this).data('id')).data('valmax');
        $(this).slider({
              range: true,
              values: [valmin,valmax],
              min: $('#'+$(this).data('id')).data('min'),
              max: $('#'+$(this).data('id')).data('max'),
              step: $('#'+$(this).data('id')).data('range'),
              slide: function( event, ui ) {
                $('#'+$(this).data('id')).val(ui.values[0]+'->'+ui.values[1]);
                $('#'+$(this).data('id')+'-value').html(ui.values[0]+'->'+ui.values[1]);
              }
        });
     });
     $('.spinner_plus').click(function(){
        spinner_value = parseInt($('#'+$(this).data('id')).val());
        maxval = parseInt($('#'+$(this).data('id')).data('max'));
        range = parseInt($('#'+$(this).data('id')).data('range'));
        if(maxval > (spinner_value+range)){
            $('#'+$(this).data('id')).val(parseInt(spinner_value)+range);
        }else{
            $('#'+$(this).data('id')).val(parseInt(maxval));
        }
     });
     $('.spinner_sub').click(function(){
        spinner_value = parseInt($('#'+$(this).data('id')).val());
        minval = parseInt($('#'+$(this).data('id')).data('min'));
        range = parseInt($('#'+$(this).data('id')).data('range'));
        if(minval < (spinner_value-range)){
            $('#'+$(this).data('id')).val(parseInt(spinner_value)-range);
        }else{
            $('#'+$(this).data('id')).val(parseInt(minval));
        }
     });
     $('.onoffswitch-checkbox').change(function(){
            if($(this).is(':checked')){
                $(this).parents('.onoffswitch').find('.onoffswitch-label').addClass('onoffswitch-active');
            }else{
                $(this).parents('.onoffswitch').find('.onoffswitch-label').removeClass('onoffswitch-active');
            }
     });
     $('.onoffswitch-checkbox').each(function(){
            if($(this).is(':checked')){
                $(this).parents('.onoffswitch').find('.onoffswitch-label').addClass('onoffswitch-active');
            }else{
                $(this).parents('.onoffswitch').find('.onoffswitch-label').removeClass('onoffswitch-active');
            }
     });
    function getDoc(frame) {
        var doc = null;
        try {
            if (frame.contentWindow) {
                doc = frame.contentWindow.document;
            }
        } catch (err) {}
        if (doc) {
            return doc;
        }
        try {
            doc = frame.contentDocument ? frame.contentDocument : frame.document;
        } catch (err) {
            doc = frame.document;
        }
        return doc;
    }
    $(".gformbuilderpro_form form.form_using_ajax").submit(function(e) {
        var formsubmit = $(this);
        if (typeof tinymce != "undefined") { 
            tinymce.triggerSave();
        }
        var formURL = formsubmit.attr("action");
        $(gformbuilderpro_overlay).appendTo(formsubmit);
        if (window.FormData !== undefined) {
            var formData = new FormData(this);
            $.ajax({
                url: formURL,
                type: 'POST',
                data: formData,
                mimeType: "multipart/form-data",
                contentType: false,
                cache: false,
                processData: false,
                success: function(data, textStatus, jqXHR) {
                    formsubmit.find('#gformbuilderpro_overlay').remove();
                    var result = $.parseJSON(data);
                    if(formsubmit.find('.formajaxresult').length > 0){
                        if(result.errors == '0') 
                            formsubmit.find('.formajaxresult').html('<div class="success_box">'+result.thankyou+'</div>');
                        else
                            formsubmit.find('.formajaxresult').html(result.thankyou);
                    }else{
                        resulthtml = '';
                        if(result.errors == '0') 
                            resulthtml ='<div class="formajaxresult"><div class="success_box">'+result.thankyou+'</div><div>';
                        else
                            resulthtml = '<div class="formajaxresult">'+result.thankyou+'<div>';
                        $(resulthtml).insertBefore(formsubmit.find('.gformbuilderpro_content'));
                    }
                    
                    $('html,body').animate({
                        scrollTop: formsubmit.find('.formajaxresult').offset().top},
                    'slow');
                    if(result.autoredirect == true){
                        setTimeout(function () {
                           window.location.href = result.redirect_link;
                        }, result.timedelay);
                    }
                    if (typeof grecaptcha != "undefined") {
                        grecaptcha.reset();
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    if (typeof grecaptcha != "undefined") {
                        grecaptcha.reset();
                    }
                    var err = eval("(" + jqXHR.responseText + ")");
                    alert(err.Message);
                    
                }
            });
            e.preventDefault();
            //e.unbind();
        } else {
            var iframeId = 'unique' + (new Date().getTime());
            var iframe = $('<iframe src="javascript:false;" name="' + iframeId + '" />');
            iframe.hide();
            formsubmit.attr('target', iframeId);
            iframe.appendTo('body');
            iframe.load(function(e) {
                $('#gformbuilderpro_overlay').remove();
                var doc = getDoc(iframe[0]);
                var docRoot = doc.body ? doc.body : doc.documentElement;
                var data = docRoot.innerHTML;
                var result = $.parseJSON(data);
                if(formsubmit.find('.formajaxresult').length > 0){
                    if(result.errors == '0') 
                        formsubmit.find('.formajaxresult').html('<div class="success_box">'+result.thankyou+'</div>');
                    else
                        formsubmit.find('.formajaxresult').html(result.thankyou);
                }else{
                    resulthtml = '';
                    if(result.errors == '0') 
                        resulthtml ='<div class="formajaxresult"><div class="success_box">'+result.thankyou+'</div><div>';
                    else
                        resulthtml = '<div class="formajaxresult">'+result.thankyou+'<div>';
                    $(resulthtml).insertBefore(formsubmit.find('.gformbuilderpro_content'));
                }
                $('html,body').animate({
                    scrollTop: formsubmit.find('.formajaxresult').offset().top},
                'slow');
                if (typeof grecaptcha != "undefined") {
                    grecaptcha.reset();
                }
            });
        }
    });
    $('.color_box .mColorPickerinput').live('click',function(){
        id = $(this).attr('id');
        if($('#icp_'+id).length > 0){
            $('#icp_'+id).click();
        }
    });
     
})