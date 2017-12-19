<div class="clearfix"></div>
<div class="home-wrapper work-wraper">
    <div class="container">
        <div class="section-title-heading">
            <h2 class="section-title wow zoomIn"><?php echo esc_html(get_theme_mod('cosmca_project_heading')); ?></h2>
            <div class="separator-solid"></div>
            <p class="section-description wow slideInUp"><?php echo esc_html(get_theme_mod('cosmca_project_description')); ?></p>
        </div>
        <div class="section-content row home-works">
            <?php for ($i=1; $i <= 4; $i++): ?>
            <div class="col-md-3 col-sm-6 cosmica-work show-overlay wow fadeInUp" data-wow-delay="<?php echo (($i/2)); ?>s">
                <div class="work-inner">
                    <div class="img-thumbnail">
                        <?php $prject_image = get_theme_mod('cosmica_project_image'.$i); if(!empty($prject_image)): ?>
                        <img src="<?php echo esc_url($prject_image); ?>" class="img-responsive" />
                        <?php endif; ?>
                        <div class="img-overlay">
                            <div class="display-table">
                                <div class="display-cell">
                                    <a href="<?php echo esc_url($prject_image); ?>" class="icon-link icon-left lightbox_a"><i class="fa fa-search-plus"></i></a>
                                    <?php $porject_link = get_theme_mod('cosmca_project_link'. $i); if(!empty($porject_link)): ?>
                                    <a href="<?php echo esc_url($porject_link); ?>" class="icon-link icon-right"><i class="fa fa-link"></i></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="work-info">
                        <h3 class="work-title"><?php echo esc_html(get_theme_mod('cosmca_project_title'. $i)); ?></h3>
                    </div>
                </div>
            </div>
            <?php endfor; ?>
        </div>
    </div>
</div>
