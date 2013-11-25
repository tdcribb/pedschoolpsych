<?php
/*
Template Name: About
*/
?>
<?php get_header(); ?>
	
	<div id="primary">

		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>	

				<div id="prof-serv-main-title">ABOUT US</div>	

				

				<div class="about-container">
					<?php $eval_loop = new WP_Query( array( 'post_type' => 'staff', 'order' => 'ASC' ) ); ?>
					<?php while ( $eval_loop->have_posts() ) : $eval_loop->the_post(); ?>
						<div class="service-divider-cont"><img class="service-divider" src="/wp-content/images/hp-content/divider.png" /></div>
						<div class="about-single-cont">
							<div class="about-title"><?php the_title(); ?></div>
							<div class="about-cont">
								<?php the_field('about_staff_content') ?>		
							</div>
						</div>
					<?php endwhile; ?>
				</div>

			<?php endwhile; ?>
		<?php endif; ?>

	</div>

<?php get_footer(); ?>