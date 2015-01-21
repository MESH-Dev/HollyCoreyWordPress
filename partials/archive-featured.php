<?php
  $args = array(
    'post_type'      => $archiveOBJ->name,
    'posts_per_page' => 6,
  );
  $posts  = get_posts($args);
  $top    = array_slice($posts, 0, 3);
  $bottom = array_slice($posts, 3);


  //top row
  echo '<div class="gl-row">';
  foreach($top as $post){
    setup_postdata($post);
    $title = get_the_title();
    $url   = get_the_permalink();
    $date  = get_the_time('F y');
    $img   = get_the_post_thumbnail();

    echo "<div class='gl-col gl-col_5'>
            <a href='$url'>
              <div class='archive-featured'>
                <div class='archive-featured_img'>
                  $img
                </div>
                <div class='archive-featured_meta'>
                  <span class='archive-featured_title'>$title</span>
                  <span class='archive-featured_date'>$date</span>
                </div>
              </div>
            </a>
          </div>";

  } wp_reset_postdata();
  echo '</div>';


  //bottom row
  echo '<div class="gl-row">';
  foreach($bottom as $post){
    setup_postdata($post);
    $title = get_the_title();
    $url   = get_the_permalink();
    $date  = get_the_time('F y');
    $img   = get_the_post_thumbnail();

    echo "<div class='gl-col gl-col_5'>
            <a href='$url'>
              <div class='archive-featured'>
                <div class='archive-featured_img'>
                  $img
                </div>
                <div class='archive-featured_meta'>
                  <span class='archive-featured_title'>$title</span>
                  <span class='archive-featured_date'>$date</span>
                </div>
              </div>
            </a>
          </div>";

  } wp_reset_postdata();
  echo '</div>';
?>
