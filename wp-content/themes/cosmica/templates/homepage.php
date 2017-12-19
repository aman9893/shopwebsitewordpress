<?php
/**
Template Name: Home Page
*/
get_header(); 
	$home_sections  = get_theme_mod('cosmica_homepage_layout', array('slider', 'projects', 'services', 'blog', 'callout', 'clients'));
	foreach ($home_sections as $key => $section) {
	 	get_template_part('template-parts/home', $section);
	}
get_footer();
?>