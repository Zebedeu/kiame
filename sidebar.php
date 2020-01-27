<?php
// Dynamic Sidebar
if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}?>

<div class="col-12 col-md-4 offset-md-1 meta">
    <div class="tags">
    	<span class="meta-heading">
    	<?php dynamic_sidebar( 'sidebar-1' ); ?>
    </span>
    </div>
</div>
	<!-- Sidebar fallback content -->
