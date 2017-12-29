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
		<title><?php wp_title('|', true, 'right'); ?></title>
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
		<!-- Google Tag Manager -->
		<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-PLTHCF"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-PLTHCF');</script>
		<!-- End Google Tag Manager -->

		<!-- OneTag Code Insert -->

		<!-- EXPORTED TAGS --> 

		<!-- Tags for Tegile OneTag --> 
		 
		<!-- One Tag Conditional Container: Tegile (5789) | Tegile OneTag (4238) -->

			<script type="text/javascript">
			var ft_onetag_4238 = {
				ft_vars:{
					"ftXRef":"",
					"ftXValue":"",
					"ftXType":"",
					"ftXName":"",
					"ftXNumItems":"",
					"ftXCurrency":"",
					"U1":"",
					"U2":"",
					"U3":"",
					"U4":"",
					"U5":"",
					"U6":"",
					"U7":"",
					"U8":"",
					"U9":"",
					"U10":"",
					"U11":"",
					"U12":"",
					"U13":"",
					"U14":"",
					"U15":"",
					"U16":"",
					"U17":"",
					"U18":"",
					"U19":"",
					"U20":""
					},
				ot_dom:document.location.protocol+'//servedby.flashtalking.com',
				ot_path:'/container/5789;36181;4238;iframe/?',
				ot_href:'ft_referrer='+escape(document.location.href),
				ot_rand:Math.random()*1000000,
				ot_ref:document.referrer,
				ot_init:function(){
					var o=this,qs='',count=0,ns='';
					for(var key in o.ft_vars){
						qs+=(o.ft_vars[key]==''?'':key+'='+o.ft_vars[key]+'&');
					}
					count=o.ot_path.length+qs.length+o.ot_href+escape(o.ot_ref).length;
					ns=o.ot_ns(count-2000);
					document.write('<iframe style="position:absolute; visibility:hidden; width:1px; height:1px;" src="'+o.ot_dom+o.ot_path+qs+o.ot_href+'&ns='+ns+'&cb='+o.ot_rand+'"></iframe>');
				},
				ot_ns:function(diff){
					if(diff>0){
						var o=this,qo={},
							sp=/(?:^|&)([^&=]*)=?([^&]*)/g,
							fp=/^(http[s]?):\/\/?([^:\/\s]+)\/([\w\.]+[^#?\s]+)(.*)?/.exec(o.ot_ref),
							ro={h:fp[2],p:fp[3],qs:fp[4].replace(sp,function(p1,p2,p3){if(p2)qo[p2]=[p3]})};
						return escape(ro.h+ro.p.substring(0,10)+(qo.q?'?q='+unescape(qo.q):'?p='+unescape(qo.p)));
					}else{
						var o=this;
						return escape(unescape(o.ot_ref));
					}
						}
				}
			ft_onetag_4238.ot_init();
			</script>

			<!-- END: OneTag Code Insert -->

			<!-- Drop Google Analytics here -->
			<!-- end analytics -->

	

	
		<div class="off-canvas-wrap" data-offcanvas>
			<div class="inner-wrap">
				<div id="container">
					<header class="header" role="banner">

						 <div class="row-wide bg-black-translucent padding-top-bottom-100rem" data-magellan-expedition="fixed">
						 	<div class="row">
						 		<div class="small-12 columns small-only-text-center">
						 		<a href="http://www.tegile.com/" rel="nofollow">
						 			<img src="<?php echo home_url(); ?>/wp-content/uploads/2015/11/tegile-logo-white-nav.png">
						 		</a>
						 		</div>
						 	</div>
						 </div>
								 	
					</header> <!-- end .header -->
