<?php get_header(); ?>

	<div id="primary" class="content-area">
		<?php $service = get_field('service'); ?>
		<section class="our-services service-details">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="section-title">
							<?php if ($service['sub_title']): ?>
							<h6 class="sub-title text-uppercase"><?php echo $service['sub_title']; ?></h6>
							<?php endif; ?>
							<h3 class="title text-uppercase"><?php the_title(); ?></h3>
							<span class="separator left"><span></span></span>
						</div>

						<?php if ($service['content']): ?>
						<div class="content">
							<?php echo $service['content']; ?>
						</div>
						<?php endif; ?>

						<?php if ($service['image']): ?>
						<div class="media visible-sm visible-xs">
							<img src="<?php echo $service['image']['url']; ?>" class="img-responsive" alt="<?php echo $service['image']['alt']; ?>">
						</div>
						<?php endif; ?>

						<?php if ($service['lists']): ?>
						<ul class="list-unstyled">
							<?php foreach ($service['lists'] as $list): 
								if(!$list['position']): ?>
							<li><?php echo $list['item']; ?></li>
							<?php endif; endforeach; ?>
						</ul>
						<?php endif; ?>
					</div>

					<div class="col-md-6 col-sm-12 col-xs-12">
						<?php if ($service['image']): ?>
						<div class="media hidden-sm hidden-xs">
							<img src="<?php echo $service['image']['url']; ?>" class="img-responsive" alt="<?php echo $service['image']['alt']; ?>">
						</div>
						<?php endif; ?>

						<?php if ($service['lists']): ?>
						<ul class="list-unstyled">
							<?php foreach ($service['lists'] as $list):
								if($list['position']): 
							 ?>
							<li><?php echo $list['item']; ?></li>
							<?php endif; endforeach; ?>
						</ul>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</section><!-- /our-services -->

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
							'post__not_in' => array(get_the_ID())
						);

						$loop = new WP_Query( $args );
						if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post();
						$service = get_field('service');
						$featured_image = get_field('featured_image_service');
						$serviceImg = $featured_image ? $featured_image['url'] : get_template_directory_uri().'/images/placeholder-service.jpg';
					?>
					<a href="<?php the_permalink(); ?>" class="col-md-6 col-sm-6 col-xs-6 col">
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