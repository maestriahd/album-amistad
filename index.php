<?php

//$biografia = get_record('Item', array( 'advanced' => array( array('element_id' => 'Identifier', 'type' => 'is exactly', 'terms' => 'biografia_sas' )) ));
 ?>

<?php echo head(array('bodyid'=>'home')); ?>

<div class="row" id="featured">

  <?php if (get_theme_option('bio')): ?>
  <?php $biografia = get_record_by_id('Item', (int)get_theme_option('bio')); ?>
  <div class="col-sm-12 col-md-4" id="featured-item">
    <div class="card border-0">
      <h2 class="my-5 border-primary border-bottom"><?php echo metadata($biografia, array('Dublin Core','Title')); ?></h2>
      <?php echo record_image($biografia, 'fullsize', array('class'=>'card-img-top')); ?>

      <div class="card-body">
        <p class="card-text">
          <?php echo metadata($biografia, array('Item Type Metadata','Text')) ?>
        </p>
        <?php  ?>
        <a href=<?php echo url('biografia'); ?> class="btn btn-primary">leer más</a>
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
