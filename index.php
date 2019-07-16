<?php echo head(array('bodyid'=>'home')); ?>

<div class="row" id="featured">


  <?php if (get_theme_option('hero')): ?>

  <div class="col-sm-12 col-md-4" id="featured-item">
    <div class="card border-0">
      <h2 class="my-5 border-primary border-bottom">Soledad Acosta de Samper</h2>
      <img src="<?php echo hero_image_path(); ?>" class="card-img-top" alt="">
      <div class="card-body">
        <p class="card-text">
          <?php echo get_theme_option('Homepage Text');?>
        </p>
        <a href="#" class="btn btn-primary">leer más</a>
      </div>
    </div>
  </div>

<?php endif; ?>
  <?php if (get_theme_option('Display Featured Item') !== '0'): ?>

  <div class="col-sm-12 col-md-4" id="featured-item">
    <h2 class="my-5 border-primary border-bottom"><?php echo __('Featured Items'); ?></h2>
    <div class="row">
      <?php echo random_featured_items(10); ?>
    </div>
  </div>

<?php endif; ?>

  <?php if (get_theme_option('Display Featured Collection') !== '0'): ?>

    <div class="col-sm-12 col-md-4" id="featured-item">
      <h2 class="my-5 border-primary border-bottom "><?php echo __('Featured Collection'); ?></h2>
      <div class="row" >
        <?php echo random_featured_collection(); ?>
      </div>
    </div>
  <?php endif; ?>


</div>


<?php fire_plugin_hook('public_home', array('view' => $this)); ?>

<?php echo foot(); ?>
