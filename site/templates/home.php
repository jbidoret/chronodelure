<?php snippet('header') ?>

<main id="home">

  <?php if ($page->text()->isNotEmpty()): ?>
    <section class="home-intro">
      <div class="max">
        <?= $page->text()->kt() ?>
      </div>
    </section>
  <?php endif ?>
    
  <div class="decades">
    <?php
    $decades = $site->children()->listed()->template('decade');
    foreach ($decades as $decade): ?>
      <section class="decade" id="decade-<?= $decade->slug() ?>">
        <header class="max decade-header">
          <h2 class="decade-title">
            <?= $decade->title() ?>
          </h2>
          <div class="decade-intro">
            <?php if($decade->subtitle()->isNotEmpty()): ?>
              <h3 class="decade-subtitle">
              <?= $decade->subtitle() ?>
              </h3>
            <?php endif ?>
            <?php if($decade->introduction()->isNotEmpty()): ?>
              <?= $decade->introduction()->kt() ?>
            <?php else :?>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi non quis exercitationem culpa nesciunt nihil aut nostrum explicabo reprehenderit optio amet ab temporibus asperiores quasi cupiditate. Voluptatum ducimus voluptates voluptas?</p>
            <?php endif ?>
            
          </div>
        </header>
        <div id="decade-<?= $decade->slug() ?>-content" class="decade-content">
          <section class="decade-sessions" id="decade-sessions" data-decade="<?= $decade->slug() ?>">
            <?php foreach ($decade->children()->listed()->template("session") as $session) :?>
              <?php snippet("session", ["session"=>$session]) ?>
            <?php endforeach ?>
          </section>
        </div>
      </section>
    <?php endforeach ?>
  </div>

</main>

<?php snippet('footer') ?>
