<?php
	get_header();
?>

<div class="headings-front" style="background-image: url(<?php
	echo get_theme_file_uri( '/images/architect.jpg' );
?>);">
    <h1 class="page-header">
        <span class="logo1">HB</span> <span class="logo-part2">Architects (Blog)</span>
    </h1>
</div>

<div class="main-blogs">
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
                <time datetime="<?php the_time('Y-d-m'); ?>">
                    <?php the_time('d/m/Y'); ?>
                </time> | <?php echo get_the_category_list(', '); ?>
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
	} echo paginate_links();
?>
</div>
<?php
	get_footer();
?>