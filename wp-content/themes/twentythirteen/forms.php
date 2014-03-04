<?php
/*
Template Name: Forms
*/
?>
<?php get_header(); ?>
	
	<div id="primary" class="forms-page">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<div id="prof-serv-main-title">FORMS</div>

				<div class="service-divider-cont"><img class="service-divider" src="/wp-content/images/hp-content/divider.png" /></div>

				<div class="prof-serv-cont">
					<div class="prof-serv-title">SCHOOL FORMS</div>
					<div class="service-list-container">
						<div class="serv-title-cont">
							<div class="serv-title">
								<a class="form-link" href="/school-information-form/">School Information Form</a>
							</div>
						</div>
						<!-- <div class="serv-title-cont">
							<div class="serv-title">
								<a class="form-link" href="/school-information-form/">School Information Form</a>
							</div>
						</div> -->
					</div>
				</div>

				<div class="service-divider-cont"><img class="service-divider" src="/wp-content/images/hp-content/divider.png" /></div>

				<div class="prof-serv-cont">
					<div class="prof-serv-title">CHILD FORMS</div>
					<div class="service-list-container">
						<div class="serv-title-cont">
							<div class="serv-title">
								<a class="form-link" href="/forms/child-and-family-information-form/">Child &amp Family Information Form</a>
							</div>
						</div>
						<div class="serv-title-cont">
							<div class="serv-title">
								<a class="form-link" href="/forms/adolescent-and-family-information-form/">Adolescent &amp Family Information Form</a>
							</div>
						</div>
						<div class="serv-title-cont">
							<div class="serv-title">
								<a class="form-link" href="/forms/adolescent-family-information-form-follow-up-re-evaluation-consultation/">
									Adolescent & Family Information Form: Follow-Up Re-Evaluation / Consultation
								</a>
							</div>
						</div>
					</div>
				</div>

				<div class="service-divider-cont"><img class="service-divider" src="/wp-content/images/hp-content/divider.png" /></div>


				<div class="prof-serv-cont">
					<div class="prof-serv-title">INFORMATIONAL DOCUMENTS</div>
					<div class="service-list-container">

						<?php $eval_loop = new WP_Query( array( 'post_type' => 'pdf_doc', 'order' => 'ASC' ) ); ?>
						<?php while ( $eval_loop->have_posts() ) : $eval_loop->the_post(); $url = get_permalink(); ?>
							<div class="serv-title-cont">
								<div class="serv-title info-doc">
									<a class="form-link" target="blank" href="<?php echo $url; ?>"><?php the_title(); ?></a>
								</div>
							</div>
						<?php endwhile; ?>

					</div>
				</div>



			<?php endwhile; ?>
		<?php endif; ?>
	</div>

<?php get_footer(); ?>