<?php
/**
* Single page
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
					} } else {  _e('No Tags',TEXTDOMAIN); }?></li>
				</ul>
			</div>
			<div class="post-right"><i class="icon-comments"></i><a href="#"><?php comments_number( '0', '1', '%' ); ?> </a><?php _e('Comments',TEXTDOMAIN); ?></div>
		</div>
		
			<?php the_content(); ?>
		
	</div><!-- end post -->
    <?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', TEXTDOMAIN ), 'after' => '</div>' ) ); ?>
	<hr>
    <?php comments_template(); ?>
    <?php endwhile; ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>></div>
    <?php posts_nav_link(); ?>
	</div><!-- end eleven columns -->
    <div class="five columns">
    	<div id="sidebar">
        <?php get_sidebar(); ?>	            
        </div><!-- end sidebar -->
    </div><!-- end five columns -->
    
<?php get_footer(); ?>