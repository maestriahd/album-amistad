<div class="collection record col-sm-12">
  <div class="card border-0">
    <?php if ($exhibitImage = record_image($exhibit,'square_thumbnail',array('class' => 'img-fluid card-img-top') )): ?>
        <?php echo exhibit_builder_link_to_exhibit($exhibit, $exhibitImage, array('class' => 'img-fluid')); ?>
    <?php endif; ?>

    <div class="card-body">

      <?php
      $title = metadata($exhibit, 'display_title');
      $description = metadata($exhibit, array('Dublin Core', 'Description'), array('snippet' => 150));
      ?>
      <h3 class="card-title"><?php echo exhibit_builder_link_to_exhibit($exhibit); ?></h3>

      <?php if ($description): ?>
          <p class="collection-description card-text"><?php echo $description; ?></p>
      <?php endif; ?>
    </div>
  </div>
</div>
