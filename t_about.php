<?php
/*
Template Name: About Us
*/
get_header(); ?>
	
	<div id="primary" class="content-area">
		<?php $about_us = get_field('about_us'); if ($about_us): ?>
		<section class="about-us coverbg" <?php if($about_us['bg']): ?>style="background-image: url(<?php echo $about_us['bg']; ?>);"<?php endif; ?>>
			<div class="container">
				<div class="row align-center-v justify-content-center">
					<?php if ($about_us['sub_title'] || $about_us['title'] || $about_us['content']): ?>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="content">
							<?php if ($about_us['sub_title'] || $about_us['title']): ?>
							<div class="section-title">
								<?php if ($about_us['sub_title']): ?>
								<h6 class="sub-title text-uppercase"><?php echo $about_us['sub_title']; ?></h6>
								<?php endif; ?>
								<?php if ($about_us['title']): ?>
								<h3 class="title text-uppercase"><?php echo $about_us['title']; ?></h3>
								<span class="separator left"><span></span></span>
								<?php endif; ?>
							</div>
							<?php endif; ?>

							<?php if ($about_us['content']): ?>
							<?php echo $about_us['content']; ?>
							<?php endif; ?>
						</div>
					</div>
					<?php endif; ?>

					<?php if ($about_us['image']): ?>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="media">
							<img src="<?php echo $about_us['image']['url']; ?>" class="img-responsive" alt="<?php echo $about_us['image']['alt']; ?>">
						</div>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</section><!-- /about-us -->
		<?php endif; ?>

		<?php $team_head = get_field('team_head'); if ($team_head): ?>
		<section class="section-nav">
			<div class="container-fluid">
				<div class="row eq-height justify-content-center">
					<?php foreach ($team_head as $teamhead): ?>
					<a href="<?php echo $teamhead['url']; ?>" class="nav-item smoothScroll align-center col-md-6 col-sm-6 col-xs-6 col">
						<h5><?php echo $teamhead['text']; ?></h5>

						<div class="icon">
							<i class="icon-arrow-down"></i>
						</div>
					</a><!-- /team-nav-item -->
					<?php endforeach; ?>
				</div>
			</div>
		</section><!-- /section-nav -->
		<?php endif; ?>

		<?php $counters = get_field('counters'); if ($counters): ?>
		<section class="counters">
			<div class="container">
				<div class="row">
					<?php foreach ($counters as $counter): ?>
					<div class="col-md-4 col-sm-6 col-xs-6 col-xs">
						<div class="counter-item text-center">
							<?php if ($counter['number'] || $counter['extension']): ?>
							<div class="lrg-num">
								<?php if ($counter['number']): ?>
								<span class="counter"><?php echo $counter['number']; ?></span>
								<?php endif; ?>
								<?php if ($counter['extension']): ?>
								<span><?php echo $counter['extension']; ?></span>
								<?php endif; ?>
							</div>
							<?php endif; ?>

							<?php if ($counter['sub_title']): ?>
							<h6 class="text-uppercase"><?php echo $counter['sub_title']; ?></h6>
							<?php endif; ?>
							<?php if ($counter['title']): ?>
							<h4 class="text-uppercase"><?php echo $counter['title']; ?></h4>
							<span class="separator"><span></span></span>
							<?php endif; ?>
						</div>
					</div><!-- /counter-item -->
					<?php endforeach; ?>
				</div>
			</div>
		</section><!-- /counters -->
		<?php endif; ?>

		<?php $f_strength = get_field('financial_strength'); if ($f_strength): ?>
		<section class="financial-strength">
			<div class="container">
				<div class="row">	
					<?php if ($f_strength['title']): ?>
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="section-title">
							<h3 class="title text-uppercase"><?php echo $f_strength['title']; ?></h3>
						</div>
					</div>
					<?php endif; ?>

					<?php if ($f_strength['content']): ?>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="content">
							<?php echo $f_strength['content']; ?>
						</div>
					</div>
					<?php endif; ?>

					<?php if ($f_strength['lists']): ?>
					<div class="col-md-offset-1 col-md-5 col-sm-12 col-xs-12">
						<ul class="financial-list list-unstyled">
							<?php foreach ($f_strength['lists'] as $list): ?>
							<li>
								<div class="separator pull-left">
									<span></span>
								</div>
								<div class="content">
									<p><?php if($list['link']['text']): ?><a href="<?php echo $list['link']['url']; ?>"><?php echo $list['link']['text']; ?></a><?php endif;?> <?php echo $list['item']; ?></p>
								</div>
							</li>
							<?php endforeach; ?>
						</ul>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</section><!-- /financial-strength. -->
		<?php endif; ?>

		<a id="team" class="blankSpace"></a>
		<section class="team">
			<div id="leadership">
				<?php $leadership = get_field('leadership'); if ($leadership): ?>
				<div class="leadership-head">
					<div class="container">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="section-title text-center">
									<?php if ($leadership['sub_title']): ?>
									<h6 class="sub-title text-uppercase"><?php echo $leadership['sub_title']; ?></h6>
									<?php endif; ?>
									<?php if ($leadership['title']): ?>
									<h3 class="title text-uppercase"><?php echo $leadership['title']; ?></h3>
									<span class="separator"><span></span></span>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
				</div><!-- /leadership-head -->
				<?php endif; ?>

				<?php
					$counter = 0;
					$args = array(
						'post_type' => 'team',
						'orderby' => 'ASC',
						'posts_per_page' => -1,
						'tax_query' => array(
					        array (
					            'taxonomy' => 'team_category',
					            'field' => 'slug',
					            'terms' => 'leadership',
					        )
					    ),
					);

					$loop = new WP_Query( $args );
					if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post();
					$team_image = get_field('team_image');
					$team_position = get_field('team_position');
					$team_description = get_field('team_description');
					$teamImg = $team_image ? $team_image['url'] : get_template_directory_uri().'/images/placeholder-team.jpg';
				?>
				<div class="leadership-member">
					<div class="container">
						<div class="row">
							<div class="col-md-3 col-sm-4 col-xs-12 <?php if($counter % 2) echo 'col-md-push-9 col-sm-push-8'; ?>">
								<div class="media">
									<img src="<?php echo $teamImg; ?>" class="img-responsive" alt="<?php echo $team_image['alt']; ?>">
								</div>
							</div>

							<div class="col-md-9 col-sm-8 <?php if($counter % 2) echo 'col-md-pull-3 col-sm-pull-4'; ?> col-xs-12">
								<div class="content">
									<h4 class="title"><?php the_title(); ?></h4>

									<?php if ($team_position): ?>
									<h5 class="position"><?php echo $team_position; ?></h5>
									<?php endif; ?>

									<?php if ($team_description): ?>
										<?php echo $team_description; ?>
									<?php endif; ?>
									
								</div>
							</div>
						</div>
					</div>
				</div><!-- /leadership -->
				<?php $counter++; endwhile; else : ?>
					<section class="not-found text-center"><h3><?php _e('No Team Member found!', 'beacon'); ?></h3></section>
				<?php endif; wp_reset_postdata(); ?>
			</div><!-- leadership-wrap -->

			<div id="marketing-team">
				<div class="container">
					<?php $marketing = get_field('marketing'); if ($marketing): ?>
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="section-title text-center">
								<h3 class="title text-uppercase"><?php echo $marketing['title']; ?></h3>
								<span class="separator"><span></span></span>
							</div>
						</div>
					</div>
					<?php endif; ?>

					<div class="row eq-height">
						<?php
							$args = array(
								'post_type' => 'team',
								'orderby' => 'ASC',
								'posts_per_page' => -1,
								'tax_query' => array(
							        array (
							            'taxonomy' => 'team_category',
							            'field' => 'slug',
							            'terms' => 'marketing',
							        )
							    ),
							);

							$loop = new WP_Query( $args );
							if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post();
							$team_image = get_field('team_image');
							$team_position = get_field('team_position');
							$teamImg = $team_image ? $team_image['url'] : get_template_directory_uri().'/images/placeholder-team.jpg';
						?>
						<div class="mk-team col-md-2 col-sm-3 col-xs-6 col">
							<div class="media">
								<img src="<?php echo $teamImg; ?>" class="img-responsive" alt="<?php echo $team_image['alt']; ?>">
							</div>

							<div class="content">
								<h6 class="name"><?php the_title(); ?></h6>

								<?php if ($team_position): ?>
								<p class="position"><?php echo $team_position; ?></p>
								<?php endif; ?>
							</div>
						</div><!-- /mk-team -->
						<?php endwhile; else : ?>
							<section class="not-found text-center"><h3><?php _e('No Team Member found!', 'beacon'); ?></h3></section>
						<?php endif; wp_reset_postdata(); ?>
					</div>	
				</div>
			</div>

		</section><!-- /team -->

		<a id="career-opp" class="blankSpace"></a>
		<section class="join-team">
			<div class="container">
				<div class="row">
					<?php $career_opp = get_field('career_opportunities'); if ($career_opp['title']): ?>
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="section-title">
							<h3 class="title text-uppercase"><?php echo $career_opp['title']; ?></h3>
							<span class="separator lg"><span></span></span>
						</div>
					</div>
					<?php endif; ?>
				</div>

				<div class="row">
					<?php if ($career_opp['content']): ?>
					<div class="col-md-5 col-sm-12 col-xs-12">
						<div class="content">
							<?php echo $career_opp['content']; ?>
						</div>
					</div>
					<?php endif; ?>

					<div class="col-md-7 col-sm-12 col-xs-12">
						<div class="contact-form">
							<?php echo do_shortcode('[gravityform id="1" title="false" description="false" tabindex="10" ajax="true"]'); ?>
						</div>
					</div>
				</div>
			</div>
		</section><!-- /join-team -->

	</div><!-- /primary -->
		
<?php get_footer(); ?>