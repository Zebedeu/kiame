
<div id="post-<?php the_ID();?>" <?php  post_class("container") ?>>
    <div class="text-center" style="padding: 3vh;">
    </div>
    <?php if( ! kiame_get_attachment() ): ?>
    <div class="image card-header" style="background-image:url(<?php echo esc_url(get_template_directory_uri()) . '/assets/img/tech/image4.jpg';?>);">
    </div>
    <?php else: ?>
    <div class="image card-header" style="background-image:url(<?php echo esc_url(kiame_get_attachment()); ?>);"></div>
    <?php endif;?>
    <div class="row">
                    <?php if( ! is_active_sidebar( 'sidebar-1' ) ): ?>
                    <div class="col-12 col-md-12  info card-header">
                        <?php else: ?>
                        <div class="col-12 col-md-8 info card-header">
                        <?php endif;?>
            <?php the_title( '<h2 class="entry-title card-title">', '</h2>'); ?>
            <p><?php the_content();?></p>
         </div>
                <?php get_sidebar(); ?>
        </div>
</div>
