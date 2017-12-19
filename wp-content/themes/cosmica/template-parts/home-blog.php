<div class="clearfix"></div>
<div class="home-wrapper posts-wrapper">
    <div class="container">
        <div class="section-title-heading">
            <h2 class="section-title wow zoomIn"><?php echo esc_html(get_theme_mod('cosmca_latest_post_heading')); ?></h2>
            <div class="separator-solid"></div>
            <p class="section-description wow slideInUp"><?php echo esc_html(get_theme_mod('cosmca_latest_post_description')); ?></p>
        </div>
        <div class="section-content swiper-container home-blog">
            <div class="swiper-wrapper">
                <?php
                    $post_count = get_theme_mod('cosmca_latest_post_count', 9);
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $args = array( 'post_type' => 'post', 'paged'=>$paged, 'posts_per_page' => $post_count, 'ignore_sticky_posts' => 1, );
                    $post_type_data = new WP_Query( $args );
                    $i=1;
                    while($post_type_data->have_posts()){
                        $post_type_data->the_post();
                        set_query_var('index', $i);
                        get_template_part('template-parts/content','home'); 
                        $i++;
                    }
                ?>
            </div>
        </div>
    </div>
</div>
