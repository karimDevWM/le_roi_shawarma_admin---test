<?php

namespace App\Entity;

use App\Repository\EntreeChaudeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EntreeChaudeRepository::class)]
class EntreeChaude
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $photo = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 4, scale: 2)]
    private ?string $price = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ingredient_1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ingredient_2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ingredient_3 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ingredient_4 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ingredient_5 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ingredient_6 = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): static
    {
        $this->photo = $photo;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getIngredient1(): ?string
    {
        return $this->ingredient_1;
    }

    public function setIngredient1(?string $ingredient_1): static
    {
        $this->ingredient_1 = $ingredient_1;

        return $this;
    }

    public function getIngredient2(): ?string
    {
        return $this->ingredient_2;
    }

    public function setIngredient2(?string $ingredient_2): static
    {
        $this->ingredient_2 = $ingredient_2;

        return $this;
    }

    public function getIngredient3(): ?string
    {
        return $this->ingredient_3;
    }

    public function setIngredient3(?string $ingredient_3): static
    {
        $this->ingredient_3 = $ingredient_3;

        return $this;
    }

    public function getIngredient4(): ?string
    {
        return $this->ingredient_4;
    }

    public function setIngredient4(?string $ingredient_4): static
    {
        $this->ingredient_4 = $ingredient_4;

        return $this;
    }

    public function getIngredient5(): ?string
    {
        return $this->ingredient_5;
    }

    public function setIngredient5(?string $ingredient_5): static
    {
        $this->ingredient_5 = $ingredient_5;

        return $this;
    }

    public function getIngredient6(): ?string
    {
        return $this->ingredient_6;
    }

    public function setIngredient6(?string $ingredient_6): static
    {
        $this->ingredient_6 = $ingredient_6;

        return $this;
    }
}
