<?php

namespace App\Controller;

use App\Service\ProductService;
use App\Request\CreateProductRequestDto;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

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

    #[Route('/id={id}', name: 'single_product', methods: 'GET')]
    public function findById(Request $request): JsonResponse
    {
        $id = intval($request->attributes->get('_route_params')['id']);

        if ($id <= 0) return $this->json(['message' => 'Invalid request parameter'], status: 422);

        return $this->json(
            data: [
                'product' => $this->productService->findById($id)
            ],
            status: 200
        );
    }

    #[Route(name: 'add_product', methods: 'POST')]
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
