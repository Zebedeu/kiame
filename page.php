<?php get_header(); ?>

<main class="page project-page">
    <section class="portfolio-block project">            
         <?php 

            if( have_posts() ) :

                while ( have_posts() ) : the_post();
                    
                            get_template_part( 'template-parts/content', 'page' );
                endwhile;
            endif;
            ?>
    </section>
</main>

<?php get_footer();?>