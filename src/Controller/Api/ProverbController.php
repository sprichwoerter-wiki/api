<?php

namespace App\Controller\Api;

use App\Service\ProverbService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ProverbController extends AbstractController
{

    private ProverbService $proverbsService;

    /**
     * @param ProverbService $proverbsService
     */
    public function __construct(ProverbService $proverbsService)
    {
        $this->proverbsService = $proverbsService;
    }

    #[Route('/api/proverbs', name: 'app_api_proverbs', methods: ['GET'])]
    public function index(Request $request): JsonResponse
    {
        // Pagination
        $limit = (int)$request->get('limit', 30);
        $offset = (int)$request->get('offset', 0);

        return $this->json($this->proverbsService->listProverbs($offset, $limit));
    }

    #[Route('/api/proverbs/{slug}', name: 'app_api_proverb', methods: ['GET'])]
    public function bySlug(string $slug): JsonResponse
    {
        return $this->json($this->proverbsService->findBySlug($slug));
    }
}
