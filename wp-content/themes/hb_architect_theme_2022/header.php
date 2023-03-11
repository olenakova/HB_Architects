<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head(); ?>
</head>
<body>
<header>
	<div id="main-header-left">
		<a href="<?php echo get_site_url(); ?>"><strong>HB </strong>Architects</a>
	</div>

	<nav id="main-navigation">
		<ul class="menu">
			<li class="menu-link"><a <?php
					if (get_post_type() == 'project' || is_page('projects')) {
						echo "class='current-menu-item'";
					} ?> href="<?php echo site_url('/projects'); ?>">Projects</a>
				<ul class="submenu">
					<li><a href="<?php echo site_url('/project-categories/architecture')?>" class="submenu-link">
                            Architecture
                        </a>
                    </li>
					<li>
                        <a href="<?php echo site_url('/project-categories/small-works')?>" class="submenu-link">
                            Small Works
                        </a>
                    </li>
					<li>
                        <a href="<?php echo site_url('/project-categories/collaborations')?>" class="submenu-link">
                            Collaborations
                        </a>
                    </li>
				</ul>
			</li>
			<li class="menu-link">
                <a <?php
                    if (is_page('about') || wp_get_post_parent_ID(0) == 2) {
                        echo "class='current-menu-item'";
                    } ?> href="<?php echo site_url('/about'); ?>">About</a></li>
			<li class="menu-link"><a <?php
                    if (is_page('contact') || wp_get_post_parent_ID(0) == 121) {
                        echo "class='current-menu-item'";
                    } ?> href="<?php echo site_url('/contact'); ?>">Contact</a></li>
		</ul>
	</nav>

</header>
