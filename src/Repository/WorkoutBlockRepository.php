<?php

namespace App\Repository;

use App\Entity\WorkoutBlock;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<WorkoutBlock>
 */
class WorkoutBlockRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WorkoutBlock::class);
    }

    // /**
    //  * @return WorkoutBlock[] Returns an array of WorkoutBlock objects
    //  */
    // public function findByExampleField($value): array
    // {
    //     return $this->createQueryBuilder('wb')
    //         ->andWhere('wb.exampleField = :val')
    //         ->setParameter('val', $value)
    //         ->orderBy('wb.block_id', 'ASC')
    //         ->setMaxResults(10)
    //         ->getQuery()
    //         ->getResult()
    //     ;
    // }

    // public function findOneBySomeField($value): ?WorkoutBlock
    // {
    //     return $this->createQueryBuilder('wb')
    //         ->andWhere('wb.exampleField = :val')
    //         ->setParameter('val', $value)
    //         ->getQuery()
    //         ->getOneOrNullResult()
    //     ;
    // }
}
