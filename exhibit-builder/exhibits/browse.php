<?php
$title = __('Browse Exhibits');
echo head(array('title' => $title, 'bodyclass' => 'exhibits browse'));
?>
<h1><?php echo $title; ?> <?php echo __('(%s total)', $total_results); ?></h1>
<?php if (count($exhibits) > 0): ?>

<nav class="navigation secondary-nav">
    <?php echo nav(array(
        array(
            'label' => __('Browse All'),
            'uri' => url('exhibits')
        ),
        array(
            'label' => __('Browse by Tag'),
            'uri' => url('exhibits/tags')
        )
    )); ?>
</nav>

<?php echo pagination_links(); ?>
<div class="row">
  <div class="col-4 my-4">
    <?php $exhibitCount = 0; ?>
    <?php foreach (loop('exhibit') as $exhibit): ?>
        <div class="card border-0">
            <h2 class="card-title"><?php echo link_to_exhibit(); ?></h2>
            <?php if ($exhibitImage = record_image($exhibit,'square_thumbnail', array('class'=>'card-img-top'))): ?>
                <?php echo exhibit_builder_link_to_exhibit($exhibit, $exhibitImage); ?>
            <?php endif; ?>

            <div class="card-body">
              <?php if ($exhibitDescription = metadata('exhibit', 'description', array('no_escape' => true, 'snippet' => 256))): ?>
              <div class="card-text"><?php echo $exhibitDescription; ?></div>
              <?php endif; ?>
              <?php if ($exhibitTags = tag_string('exhibit', 'exhibits')): ?>
              <p class="tags"><?php echo $exhibitTags; ?></p>
              <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>
  </div>
</div>

<?php echo pagination_links(); ?>

<?php else: ?>
<p><?php echo __('There are no exhibits available yet.'); ?></p>
<?php endif; ?>

<?php echo foot(); ?>
