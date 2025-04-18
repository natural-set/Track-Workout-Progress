<?php
namespace App\Repository;

use App\Entity\WorkoutSet;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<WorkoutSet>
 */
class WorkoutSetRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WorkoutSet::class);
    }

    // /**
    //  * @return Set[] Returns an array of Set objects
    //  */
    // public function findByExampleField($value): array
    // {
    //     return $this->createQueryBuilder('s')
    //         ->andWhere('s.exampleField = :val')
    //         ->setParameter('val', $value)
    //         ->orderBy('s.set_id', 'ASC')
    //         ->setMaxResults(10)
    //         ->getQuery()
    //         ->getResult()
    //     ;
    // }

    // public function findOneBySomeField($value): ?Set
    // {
    //     return $this->createQueryBuilder('s')
    //         ->andWhere('s.exampleField = :val')
    //         ->setParameter('val', $value)
    //         ->getQuery()
    //         ->getOneOrNullResult()
    //     ;
    // }
}
