	<footer>
		&copy; <?php echo date("Y"); ?> <?php bloginfo( 'name' ); ?>. All rights reserved.
	</footer>

    <?php
        // Figure out what our server name is
        $host = $_SERVER['HTTP_HOST'];

        // If it's the dev environment...
        if ($host == 'wordpress-boilerplate.dev') {
    ?>
        <!-- Provide the compiled JS file. -->
        <script src="<?php echo get_template_directory_uri(); ?>/dist/js/footer-scripts.js"></script>
        
    <?php } else { ?>
        <!-- Otherwise, provide the compiled and uglified JS file. -->
        <script src="<?php echo get_template_directory_uri(); ?>/dist/js/footer-scripts.min.js"></script>
    <?php } ?>
    </body>
</html>
