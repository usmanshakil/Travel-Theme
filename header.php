<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
    <?php
    save_smof_options();
    global $smof_data; ?>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <title>
		<?php
		//Print the <title> tag based on what is being viewed.
		global $page, $paged;
		wp_title( '|', true, 'right' );
		// Add the blog name.
		bloginfo( 'name' );
		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";
		// Add a page number if necessary:
		if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'bedbreakfast' ), max( $paged, $page ) );
		?></title>
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <meta name="author" content="">
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	 <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!-- Favicons-->
    <link rel="shortcut icon" href="<?php if(!empty($smof_data['favicon'])) { echo $smof_data['favicon']; }?>">
    <link rel="apple-touch-icon" href="<?php if(!empty($smof_data['apple1'])) { echo $smof_data['apple1']; }?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php if(!empty($smof_data['apple2'])) { echo $smof_data['apple2']; }?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php if(!empty($smof_data['apple3'])) { echo $smof_data['apple3']; }?>">
    <?php if(!empty($smof_data['g_analytics'])) { echo $smof_data['g_analytics'];} ?>
    <script>
        <?php
        if($smof_data['slider_on_off'] == '1') {
        $slides = $smof_data['home_slider']; //get the slides array
        if(!empty($smof_data['home_slider'])) {
            $count = count($slides);
            $slide_urll = '';
            $i = 0;
            foreach($slides as $slide) {
                if(++$i === $count) {
                    $slide_url = $slide['url'];
                    $slide_urll .= $slide_url;
                }
                else {
                    $slide_url = $slide['url'].'+++';
                    $slide_urll .= $slide_url;
                }
            }
                }
                else {
                    $bg = get_template_directory_uri();
                    $slide_urll = $bg.'/images/slider/1.jpg';
                }
            }
            else {
                if(empty($smof_data['home_image'])){
                    $bg = get_template_directory_uri();
                    $slide_urll = $bg.'/images/slider/1.jpg';
                } else {
                   $slide_urll =  $smof_data['home_image'];
                }
            }?>
        var mystr = '<?php echo $slide_urll; ?>';
        <?php if(!is_home()) { ?>
        var transition = <?php if(!empty($smof_data['home_slider_transition'])) { echo $smof_data['home_slider_transition']; } else { echo 'fade';} ?>;
        <?php } ?>
        var theme_url = '<?php echo get_template_directory_uri(); ?>';
        var latlon = <?php if(empty($smof_data['lat_lon'])) { echo '[28.105005, -15.417058]'; } else { echo '['.$smof_data['lat_lon'].']';} ?>;
        var map_pointer = <?php if(empty($smof_data['map_pointer'])) { echo '"'.get_template_directory_uri().'/images/gmap_marker.png'; } else { echo '"'.$smof_data['map_pointer'].'"';} ?>;
        var weather = '<?php if(empty($smof_data['bb_weather'])) { echo 'SPXX0047'; } else { echo $smof_data['bb_weather'];} ?>';
    </script>
    <style type="text/css">
    <?php get_template_part( 'bb', 'style' ); ?>
    </style>
    <?php wp_head();?>
</head>
<body <?php body_class(); ?>>
<?php if ( !is_page_template('page-home.php') ) {?>
<section>
	<header <?php if(!empty($smof_data['header_background'])){ ?> style="background: <?php echo $smof_data['header_background']; ?>" <?php } ?>>
 		<div class="container">
                <div class="four columns">
                    <?php $logo = $smof_data['logo']; ?>
                    <a href="<?php echo home_url(); ?>" class="scroll_home"><img src="<?php if(!empty($logo)){ echo $logo; } else { echo get_template_directory_uri();?>/images/logo-2.png <?php } ?>" width="140" height="26" alt="Logo" class="scale-with-grid" id="logo-in"></a><!-- Your logo -->
                </div>

                <select onchange='document.location.href=this.options[this.selectedIndex].value;' id="top-menu" class="navi">
                    <option value="/"><?php _e('Select Page',TEXTDOMAIN); ?></option>
                    <?php  $menu_name = 'primary-menu';
                    if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
                        $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
                        $menu_items = wp_get_nav_menu_items($menu->term_id);
                        foreach ( (array) $menu_items as $key => $menu_item ) {
                            $title = $menu_item->title;
                            $url = $menu_item->url;
                            echo '<option value="'. $url . '">' . $title . '</option>';
                        }

                    } else {
                        _e('Menu Not Defined..!!',TEXTDOMAIN);
                    }
                    ?>
                </select>
                <nav class="twelve columns omega" id="top-menu">
                    <div class="lang ind">
                        <?php languages_list_menu(); ?>
                    </div>
                    <!-- Start Nav Links -->
                    <ul>
                        <?php wp_nav_menu( array( 'theme_location' => 'primary-menu','container' => '','items_wrap' => '%3$s' ) ); ?>
                    </ul><!-- End Nav Links -->
                </nav><!-- End Navigation -->

            </div>
	</header>
</section>
<?php } ?>