<?php get_header();

  $args = array(
    'post_type'      => 'girls',
    'posts_per_page' => 1,
  );
  $first_girl = get_posts($args);
  $curID = $first_girl[0]->ID;
  $postType = get_post_type();
  $postType = get_post_type_object($postType);

  $post = get_post($curID);
  setup_postdata($post);
global $glacier; ?>

<div id="content">
  <div class="container">
    <h1 id="title"><?php the_title(); ?></h1>
    <div class="gl-row">
      <div class="gl-col gl-col_4">
        <?php include_once( locate_template('partials/archive-sidebar.php') ); ?>
      </div>
      <div class="gl-col gl-col_8">
        <?php the_post_thumbnail(); ?>
      </div>
      <div class="gl-col gl-col_4">
        <?php the_content(); ?>
        <h4 class="green">Follow Us</h4>
        <?php get_template_part( 'partials/social', 'icons' ); ?>
      </div>
    </div>


    <div class="gl-row">
      <div class="gl-col gl-col_8">
        <h4 class="green">Photos</h4>
        <div class="gl-row">
          <?php $images = get_field('images');
          foreach($images as $image){
            echo "<div class='gl-col gl-col_8'>
                    <img src='".$image['images']."' />
                  </div>";
          } ?>
        </div>
      </div>

      <?php if(get_field('videos')) { ?>
        <div class="gl-col gl-col_8">
          <h4 class="green">Videos</h4>
          <div class="gl-row">
            <?php $videos = get_field('videos');
            foreach($videos as $video){
              echo '<div class="gl-col gl-col_8">
                      '.$video['video'].'
                    </div>';
            } ?>
          </div>
        </div>
      <?php } ?>

    </div>
  </div>
</div>

<?php get_footer(); ?>
