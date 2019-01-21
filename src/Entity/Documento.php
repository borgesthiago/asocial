<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DocumentoRepository")
 */
class Documento
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50, nullable=true, unique=true)
     */
    private $numero;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $tipo;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dataEmitido;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dataRecebido;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $reiteracao;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Usuario", inversedBy="documentos")
     */
    private $usuario;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Documento", inversedBy="documentos")
     */
    private $documentoReiterado;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Documento", mappedBy="documentoReiterado")
     */
    private $documentos;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $setor;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $prazoResposta;

    /**
     * @ORM\Column(type="boolean")
     */
    private $respondido;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $documentoResposta;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Secretaria", inversedBy="documentos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $origem;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Secretaria", inversedBy="documentos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $destinatario;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dataResposta;

    public function __construct()
    {
        $this->documentos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(?string $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getTipo(): ?string
    {
        return $this->tipo;
    }

    public function setTipo(?string $tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }

    public function getDataEmitido(): ?\DateTimeInterface
    {
        return $this->dataEmitido;
    }

    public function setDataEmitido(?\DateTimeInterface $dataEmitido): self
    {
        $this->dataEmitido = $dataEmitido;

        return $this;
    }

    public function getDataRecebido(): ?\DateTimeInterface
    {
        return $this->dataRecebido;
    }

    public function setDataRecebido(?\DateTimeInterface $dataRecebido): self
    {
        $this->dataRecebido = $dataRecebido;

        return $this;
    }

    public function getReiteracao(): ?bool
    {
        return $this->reiteracao;
    }

    public function setReiteracao(?bool $reiteracao): self
    {
        $this->reiteracao = $reiteracao;

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
        return (string) $this->getNumero();
    }

    public function getDocumentoReiterado(): ?self
    {
        return $this->documentoReiterado;
    }

    public function setDocumentoReiterado(?self $documentoReiterado): self
    {
        $this->documentoReiterado = $documentoReiterado;

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getDocumentos(): Collection
    {
        return $this->documentos;
    }

    public function addDocumento(self $documento): self
    {
        if (!$this->documentos->contains($documento)) {
            $this->documentos[] = $documento;
            $documento->setDocumentoReiterado($this);
        }

        return $this;
    }

    public function removeDocumento(self $documento): self
    {
        if ($this->documentos->contains($documento)) {
            $this->documentos->removeElement($documento);
            // set the owning side to null (unless already changed)
            if ($documento->getDocumentoReiterado() === $this) {
                $documento->setDocumentoReiterado(null);
            }
        }

        return $this;
    }

    public function getSetor(): ?string
    {
        return $this->setor;
    }

    public function setSetor(?string $setor): self
    {
        $this->setor = $setor;

        return $this;
    }

        public function getPrazoResposta(): ?string
    {
        return $this->prazoResposta;
    }

    public function setPrazoResposta(?string $prazoResposta): self
    {
        $this->prazoResposta = $prazoResposta;

        return $this;
    }

    public function getRespondido(): ?bool
    {
        return $this->respondido;
    }

    public function setRespondido(bool $respondido): self
    {
        $this->respondido = $respondido;

        return $this;
    }

    public function getDocumentoResposta(): ?string
    {
        return $this->documentoResposta;
    }

    public function setDocumentoResposta(?string $documentoResposta): self
    {
        $this->documentoResposta = $documentoResposta;

        return $this;
    }

    public function getOrigem(): ?Secretaria
    {
        return $this->origem;
    }

    public function setOrigem(?Secretaria $origem): self
    {
        $this->origem = $origem;

        return $this;
    }

    public function getDestinatario(): ?Secretaria
    {
        return $this->destinatario;
    }

    public function setDestinatario(?Secretaria $destinatario): self
    {
        $this->destinatario = $destinatario;

        return $this;
    }

    public function getDataResposta(): ?\DateTimeInterface
    {
        return $this->dataResposta;
    }

    public function setDataResposta(?\DateTimeInterface $dataResposta): self
    {
        $this->dataResposta = $dataResposta;

        return $this;
    }

}
