<?php get_header();
if(have_posts()){while(have_posts()){the_post();
global $glacier;  ?>

<div id="content">
  <div class="container">
    <div class="gl-row">
      <div class="gl-col gl-col_16">
        <ul id="cats">
          <?php $callouts = get_field('links');
          foreach($callouts as $callout){
            echo "<li class='".$glacier->cycle('green','yellow','pink','purple')."'>
                    <a href='".$callout['url']."'>".$callout['title']."</a>
                  </li>";
          } ?>
        </ul>

        <div id="slideshow" class="scrollable">
          <div class="items">
            <?php $slides = get_field('slides');
            foreach($slides as $slide){
              echo "<div class='slide gl-col gl-col-px_16'>
                      <div class='banner ".$glacier->cycle('green','yellow','pink','purple')."'>
                        <a href='".$slide['url']."'>".$slide['callout']."</a>
                      </div>
                      <div class='img gl-col gl-col-px_10'>
                        <img src='".$slide['image']."'/>
                      </div>
                    </div>";
            } ?>
        </div>

      </div>
    </div>
  </div>
</div>

<?php } } get_footer(); ?>
