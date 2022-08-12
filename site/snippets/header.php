<!DOCTYPE html>
<html lang="<?php echo $kirby->language() ?? 'fr' ?>">
<head>

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <script>document.getElementsByTagName('html')[0].className = 'js'</script>
  
  <?php snippet("header.metas") ?>
  
  <?= css("assets/fonts/fonts.css") ?>
  <?= css(["assets/css/index.css?v2.3", "@auto"]) ?>
  <?= css("assets/glightbox/glightbox.min.css") ?>
  <?php if (isset($_COOKIE["font"])) : $font = $_COOKIE["font"]; ?>
    <style>
      :root {
        --serif: <?= $font ?>, serif;
        <?php switch ($font) {
          case 'Fern Web':
            echo '--lh-adjustment:1.1; --fs-adjustment:1.05}';
            echo '#changefont-fern { background-color: var(--accent-color) }';
            break;
          case 'Source Serif VF':
            echo '--lh-adjustment:1; --fs-adjustment:1;}';
            echo '#changefont-source { background-color: var(--accent-color) }';
            break;
          case 'Roboto Serif':
            echo '--lh-adjustment:1.1; --fs-adjustment:.96}';
            echo '#changefont-roboto { background-color: var(--accent-color) }';
            break;
        } ?>
    </style>
  <?php endif ?>
</head>
<body
   data-slug="<?= $page->slug() ?>"
   data-login="<?php e($kirby->user(), 'true', 'false') ?>"
   data-template="<?php echo $page->template() ?>"
   data-intended-template="<?php echo $page->intendedTemplate() ?>">

  <header id="header">
    <div class="max">
      <h1 class="logo">
        <a href="<?= $site->url() ?>">
        <strong><?= $site->title() ?></strong><br>
        <span><?= $site->subtitle() ?></span>
        </a>
      </h1>
      
      <nav id="nav" class="">
        <ul class="nav-decades">
        <?php foreach ($site->children()->listed() as $p): 
          if($p->intendedTemplate() == "decade"){
            $url = $site->url() . "/#decade-" . $p->slug();  
          } else {
            $url = $p->url();
          }
          ?>
          <li><a href="<?= $url ?>">
          <?= explode( "–", $p->title()->text())[0] ?>
          </a></li>
        <?php endforeach ?>
        </ul>

        <button id="hamburger" class="hamburger" aria-label="Menu" aria-expanded="false" tabindex="0"><span>menu</span></button>
        
        <div id="search-bar">
          
          <button type="button" id="search-navbutton" class="search-button">
            <svg viewBox="0 0 24 24" sizes="" class="search-icon"><path fill="#000000" d="M17.121 15l5.598 5.597a.5.5 0 010 .707l-1.415 1.415a.5.5 0 01-.707 0L15 17.12 17.121 15z"></path><path fill="#16161d" fill-rule="evenodd" d="M10.5 19a8.5 8.5 0 100-17 8.5 8.5 0 000 17zm0-2.75a5.75 5.75 0 100-11.5 5.75 5.75 0 000 11.5z" clip-rule="evenodd"></path></svg>
          </button>
          <form action="<?= page("recherche")->url()?>" class="search-form">
            <input type="search" name="q" id="search-input" class="search-input"  value="<?php if(isset($query)) {
                echo html($query);
            } ?>">
            <button type="submit" class="search-button" id="search-button" >
              <svg viewBox="0 0 24 24" sizes="" class="search-icon"><path fill="#000000" d="M17.121 15l5.598 5.597a.5.5 0 010 .707l-1.415 1.415a.5.5 0 01-.707 0L15 17.12 17.121 15z"></path><path fill="#16161d" fill-rule="evenodd" d="M10.5 19a8.5 8.5 0 100-17 8.5 8.5 0 000 17zm0-2.75a5.75 5.75 0 100-11.5 5.75 5.75 0 000 11.5z" clip-rule="evenodd"></path></svg>
            </button>
          </form>
          </div>    
      </nav>
    </div>

  </header>
  <div id="search-overlay"></div>