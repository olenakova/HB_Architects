<footer class="footer">
    <div class="footer-left">
        <h2 class = "page-header"><a href="<?php echo get_site_url(); ?>"><span class="logo2">HB</span> Architects</a></h2>
        <p>HB are delighted to announce we have been appointed as Architect and Lead Consultant on the new
            Parramatta Eels Centre for Excellence & Community Facilities. A significant project for the
            National Rugby League.
        </p>
        <div class="socials">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-youtube"></i></a>
        </div>
    </div>
    <ul class="footer-right">
        <li>
            <h2><a href="<?php echo site_url('/about'); ?>">About</a></h2>
            <ul class="box">
                <li><a href="<?php echo get_page_link(9); ?>">Our History</a></li>
                <li><a href="<?php echo get_page_link(16); ?>">Our Philosophy</a></li>
                <li><a href="<?php echo get_page_link(14); ?>">Our Team</a></li>
                <li><a href="<?php echo get_page_link(11); ?>">Our Services</a></li>
            </ul>
        </li>
        <li class="blog">
            <h2><a href="<?php echo site_url('/blog'); ?>">Blog</a></h2>
            <ul class="box">
            <?php
            $three_posts = new WP_Query(array(
                'post_type' => 'post',
                'posts_per_page' => 3
            ));

            while ($three_posts -> have_posts()) {
	            $three_posts -> the_post();
	        ?>
                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
            <?php
            }
            wp_reset_postdata();
            ?>
            </ul>
        </li>
        <li>
            <h2>Address</h2>
            <ul class="box">
                <li>IQ Business Center</li>
                <li>Bolsunovska St, 13-15, Kyiv, 02000</li>
                <li>Ukraine</li>
                <li>Email: email@hbarch.com.au</li>
            </ul>
        </li>
    </ul>

    <div class="footer-bottom">
        <p>All Right reserved by &copy;conceptual 2020</p>
    </div>
</footer>
<?php
	wp_footer();
?>
</body>
</html>
