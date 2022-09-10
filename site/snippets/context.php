<div id="context-<?= $context->slug() ?>" class="context <?= r($context->category()->isNotEmpty(), 'context-'.$context->category(), '') ?> <?= r($context->details()->isNotEmpty(), 'context-has-details', '') ?>" data-href="<?= $context->url() ?>" data-type="<?php if ($context->category()->isNotEmpty()) :?><?= $context->category() ?><?php endif ?>">

  <div class="context-content ">

    <?php if ($context->cover()->isNotEmpty()) :?>
      <?php if($image = $context->cover()->toFile()): ?>
      <figure class="context-cover <?= r($image->isPortrait(), 'is-portrait', '')?> ">
        <img loading="lazy" width="<?= $image->width() ?>" height="<?= $image->height() ?>" src="<?= $image->thumb('small')->url()?>" alt="<?= $image->alt()?>" srcset="<?= $image->srcset('small')?>" data-popup-img="<?= $image->url() ?>">
      </figure>
    <?php endif; endif; ?>

    <h3 class="context-title">
      <?= $context->title() ?>
    </h3>
    
    <?php if ($context->introduction()->isNotEmpty()) :?>
      <div class="context-introduction">
        <?= $context->introduction()->kt()?>
      </div>
    <?php endif ?>


    <?php if ($context->link()->isNotEmpty() || $context->details()->isNotEmpty()):?>
      <p class="context-source">
        <?php if ($context->details()->isNotEmpty()):?>          
          <a href="<?= $context->url() ?>" class="details-link " data-height="80vh">→ aller plus loin</a>
        <?php else: ?>
          <a href="<?= $context->link() ?>" class="external">→ <?php $parse = parse_url($context->link()); echo $parse['host']; ?></a>
        <?php endif ?>
      </p>
    <?php endif ?>

  </div>

</div>