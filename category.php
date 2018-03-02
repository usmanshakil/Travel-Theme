<?php
/**
* Category page
* @Bed & Breakfast One Page
* @Bed & Breakfast One Page 1.1
**/
?>
<?php get_header(); ?>
   <section id="blog">
  <div class="section-title-2">
   <div class="container">
    <h2><?php single_cat_title( $prefix = '', $display = true ); ?></h2>
    </div>
  </div>
  <div class="container">
   	<div class=" eleven columns single-style" id="post-list">
 	<?php
         //$post_counter = 1;
          while(have_posts()): the_post(); 
		  $act_img = wp_get_attachment_url( get_post_thumbnail_id() ); ?>
    <div class="post">
		<h3><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
		<a href="<?php the_permalink();?>"><img src="<?php echo $act_img; ?>" alt="" class="scale-with-grid"></a>
		<div class="post_info clearfix">
			<div class="post-left">
				<ul>
					<li><i class="icon-calendar-empty"></i><?php _e('On',TEXTDOMAIN); ?> <span><?php the_time('F jS, Y'); ?></span></li>
					<li><i class="icon-user"></i><?php _e('By',TEXTDOMAIN); ?> <?php the_author_posts_link(); ?></li>
					<li><i class="icon-tags"></i><?php _e('Tags',TEXTDOMAIN); ?>
					<?php 
					if (has_tag()) {
					$posttags = get_the_tags();
					$count=0;
					if ($posttags) { 
					foreach($posttags as $tag) { 
					$count++;
					if ($count <= 3) { ?>
					<a href="<?php the_permalink(); ?>"><?php echo $tag->name . ' '; ?></a>
					<?php }
					  }
					} } else {  _e('No Tags',TEXTDOMAIN);}?></li>
				</ul>
			</div>
			<div class="post-right"><i class="icon-comments"></i><a href="#"><?php comments_number( '0', '1', '%' ); ?> </a><?php _e('Comments',TEXTDOMAIN); ?></div>
		</div>
		<p><?php echo the_excerpt(); ?></p>
        <div class="clear"></div>
		<a href="<?php the_permalink(); ?>" class="button_3"><?php _e('Read more',TEXTDOMAIN); ?></a>
	</div><!-- end post -->
   <?php endwhile; ?>
   <div class="clear"></div>
   <?php bbreakfast_pagination($pages = '', $range = 2); ?>
    </div><!-- end eleven columns -->
    
    <div class="five columns">
    	<div id="sidebar">
        	<?php get_sidebar(); ?>
         </div><!-- end sidebar -->
    </div><!-- end five columns -->
<?php get_footer(); ?>