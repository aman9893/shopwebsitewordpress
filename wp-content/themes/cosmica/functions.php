<?php

if (!isset($content_width)) {
    $content_width = 1170;
}

define('COSMICA_URI', get_template_directory_uri());
define('COSMICA_DIR', get_template_directory());

function cosmica_add_supports() {

    load_theme_textdomain('cosmica', COSMICA_DIR . '/lang');
    add_editor_style(esc_url(COSMICA_URI . '/css/custom-style.css'));
    add_theme_support('automatic-feed-links');

    /*
     *  add post format options
     */

    add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));
    add_theme_support("post-thumbnails");
    add_theme_support("title-tag");
    add_theme_support("custom-logo");

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');
    
    // Add theme support for Custom Background
    $background_args = array(
        'default-color'          => '#fff',
        'default-image'          => '',
        'default-repeat'         => '',
        'default-position-x'     => '',
        'default-attachment'     => '',
        'admin-head-callback'    => '',
        'admin-preview-callback' => '',
    );
    add_theme_support('custom-background', $background_args);
    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support('html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
    ));

    add_theme_support('woocommerce');

}
add_action('after_setup_theme', 'cosmica_add_supports');

register_nav_menus(array(
    'primary_menu' => __('Primary Menu', 'cosmica'),
));

function cosmica_register_sidebars() {

    register_sidebar(array(
        'name'          => esc_html__('Right Sidebar', 'cosmica'),
        'id'            => 'right-sidebar',
        'class'         => 'right-sidebar',
        'description'   => __('Sidebar Widget Area', 'cosmica'),
        'before_widget' => '<div id="%1$s" class="sidebar-widget widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="widget-heading"><h3 class="widget-title">',
        'after_title'   => '</h3></div>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer Widget Area', 'cosmica'),
        'id'            => 'footer-widget-area',
        'class'         => 'footer-widget-area',
        'description' => __( 'Footer Widget Area', 'cosmica' ),
        'before_widget' => '<div id="%1$s" class="col-md-3 col-sm-6 footer-widget widget %2$s"><div class="widget-inner">',
        'after_widget'  => '</div></div>',
        'before_title'  => '<div class="widget-heading"><h3 class="widget-title">',
        'after_title'   => '</h3></div>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('WooCommerce Widget Area', 'cosmica'),
        'id'            => 'woocommerce-widget-area',
        'class'         => 'woocommerce-widget-area',
        'description' => __( 'WooCommerce Widget Area', 'cosmica' ),
        'before_widget' => '<div id="%1$s" class="woocommerce-widget sidebar-widget widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="widget-heading"><h3 class="widget-title">',
        'after_title'   => '</h3></div>',
    ));
    

}

add_action('widgets_init', 'cosmica_register_sidebars');

function cosmica_register_scripts() {

    wp_enqueue_style('cosmica-google-fonts-style', '//fonts.googleapis.com/css?family=Open+Sans:400,600,700,800,300,400italic|Lato:400,400italic,700,900,300');
    wp_enqueue_style('animate', get_template_directory_uri() . "/css/animate.min.css");
    wp_enqueue_style('swiper', get_template_directory_uri() . "/css/swiper.min.css");
    wp_enqueue_style('simplelightbox',  get_template_directory_uri()."/css/simplelightbox.min.css");
    wp_enqueue_style('bootstrap', get_template_directory_uri() . "/css/bootstrap.min.css");
    wp_enqueue_style('font-awesome', get_template_directory_uri() . "/css/font-awesome.min.css");

    if (is_singular() && get_option('thread_comments')) {wp_enqueue_script('comment-reply');}
    wp_enqueue_script('wow', get_template_directory_uri() . '/js/wow.min.js', array('jquery'));
    wp_enqueue_script('swiper', get_template_directory_uri() . '/js/swiper.min.js', array('jquery'));
    wp_enqueue_script('simple-lightbox', get_template_directory_uri() . '/js/simple-lightbox.min.js', array('jquery'), '20120206', true );
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'));
    wp_enqueue_script('masonry', get_template_directory_uri() . '/js/masonry.pkgd.min.js', array('jquery'));
    wp_enqueue_script('cosmica-custom-script', get_template_directory_uri() . '/js/custom-script.js', array('jquery'));

    wp_enqueue_script('respond', get_template_directory_uri() . '/js/respond.min.js');
    wp_script_add_data('respond', 'conditional', 'lt IE 9');

    wp_enqueue_script('html5shiv', get_template_directory_uri() . '/js/html5shiv.js');
    wp_script_add_data('html5shiv', 'conditional', 'lt IE 9');

}
add_action('wp_enqueue_scripts', 'cosmica_register_scripts');

function cosmica_register_custom_scripts() {
    wp_enqueue_style('cosmica-style', get_stylesheet_uri());
    wp_enqueue_style('cosmica-media-style', get_template_directory_uri() . "/css/media-style.css");
}
add_action('wp_enqueue_scripts', 'cosmica_register_custom_scripts', 20);

function cosmica_custmizer_style() {
    wp_enqueue_style('font-awesome', get_template_directory_uri() . "/css/font-awesome.min.css");
    wp_enqueue_style('cosmica-customizer-css', get_template_directory_uri() . '/css/customizer-style.css');
    wp_enqueue_script('cosmica-customizer-script', get_template_directory_uri() . '/js/customizer-script.js');
}
add_action('customize_controls_print_styles', 'cosmica_custmizer_style');

function cosmica_is_woocommrce_active() {

    if (class_exists('WooCommerce')) {
        return true;
    } else {
        return false;
    }

}

function cosmica_new_excerpt_more($more) {
    return '';
}
add_filter('excerpt_more', 'cosmica_new_excerpt_more');

function cosmica_entry_date($echo = true) {
    if (has_post_format(array('chat', 'status'))) {
        $format_prefix = _x('%1$s on %2$s', '1: post format name. 2: date', 'cosmica');
    } else {
        $format_prefix = '%2$s';
    }

    $date = sprintf('<span class="date"><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a></span>',
        esc_url(get_permalink()),
        esc_attr(sprintf(__('Permalink to %s', 'cosmica'), the_title_attribute('echo=0'))),
        esc_attr(get_the_date('c')),
        esc_html(sprintf($format_prefix, get_post_format_string(get_post_format()), get_the_date()))
    );

    if ($echo) {
        echo $date;
    }

    return $date;
}

function cosmica_social_links() {

    $link_in_new_tab = (absint(get_theme_mod('social_link_open_in_new_tab', true))) ? 'target="_blank"' : '';
    ?>
        <ul class="cs-socials">
            <?php $sl_facebook = get_theme_mod('social_link_facebook'); if(!empty($sl_facebook)): ?>
            <li><a href="<?php echo esc_url($sl_facebook); ?>" class="topbar-icon" <?php echo $link_in_new_tab; ?>><i class="fa fa-facebook"></i></a></li>
            <?php endif; ?>
            <?php $sl_google = get_theme_mod('social_link_google'); if(!empty($sl_google)): ?>
            <li><a href="<?php echo esc_url($sl_google); ?>" class="topbar-icon" <?php echo $link_in_new_tab; ?>><i class="fa fa-google-plus"></i></a></li>
            <?php endif; ?>
            <?php $sl_youtube = get_theme_mod('social_link_youtube'); if(!empty($sl_youtube)): ?>
            <li><a href="<?php echo esc_url($sl_youtube); ?>" class="topbar-icon" <?php echo $link_in_new_tab; ?>><i class="fa fa-youtube"></i></a></li>
            <?php endif; ?>
            <?php $sl_twitter = get_theme_mod('social_link_twitter'); if(!empty($sl_twitter)): ?>
            <li><a href="<?php echo esc_url($sl_twitter); ?>" class="topbar-icon" <?php echo $link_in_new_tab; ?>><i class="fa fa-twitter"></i></a></li>
            <?php endif; ?>
            <?php $sl_linkedin = get_theme_mod('social_link_linkedin'); if(!empty($sl_linkedin)): ?>
            <li><a href="<?php echo esc_url($sl_linkedin); ?>" class="topbar-icon" <?php echo $link_in_new_tab; ?>><i class="fa fa-linkedin"></i></a></li>
            <?php endif; ?>
        </ul>
    <?php
}

function cosmica_comment_form_fields($fields) {

    $fields['author'] = '<div class="form-group col-md-4"><label  for="name">' . __('NAME', 'cosmica') . ':</label><input type="text" class="form-control" id="name" name="author" placeholder="' . esc_attr__('Full Name', 'cosmica') . '"></div>';
    $fields['email']  = '<div class="form-group col-md-4"><label for="email">' . __('EMAIL', 'cosmica') . ':</label><input type="email" class="form-control" id="email" name="email" placeholder="' . esc_attr__('Your Email Address', 'cosmica') . '"></div>';
    $fields['url']    = '<div class="form-group col-md-4"><label  for="url">' . __('WEBSITE', 'cosmica') . ':</label><input type="text" class="form-control" id="url" name="url" placeholder="' . esc_attr__('Website', 'cosmica') . '"></div>';
    return $fields;
}
add_filter('comment_form_fields', 'cosmica_comment_form_fields');

function cosmica_comment_form_defaults($defaults) {
    $defaults['submit_field']   = '<div class="form-group col-md-4">%1$s %2$s</div>';
    $defaults['comment_field']  = '<div class="form-group col-md-12"><label  for="message">' . __('COMMENT', 'cosmica') . ':</label><textarea class="form-control" rows="5" id="comment" name="comment" placeholder="' . esc_attr__('Message', 'cosmica') . '"></textarea></div>';
    $defaults['title_reply_to'] = __('Post Your Reply Here To %s', 'cosmica');
    $defaults['class_submit']   = 'btn';
    $defaults['label_submit']   = __('SUBMIT COMMENT', 'cosmica');
    $defaults['title_reply']    = '<h2>' . __('Post Your Comment Here', 'cosmica') . '</h2>';
    $defaults['role_form']      = 'form';
    return $defaults;

}
add_filter('comment_form_defaults', 'cosmica_comment_form_defaults');

function cosmica_comments($comment, $args, $depth) {
    // get theme data.
    global $comment_data;
    // translations.
    $leave_reply = $comment_data['translation_reply_to_coment'] ? $comment_data['translation_reply_to_coment'] : __('Reply', 'cosmica');?>
        <div class="col-xs-12 border comment">
            <div class="col-xs-2 avatar-container">
            <?php echo get_avatar($comment, $size = '80'); ?>
            </div>
            <div class="col-xs-10">
                <h4><?php comment_author();?></h4>
                <time>
                <?php 
                    if (('d M  y') == get_option('date_format')):  
                        comment_date('F j, Y');
                    else: 
                        comment_date();
                    endif;
                    _e(' at ', 'cosmica');
                    comment_time('g:i a');
                ?>
                </time>
                <div class="comment-text"><?php comment_text();?></div>
                <?php comment_reply_link(array_merge($args, array('reply_text' => $leave_reply, 'depth' => $depth, 'max_depth' => $args['max_depth'])))?>
                <?php if ($comment->comment_approved == '0'): ?>
                    <em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'cosmica');?></em>
                    <br/>
                <?php endif;?>
            </div>
        </div>
        <?php
}

function cosmica_sanitize_text($str) {
    return sanitize_text_field($str);
}

function business_prime_register_required_plugins() {

    $plugins = array(
        // This is an example of how to include a plugin bundled with a theme.
        // This is an example of how to include a plugin from the WordPress Plugin Repository.
        array(
            'name'      => 'Kirki',
            'slug'      => 'kirki',
            'required'  => false,
        ),
        array(
            'name'      => 'Cosmica Advance Sections',
            'slug'      => 'cosmica-advance-sections',
            'required'  => false,
        ),
    );
    /*
     * Array of configuration settings. Amend each line as needed.
     *
     * TGMPA will start providing localized text strings soon. If you already have translations of our standard
     * strings available, please help us make TGMPA even better by giving us access to these translations or by
     * sending in a pull-request with .po file(s) with the translations.
     *
     * Only uncomment the strings in the config array if you want to customize the strings.
     */
    $config = array(
        'id'           => 'cosmica',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to bundled plugins.
        'menu'         => 'cosmica-install-plugins', // Menu slug.
        'parent_slug'  => 'themes.php',            // Parent menu slug.
        'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
    );
    tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'business_prime_register_required_plugins' );

require_once get_template_directory() . '/includes/cosmica-sanitize-cb.php';
require_once get_template_directory() . '/includes/cosmica-customizer.php';
require_once get_template_directory() . '/includes/cosmica-walker.php';
require_once get_template_directory() . '/includes/class-tgm-plugin-activation.php';
require_once get_template_directory() . '/includes/include-kirki.php';
require_once get_template_directory() . '/includes/kirki-config.php';
require_once get_template_directory() . '/includes/admin/welcome-screen/welcome-screen.php';