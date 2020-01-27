<?php


function kiame_content_width()
{
    $GLOBALS['content_width'] = apply_filters('kiame_content_width', 640);
}

add_action('after_setup_theme', 'kiame_content_width', 0);


function kiame_pagination( $mid = 2, $end = 1, $show = false, $query = null ) {

    // Prevent show pagination number if Infinite Scroll of JetPack is active.
    if ( ! isset( $_GET[ 'infinity' ] ) ) {

        global $wp_query, $wp_rewrite;

        $total_pages = $wp_query->max_num_pages;

        if ( is_object( $query ) && null != $query ) {
            $total_pages = $query->max_num_pages;
        }

        if ( $total_pages > 1 ) {
            $url_base = $wp_rewrite->pagination_base;
            $big = 999999999;

            // Sets the paginate_links arguments.
            $arguments = apply_filters( 'kiame_pagination_args', array(
                    'base'      => esc_url_raw( str_replace( $big, '%#%', get_pagenum_link( $big, false ) ) ),
                    'format'    => '',
                    'current'   => max( 1, get_query_var( 'paged' ) ),
                    'total'     => $total_pages,
                    'show_all'  => $show,
                    'end_size'  => $end,
                    'mid_size'  => $mid,
                    'type'      => 'list',
                    'prev_text' => __( '&laquo; Previous', 'kiame' ),
                    'next_text' => __( 'Next &raquo;', 'kiame' ),
                )
            );

            $pagination = '<div class="woocommerce-pagination ">' . paginate_links( $arguments ) . '</div>';

            // Prevents duplicate bars in the middle of the url.
            if ( $url_base ) {
                $pagination = str_replace( '//' . $url_base . '/', '/' . $url_base . '/', $pagination );
            }

            echo esc_html(($pagination));
        }
    }
}

if ( ! function_exists( 'kiame_paging_nav' ) ) {

    /**
     * Print HTML with meta information for the current post-date/time and author.
     *
     * @since 2.2.0
     */
    function kiame_paging_nav() {
        $mid  = 2;     // Total of items that will show along with the current page.
        $end  = 1;     // Total of items displayed for the last few pages.
        $show = false; // Show all items.

        return  kiame_pagination( $mid, $end, $show );
    }
}
function kiame_setup(){
		load_theme_textdomain( 'kiame', get_template_directory() . '/languages' );
	}
add_action( 'after_setup_theme', 'kiame_setup' );


function add_menu_link_class($atts, $item, $args)
{
    $atts['class'] = 'nav-link';
    var_dump($tts);
    return $atts;
}
add_filter('nav_menu_link_attributes', 'add_menu_link_class', 1, 3);


require get_template_directory().'/inc/class-wp-kiame-walker-nav-menu.php';
require get_template_directory().'/inc/widgets.php';
require get_template_directory() . '/inc/theme-support.php';
require get_template_directory().'/inc/enqueue.php';
require get_template_directory().'/inc/customize.php';


