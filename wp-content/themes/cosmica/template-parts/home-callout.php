<div class="clearfix"></div>
<div class="home-wrapper callout-wrapper">
    <div class="callout-overlay fixed-background"></div>
    <div class="container">
        <div class="section-title-heading">
			<h2 class="section-title wow zoomIn"><?php echo esc_html(get_theme_mod('cosmca_call_header_text')); ?></h2>
			<div class="separator-solid"></div>
			<p class="section-description wow slideInUp"><?php echo esc_html(get_theme_mod('cosmca_call_desc_text')); ?></p>
		</div>
        <div class="callout-content">
            <?php $bt_1_link = get_theme_mod('cosmca_call_bt1_link'); if(!empty($bt_1_link)): ?>
            <a href="<?php echo esc_url($bt_1_link); ?>" class="wow fadeInLeft button button-main button-success"><?php echo esc_html(get_theme_mod('cosmca_call_bt1_text')); ?></a>
        	<?php endif; ?>
            <?php $bt_2_link = get_theme_mod('cosmca_call_bt2_link'); if(!empty($bt_2_link)): ?>
            <a href="<?php echo esc_url($bt_2_link); ?>" class="wow fadeInRight button button-main button-warning"><?php echo esc_html(get_theme_mod('cosmca_call_bt2_text')); ?></a>
        	<?php endif; ?>
        </div>
	</div>
</div>
