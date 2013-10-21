
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

				<div class="service-divider-cont"><img class="service-divider" src="/wp-content/images/hp-content/divider.png" /></div>

				<div class="prof-serv-cont">
					<div class="prof-serv-title">Evaluation</div>
					<div class="service-list-container">
						<?php $eval_loop = new WP_Query( array( 'post_type' => 'evaluation_service', 'order' => 'ASC' ) ); ?>
						<?php while ( $eval_loop->have_posts() ) : $eval_loop->the_post(); $link = get_permalink();?>
							<div class="serv-title-cont">
								<div class="serv-title"><a href="<?php echo $link; ?>" target="blank"><?php the_title(); ?></a></div>
								<div class="serv-excerpt"><?php the_field('service_excerpt'); ?></div>
							</div>
						<?php endwhile; ?>
					</div>
				</div>

				<div class="service-divider-cont"><img class="service-divider" src="/wp-content/images/hp-content/divider.png" /></div>

				<div class="prof-serv-cont">
					<div class="prof-serv-title">Collaborative Consultation</div>
					<div class="service-list-container">
						<?php $cons_loop = new WP_Query( array( 'post_type' => 'consultation_service', 'order' => 'ASC' ) ); ?>
						<?php while ( $cons_loop->have_posts() ) : $cons_loop->the_post(); $link = get_permalink();?>
							<div class="serv-title-cont consult-cont">
								<div class="serv-title"><a href="<?php echo $link; ?>" target="blank"><?php the_title(); ?></a></div>
								<div class="serv-excerpt"><?php the_field('service_excerpt'); ?></div>
							</div>
						<?php endwhile; ?>
					</div>
				</div>

				<div class="service-divider-cont"><img class="service-divider" src="/wp-content/images/hp-content/divider.png" /></div>

				<div class="prof-serv-cont">
					<div class="prof-serv-title">Counseling, Coaching, and Interdisciplinary Intervention</div>
					
					<div class="service-list-container">
						<?php $cons_loop = new WP_Query( array( 'post_type' => 'counseling_service', 'order' => 'ASC' ) ); ?>
						<?php while ( $cons_loop->have_posts() ) : $cons_loop->the_post(); $link = get_permalink();?>
							<div class="serv-title-cont">
								<div class="serv-title"><a href="<?php echo $link; ?>" target="blank"><?php the_title(); ?></a></div>
								<div class="serv-excerpt"><?php the_field('service_excerpt'); ?></div>
							</div>
						<?php endwhile; ?>
					</div>
				</div>

			<?php endwhile; ?>
		<?php endif; ?>

	</div>

<?php get_footer(); ?>