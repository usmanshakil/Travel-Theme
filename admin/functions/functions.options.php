<?php
add_action('init','of_options');
if (!function_exists('of_options'))
{
	function of_options()
	{
		//Access the WordPress Categories via an Array
		$of_categories 		= array();  
		$of_categories_obj 	= get_categories('hide_empty=0');
		foreach ($of_categories_obj as $of_cat) {
		    $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
		$categories_tmp 	= array_unshift($of_categories, "Select a category:");    
	       
		//Access the WordPress Pages via an Array
		$of_pages 			= array();
		$of_pages_obj 		= get_pages('sort_column=post_parent,menu_order');    
		foreach ($of_pages_obj as $of_page) {
		    $of_pages[$of_page->ID] = $of_page->post_name; }
		$of_pages_tmp 		= array_unshift($of_pages, "Select a page:");       
	
		//Testing 
		$of_options_select 	= array("one","two","three","four","five"); 
		$of_options_radio 	= array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five");
		
		//Sample Homepage blocks for the layout manager (sorter)
		$of_options_homepage_blocks = array
		( 
			"disabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_one"		=> "Block One",
				"block_two"		=> "Block Two",
				"block_three"	=> "Block Three",
			), 
			"enabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_four"	=> "Block Four",
			),
		);
		//Stylesheets Reader
		$alt_stylesheet_path = LAYOUT_PATH;
		$alt_stylesheets = array();
		
		if ( is_dir($alt_stylesheet_path) ) 
		{
		    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) 
		    { 
		        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) 
		        {
		            if(stristr($alt_stylesheet_file, ".css") !== false)
		            {
		                $alt_stylesheets[] = $alt_stylesheet_file;
		            }
		        }    
		    }
		}
		//Background Images Reader
		$bg_images_path = get_stylesheet_directory(). '/images/bg/'; // change this to where you store your bg images
		$bg_images_url = get_template_directory_uri().'/images/bg/'; // change this to where you store your bg images
		$bg_images = array();
		
		if ( is_dir($bg_images_path) ) {
		    if ($bg_images_dir = opendir($bg_images_path) ) { 
		        while ( ($bg_images_file = readdir($bg_images_dir)) !== false ) {
		            if(stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
		            	natsort($bg_images); //Sorts the array into a natural order
		                $bg_images[] = $bg_images_url . $bg_images_file;
		            }
		        }    
		    }
		}
		
		/*-----------------------------------------------------------------------------------*/
		/* TO DO: Add options/functions that use these */
		/*-----------------------------------------------------------------------------------*/
		
		//More Options
		$uploads_arr 		= wp_upload_dir();
		$all_uploads_path 	= $uploads_arr['path'];
		$all_uploads 		= get_option('of_uploads');
		$other_entries 		= array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
		$body_repeat 		= array("no-repeat","repeat-x","repeat-y","repeat");
		$body_pos 			= array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");
		
		// Image Alignment radio box
		$of_options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 
		
		// Image Links to Options
		$of_options_image_link_to = array("image" => "The Image","post" => "The Post"); 
/*-----------------------------------------------------------------------------------*/
/* The Options Array */
/*-----------------------------------------------------------------------------------*/
// Set the Options Array
global $of_options;
$of_options = array();
$of_options[] = array( 	"name" 		=> "Home Settings",
						"type" 		=> "heading"
				);
$of_options[] = array( 	"name" 		=> "Logo",
						"desc" 		=> "Upload Your Logo File <br/><small>Recomender Size e.g 140*25</small>",
						"id" 		=> "logo",
						// Use the shortcodes [site_url] or [site_url_secure] for setting default URLs
						"std" 		=> "",
						"type" 		=> "upload"
				);
$of_options[] = array( 	"name" 		=> "Favicon",
                        "desc" 		=> "Upload Your Favicon <br/><small>Recomender Size e.g 16*16</small>",
                        "id" 		=> "favicon",
                        // Use the shortcodes [site_url] or [site_url_secure] for setting default URLs
                        "std" 		=> "",
                        "type" 		=> "upload"
        );
$of_options[] = array( 	"name" 		=> "",
                        "desc" 		=> "Apple Touch Icon",
                        "id" 		=> "apple1",
                        // Use the shortcodes [site_url] or [site_url_secure] for setting default URLs
                        "std" 		=> "",
                        "type" 		=> "upload"
        );
$of_options[] = array( 	"name" 		=> "",
                        "desc" 		=> "Apple Touch Icon <br/><small>Recomender Size e.g 72*72</small>",
                        "id" 		=> "apple2",
                        // Use the shortcodes [site_url] or [site_url_secure] for setting default URLs
                        "std" 		=> "",
                        "type" 		=> "upload"
        );
$of_options[] = array( 	"name" 		=> "",
                        "desc" 		=> "Apple Touch Icon <br/><small>Recomender Size e.g 114*114</small>",
                        "id" 		=> "apple3",
                        // Use the shortcodes [site_url] or [site_url_secure] for setting default URLs
                        "std" 		=> "",
                        "type" 		=> "upload"
        );
$of_options[] = array( 	"name" 		=> "Home Page Links",
						"desc" 		=> "You can On/Off the home page links buttons",
						"id" 		=> "homelinksoption",
						"std" 		=> 1,
						"type" 		=> "switch"
				);
$of_options[] = array( 	"name" 		=> "",/* Home Page Button Left*/
                        "desc" 		=> "Put Your Left link Label",
                        "id" 		=> "left_button",
                        "std" 		=> "",
                        "type" 		=> "text"
        );
$of_options[] = array( 	"name" 		=> "",/* Home Page Button Left Link*/
                        "desc" 		=> "Put Your Left link prefix with #, e.g #about<br/><small>You can put some external Link also e.g
                                        http://somewhere.com</small>",
                        "id" 		=> "left_button_link",
                        "std" 		=> "",
                        "type" 		=> "text"
        );
$of_options[] = array( 	"name" 		=> "",/* Home Page Button Right*/
                        "desc" 		=> "Put Your Right link Label",
                        "id" 		=> "right_button",
                        "std" 		=> "",
                        "type" 		=> "text"
        );
$of_options[] = array( 	"name" 		=> "",/* Home Page Button Right Link*/
                        "desc" 		=> "Put Your Right link prefix with #, e.g #about<br/><small>You can put some external Link also e.g
                                                    http://somewhere.com</small>",
                        "id" 		=> "right_button_link",
                        "std" 		=> "",
                        "type" 		=> "text"
        );
$of_options[] = array( 	"name" 		=> "Slider Options",
						"desc" 		=> "Switch On/Off Slider",
						"id" 		=> "slider_on_off",
						"std" 		=> 0,
						"type" 		=> "switch"
				);
$of_options[] = array( 	"name" 		=> "",
                        "desc" 		=> "Unlimited slider Images with drag and drop sortings.",
                        "id" 		=> "home_slider",
                        "std" 		=> "",
                        "type" 		=> "slider"
        );
$of_options_radio = array("1" => "Fade","2" => "Slide Top","3" => "Slide Right","4" => "Slide Bottom","5" => "Slide");
$of_options[] = array( "name" => "",
                        "desc" => "Select your slider transitions type.",
                        "id" => "home_slider_transition",
                        "std" => "1",
                        "type" => "select",
                        "options" => $of_options_radio
        );
$of_options[] = array( 	"name" 		=> "",
                        "desc" 		=> "Upload Home Section Background Image<br/><small>Enabled when slider is switch off.</small>",
                        "id" 		=> "home_image",
                        "std" 		=> "",
                        "type" 		=> "upload"
        );
$of_options[] = array( 	"name" 		=> "Home Section Intro Heading",
                        "desc" 		=> "You can add text.",
                        "id" 		=> "intro-heading",
                        "std" 		=> "WELCOME GUESTS",
                        "type" 		=> "text"
                 );
$of_options[] = array( 	"name" 		=> "Home Section Intro Text",
                        "desc" 		=> "You can add text.",
                        "id" 		=> "intro-text",
                        "std" 		=> "Cosy Bed and Breakfast in PARIS where to stay",
                        "type" 		=> "text"
                 );
$of_options[] = array( 	"name" 		=> "Home Sponsors Logo 1",
                        "desc" 		=> "Place your logo 1",
                        "id" 		=> "intro-logo1",
                        "std" 		=> "",
                        "type" 		=> "upload"
                 );
$of_options[] = array( 	"name" 		=> "Home Sponsors Logo 2",
                        "desc" 		=> "Place your logo 2",
                        "id" 		=> "intro-logo2",
                        "std" 		=> "",
                        "type" 		=> "upload"
                 );
$of_options[] = array( 	"name" 		=> "Copyright",
                        "desc" 		=> "",
                        "id" 		=> "copy_right",
                        "std" 		=> "",
                        "type" 		=> "text"
                 );
$of_options[] = array( 	"name" 		=> "Styling Options",
						"type" 		=> "heading"
				);
$of_options[] = array( 	"name" 		=> "Theme Color",
                        "desc" 		=> "Pick a color for the theme (default: #51a4c4).",
                        "id" 		=> "theme_color",
                        "std" 		=> "",
                        "type" 		=> "color"
                    );
$of_options[] = array( 	"name" 		=> "Body Background Color",
						"desc" 		=> "Pick a background color for the theme (default: #fff).",
						"id" 		=> "body_background",
						"std" 		=> "",
						"type" 		=> "color"
				);
				
$of_options[] = array( 	"name" 		=> "Header Background Color",
						"desc" 		=> "Pick a background color for the header (default: #fff).",
						"id" 		=> "header_background",
						"std" 		=> "",
						"type" 		=> "color"
				);
				
$of_options[] = array( 	"name" 		=> "Home Section Links Colors",
						"desc" 		=> "Pick a active color for the links (default: #8dc63f).",
						"id" 		=> "home_links_active",
						"std" 		=> "",
						"type" 		=> "color"
				);
$of_options[] = array( 	"name" 		=> "",
                        "desc" 		=> "Pick a hover color for the links (default: #3CF).",
                        "id" 		=> "home_links_hover",
                        "std" 		=> "",
                        "type" 		=> "color"
        );
$of_options[] = array( 	"name" 		=> "General Button Colors",
                        "desc" 		=> "Pick a active color for the buttons (default: #8dc63f).",
                        "id" 		=> "button_active",
                        "std" 		=> "",
                        "type" 		=> "color"
        );
$of_options[] = array( 	"name" 		=> "",
                        "desc" 		=> "Pick a hover color for the buttons (default: #000).",
                        "id" 		=> "button_hover",
                        "std" 		=> "",
                        "type" 		=> "color"
        );
// Google map
$of_options[] = array( 	"name" 		=> "Google Map",
                         "type" 		=> "heading",
                         "icon" => ADMIN_IMAGES .'map.png'
                 );
$of_options[] = array( 	"name" 		=> "Change the map location",
                        "desc" 		=> "Use google map to find the proper latitude and longitude,<br/><small>e.g 28.105005, -15.417058</small>",
                        "id" 		=> "lat_lon",
                        "std" 		=> "",
                        "type" 		=> "text"
                );
$of_options[] = array( 	"name" 		=> "Change the map pointer",
                        "desc" 		=> "Use custom image for pointer. (48 x 48)",
                        "id" 		=> "map_pointer",
                        "std" 		=> "",
                        "type" 		=> "upload"
                );
$of_options[] = array( 	"name" 		=> "Change wheater location",
                        "desc" 		=> "Go to www.weather.com/, in the top bar insert you city<br/><small>(ex. UKXX0085 for LondonUK)</small>",
                        "id" 		=> "bb_weather",
                        "std" 		=> "",
                        "type" 		=> "text"
             );
$of_options[] = array( 	"name" 		=> "Google Analytics Code",
                        "desc" 		=> "Enter Google analytics code with opening & closing scripts tag.",
                        "id" 		=> "g_analytics",
                        "std" 		=> "",
                        "type" 		=> "textarea"
                    );
				
$of_options[] = array( 	"name" 		=> "Typography",
						"type" 		=> "heading",
                        "icon" => ADMIN_IMAGES .'typography.png'
				);
				
$of_options[] = array( 	"name" 		=> "Body",
						"desc" 		=> "This is a typographic Body option.",
						"id" 		=> "body_typ",
						"std" 		=> array(
											'size'  => '13px',
											'face'  => 'Lato',
											'style' => 'normal',
											'color' => '#464646'
										),
						"type" 		=> "typography"
				);
$of_options[] = array( 	"name" 		=> "Menu",
                        "desc" 		=> "This is a typographic Active menu.",
                        "id" 		=> "act_menu_typ",
                        "std" 		=> array(
                            'size'  => '14px',
                            'face'  => 'Lato',
                            'style' => 'bold',
                            'color' => '#505050'
                        ),
                        "type" 		=> "typography"
        );
$of_options[] = array( 	"name" 		=> "",
                        "desc" 		=> "This is a typographic Hover menu.",
                        "id" 		=> "hover_menu_typ",
                        "std" 		=> array(
                            'size'  => '14px',
                            'face'  => 'Lato',
                            'style' => 'bold',
                            'color' => '#39bad2'
                        ),
                        "type" 		=> "typography"
        );
$of_options[] = array( 	"name" 		=> "Intro Text",
                        "desc" 		=> "This is a typographic Heading One.",
                        "id" 		=> "intro_h1",
                        "std" 		=> array(
                            'size'  => '60px',
                            'face'  => 'Lato',
                            'style' => 'bold',
                            'color' => '#fff'
                        ),
                        "type" 		=> "typography"
        );
$of_options[] = array( 	"name" 		=> "",
                        "desc" 		=> "This is a typographic Heading Two.",
                        "id" 		=> "intro_h2",
                        "std" 		=> array(
                            'size'  => '42px',
                            'face'  => "'Yellowtail', cursive",
                            'style' => 'normal',
                            'color' => '#fff'
                        ),
                        "type" 		=> "typography"
        );
$of_options[] = array( 	"name" 		=> "Headings",
                        "desc" 		=> "This is a typographic h1.",
                        "id" 		=> "h1",
                        "std" 		=> array(
                            'size'  => '60px',
                            'face'  => 'Lato',
                            'style' => 'bold',
                            'color' => '#fff'
                        ),
                        "type" 		=> "typography"
        );
$of_options[] = array( 	"name" 		=> "",
                        "desc" 		=> "This is a typographic h2.",
                        "id" 		=> "h2",
                        "std" 		=> array(
                            'size'  => '42px',
                            'face'  => 'Lato',
                            'style' => 'bold',
                            'color' => '#fff'
                        ),
                        "type" 		=> "typography"
        );
$of_options[] = array( 	"name" 		=> "",
                        "desc" 		=> "This is a typographic h3.",
                        "id" 		=> "h3",
                        "std" 		=> array(
                            'size'  => '22px',
                            'face'  => 'Lato',
                            'style' => 'bold',
                            'color' => '#464646'
                        ),
                        "type" 		=> "typography"
        );
$of_options[] = array( 	"name" 		=> "",
                        "desc" 		=> "This is a typographic h4.",
                        "id" 		=> "h4",
                        "std" 		=> array(
                            'size'  => '14px',
                            'face'  => 'Lato',
                            'style' => 'bold',
                            'color' => '#999'
                        ),
                        "type" 		=> "typography"
        );
$of_options[] = array( 	"name" 		=> "Section Title",
                        "desc" 		=> "This is a typographic upper heading.",
                        "id" 		=> "st1",
                        "std" 		=> array(
                            'size'  => '42px',
                            'face'  => 'Lato',
                            'style' => 'bold',
                            'color' => '#fff'
                        ),
                        "type" 		=> "typography"
        );
$of_options[] = array( 	"name" 		=> "",
                        "desc" 		=> "This is a typographic title description.",
                        "id" 		=> "st2",
                        "std" 		=> array(
                            'size'  => '30px',
                            'face'  => "'Yellowtail', cursive",
                            'style' => 'nomal',
                            'color' => '#cbf1ff'
                        ),
                        "type" 		=> "typography"
        );
// Backup Options
$of_options[] = array( 	"name" 		=> "Backup Options",
						"type" 		=> "heading",
						"icon"		=> ADMIN_IMAGES . "icon-slider.png"
				);
				
$of_options[] = array( 	"name" 		=> "Backup and Restore Options",
						"id" 		=> "of_backup",
						"std" 		=> "",
						"type" 		=> "backup",
						"desc" 		=> 'You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.',
				);
				
$of_options[] = array( 	"name" 		=> "Transfer Theme Options Data",
						"id" 		=> "of_transfer",
						"std" 		=> "",
						"type" 		=> "transfer",
						"desc" 		=> 'You can tranfer the saved options data between different installs by copying the text inside the text box. To import data from another install, replace the data in the text box with the one from another install and click "Import Options".',
				);
				
	}//End function: of_options()
}//End chack if function exists: of_options()
?>
