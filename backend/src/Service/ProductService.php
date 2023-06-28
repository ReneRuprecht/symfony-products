<?php

namespace App\Service;

use App\Entity\Product;
use App\Repository\ProductRepository;
use App\Request\CreateProductRequestDto;

class ProductService
{

    public function __construct(private ProductRepository $productRepository)
    {
    }

    public function save(CreateProductRequestDto $createProductRequestDto): Product
    {
        $product = new Product();
        $product->setName($createProductRequestDto->getName());
        $product->setRegularPrice($createProductRequestDto->getRegularPrice());
        $product->setDiscountPrice($createProductRequestDto->getDiscountPrice());
        $product->setMarketName($createProductRequestDto->getMarketName());
        $product->setPostalCode($createProductRequestDto->getPostalCode());


        $this->productRepository->save($product, true);

        return $product;
    }
    public function findAll(): array
    {
        return $this->productRepository->findAll();
    }
}
