<article class="session ">
  <div class="max">
      <p class="session-year"><?= $session->year() ?></p>

      <div class="session-title">
        <a href="<?= $session->url() ?>">
          <h3><?= $session->title()->widont() ?></h3>
          <?php if ($session->subtitle()->isNotEmpty()) :?>
            <div class="session-subtitle">
              <?= $session->subtitle()->kti()->widont()?>
            </div>
          <?php endif ?>
        </a>
      </div>
      <div class="session-introduction">
        <a href="<?= $session->url() ?>">
          <?php if ($session->cover()->isNotEmpty()) :?>
          <figure class="session-cover">
            <?php $image = $session->cover()->toFile() ?>
            <img loading="lazy" width="<?= $image->width() ?>" height="<?= $image->height() ?>" src="<?= $image->thumb('cover')->url()?>" srcset="<?= $image->srcset('cover')?>"  alt="<?= $image->alt()?>" >
          </figure>
          <?php endif ?>
          <?php if ($session->introduction()->isNotEmpty()) :?>
            <div class="session-introduction-text">
              <?= $session->introduction()->excerpt(200, false, " […]")?>
            </div>
          <?php endif ?>
        </a>
      </div>

      <?php if ($session->lecturers()->isNotEmpty()) :?>
        <aside class="session-lecturers main-text" style="display:none">
          <ul>
          <?php $lecturers = $session->lecturers()->split();
          sort($lecturers);
            foreach ($lecturers as $lecturer): ?>
            <li><a href="<?= page("recherche")->url(['params' => ["tag"=> urlencode($lecturer) ]]) ?>"><?= $lecturer ?></a></li><?php endforeach ?>
          </ul>
        </aside>
      <?php endif ?>

      
    <?php
    $contexts = $session->children()->listed()->template("context")->groupBy('category');
    if ($contexts->count()): ?>
     

     <?php foreach($contexts as $context => $itemsPerCategory): ?>
        <aside class="context-group context-group-<?= $context ?>" data-responsive="desktop">
          <p class="categorie"></p>
          <?php foreach($itemsPerCategory as $item) : ?>
          <?php snippet("context", ["context"=>$item]) ?>
          <?php endforeach; ?>
        </aside>
    <?php endforeach ?>

    <aside class="all-context" data-responsive="phone">
    <?php foreach($contexts as $context => $itemsPerCategory): ?>
        <aside class="context-group context-group-<?= $context ?>" data-responsive="phone">
          <p class="categorie"></p>
          <?php foreach($itemsPerCategory as $item) : ?>
          <?php snippet("context", ["context"=>$item]) ?>
          <?php endforeach; ?>
        </aside>
    <?php endforeach ?>
    <aside>


     


    <?php endif ?>
  </div>
</article>