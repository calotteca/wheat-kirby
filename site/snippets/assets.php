<?php 
    $salt = rand();
    if (Url::query() === 'dev=') {
        Cookie::set('dev', '');
    };
    if (Url::query() === 'nodev=') {
        Cookie::remove('dev', '');
    };
?>

<link rel="preload" href="/assets/fonts/inter-v12-latin-regular.woff2" as="font" type="font/woff2" crossorigin="">
<link rel="preload" href="/assets/fonts/ibm-plex-serif-v15-latin-regular.woff2" as="font" type="font/woff2" crossorigin="">

<?php if ($dev = Cookie::exists('dev')): ?>
<link rel="stylesheet" href="/assets/css/index.css?v=<?= $salt ?>">
<?php else: ?>
<link rel="stylesheet" href="/assets/css/compiled.css?v=<?= $salt ?>">
<?php endif ?>

<script src="/assets/js/app/compiled.js?v=<?= $salt ?>" defer></script>
<script src="/assets/js/com/site-menu.js?v=<?= $salt ?>" defer></script>
<script src="/assets/js/com/lazy-video.js?v=<?= $salt ?>" defer></script>

