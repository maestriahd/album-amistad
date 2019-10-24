<?php
$pageTitle = __('Search') . ' ' . __('(%s total)', $total_results);
echo head(array('title' => $pageTitle, 'bodyclass' => 'search'));
$searchRecordTypes = get_search_record_types();
?>


<div class="container">
  <div class="row-col">
    <h1><?php echo $pageTitle; ?></h1>
    <?php echo search_filters(); ?>
    <?php if ($total_results): ?>
    <?php echo pagination_links(); ?>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <table id="search-results" class="table">
          <thead>
              <tr>
                  <th><?php echo __('Record Type');?></th>
                  <th><?php echo __('Title');?></th>
              </tr>
          </thead>
          <tbody>
              <?php $filter = new Zend_Filter_Word_CamelCaseToDash; ?>
              <?php foreach (loop('search_texts') as $searchText): ?>
              <?php $record = get_record_by_id($searchText['record_type'], $searchText['record_id']); ?>
              <?php $recordType = $searchText['record_type']; ?>
              <?php set_current_record($recordType, $record); ?>
              <tr class="<?php echo strtolower($filter->filter($recordType)); ?>">
                  <td>
                      <?php echo $searchRecordTypes[$recordType]; ?>
                  </td>
                  <td>
                    <div class="row">
                      <div class="col-sm-12 col-md-8">
                        <a href="<?php echo record_url($record, 'show'); ?>"><?php echo $searchText['title'] ? $searchText['title'] : '[Unknown]'; ?></a>

                      </div>
                      <div class="col-sm-12 col-md-4">
                        <?php if ($recordImage = record_image($recordType)): ?>
                            <?php echo link_to($record, 'show', $recordImage, array('class' => 'img-fluid')); ?>
                        <?php endif; ?>
                      </div>
                    </div>


                  </td>
              </tr>
              <?php endforeach; ?>
          </tbody>
      </table>
    </div>
  </div>
</div>



<?php echo pagination_links(); ?>
<?php else: ?>
<div id="no-results">
    <p><?php echo __('Your query returned no results.');?></p>
</div>
<?php endif; ?>
<?php echo foot(); ?>
