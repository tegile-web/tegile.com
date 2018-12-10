<?php

	$logo_src = __DIR__ . '/../../uploads/2018/12/western-digital-logo.svg';
  	$logo = file_get_contents( $logo_src );

?>

					<footer class="footer row-wide lp-footer">
						<div class="row">
							<div class="large-2 medium-3 small-6 columns text-left">
								<ul>
									<li><a href="https://www.westerndigital.com/products/storage-systems">Products</a></li>
									<li><a href="https://www.westerndigital.com/solutions">Solutions</a></li>
									<li><a href="https://www.westerndigital.com/company/newsroom?type=Events">Events</a></li>
								</ul>
							</div>
							<div class="large-2 medium-3 small-6 large-push-8 medium-push-6 columns text-right">
								<ul>
						            <li><a href="https://www.westerndigital.com/partners">Partners</a></li>
									<li><a href="https://www.westerndigital.com/company">About Us</a></li>
									<li><a href="https://blog.westerndigital.com/">Blog</a></li>
			  					</ul>
							</div>
							<div class="clear200rem show-for-small-only"></div>
							<div id="footer-middle" class="large-8 medium-6 small-12 large-pull-2 medium-pull-3 columns text-center">
								<a href="<?php echo home_url(); ?>" rel="nofollow">
									<span class="lp-footer-logo">
										<?php echo $logo; ?>
									</span>
								</a>
								<div class="clearfix"></div>
								<ul class="copyright">
									<li><span>&copy; <?php echo date('Y'); ?> Western Digital Corporation or its affiliates</span></li>
									<li><span>All Rights Reserved</span></li>
									<li><span><a href="https://www.wdc.com/about-wd/legal/privacy-statement.html">Privacy Statement</a> | <a href="https://www.wdc.com/about-wd/legal/privacy-statement.html#cookiestatement">Cookie Statement</a> | <a href="<?php echo home_url(); ?>/terms-of-use/">Terms of Use</a></span></li>
								</ul>
								<div class="clear100rem"></div>
								<div id="teconsent"></div>
								<div class="clear200rem"></div>
								<span class="social-icons">
									<a href="<?php echo home_url(); ?>/feed/" target="_blank">
										<span class="fa-stack fa-lg">
											<i class="fa fa-circle fa-stack-2x fa-background"></i>
											<i class="fa fa-rss fa-stack-1x"></i>
										</span>
									</a>
									<a href="https://twitter.com/Tegile/" target="_blank">
										<span class="fa-stack fa-lg">
											<i class="fa fa-circle fa-stack-2x fa-background"></i>
											<i class="fa fa-twitter fa-stack-1x"></i>
										</span>
									</a>
									<a href="https://www.linkedin.com/company/2424643/" target="_blank">
										<span class="fa-stack fa-lg">
											<i class="fa fa-circle fa-stack-2x fa-background"></i>
											<i class="fa fa-linkedin fa-stack-1x"></i>
										</span>
									</a>
									<a href="https://www.youtube.com/user/DedupeStorage/" target="_blank">
										<span class="fa-stack fa-lg">
											<i class="fa fa-circle fa-stack-2x fa-background"></i>
											<i class="fa fa-youtube-play fa-stack-1x"></i>
										</span>
									</a>
									<a href="https://plus.google.com/u/0/+TegileSystems/videos/" target="_blank">
										<span class="fa-stack fa-lg">
											<i class="fa fa-circle fa-stack-2x fa-background"></i>
											<i class="fa fa-google-plus fa-stack-1x"></i>
										</span>
									</a>
									<a href="https://www.facebook.com/tegilestorage/" target="_blank">
										<span class="fa-stack fa-lg">
											<i class="fa fa-circle fa-stack-2x fa-background"></i>
											<i class="fa fa-facebook fa-stack-1x"></i>
										</span>
									</a>
									<a href="https://www.xing.com/companies/tegilesystemsinc./" target="_blank">
										<span class="fa-stack fa-lg">
											<i class="fa fa-circle fa-stack-2x fa-background"></i>
											<i class="fa fa-xing fa-stack-1x"></i>
										</span>
									</a>
								</span>
							</div>
							<!-- <div class="clearfix show-for-small-only"></div> -->
						</div>
					</footer> <!-- end .footer -->
				</div> <!-- end #container -->
			</div> <!-- end .inner-wrap -->
		</div> <!-- end .off-canvas-wrap -->

		<?php
			wp_enqueue_script( 'lazyLoader', get_template_directory_uri() . '/assets/js/min/lazysizes.min.js', array(), '', false );
			wp_enqueue_script( 'lazyInit', get_template_directory_uri() . '/assets/js/site/init-lazyload.js', array('lazyLoader'), '', false );
			wp_enqueue_script( 'lazyAspect', get_template_directory_uri() . '/assets/js/min/ls.aspectratio.min.js', array('lazyLoader'), '', false );
		?>

		<div><?php wp_footer(); ?></div>
	</body>
</html> <!-- end page -->
