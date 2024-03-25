<?php
define('CORE_PATH', get_stylesheet_directory() . '/core');
define('CORE_URL', get_stylesheet_directory_uri()  . '/core');

define( 'CORE_PLUGINS_PATH', CORE_PATH . '/plugins/' );
define( 'CORE_PLUGINS_URL', CORE_URL . '/plugins/' );

$dirs = array(
    CORE_PATH . '/post_types/',
    CORE_PATH . '/functions/',
);
foreach ($dirs as $dir) {
    $other_inits = array();
    if (is_dir($dir)) {
        if ($dh = opendir($dir)) {
            while (false !== ($file = readdir($dh))) {
                if ($file != '.' && $file != '..' && stristr($file, '.php') !== false) {
                    list($nam, $ext) = explode('.', $file);
                    if ($ext == 'php')
                        $other_inits[] = $file;
                }
            }
            closedir($dh);
        }
    }
    asort($other_inits);
    foreach ($other_inits as $other_init) {
        if (file_exists($dir . $other_init))
            include_once $dir . $other_init;
    }
}

//plugins
require_once CORE_PLUGINS_PATH. 'init.php';
//lib
require_once CORE_PATH.'/lib/BFI_Thumb.php';

add_filter('avia_load_shortcodes', 'avia_include_shortcode_template', 15, 1);
function avia_include_shortcode_template($paths) {
	array_unshift($paths, CORE_PATH.'/shortcodes/');
	return $paths;
}




// Retirar compressão WP das novas fotos a carregar
add_filter('jpeg_quality', function($arg){return 100;});

// Desligar query de versão WP

function _remove_script_version( $src ){
$parts = explode( '?ver', $src );
return $parts[0];
}
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );


// REMOVE WP EMOJI
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );




//
// ENFOLD
//
// Activar Custom CSS
add_theme_support('avia_template_builder_custom_css');

// Inactivar Layerslider
add_theme_support('deactivate_layerslider');

// Inactivar Portfolio
add_action('after_setup_theme', 'remove_portfolio');
function remove_portfolio() {
remove_action('init', 'portfolio_register');
}

// Define email de envio default
function change_cf_from() {
    return "info@ipopi.org";
}
add_filter('avf_form_from', 'change_cf_from', 10);

// Change mobile menu icon
add_filter('avf_default_icons','avia_replace_standard_icon', 10, 1);
function avia_replace_standard_icon($icons)
{
$icons['mobile_menu']	 = array( 'font' =>'entypo-fontello', 'icon' => 'ue811');
return $icons;
}

add_action('wp_footer', 'add_custom_css');
function add_custom_css() {
    global $current_user;
    ?>
    <script>
        jQuery(window).load(function() {
             //console.log("window load occurred!");
                var isRunning_ = false;
                var interval_start = setInterval(function() {
                    if(!isRunning_) {
                         $( ".bell" ).addClass('start');
                        isRunning_ = true;
                        //console.log("load 500");
                    }
                }, 5000);
                
            var isRunning = true;
            var x = 600;
            var interval = setInterval(function() {
                if (!isRunning) {
                    $( ".bell" ).removeClass('run');
                    //x = x-0.0003;
                    isRunning = true;
                } else {
                    //$( ".bell" ).addClass('run');
                    //isRunning = false;
                    //x = x+0.0003;
                }
            }, x);
   
            var interval = setInterval(function() {
                if (!isRunning) {
                    //$( ".bell" ).removeClass('run');
                    //x = x-0.0003;
                    //isRunning = true;
                } else {
                    $( ".bell" ).addClass('run');
                    isRunning = false;
                    //console.log('run');
                    //x = x+0.0003;
                }
            }, 15000); 
            
            
        });
        
        jQuery(document).ready(function($) {
            
            $(".av-inner-masonry-content-pos-content-bg").each(function(index, el) {

                var elem = $(el).siblings(".av-inner-masonry-content-pos-content").find('.ipopi_homepage-masonry-entry-title').height();
                //console.log(elem);
                if ( elem === 138){
    
                    $(el).addClass('trans');

                }
    
            });

            


        });
    </script>
    <style>



        .av-inner-masonry-content-pos:hover .av-inner-masonry-content-pos-content-bg.trans {
            background-color: white;
            max-height: 275px;
            height: 275px;
        }

        #mobile-advanced #menu-dot {
            display: none;
        }
        #mobile-advanced .av-burger-menu-main {
            display: none;
        }
        #mobile-advanced .second_menu_element {

        }
        #mobile-advanced .second_menu_element a {
            color: #808080;
            font-weight: 600;
            font-size: 110%;            
        }        
        #mobile-advanced .second_menu_element ul {
            
        }
        #mobile-advanced .second_menu_element ul li {
            
        }
        #mobile-advanced .second_menu_element ul li a {
            color: white;            
        }

        #mobile-advanced .second_menu_element ul li a span {
            display: inline-block;
            border-bottom: 1px solid white;
            padding: 0 10px 13px 10px;     
        }
    .bell {
width: 60px;
height: 59px;
background: url('https://ipopi.org/wp-content/uploads/2018/02/ipopi-newsletter-alert.png') left center;
/* animation: play 0.6s steps(19); */
animation: none;
}
    .start {
        animation: play 0.6s steps(19);
        }
    .run {
        animation: play 0.6s steps(19) infinite;
        }
    .pause {
        -webkit-animation-play-state: paused !important; 
        -moz-animation-play-state: paused !important; 
        -o-animation-play-state: paused !important;
        animation-play-state: paused !important;
   } 
    
    #top .ipopimainmenu_sub.sub_menu li ul li ul.sub-menu {
        left: 169px;
        top: 0px;
    }
    #top .av-main-nav ul ul {
        left: 207px;
    }
        #top input[type="text"]#stripeAmount_0 {
            display: inline-block;
            margin-right: 5px;
        }
        <?php if (is_user_logged_in()){ ?> 
            #mobile-advanced.mobile-advanced1 {
                    margin-top: 45px;
            }
            #mobile-advanced.mobile-advanced2 {
                    margin-top: 45px;
            }
        <?php } ?>
    </style>
    <?php
}