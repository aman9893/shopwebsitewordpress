<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Cosmica
 */

?>
			
	</div><!-- #content -->

	<!-- Footer Start -->
	<footer class="site-footer">
		<div class="container-fluid cosmica-footer">
			<div class="container">
				<div class="row cosmica-footer-widgets">
					<?php	
						$footer_widget  = array(
					        'name'          => esc_html__('Footer Widget Area', 'cosmica'),
					        'id'            => 'footer-widget-area',
					        'class'         => 'footer-widget-area',
					        'description' => __( 'Footer Widget Area', 'cosmica' ),
					        'before_widget' => '<div id="%1$s" class="col-md-3 col-sm-6 footer-widget widget"><div class="widget-inner">',
					        'after_widget'  => '</div></div>',
					        'before_title'  => '<div class="widget-heading"><h3 class="widget-title">',
					        'after_title'   => '</h3></div>',
					    );
						if ( is_active_sidebar( 'footer-widget-area' ) ) { 
						
	        				dynamic_sidebar( 'footer-widget-area'); 
	        		
						}else{ 
					        the_widget('WP_Widget_Calendar', 'title='.esc_attr__('Calendar', 'cosmica'), $footer_widget);
		            		the_widget('WP_Widget_Categories', null, $footer_widget);
		            		the_widget('WP_Widget_Pages', null, $footer_widget);
		            		the_widget('WP_Widget_Archives', null, $footer_widget);
				    	} 
				    ?>
				</div>
			</div>
		</div>
		<div class="container-fluid footer-copyright">
			<div class="container">
				<div class="row comsica-copyright">
					<p>&copy; <?php echo esc_html(date('Y')).' '; bloginfo( 'name' ); ?> | <?php printf( esc_html__( 'Theme by %1$s', 'cosmica' ),  '<a href="'.esc_url('http://www.codeins.org').'" rel="designer">Codeins</a>' ); ?></p>
				</div>
			</div>
		</div>
	</footer>
	<!-- Footer End -->
</div><!-- .wrapper -->
<?php wp_footer(); ?>
</body>
</html>
