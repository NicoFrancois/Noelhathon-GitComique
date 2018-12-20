<?php

namespace App\Repository;

use App\Entity\EditionEvent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method EditionEvent|null find($id, $lockMode = null, $lockVersion = null)
 * @method EditionEvent|null findOneBy(array $criteria, array $orderBy = null)
 * @method EditionEvent[]    findAll()
 * @method EditionEvent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EditionEventRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, EditionEvent::class);
    }

    // /**
    //  * @return EditionEvent[] Returns an array of EditionEvent objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EditionEvent
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
