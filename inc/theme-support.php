<?php

/*

package kiametheme

    ========================
        THEME SUPPORT OPTIONS
    ========================
*/

$options = get_option('post_formats');
$formats = array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat');
$output = array();
foreach ($formats as $format) {
    $output[] = ($options[$format] == 1 ? $format : '');
}
// if (!empty($options)) {
//     add_theme_support('post-formats', $output);
// }
add_theme_support( 'post-formats', $formats );
$header = get_option('custom_header');
if ($header == 1) {
    add_theme_support('custom-header');
}
add_theme_support( "the_post_thumbnail" );
add_theme_support( "title-tag" );
$background = get_option('custom_background');
if ($background == 1) {
    add_theme_support('custom-background');
}
add_theme_support( 'automatic-feed-links' );
add_theme_support('post-thumbnails');
add_theme_support('wide-align');
add_theme_support('disable-custom-font-sizes');
add_theme_support( 'editor-font-sizes', 
    array(

        array(
            
            'name' => __('Small', 'kiame'),
            'shortName' => __('S', 'kiame'),
            'size' => 11,
            'slug' => 'small'
        ),
        array(
            
            'name' => __('Regular', 'kiame'),
            'shortName' => __('M', 'kiame'),
            'size' => 16,
            'slug' => 'regular'
        ),
        array(
            
            'name' => __('Large', 'kiame'),
            'shortName' => __('L', 'kiame'),
            'size' => 20,
            'slug' => 'large'
        ),
    ) 
);

/* Activate Nav Menu Option */
function kiame_register_nav_menu()
{
    register_nav_menu('primary', 'Header Navigation Menu');
    register_nav_menu('secondary', 'Footer Navigation Menu');
}
add_action('after_setup_theme', 'kiame_register_nav_menu');

/* Activate HTML5 features */
add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));

/*
    ========================
        SIDEBAR FUNCTIONS
    ========================
*/

    add_action( 'widgets_init', 'theme_slug_widgets_init' );

function theme_slug_widgets_init()
{
    register_sidebar(

        array(
        'name' => __( 'Main Sidebar', 'kiame' ),
        'id' => 'sidebar-1',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'kiame' ),
    'before_title'  => '<span class="widgettitle meta-heading">',
    'after_title'   => '</span>',
    )

    );
}

/*
    ========================
        BLOG LOOP CUSTOM FUNCTIONS
    ========================
*/

function kiame_posted_meta()
{
    $posted_on = human_time_diff(get_the_time('U'), current_time('timestamp'));

    $categories = get_the_category();
    $separator = ', ';
    $output = '';
    $i = 1;

    if (!empty($categories)):
        foreach ($categories as $category):
            if ($i > 1): $output .= $separator;
    endif;
    $output .= '<a href="'.esc_url(get_category_link($category->term_id)).'" alt="'.esc_attr('View all posts in%s', $category->name).'">'.esc_html($category->name).'</a>';
    ++$i;
    endforeach;
    endif;

    return '<span class="posted-on">Posted <a href="'.esc_url(get_permalink()).'">'.$posted_on.'</a> ago</span> / <span class="posted-in">'.$output.'</span>';
}

function kiame_posted_footer($onlyComments = false)
{
    $comments_num = get_comments_number();
    if (comments_open()) {
        if ($comments_num == 0) {
            $comments = __('No Comments', 'kiame');
        } elseif ($comments_num > 1) {
            $comments = $comments_num.__(' Comments', 'kiame');
        } else {
            $comments = __('1 Comment', 'kiame');
        }
        $comments = '<a class="comments-link small text-caps" href="'.get_comments_link().'">'.$comments.' <span class="kiame-icon kiame-comment"></span></a>';
    } else {
        $comments = __('Comments are closed', 'kiame');
    }

    if ($onlyComments) {
        return $comments;
    }

    return '<div class="post-footer-container"><div class="row"><div class="col-xs-12 col-sm-6">'.get_the_tag_list('<div class="tags-list"><span class="kiame-icon kiame-tag"></span>', ' ', '</div>').'</div><div class="col-xs-12 col-sm-6 text-right">'.$comments.'</div></div></div>';
}

function kiame_get_attachment($num = 1)
{
    $output = '';
    if (has_post_thumbnail() && $num == 1):
        $output = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); else:
        $attachments = get_posts(array(
            'post_type' => 'attachment',
            'posts_per_page' => $num,
            'post_parent' => get_the_ID(),
        ));
    if ($attachments && $num == 1):
            foreach ($attachments as $attachment):
                $output = wp_get_attachment_url($attachment->ID);
    endforeach; elseif ($attachments && $num > 1):
            $output = $attachments;
    endif;

    wp_reset_postdata();

    endif;

    return $output;
}

function kiame_get_embedded_media($type = array())
{
    $content = do_shortcode(apply_filters('the_content', get_the_content()));
    $embed = get_media_embedded_in_content($content, $type);

    if (in_array('audio', $type)):
        $output = str_replace('?visual=true', '?visual=false', $embed[0]); else:
        $output = $embed[0];
    endif;

    return $output;
}

function kiame_get_bs_slides($attachments)
{
    $output = array();
    $count = count($attachments) - 1;

    for ($i = 0; $i <= $count; ++$i):

        $active = ($i == 0 ? ' active' : '');

    $n = ($i == $count ? 0 : $i + 1);
    $nextImg = wp_get_attachment_thumb_url($attachments[$n]->ID);
    $p = ($i == 0 ? $count : $i - 1);
    $prevImg = wp_get_attachment_thumb_url($attachments[$p]->ID);

    $output[$i] = array(
            'class' => $active,
            'url' => wp_get_attachment_url($attachments[$i]->ID),
            'next_img' => $nextImg,
            'prev_img' => $prevImg,
            'caption' => $attachments[$i]->post_excerpt,
        );

    endfor;

    return $output;
}

function kiame_grab_url()
{
    if (!preg_match('/<a\s[^>]*?href=[\'"](.+?)[\'"]/i', get_the_content(), $links)) {
        return false;
    }

    return esc_url_raw($links[1]);
}

function kiame_grab_current_uri()
{
    $http = (isset($_SERVER['HTTPS']) ? 'https://' : 'http://');
    $referer = $http.$_SERVER['HTTP_HOST'];
    $archive_url = $referer.$_SERVER['REQUEST_URI'];

    return $archive_url;
}

/*
    ========================
        SINGLE POST CUSTOM FUNCTIONS
    ========================
*/
function kiame_post_navigation()
{

    $nav = '<div class="col-lg-12">';

    $nav .= '<div class="row">';

    $prev = get_previous_post_link('<div class="post-link-nav"><span class="kiame-icon kiame-chevron-left" aria-hidden="true"></span> %link</div>', '%title');
    $nav .= '<div class="col-xs-12 col-sm-6">'.$prev.'</div>';

    $next = get_next_post_link('<div class="post-link-nav">%link <span class="kiame-icon kiame-chevron-right" aria-hidden="true"></span></div>', '%title');
    $nav .= '<div class="col-xs-12 col-sm-6 text-right">'.$next.'</div>';

    $nav .= '</div>';
    $nav .= '</div>';

    return $nav;
}


 function kiame_link_edit() {
    ?>
    <div class="edit-link">
    <?php edit_post_link( $text = null, $before = '', $after = '', $id = 0, $class = 'post-edit-link' ); ?>

    </div>
    <?php
 }
function kiame_get_post_navigation()
{
    if (get_comment_pages_count() > 1 && get_option('page_comments')):

        require get_template_directory().'/inc/templates/kiame-comment-nav.php';

    endif;
}


