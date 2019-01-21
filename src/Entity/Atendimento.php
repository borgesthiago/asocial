<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AtendimentoRepository")
 */
class Atendimento
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $data;

    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    private $relato;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Usuario", inversedBy="atendimento")
     * @ORM\JoinColumn(nullable=false)
     */
    private $usuario;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $tipo = [];

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Funcionario", inversedBy="atendimento")
     */
    private $funcionario;


    public function __construct()
    {
        
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getData(): ?\DateTimeInterface
    {
        return $this->data;
    }

    public function setData(?\DateTimeInterface $data): self
    {
        $this->data = $data;

        return $this;
    }

    public function getRelato(): ?string
    {
        return $this->relato;
    }

    public function setRelato(?string $relato): self
    {
        $this->relato = $relato;

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

    public function __ToString()
    {
        return (string) $this->getTipo();
    }

    public function getTipo(): ?array
    {
        return $this->tipo;
    }

    public function setTipo(?array $tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }

    public function getFuncionario(): ?Funcionario
    {
        return $this->funcionario;
    }

    public function setFuncionario(?Funcionario $funcionario): self
    {
        $this->funcionario = $funcionario;

        return $this;
    }

    
}
