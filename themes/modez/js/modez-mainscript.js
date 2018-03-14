// Loader

$(window).load(function() { $(".loaderbg").fadeOut("slow"); });


// Browser detection
// If Safari
$(function () {
    if (navigator.userAgent.indexOf('Safari') != -1 &&
        navigator.userAgent.indexOf('Chrome') == -1) {
        $("body").addClass("safari");
    }
});

// If Android
var ua = navigator.userAgent.toLowerCase();
var isAndroid = ua.indexOf("android") > -1; //&& ua.indexOf("mobile");
if(isAndroid) {
    $("body").addClass("android");
}

// Roy Discount Count
/*jQuery(document).ready(function($){
    $( ".roycount" ).each(function(e) {
        var $roycount = $(this);
        var $dataspecificpriceto = $roycount.attr('data-specific-price-to');
        $roycount.closest('.roycountdown').county({
            endDateTime: new Date($dataspecificpriceto.replace(/-/g, "/")) , reflection: false, animation: 'none', theme: 'black',
            titleDays:$roycount.data('days'),titleHours:$roycount.data('hours'),titleMinutes:$roycount.data('minutes'),titleSeconds:$roycount.data('seconds')
        });
    })
});*/

// Up Arrow
$(document).ready(function() {
    $("a.modezuparrow_link").click(function() {
        $("html, body").animate({
            scrollTop: $($(this).attr("href")).offset().top + "px"
        }, {
    duration: 500
    });
return false;
});
});

$(document).ready(function(){
    var ulFeatured = $(".hfeatured"),
        autoFeatured = ulFeatured.attr('data-auto') === "true" ? true : false,
        maxslidesFeatured = parseInt(ulFeatured.attr('data-max-slides')),
        ulBest = $(".hbest"),
        autoBest = ulBest.attr('data-auto') === "true" ? true : false,
        maxslidesBest = parseInt(ulBest.attr('data-max-slides')),
        ulNew = $(".hnew"),
        autoNew = ulNew.attr('data-auto') === "true" ? true : false,
        maxslidesNew = parseInt(ulNew.attr('data-max-slides')),
        ulSale = $(".hspecials"),
        autoSale = ulSale.attr('data-auto') === "true" ? true : false,
        maxslidesSale = parseInt(ulSale.attr('data-max-slides'))
;

// Home products carousels
    function carloads() {
       /* $('ul.car-featured').owlCarousel({
            loop:true,
            margin:30,
            autoplay:autoFeatured,
            autoplayTimeout:5000,
            autoplayHoverPause:true,
            mouseDrag:true,
            touchDrag:true,
            navText:'  ',
            nav:true,
            navSpeed:400,
            autoplaySpeed:1100,
            dots:false,
            responsive:{
                0:{
                    items:1,
                    nav:false
                },
                480:{
                    items:2,
                    nav:false
                },
                680:{
                    items:3
                },
                1199:{
                    items:maxslidesFeatured
                }
            }
        });

        $('ul.car-best').owlCarousel({
            loop:true,
            margin:30,
            autoplay:autoBest,
            autoplayTimeout:5000,
            autoplayHoverPause:true,
            mouseDrag:true,
            touchDrag:true,
            navText:'  ',
            nav:true,
            navSpeed:400,
            autoplaySpeed:1100,
            dots:false,
            responsive:{
                0:{
                    items:1,
                    nav:false
                },
                480:{
                    items:2,
                    nav:false
                },
                680:{
                    items:3
                },
                1199:{
                    items:maxslidesBest
                }
            }
        });

        $('ul.car-new').owlCarousel({
            loop:true,
            margin:30,
            autoplay:autoNew,
            autoplayTimeout:5000,
            autoplayHoverPause:true,
            mouseDrag:true,
            touchDrag:true,
            navText:'  ',
            nav:true,
            navSpeed:400,
            autoplaySpeed:1100,
            dots:false,
            responsive:{
                0:{
                    items:1,
                    nav:false
                },
                480:{
                    items:2,
                    nav:false
                },
                680:{
                    items:3
                },
                1199:{
                    items:maxslidesNew
                }
            }
        });
        $('ul.car-sale').owlCarousel({
            loop:true,
            margin:30,
            autoplay:autoSale,
            autoplayTimeout:5000,
            autoplayHoverPause:true,
            mouseDrag:true,
            touchDrag:true,
            navText:'  ',
            nav:true,
            navSpeed:400,
            autoplaySpeed:1100,
            dots:false,
            responsive:{
                0:{
                    items:1,
                    nav:false
                },
                480:{
                    items:2,
                    nav:false
                },
                680:{
                    items:3
                },
                1199:{
                    items:maxslidesSale
                }
            }
        });
        $('ul#roybrandsul').owlCarousel({
            loop:true,
            margin:90,
            autoplay:true,
            autoplayTimeout:5000,
            autoplayHoverPause:true,
            mouseDrag:true,
            touchDrag:true,
            navText:'  ',
            nav:true,
            navSpeed:400,
            autoplaySpeed:1100,
            dots:false,
            responsive:{
                0:{
                    items:3,
                    nav:false
                },
                480:{
                    items:4,
                    nav:false
                },
                680:{
                    items:3
                },
                1199:{
                    items:6
                }
            }
        });
        $('#products_category_ul').owlCarousel({
            loop:true,
            margin:20,
            autoplay:false,
            mouseDrag:true,
            touchDrag:true,
            navText:'  ',
            nav:true,
            navSpeed:400,
            autoplaySpeed:1100,
            dots:false,
            responsive:{
                0:{
                    items:2,
                    nav:false
                },
                680:{
                    items:3
                },
                1199:{
                    items:5
                }
            }
        });
        $('#crossselling_list_car').owlCarousel({
            loop:true,
            margin:20,
            autoplay:false,
            mouseDrag:true,
            touchDrag:true,
            navText:'  ',
            nav:true,
            navSpeed:400,
            autoplaySpeed:1100,
            dots:false,
            responsive:{
                0:{
                    items:2,
                    nav:false
                },
                680:{
                    items:3
                },
                1199:{
                    items:5
                }
            }
        });*/
    }

    function carloads_afterdom() {
        /*$('ul#specialsul').owlCarousel({
            loop:true,
            margin:14,
            autoplay:false,
            autoplayTimeout:5000,
            autoplayHoverPause:true,
            mouseDrag:true,
            touchDrag:true,
            autoHeight:true,
            navText:'  ',
            nav:true,
            navSpeed:400,
            autoplaySpeed:1100,
            dots:false,
            responsive:{
                0:{
                    items:2,
                    nav:false
                },
                768:{
                    items:1
                }
            }
        });
        $('ul#viewedul').owlCarousel({
            loop:true,
            margin:14,
            autoplay:false,
            autoplayTimeout:5000,
            autoplayHoverPause:true,
            mouseDrag:true,
            touchDrag:true,
            autoHeight:true,
            navText:'  ',
            nav:true,
            navSpeed:400,
            autoplaySpeed:1100,
            dots:false,
            responsive:{
                0:{
                    items:1
                }
            }
        });
        $('.products_slider').owlCarousel({
            loop:true,
            margin:14,
            autoplay:false,
            autoplayTimeout:5000,
            autoplayHoverPause:true,
            mouseDrag:true,
            touchDrag:true,
            autoHeight:true,
            navText:'  ',
            nav:true,
            navSpeed:400,
            autoplaySpeed:1100,
            dots:false,
            responsive:{
                0:{
                    items:1
                }
            }
        });*/
    }

    carloads();
    setTimeout(carloads_afterdom, 200);

});




$(document).ready(function(){
    $("#FINALmenu-desktop-nav").find(".right-tabs:first").addClass("first");
});