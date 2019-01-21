<?php

namespace App\Controller;

use App\Entity\Servico;
use App\Form\ServicoType;
use App\Repository\ServicoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/servico")
 */
class ServicoController extends AbstractController
{
    /**
     * @Route("/", name="servico_index", methods={"GET"})
     */
    public function index(ServicoRepository $servicoRepository): Response
    {
        return $this->render('servico/index.html.twig', ['servicos' => $servicoRepository->findAll()]);
    }

    /**
     * @Route("/new", name="servico_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $servico = new Servico();
        $form = $this->createForm(ServicoType::class, $servico);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($servico);
            $entityManager->flush();

            return $this->redirectToRoute('servico_index');
        }

        return $this->render('servico/new.html.twig', [
            'servico' => $servico,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="servico_show", methods={"GET"})
     */
    public function show(Servico $servico): Response
    {
        return $this->render('servico/show.html.twig', ['servico' => $servico]);
    }

    /**
     * @Route("/{id}/edit", name="servico_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Servico $servico): Response
    {
        $form = $this->createForm(ServicoType::class, $servico);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('servico_index', ['id' => $servico->getId()]);
        }

        return $this->render('servico/edit.html.twig', [
            'servico' => $servico,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="servico_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Servico $servico): Response
    {
        if ($this->isCsrfTokenValid('delete'.$servico->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($servico);
            $entityManager->flush();
        }

        return $this->redirectToRoute('servico_index');
    }
}
