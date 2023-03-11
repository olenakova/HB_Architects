<?php

function my_post_types() {
	register_post_type(
'member', array(
            'show_in_rest' => true,
            'supports' => array('title', 'thumbnail', 'editor', 'page-attributes'),
            'public' => true,
            'menu_icon' => 'dashicons-pets',
            'rewrite' => array('slug' => 'members'),
            'labels' => array(
                'name' => 'Members',
                'add_new_item' => 'Add Member',
                'edit_item' => 'Edit Member',
                'singular_name' => 'Member',
                'all_items' => 'All Members'
	        )
		)
	);

	register_post_type(
		'project', array(
			'show_in_rest' => true,
			'supports' => array('title', 'thumbnail', 'editor', 'page-attributes'),
			'public' => true,
			'taxonomies' => array('portfolio'),
			'has_archive' => true,
			'menu_icon' => 'dashicons-admin-multisite',
			'rewrite' => array('slug' => 'projects'),
			'labels' => array(
				'name' => 'Projects',
				'add_new_item' => 'Add Project',
				'edit_item' => 'Edit Project',
				'singular_name' => 'Project',
				'all_items' => 'All Projects'
			)
		)
	);

	register_post_type(
		'message', array(
			'show_in_rest' => true,
			'supports' => array('title', 'editor'),

			'public' => true,
			'publicly_queryable' => false,

			'menu_icon' => 'dashicons-email-alt',
			'rewrite' => array('slug' => 'messages'),
			'labels' => array(
				'name' => 'Messages',
				'add_new_item' => 'Add Message',
				'edit_item' => 'Edit Message',
				'singular_name' => 'Message',
				'all_items' => 'All Messages'
			)
		)
	);
}

add_action('init', 'my_post_types');
?>