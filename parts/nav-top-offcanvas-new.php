<!-- Mobile Menu Icon -->
<div id="burger">
	<span></span>
	<span></span>
	<span></span>
</div>

<?php

    $protocol = ( is_ssl() ? 'https://' : 'http://' );
?>

<!-- Nav Wrapper -->
<div class="nav-wrapper">

	<!-- Search Box -->
	<div id="search-box">
		<input class="search-box-field" type="search" placeholder="Search..." />
		<a href="#" class="search-close">
			<i class="fa fa-close fa-fw fa-2x"></i>
		</a>
	</div>

	<!-- Logo -->
	<div class="logo vertical-align-middle">
		<a href="/">
			<!-- <img src="/wp-content/uploads/2016/11/Tegile-Logo-White-Flat-Vector.svg" /> -->
			<img src="/wp-content/uploads/2017/09/tegile-wd-logo-white.svg" />
		</a>
	</div>

	<!-- Main Nav Menu -->
	<nav class="top-bar mega-menu vertical-align-middle">
		<ul class="top-nav-menu">
			<li class="top-nav-item mobile-nav-icons show-for-medium-down">
				<a href="/company/contact-us/"><i class="fa fa-phone fa-fw"></i></a>
				<a href="/support/"><i class="fa fa-headphones fa-fw"></i></a>
			</li>
			<li class="top-nav-item">
				<a id="why-tegile" href="/why-tegile" class="top-level">Why Tegile</a>
			</li>
			<li class="top-nav-item">
				<a id="products" href="/products" class="top-level" data-mega-menu>Products</a>
			</li>
			<li class="top-nav-item">
				<a id="solutions" href="/solutions" class="top-level" data-mega-menu>Solutions</a>
			</li>
			<li class="top-nav-item">
				<a id="resources" href="/resources" class="top-level" data-mega-menu>Resources</a>
			</li>
			<li class="top-nav-item">
				<a id="partners" href="/partners" class="top-level" data-mega-menu>Partners</a>
			</li>
			<li class="top-nav-item">
				<a id="company" href="/company" class="top-level" data-mega-menu>Company</a>
			</li>
			<li class="top-nav-item">
				<a id="blog" href="/blog" class="top-level">Blog</a>
			</li>
		</ul>
	</nav>

	<div class="banner-button vertical-align-middle">
		<a href="/pricing/?utm_source=top_nav_button&amp;utm_medium=site_visitor&amp;utm_campaign=pricing-button" class="button go banner-button tiny" target="_blank">Get Pricing</a>
	</div>

	<!-- Icon Menu -->
	<nav class="icon-menu vertical-align-middle">
		<a href="/company/contact-us/"><i class="fa fa-phone fa-fw"></i></a>
		<a href="/support/"><i class="fa fa-headphones fa-fw"></i></a>
		<a href="#" class="search-icon"><i class="fa fa-neuter fa-fw"></i></a>
	</nav>
</div>

<div id="mega-menu-content" class="mega" tabindex="-1">

	<div class="left-wing columns large-3">

		<!-- HERE DOWN IS PER NAV ITEM CONTENT -->
		<!-- Why Tegile -->
		<!--
		<div class="row" data-menu-id="why-tegile">
			<div class="small-12 columns">
				<a href="http://pages.tegile.com/dcig-small-midsize-enterprise-all-flash-array-buyers-guide.html">
					<p class="font-weight-extrabold no-margin font-size-h4">Recommended by DCIG</p>
					<p class="">Two Years in a Row</p>
				</a>
			</div>
			<a href="http://pages.tegile.com/dcig-small-midsize-enterprise-all-flash-array-buyers-guide.html">
				<img class="width-60" src="/wp-content/uploads/2017/07/dcig-cta.png" />
			</a>
		</div>
		-->

		<!-- Products -->
		<div class="row" data-menu-id="products">
			<div class="small-12 columns">
				<p class="font-weight-extrabold font-size-h4 margin-bottom-200rem">IntelliFlash Architecture Overview</p>
				<div class="iframe-container shadow no-padding-top no-margin">
					<iframe class="embedded-video" src="<?php echo $protocol; ?>www.youtube.com/embed/81FqRvyLTJs?controls=2&rel=0&theme=light&color=red&modestbranding=1&autoplay=0&showinfo=0&enablejsapi=1" frameborder="0" allowfullscreen=""></iframe>
				</div>
			</div>
		</div>

		<!-- Solutuons -->
		<div class="row" data-menu-id="solutions">
			<div class="small-12 columns">
				<a href="http://pages.tegile.com/dcig-small-midsize-enterprise-all-flash-array-buyers-guide.html">
					<p class="font-weight-extrabold no-margin font-size-h4">Tegile on VMware</p>
					<p>Top 5 Reasons</p>
				</a>
			</div>
			<a href="http://pages.tegile.com/dcig-small-midsize-enterprise-all-flash-array-buyers-guide.html">
				<img style="width: 80%;" src="/wp-content/uploads/2017/07/top-5-cta.png" />
			</a>
		</div>

		<!-- Resources -->
		<div class="row" data-menu-id="resources">
			<div class="small-12 columns">
				<a href="http://pages.tegile.com/dcig-small-midsize-enterprise-all-flash-array-buyers-guide.html">
					<p class="font-weight-extrabold no-margin font-size-h4">DCIG Buyer's Guide</p>
					<p>Get Your Copy</p>
				</a>
			</div>
			<a href="http://pages.tegile.com/dcig-small-midsize-enterprise-all-flash-array-buyers-guide.html">
				<img style="width: 80%;" src="/wp-content/uploads/2017/07/resources-cta.png" />
			</a>
		</div>

		<!-- Partners -->
		<div class="row" data-menu-id="partners">
			<div class="small-12 columns">
				<a href="/partners">
					<p class="font-weight-extrabold font-size-h4 margin-bottom-200rem">Partner Portal</p>
				</a>
			</div>
			<a href="/partners">
				<img style="width: 80%;" src="/wp-content/uploads/2017/07/menu-image-portal.png" />
			</a>
		</div>

		<!-- Company -->
		<div class="row" data-menu-id="company">
			<div class="small-12 columns">
				<p class="font-weight-extrabold font-size-h4 margin-bottom-200rem">Our Company Story</p>
				<div class="iframe-container shadow no-padding-top no-margin">
					<iframe class="embedded-video" src="<?php echo $protocol; ?>www.youtube.com/embed/bqVm9wJajqc?controls=2&rel=0&theme=light&color=red&modestbranding=1&autoplay=0&showinfo=0&enablejsapi=1" frameborder="0" allowfullscreen=""></iframe>
				</div>
			</div>
		</div>

		<!-- END PER NAV ITEM CONTENT -->

	</div>

	<div class="menu-content columns large-9">

		<!--<div data-menu-id="why-tegile" class="menu-content-bkg" style="background-image: url('/wp-content/uploads/2017/07/menu-bkg-green.png');"></div>-->
		<div data-menu-id="products" class="menu-content-bkg" style="background-image: url('/wp-content/uploads/2017/07/menu-bkg-blue.png');"></div>
		<div data-menu-id="solutions" class="menu-content-bkg" style="background-image: url('/wp-content/uploads/2017/07/menu-bkg-red-blue.png');"></div>
		<div data-menu-id="resources" class="menu-content-bkg" style="background-image: url('/wp-content/uploads/2017/07/menu-bkg-blue-red.png');"></div>
		<div data-menu-id="partners" class="menu-content-bkg" style="background-image: url('/wp-content/uploads/2017/07/menu-bkg-blue.png');"></div>
		<div data-menu-id="company" class="menu-content-bkg" style="background-image: url('/wp-content/uploads/2017/07/menu-bkg-aqua.png');"></div>

		<!-- HERE DOWN IS PER NAV ITEM CONTENT -->
		<!-- Why Tegile -->
		<!--
		<div class="container vertical-align-middle" data-menu-id="why-tegile">

			<div class="row">

				<div class="large-6 columns mega-menu-links">
					<a href="/why-tegile/">
						<ul class="mega-menu-items">
							<li class="mega-menu-header">Memory First Storage</li>
							<li class="mega-menu-description">Sed posuere consectetur est at lobortis. Nullam quis risus eget urna mollis ornare vel eu leo.</li>
						</ul>
					</a>
				</div>
				<div class="large-6 columns mega-menu-links">
					<a href="/products/how-to-buy/intellipay/">
						<ul class="mega-menu-items">
							<li class="mega-menu-header">IntelliPay Pricing</li>
							<li class="mega-menu-description">Own, lease or rent <strong>ONLY</strong> the capacity you use.</li>
						</ul>
					</a>
				</div>

			</div>

			<div class="row">

				<div class="large-6 columns mega-menu-links">
					<a href="/products/how-to-buy/lifetime-storage/">
						<ul class="mega-menu-items">
							<li class="mega-menu-header">Lifetime Storage</li>
							<li class="mega-menu-description">An entirely new system or advanced storage controllers every 3-5 years.</li>
						</ul>
					</a>
				</div>
				<div class="large-6 columns mega-menu-links">
					<a href="/products/intellicare/flash-5-commitment/">
						<ul class="mega-menu-items">
							<li class="mega-menu-header">Flash 5 Commitment</li>
							<li class="mega-menu-description">We back up our storage arrays with our five point commitment to you.</li>
						</ul>
					</a>
				</div>

			</div>
		</div>
		-->

		<!-- Products -->
		<div class="container vertical-align-middle" data-menu-id="products">

  			<div class="row">
				<div class="columns large-3 mega-menu-links">
					<ul class="mega-menu-items">
						<a href="/products/intelliflash/"><li class="mega-menu-header" style="display: table;">IntelliFlash OS</li></a>
					</ul>
				</div>
				<div class="columns large-8 pull-left-2">
	    			<p class="description">All Tegile storage arrays are powered by IntelliFlash OS — a designed-from-the-ground-up, feature-rich storage operating system designed to leverage different grades of persistent media to deliver high-performance storage I/O.</p>
	    		</div>
			</div>

			<div class="row" data-equalizer>
  				<div class="large-4 columns mega-menu-links">
  					<ul class="mega-menu-items">
						<a href="/products/"><li class="mega-menu-header">IntelliFlash Arrays</li></a>
						<a href="/products/nvme-array/"><li>NVMe Arrays</li></a>
						<a href="/products/all-flash-array/"><li>All-Flash Arrays</li></a>
						<a href="/products/hybrid-array/"><li>Hybrid Arrays</li></a>
						<a href="/products/intelliflashhd/"><li>IntelliFlash HD</li></a>
					</ul>
  				</div>
  				<div class="large-4 columns mega-menu-links">
  					<ul class="mega-menu-items">
						<a href="/solutions/intellistack/"><li class="mega-menu-header">IntelliStack Converged Infrastructure</li></a>
						<a href="/products/intellicare/cloud-analytics/"><li class="mega-menu-header">IntelliCare Cloud Analytics</li></a>
  					</ul>
  				</div>
  				<div class="large-4 columns mega-menu-links">
  					<ul class="mega-menu-items">
						<li class="mega-menu-header">How To Buy</li>
						<a href="/products/how-to-buy/intellipay/"><li>IntelliPay Pricing</li></a>
						<a href="/products/how-to-buy/lifetime-storage/"><li>Lifetime Storage</li></a>
						<a href="/pricing/?utm_source=top_nav_button&utm_medium=site_visitor&utm_campaign=pricing-button"><li>Get a Price Quote</li></a>
					</ul>
  				</div>
  			</div>
  		</div>

  		<!-- Solutions -->
  		<div class="container vertical-align-middle" data-menu-id="solutions">

  			<div class="row">
  				<div class="large-4 columns mega-menu-links">
					<ul class="mega-menu-items">
						<li class="mega-menu-header">By Workload</li>
					</ul>
  				</div>
  				<div class="large-8 columns mega-menu-links">
					<ul class="mega-menu-items">
						<li class="mega-menu-header">By Industry</li>
					</ul>
  				</div>
  			</div>

  			<div class="row">
	  			<div class="large-4 columns mega-menu-links">
					<ul class="mega-menu-items">
						<a href="/solutions/server-virtualization/"><li>Virtualization</li></a>
						<a href="/solutions/desktop-virtualization/"><li>Virtual Desktop</li></a>
						<a href="/solutions/database/"><li>Database</li></a>
					</ul>
  				</div>
  				<div class="large-4 columns mega-menu-links">
					<ul class="mega-menu-items">
						<a href="/solutions/industry/finance/"><li>Banking & Finance</li></a>
						<a href="/solutions/industry/education/"><li>Education</li></a>
						<a href="/solutions/industry/government/federal-government/"><li>Federal Government</li></a>
					</ul>
  				</div>
  				<div class="large-4 columns mega-menu-links">
					<ul class="mega-menu-items">
						<a href="/solutions/industry/government/state-and-local-government/"><li>State & Local Government</li></a>
						<a href="/solutions/industry/healthcare/"><li>Healthcare</li></a>
					</ul>
  				</div>
  			</div>
  		</div>

  		<!-- Resources -->
  		<div class="container vertical-align-middle" data-menu-id="resources">

  			<div class="row">
  				<div class="large-6 columns mega-menu-links">
					<ul class="mega-menu-items">
						<a href="/resources/case-studies/"><li class="mega-menu-header">Case Studies</li></a>
						<a href="/resources/white-papers/"><li class="mega-menu-header">White Papers</li></a>
						<a href="/resources/videos/"><li class="mega-menu-header">Videos</li></a>
					</ul>
				</div>
				<div class="large-6 columns mega-menu-links">
					<ul class="mega-menu-items">
						<a href="/resources/product-info/"><li class="mega-menu-header">Product Info</li></a>
						<a href="/events/webinars/"><li class="mega-menu-header">Webinars</li></a>
						<a href="/resources/"><li class="mega-menu-header">Top Resources</li></a>
					</ul>
				</div>
			</div>

		</div>

  		<!-- Partners -->
		<div class="container vertical-align-middle" data-menu-id="partners">

			<div class="row">
	  			<div class="large-6 columns mega-menu-links">
					<a href="/partners">
						<ul class="mega-menu-items">
							<li class="mega-menu-header">Reseller Partners</li>
							<li class="mega-menu-description">Our channel partners are critical to our success. With no direct sales force, Tegile is 100% focused on helping you succeed. Our dedicated sales and technical resources work side-by-side with you to close new business.</li>
						</ul>
					</a>
  				</div>
  				<div class="large-6 columns mega-menu-links">
					<a href="/partners/alliance-partners/">
						<ul class="mega-menu-items">
							<li class="mega-menu-header">Alliance Partners</li>
							<li class="mega-menu-description">Tegile views our technology alliances as an extension of our team, playing an integral role in our technology development, the way we bring product to market, and most importantly, the success of our customers.</li>
						</ul>
					</a>
  				</div>
  			</div>

  		</div>

  		<!-- Company -->
		<div class="container vertical-align-middle" data-menu-id="company">
  			<div class="row">
  				<div class="large-4 columns mega-menu-links no-padding-top">
					<ul class="mega-menu-items">
						<a href="/company/"><li class="mega-menu-header">About Us</li></a>
						<a href="/company/team/"><li class="mega-menu-header">Leadership & Investors</li></a>
						<a href="/company/awards/"><li class="mega-menu-header">Awards & Recognition</li></a>
					</ul>
  				</div>
  				<div class="large-4 columns mega-menu-links no-padding-top">
					<ul class="mega-menu-items">
						<a href="/company/press-releases/"><li class="mega-menu-header">Press Releases</li></a>
						<a href="/company/press-kit/"><li class="mega-menu-header">Press Kit</li></a>
						<a href="/company/news/"><li class="mega-menu-header">News</li></a>
					</ul>
  				</div>
  				<div class="large-4 columns mega-menu-links no-padding-top">
					<ul class="mega-menu-items">
						<a href="/events/"><li class="mega-menu-header">Events</li></a>
						<a href="/company/careers/"><li class="mega-menu-header">Careers</li></a>
						<a href="/company/contact-us/"><li class="mega-menu-header">Contact Us</li></a>
					</ul>
  				</div>
  			</div>

  		</div>
		<!-- END PER NAV ITEM CONTENT -->

	</div>

</div>

<a href="#" class="mobile-back-btn show_hide">
	<i class="fa fa-arrow-circle-left fa-fw fa-2x"></i>
</a>

<!-- <div id="social-media-links">
	<a data-sumome-share-id="22821de2-e4ae-4241-abd6-d31fe1f9b1bb"></a>
</div> -->
