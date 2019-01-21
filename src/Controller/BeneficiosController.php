<?php

namespace App\Controller;

use App\Entity\Beneficios;
use App\Form\BeneficiosType;
use App\Repository\BeneficiosRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/beneficios")
 */
class BeneficiosController extends AbstractController
{
    /**
     * @Route("/", name="beneficios_index", methods={"GET"})
     */
    public function index(BeneficiosRepository $beneficiosRepository): Response
    {
        return $this->render('beneficios/index.html.twig', ['beneficios' => $beneficiosRepository->findAll()]);
    }

    /**
     * @Route("/new", name="beneficios_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $beneficio = new Beneficios();
        $form = $this->createForm(BeneficiosType::class, $beneficio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($beneficio);
            $entityManager->flush();

            return $this->redirectToRoute('beneficios_index');
        }

        return $this->render('beneficios/new.html.twig', [
            'beneficio' => $beneficio,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="beneficios_show", methods={"GET"})
     */
    public function show(Beneficios $beneficio): Response
    {
        return $this->render('beneficios/show.html.twig', ['beneficio' => $beneficio]);
    }

    /**
     * @Route("/{id}/edit", name="beneficios_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Beneficios $beneficio): Response
    {
        $form = $this->createForm(BeneficiosType::class, $beneficio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('beneficios_index', ['id' => $beneficio->getId()]);
        }

        return $this->render('beneficios/edit.html.twig', [
            'beneficio' => $beneficio,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="beneficios_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Beneficios $beneficio): Response
    {
        if ($this->isCsrfTokenValid('delete'.$beneficio->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($beneficio);
            $entityManager->flush();
        }

        return $this->redirectToRoute('beneficios_index');
    }
}
