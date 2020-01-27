<?php
/**
 * kiame Theme Customizer.
 *
 *
 * @param WP_Customize_Manager $wp_customize theme Customizer object
 *
 */

function kiame_customize_register($wp_customize)
{
    //Add a class for titles
    class kiame_Info extends WP_Customize_Control
    {
        public $type = 'info';
        public $label = '';

        public function render_content()
        {
            ?>
<h3 style="text-decoration: underline; color: #ff0066; text-transform: uppercase;"><?php echo esc_html($this->label); ?></h3>
<?php
        }
    }

    class WP_Customize_Textarea_Control extends WP_Customize_Control
    {
        public $type = 'textarea';

        public function render_content()
        {
            ?>
<label>
    <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
    <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea($this->value()); ?></textarea>
</label>
<?php
        }
    }

    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
    $wp_customize->remove_control('header_textcolor');
    $wp_customize->remove_control('display_header_text');


    /*
    
    Image Logo

    */


    $wp_customize->add_section('logo_section', array(
        'title' => __('Image Logo', 'kiame'),
        'description' => __('Featured Image Size Should be ( 1400x446 ).', 'kiame'),
        'priority' => null,
    ));
    $wp_customize->add_setting( 'header_logo', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'header_logo',
             array(
                'label' => __('Image Logo', 'kiame'),
                'setting' => 'header_logo',
                'section'=> 'logo_section',
             )
        )
    );

    /*

    Color text Site Name and Description 
    */


    $wp_customize->add_setting('color_text_menu', array(
    'default' => '#000000',
    'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(
    new WP_Customize_Color_Control($wp_customize, 'color_text_menu', array(
        'label' => __('color for Menus', 'kiame'),
        'section' => 'colors',
        'settings' => 'color_text_menu',
    ))
    );
    /*

    Menu color
    */

    $wp_customize->add_setting(
        'background_color_menu',  array(
            'default' => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize, 'background_color_menu', array(
                'label' => __('Background Color Menu and Footer', 'kiame'),
                'section' => 'colors',
                'settings' => 'background_color_menu',
            )
        )
    );


    /*
         *
         *  FOOTER
         *
         */

 $wp_customize->add_section('footer_text', array(
    'title' => __('Footer Text', 'kiame'),
    'priority' => null,
    'description' => __('Add footer copyright text', 'kiame'),


));

    $wp_customize->add_setting('copyright_text', array(
    'default' => esc_html__('This is the footer','kiame'),
    'sanitize_callback' => 'sanitize_text_field',
));

    $wp_customize->add_control('copyright_text', array(
    'label' => esc_html__('This is the footer','kiame'),
    'setting' => 'copyright_text',
    'section' => 'footer_text',
));


    $wp_customize->add_section('footer_text', array(
    'title' => __('Footer Text', 'kiame'),
    'priority' => null,
    'description' => __('Add footer copyright text', 'kiame'),
));

    $wp_customize->add_setting( 'copyright_text_view', array(
        'default' => esc_html__('This is the footer','kiame'),
        'sanitize_callback' => 'sanitize_text_field'
        ) 
    );
        $wp_customize->add_control(
            'copyright_text',
            array(
                'input' => esc_html__('This is the footer 2'),
                'setting' => 'copyright_text',
                'section' => 'footer_text'
            
        )
    );


    $wp_customize->add_setting(
    'kiame_options[credit-info]',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'type' => 'info_control',
        'capability' => 'edit_theme_options',
    )
);
   

    /*
         *
         *  SOCIAL
         *
         */

    $wp_customize->add_section('social_sec', array(
    'title' => __('Social Settings', 'kiame'),

));

    $wp_customize->add_setting('facebook', array(
    'default' => '#facebook',
    'sanitize_callback' => 'esc_url_raw',
));

    $wp_customize->add_control('facebook', array(
    'label' => __('Add facebook link here', 'kiame'),
    'setting' => 'facebbok',
    'section' => 'social_sec',
));

    $wp_customize->add_setting('twitter', array(
    'default' => '#twitter',
    'sanitize_callback' => 'esc_url_raw',
));

    $wp_customize->add_control('twitter', array(
    'label' => __('Add twitter link here', 'kiame'),
    'setting' => 'twitter',
    'section' => 'social_sec',
));

    $wp_customize->add_setting('instagram', array(
    'default' => '#instagram',
    'sanitize_callback' => 'esc_url_raw',
));

    $wp_customize->add_control('instagram', array(
    'label' => __('Add instagram link here', 'kiame'),
    'setting' => 'instagram',
    'section' => 'social_sec',
));

    $wp_customize->add_setting('google', array(
    'default' => '#google',
    'sanitize_callback' => 'esc_url_raw',
));

    $wp_customize->add_control('google', array(
    'label' => __('Add google plus link here', 'kiame'),
    'setting' => 'google',
    'section' => 'social_sec',
));

    $wp_customize->add_setting('linkedin', array(
    'default' => '#linkedin',
    'sanitize_callback' => 'esc_url_raw',
));

    $wp_customize->add_control('linkedin', array(
    'label' => __('Add linkedin link here', 'kiame'),
    'setting' => 'linkedin',
    'section' => 'social_sec',
));


}
add_action('customize_register', 'kiame_customize_register');


function kiame_custom_css()
{
    ?>
<style type="text/css">

    .colort a, .colort ul li a {
        color: <?php echo esc_html(get_theme_mod('color_text_menu', '#000000')); ?> !important;
    }

    .bg-white, .kiame-footer {
        background-color: <?php echo esc_html(get_theme_mod('background_color_menu')); ?> !important;
    }


</style>
<?php
}
add_action('wp_head', 'kiame_custom_css');