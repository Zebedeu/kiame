        </section>
    </main>

 <footer class="page-footer kiame-footer">
        <div class="container colort">
            <div class="links">

<nav class="navbar navbar-light navbar-expand-lg fixed-botton ">
	<!-- Brand and toggle get grouped for better mobile display -->
		<?php
		wp_nav_menu( array(
			'theme_location'    => 'secondary',
			'depth'             => 2,
			'container'         => 'div',
			'container_class'   => 'collapse navbar-collapse',
			'container_id'      => 'navbarNav',
			'fallback_cb'       => 'Kiame_Walker_Nav_Menu::fallback',
			'walker'            => new Kiame_Walker_Nav_Menu(),
		) );
		?>

</nav>

            </div>
            <div class="social-icons"><a href="<?php echo esc_url(get_theme_mod( 'facebook')) ?>"><i class="icon ion-social-facebook"></i></a><a href="<?php echo esc_url(get_theme_mod( 'instagram')) ?>"><i class="icon ion-social-instagram-outline"></i></a><a href="<?php echo esc_url(get_theme_mod( 'twitter')) ?>"><i class="icon ion-social-twitter"></i></a></div>
        </div>
    </footer>
    <?php wp_footer();?>

</body>

</html>