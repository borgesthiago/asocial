<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BeneficiosRepository")
 */
class Beneficios
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $transfereRenda;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $programa;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $bpc;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $tipoBpc;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Usuario", inversedBy="beneficio")
     * @ORM\JoinColumn(nullable=false)
     */
    private $usuario;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTransfereRenda(): ?int
    {
        return $this->transfereRenda;
    }

    public function setTransfereRenda(?int $transfereRenda): self
    {
        $this->transfereRenda = $transfereRenda;

        return $this;
    }

    public function getPrograma(): ?string
    {
        return $this->programa;
    }

    public function setPrograma(?string $programa): self
    {
        $this->programa = $programa;

        return $this;
    }

    public function getBpc(): ?int
    {
        return $this->bpc;
    }

    public function setBpc(?int $bpc): self
    {
        $this->bpc = $bpc;

        return $this;
    }

    public function getTipoBpc(): ?string
    {
        return $this->tipoBpc;
    }

    public function setTipoBpc(?string $tipoBpc): self
    {
        $this->tipoBpc = $tipoBpc;

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
