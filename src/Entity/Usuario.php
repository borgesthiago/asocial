<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UsuarioRepository")
 */
class Usuario
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
     * @ORM\Column(type="string", length=11, nullable=true)
     */
    private $cpf;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $rg;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $orgaoRg;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dataNascimento;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=1, nullable=true)
     */
    private $sexo;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $pcd;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $naturalidade;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $profissao;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ocupacao;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $renda;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $ctps;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $serieCtps;

    /**
     * @ORM\Column(type="string", length=40, nullable=true)
     */
    private $escolaridade;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $nis;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Habitacao", inversedBy="usuario", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $habitacao;


    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Usuario", mappedBy="contato")
     */
    private $usuarios;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Documento", mappedBy="usuario")
     */
    private $documentos;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Contato", inversedBy="usuarios", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $contato;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Familia", mappedBy="usuario")
     */
    private $familia;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Beneficios", mappedBy="usuario", orphanRemoval=true)
     */
    private $beneficio;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Saude", mappedBy="usuario")
     */
    private $saude;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Atendimento", mappedBy="usuario", orphanRemoval=true)
     */
    private $atendimento;

    public function __construct()
    {
        $this->usuarios = new ArrayCollection();
        $this->documentos = new ArrayCollection();
        $this->familia = new ArrayCollection();
        $this->beneficio = new ArrayCollection();
        $this->saude = new ArrayCollection();
        $this->atendimento = new ArrayCollection();
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

    public function getCpf(): ?string
    {
        return $this->cpf;
    }

    public function setCpf(?string $cpf): self
    {
        $this->cpf = $cpf;

        return $this;
    }

    public function getRg(): ?string
    {
        return $this->rg;
    }

    public function setRg(?string $rg): self
    {
        $this->rg = $rg;

        return $this;
    }

    public function getOrgaoRg(): ?string
    {
        return $this->orgaoRg;
    }

    public function setOrgaoRg(?string $orgaoRg): self
    {
        $this->orgaoRg = $orgaoRg;

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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getSexo(): ?string
    {
        return $this->sexo;
    }

    public function setSexo(?string $sexo): self
    {
        $this->sexo = $sexo;

        return $this;
    }

    public function getPcd(): ?int
    {
        return $this->pcd;
    }

    public function setPcd(?int $pcd): self
    {
        $this->pcd = $pcd;

        return $this;
    }

    public function getNaturalidade(): ?string
    {
        return $this->naturalidade;
    }

    public function setNaturalidade(?string $naturalidade): self
    {
        $this->naturalidade = $naturalidade;

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

    public function getCtps(): ?string
    {
        return $this->ctps;
    }

    public function setCtps(?string $ctps): self
    {
        $this->ctps = $ctps;

        return $this;
    }

    public function getSerieCtps(): ?string
    {
        return $this->serieCtps;
    }

    public function setSerieCtps(?string $serieCtps): self
    {
        $this->serieCtps = $serieCtps;

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

    public function getNis(): ?string
    {
        return $this->nis;
    }

    public function setNis(?string $nis): self
    {
        $this->nis = $nis;

        return $this;
    }

    public function getHabitacao(): ?Habitacao
    {
        return $this->habitacao;
    }

    public function setHabitacao(Habitacao $habitacao): self
    {
        $this->habitacao = $habitacao;

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getUsuarios(): Collection
    {
        return $this->usuarios;
    }

    public function addUsuario(self $usuario): self
    {
        if (!$this->usuarios->contains($usuario)) {
            $this->usuarios[] = $usuario;
            $usuario->setContato($this);
        }

        return $this;
    }

    public function removeUsuario(self $usuario): self
    {
        if ($this->usuarios->contains($usuario)) {
            $this->usuarios->removeElement($usuario);
            // set the owning side to null (unless already changed)
            if ($usuario->getContato() === $this) {
                $usuario->setContato(null);
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
            $documento->setUsuario($this);
        }

        return $this;
    }

    public function removeDocumento(Documento $documento): self
    {
        if ($this->documentos->contains($documento)) {
            $this->documentos->removeElement($documento);
            // set the owning side to null (unless already changed)
            if ($documento->getUsuario() === $this) {
                $documento->setUsuario(null);
            }
        }

        return $this;
    }

    public function getContato(): ?Contato
    {
        return $this->contato;
    }

    public function setContato(?Contato $contato): self
    {
        $this->contato = $contato;

        return $this;
    }

    /**
     * @return Collection|Familia[]
     */
    public function getFamilia(): Collection
    {
        return $this->familia;
    }

    public function addFamilium(Familia $familia): self
    {
        if (!$this->familia->contains($familia)) {
            $this->familia[] = $familia;
            $familia->setUsuario($this);
        }

        return $this;
    }

    public function removeFamilium(Familia $familia): self
    {
        if ($this->familia->contains($familia)) {
            $this->familia->removeElement($familia);
            // set the owning side to null (unless already changed)
            if ($familia->getUsuario() === $this) {
                $familia->setUsuario(null);
            }
        }

        return $this;
    }

    public function __toString()
    {    
        return (string) $this->getNome();
    }

    /**
     * @return Collection|Beneficios[]
     */
    public function getBeneficio(): Collection
    {
        return $this->beneficio;
    }

    public function addBeneficio(Beneficios $beneficio): self
    {
        if (!$this->beneficio->contains($beneficio)) {
            $this->beneficio[] = $beneficio;
            $beneficio->setUsuario($this);
        }

        return $this;
    }

    public function removeBeneficio(Beneficios $beneficio): self
    {
        if ($this->beneficio->contains($beneficio)) {
            $this->beneficio->removeElement($beneficio);
            // set the owning side to null (unless already changed)
            if ($beneficio->getUsuario() === $this) {
                $beneficio->setUsuario(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Saude[]
     */
    public function getSaude(): Collection
    {
        return $this->saude;
    }

    public function addSaude(Saude $saude): self
    {
        if (!$this->saude->contains($saude)) {
            $this->saude[] = $saude;
            $saude->setUsuario($this);
        }

        return $this;
    }

    public function removeSaude(Saude $saude): self
    {
        if ($this->saude->contains($saude)) {
            $this->saude->removeElement($saude);
            // set the owning side to null (unless already changed)
            if ($saude->getUsuario() === $this) {
                $saude->setUsuario(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Atendimento[]
     */
    public function getAtendimento(): Collection
    {
        return $this->atendimento;
    }

    public function addAtendimento(Atendimento $atendimento): self
    {
        if (!$this->atendimento->contains($atendimento)) {
            $this->atendimento[] = $atendimento;
            $atendimento->setUsuario($this);
        }

        return $this;
    }

    public function removeAtendimento(Atendimento $atendimento): self
    {
        if ($this->atendimento->contains($atendimento)) {
            $this->atendimento->removeElement($atendimento);
            // set the owning side to null (unless already changed)
            if ($atendimento->getUsuario() === $this) {
                $atendimento->setUsuario(null);
            }
        }

        return $this;
    }
}
