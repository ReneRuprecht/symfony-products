<?php

namespace App\Controller;

use App\Request\CreateProductRequestDto;
use App\Service\ProductService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/v1/products')]
class ProductController extends AbstractController
{
    private $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    #[Route('/', name: 'all_products', methods: 'GET')]
    public function index(): JsonResponse
    {
        return $this->json([
            'data' => $this->productService->findAll(),
            'path' => 'src/Controller/ProductController.php',
        ]);
    }

    #[Route(name: 'add_products', methods: 'POST')]
    public function add(CreateProductRequestDto $createProductRequestDto): JsonResponse
    {
        $requestIsValid = $createProductRequestDto->validate();

        if (!$requestIsValid) return $this->json(['message' => 'Invalid request body'], status: 422);

        return $this->json([
            'productName' => $createProductRequestDto->getName()
        ], status: 201);
    }
}
