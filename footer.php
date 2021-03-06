        </section>
    </main>

 <footer class="page-footer kiame-footer ">
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
            	<?php echo  get_theme_mod( 'facebook') ? '<a href="'.  esc_url(get_theme_mod( 'facebook')).  '"><i class="icon ion-social-facebook"></i></a>' : '' ; ?>
            	<?php echo  get_theme_mod( 'instagram') ? '<a href="'. esc_url(get_theme_mod( 'instagram'))  .'"><i class="icon ion-social-instagram-outline"></i></a>' : '' ; ?>
            	<?php echo  get_theme_mod( 'twitter') ? '<a href="'. esc_url(get_theme_mod( 'twitter'))  .'"><i class="icon ion-social-twitter"></i></a>' : '' ; ?>
            	<?php echo  get_theme_mod( 'google') ? '<a href="'. esc_url(get_theme_mod( 'google')) .'"><i class ="icon ion-social-google"></i></a>' : '' ; ?>
            	<?php echo  get_theme_mod( 'linkedin') ? '<a href="'. esc_url(get_theme_mod( 'linkedin')) .  '"><i class="icon ion-social-linkedin-outline"></i></a>' : '' ; ?>
            	</div>
                        <p class="colort"><?php echo esc_html(date_i18n( 'Y') . ' '. get_theme_mod('copyright_text'));?></p>

        </div>
    </footer>
    <?php wp_footer();?>

</body>

</html>