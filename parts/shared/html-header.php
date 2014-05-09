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
            $host = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

            echo $host;

            // If it's the dev environment...
            if ($host == 'wordpress-boilerplate.dev/') {
                // Then provide the regular compiled CSS file.
                echo '<link rel="stylesheet" href="/wp-content/themes/Wordpress-Boilerplate-Theme/_ui/compiled/main-dev.css" type="text/css" media="all">';
            } else {
                // Otherwise, provide the compiled and minified CSS file.
                echo '<link rel="stylesheet" href="/wp-content/themes/Wordpress-Boilerplate-Theme/_ui/compiled/main.min.css" type="text/css" media="all">';
            }
        ?>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

        <!-- This script should be customized and minified for production builds -->
        <script src="/wp-content/themes/Wordpress-Boilerplate-Theme/_ui/js/lib/modernizr-dev.js"></script>
    </head>
    <body <?php body_class(); ?>>
