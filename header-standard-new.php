<!doctype html>

  <html class="no-js"  <?php language_attributes(); ?>>

	<head>
		<meta charset="utf-8">

		<!-- Force IE to use the latest rendering engine available -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<?php
			$searchvisibility = get_field('search_visibility', $post->ID);
			if ($searchvisibility == 'No') {
			echo '<meta name="robots" content="noindex,noarchive,nofollow">
			<meta name="googlebot" content="noindex,noarchive,nofollow">
			<meta name="googlebot-news" content="noindex,noarchive,nofollow">
			<meta name="googlebot-image" content="noindex,noarchive,nofollow">
			<meta name="bingbot" content="noindex,noarchive,nofollow">
			<meta name="teoma" content="noindex,noarchive,nofollow">';
			}
			else {
			echo '<meta name="robots" content="index,follow">
			<meta name="googlebot" content="index,follow">
			<meta name="googlebot-news" content="index,follow">
			<meta name="googlebot-image" content="index,follow">
			<meta name="bingbot" content="index,follow">
			<meta name="teoma" content="index,follow">';
			}
		?>

		<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-T2C93LK');</script>
		<!-- End Google Tag Manager -->

		<!-- Might need to uncomment this if I broke something -->
		<!-- <title><?php wp_title('|', true, 'right'); ?></title> -->

		<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
			<!-- Icons & Favicons -->
			<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png?v=2">
			<link href="<?php echo get_template_directory_uri(); ?>/assets/images/apple-icon-touch.png" rel="apple-touch-icon" />
			<!--[if IE]>
				<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
			<![endif]-->
			<meta name="msapplication-TileColor" content="#f01d4f">
			<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/assets/images/win8-tile-icon.png">
	    		<meta name="theme-color" content="#121212">
	    	<?php } ?>

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<!-- !!! NEED TO CHANGE THIS TO BE SELECTABLE IN UI !!! -->
		<!-- Font Loading for Dell Landing Page -->

		<?php if(is_page('stairway-to-storage-heaven') /*|| is_page('homepage-vmworld-2016') || is_page('vip')*/) :?>
			<style>
				@font-face { font-family: ACDC; src: url('<?php echo get_template_directory_uri(); ?>/assets/fonts/squealer.ttf'); }
				@font-face { font-family: Zeppelin; src: url('<?php echo get_template_directory_uri(); ?>/assets/fonts/kashmir.ttf'); }
			</style>
		<?php else :?>
		<?php endif;?>

		<!-- END: Font Loading for Dell Landing Page -->

		<!-- Font Loading for VMworld 2016 -->

		<?php if(is_page('vmworld') || is_page('vip') || is_page('ignite')) :?>
			<link href='https://fonts.googleapis.com/css?family=Gloria+Hallelujah|Special+Elite' rel='stylesheet' type='text/css'>
		<?php else :?>
		<?php endif;?>

		<!-- END: Font Loading for VMworld 2016 -->

		<?php wp_head(); ?>
	</head>

	<?php

		// Simple fix for not all templates being in sync right now
		// Will clean up later

		$page_id = pathinfo(basename( get_page_template() ), PATHINFO_FILENAME);

		// d(get_page_template());

		if ($page_id == 'page') {
			$page_id = 'page-standard-new';
		}

	?>

	<body <?php echo 'id="' . $page_id . '"'; ?> <?php body_class(); ?>>

		<!-- Google Tag Manager (noscript) -->
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T2C93LK"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->

		<div class="off-canvas-wrap" data-offcanvas>
			<div class="inner-wrap">
				<div id="container">
					<header id="header" class="header" role="banner">

						 <!-- This navs will be applied to the topbar, above all content
							  To see additional nav styles, visit the /parts directory -->
						 <?php get_template_part( 'parts/nav', 'top-offcanvas-new' ); ?>

					</header> <!-- end .header -->
