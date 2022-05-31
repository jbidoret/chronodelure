<?php snippet('header') ?>
  <main class="default-main">
    <header class="default-header">
      <div class="max">
        <h1><?= $page->title() ?></h1>
      </div>
    </header>
    <article class="default-article">
      <div class="max">
        <?= $page->text()->kt() ?>
      </div>
    </article>
  </main>
<?php snippet('footer') ?>
