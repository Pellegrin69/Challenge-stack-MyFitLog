<?php

namespace App\Controller;

use App\Entity\Units;
use App\Form\UnitsType;
use App\Repository\UnitsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/units')]
class UnitsController extends AbstractController
{
    #[Route('/', name: 'app_units_index', methods: ['GET'])]
    public function index(UnitsRepository $unitsRepository): Response
    {
        return $this->render('units/index.html.twig', [
            'units' => $unitsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_units_new', methods: ['GET', 'POST'])]
    public function new(Request $request, UnitsRepository $unitsRepository): Response
    {
        $unit = new Units();
        $form = $this->createForm(UnitsType::class, $unit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $unitsRepository->save($unit, true);

            return $this->redirectToRoute('app_units_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('units/new.html.twig', [
            'unit' => $unit,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_units_show', methods: ['GET'])]
    public function show(Units $unit): Response
    {
        return $this->render('units/show.html.twig', [
            'unit' => $unit,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_units_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Units $unit, UnitsRepository $unitsRepository): Response
    {
        $form = $this->createForm(UnitsType::class, $unit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $unitsRepository->save($unit, true);

            return $this->redirectToRoute('app_units_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('units/edit.html.twig', [
            'unit' => $unit,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_units_delete', methods: ['POST'])]
    public function delete(Request $request, Units $unit, UnitsRepository $unitsRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$unit->getId(), $request->request->get('_token'))) {
            $unitsRepository->remove($unit, true);
        }

        return $this->redirectToRoute('app_units_index', [], Response::HTTP_SEE_OTHER);
    }
}
