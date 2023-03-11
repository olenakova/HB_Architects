<?php
	get_header();
?>

<div class="headings-front" style="background-image: url(<?php
		echo get_theme_file_uri( '/images/architect.jpg' );
	?>);">
	<h1 class="page-header">
		<span class="logo1">HB</span> <span class="logo-part2">Architects Projects</span>
	</h1>
</div>

<main class="page-main">
	<div class="page-position">
		<p>
			<a class="parent-link" href="<?php
				echo get_site_url( '/blog' ); ?>">
				<i class="fa-solid fa-house"></i>Back to Home Blog</a>
			<span class="current-title">
                <?php the_archive_title(); ?>
            </span>
		</p>
	</div>

    <section class="main-projects">
      <div class="project-cards">
<?php
	while (have_posts()) {
		the_post();
?>

<div class="project-card">
    <a href="<?php the_permalink(); ?>">
        <img src="<?php echo get_the_post_thumbnail_url(0, 'project-card'); ?>"
             alt="<?php the_title(); ?>">
        <span class="project-name"><?php the_title(); ?></span>
    </a>
</div>

<?php
    }
    echo paginate_links();
?>

      </div>
    </section>
</main>

<?php
	get_footer();
?>
