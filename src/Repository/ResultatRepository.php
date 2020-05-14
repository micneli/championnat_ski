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



    // public function findResultats() {
    //     return  $this->createQueryBuilder('r')
    //         ->innerJoin('App\Entity\Participant', 'p', \Doctrine\ORM\Query\Expr\Join::WITH, 'p.id = r.participants.id')
    //         ->innerJoin('App\Entity\Categorie', 'c', \Doctrine\ORM\Query\Expr\Join::WITH, 'c.id = r.categories.id')
    //         ->innerJoin('App\Entity\Competition', 'o', \Doctrine\ORM\Query\Expr\Join::WITH, 'o.id = r.competitions.id')
    //         ->getQuery()
    //         ->getResult()
    //     ;
    // }

    public function findResultats() {
        $connection = $this->getEntityManager()->getConnection();

        $sql = 'SELECT DISTINCT p.nom_participant, p.prenom_participant, p.ville, c.nom_categorie, r.resultat_final from participant p, categorie c, resultat r WHERE p.id = r.participants_id AND r.categories_id = c.id ORDER BY r.resultat_final ASC LIMIT 3';

        $statement = $connection->prepare($sql);
        $statement->execute();
        return $statement->fetchAll();
    }

    public function findResultatsGeneralHommes() {
        $connection = $this->getEntityManager()->getConnection();

        $sql = 'SELECT DISTINCT p.nom_participant, p.prenom_participant, p.ville, c.nom_categorie, r.resultat_final from participant p, categorie c, resultat r WHERE p.id = r.participants_id AND r.categories_id = c.id AND c.nom_categorie LIKE "%M" ORDER BY r.resultat_final ASC LIMIT 3';

        $statement = $connection->prepare($sql);
        $statement->execute();
        return $statement->fetchAll();
    }

    public function findResultatsGeneralFemmes() {
        $connection = $this->getEntityManager()->getConnection();

        $sql = 'SELECT DISTINCT p.nom_participant, p.prenom_participant, p.ville, c.nom_categorie, r.resultat_final from participant p, categorie c, resultat r WHERE p.id = r.participants_id AND r.categories_id = c.id AND c.nom_categorie LIKE "%F" ORDER BY r.resultat_final ASC LIMIT 3';

        $statement = $connection->prepare($sql);
        $statement->execute();
        return $statement->fetchAll();
    }
}
