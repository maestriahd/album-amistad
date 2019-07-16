<?php foreach ($elementsForDisplay as $setName => $setElements): ?>
<div class="element-set">
    <?php if ($showElementSetHeadings): ?>
      <!--
    <h2><?php echo html_escape(__($setName)); ?></h2>
  -->
    <?php endif; ?>
    <dl id="<?php echo text_to_id(html_escape("$setName $elementName")); ?>" class="element row border-bottom" >

    <?php foreach ($setElements as $elementName => $elementInfo): ?>

      <dt class="col-sm-4">
          <?php echo html_escape(__($elementName)); ?>
      </dt>
      <dd class="col-sm-8">
        <?php foreach ($elementInfo['texts'] as $text): ?>
            <div class="element-text"><?php echo $text; ?></div>
        <?php endforeach; ?>
      </dd>

<!-- end element -->
    <?php endforeach; ?>
  </dl>

</div><!-- end element-set -->
<?php endforeach;
