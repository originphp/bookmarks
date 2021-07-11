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
    <link rel="stylesheet" href="/css/application.css">

    <script src="/js/jquery.min.js" ></script>
    <script src="/js/application.js"></script>
    <title><?= $this->title(); ?></title>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg origin-navbar">
      <a class="navbar-brand" href="#">OriginPHP</a>
      <!-- Your Navbar goes here @link https://getbootstrap.com/docs/4.5/components/navbar/ -->
    </nav>

    <main class="container">
      <?= $this->Flash->messages() ?>
      <?= $this->content() ?>
    </main>
 
    <script>
      $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        }
      });
    
      $( document ).ready(function() {
          console.log( "ready!" );
      });
    </script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <?php
      if (class_exists(DebugBar::class)) {
          echo (new DebugBar())->render();
      }
    ?>
  </body>
</html>
