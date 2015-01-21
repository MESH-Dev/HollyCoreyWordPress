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
            <a class="hc-button" href="#">Vendor Log In</a>
          </div>
        </div>
      </div>
  </footer>
  <?php wp_footer(); ?>
  </body>
</html>
