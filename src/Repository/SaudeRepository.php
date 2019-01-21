<?php

namespace App\Repository;

use App\Entity\Saude;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Saude|null find($id, $lockMode = null, $lockVersion = null)
 * @method Saude|null findOneBy(array $criteria, array $orderBy = null)
 * @method Saude[]    findAll()
 * @method Saude[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SaudeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Saude::class);
    }

    // /**
    //  * @return Saude[] Returns an array of Saude objects
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
    public function findOneBySomeField($value): ?Saude
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
