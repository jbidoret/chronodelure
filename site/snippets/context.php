<div id="context-<?= $context->slug() ?>" class="session-context" data-type="<?php if ($context->category()->isNotEmpty()) :?><?= $context->category() ?><?php endif ?>">


  <div class="content-context">
  <h3><?= $context->title() ?></h3>
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

  <?php if ($context->link()->isNotEmpty()):?>
    <p class="context-source">
      <a href="<?= $context->link() ?>">
        → 
        <?php 
          $parse = parse_url($context->link());
          echo $parse['host'];
        ?>
      </a>
    </p>
  <?php endif ?>
  </div>

</div>