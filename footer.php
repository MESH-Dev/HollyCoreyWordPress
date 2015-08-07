  <footer>
    <div class="container">
      <div id="footerNav">
        <?php
          $defaults = array(
          	'theme_location'  => 'footer_nav',
          	'menu'            => 'footer_nav',
          	'container'       => '',
          	'container_class' => '',
          	'container_id'    => '',
          	'menu_class'      => 'footernav',
          	'menu_id'         => '',
          	'echo'            => true,
          	'fallback_cb'     => 'wp_page_menu',
          	'before'          => '',
          	'after'           => '',
          	'link_before'     => '',
          	'link_after'      => '',
          	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
          	'depth'           => 1,
          	'walker'          => ''
          ); wp_nav_menu( $defaults ); ?>
        </div>
        <div id="attribution">
          <span>Copyright &copy; Holly Corey All rights reserved. Site by MESH</span>
          <div id="vendor-login">
            <a class="hc-button" href="http://wholesale.hollycorey.com/account/login">Vendor Log In</a>
          </div>
        </div>
      </div>
  </footer>
  <?php wp_footer(); ?>

  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-53775340-3', 'auto');
    ga('send', 'pageview');

  </script>

  </body>
</html>
