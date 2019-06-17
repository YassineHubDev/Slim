<?php
//récupération de l'autoloader créé par composer
require dirname(__DIR__) . '/vendor/autoload.php';
// les "use" des différentes classes
use Slim\App;
//On crée l'app Slim
$app = new App();
