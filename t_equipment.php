<?php
/*
Template Name: Our Equipment
*/
get_header(); ?>

	<div id="primary" class="content-area">

		<?php $equipments = get_field('equipments'); if ($equipments): ?>
		<section class="our-services equipments-main">
			<div class="container">
				<div class="row">
					<?php if ($equipments['sub_title'] || $equipments['title'] || $equipments['content']): ?>
					<div class="col-md-7 col-sm-12 col-xs-12">
						<?php if ($equipments['sub_title'] || $equipments['title']): ?>
						<div class="section-title">
							<?php if ($equipments['sub_title']): ?>
							<h6 class="sub-title text-uppercase"><?php echo $equipments['sub_title']; ?></h6>
							<?php endif; ?>
								
							<?php if ($equipments['title']): ?>
							<h3 class="title text-uppercase"><?php echo $equipments['title']; ?></h3>
							<span class="separator left"><span></span></span>
							<?php endif; ?>
						</div>
						<?php endif; ?>

							
						<?php if ($equipments['content']): ?>
						<div class="content">
							<?php echo $equipments['content']; ?>
						</div>
						<?php endif; ?>
					</div>
					<?php endif; ?>

					<?php if ($equipments['image']): ?>
					<div class="col-md-5 col-sm-12 col-xs-12">
						<div class="media">
							<img src="<?php echo $equipments['image']['url']; ?>" class="img-responsive" alt="<?php echo $equipments['image']['url']; ?>">
						</div>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</section><!-- /our-services -->
		<?php endif; ?>

		<section class="equipments">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<hr>
					</div>	
				</div>

				<div class="row eq-height justify-content-center">
					<?php
						$args = array(
							'post_type' => 'our_equipment',
							'orderby' => 'ASC',
							'posts_per_page' => -1,
						);

						$loop = new WP_Query( $args );
						if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post();
						$equipment = get_field('equipment');
						$featured_image = get_field('featured_image_equipment');
						$imgSrc = $featured_image ? $featured_image['url'] : get_template_directory_uri().'/images/placeholder-service.jpg';
					?>
					<a href="<?php the_permalink(); ?>" class="col-md-6 col-sm-6 col-xs-6 col">
						<div class="box-item equipment-item text-center">
							<div class="media">
								<img src="<?php echo $imgSrc; ?>" class="img-responsive" alt="<?php echo $featured_image['alt']; ?>">
							</div>
							<div class="content">
								<div class="align-center">
									<h4 class="text-uppercase"><?php the_title(); ?></h4>
								</div>
								<?php if ($equipment['excerpt']): ?>
								<?php echo $equipment['excerpt']; ?>
								<?php endif; ?>
								<div class="arrow">
									<button><i class="icon-arrow-right"></i></button>
								</div>
							</div>
						</div>
					</a><!-- /service-item -->
					<?php endwhile; else : ?>
					<section class="not-found text-center"><h3><?php _e('No Equipment found!', 'beacon'); ?></h3></section>
					<?php endif; wp_reset_postdata(); ?>
				</div>
			</div>
		</section><!-- /services -->

	</div><!-- /primary -->

<?php get_footer(); ?>