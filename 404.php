<?php
/**
* 404 page
* @Bed & Breakfast One Page
* @Bed & Breakfast One Page 1.0
**/
?>
<?php if(!empty($_REQUEST['p']) || !empty($_REQUEST['page_id']) || !empty($_REQUEST['m'])) {?>
<?php get_header(); ?>
<section id="blog">
  <div class="section-title-2">
   <div class="container">
    <h2>404 Page Not Found.!</h2>
    </div>
  </div>
  <div class="container single-container">
   	<div class=" eleven columns single-style" id="post-list">
       <div class="post">
		<div class="img-404">
                <a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri();?>/images/404.png" alt="Home"/></a>
            </div>
		
	</div><!-- end post -->
   </div><!-- end eleven columns -->
    <div class="five columns">
    	<div id="sidebar">
        <?php get_sidebar(); ?>	            
        </div><!-- end sidebar -->
    </div><!-- end five columns -->

<?php  get_footer(); }  ?>