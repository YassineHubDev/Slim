<?php


namespace App\Controller;


use App\Utilities\AbstractController;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class ConexController extends AbstractController
{
    public function connection (ServerRequestInterface $request, ResponseInterface $response)
    {
        return $this->twig->render($response, 'form/connection.twig');
    }

}