<?php snippet('header') ?>
  <main class="main-session" data-year="<?= $page->year()->value() ?>" data-slug="<?= $page->slug() ?>">
    
    <?php snippet("prevnext")?>

    <article class="session-detail">

      <div class="max">
        <header class="session-header">
          <h3><?= $page->year()->html() ?></h3>
          <h1>
            <?= $page->title()->html()->widont() ?>
            <?php if($kirby->user()): ?>
              <a href="<?= $page->panelUrl() ?>" class="editcontext" style="width:15px; padding-left:5px; display:inline-block">
                <svg style="width:15px" enable-background="new 0 0 40 40" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg"><path d="m31.9 1c-1.8 0-3.6.7-5 2.1-8 7.9-16 15.9-23.9 23.9l10 10 23.9-23.9c2.8-2.8 2.8-7.3 0-10.1-1.4-1.3-3.2-2-5-2zm-30.2 28.1-.7 8.6c-.1.7.6 1.3 1.3 1.3l8.6-.7z"/></svg>
              </a>
            <?php endif ?>
          </h1>
          <?php if ($page->subtitle()->isNotEmpty()) :?>
            <div class="session-subtitle">
              <?= $page->subtitle()->kti()->widont()?>
          </div>
          <?php endif ?>
        </header>

        <div class="session-text">
          <div class="session-introduction-text main-text">
            <?= $page->introduction_text()->kt()?>
          </div>

          <?php if ($page->lecturers()->isNotEmpty()) :?>
            <aside class="session-lecturers main-text">
              <h2>Intervenants </h2>
              <ul>
              <?php $lecturers = $page->lecturers()->split();
              sort($lecturers);
                foreach ($lecturers as $lecturer): ?>
                <li><a href="<?= page("recherche")->url(['params' => ["tag"=> urlencode($lecturer) ]]) ?>"><?= $lecturer ?></a></li><?php endforeach ?>
              </ul>
            </aside>
          <?php endif ?>          
        </div>
        
        <nav class="session-readmore-nav ">
          <?php foreach($page->readmores()->toStructure() as $readmore) :?>
            
              <h3><?= $readmore->title() ?></h3>
              <?php if($readmore->subtitle()->isNotEmpty()) : ?>
                <p><?= $readmore->subtitle()->kti() ?></p>
              <?php endif ?>
              <?php if($readmore->text()->isNotEmpty() ) : ?>
                <?php $slug = str::Slug($readmore->title()->isNotEmpty() ? $readmore->title() : strip_tags($readmore->subtitle()->kti())); ?>
                <p><a class="readmore-link" href="#<?= $slug ?>">En savoir +</a></p>
              <?php endif ?>
          <?php endforeach ?>
        </nav>
      
      </div>
    
    </article>

    
    <aside class="session-readmores main-text">
      
        <?php foreach($page->readmores()->toStructure() as $readmore) :?>
          <?php $slug = str::Slug($readmore->title()->isNotEmpty() ? $readmore->title() : strip_tags($readmore->subtitle()->kti())); ?>
          <div class="session-readmore" id="<?= $slug ?>">          
            <div class="max main-text">
              <?php e($readmore->title()->isNotEmpty(), "<h3>" . $readmore->title() . "</h3>")  ?>
              <button class="readmore-close">Fermer</button>
              <div>
                <?php if($readmore->subtitle()->isNotEmpty()) : ?>
                  <p><?= $readmore->subtitle()->kti() ?></p>
                <?php endif ?>
                <div class="readmore-text">
                  <?= $readmore->text()->kt() ?>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach ?>
    </aside>
  

    <?php
    $gallery = $page->gallery()->filter(function ($image) use ($page) {
        return $image != $page->cover()->toFile();
    })->sortBy('sort')->toFiles();
     if ($gallery->count()) :?>
      <div class="session-gallery">
        <div class="max">
          <h3><?= $page->year() ?> — <?= r($page->gallery_title()->isNotEmpty(), $page->gallery_title(), "le programme en images") ?></h3>
        </div>
        <div class="gallery max">
          <?php foreach ($gallery as $image) : ?>     
          <figure class="<?= $image->layout() ?>">
            <a href="<?= $image->url() ?>" class="glightbox">
              <img loading="lazy" width="<?= $image->width() ?>" height="<?= $image->height() ?>" src="<?= $image->thumb('default')->url()?>" alt="<?= $image->alt()?>" srcset="<?= $image->srcset('default')?>">
            </a>
            <?php foreach($image->markers()->toStructure() as $marker): ?>
                <div class="marker" style="<?= markerStyle($marker); ?>"><span><?= $marker->text() ?></span></div>
            <?php endforeach; ?>
            <?php if ($image->caption()->isNotEmpty()) :?>
              <figcaption>
                <?= $image->caption()->kt()?>
              </figcaption>
            <?php endif ?>

          </figure>
          <?php endforeach ?>
        </div>
      </div>
    <?php endif ?>

    <?php if ($page->lecturers()->isNotEmpty()) :?>
      <aside class="session-lecturers main-text intervenants-bottom">
        <h2>Intervenants </h2>
        <ul>
        <?php $lecturers = $page->lecturers()->split();
        sort($lecturers);
          foreach ($lecturers as $lecturer): ?>
          <li><a href="<?= page("recherche")->url(['params' => ["tag"=> urlencode($lecturer) ]]) ?>"><?= $lecturer ?></a></li><?php endforeach ?>
        </ul>
      </aside>
    <?php endif ?>          
  </div>

    <?php
    $contexts = $page->children()->listed()->template("context");
    if ($contexts->count()): ?>
      <div class="session-contexts-wrapper">
        <div class="max">
          <h3 class="session-contexts-title">Contexte</h3>
          <aside class="session-contexts">
            <?php foreach ($contexts as $context) :?>
              <?php snippet("context", ["context"=>$context]) ?>
            <?php endforeach ?>
          </aside>
        </div>
      </div>
    <?php endif ?>

    <?php snippet("prevnext")?>

  </main>
<?php snippet('footer') ?>
