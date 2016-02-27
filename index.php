<?php

use Sire\Router;

require __DIR__ . '/vendor/autoload.php'; // Composer autoloader
require __DIR__ . '/config.php'; // SiRe configuration

$alerts = array();
$router = new Router();

// TODO use array key for name, loop/pop/whatever (get all backends)
$backend = Sire\BackendFactory::createBackend('default', $config['backend']['default']);
$file = $router->process($backend);

function dpm($var,$label="debug")
{
    global $alerts;
    $alerts[] = "$label: " . ( is_string($var) ? $var : print_r($var,TRUE) );
}

?><!DOCTYPE html>
<html lang="nb">
  <head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex" />
    <title>Sire page</title>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-7s5uDGW3AHqw6xtJmNNtr+OBRJUlgkNJEo78P4b0yRw= sha512-nNo+yCHEyn0smMxSswnf/OnX6/KwJuZTlNZBjauKhTK0c+zT+q5JOCx0UFhXQ6rJR9jg6Es8gPuD2uZcYDLqSw==" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha256-KXn5puMvxCw+dAYznun+drMdG1IFl3agK0p/pqT9KAo= sha512-2e8qq0ETcfWRI4HJBzQiA3UoyFk6tbNyG+qSaIBZLyW9Xf3sWZHN/lxe9fTh1U45DpPf07yj94KsUHHWe4Yk1A==" crossorigin="anonymous"></script>
    <style>
body { padding-top: 60px; }
@media screen and (max-width: 768px) {
    body { padding-top: 0px; }
}
</style>
  </head>
  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">Sire page<?php // TODO Add real page title both here and in head ?></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <!--li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li-->
          </ul>
        </div>
      </div>
    </nav>
    <div class="container">
      <?php if (!empty($alerts)) { ?>
        <?php foreach ($alerts as $alert) { ?>
          <div class="alert alert-warning" role="alert"><?= $alert ?></div>
        <?php } ?>
      <?php } ?>
      <div class="starter-template">
        <?php echo $file->render(); ?>
      </div>
    </div><!-- /.container -->
  </body>
</html>
