<?php
/**
 * The template for displaying singular post-types: posts, pages and user-defined custom post types.
 *
 * @package HelloElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
// wp_head();

?>


<!-- <link href="<?php echo YURAN_URL ; ?>/myapp/dist/css/bootstrap.min.css" rel="stylesheet" /> -->
<!-- <link href="<?php echo YURAN_URL ; ?>/myapp/dist/css/styles.css" rel="stylesheet" /> -->


<div id="appsvelte"></div>
<!-- <script src="<?php echo YURAN_URL ; ?>/myapp/dist/js/scripts.js"></script> -->


<?php
// wp_footer();
get_footer();
?>
