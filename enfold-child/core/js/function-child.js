/**
 * Theme Scripts Child Theme
**/



jQuery(document).ready(function($) {
	//console.log('child script load');

   //  $('#wp-alphabet-listing').isotope({
   //  	sortBy: 'class',
   //  	layoutMode: 'vertical',
   //  	transitionDuration: '0'
   //  }).isotope( 'reloadItems' );

   //  $('#filters a').click(function(){
   //      var selector = '.' + $(this).attr('data-filter');

   //      $('#wp-alphabet-listing').isotope({ filter: selector });
  

   //      return false;
   // });


    // $('#filters a').click(function(){
    //     //console.log($( this ));
    //      $('#filters a').removeClass('is-checked');
    //      $( this ).addClass('is-checked');
    // });

    // $('.office-wrap').hide();
    // $('.flags').click(function(e) {
    //    e.preventDefault();
    //    $expand = $(this).next('.office-wrap').toggle();

    // });


    $('#country_select').on('change', function() {
        
        console.log( this.value );
        term_id = this.value;

        $('#country_detail').css({
            'opacity': 0.3
        });
        $('#firms_list').css({
            'opacity': 0.3
        });

        $.ajax({
            type    : "POST",
            url     : MyAjax.ajaxurl,
            dataType: "json",
            data    : "action=get_products_by_country&term_id=" + term_id,
            success : function (a) {
                //console.log(a);
                //if (a.content) {
                    $('#country_detail').html(a.profile+a.diagnostics+a.scid_newborn_screening).css({
                        'opacity': '1'
                    });
                    $('#firms_list').html(a.content).css({
                        'opacity': '1'
                    });
                    console.log(a.name);
                    console.log(country);
                    //google.maps.event.trigger(country.getPath(), 'click');
                //}
            }
        });//end ajax

    });//end change

// if($.fn.avia_sc_toggle)
// {
//     $('.togglecontainer').avia_sc_toggle();
// }






// -------------------------------------------------------------------------------------------
// Toggle shortcode javascript
// -------------------------------------------------------------------------------------------

$.fn.avia_sc_toggle_ = function(options)
{
    var defaults =
    {
        single: '.single_toggle',
        heading: '.toggler',
        content: '.toggle_wrap',
        sortContainer:'.taglist'
    };

    var win = $(window),
        options = $.extend(defaults, options);

    return this.each(function()
    {
        var container   = $(this).addClass('enable_toggles'),
            toggles     = $(options.single, container),
            heading     = $(options.heading, container),
            allContent  = $(options.content, container),
            sortLinks   = $(options.sortContainer + " a", container);

        heading.each(function(i)
        {
            var thisheading =  $(this), content = thisheading.next(options.content, container);

            function scroll_to_viewport()
            {
                //check if toggle title is in viewport. if not scroll up
                var el_offset = content.offset().top,
                    scoll_target = el_offset - 50 - parseInt($('html').css('margin-top'),10);

                if(win.scrollTop() > el_offset)
                {
                    $('html:not(:animated),body:not(:animated)').animate({scrollTop: scoll_target},200);
                }
            }

            if(content.css('visibility') != "hidden")
            {
                thisheading.addClass('activeTitle');
            }

            thisheading.on('click', function()
            {
                if(content.css('visibility') != "hidden")
                {
                    content.slideUp(200, function()
                    {
                        content.removeClass('active_tc').attr({style:''});
                        win.trigger('av-height-change');
                    });
                    thisheading.removeClass('activeTitle');

                }
                else
                {
                    if(container.is('.toggle_close_all'))
                    {
                        allContent.not(content).slideUp(200, function()
                        {
                            $(this).removeClass('active_tc').attr({style:''});
                            scroll_to_viewport();
                        });
                        heading.removeClass('activeTitle');
                    }
                    content.addClass('active_tc').slideDown(200,
                    
                    function()
                    {
                        if(!container.is('.toggle_close_all'))
                        {
                            scroll_to_viewport();
                        }
                        
                        win.trigger('av-height-change');
                    }
                    
                    );
                    thisheading.addClass('activeTitle');
                    location.replace(thisheading.data('fake-id'));
                }
                
                
                
            });
        });


        sortLinks.click(function(e){

            e.preventDefault();
            var show = toggles.filter('[data-tags~="'+$(this).data('tag')+'"]'),
                hide = toggles.not('[data-tags~="'+$(this).data('tag')+'"]');

                sortLinks.removeClass('activeFilter');
                $(this).addClass('activeFilter');
                heading.filter('.activeTitle').trigger('click');
                show.slideDown();
                hide.slideUp();
        });


        function trigger_default_open(hash)
        {
            if(!hash && window.location.hash) hash = window.location.hash;
            if(!hash) return;
            
            var open = heading.filter('[data-fake-id="'+hash+'"]');

            if(open.length)
            {
                if(!open.is('.activeTitle')) open.trigger('click');
                window.scrollTo(0, container.offset().top - 70);
            }
        }
        trigger_default_open(false);
        
        $('a').on('click',function(){
            var hash = $(this).attr('href');
            if(typeof hash != "undefined" && hash)
            {
                hash = hash.replace(/^.*?#/,'');
                trigger_default_open('#'+hash);
            }
        });

    });
};

	$( document ).ajaxComplete(function() {
        console.log('ajaxComplete');
	     $('.togg').avia_sc_toggle_();
        //collapse brand
        $('.brand_wrap').hide();
        $('.brand_wrap').each(function(index) {
           $(this).css('height', $(this).height());
        });

        $('.brand_title').click(function(e) {
            e.preventDefault();
            $(this).next('.brand_wrap').slideToggle();
            $(this).toggleClass("brand_active");
        });
    });

	$('.toog_sort').avia_sc_toggle_();


    // customaze slider
	$('.slideshow_align_caption').prepend('<span class="ipopi_homepage_tag" ><span class="ipopi_homepage_tag_label">news</span></span>');
    $('#full_slider_1 .avia-slide-wrap').append('<div class="av-inner-masonry-content-pos-content-bg"></div>');

    //collapse menu
    $('#footer .widget_nav_menu .sub-menu').hide();
    $('#footer .widget_nav_menu .menu-item-has-children a').click(function(e) {
        e.preventDefault();
        $(this).next('.sub-menu').slideToggle();
    });




}); //ready

