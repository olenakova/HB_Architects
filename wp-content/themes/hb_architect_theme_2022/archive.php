<?php
	get_header();
?>

<div class="headings-front" style="background-image: url(<?php
		echo get_theme_file_uri( '/images/architect.jpg' );
	?>);">
	<h1 class="page-header">
		<span class="logo1">HB</span> <span class="logo-part2">Architects (<?php the_archive_title(); ?>)</span>
	</h1>
</div>

<div class="main-blogs">
    <div class="page-position page-position-blog">
        <p>
            <a class="parent-link" href="<?php
				echo get_site_url( '/blog' ); ?>">
                <i class="fa-solid fa-house"></i>Back to Home Blog</a>
            <span class="current-title">
                <?php
	                the_archive_title(); ?>
        </span>
        </p>
    </div>
<?php
	while (have_posts()) {
		the_post();
?>

<article class="post-item">
	<div>
		<h2 class='post-title'><a href="<?php the_permalink(); ?>">
				<?php the_title(); ?></a></h2>
		<div class='post-meta'>
			By <?php the_author_posts_link(); ?> |
			<time datetime="<?php
				the_time( 'Y-d-m' ); ?>">
				<?php the_time( 'd/m/Y' ); ?>
			</time>
			| <?php echo get_the_category_list( ', ' ); ?>
		</div>
	</div>

	<div class="post-content">
		<p><?php the_excerpt(); ?></p>
	</div>

	<div class="post-footer">
		<a href="<?php the_permalink(); ?>">Continue reading</a>
	</div>
</article>
<hr>

<?php
	}
	echo paginate_links();
?>
</div>
<?php
	get_footer();
?>