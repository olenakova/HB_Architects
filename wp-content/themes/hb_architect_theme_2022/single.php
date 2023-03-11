<?php
	get_header();
	while (have_posts()) {
		the_post();
?>

<div class="headings-front" style="background-image: url(<?php
	echo get_theme_file_uri( '/images/architect.jpg' );
?>);">
	<h1 class="page-header">
		<span class="logo1">HB</span> <span class="logo-part2">Architects</span>
	</h1>
</div>

<main class="page-main">
	<div class="page-position">
		<p>
			<a class="parent-link" href="<?php echo site_url('/blog'); ?>">
				<i class="fa-solid fa-house"></i>
				Blog Home
			</a>
			<span class="current-title">
                    By <?php the_author_posts_link(); ?> |
                    <time datetime="<?php the_time('Y-d-m'); ?>">
                    <?php the_time('d/m/Y'); ?>
                    </time> | <?php echo get_the_category_list(', '); ?>
            </span>
		</p>
	</div>
</main>

<div class="main-blogs">
	<article class="post-item">
		<div>
			<h2 class='post-title'><?php the_title(); ?></h2>
		</div>

		<div class="post-content">
            <img src="<?php echo get_the_post_thumbnail_url(0, 'post-content'); ?>"
                 alt="<?php the_title(); ?>">
			<p class="text-content">
				<?php the_content(); ?>
			</p>
		</div>
        <div class="clearfix"></div>
	</article>
</div>

<?php
	}
	get_footer();
?>