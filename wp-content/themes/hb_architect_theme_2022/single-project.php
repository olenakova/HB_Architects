<?php
	get_header();
	while (have_posts()) {
		the_post();
		?>

		<div class="project-headings-front" style="background-image: url(<?php
			echo get_the_post_thumbnail_url(0, 'project-photo');
		?>);">
			<h2 class="page-header">
				<div class="project-logo1">
                    <?php
						the_terms(get_the_ID(), 'portfolio', '', '/', '');
                    ?>
                </div>
                <div class="project-logo2"><?php the_title(); ?></div>
                <div><?php $relatedMembers = get_field('related_members'); ?></div>
			</h2>
		</div>

		<main class="page-main">
			<div class="page-position">
				<p>
					<a class="parent-link" href="<?php echo site_url('/projects'); ?>">
						<i class="fa-solid fa-house"></i>
						All Projects
					</a>
				</p>
			</div>
		</main>

        <section class="about-section">
                    <h3 class="post-section-heading">Architect Related To The Project</h3>
            <div class="team-cards">
                <?php
                  foreach ($relatedMembers as $member) {
                ?>
                    <div class="team-card">
                        <img src="<?php echo get_the_post_thumbnail_url($member, 'team-card'); ?>"
                             alt="<?php the_title(); ?>">
                        <h3><?php echo get_the_title($member); ?></h3>
                        <p class="profession"><?php the_field('member_profession') ?></p>
                        <p><?php
                                $memberText = apply_filters( 'the_content', get_post($member) -> post_content );
                                echo $memberText;
                            ?>
                        </p>
<!--                        <div class="contact-link"><a href="--><?php //echo  get_the_permalink(); ?><!--">More projects by this architect</a></div>-->
                    </div>
                <?php } ?>
            </div>
        </section>

<?php
	}
	get_footer();
?>