<?php

namespace App\Repository;

use App\Entity\Proverb;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Proverb>
 *
 * @method Proverb|null find($id, $lockMode = null, $lockVersion = null)
 * @method Proverb|null findOneBy(array $criteria, array $orderBy = null)
 * @method Proverb[]    findAll()
 * @method Proverb[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProverbRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Proverb::class);
    }

    public function search(string $query, int $offset, int $limit): array
    {
        $queryBuilder = $this->createQueryBuilder('p')
            ->where('p.name LIKE :query')
            // ->orWhere('p.explanation LIKE :query')
            // ->orWhere('p.history LIKE :query')
            // ->orWhere('p.example LIKE :query')
            ->setParameter('query', '%' . $query . '%')
            ->setMaxResults($limit)
            ->setFirstResult($offset)
            ->orderBy('p.id', 'ASC');
        return $queryBuilder->getQuery()->getResult();
    }

//    /**
//     * @return Proverb[] Returns an array of Proverb objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Proverb
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
