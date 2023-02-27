<?php

namespace App\Controller;

use App\Entity\Datas;
use App\Form\DatasType;
use App\Repository\DatasRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/datas')]
class DatasController extends AbstractController
{
    #[Route('/', name: 'app_datas_index', methods: ['GET'])]
    public function index(DatasRepository $datasRepository): Response
    {
        return $this->render('datas/index.html.twig', [
            'datas' => $datasRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_datas_new', methods: ['GET', 'POST'])]
    public function new(Request $request, DatasRepository $datasRepository): Response
    {
        $data = new Datas();
        $form = $this->createForm(DatasType::class, $data);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $datasRepository->save($data, true);

            return $this->redirectToRoute('app_datas_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('datas/new.html.twig', [
            'data' => $data,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_datas_show', methods: ['GET'])]
    public function show(Datas $data): Response
    {
        return $this->render('datas/show.html.twig', [
            'data' => $data,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_datas_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Datas $data, DatasRepository $datasRepository): Response
    {
        $form = $this->createForm(DatasType::class, $data);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $datasRepository->save($data, true);

            return $this->redirectToRoute('app_datas_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('datas/edit.html.twig', [
            'data' => $data,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_datas_delete', methods: ['POST'])]
    public function delete(Request $request, Datas $data, DatasRepository $datasRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$data->getId(), $request->request->get('_token'))) {
            $datasRepository->remove($data, true);
        }

        return $this->redirectToRoute('app_datas_index', [], Response::HTTP_SEE_OTHER);
    }
}
