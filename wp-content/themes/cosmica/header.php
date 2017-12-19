<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<?php wp_head(); ?>		
	</head>
<body <?php body_class(); ?>>
<div class="wrapper">		
	<header id="header" class="header-type-three">
		<div id="top-bar">
			<div class="container clearfix">
				<div id="top-bar-phone" class="topbar-item  left-icon contact-phone-left">
					<?php $contact_phone= get_theme_mod('contact_phone'); if(!empty($contact_phone)): ?>
					<a class="contact-phone topbar-icon" href="callto:<?php echo esc_attr($contact_phone); ?>"> <i class="fa fa-phone"></i> <?php echo esc_html($contact_phone); ?> </a>
					<?php endif; ?>
				</div>
				<div id="top-bar-email" class="topbar-item left-icon contact-email-left">
					<?php $contact_email= get_theme_mod('contact_email'); if(!empty($contact_email)): ?>
					<a class="contact-email topbar-icon" href="mailto:<?php echo esc_attr($contact_email);; ?>"> <i class="fa fa-envelope"></i> <?php echo esc_html($contact_email); ?> </a>
					<?php endif; ?>
				</div>
				<div id="top-bar-socials" class="topbar-item topbar-icon-right">
					<?php cosmica_social_links();  ?>
				</div>
			</div>
		</div>
		<!-- Menu -->
		<nav class="navbar navbar-default cs-menu">
			<div class="container">
				<div class="row cs-menu-head">
					<div class="col-md-3 col-sm-12 navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#CS-Navbar">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>                        
						</button>
						<div class="site-branding">
						  	<?php
								if ( function_exists( 'the_custom_logo' ) && function_exists( 'has_custom_logo' ) && has_custom_logo()) :
									
									if ( is_front_page() && is_home() ) : ?>
										<h1 class="site-title"><?php the_custom_logo();?></h1>
									<?php else : ?>
										<p class="site-title"><?php the_custom_logo();?></a></p>
									<?php
									endif;
								else :
									if ( is_front_page() && is_home() ) : ?>
										<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
									<?php else : ?>
										<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
									<?php
									endif;
									$description = get_bloginfo( 'description', 'display' );
									if ( $description || is_customize_preview() ) : ?>
										<p class="site-description"><?php echo $description; ?></p>
									<?php
									endif; 
								endif;
							?>
						</div><!-- .site-branding -->
					</div>
					<?php 
						$args = array(
						                'theme_location'    => 'primary_menu',
						                'depth'             =>  0,
						                'container'         => 'div',
						                'container_class'   => 'collapse navbar-collapse',
						        		'container_id'      => 'CS-Navbar',
						        		'menu_id'			=> 'primary_menu',
						                'menu_class'        => 'nav navbar-nav navbar-right',
						                'fallback_cb'       => 'cosmica_fallback_page_menu',
						                'walker'            => new cosmica_nav_walker()
						      );
						wp_nav_menu($args);
					?>
				</div>
			</div>
		</nav>
		<!-- Menu -->
	</header>
	<div id="main">