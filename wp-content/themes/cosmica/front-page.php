<?php 
get_header(); 
	if(is_home()){
		get_template_part('index');
	}else{
		if(function_exists('cosmica_advanced_sections')){
			$home_sections  = get_theme_mod('cosmica_homepage_layout', array('slider', 'projects', 'services', 'blog', 'callout', 'clients'));
			foreach ($home_sections as $key => $section) {
			 	get_template_part('template-parts/home', $section);
			}
		}else{
			if (current_user_can('edit_theme_options')): ?>
				<div class="container front-page-message">
					<div class="alert alert-warning">
					 	<strong><?php esc_html_e('"Cosmica Advance Section" Plugin not found : ', 'cosmica'); ?></strong> <?php esc_html_e('Please install "Cosmica Advance Section" Plugin for front page sections', 'cosmica'); ?>
					</div>
				</div>
			<?php endif; 
		}
	}
get_footer();
?>