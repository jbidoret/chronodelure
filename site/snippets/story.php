
<div class="story" id="<?= $story->slug() ?>">
  <?php if($story->myaudio()->isNotEmpty()) :?>
    <audio src="<?= $story->myaudio()->toFile()->url() ?>" ></audio>
  <?php endif ?>
  <?php if($story->myvideo()->isNotEmpty()) :?>
    <video src="<?= $story->myvideo()->toFile()->url() ?>" ></video>
  <?php endif ?>
  <?php if($story->myimage()->isNotEmpty()) :?>
    <img src="<?= $story->myimage()->toFile()->url() ?>" alt="<?= $story->myimage()->toFile()->alt() ?>" >
  <?php endif ?>
  <?php if($story->mytext()->isNotEmpty()) :?>
    <div class="story-text">
      <?= $story->mytext()->kt() ?>
    </div>
  <?php endif ?>
  <?php if($story->contributor()->isNotEmpty()) :?>
    <div class="story-contributor">
      <?= $story->contributor()->kt() ?>
    </div>
  <?php endif ?>
</div>