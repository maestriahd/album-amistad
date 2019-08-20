<div class="collection record col-sm-12">
  <div class="card border-0">
    <?php if ($collectionImage = record_image($collection, 'square_thumbnail',array('class' => 'img-fluid card-img-top') )): ?>
        <?php echo link_to($this->collection, 'show', $collectionImage, array('class' => 'img-fluid ')); ?>
    <?php endif; ?>

    <div class="card-body">

      <?php
      $title = metadata($collection, 'display_title');
      $description = metadata($collection, array('Dublin Core', 'Description'), array('snippet' => 150));
      ?>
      <h3 class="card-title"><?php echo link_to($this->collection, 'show', $title); ?></h3>

      <?php if ($description): ?>
          <p class="collection-description card-text"><?php echo $description; ?></p>
      <?php endif; ?>

    </div>

  </div>


</div>
