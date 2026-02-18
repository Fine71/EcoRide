<?php

namespace App\Repository;

use App\Entity\Covoiturage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Covoiturage>
 */
class CovoiturageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Covoiturage::class);
    }

    public function search(array $date): array
    {
        $qb = $this->createQueryBuilder('c');

        if (!empty($date['lieu_depart'])) {
            $qb->andWhere('c.lieu_depart LIKE :lieu_depart')
                ->setParameter('lieu_depart', '%' . $date['lieu_depart'] . '%');
        }

        if (!empty($date['Lieu_arrivee'])) {
            $qb->andWhere('c.Lieu_arrivee LIKE :Lieu_arrivee')
                ->setParameter('Lieu_arrivee', '%' . $date['Lieu_arrivee'] . '%');
        }

        if (!empty($date['date_depart'])) {
            $qb->andWhere('c.date_depart = :date_depart')
                ->setParameter('date_depart', $date['date_depart']);
        }

        return $qb->getQuery()->getResult();
    }

    //    /**
    //     * @return Covoiturage[] Returns an array of Covoiturage objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('c.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Covoiturage
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
