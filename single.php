<?php get_header(); ?>

<main class="page project-page">
    <section class="portfolio-block project">            
         <?php 

            if( have_posts() ) :

                while ( have_posts() ) : the_post();
                	                    
                    get_template_part( 'template-parts/content', 'single' );

                        echo kiame_post_navigation();
                    if( comments_open() || get_comments_number() ) :
                		comments_template();
                	endif;
               
                endwhile;
            endif;


            ?>
              

			<div class="more-projects">
                    <h3 class="text-center"><?php esc_html_e('More Posts','kiame');?></h3>
                    <div class="row gallery">

                    	<?php  	/*
                    		 * The WordPress Query class.
                    		 *
                    		 * @link http://codex.wordpress.org/Function_Reference/WP_Query
                    		 */
                    		$args = array(
                    			'post_type' => 'post',
                    			// Order & Orderby Parameters
                    			'orderbay'               => 'rand',
                    			// Pagination Parameters
                    			'posts_per_page'         => 3,
                    	
                    		);
                    	
                    	$queryrand = new WP_Query( $args );
                    	
                    		 if( $queryrand->have_posts()) : 

                    		 	while( $queryrand->have_posts()) : $queryrand->the_post();


                    		 		get_template_part( 'template-parts/content', 'randpost' );
                    		 		

		                      endwhile;
     				 endif;?>
                    </div>
                    </div>

    </section>
</main>
<?php get_footer();?>