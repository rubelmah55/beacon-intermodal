<?php
/*
Template Name: Contact Us
*/
get_header(); ?>

	<div id="primary" class="content-area">
		<?php $contact_head = get_field('contact_head'); if ($contact_head): ?>
		<section class="section-nav">
			<div class="container-fluid">
				<div class="row">
					<?php foreach ($contact_head as $item): ?>
					<a href="<?php echo $item['url']; ?>" class="nav-item smoothScroll align-center col-md-6 col-sm-6 col-xs-6">
						<?php if ($item['text']): ?>
						<h5><?php echo $item['text']; ?></h5>
						<?php endif; ?>

						<div class="icon">
							<i class="icon-arrow-down"></i>
						</div>
					</a><!-- /team-nav-item -->
					<?php endforeach; ?>
				</div>
			</div>
		</section><!-- /section-nav -->
		<?php endif; ?>

		<section class="contact-us">
			<div class="container">
				<?php $contact_us = get_field('contact_us'); if ($contact_us): ?>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="section-title">
							<h3 class="title text-uppercase"><?php echo $contact_us['title']; ?></h3>
							<span class="separator lg"><span></span></span>
						</div>
					</div>
				</div>
				<?php endif; ?>

				<div class="row">
					<?php $contacts = get_field('contacts', 'options'); if ($contacts): ?>
					<div class="col-md-5 col-sm-12 col-xs-12">
						<div class="content">
							<ul class="list-unstyled">
								<?php foreach ($contacts as $contact): ?>
								<li>
									<?php if ( ( in_array('title', $contact['choose_options'])) && $contact['title'] ): ?>
									<h6><?php echo $contact['title']; ?></h6>
									<?php endif; ?>

									<?php if ( ( in_array('name', $contact['choose_options'])) && $contact['name'] ): ?>
									<h5><?php echo $contact['name']; ?></h5>
									<?php endif; ?>

									<?php if ( ( in_array('address', $contact['choose_options']) ) && $contact['address'] ): ?>
									<a href="<?php echo $contact['address']['google_map_url'] ?>" class="adress" target="_blank"><?php echo $contact['address']['address'] ?></a>
									<?php endif; ?>

									<?php if ( ( in_array('email', $contact['choose_options']) ) && $contact['email'] ): ?>
									<p>Email: <a href="mailto:<?php echo $contact['email']; ?>"><?php echo $contact['email']; ?></a></p>
									<?php endif; ?>

									<?php if ( ( in_array('phone1', $contact['choose_options']) ) && $contact['phone_1'] || ( in_array('phone2', $contact['choose_options']) ) && $contact['phone_2'] ): ?>
									<p>Office: <a href="tel:<?php echo $contact['phone_1']; ?>"><?php echo $contact['phone_1']; ?></a> <?php if ( ( in_array('phone2', $contact['choose_options']) ) && $contact['phone_2']): ?>/ <a href="tel:<?php echo $contact['phone_2']; ?>"><?php echo $contact['phone_2']; ?></a><?php endif; ?></p>
									<?php endif; ?>
								</li>
								<?php endforeach; ?>
							</ul>
						</div>
					</div>
					<?php endif; ?>

					<div class="col-md-7 col-sm-12 col-xs-12">
						<div class="contact-us-form">
							<?php echo do_shortcode('[gravityform id="2" title="false" description="false" tabindex="20" ajax="true"]'); ?>
						</div>
					</div>
				</div>
			</div>
		</section><!-- /contact-us -->

		<?php $countries = get_field('countries'); if ($countries): ?>
		<a id="countries" class="blankSpace"></a>
		<section class="countries features">
			<div class="container-fluid">
				<div class="row eq-height justify-content-center">
					<?php foreach ($countries as $country): ?>
					<a href="#<?php echo $country['location']->post_name; ?>" class="single-location smoothScroll feature text-center col-md-2 col-sm-4 col-xs-6 col">
						<div class="icon">
							<i class="icon-<?php echo $country['icon']; ?>"></i>
						</div>

						<div class="content">
							<?php if ($country['title']): ?>
							<h5><?php echo $country['title']; ?></h5>
							<?php else: ?>
							<h5><?php echo $country['location']->post_title; ?></h5>
							<?php endif; ?>
						</div>

						<div class="arrow">
							<button><i class="icon-arrow-down"></i></button>
						</div>
					</a><!-- /single-location -->
					<?php endforeach ?>

				</div>
			</div>
		</section><!-- /countrys -->
		<?php endif; ?>

		<section id="locations">
			<div class="container">
				<?php
					$args = array(
						'post_type' => 'location',
						'orderby' => 'ASC',
						'posts_per_page' => -1,
					);

					$loop = new WP_Query( $args );
					if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post();
					$location = get_field('location');
				?>
				<a id="<?php echo $post->post_name; ?>" class="blankSpace"></a>
				<div class="country-location">
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="section-title">
								<h3 class="title text-uppercase"><?php the_title(); ?></h3>
								<span class="separator lg"></span>
							</div>
						</div>
					</div>

					<?php $counter = 1; if ($location): foreach($location as $loc): ?>
					<div class="row location-item">
						<?php if ($counter !== 1): ?>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<span class="separator lg"></span>
						</div>
						<?php endif; ?>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<?php if ($loc['title']): ?>
							<h6 class="title text-uppercase"><?php echo $loc['title']; ?></h6>
							<?php endif; ?>
						</div>

						<?php if ($loc['single_location']): foreach ($loc['single_location'] as $s_location): ?>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<div class="location">
								<?php if ($s_location['title']): ?>
								<h5 class="name"><?php echo $s_location['title']; ?></h5>
								<?php endif; ?>

								<?php if ($s_location['location']): ?>
								<span class="lc-name"><?php echo $s_location['location']; ?></span>
								<?php endif; ?>

								<?php if ($s_location['email'] || $s_location['office_number'] || $s_location['mobile']): ?>
								<ul class="list-unstyled">
									<?php if ($s_location['email']): ?>
									<li>Email: <a href="mailto:<?php echo $s_location['email']; ?>"><?php echo $s_location['email']; ?></a></li>
									<?php endif; ?>
									
									<?php if ($s_location['office_number']): ?>
									<li>Office: <a href="tel:<?php echo $s_location['office_number']; ?>"><?php echo $s_location['office_number']; ?></a></li>
									<?php endif; ?>

									<?php if ($s_location['mobile']): ?>
									<li>Office: <a href="tel:<?php echo $s_location['mobile']; ?>"><?php echo $s_location['mobile']; ?></a></li>
									<?php endif; ?>
								</ul>
								<?php endif; ?>
							</div>
						</div>
						<?php endforeach; endif; ?>
					</div><!-- /row -->
					<?php $counter++; endforeach; endif; ?>
				</div><!-- /asia -->
				<?php endwhile; else : ?>
				<section class="not-found text-center"><h3><?php _e('No Location found!', 'beacon'); ?></h3></section>
				<?php endif; wp_reset_postdata(); ?>
			</div>
		</section><!-- /single-locations -->

		<?php $resale = get_field('resale_information'); if ($resale): ?>
		<a id="resale-information" class="blankSpace"></a>
		<section class="resale-information" class="contact-information coverbg" <?php if($resale['bg']): ?>style="background-image: url(<?php echo $resale['bg']; ?>);"<?php endif; ?>>
			<div class="container">
				<div class="row">
					<?php if ($resale['sub_title'] || $resale['title'] || $resale['content']): ?>
					<div class="col-md-12 col-sm-12 col-xs-12">
						<?php if ($resale['sub_title'] || $resale['title']): ?>
						<div class="section-title">
							<?php if ($resale['sub_title']): ?>
							<h6 class="sub-title text-uppercase"><?php echo $resale['sub_title']; ?></h6>
							<?php endif; ?>

							<?php if ($resale['title']): ?>
							<h3 class="title text-uppercase"><?php echo $resale['title']; ?></h3>
							<span class="separator left"><span></span></span>
							<?php endif; ?>
						</div>
						<?php endif; ?>

						<?php if ($resale['content']): ?>
						<?php echo $resale['content']; ?>
						<?php endif; ?>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</section><!-- /contact-information -->
		<?php endif; ?>

		<section class="back-top">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<a href="#header" class="content smoothScroll">
							<div class="icon">
								<i class="icon-arrow-up"></i>
							</div>
							<h6>Back to Top</h6>
						</div>
					</div>
				</div>
			</div>
		</section><!-- /back-top -->

	</div><!-- /primary -->
	
<?php get_footer(); ?>