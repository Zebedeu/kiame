<?php
// Dynamic Sidebar
if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}?>

<div class="col-12 col-md-4 meta ">
    <div class="kiame-sidebar card-header">
    	<span class="kiame-sidebar-container kiame-widget">
    	<?php dynamic_sidebar( 'sidebar-1' ); ?>
    </span>
    </div>
</div>
	<!-- Sidebar fallback content -->
