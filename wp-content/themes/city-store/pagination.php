<?php
/**
 * The template for displaying pagination.
 *
 * @package Alina Kakshapati
 * @subpackage City Store
 * @since City Store 1.0
 */
$city_store_settings = city_store_get_theme_options();
if ( !class_exists( 'Jetpack') || class_exists( 'Jetpack') && !Jetpack::is_module_active( 'infinite-scroll' )){
	echo '<div class="container">';
	if ( function_exists('wp_pagenavi' ) ) :
		wp_pagenavi();
	else:
	global $wp_query;
		if ( $wp_query->max_num_pages > 1 ) : ?>
		<ul class="default-wp-page clearfix">
			<li class="previous">
				<?php next_posts_link( __( '&laquo; Previous Page', 'city-store' ) ); ?>
			</li>
			<li class="next">
				<?php previous_posts_link( __( 'Next Page &raquo;', 'city-store' ) ); ?>
			</li>
		</ul>
		<?php  endif;
	endif;
	echo '</div> <!-- end .container -->';
}?>