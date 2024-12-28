<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use \App\Entity\MenuEnfant;
use Symfony\Component\HttpFoundation\Request;

#[Route('/api', 'api_')]
class MenuEnfantController extends AbstractController
{
    #[Route('/all_menu_enfant', name: 'getAllMenuEnfant', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): JsonResponse
    {
        $menus = $entityManager->getRepository(MenuEnfant::class)->findAll();

        $data = [];

        foreach ($menus as $menu) {
            $data[] = [
                'id' => $menu->getId(),
                'name' => $menu->getName(),
                'description' => $menu->getDescription(),
                'photo' => $menu->getPhoto(),
                'price' => $menu->getPrice(),
                'ingredient_1' => $menu->getIngredient1(),
                'ingredient_2' => $menu->getIngredient2(),
                'ingredient_3' => $menu->getIngredient3(),
                'ingredient_4' => $menu->getIngredient4(),
                'ingredient_5' => $menu->getIngredient5()
            ];
        }

        return $this->json($data);
    }

    #[Route('/create_menu_enfant', name: 'createMenuEnfant', methods: ['POST'])]
    public function store(EntityManagerInterface $entityManager, Request $request): JsonResponse
    {
        $menu = new MenuEnfant();
        $menu->setName($request->request->get("name"));
        $menu->setDescription($request->request->get("description"));
        $menu->setPhoto($request->request->get("photo"));
        $menu->setPrice($request->request->get("price"));
        $menu->setIngredient1($request->request->get("ingredient_1"));
        $menu->setIngredient2($request->request->get("ingredient_2"));
        $menu->setIngredient3($request->request->get("ingredient_3"));
        $menu->setIngredient4($request->request->get("ingredient_4"));
        $menu->setIngredient5($request->request->get("ingredient_5"));


        $entityManager->persist($menu);
        $entityManager->flush();

        $data = [
            'id' => $menu->getId(),
            'name' => $menu->getName(),
            'description' => $menu->getDescription(),
            'photo' => $menu->getPhoto(),
            'price' => $menu->getPrice(),
            'ingredient_1' => $menu->getIngredient1(),
            'ingredient_2' => $menu->getIngredient2(),
            'ingredient_3' => $menu->getIngredient3(),
            'ingredient_4' => $menu->getIngredient4(),
            'ingredient_5' => $menu->getIngredient5(),
        ];

        return $this->json($data);
    }
}
