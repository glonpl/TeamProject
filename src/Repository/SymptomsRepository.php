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

    public function getSymptomById(int $id): ?Symptoms
    {
        return $this->findOneBy([
            'id' => $id
        ]);
    }

    public function findOneByIdJoinedToCategory()
    {
        return $this->createQueryBuilder('p')
            ->innerJoin('p.FK_Area', 'a')
            ->addSelect('a')
            ->getQuery()
            ->getResult();
    }
}
