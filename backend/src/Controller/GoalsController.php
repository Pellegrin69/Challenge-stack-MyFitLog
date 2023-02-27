<?php

namespace App\Controller;

use App\Entity\Goals;
use App\Form\GoalsType;
use App\Repository\GoalsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/goals')]
class GoalsController extends AbstractController
{
    #[Route('/', name: 'app_goals_index', methods: ['GET'])]
    public function index(GoalsRepository $goalsRepository): Response
    {
        return $this->render('goals/index.html.twig', [
            'goals' => $goalsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_goals_new', methods: ['GET', 'POST'])]
    public function new(Request $request, GoalsRepository $goalsRepository): Response
    {
        $goal = new Goals();
        $form = $this->createForm(GoalsType::class, $goal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $goalsRepository->save($goal, true);

            return $this->redirectToRoute('app_goals_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('goals/new.html.twig', [
            'goal' => $goal,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_goals_show', methods: ['GET'])]
    public function show(Goals $goal): Response
    {
        return $this->render('goals/show.html.twig', [
            'goal' => $goal,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_goals_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Goals $goal, GoalsRepository $goalsRepository): Response
    {
        $form = $this->createForm(GoalsType::class, $goal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $goalsRepository->save($goal, true);

            return $this->redirectToRoute('app_goals_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('goals/edit.html.twig', [
            'goal' => $goal,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_goals_delete', methods: ['POST'])]
    public function delete(Request $request, Goals $goal, GoalsRepository $goalsRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$goal->getId(), $request->request->get('_token'))) {
            $goalsRepository->remove($goal, true);
        }

        return $this->redirectToRoute('app_goals_index', [], Response::HTTP_SEE_OTHER);
    }
}
