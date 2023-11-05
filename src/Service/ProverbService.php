<?php

namespace App\Service;

use App\Entity\Proverb;
use App\Repository\ProverbRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProverbService
{
    private ProverbRepository $proverbRepository;

    public function __construct(ProverbRepository $proverbRepository)
    {
        $this->proverbRepository = $proverbRepository;
    }

    public function findBySlug(string $slug): ?Proverb
    {
        $proverb = $this->proverbRepository->findOneBy(['slug' => $slug]);
        if (empty($proverb)) {
            throw new NotFoundHttpException();
        }
        return $this->proverbRepository->findOneBy(['slug' => $slug]);
    }

    public function search(string $query, int $offset, int $limit): array
    {
        $proverbs = $this->proverbRepository->search($query, $offset, $limit);
        return array_map(fn($proverb) => $proverb->asPartial(), $proverbs);
    }
}