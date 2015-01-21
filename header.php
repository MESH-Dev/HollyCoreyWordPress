<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>
    <!--[if lt IE 9]>
      <script src="<?php get_template_directory_uri(); ?>/assets/libs/html5shiv.min.js"></script>
    <![endif]-->
  </head>
  <body <?php body_class(); ?>>
  <header>
    <div class="container">
      <div id="utility">
        <?php get_template_part( 'partials/social', 'icons' ); ?>
        <a class="hc-button" href="#">Sign Up For Emails!</a>
      </div>
      <div class="gl-row">
        <div class="gl-col gl-col_7" id="mainNav-left">
          <?php $pageID = get_the_ID();
                $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
          $menu = HC_get_left_nav();
            echo "<ul class='mainNav cf'>";
            foreach($menu as $m){
              $thisID = $m->object_id;
              $active = '';
              if($thisID == $pageID || $actual_link == $m->url){
                $active = 'current';
              }
              $title = $m->title;
              $link = $m->url;
              echo "<li class='$active'><a href='$link'>$title</a></li>";
            }
            echo "</ul>"; ?>
        </div>

        <div class="gl-col gl-col_2" id="logo">
          <a href="<?php echo home_url(); ?>">
            <img src="<?php echo( get_header_image() ); ?>" alt="<?php echo( get_bloginfo( 'title' ) ); ?>" />
          </a>
        </div>

        <div class="gl-col gl-col_7" id="mainNav-right">
          <?php $menu = HC_get_right_nav();
            echo "<ul class='mainNav cf'>";
            foreach($menu as $m){
              $thisID = $m->object_id;
              $active = '';
              if($thisID == $pageID || $actual_link == $m->url){
                $active = 'current';
              }
              $title = $m->title;
              $link = $m->url;
              echo "<li class='$active'><a href='$link'>$title</a></li>";
            }
            echo "</ul>"; ?>
        </div>
      </div>
    </div>
  </header>
