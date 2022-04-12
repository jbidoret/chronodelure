<nav class="prevnext">
  <div class="max">
    <?php if ($page->hasPrevListed($sessions)): $prev = $page->prevListed($sessions);?>
      <a href="<?= $prev->url() ?>">← <?= $prev->year() ?> — <?= $prev->title() ?></a>
    <?php endif ?>
    <?php if ($page->hasNextListed($sessions)): $next = $page->nextListed($sessions);?>
      <a href="<?= $next->url() ?>"><?= $next->year() ?> — <?= $next->title() ?> →</a>
    <?php endif ?>
  </div>
</nav>