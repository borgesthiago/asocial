<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SaudeRepository")
 */
class Saude
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $medicamento;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dataInicio;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $periodo;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $dosagem;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $validade;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $doenca;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nomeDoenca;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $tratamento;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $anotacao;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Usuario", inversedBy="saude")
     * @ORM\JoinColumn(nullable=false)
     */
    private $usuario;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMedicamento(): ?string
    {
        return $this->medicamento;
    }

    public function setMedicamento(?string $medicamento): self
    {
        $this->medicamento = $medicamento;

        return $this;
    }

    public function getDataInicio(): ?\DateTimeInterface
    {
        return $this->dataInicio;
    }

    public function setDataInicio(?\DateTimeInterface $dataInicio): self
    {
        $this->dataInicio = $dataInicio;

        return $this;
    }

    public function getPeriodo(): ?string
    {
        return $this->periodo;
    }

    public function setPeriodo(?string $periodo): self
    {
        $this->periodo = $periodo;

        return $this;
    }

    public function getDosagem(): ?string
    {
        return $this->dosagem;
    }

    public function setDosagem(?string $dosagem): self
    {
        $this->dosagem = $dosagem;

        return $this;
    }

    public function getValidade(): ?\DateTimeInterface
    {
        return $this->validade;
    }

    public function setValidade(?\DateTimeInterface $validade): self
    {
        $this->validade = $validade;

        return $this;
    }

    public function getDoenca(): ?int
    {
        return $this->doenca;
    }

    public function setDoenca(?int $doenca): self
    {
        $this->doenca = $doenca;

        return $this;
    }

    public function getNomeDoenca(): ?string
    {
        return $this->nomeDoenca;
    }

    public function setNomeDoenca(?string $nomeDoenca): self
    {
        $this->nomeDoenca = $nomeDoenca;

        return $this;
    }

    public function getTratamento(): ?int
    {
        return $this->tratamento;
    }

    public function setTratamento(?int $tratamento): self
    {
        $this->tratamento = $tratamento;

        return $this;
    }

    public function getAnotacao(): ?string
    {
        return $this->anotacao;
    }

    public function setAnotacao(?string $anotacao): self
    {
        $this->anotacao = $anotacao;

        return $this;
    }

    public function getUsuario(): ?Usuario
    {
        return $this->usuario;
    }

    public function setUsuario(?Usuario $usuario): self
    {
        $this->usuario = $usuario;

        return $this;
    }
}
