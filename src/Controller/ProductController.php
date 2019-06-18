<?php

namespace App\Controller;

use App\Utilities\AbstractController;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class ProductController extends AbstractController
{
    public function liste(ServerRequestInterface $request, ResponseInterface $response, array $args)
    {
        return $this->twig->render($response, 'product/list.twig');
    }


    public function show(ServerRequestInterface $request, ResponseInterface $response, array $args)
    {
        //var_dump($args ['id']);
        $response = $response->getBody()->write("<h1>Détail du produit {$args['id']} </h1>");
        return $response;
    }
}


