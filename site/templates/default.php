<?php snippet('header') ?>
  <main class="default-main">
    <header class="default-header">
      <div class="max">
        <h1><?= $page->title() ?></h1>
      </div>
    </header>
    <article class="default-article">
      <div class="max">
        <?= $page->text()->kt() ?>
      </div>
      <div class="max fontchanger">
        <p>À l’occasion des 70<sup>e</sup> Rencontres internationales de Lure, le choix typographique de la Timelure fut déterminé collectivement. En complément de l’Antique Olive de Roger Excoffon, le <a href="https://djr.com/notes/junes-font-of-the-month-fern-text">Fern Text</a> de David Jonathan Ross a été choisi en tant que caractère de texte. Le Source Serif de Frank Grießhammer est maintenu comme alternative.</p>
        <p class="buttons">
          <button class="changefont" id="changefont-fern" data-font="Fern Web">Fern</button>
          <button class="changefont" id="changefont-source" data-font="Source Serif VF">Source Serif</button>
        </p>        
      </div>
    </article>
  </main>
<?php snippet('footer') ?>
