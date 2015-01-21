<?php /* Template Name: About */
get_header();
if(have_posts()){while(have_posts()){the_post();
global $glacier; ?>

<div id="content">
  <div class="container">
    <h1 id="title"><?php the_title(); ?></h1>
    <div class="gl-row">
      <div class="gl-col gl-col_4">
        <div class="calloutBox green narrow">
          <?php the_field('callout'); ?>
        </div>
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
      <div class="gl-col gl-col_4">
        <h4>Holly Corey on Instagram</h4>
      </div>
    </div>
    <div class="gl-row">
      <?php $instagram = getInstagram();
      foreach($instagram as $instapost){
        $url    = $instapost->images->standard_resolution->url;
        $height = $instapost->images->standard_resolution->height;
        $width  = $instapost->images->standard_resolution->width;
        $link   = $instapost->link;
        $caption= $instapost->caption->text;
        $color  = $glacier->cycle('green','yellow','pink','purple','grey');
        echo "<div class='gl-col gl-col_4 instapost'>
                <a href='$link'>
                  <div class='overlay'>
                    <i>
                      <span>$caption</span>
                    </i>
                    <div class='bg $color'></div>
                  </div>
                  <img src='$url' height='$height' width='$width' />
                </a>
              </div>";
      } ?>
    </div>
  </div>
</div>

<?php } } get_footer(); ?>
