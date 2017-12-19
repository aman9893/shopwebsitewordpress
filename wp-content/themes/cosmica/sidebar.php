<aside class="sidebar right-sidebar col-md-3 col-sm-12">
<?php 
	if ( is_active_sidebar( 'right-sidebar' ) ) : 
		dynamic_sidebar( 'right-sidebar' );
 	else: 
		$args = array(
		    'name'          => __( 'Right Sidebar', 'cosmica' ),
		    'id'            => 'right-sidebar',
		    'before_widget' => '<aside id="%1$s" class="widget sidebar-widget">',
		    'after_widget'  => '</aside>',
		    'before_title'  => '<h3 class="widgettitle">',
		    'after_title'   => '</h3>');
			the_widget('WP_Widget_Calendar', 'title='.esc_html__('Calendar', 'cosmica'), $args);
			the_widget('WP_Widget_Search', 'title='.esc_html__('Search', 'cosmica'), $args);
			the_widget('WP_Widget_Tag_Cloud', null, $args);
			the_widget('WP_Widget_Recent_Posts', null, $args);
			the_widget('WP_Widget_Recent_Comments', null, $args);
			the_widget('WP_Widget_Archives', null, $args);
			the_widget('WP_Widget_Categories', null, $args);
 	endif; 
 ?>
</aside>