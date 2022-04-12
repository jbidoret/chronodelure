<?php snippet('header') ?>
  <main>
    <?php
    $sessions = $site->index()->template('session')->listed()->sortBy("year", "asc");
    ?>
    <?php foreach($sessions as $session) : ?>
      <a href="<?= $session->panelUrl()?>">
      <?= $session->subtitle()->kt() ?>
      </a>
    <hr>
    <?php endforeach ?>
  </main>
<?php snippet('footer') ?>
