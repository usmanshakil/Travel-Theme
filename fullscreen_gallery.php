<?php
/*
Template Name: Fullscreen Gallery
*/
?>
<!DOCTYPE html>
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>
<?php global $smof_data; ?>
<!-- Basic Page Needs -->
<meta charset="utf-8">
<title><?php wp_title(); ?></title>
<meta name="description" content="<?php bloginfo('description'); ?>">
<meta name="author" content="">
<!-- Mobile Specific Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!-- CSS -->
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/skeleton.css"/>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/base.css"/>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/layout.css"/>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/supersized.css"/>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/supersized.shutter.css"/>
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!-- Favicons-->
    <link rel="shortcut icon" href="<?php if(!empty($smof_data['favicon'])) { echo $smof_data['favicon']; }?>">
    <link rel="apple-touch-icon" href="<?php if(!empty($smof_data['apple1'])) { echo $smof_data['apple1']; }?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php if(!empty($smof_data['apple2'])) { echo $smof_data['apple2']; }?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php if(!empty($smof_data['apple3'])) { echo $smof_data['apple3']; }?>">
<!-- Jquery -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
</head>
<body>
<a href="<?php echo home_url(); ?>" id="close"></a>
<!--Arrow Navigation-->
<a id="prevslide" class="load-item"></a>
<a id="nextslide" class="load-item"></a>
<div id="slidecaption" ></div>
<!--Start gallery menu  -->  
<div id="gallery-menu" class="reveal-modal">
<a class="close-reveal-modal">&#215;</a>
	<ul id="galleries">
        <li><figure><img src="<?php echo get_template_directory_uri(); ?>/images/patio.jpg" alt=""></figure><h6>Gallery 1</h6>Short descritpion</li>
     </ul>
</div><!--End gallery menu  -->  
<!-- JS -->
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.reveal.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.easing.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/supersized.3.2.7.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/supersized.shutter.min.js"></script>
<script>
jQuery(function($){
$.supersized({
slides :  	[			// Slideshow Images
    <?php
        $galleries = array( 'post_type' => 'galleries', );
        $galleries_loop = new WP_Query($galleries);
        while ( $galleries_loop->have_posts() ) : $galleries_loop->the_post();
        $feat_image = wp_get_attachment_url( get_post_thumbnail_id() );
        $gallerycaption = esc_html( get_post_meta( get_the_ID(), 'gallerycaption', true ) );
    ?>
{image : '<?php echo $feat_image; ?>', title : '<?php echo $gallerycaption; ?>'},
 <?php endwhile;   ?>
 // Last has no comma
]				
});
});
</script>
</body>
</html>