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
        jQuery(document).ready(function($) {

        });
    </script>
    <style>
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