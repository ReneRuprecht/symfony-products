<?php

namespace App\Controller;

use App\Service\ProductService;
use App\Request\CreateProductRequestDto;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/api/v1/products')]
class ProductController extends AbstractController
{

    public function __construct(private ProductService $productService)
    {
    }

    #[Route('/', name: 'all_products', methods: 'GET')]
    public function index(): JsonResponse
    {

        return $this->json(
            data: [
                'products' => $this->productService->findAll()
            ],
            status: 200
        );
    }

    #[Route(name: 'add_products', methods: 'POST')]
    public function add(CreateProductRequestDto $createProductRequestDto): JsonResponse
    {
        $requestIsValid = $createProductRequestDto->validate();

        if (!$requestIsValid) return $this->json(['message' => 'Invalid request body'], status: 422);

        return $this->json(
            [
                'product' => $this->productService->save($createProductRequestDto)
            ],
            status: 201
        );
    }
}
