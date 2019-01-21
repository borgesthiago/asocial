<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FamiliaRepository")
 */
class Familia
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
    private $nome;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dataNascimento;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $grauParentesco;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $profissao;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $ocupacao;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $renda;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $escolaridade;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $fatorRisco;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Usuario", inversedBy="usuario")
     * @ORM\JoinColumn(nullable=true)
     */
    private $usuario;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(?string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    public function getDataNascimento(): ?\DateTimeInterface
    {
        return $this->dataNascimento;
    }

    public function setDataNascimento(?\DateTimeInterface $dataNascimento): self
    {
        $this->dataNascimento = $dataNascimento;

        return $this;
    }

    public function getGrauParentesco(): ?string
    {
        return $this->grauParentesco;
    }

    public function setGrauParentesco(?string $grauParentesco): self
    {
        $this->grauParentesco = $grauParentesco;

        return $this;
    }

    public function getProfissao(): ?string
    {
        return $this->profissao;
    }

    public function setProfissao(?string $profissao): self
    {
        $this->profissao = $profissao;

        return $this;
    }

    public function getOcupacao(): ?string
    {
        return $this->ocupacao;
    }

    public function setOcupacao(?string $ocupacao): self
    {
        $this->ocupacao = $ocupacao;

        return $this;
    }

    public function getRenda(): ?float
    {
        return $this->renda;
    }

    public function setRenda(?float $renda): self
    {
        $this->renda = $renda;

        return $this;
    }

    public function getEscolaridade(): ?string
    {
        return $this->escolaridade;
    }

    public function setEscolaridade(?string $escolaridade): self
    {
        $this->escolaridade = $escolaridade;

        return $this;
    }

    public function getFatorRisco(): ?string
    {
        return $this->fatorRisco;
    }

    public function setFatorRisco(?string $fatorRisco): self
    {
        $this->fatorRisco = $fatorRisco;

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

    public function __toString()
    {    
        return (string) $this->getNome();
    }

}
