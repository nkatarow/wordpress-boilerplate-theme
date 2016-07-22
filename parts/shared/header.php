<!DOCTYPE HTML>
<html>
    <head>
        <title><?php bloginfo( 'name' ); ?><?php wp_title( '|' ); ?></title>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"><!-- Remove if you're not building a responsive site. (But then why would you do such a thing?) -->
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon.ico"/>
        <?php wp_head(); ?>
        <?php
            // Figure out what our server name is
            $host = $_SERVER['HTTP_HOST'];

            // If it's the dev environment...
            if ($host == 'wordpress-boilerplate.dev') {
        ?>
            <!-- Then provide the regular compiled CSS/JS files. -->
            <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/dist/css/main.css" type="text/css" media="all">
            <script src="<?php echo get_template_directory_uri(); ?>/dist/js/header-scripts.js"></script>
        <?php } else { ?>
            <!-- Otherwise, provide the compiled and minified CSS file. -->
            <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/dist/css/main.min.css" type="text/css" media="all">
        
            <!-- And the header scripts compiled and uglified -->
            <script src="<?php echo get_template_directory_uri(); ?>/dist/js/header-scripts.min.js"></script>
        <?php } ?>
    </head>
    <body <?php body_class(); ?>>
        <header>
        <!--
            <a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a>
            <?php bloginfo( 'description' ); ?>
            <?php get_search_form(); ?>
         -->
         </header>
