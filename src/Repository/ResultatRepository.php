<?php

namespace App\Repository;

use App\Entity\Resultat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Resultat|null find($id, $lockMode = null, $lockVersion = null)
 * @method Resultat|null findOneBy(array $criteria, array $orderBy = null)
 * @method Resultat[]    findAll()
 * @method Resultat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ResultatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Resultat::class);
    }

  
    public function findResultat($id)
    {
        // $em = $this->getEntityManager();

        // $query = $em->createQuery(
        //     "SELECT * FROM `resultat`ORDER BY categories_id = $id ,resultat_final DESC"
        // )->setParameter('categories_id', $id);

        // // returns an array of Product objects
        // return $query->getResult();


    // $offset = (int)$_GET['offset'];
    // $limit = (int)$_GET['limit'];

    return $this->createQueryBuilder('r')
    ->select("r")
    ->from('Resultat', 'r')
    ->orderBy('categorie_id', $id)
    ->orderBy('resultat_final', 'DESC')
    //->setFirstResult( $offset )
    //->setMaxResults( $limit )
    ->getQuery()
    ->getResult();

    }
}
