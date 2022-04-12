<article class="mini-session">
  <a href="<?= $session->url() ?>" >

    <?php if ($session->cover()->isNotEmpty()) :?>
    <figure class="mini-session-cover">
      <?php $image = $session->cover()->toFile() ?>
      <img loading="lazy" width="<?= $image->width() ?>" height="<?= $image->height() ?>" src="<?= $image->thumb('tiny')->url()?>" alt="<?= $image->alt()?>" >
    </figure>
    <?php endif ?>
    <h3 class="mini-session-title"><?= $session->year() ?> — <?= $session->title() ?></h3>
  </a>
</article>