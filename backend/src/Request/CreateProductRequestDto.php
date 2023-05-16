<?php

namespace App\Request;

use Symfony\Component\Validator\Constraints\GreaterThan;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\Constraints\Length;

class CreateProductRequestDto extends AbstractBaseRequestDto
{

    #[Type('string')]
    #[NotBlank()]
    protected string $name;

    #[Type('int')]
    #[NotBlank([])]
    #[GreaterThan(0)]
    protected int $regularPrice;

    #[Type('int')]
    #[NotBlank([])]
    #[GreaterThan(0)]
    protected int $discountPrice;

    #[Type('string')]
    #[NotBlank([])]
    protected string $marketName;

    #[Type('int')]
    #[NotBlank([])]
    #[Length(5)]
    protected int $postalCode;

    public function getName(): string
    {
        return $this->name;
    }

    public function getRegularPrice(): int
    {
        return $this->regularPrice;
    }

    public function getDiscountPrice(): int
    {
        return $this->discountPrice;
    }

    public function getMarketName(): string
    {
        return $this->marketName;
    }

    public function getPostalCode(): int
    {
        return $this->postalCode;
    }
}
