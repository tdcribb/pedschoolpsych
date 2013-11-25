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
						<div class="serv-title-cont">
							<div class="serv-title">
								<a class="form-link" href="/school-information-form/">School Information Form</a>
							</div>
						</div>
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
								<a class="form-link" href="/school-information-form/">School Information Form</a>
							</div>
						</div>
						<div class="serv-title-cont">
							<div class="serv-title">
								<a class="form-link" href="/school-information-form/">School Information Form</a>
							</div>
						</div>
					</div>
				</div>

				<div class="service-divider-cont"><img class="service-divider" src="/wp-content/images/hp-content/divider.png" /></div>

				<div class="prof-serv-cont">
					<div class="prof-serv-title">SCHOOL FORMS</div>
					<div class="service-list-container">
						<div class="serv-title-cont">
							<div class="serv-title">
								<a class="form-link" href="/school-information-form/">School Information Form</a>
							</div>
						</div>
						<div class="serv-title-cont">
							<div class="serv-title">
								<a class="form-link" href="/school-information-form/">School Information Form</a>
							</div>
						</div>
						<div class="serv-title-cont">
							<div class="serv-title">
								<a class="form-link" href="/school-information-form/">School Information Form</a>
							</div>
						</div>
						<div class="serv-title-cont">
							<div class="serv-title">
								<a class="form-link" href="/school-information-form/">School Information Form</a>
							</div>
						</div>
						<div class="serv-title-cont">
							<div class="serv-title">
								<a class="form-link" href="/school-information-form/">School Information Form</a>
							</div>
						</div>
					</div>
				</div>

			<?php endwhile; ?>
		<?php endif; ?>
	</div>

<?php get_footer(); ?>