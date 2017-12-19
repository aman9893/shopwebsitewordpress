<div id="about-cosmica" class="tab-pane">
	<?php $theme = wp_get_theme(); ?>
	<h3> <?php echo esc_html(sprintf(__('About %s', 'cosmica'), $theme->name)); ?> </h3>
	<img src="<?php echo esc_url(get_template_directory_uri().'/screenshot.png'); ?>" class="cosmica-screenshot">
	<h4 class="theme-heading"> <?php esc_html_e( 'Welcome to', 'cosmica'); ?> <span class="theme-name"> <?php echo esc_html($theme->get( 'Name' )) ?> </span> <span class="theme-version"> <?php echo esc_html($theme->get( 'Version' )) ?> </span> </h4>
	<div class="theme-description"><?php echo esc_html( $theme->get( 'Description' ) ); ?></div>
	<br>
	<hr>
</div>