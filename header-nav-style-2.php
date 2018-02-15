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

		<?php wp_head(); ?>

		<!-- Facebook Conversion Code for IntelliFlash Whiteboard -->
		<script>(function() {
		  var _fbq = window._fbq || (window._fbq = []);
		  if (!_fbq.loaded) {
		    var fbds = document.createElement('script');
		    fbds.async = true;
		    fbds.src = '//connect.facebook.net/en_US/fbds.js';
		    var s = document.getElementsByTagName('script')[0];
		    s.parentNode.insertBefore(fbds, s);
		    _fbq.loaded = true;
		  }
		})();
		window._fbq = window._fbq || [];
		window._fbq.push(['track', '6023339442371', {'value':'0.00','currency':'USD'}]);
		</script>
		<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?ev=6023339442371&amp;cd[value]=0.00&amp;cd[currency]=USD&amp;noscript=1" /></noscript>
	</head>

	<body <?php body_class(); ?>>
		<!-- Google Tag Manager (noscript) -->
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T2C93LK"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->

			<!-- Drop Google Analytics here -->
			<!-- end analytics -->

	

	
		<div class="off-canvas-wrap" data-offcanvas>
			<div class="inner-wrap">
				<div id="container">
					<header class="header" role="banner">
							
						 <!-- This navs will be applied to the topbar, above all content 
							  To see additional nav styles, visit the /parts directory -->
						 <?php get_template_part( 'parts/nav', 'top-offcanvas-style-2' ); ?>
								 	
					</header> <!-- end .header -->
