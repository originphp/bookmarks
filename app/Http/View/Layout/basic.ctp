<?php
/**
 * @var \App\Http\View\ApplicationView $this
 */
use Debug\DebugBar;
use Origin\Core\Config;

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="refresh" content="<?= Config::read('Session.timeout') + 1 ?>">
    <meta name="csrf-token" content="<?= $this->request->params('csrfToken') ?>">

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/default.css">
    
    <script src="/js/jquery.min.js" ></script>
    <script src="/js/application.js"></script>
    <title><?= $this->title(); ?></title>
  </head>
  <body>

    <main class="container">
      <?= $this->Flash->messages() ?>
      <?= $this->content() ?>
    </main>
 
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <?php
      if (class_exists(DebugBar::class)) {
          echo (new DebugBar())->render();
      }
    ?>
  </body>
</html>
