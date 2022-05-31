<nav class="prevnext">
  <div class="max">
    <?php if ($page->hasPrevListed($sessions)): $prev = $page->prevListed($sessions);?>
      <a class="prevnext-prev" href="<?= $prev->url() ?>">← <span class="prevnext-year"><?= $prev->year() ?></span> <span class="prevnext-dash"> —</span> <span class="prevnext-title"><?= $prev->title() ?></span></a>
    <?php endif ?>
    <?php if ($page->hasNextListed($sessions)): $next = $page->nextListed($sessions);?>
      <a class="prevnext-next" href="<?= $next->url() ?>"><span class="prevnext-year"><?= $next->year() ?></span> <span class="prevnext-dash"> —</span> <span class="prevnext-title"><?= $next->title() ?></span> →</a>
    <?php endif ?>
  </div>
</nav>