<?= snippet("header") ?>
  <main class="default-main">
    <article class="context-article">
      <div class="max">
        <div class="context-session">
          <?= snippet("minisession", ["session"=>$page->parent()])?>
        </div>

        <div id="context-content" class="context <?= r($page->category()->isNotEmpty(), 'context-'.$page->category(), '') ?>" data-type="<?php if ($page->category()->isNotEmpty()) :?><?= $page->category() ?><?php endif ?>">

          <div class="context-content context-page <?= r($page->category()->isNotEmpty(), 'context-'.$page->category(), '') ?>" >
            
            <div class="context-category"><?= $page->parent()->year() ?> — <?= categoryDisplay($page->category()) ?></div>
            <h3 class="context-title">
              <?= $page->title() ?>
              <?php if($kirby->user()): ?>
                <a href="<?= $page->panelUrl() ?>" class="editcontext" style="width:15px; padding-left:5px; display:inline-block">
                  <svg style="width:15px" enable-background="new 0 0 40 40" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg"><path d="m31.9 1c-1.8 0-3.6.7-5 2.1-8 7.9-16 15.9-23.9 23.9l10 10 23.9-23.9c2.8-2.8 2.8-7.3 0-10.1-1.4-1.3-3.2-2-5-2zm-30.2 28.1-.7 8.6c-.1.7.6 1.3 1.3 1.3l8.6-.7z"/></svg>
                </a>
              <?php endif ?>
            </h3>
            
            <?php if ($page->introduction()->isNotEmpty()) :?>
              <div class="context-introduction">
                <?= $page->introduction()->kt()?>
              </div>
            <?php endif ?>

            <?php if ($page->cover()->isNotEmpty() && !$page->hide_cover_in_popup()->toBool()) :?>
            <figure class="context-cover">
              <?php $image = $page->cover()->toFile() ?>
              <img loading="lazy" width="<?= $image->width() ?>" height="<?= $image->height() ?>" src="<?= $image->thumb('cover')->url()?>" alt="<?= $image->alt()?>" srcset="<?= $image->srcset('cover')?>" data-popup-img="<?= $image->url() ?>">
            </figure>
            <?php endif ?>

            <?php if ($page->details()->isNotEmpty()):?>
              <div class="context-details">
                <?= $page->details()->kt()?>
              </div>
            <?php endif ?>

            <?php if ($page->text()->isNotEmpty()):?>
              <div class="context-text">
                <?= $page->text()->kt()?>
              </div>
            <?php endif ?>


            <?php if ($page->link()->isNotEmpty() ):?>
              <p class="context-source">
                  <a href="<?= $page->link() ?>">→ <?php $parse = parse_url($page->link()); echo $parse['host']; ?></a>
              </p>
            <?php endif ?>

          </div>

        </div>  
        
        <div class="context-session">
          <?php
          $contexts = $page->siblings(false)->listed()->template("context");
          if ($contexts->count()): ?>
            <div class="session-contexts-wrapper">
                <aside class="session-contexts">                  
                  <h3 class="session-contexts-title">Contexte</h3>
                  <?php foreach ($contexts as $context) :?>
                    <?php snippet("context", ["context"=>$context]) ?>
                  <?php endforeach ?>
                </aside>
            </div>
          <?php endif ?>
        </div>

      </div>
    
    </article>
  </main>
<?= snippet("footer") ?>