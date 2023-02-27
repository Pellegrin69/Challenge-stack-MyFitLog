<?php

namespace App\Controller;

use App\Entity\DataTypes;
use App\Form\DataTypesType;
use App\Repository\DataTypesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/data/types')]
class DataTypesController extends AbstractController
{
    #[Route('/', name: 'app_data_types_index', methods: ['GET'])]
    public function index(DataTypesRepository $dataTypesRepository): Response
    {
        return $this->render('data_types/index.html.twig', [
            'data_types' => $dataTypesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_data_types_new', methods: ['GET', 'POST'])]
    public function new(Request $request, DataTypesRepository $dataTypesRepository): Response
    {
        $dataType = new DataTypes();
        $form = $this->createForm(DataTypesType::class, $dataType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $dataTypesRepository->save($dataType, true);

            return $this->redirectToRoute('app_data_types_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('data_types/new.html.twig', [
            'data_type' => $dataType,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_data_types_show', methods: ['GET'])]
    public function show(DataTypes $dataType): Response
    {
        return $this->render('data_types/show.html.twig', [
            'data_type' => $dataType,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_data_types_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, DataTypes $dataType, DataTypesRepository $dataTypesRepository): Response
    {
        $form = $this->createForm(DataTypesType::class, $dataType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $dataTypesRepository->save($dataType, true);

            return $this->redirectToRoute('app_data_types_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('data_types/edit.html.twig', [
            'data_type' => $dataType,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_data_types_delete', methods: ['POST'])]
    public function delete(Request $request, DataTypes $dataType, DataTypesRepository $dataTypesRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$dataType->getId(), $request->request->get('_token'))) {
            $dataTypesRepository->remove($dataType, true);
        }

        return $this->redirectToRoute('app_data_types_index', [], Response::HTTP_SEE_OTHER);
    }
}
