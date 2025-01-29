<?php

namespace App\Repository;

use App\Entity\Libro;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Libro|null find($id, $lockMode = null, $lockVersion = null)
 * @method Libro|null findOneBy(array $criteria, array $orderBy = null)
 * @method Libro[] findAll()
 * @method Libro[] findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LibroRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Libro::class);
    }

    private function createQueryBuilderBasico(): QueryBuilder
    {
        return $this->createQueryBuilder('l')
            ->select('l','t')
            ->join('l.titulo', 't')
            ->orderBy('l.titulo');
    }

    public function findByOrdenAlfabetico()
    {
        return $this->createQueryBuilder('l')
            ->orderBy('l.titulo', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findByAnioPublicacion()
    {
        return $this->createQueryBuilder('l')
            ->orderBy('l.anioPublicacion', 'ASC')
            ->getQuery()
            ->getResult();
    }

}
