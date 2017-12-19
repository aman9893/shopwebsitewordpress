<?php

/**
 *Exit if Kirki not exist
 */
if (!class_exists('Kirki')) {
	return;
}

Kirki::add_config('cosmica_settings', array(
	'capability'  => 'edit_theme_options',
	'option_type' => 'theme_mod',
));

Kirki::add_section('cosmica_homepage_layout_section', array(
	'title'    => __('Homepage Layout', 'cosmica'),
	'priority' => 1,
	'panel'    => 'cosmica_homepage_settings',
));

/**
 * Homepage Layout
 */
Kirki::add_field('cosmica_settings', array(
	'type'     => 'sortable',
	'section'  => 'cosmica_homepage_layout_section',
	'settings' => 'cosmica_homepage_layout',
	'label'    => esc_attr__('Homepage Sections', 'cosmica'),
	'help'     => esc_attr__('Drag and Drop to change order of section and enable/disable any section.', 'cosmica'),
	'default'  => array('slider', 'projects', 'services', 'blog', 'callout', 'clients'),
	'priority' => 10,
	'choices'  => array(
		'slider'     => esc_attr__('Slider', 'cosmica'),
		'projects'   => esc_attr__('Projects', 'cosmica'),
		'services'   => esc_attr__('Services ', 'cosmica'),
		'callout'    => esc_attr__('Callout ', 'cosmica'),
		'blog'       => esc_attr__('Blog', 'cosmica'),
		'clients'	 => esc_attr__('Brand Logo', 'cosmica'),
	),
));


/**
 * Cosmica Customizer UI Configuration.
 */
function cosmica_configuration() {

	$config['color_back']   = '#192429';
	$config['color_accent'] = '#008ec2';
	$config['width']        = '25%';

	return $config;
}

add_filter('kirki/config', 'cosmica_configuration');