<?php

namespace App\Repository;

use App\Entity\Beneficios;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Beneficios|null find($id, $lockMode = null, $lockVersion = null)
 * @method Beneficios|null findOneBy(array $criteria, array $orderBy = null)
 * @method Beneficios[]    findAll()
 * @method Beneficios[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BeneficiosRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Beneficios::class);
    }

    // /**
    //  * @return Beneficios[] Returns an array of Beneficios objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Beneficios
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
