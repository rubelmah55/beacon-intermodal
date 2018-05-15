<?php
/*
Template Name: Our Services
*/
get_header(); ?>

	<div id="primary" class="content-area">

		<?php $services = get_field('services'); if ($services): ?>
		<section class="our-services services-pg">
			<div class="container">
				<div class="row">
					<?php if ($services['sub_title'] || $services['title'] || $services['content']): ?>
					<div class="col-md-7 col-sm-12 col-xs-12">
						<div class="section-title">
							<?php if ($services['sub_title']): ?>
							<h6 class="sub-title text-uppercase"><?php echo $services['sub_title']; ?></h6>
							<?php endif; ?>

							<?php if ($services['title']): ?>
							<h3 class="title text-uppercase"><?php echo $services['title']; ?></h3>
							<span class="separator left"><span></span></span>
							<?php endif; ?>
						</div>

							
						<?php if ($services['content']): ?>
						<div class="content">
							<?php echo $services['content']; ?>
						</div>
						<?php endif; ?>
					</div>
					<?php endif; ?>

					<?php if ($services['image']): ?>
					<div class="col-md-5 col-sm-12 col-xs-12">
						<div class="media">
							<img src="<?php echo $services['image']['url']; ?>" class="img-responsive mx-auto" alt="<?php echo $services['image']['alt']; ?>">
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
					<?php
						$args = array(
							'post_type' => 'our_service',
							'orderby' => 'ASC',
							'posts_per_page' => -1,
						);

						$loop = new WP_Query( $args );
						if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post();
						$service = get_field('service');
						$featured_image = get_field('featured_image_service');
						$serviceImg = $featured_image ? $featured_image['url'] : get_template_directory_uri().'/images/placeholder-service.jpg';
					?>
					<a href="<?php the_permalink(); ?>" class="col-md-4 col-sm-6 col-xs-6 col">
						<div class="box-item service-item text-center">
							<div class="media">
								<img src="<?php echo $serviceImg; ?>" class="img-responsive" alt="<?php echo $featured_image['alt']; ?>">
							</div>

							<div class="content">
								<div class="align-center">
									<h4 class="text-uppercase"><?php the_title(); ?></h4>
								</div>

								<?php if ($service['excerpt']): ?>
								<?php echo $service['excerpt']; ?>
								<?php endif; ?>

								<div class="arrow">
									<button><i class="icon-arrow-right"></i></button>
								</div>
							</div>
						</div>
					</a><!-- /service-item -->
					<?php endwhile; else : ?>
					<section class="not-found text-center"><h3><?php _e('No Service item found!', 'beacon'); ?></h3></section>
					<?php endif; wp_reset_postdata(); ?>
				</div>
			</div>
		</section><!-- /services -->

	</div><!-- /primary -->

<?php get_footer(); ?>