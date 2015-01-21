<?php /* Template Name: Forms */
get_header();
if(have_posts()){while(have_posts()){the_post(); ?>

<div id="content">
  <div class="container">
    <h1 id="title"><?php the_title(); ?></h1>
    <div class="gl-row">
      <div class="gl-col gl-col_9">
        <div id="contact-wrap">
          <div class="calloutBox purple">
            <p><strong>Questions?</strong><br />
            email us anytime!<br />
            <a href="mailto:info@hollycorey.com">info@holleycorey.com</a></p>
          </div>
        </div>
      </div>
      <div class="gl-col gl-col_7">
        <?php the_content(); ?>
      </div>
    </div>
  </div>
</div>


<?php } } get_footer(); ?>
