<?php


namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class ResultatController
{

    /**
     * @var Environment
     */
    private $twig;

    // public function __construct(Environment $twig) // Pour un chargement automatique du service
    public function __construct($twig)
    {
        $this->twig = $twig; // Initialise l'objet twig

    }

    public function index(): Response // Permet d'afficher la page d'accueil
    {


        return new Response($this->twig->render('resultat/index.html.twig')); // Charge home.html.twig

    }

   
   
}

