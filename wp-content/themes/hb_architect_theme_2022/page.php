<?php
  get_header();
  while (have_posts()){
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
<?php
	$parentId = wp_get_post_parent_id(get_the_ID());
	$pageChildren = get_pages(array('child_of' => get_the_ID()));
	if ($parentId || $pageChildren) {
		the_page_nav($parentId);
	}
?>
<div class="page-position">
    <p>
        <a class="parent-link" href="
		<?php
			if ( $parentId ) {
				echo get_permalink( $parentId );
			} else {
				echo get_site_url();
			}
		?>">
            <i class="fa-solid fa-house"></i>Back to
			<?php
				if ( $parentId ) {
					echo get_the_title( $parentId );
				} else {
					echo "Home";
				}
			?>
        </a>
        <span class="current-title">
                <?php echo the_title(); ?>
        </span>
    </p>
</div>

<div class="generic-content">
	<?php echo the_content(); ?>
</div>
<div class="clearfix"></div>

<?php
	if (is_page('our-team') || is_page('about')) {
        $members = new WP_Query(array(
            'post_per_page' => -1,
            'post_type' => 'member',
            'order' => 'ASC',
            'orderby' => 'menu_order'
        ))
?>
   <section class="about-section">
       <!--        <h3 class="post-section-heading">About</h3>-->
       <div class="team-cards">
           <?php while ($members -> have_posts()) {
	           $members -> the_post();
           ?>
           <div class="team-card">
               <a href="<?php the_permalink(); ?>">
                   <img src="<?php echo get_the_post_thumbnail_url(0, 'team-card'); ?>"
                        alt="<?php the_title(); ?>">
                   <h3><?php the_title(); ?></h3>
                   <p class="profession"><?php the_field('member_profession') ?></p>
                   <p><?php the_content(); ?></p>
               </a>

               <div class="contact-link"><a href="<?php the_permalink(); ?>">Contact</a></div>
           </div>
           <?php } wp_reset_postdata(); ?>
       </div>
   </section>
<?php
	}
    echo paginate_links();
?>
</main>
<?php
  }
  get_footer();

  function the_page_nav($parentId) {
?>
	  <nav class="page-links">
		  <h2 class="parent-title"><a href="<?php echo the_permalink($parentId); ?>">
				  <?php echo get_the_title($parentId); ?>
			  </a>
		  </h2>
		  <ul>
			  <?php
				  $childOf = $parentId ? $parentId : get_the_ID();
			      wp_list_pages(array(
					'child_of' => $childOf,
				      'sort_column' => 'menu_order',
				      'title_li' => NULL
			    ));
			  ?>
		  </ul>
	  </nav>
<?php
  }
?>


