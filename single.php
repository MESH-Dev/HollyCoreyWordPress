<?php get_header();
if(have_posts()){while(have_posts()){the_post();
  $curID = get_the_ID();
  $postType = get_post_type();
  $postType = get_post_type_object($postType); ?>

<div id="content">
  <div class="container">
    <h1 id="title"><?php the_title(); ?></h1>
    <div class="gl-row">
      <div class="gl-col gl-col_4">
        <h4 class="green">Additional <?php echo $postType->label; ?></h4>
        <?php include_once( locate_template('partials/archive-sidebar.php') ); ?>
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
