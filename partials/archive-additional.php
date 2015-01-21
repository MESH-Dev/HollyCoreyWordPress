<?php
  echo '<h4 class="green">Additional Press</h4>';
  $args = array(
    'post_type'      => $archiveOBJ->name,
    'posts_per_page' => 12,
    'offset'         => 6,
  );
  $posts = get_posts($args);
  echo '<ul id="archive-additional">';
  foreach($posts as $post){
    setup_postdata($post);
    $title = get_the_title();
    $url   = get_the_permalink();
    $date  = get_the_time();

    echo "<li>
            <a href='$url'>
              <span class='title'>$title</span>
              <span class='date'>$date</span>
            </a>
          </li>";

  } wp_reset_postdata();
  echo "</div>";
?>
