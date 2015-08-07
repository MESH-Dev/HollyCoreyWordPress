<?php $args = array(
  'post_type'      => $postType->name,
  'posts_per_page' => -1
);
$posts = get_posts($args);
echo "<ul id='archive-sidebar'>";
foreach($posts as $post){
  global $glacier;
  setup_postdata($post);
  if($post->ID == $curID){
    $active = 'current';
  }else{
    $active = '';
  }
  echo "<li class='".$glacier->cycle('green','yellow','pink','purple','grey')." ".$active."'>
          <a href='".get_the_permalink()."'>".get_the_title()."</a>
        </li>";
} wp_reset_postdata();
echo "</ul>"; ?>
