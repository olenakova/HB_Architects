<?php
    function my_theme_files() {
		wp_enqueue_style('my-theme-styles', get_stylesheet_uri());
		wp_enqueue_script('font-awesome', 'https://kit.fontawesome.com/a2945ca0d8.js');
	}

	add_action('wp_enqueue_scripts', 'my_theme_files');

	function my_theme_features() {
		add_theme_support('title-tag');
		add_theme_support('post-thumbnails');
		add_image_size('team-card', 400, 260, true);
		add_image_size('project-card', 400, 260, true);
		add_image_size('post-content', 768, 512, true);
		add_image_size('project-photo', 1024, 691, true);
	}

	add_action('after_setup_theme', 'my_theme_features');

    function enroll_form_html() {
        ?>
        <section id="enroll-form">
            <h3 class="post-section-heading"><?php echo get_option('my_form_title'); ?></h3>
            <p>Lets get in touch and talk about your next project.</p>
            <form method="post" action="<?php echo admin_url('admin-post.php'); ?>">
                <input type="hidden" name="action" value="enroll">

                <label for="name" hidden>Name</label><br>
                <input type="text" id="name" name="name" placeholder="Name"><br>

                <label for="email" hidden>Email<abbr title="required field">*</abbr></label><br>
                <input type="email" id="email" required name="email" placeholder="Email"><br>

                <label for="subject" hidden>Subject</label><br>
                <input type="text" id="subject" name="subject" placeholder="Subject"><br>

                <label for="comment" hidden>Comment</label><br>
                <textarea name="comment" id="comment" maxlength="250" rows="1" placeholder="Comment"></textarea><br>

                <input type="submit" name="enroll-submit" value="Send Message">
            </form>
        </section>
        <?php
    }

    function handler_enroll_form() {
        $valid = true;
        if (isset($_POST['enroll-submit'])){
            $name = '';
            if (!empty($_POST['name'])) {
                $name = sanitize_text_field($_POST['name']);
            } else {
                $name = 'No Name ' .rand(0, 1000);
            }

            $email = '';
            if (!isset($_POST['email'])) {
                $valid = false;
            } else {
                $email = sanitize_email($_POST['email']);
                if (!$email) {
                    $valid = false;
                }
            }

            $subject = '';
            if (!empty($_POST['subject'])) {
                $subject = sanitize_text_field($_POST['subject']);
            } else {
                $subject = 'No subject ...';
            }

            $comment = '';
            if (!empty($_POST['comment'])) {
                $comment = sanitize_textarea_field($_POST['comment']);
            } else {
                $comment = 'No comments ...';
            }

            $form_content = '';
            if ($valid) {
                $form_content = 'Name: ' .$name.'<br>';
                $form_content .= 'Email: ' .$email.'<br>';
                $form_content .= 'Subject: ' .$subject.'<br>';
                $form_content .= 'Comment: ' .$comment.'<br>';

                wp_insert_post(array(
                    'post_title' => $name. ' - ' . wp_date('d.m.y h:i'),
                    'post_type' => 'message',
                    'post_content' => $form_content,
                    'post_status' => 'publish',
                    'meta_input' => array(
                        'email' => $email
                    )
                ));

                wp_safe_redirect(site_url('thank-you'));
                exit;
            } else {
                wp_safe_redirect(site_url('ooops'));
                exit;
            }
        }
    }

    add_action('admin_post_enroll', 'handler_enroll_form');
    add_action('admin_post_nopriv_enroll', 'handler_enroll_form');

    add_action('get_footer', 'enroll_form_html');

    function show_map() {
        if (is_page('home')){
            ?>
            <div class="map-container">
                <div class="map-responsive">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1789.7175349147276!2d30.552626351859406!3d50.421817454059685!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d4cf6e072b61a3%3A0x28b8941f826fe32!2sIQ%20Business%20Center!5e1!3m2!1sen!2sus!4v1669580410059!5m2!1sen!2sus"
                            width="800" height="600" style="border:0;" allowfullscreen=""
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
            <?php
        }
        if (is_page('contact')){
            ?>
            <div class="map-container2">
                <div class="map-responsive2">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d20336.95574448938!2d30.544325738310153!3d50.42024572407322!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d4cf6e072b61a3%3A0x28b8941f826fe32!2sIQ%20Business%20Center!5e0!3m2!1sen!2sua!4v1669578299305!5m2!1sen!2sua" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <?php
        }
    }

    add_action('get_footer', 'show_map');


    add_action('init', 'create_project_taxonomies');

    function create_project_taxonomies() {
        register_taxonomy( 'portfolio', array( 'project' ), array(
            'label' => '',
            'labels' => array(
                'name' => 'Portfolios',
                'singular_name' => 'Portfolio',
                'menu_name' => 'Portfolios',
                'all_items' => 'All Portfolios',
                'edit_item' => 'Edit Portfolio',
                'view_item' => 'View Portfolio',
                'update_item' => 'Update Portfolio',
                'add_new_item' => 'Add New Portfolio',
                'new_item_name' => 'New Portfolio Name',
                'parent_item' => null,
                'parent_item_colon' => null,
                'search_items' => 'Search Portfolios',
                'popular_items' => 'Popular Portfolios',
                'separate_items_with_commas' => 'Separate portfolios with commas',
                'add_or_remove_items' => 'Add or remove portfolios',
                'choose_from_most_used' => 'Choose from the most used portfolios',
                'not_found' => 'Portfolios not found',
                'back_to_items' => 'Back to Portfolios'
            ),
            'public' => true,
            'publicly_queryable' => null,
            'hierarchical' => false,
            'show_in_rest' => true,
            'show_in_quick_edit' => true,
            'show_admin_column' => true,
            'rewrite' => array(
                'slug' => 'project-categories',
                'with_front' => false,
                'hierarchical' => true,
            )
        ));

        register_taxonomy_for_object_type( 'portfolio', 'project' );
    }

    function edit_project_query($query) {
        if (!is_admin()  && is_post_type_archive('project')) {
            $query -> set('posts_per_page', 12);
        }
        if (!is_admin() && is_page('our-team') || is_page('about')) {
            $query -> set('posts_per_page', -1);
        }

    }

    add_action('pre_get_posts', 'edit_project_query');

?>