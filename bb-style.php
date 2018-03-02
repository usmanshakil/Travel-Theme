<?php
/**
* Theme Option Typography
* @Bed & Breakfast One Page
* @Bed & Breakfast One Page 1.0
**/
?>
<?php global $smof_data; ?>
<style type="text/css">
header {
    background:<?php if(!empty($smof_data['header_background'])) { echo $smof_data['header_background']; } else { echo 'url("'.get_template_directory_uri().'"/images/top-bg.png") repeat-x left bottom'; }?> !important;
}
.section-title-2 {
    background:<?php if(!empty($smof_data['theme_color'])) { echo $smof_data['theme_color']; } else { echo '#51a4c4 url("'.get_template_directory_uri().'"/images/bg-2.jpg") repeat-x center bottom'; }?> !important;
}
.item h3,.rooms-clearfix .omega h3,#activities h3,.add-bottom_2 a{
    color:<?php if(!empty($smof_data['theme_color'])) { echo $smof_data['theme_color']; } else { echo '#51a4c4'; }?> !important;
}
.accordion dt a:hover, .accordion dt.active a {
    background-color:<?php if(!empty($smof_data['theme_color'])) { echo $smof_data['theme_color']; } else { echo '#51a4c4'; }?> !important;
}
a.button_3, .button_3,a.button_4, .button_4 {
    background:<?php if(!empty($smof_data['button_active'])) { echo $smof_data['button_active']; } else { echo '#8dc63f'; }?> !important;
}
.button_3:hover,.button_4:hover {
    background:<?php if(!empty($smof_data['button_hover'])) { echo $smof_data['button_hover']; } else { echo '#000000'; }?> !important;
}
#testimonials {
    background:<?php if(!empty($smof_data['theme_color'])) { echo $smof_data['theme_color']; } else { echo 'url("'.get_template_directory_uri().'"/images/bg-testimonials.png") repeat'; }?> !important;
}
ul.tabs li a {
    color:<?php if(!empty($smof_data['theme_color'])) { echo $smof_data['theme_color']; } else { echo '#51a4c4'; }?>;
}
.padding-bottom {
    background:<?php if(!empty($smof_data['body_background'])) { echo $smof_data['body_background']; } else { echo '#ffffff'; }?> !important;
}
.button_enter {
    background-color: <?php if(!empty($smof_data['home_links_active'])) { echo $smof_data['home_links_active']; } else { echo '#8dc63f'; }?> !important;
}
.button_enter:hover {
    background-color: <?php if(!empty($smof_data['home_links_hover'])) { echo $smof_data['home_links_hover']; } else { echo '#3CF'; }?> !important;
}
.button_check {
    background-color: <?php if(!empty($smof_data['home_links_active'])) { echo $smof_data['home_links_active']; } else { echo '#8dc63f'; }?> !important;
}
.button_check:hover {
    background-color: <?php if(!empty($smof_data['home_links_hover'])) { echo $smof_data['home_links_hover']; } else { echo '#3CF'; }?> !important;
}
/****** Typography ******/
body {
    color: <?php if(!empty($smof_data['body_typ']['color'])){ echo $smof_data['body_typ']['color']; } else { echo '#464646'; }?> !important;
    font-size: <?php if(!empty($smof_data['body_typ']['size'])){ echo $smof_data['body_typ']['size'];} else { echo '13px'; }?> !important;
    font-weight: <?php if(!empty($smof_data['body_typ']['style'])){ echo $smof_data['body_typ']['style']; } else { echo 'normal';}?> !important;
    font-family:<?php if(!empty($smof_data['body_typ']['face'])){ echo $smof_data['body_typ']['face'];} else { echo '"Lato", sans-serif';}?> !important;
}
#top-nav ul .current a {
    color: <?php if(!empty($smof_data['act_menu_typ']['color'])){ echo $smof_data['act_menu_typ']['color'];} else { echo '#505050';}?> !important;
}
#top-nav a {
    font-size: <?php if(!empty($smof_data['act_menu_typ']['size'])){ echo $smof_data['act_menu_typ']['size'];} else { echo '14px';}?> !important;
    color: <?php if(!empty($smof_data['act_menu_typ']['color'])){ echo $smof_data['act_menu_typ']['color'];} else { echo '#505050';}?> !important;
    font-weight:<?php if(!empty($smof_data['act_menu_typ']['style'])){ echo $smof_data['act_menu_typ']['style'];} else { echo 'normal';}?> !important;
    font-family:<?php if(!empty($smof_data['act_menu_typ']['face'])){ echo $smof_data['act_menu_typ']['face'];} else { echo '"Lato", sans-serif';}?> !important;
}
#top-nav a:hover {
    font-size: <?php if(!empty($smof_data['hover_menu_typ']['size'])){ echo $smof_data['hover_menu_typ']['size'];} else { echo '14px';}?> !important;
    color: <?php if(!empty($smof_data['hover_menu_typ']['color'])){ echo $smof_data['hover_menu_typ']['color'];} else { echo '#39bad2';}?> !important;
    font-weight:<?php if(!empty($smof_data['hover_menu_typ']['style'])){ echo $smof_data['hover_menu_typ']['style'];} else { echo 'normal';}?> !important;
    font-family:<?php if(!empty($smof_data['hover_menu_typ']['face'])){ echo $smof_data['hover_menu_typ']['face'];} else { echo '"Lato", sans-serif';}?> !important;
}
#intro-txt h1 {
    font-size: <?php if(!empty($smof_data['intro_h1']['size'])){ echo $smof_data['intro_h1']['size'];} else { echo '60px';}?> !important;
    color: <?php if(!empty($smof_data['intro_h1']['color'])){ echo $smof_data['intro_h1']['color'];} else { echo '#fff';}?> !important;
    font-weight:<?php if(!empty($smof_data['intro_h1']['style'])){ echo $smof_data['intro_h1']['style'];} else { echo 'normal';}?> !important;
    font-family:<?php if(!empty($smof_data['intro_h1']['face'])){ echo $smof_data['intro_h1']['face'];} else { echo '"Lato", sans-serif';}?> !important;
}
#intro-txt h2 {
    font-size: <?php if(!empty($smof_data['intro_h2']['size'])){ echo $smof_data['intro_h2']['size'];} else { echo '42px';}?> !important;
    color: <?php if(!empty($smof_data['intro_h2']['color'])){ echo $smof_data['intro_h2']['color'];} else { echo '#fff';}?> !important;
    font-weight:<?php if(!empty($smof_data['intro_h2']['style'])){ echo $smof_data['intro_h2']['style'];} else { echo 'normal';}?> !important;
    font-family:<?php if(!empty($smof_data['intro_h2']['face'])){ echo $smof_data['intro_h2']['face'];} else { echo '"Yellowtail", cursive';}?> !important;
}
h1 {
    font-size: <?php if(!empty($smof_data['h1']['size'])){ echo $smof_data['h1']['size'];} else { echo '60px';}?> !important;
    color: <?php if(!empty($smof_data['h1']['color'])){ echo $smof_data['h1']['color'];} else { echo '#fff';}?> !important;
    font-weight:<?php if(!empty($smof_data['h1']['style'])){ echo $smof_data['h1']['style'];} else { echo 'bold';}?> !important;
    font-family:<?php if(!empty($smof_data['h1']['face'])){ echo $smof_data['h1']['face'];} else { echo '"Lato", sans-serif';}?> !important;
}
h2 {
    font-size: <?php if(!empty($smof_data['h2']['size'])){ echo $smof_data['h2']['size'];} else { echo '42px';}?> !important;
    color: <?php if(!empty($smof_data['h2']['color'])){ echo $smof_data['h2']['color'];} else { echo '#fff';}?> !important;
    font-weight:<?php if(!empty($smof_data['h2']['style'])){ echo $smof_data['h2']['style'];} else { echo 'bold';}?> !important;
    font-family:<?php if(!empty($smof_data['h2']['face'])){ echo $smof_data['h2']['face'];} else { echo '"Lato", sans-serif';}?> !important;
}
h3 {
     font-size: <?php if(!empty($smof_data['h3']['size'])){ echo $smof_data['h3']['size'];} else { echo '22px';}?> !important;
     color: <?php if(!empty($smof_data['h3']['color'])){ echo $smof_data['h3']['color'];} else { echo '#464646';}?> !important;
     font-weight:<?php if(!empty($smof_data['h3']['style'])){ echo $smof_data['h3']['style'];} else { echo 'bold';}?> !important;
     font-family:<?php if(!empty($smof_data['h3']['face'])){ echo $smof_data['h3']['face'];} else { echo '"Lato", sans-serif';}?> !important;
 }
.post h3 a {
     font-size: <?php if(!empty($smof_data['h3']['size'])){ echo $smof_data['h3']['size'];} else { echo '22px';}?> !important;
     color: <?php if(!empty($smof_data['h3']['color'])){ echo $smof_data['h3']['color'];} else { echo '#464646';}?> !important;
     font-weight:<?php if(!empty($smof_data['h3']['style'])){ echo $smof_data['h3']['style'];} else { echo 'bold';}?> !important;
     font-family:<?php if(!empty($smof_data['h3']['face'])){ echo $smof_data['h3']['face'];} else { echo '"Lato", sans-serif';}?> !important;
 }
h4 {
    font-size: <?php if(!empty($smof_data['h4']['size'])){ echo $smof_data['h4']['size'];} else { echo '14px';}?> !important;
    color: <?php if(!empty($smof_data['h4']['color'])){ echo $smof_data['h4']['color'];} else { echo '#999';}?> !important;
    font-weight:<?php if(!empty($smof_data['h4']['style'])){ echo $smof_data['h4']['style'];} else { echo 'bold';}?> !important;
    font-family:<?php if(!empty($smof_data['h4']['face'])){ echo $smof_data['h4']['face'];} else { echo '"Lato", sans-serif';}?> !important;
}
.section-title-2 h2 {
     font-size: <?php if(!empty($smof_data['st1']['size'])){ echo $smof_data['st1']['size'];} else { echo '42px';}?> !important;
     color: <?php if(!empty($smof_data['st1']['color'])){ echo $smof_data['st1']['color'];} else { echo '#fff';}?> !important;
     font-weight:<?php if(!empty($smof_data['st1']['style'])){ echo $smof_data['st1']['style'];} else { echo 'bold';}?> !important;
     font-family:<?php if(!empty($smof_data['st1']['face'])){ echo $smof_data['st1']['face'];} else { echo "Lato";}?> !important;
 }
 .section-title-2 h3 {
     font-size: <?php if(!empty($smof_data['st1']['size'])){ echo $smof_data['st1']['size'];} else { echo '42px';}?> !important;
     color: <?php if(!empty($smof_data['st1']['color'])){ echo $smof_data['st1']['color'];} else { echo '#fff';}?> !important;
     font-weight:<?php if(!empty($smof_data['st1']['style'])){ echo $smof_data['st1']['style'];} else { echo 'bold';}?> !important;
     font-family:<?php if(!empty($smof_data['st1']['face'])){ echo $smof_data['st1']['face'];} else { echo "Lato";}?> !important;
 }
.section-title-2 p {
     font-size: <?php if(!empty($smof_data['st2']['size'])){ echo $smof_data['st2']['size'];} else { echo '30px';}?> !important;
     color: <?php if(!empty($smof_data['st2']['color'])){ echo $smof_data['st2']['color'];} else { echo '#cbf1ff';}?> !important;
     font-weight:<?php if(!empty($smof_data['st2']['style'])){ echo $smof_data['st2']['style'];} else { echo 'normal';}?> !important;
     font-family:<?php if(!empty($smof_data['st2']['face'])){ echo $smof_data['st2']['face'];} else { echo "'Yellowtail', cursive";}?> !important;
 }
 .section-title-2 span {
     font-size: <?php if(!empty($smof_data['st2']['size'])){ echo $smof_data['st2']['size'];} else { echo '30px';}?> !important;
     color: <?php if(!empty($smof_data['st2']['color'])){ echo $smof_data['st2']['color'];} else { echo '#cbf1ff';}?> !important;
     font-weight:<?php if(!empty($smof_data['st2']['style'])){ echo $smof_data['st2']['style'];} else { echo 'normal';}?> !important;
     font-family:<?php if(!empty($smof_data['st2']['face'])){ echo $smof_data['st2']['face'];} else { echo "'Yellowtail', cursive";}?> !important;
 }
</style>