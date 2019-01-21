<?php

namespace App\Repository;

use App\Entity\Atendimento;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Atendimento|null find($id, $lockMode = null, $lockVersion = null)
 * @method Atendimento|null findOneBy(array $criteria, array $orderBy = null)
 * @method Atendimento[]    findAll()
 * @method Atendimento[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AtendimentoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Atendimento::class);
    }

    public function countAll()
    {
        return $this->createQueryBuilder('a')
            ->select('count(a.id)')
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function countAtend()
    {
        $dataInicio = date('Y-m').'-01';
        $dataFim = date('Y-m').'-31';
        $status =1;
        $q = $this->createQueryBuilder("a");
        $q->select('count(a.id)');
        $campo = false;
        if($status == '1'){
            $campo = 'a.data';
        }
        $q->where(
            $q->expr()->between($campo, ':data1', ':data2')
        );
        $q->setParameter('data1', $dataInicio);
        $q->setParameter('data2', $dataFim);
        return $q->getQuery()->getSingleScalarResult();
    }
}
