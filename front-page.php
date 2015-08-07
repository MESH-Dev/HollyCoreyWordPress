<?php get_header();
if(have_posts()){while(have_posts()){the_post();
global $glacier;  ?>

<div id="content">
  <div class="container" style="height: 600px;">
    <div class="gl-row" style="height:100%">
      <div class="gl-col gl-col_16" style="height:100%">

        <a href="http://shop.hollycorey.com/">
          <div class="shop">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/shop.png" />
            <div class="text-shop">
              <span>Shop</span> Online!
            </div>
          </div>
        </a>

        <ul id="cats">
          <?php $callouts = get_field('links');
          foreach($callouts as $callout){
            echo "<li class='".$glacier->cycle('green','yellow','pink','purple')."'>
                    <a href='".$callout['url']."'>".$callout['title']."</a>
                  </li>";
          } ?>
        </ul>

        <div class="jumping">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/jumping/HC_Jumping1.png" />
        </div>

        <div class="dancing">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/dancing/HC_Dancing1.png" />
        </div>

        <div class="shaking">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/shaking/HC_Shake1.png" />
        </div>

        <!-- <div id="slideshow" class="scrollable">
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
        </div> -->

      </div>
    </div>
  </div>
</div>

<?php } } get_footer(); ?>
