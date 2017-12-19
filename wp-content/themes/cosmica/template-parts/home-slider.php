<?php if (!absint(get_theme_mod('cosmica_hide_slider', false))): ?>
<!-- Slider Start -->
<div class="cosmica-slider">
	<div class="swiper-container home-slider">
		<div class="swiper-wrapper">
			<?php for ($i=1; $i <= 4; $i++): ?>
			<div class="swiper-slide">
				<?php $slide_img = get_theme_mod('cosmica_slide_image'.$i); if (!empty($slide_img)): ?>
				<img src="<?php echo esc_url($slide_img); ?>" class="img-responsive"/>
				<?php endif; ?>
				<div class="overlay"></div>
				<div class="carousel-caption">
					<div class="slide-heading animation animated-item-1"><h1><?php echo wp_kses_post(get_theme_mod('cosmica_slide_'.$i.'_heading')); ?></h1></div>
					<div class="slide-description animation animated-item-2"><p><?php echo wp_kses_post(get_theme_mod('cosmica_slide_'.$i.'_description')); ?></p></div>
					<div class="buttons-con">
                        <?php $slide_button_1 = get_theme_mod('cosmica_slide_'.$i.'_bt_1_link'); if(!empty($slide_button_1)):  ?>
                        <a href="<?php echo esc_url($slide_button_1); ?>" class="button button-main button-info animation animated-item-3" id="banner-action-two"> <?php echo esc_html(get_theme_mod('cosmica_slide_'.$i.'_bt_1_text'));?></a>
                    	<?php endif; ?>
                        <?php $slide_button_2 = get_theme_mod('cosmica_slide_'.$i.'_bt_2_link'); if(!empty($slide_button_2)):  ?>
                        <a href="<?php echo esc_url($slide_button_2); ?>" class="button button-main button-sun animation animated-item-4"  id="banner-action-one"> <?php echo esc_html(get_theme_mod('cosmica_slide_'.$i.'_bt_2_text'));?></a>
                    	<?php endif; ?>
                    </div>
				</div>
			</div>
			<?php endfor; ?>
		</div>
		<!-- Add Pagination -->
		<div class="swiper-pagination home-pagination"></div>
		<!-- Add Arrows -->
		<div class="swiper-button-prev home-prev"><i class="fa fa-angle-left"></i></div>
		<div class="swiper-button-next home-next"><i class="fa fa-angle-right"></i></div>
	</div>	
	<div class="cosmica-slider-shadow"></div>
</div>	
<!-- Slider End -->
<?php endif; ?>