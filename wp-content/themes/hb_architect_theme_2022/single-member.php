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
            <a class="parent-link" href="<?php echo get_page_link(14); ?>">
                <i class="fa-solid fa-house"></i>
                Our Team
            </a>
        </p>
    </div>
</main>

<div class="main-blogs">
    <article class="post-item">
        <div>
            <h2 class='post-title'>Let Us Introduce Our Architect</h2>
        </div>
        <hr>
        <div class="post-content">
            <img class="member-photo" src="<?php echo get_the_post_thumbnail_url(0, 'post-content'); ?>"
                 alt="<?php the_title(); ?>">
            <div class="text-content">
                <h3><?php the_title(); ?></h3>
                <p class="profession"><?php the_field('member_profession') ?></p>
                <div><?php the_content(); ?></div>
            </div>
        </div>
        <div class="clearfix"></div>
    </article>
</div>

<?php } ?>

<div class="main-container">
    <section class="main-projects">
        <h3 class="post-section-heading">Architect's Projects</h3>
        <div class="project-cards">
        <?php
            $related_projects = new WP_Query(array(
                'post_per_page' => -1,
                'post_type' => 'project',
                'meta_query' => array(
                        array(
                                'key' => 'related_members',
                            'compare' => 'LIKE',
                            'value' => '"'.get_the_ID().'"'
                        )
                )
            ));

            while ($related_projects->have_posts()) {
                $related_projects->the_post();
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

<?php
    get_footer();
?>