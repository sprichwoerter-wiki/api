<?php

namespace App\Service;

use App\Entity\Proverb;
use App\Repository\ProverbRepository;

class ProverbService
{
    private ProverbRepository $proverbRepository;

    public function __construct(ProverbRepository $proverbRepository)
    {
        $this->proverbRepository = $proverbRepository;
    }

    public function listProverbs(int $offset, int $limit): array
    {
        $proverbs = $this->proverbRepository->findWithPagination($offset, $limit);
        return array_map(fn($proverb) => $proverb->asPartial(), $proverbs);
    }

    public function findBySlug(string $slug): Proverb
    {
        return $this->proverbRepository->findOneBy(['slug' => $slug]);
    }
}