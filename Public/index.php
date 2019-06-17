<?php
//récupération de l'autoloader créé par composer
require dirname(__DIR__) . '/vendor/autoload.php';

// les "use" des différentes classes
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;
use Slim\Http\Response;

$config = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];


//On crée l'app Slim
$app = new App();

$app->get('/homepage', function (ServerRequestInterface $request, ResponseInterface $response) {
    $response = $response->getBody()->write('<h1>Bonjour</h1>');
    return $response;
});

$app->get('/contact', function (ServerRequestInterface $request, ResponseInterface $response) {
    $response = $response->getBody()->write('<h1>Contact 2</h1>');
    return $response;
});


$app->get('/hamac', function (ServerRequestInterface $request, Response $response) {
    //Création des données
    $hamac = [
        "name" => "Hamac",
        "description" => "Pour dormir APRES slim (pas pendant...;))"
    ];
    //On met les données dans la réponse (en précisant que ce doit être du JSON)
    $response = $response->withJson($hamac);
    //On retourne la réponse au navigateur
    return $response;
});

$app->group('/produit', function() {
//Page de la liste des produits

//Création d'une liste des produits
    $this->get('/liste', function (ServerRequestInterface $request, Response $response, array $args) {
        $response = $response->getBody()->write('<h1>Liste des produits</h1>');
        return $response;
    });


//Création d'une route possédant une variable
    $this->get('/{id:\d+}', function (ServerRequestInterface $request, Response $response, array $args) {
        //var_dump($args ['id']);
        $response = $response->getBody()->write("<h1>Détail du produit {$args['id']} </h1>");
        return $response;
    });


});


//Renvoi de la réponse au nav
$app->run();




