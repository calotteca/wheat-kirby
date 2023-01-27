<?php
    date_default_timezone_set('America/Toronto');
    $salt = rand();
    $page_title = strval($page->seo()->toObject()->seo_title());
    $page_desc = strval($page->seo()->toObject()->seo_description()); 
    $page_img = $page->seo()->toObject()->seo_image()->toFile(); 
    $site_title = strval($site->seo()->toObject()->seo_title());
    $site_desc = strval($site->seo()->toObject()->seo_description());
    $site_img = $site->seo()->toObject()->seo_image()->toFile();

    $title = null;
    if (!empty($page_title)) {
       $title = $page_title;
    } elseif (!$page->isHomePage()) {
        $title = $page->title() . " | " . $site->title();
    } else {
        $title = $site->title();
    }

    $desc = null;
    if (!empty($page_desc)) {
        $desc = $page_desc;
    } else {
         $desc = "";
    }

     $img = null;
     if (!empty($page_img)) {
        $img = $page_img->url();
    } elseif (!empty($site_img)) {
         $img = $site_img->url();
    }
?>

<!DOCTYPE html>
<html lang="<?= $kirby->languageCode() ?? 'fr' ?>">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $title ?></title>
        <meta name="description" content="<?= $desc ?>">
 
        <link rel="stylesheet" href="/assets/css/compiled.css?v=<?= $salt ?>">
        <script src="/assets/js/app/compiled.js?v=<?= $salt ?>" defer></script>
        <script src="/assets/js/com/site-menu.js?v=<?= $salt ?>" defer></script>
        <script src="/assets/js/com/btn-back.js?v=<?= $salt ?>" defer></script>
        <script src="/assets/js/com/btn-copy.js?v=<?= $salt ?>" defer></script>
        
        <link rel="apple-touch-icon" sizes="180x180" href="<?= url('assets/images/apple-touch-icon.png') ?>">
        <link rel="icon" type="image/png" sizes="32x32" href="<?= url('assets/images/favicon-32x32.png') ?>">
        <link rel="icon" type="image/png" sizes="16x16" href="<?= url('assets/images/favicon-16x16.png') ?>">
        <meta property="og:title" content="<?= $title ?>" />
        <meta property="og:description" content="<?= $desc ?>">
        <meta property="og:type" content="website" />
        <meta property="og:url" content="<?= $page->url() ?>" />
        <meta property="og:image" content="<?= $img ?>" />
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="<?= $title ?>">
        <meta name="twitter:description" content="<?= $desc ?>">
        <meta name="twitter:image" content="<?= $img ?>">
        <meta name="htmx-config" content='{"includeIndicatorStyles": false, "scrollBehavior":"auto", "defaultSettleDelay": 0, "defaultSwapDelay": 600}'>
    </head>
    <body class="top" hx-boost="true">
