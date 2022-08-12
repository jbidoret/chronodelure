<?php snippet('header') ?>
  <main class="default-main">
    <header class="default-header">
      <div class="max">
        <h1><?= $page->title() ?></h1>
      </div>
    </header>
    <article class="default-article">
      <div class="max fontchanger">
        <p>À l’occasion des 70<sup>e</sup> Rencontres internationales de Lure, la discussion fera rage autour du choix typographique de la Timelure. Cliquez sur les boutons ci-dessous, et rejoignez le débat&nbsp;:</p>
        <p class="buttons">
          <button class="changefont" id="changefont-source" data-font="Source Serif VF">Source Serif</button>
          <button class="changefont" id="changefont-fern" data-font="Fern Web">Fern</button>
          <button class="changefont" id="changefont-roboto" data-font="Roboto Serif">Roboto Serif</button>
        </p>
        
      </div>
      <div class="max">
        <?= $page->text()->kt() ?>
      </div>
    </article>
  </main>
<?php snippet('footer') ?>
