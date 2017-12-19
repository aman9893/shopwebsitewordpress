<div class="clearfix"></div>
<div class="home-wrapper clients-wrapper">
	<div class="container">
		<div class="section-title-heading">
				<h2 class="section-title wow zoomIn"><?php echo esc_html(get_theme_mod('cosmica_clients_heading'));  ?></h2>
				<div class="separator-solid"></div>
				<p class="section-description wow slideInUp"><?php echo esc_html(get_theme_mod('cosmica_clients_description')); ?></p>
		</div>
		<div class="row">
			<div class="swiper-container home-clients">
				<div class="swiper-wrapper">
					<?php for ($i=1; $i <= 6; $i++): ?>
					<div class="swiper-slide client-media">
						<?php $logo = get_theme_mod('cosmica_client_logo'.$i); if(!empty($logo)): ?>
						<img src="<?php echo esc_url($logo); ?>" class="img-responsive"/>
						<?php endif; ?>
					</div>
					<?php endfor; ?>
				</div>
				<!-- Add Arrows -->
				<div class="swiper-button-prev client-prev"><i class="fa fa-angle-left"></i></div>
				<div class="swiper-button-next client-next"><i class="fa fa-angle-right"></i></div>
			</div>	
		</div>
	</div>
</div>