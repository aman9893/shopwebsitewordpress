<div class="clearfix"></div>
<div class="home-wrapper service-wrapper">
    <div class="container">
        <div class="section-title-heading">
            <h2 class="section-title wow zoomIn"><?php echo esc_html(get_theme_mod('cosmca_services_header_text')); ?></h2>
            <div class="separator-solid"></div>
            <p class="section-description wow slideInUp"><?php echo esc_html(get_theme_mod('cosmca_services_desc_text')); ?></p>
        </div>
        <div class="section-content">
            <div class="row home-services">
                <?php for ($i=1; $i <= 6; $i++): ?>
                <div class="col-md-4 col-sm-6 cosmica-service wow bounceIn" data-wow-delay="300ms">
                    <div class="service-inner">
                        <div class="service-icon">
                            <i class="fa <?php echo get_theme_mod('cosmica_service_icon'.$i, 'fa fa-star'); ?>"></i>
                        </div>
                        <div class="service-info media-body">
                            <h3 class="service-title"><?php echo esc_html(get_theme_mod('cosmca_services_'.$i.'_title')); ?></h3>
                            <p class="service-description"><?php echo esc_html(get_theme_mod('cosmca_services_'.$i.'_desc')); ?></p>
                            <?php $service_link =  get_theme_mod('cosmca_services_link'.$i); ?>
                            <?php if(!empty($service_link)): ?>
                            <a href="<?php echo esc_url($service_link); ?>" class="read-more"><?php _e('Read More', 'cosmica'); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endfor; ?>
            </div>
        </div>
    </div>
</div>
