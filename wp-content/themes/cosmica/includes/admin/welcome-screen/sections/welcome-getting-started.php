<div id="getting-started" class="tab-pane active">
	<?php $theme = wp_get_theme();	?>
	<h3> <?php printf(esc_html__('Welcome to %s', 'cosmica'), $theme->name); ?> </h3>
	<p><?php _e('We are for you to give you awesome experience. Clean Design, Secure Code, Fast Speed, Powerful Options and much more.. ','cosmica') ?></p>
	<a class="button button-default" target="_blank"href="<?php echo esc_url('https://wordpress.org/support/theme/cosmica'); ?>"><?php _e('Support', 'cosmica'); ?></a> &nbsp;
	<a class="button button-default" target="_blank"href="<?php echo esc_url('https://wordpress.org/support/theme/cosmica/reviews/?filter=5'); ?>"><?php _e('Feedback', 'cosmica'); ?></a>
	<br>
	<p class="review-link"><?php _e('Rate our theme on', 'cosmica') ?> <a href="https://wordpress.org/support/theme/cosmica/reviews/?filter=5" target="_blank"><?php _e('WordPress.org', 'cosmica') ?></a>. <?php _e('We\'d really appreciate it!', 'cosmica') ?> </p>
	<p><i class="dashicons dashicons-star-filled"></i><i class="dashicons dashicons-star-filled"></i><i class="dashicons dashicons-star-filled"></i><i class="dashicons dashicons-star-filled"></i><i class="dashicons dashicons-star-filled"></i></p>
	<hr>
	<h3> <?php esc_html_e('Getting Started', 'cosmica'); ?> </h3>
	<p><?php printf(esc_html__('Manage theme options in customizer to get full advantage of %s','cosmica'), $theme->name); ?></p>
	<?php $plugin = 'kirki/kirki.php'; if ( is_plugin_active( $plugin ) ): ?>
	<span class="button button-disabled button-default btn-kirki-active"><?php esc_html_e( 'Kirki is Active', 'cosmica'); ?> <i class="fa fa-check"></i></span>&nbsp;
	<?php elseif(file_exists(( WP_CONTENT_DIR.'/plugins/kirki/kirki.php' ))): ?>
	<a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'plugins.php?action=activate&plugin='.$plugin.'&plugin_status=all&paged=1&s' ), 'activate-plugin_'.$plugin ) ); ?>" class="button button-primary"><?php esc_html_e( 'Activate Kirki', 'cosmica'); ?></a> &nbsp;
	<?php else: ?>
	<a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=kirki' ), 'install-plugin_kirki' ) ); ?>" class="install-now button button-primary" data-slug="kirki" data-name="Kirki"><?php esc_html_e( 'Install Kirki Toolkit', 'cosmica'); ?></a> &nbsp;
	<?php endif; ?>
	<?php $cas_plugin = 'cosmica-advance-sections/plugin.php'; if ( is_plugin_active( $cas_plugin ) ): ?>
	<span class="button button-disabled button-default btn-cas-active"><?php esc_html_e( 'Cosmica Advance Sections is Active', 'cosmica'); ?> <i class="fa fa-check"></i></span>&nbsp;
	<?php elseif(file_exists(( WP_CONTENT_DIR.'/plugins/'.$cas_plugin ))): ?>
	<a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'plugins.php?action=activate&plugin='.$cas_plugin.'&plugin_status=all&paged=1&s' ), 'activate-plugin_'.$cas_plugin ) ); ?>" class="button button-primary"><?php esc_html_e( 'Activate Cosmica Advance Sections', 'cosmica'); ?></a> &nbsp;
	<?php else: ?>
	<a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=cosmica-advance-sections' ), 'install-plugin_cosmica-advance-sections' ) ); ?>" class="install-now button button-primary" data-slug="cosmica-advance-sections" data-name="Cosmica Advance Sections"><?php esc_html_e( 'Install Cosmica Advance Sections', 'cosmica'); ?></a> &nbsp;
	<?php endif; ?>
	<br>
	<br>
	<a href="<?php echo esc_html(wp_customize_url()); ?>" class="button button-primary"><?php esc_html_e('Customize', 'cosmica'); ?></a>
</div>