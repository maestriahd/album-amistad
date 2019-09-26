<?php
$featuredExhibit = exhibit_builder_random_featured_exhibit();
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
          <?php echo metadata($biografia, array('Item Type Metadata','Text'),array('snippet' => 512)); ?>
        </p>
        <?php  ?>
        <a href=<?php echo url('biografia'); ?> class="btn btn-primary">leer más</a>
      </div>
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


  <div class="col-sm-12 col-md-4" id="featured-exhibit">
    <h2 class="my-5 border-primary border-bottom "><?php echo __('Featured Exhibit'); ?></h2>
    <div class="row" >
      <div class="collection record col-sm-12">
        <div class="card border-0">
          <?php if ($exhibitImage = record_image($featuredExhibit,'square_thumbnail',array('class' => 'img-fluid card-img-top') )): ?>
              <?php echo exhibit_builder_link_to_exhibit($featuredExhibit, $exhibitImage, array('class' => 'img-fluid')); ?>
          <?php endif; ?>

          <div class="card-body">

            <?php
            $description = metadata($featuredExhibit, 'description', array('snippet' => 150));
            ?>
            <h3 class="card-title"><?php echo exhibit_builder_link_to_exhibit($featuredExhibit); ?></h3>

            <?php if ($description): ?>
                <p class="collection-description card-text"><?php echo $description; ?></p>
            <?php endif; ?>

          </div>

        </div>

      </div>
    </div>
  </div>

</div>


<?php fire_plugin_hook('public_home', array('view' => $this)); ?>

<?php echo foot(); ?>
