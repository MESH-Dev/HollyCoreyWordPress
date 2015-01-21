<?php get_header();
if(have_posts()){while(have_posts()){the_post(); ?>

<div id="content">
  <div class="container">
    <h1 id="title"><?php the_title(); ?></h1>
    <div class="gl-row">
      <div class="gl-col gl-col_4">
        <?php
          $defaults = array(
          	'theme_location'  => 'main_nav',
          	'menu'            => 'main_nav',
          	'container'       => '',
          	'container_class' => '',
          	'container_id'    => '',
          	'menu_class'      => 'sidebar-nav menu',
          	'menu_id'         => '',
          	'echo'            => true,
          	'fallback_cb'     => 'wp_page_menu',
          	'before'          => '',
          	'after'           => '',
          	'link_before'     => '',
          	'link_after'      => '',
          	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
          	'depth'           => 0,
          	'walker'          => new sidebar_walker()
          ); wp_nav_menu( $defaults ); ?>
      </div>
      <?php $sidebar = get_field('sidebar');
      if( $sidebar && strlen($sidebar) > 0 ){
        $size = '7';
        $side = true;
      }else{
        $size = '12';
        $side = false;
      } ?>


      <div class="gl-col gl-col_<?php echo $size; ?>">
        <?php the_content(); ?>
      </div>

      <?php if($side == true){
      echo "<div class='gl-col gl-col_5'>
              $sidebar
            </div>";
      } ?>


    </div>
  </div>
</div>

<?php } }
get_footer(); ?>
