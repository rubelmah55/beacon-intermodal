<?php
/*
Template Name: Our Services
*/
get_header(); ?>

	<div id="primary" class="content-area">

		<?php
			$services_image = get_field('services_image');
			$services_sub_title = get_field('services_sub_title');
			$services_title = get_field('services_title');
			$services_content = get_field('services_content');
			if ($services_image || $services_sub_title || $services_title || $services_content):
		?>
		<section class="our-services">
			<div class="container">
				<div class="row">
					<?php if ($services_sub_title || $services_title || $services_content): ?>
					<div class="col-md-7 col-sm-12 col-xs-12">
						<div class="section-title">
							<?php if ($services_sub_title): ?>
							<h6 class="sub-title text-uppercase"><?php echo $services_sub_title; ?></h6>
							<?php endif; ?>

							<?php if ($services_title): ?>
							<h3 class="title text-uppercase"><?php echo $services_title; ?></h3>
							<span class="separator left"><span></span></span>
							<?php endif; ?>
						</div>

							
						<?php if ($services_content): ?>
						<div class="content">
							<?php echo $services_content; ?>
						</div>
						<?php endif; ?>
					</div>
					<?php endif; ?>

					<?php if ($services_image): ?>
					<div class="col-md-5 col-sm-12 col-xs-12">
						<div class="media">
							<img src="<?php echo $services_image['url']; ?>" class="img-responsive" alt="<?php echo $services_image['alt']; ?>">
						</div>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</section><!-- /our-services -->
		<?php endif; ?>

		<section class="services">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<hr>
					</div>	
				</div>

				<div class="row eq-height justify-content-center">
					<a href="services-leasing.html" class="col-md-4 col-sm-6 col-xs-6 col">
						<div class="box-item service-item text-center">
							<div class="media">
								<img src="<?php echo get_template_directory_uri(); ?>/images/service-1.jpg" class="img-responsive" alt="">
							</div>

							<div class="content">
								<div class="align-center">
									<h4 class="text-uppercase">Leasing</h4>
								</div>

								<p>Beacon specializes in offering flexible leasing options tailored to the needs of our clients</p>

								<div class="arrow">
									<button><i class="icon-arrow-right"></i></button>
								</div>
							</div>
						</div>
					</a><!-- /service-item -->

					<a href="services-container.html" class="col-md-4 col-sm-6 col-xs-6 col">
						<div class="box-item service-item text-center">
							<div class="media">
								<img src="<?php echo get_template_directory_uri(); ?>/images/service-2.jpg" class="img-responsive" alt="">
							</div>

							<div class="content">
								<div class="align-center">
									<h4 class="text-uppercase">Container Resales</h4>
								</div>

								<p>Beacon sells new and used containers to a variety of customers in different industries</p>

								<div class="arrow">
									<button><i class="icon-arrow-right"></i></button>
								</div>
							</div>
						</div>
					</a><!-- /service-item -->

					<a href="services-managment.html" class="col-md-4 col-sm-6 col-xs-6 col">
						<div class="box-item service-item text-center">
							<div class="media">
								<img src="<?php echo get_template_directory_uri(); ?>/images/service-3.jpg" class="img-responsive" alt="">
							</div>

							<div class="content">
								<div class="align-center">
									<h4 class="text-uppercase">Asset Management</h4>
								</div>

								<p>Beacon actively manages container portfolios on behalf of third party investors</p>

								<div class="arrow">
									<button><i class="icon-arrow-right"></i></button>
								</div>
							</div>
						</div>
					</a><!-- /service-item -->
				</div>
			</div>
		</section><!-- /services -->

	</div><!-- /primary -->

<?php get_footer(); ?>