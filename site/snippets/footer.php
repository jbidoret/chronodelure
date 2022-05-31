
  <footer id="footer">
    <div class="max">
      <?= $site->footer()->kt() ?>

      <div class="partners">
        <div class="partners-text">
          <?= $site->partners()->kt() ?>
        </div>
        <div class="partners-logos">
          <?php foreach($site->logos()->toStructure() as $logo):?>
            <?= r($logo->url()->isNotEmpty(), "<a href='" . $logo->url() . "'>")?>
            <img src="<?= $logo->logo()->toFile()->url() ?>" alt="<?= $logo->title() ?>">
            <?= r($logo->url()->isNotEmpty(), "</a>")?>
          <?php endforeach ?>
        </div>
      </div>
      
    </div>
  </footer>

  <?php if($kirby->user()): ?>
    <a href="<?= $page->panelUrl() ?>" class="edit">
      <svg enable-background="new 0 0 40 40" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg"><path d="m31.9 1c-1.8 0-3.6.7-5 2.1-8 7.9-16 15.9-23.9 23.9l10 10 23.9-23.9c2.8-2.8 2.8-7.3 0-10.1-1.4-1.3-3.2-2-5-2zm-30.2 28.1-.7 8.6c-.1.7.6 1.3 1.3 1.3l8.6-.7z"/></svg>
    </a>
  <?php endif ?>

  <?= js("assets/glightbox/glightbox.min.js") ?>
  <?= js(['assets/js/index.js', '@auto' ]) ?>

</body>
</html>
