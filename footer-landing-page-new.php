					<footer class="footer row-wide lp-footer">
						<div class="row">
							<div class="small-12 columns text-center">
								<a href="<?php echo home_url(); ?>" rel="nofollow">
									<!-- <img class="lp-footer-logo" src="<?php echo home_url(); ?>/wp-content/uploads/2016/11/Tegile-Logo-Black-Flat-Vector.svg"> -->
									<img class="lp-footer-logo" src="<?php echo home_url(); ?>/wp-content/uploads/2017/09/tegile-wd-logo-black.svg">
								</a>
								<div class="clearfix"></div>
								<ul class="copyright">
									<li><span>&copy; <?php echo date('Y'); ?> Western Digital Corporation or its affiliates</span></li>
									<li><span>All Rights Reserved</span></li>
									<li><span><a href="<?php echo home_url(); ?>/privacy-policy/">Privacy Policy</a> | <a href="<?php echo home_url(); ?>/terms-of-use/">Terms of Use</a></span></li>
								</ul>

								<!-- <span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x fa-inverse" style="
								color: #ededed;
								"></i><i class="fa fa-youtube-play fa-stack-1x"></i></span> -->


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
									<a href="https://www.linkedin.com/company/tegile-systems/" target="_blank">
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
									<a href="https://www.facebook.com/tegilesystems/" target="_blank">
										<span class="fa-stack fa-lg">
											<i class="fa fa-circle fa-stack-2x fa-background"></i>
											<i class="fa fa-facebook fa-stack-1x"></i>
										</span>
									</a>
									<a href="https://www.xing.com/companies/tegilesystemsinc." target="_blank">
										<span class="fa-stack fa-lg">
											<i class="fa fa-circle fa-stack-2x fa-background"></i>
											<i class="fa fa-xing fa-stack-1x"></i>
										</span>
									</a>
								</span>
							</div>
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

		<div class=""><?php wp_footer(); ?></div>
	</body>
</html> <!-- end page -->
