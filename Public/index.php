<?php
//récupération de l'autoloader créé par composer
require dirname(__DIR__) . '/vendor/autoload.php';

// les "use" des différentes classes
use Slim\App;

// Config
$config = require dirname(__DIR__) . '/config/config.php';

//On crée l'app Slim
$app = new App($config);

// Récupération du conteneur
require dirname(__DIR__) . '/config/container.php';
// Récupération des routes

require dirname(__DIR__) . '/config/route.php';

//Renvoi de la réponse au nav
$app->run();




