<?php
/**
* Theme Comments
* @Bed & Breakfast One Page
* @Bed & Breakfast One Page 1.1
**/
?>
<?php
// load comment scripts only on single pages
if ( is_singular() ) wp_enqueue_script( 'comment-reply' );

?>
