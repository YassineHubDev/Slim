<?php
namespace App\Controller;

use App\Entity\Produit;
use App\Utilities\AbstractController;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class ProductController extends AbstractController
{
    public function liste(ServerRequestInterface $request, ResponseInterface $response, array $args)
    {
        // Requête SQL
        $query = "SELECT * FROM product WHERE etat_publication = 1";
        // Exécution de la requête SQL et récupération des produits
        $products = $this->database->query($query, Produit::class);
        // On renvoie les produits à la vue
        return $this->twig->render($response, 'product/list.twig', [
            'products' => $products
        ]);
    }

    public function show(ServerRequestInterface $request, ResponseInterface $response, array $args)
    {
        $id = $args ['id'];
        // Requête SQL
        $query = "SELECT * FROM product WHERE id = ? AND etat_publication = 1";
        $product = $this->database->queryPrepared($query, [$id], Produit::class);

        //On teste so un produit a été retourné
        if (empty($product)) {
            //page d'erreur 404
            return $this->twig->render($response, 'errors/error404.twig')
        }

        return $this->twig->render($response, 'product/detail.twig');
    }
}
