<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        $name = "Berti";
        $prenoms = [
            "Steve"  => 33,
            "Martin" => 16,
            "Maxime" => 22,
            "Benoît" => 28,
            "Hans" => 22
        ];

        return $this->render('home/index.html.twig', [
            'tableau' => $prenoms,
            'nom' => $name,
            'age' => 45
        ]);
    }

    #[Route("/blog/{id}", name: "blog_show")]
    public function show(int $id): Response
    {
        return $this->render('home/test.html.twig',[
            'id' => $id
        ]);
    }

    #[Route("/hello")]
    #[Route("/hello/{prenom}")]
    #[Route("/hello/{prenom}/age/{age}", name: "hello", requirements:["age"=>"\d+"])]
    public function hello(string $prenom = 'anonyme', $age = 0): Response
    {
        return new Response('Bonjour '.$prenom.' vous avez '.$age.' ans');
    }
}
