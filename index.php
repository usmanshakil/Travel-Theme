<?php
/**
* Index Page
* @Bed & Breakfast One Page
* @Bed & Breakfast One Page 1.0
**/
?>
<?php get_header(); 
	if(is_home()) {
?>
<section id="blog">
  <div class="section-title-2">
   <div class="container">
    <h2><?php _e('Blog',TEXTDOMAIN); ?></h2>
    <p>- <?php _e('Latest blogroll',TEXTDOMAIN); ?>  - </p>
   </div>
  </div>
  <div class="container single-container">
   	<div class=" eleven columns" id="post-list">
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
					if ($count <= 2) { ?>
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
		<a href="<?php the_permalink(); ?>" class="button_3"><?php _e('Read More',TEXTDOMAIN); ?></a>
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
<?php
	} else { ?>
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
		<div class="post_info clearfix">
			<div class="post-left">
				<ul>
					<li><i class="icon-calendar-empty"></i><?php _e('On',TEXTDOMAIN); ?> <span><?php the_time('F jS, Y'); ?></span></li>
					<li><i class="icon-user"></i><?php _e('By',TEXTDOMAIN); ?> <?php the_author_posts_link(); ?></li>
					<li><i class="icon-tags"></i><?php _e('Tags',TEXTDOMAIN); ?> <?php
					if (has_tag()) {
					$posttags = get_the_tags();
					$count=0;
					if ($posttags) { 
					foreach($posttags as $tag) { 
					$count++;
					if ($count <= 2) { ?>
					<a href="<?php the_permalink(); ?>"><?php echo $tag->name . ' '; ?></a>
					<?php }
					  }
					} } else { echo 'No Tags';}?></li>
				</ul>
			</div>
			<div class="post-right"><i class="icon-comments"></i><a href="#"><?php comments_number( '0', '1', '%' ); ?> </a><?php _e('Comments',TEXTDOMAIN); ?></div>
		</div>
		
			<?php the_excerpt(); ?>
		
	</div><!-- end post -->
    <?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', TEXTDOMAIN ), 'after' => '</div>' ) ); ?>
	<hr>
    <?php comments_template(); ?>
    <?php endwhile; ?>
    <div class="clear"></div>
   <?php bbreakfast_pagination($pages = '', $range = 2); ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>></div>
	</div><!-- end eleven columns -->
    <div class="five columns">
    	<div id="sidebar">
        <?php get_sidebar(); ?>	            
        </div><!-- end sidebar -->
    </div><!-- end five columns -->		
<?php }
get_footer(); ?>