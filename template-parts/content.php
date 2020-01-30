
<div id="post-<?php the_ID();?>" <?php  post_class("container") ?>>
    <div class="text-center" style="padding: 1vh;">
    </div>    
    <div class="row">
        <?php if( ! is_active_sidebar( 'sidebar-1' ) ): ?>
        <div class="col-12 col-md-12  info">
        <?php else: ?>
        <div class="col-12 col-md-8 info">
         <?php endif;?>
            <div class="entry-content card-header row">
                <div class="col-lg-7">
                    <?php the_title( '<h3 class="entry-title"><a href="'. esc_url(get_the_permalink( )).'">', '</a></h3>'); ?>
                    <p><?php the_excerpt();?></p>
                </div>
                <div class="col-lg-5">
                    <?php if(has_post_thumbnail()){?>
                    <div class="image " style="background-image:url(<?php echo esc_url(kiame_get_attachment()); ?>);">
                    </div>
                <?php }?>
                </div>

            </div>

        </div>
        <?php get_sidebar(); ?>

    </div>
</div>
