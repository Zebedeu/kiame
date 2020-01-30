<div id="post-<?php the_ID(); ?>" <?php post_class("col-md-6 col-lg-4 item zoom-on-hover"); ?>>
        <a class="entry-title " href="<?php echo  esc_url( get_permalink() );?>" rel="bookmark">
            <?php if( !kiame_get_attachment() ) : ?>
            <img class="img-fluid image" src="<?php echo esc_url(get_template_directory_uri());?>/assets/img/nature/image2.jpg">
            <?php else: ?>
            <img class="img-fluid image" src="<?php echo esc_url(kiame_get_attachment());?>">
            <?php endif;?>
            <span class="description">
                <span>
                <?php if(is_archive()) { ?>
                    <header class="description-heading text-center">
                        <?php the_archive_title('<h1 class="page-title">', '</h1>'); ?>
                    </header>
           <?php  } ?>


                </span>
                <span class="description-heading"><?php the_title_attribute( ); ?></span>
                    <span class="description-body">
                            <?php the_excerpt(); ?>
                    </span>
            </span>
        </a>
</div>
