
<div id="post-<?php the_ID();?>" <?php  post_class("container") ?>>
    <div class="text-center" style="padding: 3vh;">
        <h2><?php echo the_title_attribute( ); ?></h2>
    </div>
    <?php if( ! kiame_get_attachment() ): ?>
    <div class="image" style="background-image:url(<?php echo esc_url(get_template_directory_uri()) . '/assets/img/tech/image4.jpg';?>);">
    </div>
    <?php else: ?>
    <div class="image" style="background-image:url(<?php echo esc_url(kiame_get_attachment()); ?>);"></div>
    <?php endif;?>
    <div class="row">
                    <?php if( ! is_active_sidebar( 'sidebar-1' ) ): ?>
                    <div class="col-12 col-md-12  info card-header">
                        <?php else: ?>
                        <div class="col-12 col-md-8 info card-header">
                        <?php endif;?>
            <?php the_title( '<h3 class="entry-title">', '</h3>'); ?>
            <p><?php the_content();?></p>
         </div>
                <?php get_sidebar(); ?>
        </div>
</div>
