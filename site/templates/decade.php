<?php snippet('header') ?>
  <main class="decade" data-slug="<?= $decade->slug() ?>">
    
    <?php snippet('decade') ?>

    <?php foreach ($decade->children()->listed()->template("story") as $story):?>
      <?php snippet("story", ["story"=>$story]) ?>
    <?php endforeach ?>

    <nav class="prevnext">
      <?php $decades = $decade->siblings($self = true) ?>
      <?php if ($decade->hasPrevListed($decades)): $prev = $decade->prevListed($decades);?>
        <a href="<?= $prev->url() ?>">← <?= $prev->title() ?></a>
      <?php endif ?>
      <?php if ($decade->hasNextListed($decades)): $next = $decade->nextListed($decades);?>
        <a href="<?= $next->url() ?>"><?= $next->title() ?> →</a>
      <?php endif ?>
    </nav>

  </main>
<?php snippet('footer') ?>
