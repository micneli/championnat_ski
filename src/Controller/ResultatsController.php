<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Resultat;
use App\Repository\ResultatRepository;

class ResultatsController extends AbstractController
{
    /**
     * @Route("/resultat/repository", name="resultat_repository")
     */
    public function index()
    {
        return $this->render('resultats/index.html.twig', [
            'controller_name' => 'ResultatsController',
        ]);
    }

    /**
     * @Route("/resultats", name="resultats")
     * @param ResultatRepository $resultatRepository
     * @return |Symfony|Component|HttpFondation|Response
     */
    public function resultats (ResultatRepository $resultatRepository) {

        $resultats = $resultatRepository->findResultats(); // the function findResultats() has to be declared within ResultatRepository.php

        $message = [
            'text_message' => 'Positions general'
        ];

        return $this->render("resultats/resultats.html.twig", [
            'resultats' => $resultats,
            'message' => $message
        ]);
    }

    /**
     * @Route("/resultats/general-hommes", name="resultat.general-hommes")
     * @param ResultatRepository $resultatRepository
     * @return |Symfony|Component|HttpFondation|Response
     */
    public function resultats_general_hommes (ResultatRepository $resultatGeneralHommesRepository) {

        $resultats = $resultatGeneralHommesRepository->findResultatsGeneralHommes(); // the function findResultats() has to be declared within ResultatRepository.php

        $message = [
            'text_message' => 'Positions general hommes'
        ];

        return $this->render("resultats/resultats.html.twig", [
            'resultats' => $resultats,
            'message' => $message
        ]);
    }

    /**
     * @Route("/resultats/general-femmes", name="resultat.general-femmes")
     * @param ResultatRepository $resultatRepository
     * @return |Symfony|Component|HttpFondation|Response
     */
    public function resultats_general_femmes (ResultatRepository $resultatGeneralFemmesRepository) {

        $resultats = $resultatGeneralFemmesRepository->findResultatsGeneralFemmes(); // the function findResultats() has to be declared within ResultatRepository.php

        $message = [
            'text_message' => 'Positions general femmes'
        ];

        return $this->render("resultats/resultats.html.twig", [
            'resultats' => $resultats,
            'message' => $message
        ]);
    }
}