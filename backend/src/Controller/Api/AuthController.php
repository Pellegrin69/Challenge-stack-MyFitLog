<?php

namespace App\Controller\Api;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

#[Route('/api', name: 'api_')]
class AuthController extends AbstractController
{
    public function __construct(
        private UserRepository $userRepository,
        private Security $security,
        private SerializerInterface $serializer,
    ) {
    }

    #[Route('/register', name: 'register', methods: ["POST"])]
    public function register(
        Request $request,
        UserPasswordHasherInterface $userPasswordHasher,
        EntityManagerInterface $em,
    ): JsonResponse {
        $decoded = json_decode($request->getContent());
        $email = $decoded->email;
        $plaintextPassword = $decoded->password;

        $user = new User();
        $hashedPassword = $userPasswordHasher->hashPassword(
            $user,
            $plaintextPassword
        );
        $user->setPassword($hashedPassword);
        $user->setEmail($email);
        $em->persist($user);
        $em->flush();

        return $this->json(['message' => 'Registered Successfully'], 200);
    }

    #[Route('/profile', name: 'user.profile')]
    public function profile(): JsonResponse
    {
        $currentUser = $this->security->getUser();
        $user = $this->serializer->serialize($currentUser, 'json');
        return new JsonResponse([
            $user
        ], 200);
    }
}
