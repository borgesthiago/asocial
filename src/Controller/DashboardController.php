<?php

namespace App\Controller;
use App\Repository\AtendimentoRepository;
use App\Repository\FuncionarioRepository;
use App\Repository\DocumentoRepository;
use App\Repository\ServicoRepository;
use App\Repository\SecretariaRepository;
use App\Repository\UsuarioRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/dashboard")
 */
class DashboardController extends AbstractController
{
    /**
     * @Route("/", name="dashboard")
     */
    public function index(AtendimentoRepository $totalAtendimento, FuncionarioRepository $totalFun, 
    DocumentoRepository $totalDoc, DocumentoRepository $totalReiteracao, ServicoRepository $totalServico,
    SecretariaRepository $totalSecretaria, UsuarioRepository $totalUsuario)
    {
     
        $totalAtend = $totalAtendimento->countAll();       
        $totalAtendMes = $totalAtendimento->countAtend();    
        $totalFun = $totalFun->countAll();       
        $totalDoc = $totalDoc->countAll();
        $totalDocReit = $totalReiteracao->totalReiteracao();
        $totalServico = $totalServico->countAll();
        $totalEquipamento = $totalSecretaria->totalEquipamento();
        $totalUsuario = $totalUsuario->countAll();

        return $this->render('dashboard/index.html.twig', [
            'controller_name' => 'DashboardController',
            'totalAtendimento' => $totalAtend,
            'totalAtendMes' => $totalAtendMes,
            'totalFuncionario' => $totalFun,
            'totalDoc' => $totalDoc,
            'totalDocReiterado' => $totalDocReit,
            'totalEquipamento' => $totalEquipamento,
            'totalServico' => $totalServico,
            'totalUsuario' => $totalUsuario,
        ]);
    }
}
