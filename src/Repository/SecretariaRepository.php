<?php

namespace App\Repository;

use App\Entity\Secretaria;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Secretaria|null find($id, $lockMode = null, $lockVersion = null)
 * @method Secretaria|null findOneBy(array $criteria, array $orderBy = null)
 * @method Secretaria[]    findAll()
 * @method Secretaria[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SecretariaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Secretaria::class);
    }

     public function totalEquipamento()
    {
        return $this->createQueryBuilder('s')
            ->select('count(s.id)')
            ->where('s.equipamento = :valor')
            ->setParameter(':valor', '1')
            ->getQuery()
            ->getSingleScalarResult();
    }
}
