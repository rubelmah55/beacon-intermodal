		<footer class="footer">
			<div class="footer-top">
				<div class="container">
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12 text-center">
							<div class="footer-logo">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
									<?php $footer_logo = get_field('footer_logo', 'options'); if ($footer_logo): ?>
									<img src="<?php echo $footer_logo['url']; ?>" class="mx-auto img-responsive" alt="<?php echo $footer_logo['alt']; ?>">
									<?php else: ?>
									<img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" class="mx-auto img-responsive" alt="Beacon Intermodal">
									<?php endif; ?>
								</a>
							</div>

							<?php 
						  		wp_nav_menu( array(
		                            'menu'               => 'Footer menu',
		                            'theme_location'     => 'menu-2',
		                            'depth'              => 2,
		                            'container'          => 'false',
		                            'menu_class'         => 'footer-menu list-inline',
		                            'menu_id'            => '',
		                            'fallback_cb'        => 'wp_bootstrap_navwalker::fallback',
		                            'walker'             => new wp_bootstrap_navwalker(),
		                        ));
		                    ?>
		                    <?php $legal_notice = get_field('legal_notice', 'options'); ?>
							<div class="copyright">
								<p>Copyright ©<?=date('Y')?> Beacon Intermodal Leasing, LLC. <span>All rights reserved. <?php if ($legal_notice): ?><a href="<?php echo $legal_notice['url']; ?>"><?php echo $legal_notice['text']; ?>.</a><?php endif; ?></span></p>
							</div>
						</div>
					</div>
				</div>
			</div><!-- /footer-top -->

			<?php $career_bar = get_field('career_bar_show_hide', 'options'); if ($career_bar): ?>
			<div class="careers-bar">
				<div class="container">
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12 text-center">
							<p><strong>Career Opportunities:</strong> Interested in joining the Beacon Intermodal Team? <a href="<?php echo perm_by_temp('t_about.php'); ?>/#career-opp">Click Here</a> to view our current positions. <a href="<?php echo perm_by_temp('t_about.php'); ?>/#career-opp" class="icon-arrow-right"></a></p>
						</div>
					</div>
				</div>
			</div><!-- /careers-bar -->
			<?php endif; ?>
		</footer><!-- /footer -->
		<script type="text/javascript">
			var myVideo = document.getElementById("myVideo"); 
			function playPause() { 
			    if (myVideo.paused) 
			        myVideo.play(); 
			    else 
			        myVideo.pause(); 
			} 
		</script>
		<?php wp_footer(); ?>
	</body>
</html>