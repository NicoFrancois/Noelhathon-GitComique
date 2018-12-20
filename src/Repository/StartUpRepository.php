<?php

namespace App\Repository;

use App\Entity\StartUp;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method StartUp|null find($id, $lockMode = null, $lockVersion = null)
 * @method StartUp|null findOneBy(array $criteria, array $orderBy = null)
 * @method StartUp[]    findAll()
 * @method StartUp[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StartUpRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, StartUp::class);
    }
}
