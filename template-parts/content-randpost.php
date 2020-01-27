<div class="col-md-4 col-lg-3">
	<div class="item"><a href="<?php echo the_permalink();?>">
	<?php if( ! kiame_get_attachment() ) : ?>
		    <img class="img-fluid scale-on-hover" src="<?php echo get_template_directory_uri();?>/assets/img/nature/image2.jpg"></a></div>
		<?php else : ?>
		    <img class="img-fluid scale-on-hover" src="<?php echo kiame_get_attachment();?>"></a>
	</div>
		    <?php endif;?>

</div>
                        