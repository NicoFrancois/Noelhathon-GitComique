<?php

namespace App\Repository;

use App\Entity\InternalPartner;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method InternalPartner|null find($id, $lockMode = null, $lockVersion = null)
 * @method InternalPartner|null findOneBy(array $criteria, array $orderBy = null)
 * @method InternalPartner[]    findAll()
 * @method InternalPartner[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InternalPartnerRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, InternalPartner::class);
    }

    // /**
    //  * @return InternalPartner[] Returns an array of InternalPartner objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?InternalPartner
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
