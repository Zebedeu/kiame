        </section>
    </main>

 <footer class="page-footer kiame-footer">
        <div class="container">
            <div class="links">

<nav class="navbar navbar-light navbar-expand-lg fixed-botton colort">
	<!-- Brand and toggle get grouped for better mobile display -->
		<?php
		wp_nav_menu( array(
			'theme_location'    => 'secondary',
			'depth'             => 2,
			'menu_class'        => 'nav navbar-nav',
			'fallback_cb'       => 'Kiame_Walker_Nav_Menu::fallback',
			'walker'            => new Kiame_Walker_Nav_Menu(),
		) );
		?>

</nav>

            </div>
            <div class="social-icons">
            	<a href="<?php echo esc_url(get_theme_mod( 'facebook')) ?>"><i class="icon ion-social-facebook"></i></a><a href="<?php echo esc_url(get_theme_mod( 'instagram')) ?>"><i class="icon ion-social-instagram-outline"></i></a><a href="<?php echo esc_url(get_theme_mod( 'twitter')) ?>"><i class="icon ion-social-twitter"></i></a><a href="<?php echo esc_url(get_theme_mod( 'google')) ?>"><i class="icon ion-social-google"></i></a><a href="<?php echo esc_url(get_theme_mod( 'linkedin')) ?>"><i class="icon ion-social-linkedin-outline"></i></a></div>
        </div>
        <p><?php esc_html_e(get_theme_mod('copyright_text'));?></p>
    </footer>
    <?php wp_footer();?>

</body>

</html>