<?php

namespace App\Controller;

use App\Request\CreateProductRequestDto;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/v1/products')]
class ProductController extends AbstractController
{
    #[Route('/', name: 'all_products', methods: 'GET')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/ProductController.php',
        ]);
    }

    #[Route(name: 'add_products', methods: 'POST')]
    public function add(CreateProductRequestDto $createProductRequestDto): JsonResponse
    {
        //TODO: maybe create a custom return
        if (!$createProductRequestDto->validate()) return $this->json(['message' => 'Invalid request body'], status: 422);

        return $this->json([
            'message' => $createProductRequestDto->validate()
        ]);
    }
}
