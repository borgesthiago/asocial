<?php

namespace App\Controller;

use App\Entity\Saude;
use App\Form\SaudeType;
use App\Repository\SaudeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/saude")
 */
class SaudeController extends AbstractController
{
    /**
     * @Route("/", name="saude_index", methods={"GET"})
     */
    public function index(SaudeRepository $saudeRepository): Response
    {
        return $this->render('saude/index.html.twig', ['saudes' => $saudeRepository->findAll()]);
    }

    /**
     * @Route("/new", name="saude_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $saude = new Saude();
        $form = $this->createForm(SaudeType::class, $saude);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($saude);
            $entityManager->flush();

            return $this->redirectToRoute('saude_index');
        }

        return $this->render('saude/new.html.twig', [
            'saude' => $saude,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="saude_show", methods={"GET"})
     */
    public function show(Saude $saude): Response
    {
        return $this->render('saude/show.html.twig', ['saude' => $saude]);
    }

    /**
     * @Route("/{id}/edit", name="saude_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Saude $saude): Response
    {
        $form = $this->createForm(SaudeType::class, $saude);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('saude_index', ['id' => $saude->getId()]);
        }

        return $this->render('saude/edit.html.twig', [
            'saude' => $saude,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="saude_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Saude $saude): Response
    {
        if ($this->isCsrfTokenValid('delete'.$saude->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($saude);
            $entityManager->flush();
        }

        return $this->redirectToRoute('saude_index');
    }
}
