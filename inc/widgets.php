<?php	
/*
	
@package kiame
	
	========================
		WIDGET CLASS
	========================
*/


/*
	Edit default WordPress widgets
*/

function kiame_tag_cloud_font_change( $args ) {
	
	$args['smallest'] = 8;
	$args['largest'] = 8;
	
	return $args;
	
}
add_filter( 'widget_tag_cloud_args', 'kiame_tag_cloud_font_change' );

function kiame_list_categories_output_change( $links ) {
	
	$links = str_replace('</a> (', '</a> <span>', $links);
	$links = str_replace(')', '</span>', $links);
	
	return $links;
	
}
add_filter( 'wp_list_categories', 'kiame_list_categories_output_change' );

/*
	Save Posts views
*/
function kiame_save_post_views( $postID ) {
	
	$metaKey = 'kiame_post_views';
	$views = get_post_meta( $postID, $metaKey, true );
	
	$count = ( empty( $views ) ? 0 : $views );
	$count++;
	
	update_post_meta( $postID, $metaKey, $count );
	
}
remove_action( 'wp_head', 'adjacent_posts_rkiame_link_wp_head', 10, 0 );

/*
	Popular Posts Widget
*/

class kiame_Popular_Posts_Widget extends WP_Widget {
	
	//setup the widget name, description, etc...
	public function __construct() {
		
		$widget_ops = array(
			'classname' => 'kiame-popular-posts-widget',
			'description' => __('Popular Posts Widget', 'kiame'),
		);
		parent::__construct( 'kiame_popular_posts', esc_html__('kiame Popular Posts','kiame'), $widget_ops );
		
	}
	
	// back-end display of widget
	public function form( $instance ) {
		
		$title = ( !empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : esc_html__('Popular Posts', 'kiame' ) );
		$tot = ( !empty( $instance[ 'tot' ] ) ? absint( $instance[ 'tot' ] ) : 4 );
		
		$output = '<p>';
		$output .= '<label for="' . esc_attr( $this->get_field_id( 'title' ) ) . '">'.esc_html('Title', 'kiame').':</label>';
		$output .= '<input type="text" class="widefat" id="' . esc_attr( $this->get_field_id( 'title' ) ) . '" name="' . esc_attr( $this->get_field_name( 'title' ) ) . '" value="' . esc_attr( $title ) . '"';
		$output .= '</p>';
		
		$output .= '<p>';
		$output .= '<label for="' . esc_attr( $this->get_field_id( 'tot' ) ) . '">'. esc_html__('Number of Posts','kiame').':</label>';
		$output .= '<input type="number" class="widefat" id="' . esc_attr( $this->get_field_id( 'tot' ) ) . '" name="' . esc_attr( $this->get_field_name( 'tot' ) ) . '" value="' . esc_attr( $tot ) . '"';
		$output .= '</p>';
		
		echo $output;
		
	}
	
	// update widget
	public function update( $new_instance, $old_instance ) {
		
		$instance = array();
		$instance[ 'title' ] = ( !empty( $new_instance[ 'title' ] ) ? strip_tags( $new_instance[ 'title' ] ) : '' );
		$instance[ 'tot' ] = ( !empty( $new_instance[ 'tot' ] ) ? absint( strip_tags( $new_instance[ 'tot' ] ) ) : 0 );
		
		return $instance;
		
	}
	
	// front-end display of widget
	public function widget( $args, $instance ) {
		
		$tot = absint( $instance[ 'tot' ] );
		
		$posts_args = array(
			'post_type'			=> 'post',
			'posts_per_page'	=> $tot,
			'meta_key'			=> 'kiame_post_views',
			'orderby'			=> 'meta_value_num',
			'order'				=> 'DESC'
		);
		
		$posts_query = new WP_Query( $posts_args );
		
		echo $args[ 'before_widget' ];
		
		if( !empty( $instance[ 'title' ] ) ):
			
			echo $args[ 'before_title' ] . apply_filters( 'widget_title', $instance[ 'title' ] ) . $args[ 'after_title' ];
			
		endif;
		
		if( $posts_query->have_posts() ):
		
			//echo '<ul>';
				
			while( $posts_query->have_posts() ): $posts_query->the_post();
				
				echo '<div class="media">';
				echo '<div class="media-left"><img class="media-object" src="' . get_template_directory_uri() . '/img/post-' . ( get_post_format() ? get_post_format() : 'standard') . '.png" alt="' . get_the_title() . '"/></div>';
				echo '<div class="media-body">';
				echo '<a href="' . get_the_permalink() . '" title="' . get_the_title() . '">' . get_the_title() . '</a>';
				echo '<div class="row"><div class="col-xs-12">'. kiame_posted_footer( true ) .'</div></div>';
				echo '</div>';
				echo '</div>';
				
			endwhile;
				
			//echo '</ul>';
		
		endif;
		
		echo $args[ 'after_widget' ];
		
	}
	
}

add_action( 'widgets_init', 'kiame_register_widget');
 
 function kiame_register_widget(){
	register_widget( 'kiame_Popular_Posts_Widget' );
}





























