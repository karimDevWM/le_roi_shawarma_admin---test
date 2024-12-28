<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Admin;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[Route('/api', 'api_')]
class AdminController extends AbstractController
{
    #[Route('/getAdmins', name: 'get_admin', methods: ['get'])]
    public function index(EntityManagerInterface $entityManager): JsonResponse
    {
        $admins = $entityManager->getRepository(Admin::class)->findAll();
        
        $data = [];

        foreach ($admins as $admin) {
            $data[] = [
                'id'=> $admin->getId(),
                'username'=> $admin->getUsername(),
                'roles'=> $admin->getRoles()
            ];
        }

        return $this->json($data);
    }

    #[Route('/createAdmin', name: 'create_admin', methods: ['post'])]
    public function createAdmins(
        EntityManagerInterface $entityManager, 
        Request $request, 
        UserPasswordHasherInterface $passwordHasher
    ): JsonResponse
    {
        // dump($request->request->all());
        // die();
        $admin = new Admin();
        $admin->setUsername($request->request->get("username"));
        $admin->setRoles(['user', 'admin']);
        $hashedPassword = $passwordHasher->hashPassword(
            $admin, 
            $request->request->get("password")
        );
        $admin->setPassword($hashedPassword);

        $entityManager->persist($admin);
        $entityManager->flush();

        $data = [
            'id'=> $admin->getId(),
            'username'=> $admin->getUsername()
        ];

        return $this->json($data);
    }


}
