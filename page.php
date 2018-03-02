<?php
/**
* Default page
* @Bed & Breakfast One Page
* @Bed & Breakfast One Page 1.1
**/
?>
<?php get_header(); ?>
<section id="blog">
  <div class="section-title-2">
   <div class="container">
    <h2><?php the_title(); ?></h2>
    </div>
  </div>
  <div class="container single-container">
   	<div class=" eleven columns single-style" id="post-list">
    <?php while(have_posts()): the_post();?>
      <div class="post">
		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<?php the_post_thumbnail(); ?>
		<div class="clear"></div>
		<?php the_content(); ?>
		
	</div><!-- end post -->
    <?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', TEXTDOMAIN ), 'after' => '</div>' ) ); ?>
	<hr>
    <?php comments_template(); ?>
    <?php endwhile; ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>></div>
	</div><!-- end eleven columns -->
    <div class="five columns">
    	<div id="sidebar">
        <?php get_sidebar(); ?>	            
        </div><!-- end sidebar -->
    </div><!-- end five columns -->
<?php get_footer(); ?>