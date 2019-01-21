<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SecretariaRepository")
 */
class Secretaria
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nome;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $endereco;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $bairro;

    /**
     * @ORM\Column(type="string", length=8, nullable=true)
     */
    private $telefone;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $equipamento;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Funcionario", mappedBy="secretaria")
     */
    private $secretaria;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Secretaria", inversedBy="secretariaFilhos")
     * @ORM\JoinColumn(nullable=true)
     */
    private $secretariaPai;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Secretaria", mappedBy="secretariaPai")
     */
    private $secretariaFilhos;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Servico", mappedBy="secretaria")
     */
    private $servico;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Documento", mappedBy="origem")
     */
    private $documentos;

    public function __construct()
    {
        $this->secretaria = new ArrayCollection();
        $this->secretariaFilhos = new ArrayCollection();
        $this->servico = new ArrayCollection();
        $this->documentos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    public function getEndereco(): ?string
    {
        return $this->endereco;
    }

    public function setEndereco(?string $endereco): self
    {
        $this->endereco = $endereco;

        return $this;
    }

    public function getBairro(): ?string
    {
        return $this->bairro;
    }

    public function setBairro(?string $bairro): self
    {
        $this->bairro = $bairro;

        return $this;
    }

    public function getTelefone(): ?string
    {
        return $this->telefone;
    }

    public function setTelefone(?string $telefone): self
    {
        $this->telefone = $telefone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getEquipamento(): ?bool
    {
        return $this->equipamento;
    }

    public function setEquipamento(?bool $equipamento): self
    {
        $this->equipamento = $equipamento;

        return $this;
    }

    /**
     * @return Collection|Funcionario[]
     */
    public function getSecretaria(): Collection
    {
        return $this->secretaria;
    }

    public function addSecretarium(Funcionario $secretarium): self
    {
        if (!$this->secretaria->contains($secretarium)) {
            $this->secretaria[] = $secretarium;
            $secretarium->setSecretaria($this);
        }

        return $this;
    }

    public function removeSecretarium(Funcionario $secretarium): self
    {
        if ($this->secretaria->contains($secretarium)) {
            $this->secretaria->removeElement($secretarium);
            // set the owning side to null (unless already changed)
            if ($secretarium->getSecretaria() === $this) {
                $secretarium->setSecretaria(null);
            }
        }

        return $this;
    }

    public function getSecretariaPai(): ?self
    {
        return $this->secretariaPai;
    }

    public function setSecretariaPai(?self $secretariaPai): self
    {
        $this->secretariaPai = $secretariaPai;

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getSecretariaFilhos(): Collection
    {
        return $this->secretariaFilhos;
    }

    public function addSecretariaFilho(self $secretariaFilho): self
    {
        if (!$this->secretariaFilhos->contains($secretariaFilho)) {
            $this->secretariaFilhos[] = $secretariaFilho;
            $secretariaFilho->setSecretariaPai($this);
        }

        return $this;
    }

    public function removeSecretariaFilho(self $secretariaFilho): self
    {
        if ($this->secretariaFilhos->contains($secretariaFilho)) {
            $this->secretariaFilhos->removeElement($secretariaFilho);
            // set the owning side to null (unless already changed)
            if ($secretariaFilho->getSecretariaPai() === $this) {
                $secretariaFilho->setSecretariaPai(null);
            }
        }

        return $this;
    }

    public function __toString()
    {    
        return (string) $this->getNome();
    }

    /**
     * @return Collection|Servico[]
     */
    public function getServico(): Collection
    {
        return $this->servico;
    }

    public function addServico(Servico $servico): self
    {
        if (!$this->servico->contains($servico)) {
            $this->servico[] = $servico;
            $servico->setSecretaria($this);
        }

        return $this;
    }

    public function removeServico(Servico $servico): self
    {
        if ($this->servico->contains($servico)) {
            $this->servico->removeElement($servico);
            // set the owning side to null (unless already changed)
            if ($servico->getSecretaria() === $this) {
                $servico->setSecretaria(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Documento[]
     */
    public function getDocumentos(): Collection
    {
        return $this->documentos;
    }

    public function addDocumento(Documento $documento): self
    {
        if (!$this->documentos->contains($documento)) {
            $this->documentos[] = $documento;
            $documento->setOrigem($this);
        }

        return $this;
    }

    public function removeDocumento(Documento $documento): self
    {
        if ($this->documentos->contains($documento)) {
            $this->documentos->removeElement($documento);
            // set the owning side to null (unless already changed)
            if ($documento->getOrigem() === $this) {
                $documento->setOrigem(null);
            }
        }

        return $this;
    }

}
