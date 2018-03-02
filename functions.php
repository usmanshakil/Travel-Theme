<?php
/**
* Functions Page
* @Bed & Breakfast One Page
* @Bed & Breakfast One Page 1.0
**/
?>
<?php
// Load all scripts and stylesheets
function bbreakfast_load_styles() {
    wp_enqueue_style( 'base' , get_template_directory_uri()."/css/base.css");
    wp_enqueue_style( 'style' , get_template_directory_uri()."/style.css");
    wp_enqueue_style( 'skeleton' , get_template_directory_uri()."/css/skeleton.css");
    wp_enqueue_style( 'layout' , get_template_directory_uri()."/css/layout.css");
    wp_enqueue_style( 'backgound-images' , get_template_directory_uri()."/css/backgound-images.css");
    wp_enqueue_style( 'supersized' , get_template_directory_uri()."/css/supersized.css");
    wp_enqueue_style( 'supersized.shutter' , get_template_directory_uri()."/css/supersized.shutter.css");
    wp_enqueue_style( 'socialize-bookmarks' , get_template_directory_uri()."/css/socialize-bookmarks.css");
    wp_enqueue_style( 'flexslider' , get_template_directory_uri()."/css/flexslider.css");
    wp_enqueue_style( 'touchTouch' , get_template_directory_uri()."/css/touchTouch.css");
    wp_enqueue_style( 'datepicker' , get_template_directory_uri()."/css/datepicker.css");
    wp_enqueue_style( 'weather' , get_template_directory_uri()."/css/weather.css");
    wp_enqueue_style( 'custom' , get_template_directory_uri()."/css/custom.css");
	wp_enqueue_style( 'font-awesome' , get_template_directory_uri()."/font-awesome/css/font-awesome.css");
    }
    add_action('wp_enqueue_scripts', 'bbreakfast_load_styles');
function bbreakfast_load_scripts_footer() {
    if(!is_home()){
	global $post;	
    wp_enqueue_script( 'prefixfree.min', get_template_directory_uri().'/js/prefixfree.min.js', array('jquery'), '', true  );
    wp_enqueue_script( 'modernizr.custom.17475', get_template_directory_uri().'/js/modernizr.custom.17475.js', array('jquery'), '', true   );
	wp_enqueue_script( 'jquery.easing.min', get_template_directory_uri().'/js/jquery.easing.min.js', array('jquery'), '', true   );
    wp_enqueue_script( 'supersized.3.2.7.min', get_template_directory_uri().'/js/supersized.3.2.7.min.js', array('jquery'), '', true   );
    wp_enqueue_script( 'supersized.shutter.min', get_template_directory_uri().'/js/supersized.shutter.min.js', array('jquery'), '', true   );
    wp_enqueue_script( 'tooltip', get_template_directory_uri().'/js/tooltip.js', array('jquery'), '', true   );
    wp_enqueue_script('tabs', get_template_directory_uri() . '/js/tabs.js', array('jquery'), '', true  );
	wp_enqueue_script('touchTouch.jquery', get_template_directory_uri() . '/js/touchTouch.jquery.js', array('jquery'), '', true  );
    wp_enqueue_script('jquery.ui.core', get_template_directory_uri() . '/js/jquery.ui.core.js', array('jquery'), '', true  );
    wp_enqueue_script('jquery.ui.widget', get_template_directory_uri() . '/js/jquery.ui.widget.js', array('jquery'), '', true  );
	wp_enqueue_script('jquery.nav', get_template_directory_uri() . '/js/jquery.nav.js', array('jquery'), '', true  );
    wp_enqueue_script('gmap3key ', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBQx7lyNWEA5CUMaBtiyKQfQTRirZxGRDE&callback=initMap', array('jquery'), '', true );
	wp_enqueue_script('gmap3.min', get_template_directory_uri() . '/js/gmap3.min.js', array('jquery'), '', true  );
	wp_enqueue_script('custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), '', true  );
	wp_enqueue_script('functions', get_template_directory_uri() . '/js/functions.js', array('jquery'), '', true  );
    }
}
// Load scripts in footer
    add_action('wp_enqueue_scripts', 'bbreakfast_load_scripts_footer');
//Load Text Domains
    define('TEXTDOMAIN', 'bedbreakfast');
// Variable
    define('THEME_DIR', get_template_directory());
// Add custom backgroud support
    add_theme_support( 'custom-background' );
// Add custom backgroud support
    add_theme_support( 'custom-header');
// Add Thumbnail Support
if ( function_exists( 'add_theme_support' ) ) { 
    add_theme_support( 'post-thumbnails' );
}
//include Theme Options
    require_once('admin/index.php');
// Registering Menus
function bbreakfast_register_menu() {
	register_nav_menus(
    array('primary-menu' => __( 'Primary Menu',TEXTDOMAIN ))
  	 );
}
    add_action( 'init', 'bbreakfast_register_menu' );
// Changing excerpt 'more' text
function new_excerpt_more($more) {
    global $post;
}
    add_filter('excerpt_more', 'new_excerpt_more');
// Controling excerpt length
function custom_excerpt_length( $length ) {
    return 25;
}
    add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
/**************************************************
	Content Width
**************************************************/
if ( !isset( $content_width ) ) $content_width = 1000;
/**************************************************
	Text Domain
**************************************************/
load_theme_textdomain( TEXTDOMAIN, THEME_DIR . '/languages' );
// Adds RSS feed links to <head> for posts and comments.
    add_theme_support( 'automatic-feed-links' );
/*
 * Switches default core markup for search form, comment form,
 * and comments to output valid HTML5.
 */
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );
// Registering sidebars
register_sidebar(array(
    'name' => __( 'Default Sidebar',TEXTDOMAIN ),
    'id' => 'default',
    'description' => __( 'Widgets in this area will be shown at sidebar of the single Page.',TEXTDOMAIN ),
    'before_title' => '<h4>',
    'after_title' => '</h4>',
	'after_widget' => '<hr>'
));
//Plugin Activation Class
require_once('lib/plugin-activation.php');
    add_action( 'tgmpa_register', 'bbreakfast_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 * TGM_Plugin_Activation class constructor.
 */
function bbreakfast_register_required_plugins() {
    /**
     * Array of plugin arrays. Required keys are name, slug and required.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
        // This is an example of how to include a plugin pre-packaged with a theme
        array(
            'name'                  => 'Bed and Breakfast Short Codes', // The plugin name
            'slug'                  => 'bbshortcodes', // The plugin slug (typically the folder name)
            'source'                => get_stylesheet_directory() . '/lib/plugins/bbshortcodes.zip', // The plugin source
            'required'              => true, // If false, the plugin is only 'recommended' instead of required
            'version'               => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'          => '', // If set, overrides default API URL and points to an external URL
        ),
		array(
            'name'                  => 'Bed and Breakfast Availability', // The plugin name
            'slug'                  => 'calender', // The plugin slug (typically the folder name)
            'source'                => get_stylesheet_directory() . '/lib/plugins/calender.zip', // The plugin source
            'required'              => true, // If false, the plugin is only 'recommended' instead of required
            'version'               => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'          => '', // If set, overrides default API URL and points to an external URL
        ),
		array(
            'name'                  => 'Bed and Breakfast Gallery', // The plugin name
            'slug'                  => 'gallery', // The plugin slug (typically the folder name)
            'source'                => get_stylesheet_directory() . '/lib/plugins/gallery.zip', // The plugin source
            'required'              => true, // If false, the plugin is only 'recommended' instead of required
            'version'               => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'          => '', // If set, overrides default API URL and points to an external URL
        ),
		array(
            'name'                  => 'Bed and Breakfast Places', // The plugin name
            'slug'                  => 'places', // The plugin slug (typically the folder name)
            'source'                => get_stylesheet_directory() . '/lib/plugins/places.zip', // The plugin source
            'required'              => true, // If false, the plugin is only 'recommended' instead of required
            'version'               => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'          => '', // If set, overrides default API URL and points to an external URL
        ),
		array(
            'name'                  => 'Bed and Breakfast Rooms', // The plugin name
            'slug'                  => 'rooms', // The plugin slug (typically the folder name)
            'source'                => get_stylesheet_directory() . '/lib/plugins/rooms.zip', // The plugin source
            'required'              => true, // If false, the plugin is only 'recommended' instead of required
            'version'               => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'          => '', // If set, overrides default API URL and points to an external URL
        ),
		array(
            'name'                  => 'Bed and Breakfast Sections', // The plugin name
            'slug'                  => 'sections', // The plugin slug (typically the folder name)
            'source'                => get_stylesheet_directory() . '/lib/plugins/sections.zip', // The plugin source
            'required'              => true, // If false, the plugin is only 'recommended' instead of required
            'version'               => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'          => '', // If set, overrides default API URL and points to an external URL
        ),
		array(
            'name'                  => 'Bed and Breakfast Testimonials', // The plugin name
            'slug'                  => 'bbtestimonials', // The plugin slug (typically the folder name)
            'source'                => get_stylesheet_directory() . '/lib/plugins/bbtestimonials.zip', // The plugin source
            'required'              => true, // If false, the plugin is only 'recommended' instead of required
            'version'               => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'          => '', // If set, overrides default API URL and points to an external URL
        ),
    );
    // Change this to your theme text domain, used for internationalising strings
    $theme_text_domain = 'tgmpa';
    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'domain'            => $theme_text_domain,           // Text domain - likely want to be the same as your theme.
        'default_path'      => '',                           // Default absolute path to pre-packaged plugins
        'parent_menu_slug'  => 'themes.php',         // Default parent menu slug
        'parent_url_slug'   => 'themes.php',         // Default parent URL slug
        'menu'              => 'install-required-plugins',   // Menu slug
        'has_notices'       => true,                         // Show admin notices or not
        'is_automatic'      => false,            // Automatically activate plugins after installation or not
        'message'           => '',               // Message to output right before the plugins table
        'strings'           => array(
            'page_title'                                => __( 'Install Required Plugins', $theme_text_domain ),
            'menu_title'                                => __( 'Install Plugins', $theme_text_domain ),
            'installing'                                => __( 'Installing Plugin: %s', $theme_text_domain ), // %1$s = plugin name
            'oops'                                      => __( 'Something went wrong with the plugin API.', $theme_text_domain ),
            'notice_can_install_required'               => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
            'notice_can_install_recommended'            => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
            'notice_cannot_install'                     => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
            'notice_can_activate_required'              => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
            'notice_can_activate_recommended'           => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
            'notice_cannot_activate'                    => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
            'notice_ask_to_update'                      => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
            'notice_cannot_update'                      => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
            'install_link'                              => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
            'activate_link'                             => _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
            'return'                                    => __( 'Return to Required Plugins Installer', $theme_text_domain ),
            'plugin_activated'                          => __( 'Plugin activated successfully.', $theme_text_domain ),
            'complete'                                  => __( 'All plugins installed and activated successfully. %s', $theme_text_domain ) // %1$s = dashboard link
        )
    );
    tgmpa( $plugins, $config );
}
//Pagination
function bbreakfast_pagination($pages = '', $range = 2){
    $showitems = ($range * 2)+1;
    global $paged;
    if(empty($paged)) $paged = 1;
    if($pages == '')    {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if(!$pages){
            $pages = 1; }
    }
    if(1 != $pages){
        echo "<div class='pagination'>";
        if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
        if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";
        for ($i=1; $i <= $pages; $i++)
        {
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
            {
                echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
            }
        }
        if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";
        if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
        echo "</div>\n";
    }
}
//Theme options Default value saved
function save_smof_options(){
    global $of_options, $options_machine, $smof_data, $smof_details;
    if( !defined('ADMIN_PATH') )
        define( 'ADMIN_PATH', get_template_directory() . '/admin/' );
    if( !defined('ADMIN_DIR') )
        define( 'ADMIN_DIR', get_template_directory_uri() . '/admin/' );
    require_once ( ADMIN_PATH . 'functions/functions.load.php' );
    require_once ( ADMIN_PATH . 'classes/class.options_machine.php' );
    $options_machine = new Options_Machine($of_options);
    $defaults = $options_machine->Defaults;
    return $defaults;
}
//Turn the display status of the Toolbar to off
add_filter( 'show_admin_bar', '__return_false' );
//Language Switcher

function languages_list_menu(){
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    if ( is_plugin_active( 'sitepress-multilingual-cms/sitepress.php' ) ) {
    $languages = icl_get_languages('skip_missing=0&orderby=code');
    if(!empty($languages)){
        echo '<ul>';
        foreach($languages as $l){
            echo '<li>';
            if($l['country_flag_url']){
                if(!$l['active']) echo '<a href="'.$l['url'].'">';
                echo '<img src="'.$l['country_flag_url'].'" height="12" alt="'.$l['language_code'].'" width="18" />';
                if(!$l['active']) echo '</a>';
            }
            echo '</li>';
        }
        echo '</ul>';
    }
}
}
