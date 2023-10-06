<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProductController extends AbstractController
{
    #[Route('/product', name: 'app_product')]
    public function index(ProductRepository $repo): Response
    {
        $products = $repo->findAll();

        dump($products);
        return $this->render('product/index.html.twig', [
            'products' => $products
        ]);
    }
    // #[Route('/product', name: 'app_product')]
    // public function index(ManagerRegistry $doctrine): Response
    // {

    //     $repo = $doctrine->getRepository(Product::class);
    //     $products = $repo->findAll();


    //     return $this->render('product/index.html.twig', [
    //         'products' => $products
    //     ]);
    // }

    #[Route("/product/{id}", name: "product_show")]
    public function show(int $id, ProductRepository $repo): Response
    {
        $product = $repo->find($id);

        return $this->render("product/show.html.twig", [
            'product' => $product
        ]);
    }
}
