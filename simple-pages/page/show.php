<?php echo head(array(
    'title' => metadata('simple_pages_page', 'title'),
    'bodyclass' => 'page simple-page',
    'bodyid' => metadata('simple_pages_page', 'slug')
)); ?>
<div class="external-container">
  <div class="row">
    <div class="col-sm-10 offset-sm-1 col-md-8 offset-md-2">
      <p id="simple-pages-breadcrumbs" class="navigation secondary-nav"><?php echo simple_pages_display_breadcrumbs(); ?></p>
      <h1><?php echo metadata('simple_pages_page', 'title'); ?></h1>
      <div id="primary">
          <?php
            $text = metadata('simple_pages_page', 'text', array('no_escape' => true));
            echo $this->shortcodes($text);
          ?>
      </div>
    </div>
  </div>

</div>


<?php echo foot(); ?>
