<?php

namespace App\Controller;

use App\Entity\Atendimento;
use App\Form\AtendimentoType;
use App\Repository\AtendimentoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/atendimento")
 */
class AtendimentoController extends AbstractController
{
    /**
     * @Route("/", name="atendimento_index", methods={"GET"})
     */
    public function index(AtendimentoRepository $atendimentoRepository): Response
    {
        return $this->render('atendimento/index.html.twig', ['atendimentos' => $atendimentoRepository->findAll()]);
    }

    /**
     * @Route("/new", name="atendimento_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $atendimento = new Atendimento();
        $form = $this->createForm(AtendimentoType::class, $atendimento);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($atendimento);
            $entityManager->flush();

            return $this->redirectToRoute('atendimento_index');
        }

        return $this->render('atendimento/new.html.twig', [
            'atendimento' => $atendimento,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="atendimento_show", methods={"GET"})
     */
    public function show(Atendimento $atendimento): Response
    {
        return $this->render('atendimento/show.html.twig', ['atendimento' => $atendimento]);
    }

    /**
     * @Route("/{id}/edit", name="atendimento_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Atendimento $atendimento): Response
    {
        $form = $this->createForm(AtendimentoType::class, $atendimento);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('atendimento_index', ['id' => $atendimento->getId()]);
        }

        return $this->render('atendimento/edit.html.twig', [
            'atendimento' => $atendimento,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="atendimento_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Atendimento $atendimento): Response
    {
        if ($this->isCsrfTokenValid('delete'.$atendimento->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($atendimento);
            $entityManager->flush();
        }

        return $this->redirectToRoute('atendimento_index');
    }
}
