<?php
/**
 * Template Name: Full Width With Grid Template
 * Template Post Type: post, page
 *
 * @since 1.0
 */

 get_header(); ?>

    <main class="page projets-page">
        <section class="portfolio-block projects compact-grid">
            <div class="row no-gutters">


           <?php    /*
                             * The WordPress Query class.
                             *
                             * @link http://codex.wordpress.org/Function_Reference/WP_Query
                             */
                            $args = array(
                                'post_type' => 'post'
                                // Order & Orderby Parameters
                                // Pagination Parameters
                        
                            );
                        
                        $queryrand = new WP_Query( $args );
                        
                             if( $queryrand->have_posts()) : 

                                while( $queryrand->have_posts()) : $queryrand->the_post();


                                    get_template_part( 'template-parts/content', 'grid' );
                                    

                              endwhile;
                     endif;?>
                </div>
            </section>
        </main>

<?php get_footer(); ?>