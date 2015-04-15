<!-- <ul id="" class="nav">
  <?//php get_template_part( "partials/nav", "list" ); ?> 
</ul> -->


<?php
wp_nav_menu( array(
    'nav'              => 'nav',
    'theme_location'    => 'nav',
   /* 'depth'             => 2,
    'container'         => 'div',
    'container_class'   => 'collapse navbar-collapse',
	'container_id'      => 'navbar-primary-collapse',
    'menu_class'        => 'nav navbar-nav navbar-right clearfix',
    'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
    'walker'            => new wp_bootstrap_navwalker())*/
));


?>