<!DOCTYPE html>
<html lang="<?php echo get_html_lang(); ?>">
<head>
    <meta charset="utf-8">
    <?php if ( $description = option('description')): ?>
    <meta name="description" content="<?php echo $description; ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php endif; ?>
    <?php
    if (isset($title)) {
        $titleParts[] = strip_formatting($title);
    }
    $titleParts[] = option('site_title');
    ?>
    <title><?php echo implode(' &middot; ', $titleParts); ?></title>

    <?php echo auto_discovery_link_tags(); ?>

    <!-- Plugin Stuff -->
    <?php fire_plugin_hook('public_head', array('view'=>$this)); ?>

    <!-- Stylesheets -->
    <?php
    queue_css_url('//fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic');
    queue_css_file(array('iconfonts','style'));
    echo head_css();
    ?>

    <!-- JavaScripts -->
    <?php
    queue_js_url('https://code.jquery.com/jquery-3.3.1.slim.min.js');
    queue_js_url('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js');
    queue_js_url('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js');
    queue_js_file(array('jquery-accessibleMegaMenu', 'minimalist', 'globals'));
    //queue_js_file(array('jquery-accessibleMegaMenu', 'popper.min', 'bootstrap.bundle.min','minimalist', 'globals'));
    //queue_js_file(array('minimalist'));
    echo head_js();
    ?>
</head>

<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
    <a href="#content" id="skipnav"><?php echo __('Skip to main content'); ?></a>
    <?php fire_plugin_hook('public_body', array('view'=>$this)); ?>

    <div id="wrap" class="d-flex">

  <!-- sidebar -->
      <nav class="sidebar container-fluid sticky-top" id="sidebar">

          <div class="row">
            <div class="col-sm-12 sidebar-upper d-flex justify-content-end align-items-center">
              <div id="close-sidebar" class="float-right">
                <span class="lnr lnr-cross"></spacing>
              </div>
            </div>
            <div class="col-sm-12">

              <?php fire_plugin_hook('public_header', array('view'=>$this)); ?>

            </div>
            <?php
              $tags = get_records('Tag',array(), 25);
             ?>

            <div class="col-sm-12 mt-4">
                <?php
                  $partial = array('common/menu-partial.phtml', 'default');
                  $nav = public_nav_main();
                  $nav->setUlClass('navbar-nav')->setPartial($partial);
                  echo $nav->render();
                ?>
            </div>

            <div class="col-sm-12 my-4">
              <div class="accordion mx-4" id="generos-nav">
                  <a class="btn btn-secondary btn-obra w-100" data-toggle="collapse" href="#obra-accordion" role="button" aria-expanded="false" aria-controls="obra-accordion">OBRAS</a>
                  <nav >
                  <ul class="generos-list collapse"  id="obra-accordion">
                    <?php foreach($tags as $key=>$tag): ?>
                    <li class="list-group-item">
                      <a href="<?php echo url('items/browse', array('tags' => $tag->name)) ?>">
                        <?php echo $tag->name; ?>
                       </a>
                    </li>
                  <?php endforeach; ?>
                  </ul>
                </nav>
              </div>
            </div>

          </div>
      </nav>

        <!-- end sidebar -->
        <div id="main" >
              <!-- header -->
              <header class="container-fluid" id="secondary-header">
                <div class="row">
                  <div class="col d-flex align-items-center p-3 h-70">
                    <button class="btn d-none" type="button" data-toggle="collapse" class="btn btn-outline-primary float-right" id="sidebarCollapse">
                      <span class="lnr lnr-menu" aria-hidden="true"></span>
                    </button>
                  </div>
                </div>
                <div class="row  header-middle">
                  <div class="col-sm-12 col-md-8">
                    <div class="row h-100">
                      <div id="site-title" class="align-self-center">
                          <?php echo link_to_home_page(theme_logo()); ?>
                      </div>
                    </div>
                  </div>
                  <div class="col col-sm-12 col-md-4 d-flex align-items-center">
                    <?php if (get_theme_option('use_advanced_search') === null || get_theme_option('use_advanced_search')): ?>
                    <?php echo nav_search_form(array('show_advanced' => true)); ?>
                    <?php else: ?>
                    <?php echo nav_search_form(); ?>
                    <?php endif; ?>
                  </div>
                </div>

              </header>
              <!-- end header -->

              <article id="content" role="main" tabindex="-1" class="container-fluid">

                  <?php fire_plugin_hook('public_content_top', array('view'=>$this)); ?>
