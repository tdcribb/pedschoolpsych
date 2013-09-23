
<?php
/*
Template Name: Professional Services
*/
?>
<?php get_header(); ?>
	
	<div id="primary">

		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>	

				<div id="prof-serv-main-title">PROFESSIONAL SERVICES</div>	

				<div class="prof-serv-cont">
					<div class="prof-serv-title">Evaluation</div>
					<div class="service-list-container">
						<?php $eval_loop = new WP_Query( array( 'post_type' => 'evaluation_service', 'order' => 'ASC' ) ); ?>
						<?php while ( $eval_loop->have_posts() ) : $eval_loop->the_post();?>
							<div class="serv-title-cont">
								<div class="serv-title"><?php the_title(); ?></div>
								<div class="serv-excerpt"><?php the_field('service_excerpt'); ?></div>
								<div class="service-view-more">
									<div class="view-more-button" rel="<?php the_title(); ?>">Read More</div>
								</div>
							</div>
						<?php endwhile; ?>
					</div>
				</div>

				<div class="prof-serv-cont">
					<div class="prof-serv-title">Collaborative Consultation</div>
					<div class="service-list-container">
						<?php $cons_loop = new WP_Query( array( 'post_type' => 'consultation_service', 'order' => 'ASC' ) ); ?>
						<?php while ( $cons_loop->have_posts() ) : $cons_loop->the_post();?>
							<div class="serv-title-cont consult-cont">
								<div class="serv-title"><?php the_title(); ?></div>
								<div class="serv-excerpt"><?php the_field('service_excerpt'); ?></div>
								<div class="service-view-more">
									<div class="view-more-button" rel="<?php the_title(); ?>">Read More</div>
								</div>
							</div>
						<?php endwhile; ?>
					</div>
				</div>

				<div class="prof-serv-cont">
					<div class="prof-serv-title">Counseling, Coaching, and Interdisciplinary Intervention</div>
				</div>

			<?php endwhile; ?>
		<?php endif; ?>

	</div>

<?php get_footer(); ?>