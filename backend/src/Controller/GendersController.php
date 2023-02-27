<?php

namespace App\Controller;

use App\Entity\Genders;
use App\Form\GendersType;
use App\Repository\GendersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/genders')]
class GendersController extends AbstractController
{
    #[Route('/', name: 'app_genders_index', methods: ['GET'])]
    public function index(GendersRepository $gendersRepository): Response
    {
        return $this->render('genders/index.html.twig', [
            'genders' => $gendersRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_genders_new', methods: ['GET', 'POST'])]
    public function new(Request $request, GendersRepository $gendersRepository): Response
    {
        $gender = new Genders();
        $form = $this->createForm(GendersType::class, $gender);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $gendersRepository->save($gender, true);

            return $this->redirectToRoute('app_genders_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('genders/new.html.twig', [
            'gender' => $gender,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_genders_show', methods: ['GET'])]
    public function show(Genders $gender): Response
    {
        return $this->render('genders/show.html.twig', [
            'gender' => $gender,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_genders_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Genders $gender, GendersRepository $gendersRepository): Response
    {
        $form = $this->createForm(GendersType::class, $gender);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $gendersRepository->save($gender, true);

            return $this->redirectToRoute('app_genders_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('genders/edit.html.twig', [
            'gender' => $gender,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_genders_delete', methods: ['POST'])]
    public function delete(Request $request, Genders $gender, GendersRepository $gendersRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$gender->getId(), $request->request->get('_token'))) {
            $gendersRepository->remove($gender, true);
        }

        return $this->redirectToRoute('app_genders_index', [], Response::HTTP_SEE_OTHER);
    }
}
