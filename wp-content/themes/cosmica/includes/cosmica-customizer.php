<?php

function cosmica_upgrade_control($wp_customize) {

	$wp_customize->add_section('cosmica_theme_info_section', array(
		'title'    => __('Cosmica Info', 'cosmica'),
		'priority' => 1,
	));

	$wp_customize->add_setting('cosmica_review', array(
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'cosmica_sanitize_html',
	));
	
	$wp_customize->add_control(new Cosmica_Review_Customize_Control($wp_customize, 'cosmica_review', array(
		'label'   => __('REVIEW', 'cosmica'),
		'section' => 'cosmica_theme_info_section',
		'setting' => 'cosmica_review',
	)));

	$wp_customize->add_setting('cosmica_info_button', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'business_prime_sanitize_html',
	));

	$wp_customize->add_control(new Cosmica_Info_Text($wp_customize, 'cosmica_info_button',
		array(
			'description' => sprintf('<a href="%s" class="button button-default button-cosmica-info">%s</a>', self_admin_url('themes.php?page=cosmica-welcome'), __('Cosmica Info', 'cosmica')),
			'priority' => 1,
			'section'  => 'cosmica_theme_info_section',
	)));

	$wp_customize->add_setting('cosmica_page_setup', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'business_prime_sanitize_html',
	));

	$wp_customize->add_control(new Cosmica_Info_Text($wp_customize, 'cosmica_page_setup',
		array(
			'label'    => __('Front Page/Blog page Setup', 'cosmica'),
			'description' => __('Go To Appearance -> Customize -> Static Front Page -> Front page displays set it to "A static page". <br> if you have not created pages with name <strong> "Home or Front Page" </strong> and <strong> "Blog" </strong> you may create in customizer by clicking <div><strong>"+ Add New Page"</strong></div> in "Static Front Page" section <br> <strong> <br> 1. For Front Page select Home or Front Page . <br> 2. For Posts Page select Blog.</strong> <br> <a class="cosmica_go_to_section" href="#accordion-section-static_front_page"> Switch To "A Static Page"</a>', 'cosmica'),
			'priority' => 1,
			'section'  => 'cosmica_theme_info_section',
	)));

	$wp_customize->add_setting('cosmica_page_setup_2', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'business_prime_sanitize_html',
	));

	$wp_customize->add_control(new Cosmica_Info_Text($wp_customize, 'cosmica_page_setup_2',
		array(
			'label'    => __('Front Page/Blog page Setup', 'cosmica'),
			'description' => __('"Front page displays" set it to "A static page". <br> if you have not created pages with name <strong> "Home or Front Page" </strong> and <strong> "Blog" </strong> you may create in customizer by clicking <div><strong>"+ Add New Page"</strong></div>  <strong> <br> 1. For Front Page select Home or Front Page . <br> 2. For Posts Page select Blog.</strong>', 'cosmica'),
			'priority' => 1,
			'section'  => 'static_front_page',
	)));
}

function cosmica_customize_register($wp_customize) {

	$wp_customize->add_panel('cosmica_homepage_settings', array(
		'priority'    => 5,
		'title'       => __('Home Page Settings', 'cosmica'),
		'description' => __('Home Page Settings', 'cosmica'),
	));

	



	$wp_customize->add_panel('cosmica_social_settings', array(
		'priority'    => 10,
		'capability'  => 'edit_theme_options',
		'title'       => __('Social/Contact Settings', 'cosmica'),
	));

	$wp_customize->add_section('cosmica_social_section', array(
		'title'      => __('Cosmica Social', 'cosmica'),
		'priority'   => 1,
		'capability' => 'edit_theme_options',
		'panel'      => 'cosmica_social_settings',
	));
	$wp_customize->add_setting('social_link_open_in_new_tab',
		array(
			'default'           => true,
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'cosmica_sanitize_checkbox',
		)
	);

	$wp_customize->add_control('social_link_open_in_new_tab', array(
		'type'     => 'checkbox',
		'priority' => 200,
		'section'  => 'cosmica_social_section',
		'label'    => __('Open social links in new tab', 'cosmica'),
	));

	$wp_customize->add_setting('social_link_facebook',
		array(
			'default'           => esc_url('#'),
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'cosmica_sanitize_url',
		)
	);

	$wp_customize->add_control('social_link_facebook', array(
		'type'     => 'url',
		'priority' => 200,
		'section'  => 'cosmica_social_section',
		'label'    => __('Facebook Page URL', 'cosmica'),
	));

	$wp_customize->add_setting('social_link_google',
		array(
			'default'           => esc_url('#'),
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'cosmica_sanitize_url',
		)
	);

	$wp_customize->add_control('social_link_google', array(
		'type'     => 'url',
		'priority' => 200,
		'section'  => 'cosmica_social_section',
		'label'    => __('Google Page URL', 'cosmica'),
	));

	$wp_customize->add_setting('social_link_youtube',
		array(
			'default'           => esc_url('#'),
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'cosmica_sanitize_url',
		)
	);

	$wp_customize->add_control('social_link_youtube', array(
		'type'     => 'url',
		'priority' => 200,
		'section'  => 'cosmica_social_section',
		'label'    => __('Youtube Page URL', 'cosmica'),
	));

	$wp_customize->add_setting('social_link_twitter',
		array(
			'default'           => esc_url('#'),
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'cosmica_sanitize_url',
		)
	);

	$wp_customize->add_control('social_link_twitter', array(
		'type'     => 'url',
		'priority' => 200,
		'section'  => 'cosmica_social_section',
		'label'    => __('Twitter Page URL', 'cosmica'),
	));

	$wp_customize->add_setting('social_link_linkedin',
		array(
			'default'           => esc_url('#'),
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'cosmica_sanitize_url',
		)
	);

	$wp_customize->add_control('social_link_linkedin', array(
		'type'     => 'url',
		'priority' => 200,
		'section'  => 'cosmica_social_section',
		'label'    => __('Linkedin Page URL', 'cosmica'),
	));

	$wp_customize->add_section('cosmica_contact_section',
		array(
			'title'       => __('Contact Settings', 'cosmica'),
			'priority'    => 200,
			'capability'  => 'edit_theme_options',
			'description' => __('Allows you to add contact email and phone number', 'cosmica'),
			'panel'       => 'cosmica_social_settings',
		));

	$wp_customize->add_setting('contact_email',
		array(
			'default'           => 'mail@example.com',
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'cosmica_sanitize_email',
		)
	);

	$wp_customize->add_control('contact_email', array(
		'type'     => 'text',
		'priority' => 200,
		'section'  => 'cosmica_contact_section',
		'label'    => __('Enter Email', 'cosmica'),
	));

	$wp_customize->add_setting('contact_phone',
		array(
			'default'           => '000-000-0000',
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'cosmica_sanitize_text',
		));

	$wp_customize->add_control('contact_phone', array(
		'type'     => 'text',
		'priority' => 200,
		'section'  => 'cosmica_contact_section',
		'label'    => __('Enter Phone Number', 'cosmica'),
	));

	$wp_customize->add_section(new Cosmica_Upsale_Section_Control($wp_customize, 'cosmica-upsell-section', array(
		'priority' => 2,
		'title'    => __('UPGRADE TO PRO', 'cosmica'),
		'pro_text' => __('Go Pro', 'cosmica'),
		'pro_url'  => 'https://www.codeins.org/themes/cosmica-responsive-wordpress-theme/',
	)));

	$wp_customize->get_section('title_tagline')->priority     = 10;
	$wp_customize->get_section('static_front_page')->priority = 30;
	$wp_customize->get_section('header_image')->priority      = 50;

}


if (class_exists('WP_Customize_Control')) {
		if(!class_exists('Cosmica_Customize_Heading')){
		class Cosmica_Customize_Heading extends WP_Customize_Control {
			public $type = 'heading';

			public function render_content() {
				if (!empty($this->label)): ?>
				    <h3 class="cosmica-accordion-section-title"><?php echo esc_html($this->label); ?></h3>
				<?php endif;
				if ($this->description): ?>
		        <span class="description customize-control-description">
		        <?php echo wp_kses_post($this->description); ?>
		        </span>
	      		<?php endif;
			}
		}
		}

		if(!class_exists('Cosmica_Info_Text')){
		class Cosmica_Info_Text extends WP_Customize_Control {

			public function render_content() {
			?>
	        	<span class="customize-control-title">
	        		<?php echo esc_html($this->label); ?>
	      		</span>

		      <?php if ($this->description): ?>
		        <span class="description customize-control-description">
		        <?php echo wp_kses_post($this->description); ?>
		        </span>
		      <?php endif;
			}

		}
		}

		if(!class_exists('Cosmica_On_Off_Control')){
		class Cosmica_On_Off_Control extends WP_Customize_Control {
			public $type    = 'switch';
			public $options = array();

			public function __construct($manager, $id, $args = array()) {
				$this->options = isset($args['options']) ? $args['options'] : array('on' => 'ON', 'off' => 'OFF');
				parent::__construct($manager, $id, $args);
			}

			public function render_content() {
				?>
	            <label>
	                  <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
	                  <?php if ($this->description): ?>
			            <span class="description customize-control-description">
			            <?php echo wp_kses_post($this->description); ?>
			            </span>
	          		<?php endif;?>
	          <?php
					$switch_class = ($this->value() == 'on') ? 'switch-on' : '';
					$options      = $this->options;
				?>
		        	<div class="onoffswitch <?php echo esc_attr($switch_class); ?>">
		            	<div class="onoffswitch-inner">
		            		<div class="onoffswitch-active">
		                		<div class="onoffswitch-switch"><?php echo esc_html($options['on']) ?></div>
		              		</div>
		              		<div class="onoffswitch-inactive">
		                		<div class="onoffswitch-switch"><?php echo esc_html($options['off']) ?></div>
		              		</div>
		           		</div>
		          	</div>
		            <input <?php $this->link();?> type="hidden" value="<?php echo esc_attr($this->value()); ?>" class="cosmica-switch">
		        </label>
	            <?php
			}
		}
		}

		if (!function_exists('cosmica_font_awesome_icon_array')) {
		function cosmica_font_awesome_icon_array() {
			return array("fa fa-glass", "fa fa-music", "fa fa-search", "fa fa-envelope-o", "fa fa-heart", "fa fa-star", "fa fa-star-o", "fa fa-user", "fa fa-film", "fa fa-th-large", "fa fa-th", "fa fa-th-list", "fa fa-check", "fa fa-remove", "fa fa-close", "fa fa-times", "fa fa-search-plus", "fa fa-search-minus", "fa fa-power-off", "fa fa-signal", "fa fa-gear", "fa fa-cog", "fa fa-trash-o", "fa fa-home", "fa fa-file-o", "fa fa-clock-o", "fa fa-road", "fa fa-download", "fa fa-arrow-circle-o-down", "fa fa-arrow-circle-o-up", "fa fa-inbox", "fa fa-play-circle-o", "fa fa-rotate-right", "fa fa-repeat", "fa fa-refresh", "fa fa-list-alt", "fa fa-lock", "fa fa-flag", "fa fa-headphones", "fa fa-volume-off", "fa fa-volume-down", "fa fa-volume-up", "fa fa-qrcode", "fa fa-barcode", "fa fa-tag", "fa fa-tags", "fa fa-book", "fa fa-bookmark", "fa fa-print", "fa fa-camera", "fa fa-font", "fa fa-bold", "fa fa-italic", "fa fa-text-height", "fa fa-text-width", "fa fa-align-left", "fa fa-align-center", "fa fa-align-right", "fa fa-align-justify", "fa fa-list", "fa fa-dedent", "fa fa-outdent", "fa fa-indent", "fa fa-video-camera", "fa fa-photo", "fa fa-image", "fa fa-picture-o", "fa fa-pencil", "fa fa-map-marker", "fa fa-adjust", "fa fa-tint", "fa fa-edit", "fa fa-pencil-square-o", "fa fa-share-square-o", "fa fa-check-square-o", "fa fa-arrows", "fa fa-step-backward", "fa fa-fast-backward", "fa fa-backward", "fa fa-play", "fa fa-pause", "fa fa-stop", "fa fa-forward", "fa fa-fast-forward", "fa fa-step-forward", "fa fa-eject", "fa fa-chevron-left", "fa fa-chevron-right", "fa fa-plus-circle", "fa fa-minus-circle", "fa fa-times-circle", "fa fa-check-circle", "fa fa-question-circle", "fa fa-info-circle", "fa fa-crosshairs", "fa fa-times-circle-o", "fa fa-check-circle-o", "fa fa-ban", "fa fa-arrow-left", "fa fa-arrow-right", "fa fa-arrow-up", "fa fa-arrow-down", "fa fa-mail-forward", "fa fa-share", "fa fa-expand", "fa fa-compress", "fa fa-plus", "fa fa-minus", "fa fa-asterisk", "fa fa-exclamation-circle", "fa fa-gift", "fa fa-leaf", "fa fa-fire", "fa fa-eye", "fa fa-eye-slash", "fa fa-warning", "fa fa-exclamation-triangle", "fa fa-plane", "fa fa-calendar", "fa fa-random", "fa fa-comment", "fa fa-magnet", "fa fa-chevron-up", "fa fa-chevron-down", "fa fa-retweet", "fa fa-shopping-cart", "fa fa-folder", "fa fa-folder-open", "fa fa-arrows-v", "fa fa-arrows-h", "fa fa-bar-chart-o", "fa fa-bar-chart", "fa fa-twitter-square", "fa fa-facebook-square", "fa fa-camera-retro", "fa fa-key", "fa fa-gears", "fa fa-cogs", "fa fa-comments", "fa fa-thumbs-o-up", "fa fa-thumbs-o-down", "fa fa-star-half", "fa fa-heart-o", "fa fa-sign-out", "fa fa-linkedin-square", "fa fa-thumb-tack", "fa fa-external-link", "fa fa-sign-in", "fa fa-trophy", "fa fa-github-square", "fa fa-upload", "fa fa-lemon-o", "fa fa-phone", "fa fa-square-o", "fa fa-bookmark-o", "fa fa-phone-square", "fa fa-twitter", "fa fa-facebook-f", "fa fa-facebook", "fa fa-github", "fa fa-unlock", "fa fa-credit-card", "fa fa-feed", "fa fa-rss", "fa fa-hdd-o", "fa fa-bullhorn", "fa fa-bell", "fa fa-certificate", "fa fa-hand-o-right", "fa fa-hand-o-left", "fa fa-hand-o-up", "fa fa-hand-o-down", "fa fa-arrow-circle-left", "fa fa-arrow-circle-right", "fa fa-arrow-circle-up", "fa fa-arrow-circle-down", "fa fa-globe", "fa fa-wrench", "fa fa-tasks", "fa fa-filter", "fa fa-briefcase", "fa fa-arrows-alt", "fa fa-group", "fa fa-users", "fa fa-chain", "fa fa-link", "fa fa-cloud", "fa fa-flask", "fa fa-cut", "fa fa-scissors", "fa fa-copy", "fa fa-files-o", "fa fa-paperclip", "fa fa-save", "fa fa-floppy-o", "fa fa-square", "fa fa-navicon", "fa fa-reorder", "fa fa-bars", "fa fa-list-ul", "fa fa-list-ol", "fa fa-strikethrough", "fa fa-underline", "fa fa-table", "fa fa-magic", "fa fa-truck", "fa fa-pinterest", "fa fa-pinterest-square", "fa fa-google-plus-square", "fa fa-google-plus", "fa fa-money", "fa fa-caret-down", "fa fa-caret-up", "fa fa-caret-left", "fa fa-caret-right", "fa fa-columns", "fa fa-unsorted", "fa fa-sort", "fa fa-sort-down", "fa fa-sort-desc", "fa fa-sort-up", "fa fa-sort-asc", "fa fa-envelope", "fa fa-linkedin", "fa fa-rotate-left", "fa fa-undo", "fa fa-legal", "fa fa-gavel", "fa fa-dashboard", "fa fa-tachometer", "fa fa-comment-o", "fa fa-comments-o", "fa fa-flash", "fa fa-bolt", "fa fa-sitemap", "fa fa-umbrella", "fa fa-paste", "fa fa-clipboard", "fa fa-lightbulb-o", "fa fa-exchange", "fa fa-cloud-download", "fa fa-cloud-upload", "fa fa-user-md", "fa fa-stethoscope", "fa fa-suitcase", "fa fa-bell-o", "fa fa-coffee", "fa fa-cutlery", "fa fa-file-text-o", "fa fa-building-o", "fa fa-hospital-o", "fa fa-ambulance", "fa fa-medkit", "fa fa-fighter-jet", "fa fa-beer", "fa fa-h-square", "fa fa-plus-square", "fa fa-angle-double-left", "fa fa-angle-double-right", "fa fa-angle-double-up", "fa fa-angle-double-down", "fa fa-angle-left", "fa fa-angle-right", "fa fa-angle-up", "fa fa-angle-down", "fa fa-desktop", "fa fa-laptop", "fa fa-tablet", "fa fa-mobile-phone", "fa fa-mobile", "fa fa-circle-o", "fa fa-quote-left", "fa fa-quote-right", "fa fa-spinner", "fa fa-circle", "fa fa-mail-reply", "fa fa-reply", "fa fa-github-alt", "fa fa-folder-o", "fa fa-folder-open-o", "fa fa-smile-o", "fa fa-frown-o", "fa fa-meh-o", "fa fa-gamepad", "fa fa-keyboard-o", "fa fa-flag-o", "fa fa-flag-checkered", "fa fa-terminal", "fa fa-code", "fa fa-mail-reply-all", "fa fa-reply-all", "fa fa-star-half-empty", "fa fa-star-half-full", "fa fa-star-half-o", "fa fa-location-arrow", "fa fa-crop", "fa fa-code-fork", "fa fa-unlink", "fa fa-chain-broken", "fa fa-question", "fa fa-info", "fa fa-exclamation", "fa fa-superscript", "fa fa-subscript", "fa fa-eraser", "fa fa-puzzle-piece", "fa fa-microphone", "fa fa-microphone-slash", "fa fa-shield", "fa fa-calendar-o", "fa fa-fire-extinguisher", "fa fa-rocket", "fa fa-maxcdn", "fa fa-chevron-circle-left", "fa fa-chevron-circle-right", "fa fa-chevron-circle-up", "fa fa-chevron-circle-down", "fa fa-html5", "fa fa-css3", "fa fa-anchor", "fa fa-unlock-alt", "fa fa-bullseye", "fa fa-ellipsis-h", "fa fa-ellipsis-v", "fa fa-rss-square", "fa fa-play-circle", "fa fa-ticket", "fa fa-minus-square", "fa fa-minus-square-o", "fa fa-level-up", "fa fa-level-down", "fa fa-check-square", "fa fa-pencil-square", "fa fa-external-link-square", "fa fa-share-square", "fa fa-compass", "fa fa-toggle-down", "fa fa-caret-square-o-down", "fa fa-toggle-up", "fa fa-caret-square-o-up", "fa fa-toggle-right", "fa fa-caret-square-o-right", "fa fa-euro", "fa fa-eur", "fa fa-gbp", "fa fa-dollar", "fa fa-usd", "fa fa-rupee", "fa fa-inr", "fa fa-cny", "fa fa-rmb", "fa fa-yen", "fa fa-jpy", "fa fa-ruble", "fa fa-rouble", "fa fa-rub", "fa fa-won", "fa fa-krw", "fa fa-bitcoin", "fa fa-btc", "fa fa-file", "fa fa-file-text", "fa fa-sort-alpha-asc", "fa fa-sort-alpha-desc", "fa fa-sort-amount-asc", "fa fa-sort-amount-desc", "fa fa-sort-numeric-asc", "fa fa-sort-numeric-desc", "fa fa-thumbs-up", "fa fa-thumbs-down", "fa fa-youtube-square", "fa fa-youtube", "fa fa-xing", "fa fa-xing-square", "fa fa-youtube-play", "fa fa-dropbox", "fa fa-stack-overflow", "fa fa-instagram", "fa fa-flickr", "fa fa-adn", "fa fa-bitbucket", "fa fa-bitbucket-square", "fa fa-tumblr", "fa fa-tumblr-square", "fa fa-long-arrow-down", "fa fa-long-arrow-up", "fa fa-long-arrow-left", "fa fa-long-arrow-right", "fa fa-apple", "fa fa-windows", "fa fa-android", "fa fa-linux", "fa fa-dribbble", "fa fa-skype", "fa fa-foursquare", "fa fa-trello", "fa fa-female", "fa fa-male", "fa fa-gittip", "fa fa-gratipay", "fa fa-sun-o", "fa fa-moon-o", "fa fa-archive", "fa fa-bug", "fa fa-vk", "fa fa-weibo", "fa fa-renren", "fa fa-pagelines", "fa fa-stack-exchange", "fa fa-arrow-circle-o-right", "fa fa-arrow-circle-o-left", "fa fa-toggle-left", "fa fa-caret-square-o-left", "fa fa-dot-circle-o", "fa fa-wheelchair", "fa fa-vimeo-square", "fa fa-turkish-lira", "fa fa-try", "fa fa-plus-square-o", "fa fa-space-shuttle", "fa fa-slack", "fa fa-envelope-square", "fa fa-wordpress", "fa fa-openid", "fa fa-institution", "fa fa-bank", "fa fa-university", "fa fa-mortar-board", "fa fa-graduation-cap", "fa fa-yahoo", "fa fa-google", "fa fa-reddit", "fa fa-reddit-square", "fa fa-stumbleupon-circle", "fa fa-stumbleupon", "fa fa-delicious", "fa fa-digg", "fa fa-pied-piper-pp", "fa fa-pied-piper-alt", "fa fa-drupal", "fa fa-joomla", "fa fa-language", "fa fa-fax", "fa fa-building", "fa fa-child", "fa fa-paw", "fa fa-spoon", "fa fa-cube", "fa fa-cubes", "fa fa-behance", "fa fa-behance-square", "fa fa-steam", "fa fa-steam-square", "fa fa-recycle", "fa fa-automobile", "fa fa-car", "fa fa-cab", "fa fa-taxi", "fa fa-tree", "fa fa-spotify", "fa fa-deviantart", "fa fa-soundcloud", "fa fa-database", "fa fa-file-pdf-o", "fa fa-file-word-o", "fa fa-file-excel-o", "fa fa-file-powerpoint-o", "fa fa-file-photo-o", "fa fa-file-picture-o", "fa fa-file-image-o", "fa fa-file-zip-o", "fa fa-file-archive-o", "fa fa-file-sound-o", "fa fa-file-audio-o", "fa fa-file-movie-o", "fa fa-file-video-o", "fa fa-file-code-o", "fa fa-vine", "fa fa-codepen", "fa fa-jsfiddle", "fa fa-life-bouy", "fa fa-life-buoy", "fa fa-life-saver", "fa fa-support", "fa fa-life-ring", "fa fa-circle-o-notch", "fa fa-ra", "fa fa-resistance", "fa fa-rebel", "fa fa-ge", "fa fa-empire", "fa fa-git-square", "fa fa-git", "fa fa-y-combinator-square", "fa fa-yc-square", "fa fa-hacker-news", "fa fa-tencent-weibo", "fa fa-qq", "fa fa-wechat", "fa fa-weixin", "fa fa-send", "fa fa-paper-plane", "fa fa-send-o", "fa fa-paper-plane-o", "fa fa-history", "fa fa-circle-thin", "fa fa-header", "fa fa-paragraph", "fa fa-sliders", "fa fa-share-alt", "fa fa-share-alt-square", "fa fa-bomb", "fa fa-soccer-ball-o", "fa fa-futbol-o", "fa fa-tty", "fa fa-binoculars", "fa fa-plug", "fa fa-slideshare", "fa fa-twitch", "fa fa-yelp", "fa fa-newspaper-o", "fa fa-wifi", "fa fa-calculator", "fa fa-paypal", "fa fa-google-wallet", "fa fa-cc-visa", "fa fa-cc-mastercard", "fa fa-cc-discover", "fa fa-cc-amex", "fa fa-cc-paypal", "fa fa-cc-stripe", "fa fa-bell-slash", "fa fa-bell-slash-o", "fa fa-trash", "fa fa-copyright", "fa fa-at", "fa fa-eyedropper", "fa fa-paint-brush", "fa fa-birthday-cake", "fa fa-area-chart", "fa fa-pie-chart", "fa fa-line-chart", "fa fa-lastfm", "fa fa-lastfm-square", "fa fa-toggle-off", "fa fa-toggle-on", "fa fa-bicycle", "fa fa-bus", "fa fa-ioxhost", "fa fa-angellist", "fa fa-cc", "fa fa-shekel", "fa fa-sheqel", "fa fa-ils", "fa fa-meanpath", "fa fa-buysellads", "fa fa-connectdevelop", "fa fa-dashcube", "fa fa-forumbee", "fa fa-leanpub", "fa fa-sellsy", "fa fa-shirtsinbulk", "fa fa-simplybuilt", "fa fa-skyatlas", "fa fa-cart-plus", "fa fa-cart-arrow-down", "fa fa-diamond", "fa fa-ship", "fa fa-user-secret", "fa fa-motorcycle", "fa fa-street-view", "fa fa-heartbeat", "fa fa-venus", "fa fa-mars", "fa fa-mercury", "fa fa-intersex", "fa fa-transgender", "fa fa-transgender-alt", "fa fa-venus-double", "fa fa-mars-double", "fa fa-venus-mars", "fa fa-mars-stroke", "fa fa-mars-stroke-v", "fa fa-mars-stroke-h", "fa fa-neuter", "fa fa-genderless", "fa fa-facebook-official", "fa fa-pinterest-p", "fa fa-whatsapp", "fa fa-server", "fa fa-user-plus", "fa fa-user-times", "fa fa-hotel", "fa fa-bed", "fa fa-viacoin", "fa fa-train", "fa fa-subway", "fa fa-medium");
		}
		}

		if(!class_exists('Cosmica_Fontawesome_Icon_Chooser')){
		class Cosmica_Fontawesome_Icon_Chooser extends WP_Customize_Control {
			public $type = 'cosmica-icon';

			public function render_content() {
			?>
	        <label>
	            <span class="customize-control-title">
	            <?php echo esc_html($this->label); ?>
	            </span>

	            <?php if ($this->description) {?>
	          	<span class="description customize-control-description">
	            	<?php echo wp_kses_post($this->description); ?>
	         	</span>
	          	<?php }?>
	            <div class="cosmica-selected-icon">
	              <i class="fa <?php echo esc_attr($this->value()); ?>"></i>
	              <span><i class="fa fa-angle-down"></i></span>
	            </div>

	            <ul class="cosmica-icon-list clearfix">
	                <?php
						$font_awesome_icon_array = cosmica_font_awesome_icon_array();
						foreach ($font_awesome_icon_array as $font_awesome_icon) {
							$icon_class = $this->value() == $font_awesome_icon ? 'icon-active' : '';
							echo '<li class=' . $icon_class . '><i class="' . $font_awesome_icon . '"></i></li>';
						}
					?>
	            </ul>
	            <input type="hidden" value="<?php $this->value();?>" <?php $this->link();?> />
	        </label>
		    <?php
			}
		}
		}
		
		if(!class_exists('Cosmica_Upsale_Section_Control')){
		class Cosmica_Upsale_Section_Control extends WP_Customize_Section {
			public $type = 'cosmica-upsell';
			public $pro_text = '';
			public $pro_url = '';
			public function render() {
				?>
			    <li id="accordion-section-<?php echo esc_attr($this->id); ?>" class="accordion-section control-section cannot-expand <?php echo esc_attr('control-section-' . $this->type); ?>" style="display: block;">
			        <h3 class="accordion-section-title cosmica-upsale">
			        	<?php echo esc_html($this->title); ?>
			        	<?php if($this->pro_text && $this->pro_url): ?>
			          	<a href="<?php echo esc_url($this->pro_url); ?>" target="_blank" class="theme-upsale-button button button-secondary alignright" id="cosmica-pro-button"><?php echo esc_html($this->pro_text); ?></a>
			          	<?php endif; ?>
			        </h3>
			    </li>
			    <?php
			}

		}
		}

		if(!class_exists('Cosmica_Pro_Customize_Control')){
		class Cosmica_Pro_Customize_Control extends WP_Customize_Control {

			public function render_content() {
				?>
	            <div class="cosmica-pro">
	              <a href="<?php echo esc_url('https://codeins.org/themes/cosmica-responsive-wordpress-theme/'); ?>" target="_blank" class="cdns-upgrade" id="cdns-upgrade-pro"><?php _e('UPGRADE  TO PRO ', 'cosmica');?></a>
	            </div>
	            <div class="pro-vesrion">
	             <?php _e('The Pro Version gives you more opportunities to enhance your site and business. In order to create effective online presence one have to showcase their wide range of products, have to use contact us enquiry form, have to make effective about us page, have to introduce team members, etc etc . The pro version will give it all. Buy the pro version and give us a chance to serve you better. ', 'cosmica');?>
	            </div>
	          <?php
			}
		}
		}

		if(!class_exists('Cosmica_Review_Customize_Control')){
		class Cosmica_Review_Customize_Control extends WP_Customize_Control {

			public function render_content() {
				?>
	            <div class="cosmica-pro">
	             	<a href="<?php echo esc_url('https://wordpress.org/support/theme/cosmica/reviews/?filter=5'); ?>" target="_blank" class="cdns-upgrade" id="cdns-reviwe"><?php _e('LIKE COSMICA..?  GIVE US 5 STAR', 'cosmica');?></a>
	            </div>

	          <?php
			}
		}
		}

		if(!class_exists('Cosmica_Docs_Customize_Control')){
		class Cosmica_Docs_Customize_Control extends WP_Customize_Control {

			public function render_content() {
				?>
	            <div class="cosmica-pro">
	              <a href="<?php echo esc_url('https://www.codeins.org/documentation/'); ?>" target="_blank" class="cdns-upgrade" id="cdns-docs"><?php _e('DOCUMENTATION', 'cosmica');?></a>
	            </div>
	          <?php
			}
		}
		}
	}

add_action('customize_register', 'cosmica_customize_register');
add_action('customize_register', 'cosmica_upgrade_control');
?>
