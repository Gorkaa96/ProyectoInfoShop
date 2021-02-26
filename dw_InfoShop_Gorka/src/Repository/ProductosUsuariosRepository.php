<?php

namespace App\Repository;

use App\Entity\ProductosUsuarios;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ProductosUsuarios|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProductosUsuarios|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProductosUsuarios[]    findAll()
 * @method ProductosUsuarios[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductosUsuariosRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProductosUsuarios::class);
    }

    // /**
    //  * @return ProductosUsuarios[] Returns an array of ProductosUsuarios objects
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
    public function findOneBySomeField($value): ?ProductosUsuarios
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
