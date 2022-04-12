<?php
  $cover = $page->cover()->first()->toFile();
  if (!$cover) {
      $cover = page('home')->metaimage()->toFile();
  }
  if ($cover) {
      $og_cover = $cover->thumb(['width' => 1200, 'height' => 630, 'crop' => true]);
  } else {
      $og_cover = null;
  }

  // Title
  $title = r($page->year()->isNotEmpty(), $page->year()->text() . " &ndash; ", "");
  $title .= r($page !== $site->homePage(), $page->title()->html());
  $title .= r($page->subtitle()->isNotEmpty(), " &ndash; " . strip_tags( $page->subtitle()->text()), "");
  $title .= r($page !== $site->homePage(), " &ndash; ") . $site->title()->html();

  // Description
  $description = "";
  $description .= r($page->metadescription()->isNotEmpty(), $page->metadescription()->toString(), "");
  $description .= r($page->subtitle()->isNotEmpty(), $page->subtitle()->toString() . " | ", "");
  $description .= Html::encode($page->text()->excerpt(150)->toString());
  $description = trim(preg_replace('/[\t\n\r\s]+/', ' ', $description));

  if ($description == "") {
      $description = Html::encode(page('home')->metadescription()->toString());
  }
?>
  
  <title><?php echo $title ?></title>

  <link rel="canonical" href="<?= $page->url() ?>">

  <meta name="author" content="<?php echo $site->author()->html() ?>">
  <meta name="description" content="<?= $description ?>">
  <meta name="keywords" content="<?= $site->keywords()->text() ?>">

  <meta property="og:url" content="<?= $page->url() ?>">
  <meta property="og:type" content="website">
  <meta property="og:title" content="<?php echo $title ?>">
  <meta property="og:description" content="<?= $description ?>">
  <meta property="og:site_name" content="<?= $site->title() ?>">
  <meta property="og:locale" content="<?= $kirby->language() ?>">
  <?php if ($og_cover) : ?>
  <meta property="og:image" content="<?= $og_cover->url() ?>">
  <meta property="og:image:width" content="<?= $og_cover->width() ?>">
  <meta property="og:image:height" content="<?= $og_cover->height() ?>">
  <?php endif ?>

  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="<?php echo $title ?>" />
  <meta name="twitter:description" content="<?= $description ?>" />
  <?php if ($og_cover) : ?>
  <meta name="twitter:image" content="<?= $og_cover->url() ?>" />
  <?php endif ?>

  
  <link rel="manifest" href="<?= url('assets/favicons/site.webmanifest') ?>">
  <meta name="theme-color" content="#FFFFFF">
  
  <link rel="icon" type="image/svg+xml" href="<?= url('assets/icons/favicon.svg') ?>">
    <link rel="icon" type="image/png" href="<?= url('assets/icons/favicon.png') ?>">