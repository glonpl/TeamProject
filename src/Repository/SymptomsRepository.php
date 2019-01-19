<?php

namespace App\Repository;

use App\Entity\Symptoms;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Symptoms|null find($id, $lockMode = null, $lockVersion = null)
 * @method Symptoms|null findOneBy(array $criteria, array $orderBy = null)
 * @method Symptoms[]    findAll()
 * @method Symptoms[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SymptomsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Symptoms::class);
    }

    // /**
    //  * @return Symptoms[] Returns an array of Symptoms objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Symptoms
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
