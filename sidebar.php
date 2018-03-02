<?php
/**
* Sidebar page
* @Bed & Breakfast One Page
* @Bed & Breakfast One Page 1.1
**/
?>
<?php if ( ! dynamic_sidebar( 'default' ) ) : ?>
	<div class="default-tags">
    <?php the_tags(' ',' '); ?>
    </div>
<?php endif; ?>
