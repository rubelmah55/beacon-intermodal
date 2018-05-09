<?php
/*
Template Name: Our Equipment
*/
get_header(); ?>

	<div id="primary" class="content-area">

		<section class="our-services equipments-main">
			<div class="container">
				<div class="row">
					<div class="col-md-7 col-sm-12 col-xs-12">
						<div class="section-title">
							<h6 class="sub-title text-uppercase">Our Equipment</h6>
							<h3 class="title text-uppercase">Strong & Secure</h3>
							<span class="separator left"><span></span></span>
						</div>

						<div class="content">
							<p>Beacon has a diverse fleet of dry and refrigerated containers totaling nearly 1.3 million TEU. Our rigorous procurement program is consistently being refined to ensure we deliver a well-designed and cost-efficient container. We are up-to-date on industry standards and maintain a strict quality control standard for all containers.  Beacon is committed to protecting our natural resources by utilizing the most efficient and environmentally-friendly materials available.</p>
						</div>
					</div>

					<div class="col-md-5 col-sm-12 col-xs-12">
						<div class="media">
							<img src="<?php echo get_template_directory_uri(); ?>/images/open-container.png" class="img-responsive" alt="">
						</div>
					</div>
				</div>
			</div>
		</section><!-- /our-services -->

		<section class="equipments">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<hr>
					</div>	
				</div>

				<div class="row eq-height justify-content-center">

					<a href="equipment-dry.html" class="col-md-6 col-sm-6 col-xs-6 col">
						<div class="box-item equipment-item text-center">
							<div class="media">
								<img src="<?php echo get_template_directory_uri(); ?>/images/equipment-1.jpg" class="img-responsive" alt="">
							</div>

							<div class="content">
								<div class="align-center">
									<h4 class="text-uppercase">Dry Containers</h4>
								</div>

								<p>Dry Containers are designed to meet the transportation needs of almost all types of general cargo, such as electronics, apparel, industrial parts, and consumer goods. </p>

								<div class="arrow">
									<button><i class="icon-arrow-right"></i></button>
								</div>
							</div>
						</div>
					</a><!-- /service-item -->

					<a href="equipment-refrigerated.html" class="col-md-6 col-sm-6 col-xs-6 col">
						<div class="box-item equipment-item text-center">
							<div class="media">
								<img src="<?php echo get_template_directory_uri(); ?>/images/equipment-2.jpg" class="img-responsive" alt="">
							</div>

							<div class="content">
								<div class="align-center">
									<h4 class="text-uppercase">Refrigerated Containers</h4>
								</div>

								<p>Refrigerated Containers are used to transport perishable products like produce, meat and fish and other temperature-sensitive cargo.</p>

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