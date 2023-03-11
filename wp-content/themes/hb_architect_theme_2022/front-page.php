<?php
	get_header();
?>

<div class="headings-front" style="background-image: url(<?php
	echo get_theme_file_uri('/images/architect.jpg');
?>);">
    <h1 class="page-header">
        <span class="logo1">HB</span> <span class="logo-part2">Architects</span>
    </h1>
</div>

<?php
	while (have_posts()){
		the_post();
?>

<div class="main-container">
	<section class="main-projects">
		<h3 class="post-section-heading">Projects</h3>
		<div class="project-cards">
        <?php
	        $eight_projects = new WP_Query(array(
		        'post_type' => 'project',
		        'posts_per_page' => 8,
		        'orderby' => 'menu_order',
                'order' => 'DESC'
	        ));

            while ($eight_projects -> have_posts()){
                $eight_projects -> the_post();
        ?>
            <div class="project-card">
				<a href="<?php the_permalink(); ?>">
                    <img src="<?php echo get_the_post_thumbnail_url(0, 'project-card'); ?>"
                         alt="<?php the_title(); ?>">
					<span class="project-name">
                            <?php the_title(); ?>
                    </span>
				</a>
			</div>
            <?php } ?>
		</div>
		<div class="view-more">
			<a href="<?php echo site_url('/projects'); ?>">More Projects</a>
		</div>
	</section>
</div>

<section class="about-section">
	<h3 class="post-section-heading">About</h3>
	<p class="generic-content">
        <?php
            $text = apply_filters( 'the_content', get_post(2) -> post_content );
            echo wp_trim_words($text, 80);
        ?>
		<a href="<?php echo site_url('/about'); ?>" class="read-more-link">Read more</a>
	</p>

	<div class="team-cards">
		<?php
			$four_members = new WP_Query(array(
				'post_type' => 'member',
				'posts_per_page' => 4,
                'orderby' => 'menu_order',
				'order' => 'ASC'
			));

			while ($four_members -> have_posts()){
				$four_members -> the_post();
		?>
		<div class="team-card">
            <a href="<?php the_permalink(); ?>">
                <img src="<?php echo get_the_post_thumbnail_url(0, 'team-card'); ?>"
                     alt="<?php the_title(); ?>">
                <h3><?php the_title(); ?></h3>
                <p class="profession"><?php the_field('member_profession'); ?></p>
                <p><p><?php echo wp_trim_words(get_the_content(), 18); ?></p></p>
            </a>
			<div class="contact-link"><a href="<?php the_permalink(); ?>">Contact</a></div>
		</div>
        <?php } wp_reset_postdata(); ?>
	</div>
</section>

<?php
	}
	get_footer();
?>
