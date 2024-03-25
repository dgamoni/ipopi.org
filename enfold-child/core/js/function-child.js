/**
 * Theme Scripts Child Theme
**/

(function($)
{   
    "use strict";
        

    jQuery(document).ready(function($) {

        avia_responsive_menu_child();

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
        $('#footer .widget_nav_menu .menu-item-has-children > a').click(function(e) {
            e.preventDefault();
            $(this).next('.sub-menu').slideToggle();
        });

        //collapse MOBIL menu 
        $('#mobile-advanced .sub-menu').hide();
        $('#mobile-advanced .menu-item-has-children > a').click(function(e) {
            e.preventDefault();
            var sub = $(this).next('.sub-menu');
            //var menu2 = $('.mobile-advanced2');
            //var h = sub.height();
            //var topp = menu2.position().top;

            if (sub.is(':visible')) {
                sub.slideUp();
                //console.log('not');
                //menu2.offset({top:topp-h});
            } else {
                sub.slideDown();
                //sub.show();
                sub.css({
                    opacity: '1',
                    visibility: 'visible'
                });
                

                //console.log('visible');
                //menu2.offset({top:topp+h});
            }

        });

        $('#mobile-advanced .second_menu_element .sub-menu').each(function(){
            $(this).find('a').each(function(){
              $(this).wrapInner('<span></span>');

            });      

        });        




    }); //ready


    function avia_responsive_menu_child()
    {
        var $html = $('html'), win = $(window), header = $('.responsive #header');
        //console.log('avia_responsive_menu');
        if(!header.length) return;
        //console.log('run');
        //dgamoni fix mobil menu
        var menu1               = header.find('.main_menu ul:eq(0)');
        //console.log(menu1);
        var menu2               = header.find('.ipopimainmenu_sub.sub_menu ul:eq(0)');
        //console.log(menu2);
        var menu_23 = menu1.add(menu2);
        //console.log(menu_23);
        var mobile_advanced1    = menu1.clone().attr({id:"mobile-advanced", "class":"mobile-advanced1"});
        var mobile_advanced2    = menu2.clone().attr({id:"mobile-advanced", "class":"mobile-advanced2"});
        
        //console.log(mobile_advanced12);
        var menu3 = menu1.append(menu2.children().addClass('second_menu_element'));

        //var mobile_advanced12 = mobile_advanced1.add(mobile_advanced2);
        var mobile_advanced12   = menu3.clone().attr({id:"mobile-advanced", "class":"mobile-advanced1"});

        var menu                = menu_23,
            first_level_items   = menu_23.find('>li').length,
            container           = $('#wrap_all'),
            show_menu_btn       = $('#advanced_menu_toggle'),
            hide_menu_btn       = $('#advanced_menu_hide'),
            mobile_advanced     = mobile_advanced12,
            //menu.clone().attr({id:"mobile-advanced", "class":""}),
            sub_hidden          = $html.is('.html_header_mobile_behavior'),
            insert_menu         = function()
            {   
                if(first_level_items == 0) 
                {
                    show_menu_btn.remove();
                }
                else
                {
                    var after_menu = $('#header .logo');
                    if(after_menu.length == 0) after_menu = "#main .logo:eq(0)";
                    show_menu_btn.insertAfter(after_menu);
                    mobile_advanced.find('.noMobile').remove();
                    mobile_advanced.prependTo(container);
                    hide_menu_btn.prependTo(container);
                }
            },
            set_height = function()
            {
                var height = mobile_advanced.outerHeight(true), win_h  = win.height();
                
                if(height < win_h) height = win_h;
                container.css({'height':height});
                
                mobile_advanced.css({position:'absolute', 'min-height':win_h});
            },
            hide_menu = function()
            {   
                container.removeClass('show_mobile_menu');
                setTimeout(function(){ 
                    container.css({'height':"auto", 'overflow':'hidden', 'minHeight':0}); 
                    mobile_advanced.css({display:'none'});
                },600);
                return false;
            },
            autohide = function()
            {
                if(container.is('.show_mobile_menu') && hide_menu_btn.css('display') == 'none'){ hide_menu(); }
            },
            show_menu = function()
            {
                if(container.is('.show_mobile_menu'))
                {
                    hide_menu();
                }
                else
                {
                    win.scrollTop(0);
                    mobile_advanced.css({display:'block'});
                    setTimeout(function(){container.addClass('show_mobile_menu'); },10);
                    set_height();
                }
                return false;
            };
        
        $html.on('click', '#mobile-advanced li a, #mobile-advanced .mega_menu_title', function()
        {
            var current = $(this);
            
            //if submenu items are hidden do the toggle
            if(sub_hidden)
            {
                var list_item = current.siblings('ul, .avia_mega_div');
                if ( current.siblings('ul').children('.avia_mega_text_block').length && current.siblings('ul').children('li').length == 1 ) { list_item = ''; }
                if(list_item.length)
                {
                    if(list_item.hasClass('visible_sublist'))
                    {
                        list_item.removeClass('visible_sublist');
                    }
                    else
                    {
                        list_item.addClass('visible_sublist');
                    }
                    set_height();
                    return false;
                }
            }
            
            //when clicked on anchor link remove the menu so the body can scroll to the anchor
            // if(current.filter('[href*="#"]').length)
            // {
            //     container.removeClass('show_mobile_menu');
            //     container.css({'height':"auto"});
            // }
            
        });
        

        show_menu_btn.click(show_menu);
        hide_menu_btn.click(hide_menu);
        win.on( 'debouncedresize',  autohide );
        insert_menu();
    }


})( jQuery );