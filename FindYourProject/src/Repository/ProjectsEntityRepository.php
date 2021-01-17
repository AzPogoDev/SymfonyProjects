<?php

namespace App\Repository;

use App\Entity\ProjectsEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ProjectsEntity|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProjectsEntity|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProjectsEntity[]    findAll()
 * @method ProjectsEntity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProjectsEntityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProjectsEntity::class);
    }

    // /**
    //  * @return ProjectsEntity[] Returns an array of ProjectsEntity objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ProjectsEntity
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
