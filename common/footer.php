        </article>
      </div>
      </div><!-- end wrap -->


        <footer role="contentinfo">

          <div class="container-fluid">
            <div class="row">
              <div class="col mt-4">
                <ul class="nav justify-content-center" id="footer-logos">
                  <li class="nav-item">
                    <a href="https://uniandes.edu.co" target="_blank">
                      <img src="<?php echo img('uniandes-md.png'); ?>" alt="">
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="https://www.mincultura.gov.co" target="_blank">
                      <img src="<?php echo img('mincultura-md.png'); ?>" alt="">

                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="https://bibliotecanacional.gov.co" target="_blank">

                      <img src="<?php echo img('BNC-md.png'); ?>" alt="">
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="https://www.caroycuervo.gov.co/" target="_blank">
                      <img src="<?php echo img('caroycuervo-md.png'); ?>" alt="">

                    </a>
                  </li>

                </ul>
              </div>
            </div>
            <div class="row">
              <div class="col col-sm">

              </div>
            </div>
            <div class="row">
              <div class="col col-sm">
                <div id="footer-text">
                    <?php echo get_theme_option('Footer Text'); ?>
                    <?php if ((get_theme_option('Display Footer Copyright') == 1) && $copyright = option('copyright')): ?>
                        <p><?php echo $copyright; ?></p>
                    <?php endif; ?>
                    <?php fire_plugin_hook('public_footer', array('view'=>$this)); ?>
                </div>
              </div>
            </div>
          </div>

        </footer>

    <script>

    jQuery(document).ready(function() {

        Omeka.showAdvancedForm();
        Omeka.skipNav();
        Omeka.megaMenu('#top-nav');
    });
    </script>
</body>
</html>
