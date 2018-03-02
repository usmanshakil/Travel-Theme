<?php
/*
Template Name: Home Page
*/
 ?>
<?php get_header();?>
<section id="homepage">
    <header <?php if(!empty($smof_data['header_background'])){ ?> style="background: <?php echo $smof_data['header_background']; ?>" <?php } ?>>
        <div class="container">
            <div class="four columns">
                <?php $logo = $smof_data['logo']; ?>
                <a href="<?php echo home_url(); ?>" class="scroll_home"><img src="<?php if(!empty($logo)){ echo $logo; } else { echo get_template_directory_uri();?>/images/logo-2.png <?php } ?>" width="140" height="26" alt="Logo" class="scale-with-grid" id="logo-in"></a><!-- Your logo -->
            </div>
            <div class="btn-responsive-menu"> <span class="icon-bar"></span> <span class="icon-bar"></span><span class="icon-bar"></span></div> <!-- Responsive nav button -->

            <nav class="twelve columns omega" id="top-nav">
                <div class="lang hpg">
                    <?php languages_list_menu(); ?>
                </div>
                <ul class="pges">
                    <?php
                    $menu_item = array( 'post_type' => 'sections','order'=>'ASC' );
                    $loop_menu_item = new WP_Query($menu_item);
                    while ( $loop_menu_item->have_posts() ) : $loop_menu_item->the_post();
                        $include_menu_item = esc_html( get_post_meta( get_the_ID(), 'page_menu', true ) );
                        $external_link = esc_html( get_post_meta( get_the_ID(), 'external_link', true ) );
                        $menu_id = get_the_title();
                        $explo_menu = explode(" ",$menu_id);
                        $menu_item_id = implode("",$explo_menu);
                        ?>
                        <?php if(($include_menu_item == 'Yes') && empty($external_link)) { ?>
                            <li><a href="#<?php echo $menu_item_id; ?>">
                        <?php
                            $menu_item_id = esc_html( get_post_meta( get_the_ID(), 'page_section', true ) );
                            $args = array(
                                  'page_id' => $menu_item_id
                                  );
                            $loop = new WP_Query( $args );
                            while ( $loop->have_posts() ) : $loop->the_post();
                            the_title();
                            endwhile; ?>
                            </a></li>
                        <?php }
                        if(!empty($external_link)) { ?>
                            <li class="external"><a href="<?php echo $external_link; ?>" target="_blank"><?php the_title(); ?></a></li>
                        <?php } endwhile; ?>
				</ul><!-- End Nav Links -->
            </nav><!-- End Navigation -->
        </div>
    </header>
    <div id="intro-txt">
        <?php if(!empty($smof_data['intro-heading'])) { echo '<h1>'.$smof_data['intro-heading'].'</h1>'; }?>
        <?php if(!empty($smof_data['intro-text'])) { echo '<h2>'.$smof_data['intro-text'].'</h2>'; }?>
        <p id="logos">
            <?php if(!empty($smof_data['intro-logo1'])) { echo '<img src='.$smof_data['intro-logo1'].'>'; }?>
            <?php if(!empty($smof_data['intro-logo2'])) { echo '<img src='.$smof_data['intro-logo2'].'>'; }?>
        </p>
        <?php  if($smof_data['homelinksoption'] == '1') { ?>
            <div class="links-home">
                <a href="<?php if(empty($smof_data['left_button_link'])) {echo '#homepage'; } else { echo $smof_data['left_button_link']; } ?>" class="button_enter"><?php if(empty($smof_data['left_button'])) {echo 'Visit the website'; } else { echo $smof_data['left_button']; } ?></a>
                <a href="<?php if(empty($smof_data['right_button_link'])) {echo '#homepage'; } else { echo $smof_data['right_button_link']; } ?>" class=" button_check"><?php if(empty($smof_data['right_button'])) {echo 'Check availability'; } else { echo $smof_data['right_button']; } ?></a>
            </div>
            <?php } ?>
        </div><!-- End intro text -->
        <a id="prevslide" class="load-item"></a> <a id="nextslide" class="load-item"></a>
        <div id="footer-homepage"><?php if(!empty($smof_data['copy_right'])) { echo $smof_data['copy_right']; }?></div>
    </section>
        <?php
        $bg_count = 1;
        $page_section = array( 'post_type' => 'sections','order'=>'ASC' );
        $loop_page_section = new WP_Query($page_section);
        while ( $loop_page_section->have_posts() ) : $loop_page_section->the_post();
            $show_page_title = esc_html( get_post_meta( get_the_ID(), 'page_title', true ) );
            $last_section = esc_html( get_post_meta( get_the_ID(), 'last_section', true ) );
            $external_link = esc_html( get_post_meta( get_the_ID(), 'external_link', true ) );
            $section_id = get_the_title();
            $explo_title = explode(" ",$section_id);
            $sec_id = implode("",$explo_title);
            ?>
         <?php if ((has_post_thumbnail()) && ($show_page_title == 'No') && empty($external_link)) { ?>
        <div class="bg-container-2" id="<?php echo $sec_id; ?>">
            <?php
            if($bg_count == 4){
                $bg_count = 1;
            }
            $bg_image = wp_get_attachment_url( get_post_thumbnail_id() ); ?>
            <?php if($bg_count == 1) { ?>
                <div class="bg2" style="background: url(<?php echo $bg_image; ?>) 50% 50% fixed repeat-y;"></div>
            <?php } ?>
            <?php if($bg_count == 2) { ?>
                <div class="bg3" style="background: url(<?php echo $bg_image; ?>) 50% 20% fixed repeat-y;"></div>
            <?php } ?>
            <?php if($bg_count == 3) { ?>
                <div class="bg4" style="background: url(<?php echo $bg_image; ?>) 50% 50% fixed repeat-y;"></div>
            <?php }
            $bg_count ++;
            ?>
            <?php echo do_shortcode('[topborder]');?>
            <div class="container">
                <?php
                $page_id = esc_html( get_post_meta( get_the_ID(), 'page_section', true ) );
                $args = array(
                    'page_id' => $page_id
                );
                $loop = new WP_Query( $args );
                while ( $loop->have_posts() ) : $loop->the_post();
                    the_content();
                endwhile;
                ?>
            </div>
        </div>
    <?php } elseif(($last_section == 'Yes') && empty($external_link)){ ?>
        <?php
        $page_id = esc_html( get_post_meta( get_the_ID(), 'page_section', true ) );
        $args = array(
            'page_id' => $page_id
        );
        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post();
            the_content();
        endwhile;
        ?>
    <?php  } elseif(!empty($external_link)){}
            else { ?>
        <section id="<?php echo $sec_id; ?>" class="padding-bottom">
            <?php if($show_page_title == 'Yes') { ?>
                <div class="section-title-2">
                    <div class="container">
                        <h2><?php the_title(); ?></h2>
                        <?php $page_title_desc = esc_html( get_post_meta( get_the_ID(), 'page_title_desc', true ) ); ?>
                        <p><?php echo $page_title_desc; ?></p>
                    </div>
                </div>
            <?php } else {
                echo '<br/>';
            } ?>
            <div class="container">
                <?php
                $page_id = esc_html( get_post_meta( get_the_ID(), 'page_section', true ) );
                $args = array(
                    'page_id' => $page_id
                );
                $loop = new WP_Query( $args );
                while ( $loop->have_posts() ) : $loop->the_post();
                    the_content();
                endwhile;
                ?>
            </div><!-- End Container -->
        </section>
    <?php } ?>
    <?php endwhile; ?>
<?php wp_reset_query(); ?>
<?php get_footer();?>