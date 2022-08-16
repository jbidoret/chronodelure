<div id="context-<?= $context->slug() ?>" class="session-context" data-type="<?php if ($context->category()->isNotEmpty()) :?><?= $context->category() ?><?php endif ?>">

  <div class="content-context">

    <h3>
      <?= $context->title() ?>
      <?php if($kirby->user()): ?>
        <a href="<?= $context->panelUrl() ?>" class="editcontext" style="width:15px; padding-left:5px; display:inline-block">
          <svg style="width:15px" enable-background="new 0 0 40 40" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg"><path d="m31.9 1c-1.8 0-3.6.7-5 2.1-8 7.9-16 15.9-23.9 23.9l10 10 23.9-23.9c2.8-2.8 2.8-7.3 0-10.1-1.4-1.3-3.2-2-5-2zm-30.2 28.1-.7 8.6c-.1.7.6 1.3 1.3 1.3l8.6-.7z"/></svg>
        </a>
      <?php endif ?>
    </h3>
    
    <?php if ($context->introduction()->isNotEmpty()) :?>
      <div class="context-introduction">
        <?= $context->introduction()->kt()?>
      </div>
    <?php endif ?>

    <?php if ($context->cover()->isNotEmpty()) :?>
    <figure class="context-cover">
      <?php $image = $context->cover()->toFile() ?>
        <img loading="lazy" width="<?= $image->width() ?>" height="<?= $image->height() ?>" src="<?= $image->thumb('small')->url()?>" alt="<?= $image->alt()?>" srcset="<?= $image->srcset('small')?>" data-popup-img="<?= $image->url() ?>">
    </figure>
    <?php endif ?>

    <?php if ($context->details()->isNotEmpty()):?>
      <div class="context-details">
        <?= $context->details()->kt()?>
      </div>
    <?php endif ?>


    <?php if ($context->link()->isNotEmpty() || $context->details()->isNotEmpty()):?>
      <p class="context-source">
        <?php if ($context->details()->isNotEmpty()):?>
          
          <a href="#" class="details-link">
          → en savoir +
          </a>
        <?php else: ?>
          <a href="<?= $context->link() ?>">
            → <?php $parse = parse_url($context->link()); echo $parse['host']; ?>
          </a>
        <?php endif ?>
      </p>
    <?php endif ?>

  </div>

</div>