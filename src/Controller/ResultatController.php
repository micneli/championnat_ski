<?php


namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Resultat;
use App\Entity\Categorie;
use App\Repository\CategorieRepository;
use App\Repository\ResultatRepository;

class ResultatController extends AbstractController
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

    /**
     * @Route("/Resultat/Categorie/65", name="Resultat")
     */
    public function index($id): Response // Permet d'afficher la page d'accueil
    {
        $id = 65;

        $repoResultat = $this->getDoctrine()->getRepository(Resultat::class)
        ->findResultat($id);

        $resultat = $repoResultat;


        dd($resultat);

        return new Response($this->twig->render('resultat/index.html.twig', ['resultat' => $resultat])); // Charge home.html.twig

    }
}
