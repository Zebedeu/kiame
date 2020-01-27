<?php get_header(); ?>

    <main class="page projets-page">
        <section class="portfolio-block projects compact-grid">
            <div class="row no-gutters">
                
            <?php 

            if( have_posts() ) :

                while ( have_posts() ) : the_post();
                    
                            get_template_part( 'template-parts/content', get_post_format() );
                endwhile;
            endif;
            ?>
                </div>
            </section>
        </main>

<?php get_footer(); 

?>