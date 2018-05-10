<?php get_header(); ?>

	<div id="primary" class="content-area">
		<?php $equipment = get_field('equipment'); if($equipment): ?>
		<section class="our-services equipments-main">
			<div class="container">
				<div class="row">
					<?php if ($equipment['sub_title'] || $equipment['title'] || $equipment['content']): ?>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<?php if ($equipment['sub_title'] || $equipment['title']): ?>
						<div class="section-title">
							<?php if ($equipment['sub_title']): ?>
							<h6 class="sub-title text-uppercase"><?php echo $equipment['sub_title']; ?></h6>
							<?php endif; ?>
								
							<?php if ($equipment['title']): ?>
							<h3 class="title text-uppercase"><?php echo $equipment['title']; ?></h3>
							<span class="separator left"><span></span></span>
							<?php endif; ?>
						</div>
						<?php endif ?>

							
						<?php if ($equipment['content']): ?>
						<div class="content">
							<?php echo $equipment['content']; ?>
						</div>
						<?php endif; ?>
					</div>
					<?php endif; ?>
						
					<?php if ($equipment['image']): ?>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="media">
							<img src="<?php echo $equipment['image']['url']; ?>" class="img-responsive" alt="<?php echo $equipment['image']['alt']; ?>">
						</div>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</section><!-- /our-services -->
		<?php endif; ?>

		<section class="specifications">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<hr>
					</div>	
				</div>

				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<?php $specifications_title = get_field('specifications_title'); if ($specifications_title): ?>
						<div class="section-title">
							<h3 class="title text-uppercase"><?php echo $specifications_title; ?></h3>
						</div>
						<?php endif; ?>

						<div class="table-specifications table-responsive">
							<?php 
								$specifications = get_field('specifications');
								if ($specifications) : 
									foreach($specifications as $specification) :

									    echo '<table class="table" border="0">';

									        if ($specification['table']['header']) {

									            echo '<thead>';

									                echo '<tr>';

									                    foreach ($specification['table']['header'] as $th) {

									                        echo '<th>';
									                            echo $th['c'];
									                        echo '</th>';
									                    }

									                echo '</tr>';

									            echo '</thead>';
									        }

									        echo '<tbody>';

									            foreach ($specification['table']['body'] as $tr ) {

									                echo '<tr>';

									                    foreach ( $tr as $td ) {

									                        echo '<td>';
									                            echo $td['c'];
									                        echo '</td>';
									                    }

									                echo '</tr>';
									            }

									        echo '</tbody>';

									    echo '</table>';
									endforeach;    
								endif;
							?>
						</div>

						<?php $disclaimer_text = get_field('disclaimer_text'); if ($disclaimer_text): ?>
						<p class="note"><?php echo $disclaimer_text; ?></p>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</section><!-- /specifications -->

	</div><!-- /primary -->

<?php get_footer(); ?>