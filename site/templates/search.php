<?php snippet('header') ?>
  <main id="search">
    <header class="search-header">
      <div class="max">
      <?php if($tag):?>
          <h1><?= $tag ?></h1>
          <?php if($people = page("personnalites/".str::Slug($tag))) :?>
            <div class="people">
              <h2><?= $people->subtitle() ?></h2>
              <div class="text">
                <?= $people->introduction()->kt() ?>
              </div>
            </div>
          <?php endif ?>
        <?php elseif($ispeople->count()):?>
          
          <?php $loop=0; foreach ($ispeople as $people) :?>
            <div class="people ispeople">
              <?= r($loop == 0, "<h3>☞</h3>") ?>
              <h1><?= $people->title() ?></h1>
              <h2><?= $people->subtitle() ?></h2>
              <div class="text">
                <?= $people->introduction()->kt() ?>
              </div>
            </div>
          <?php $loop++;endforeach ?>
        </div>
      </header>
      <header class="search-header">
        <div class="max">
          <div class="search-query">
            <form action="<?= page("recherche")->url()?>" class="search-form">
              <input type="search" name="q" id="search-input-q" class="search-input" value="<?php if(isset($query)) {
                  echo html($query);
              } ?>">
              <button type="submit" class="search-button" id="search-button" >
                <svg viewBox="0 0 24 24" sizes="" class="search-icon"><path fill="#000000" d="M17.121 15l5.598 5.597a.5.5 0 010 .707l-1.415 1.415a.5.5 0 01-.707 0L15 17.12 17.121 15z"></path><path fill="#16161d" fill-rule="evenodd" d="M10.5 19a8.5 8.5 0 100-17 8.5 8.5 0 000 17zm0-2.75a5.75 5.75 0 100-11.5 5.75 5.75 0 000 11.5z" clip-rule="evenodd"></path></svg>
              </button>
            </form>
          </div>
        <?php else: ?>
          <h1 class="page-title">Recherche</h1>
          <div class="search-query">
            <form action="<?= page("recherche")->url()?>" class="search-form">
              <input type="search" name="q" id="search-input-q" class="search-input" value="<?php if(isset($query)) {
                  echo html($query);
              } ?>">
              <button type="submit" class="search-button" id="search-button" >
                <svg viewBox="0 0 24 24" sizes="" class="search-icon"><path fill="#000000" d="M17.121 15l5.598 5.597a.5.5 0 010 .707l-1.415 1.415a.5.5 0 01-.707 0L15 17.12 17.121 15z"></path><path fill="#16161d" fill-rule="evenodd" d="M10.5 19a8.5 8.5 0 100-17 8.5 8.5 0 000 17zm0-2.75a5.75 5.75 0 100-11.5 5.75 5.75 0 000 11.5z" clip-rule="evenodd"></path></svg>
              </button>
            </form>
          </div>
        <?php endif ?>
      </div>
    </header>
          
    <?php if($results->count() == 0) :?>
      <div class="search-no-result">  
        <div class="max">
          Aucun résultat
        </div>
      </div>
    <?php endif ?>

    <section class="sessions">
      <?php foreach ($results as $session) :?>
        <?php snippet("session", ["session"=>$session]) ?>
      <?php endforeach ?>
    </section>



  </main>  
<?php snippet('footer') ?>
