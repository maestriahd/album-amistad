<?php
echo head(array(
    'title' => metadata('exhibit_page', 'title') . ' &middot; ' . metadata('exhibit', 'title'),
    'bodyclass' => 'exhibits show'));
    $exhibitNavOption = get_theme_option('exhibits_nav');
?>
<div class="row">
    <?php if ($exhibitNavOption == 'full'): ?>
    <div class="col-sm-12">
        <nav id="exhibit-pages" class="full">
            <?php echo exhibit_builder_page_nav(); ?>
        </nav>
    </div>

    <?php endif; ?>

    <div class="col-sm-12">
    <h1><span class="exhibit-page"><?php echo metadata('exhibit_page', 'title'); ?></h1>
        <?php if (count(exhibit_builder_child_pages()) > 0 && $exhibitNavOption == 'full'): ?>
    <nav id="exhibit-child-pages" class="secondary-nav">
        <?php echo exhibit_builder_child_page_nav(); ?>
    </nav>
    <?php endif; ?>

    </div>

    <div class="col-sm-12">
        <div id="exhibit-blocks">
            <?php exhibit_builder_render_exhibit_page(); ?>
        </div>
    </div>
    <div class="col-sm-12">
        <div id="exhibit-page-navigation" class="row">
            <?php if ($prevLink = exhibit_builder_link_to_previous_page()): ?>
                <div  class="col" id="exhibit-nav-prev">
                    <?php echo $prevLink; ?>
                </div>
            <?php endif; ?>
            <div id="exhibit-nav-up" class="col">
                <?php echo exhibit_builder_page_trail(); ?>
            </div>
            <?php if ($nextLink = exhibit_builder_link_to_next_page()): ?>
                <div class="col" id="exhibit-nav-next">
                    <?php echo $nextLink; ?>
                </div>
            <?php endif; ?>

        </div>
    </div>
</div>


<div class="row"></div>
<?php if ($exhibitNavOption == 'side'): ?>
<nav id="exhibit-pages" class="side">
    <h4><?php echo exhibit_builder_link_to_exhibit($exhibit); ?></h4>
    <?php echo exhibit_builder_page_tree($exhibit, $exhibit_page); ?>
</nav>
<?php endif; ?>

<?php echo foot(); ?>
