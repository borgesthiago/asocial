<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FuncionarioRepository")
 */
class Funcionario
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
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $matricula;

    /**
     * @ORM\Column(type="string", length=11, nullable=true)
     */
    private $cpf;

    /**
     * @ORM\Column(type="integer")
     */
    private $status;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $vinculo;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dataAdmissao;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dataExoneracao;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $cargo;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $funcao;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $rg;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $orgaoRg;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $coordenador;

   /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Secretaria", inversedBy="secretaria")
     * @ORM\JoinColumn(nullable=false)
     */
    private $secretaria;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Habitacao", inversedBy="funcionario", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $habitacao;

   /**
     * @ORM\OneToOne(targetEntity="App\Entity\Remuneracao", inversedBy="funcionario", cascade={"persist", "remove"})
     */
    private $remuneracao;

     /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Contato", inversedBy="funcionarios", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $contato;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $rgProfissao;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $orgaoRgProfissao;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Atendimento", mappedBy="funcionario")
     */
    private $atendimento;

  

    public function __construct()
    {
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

    public function getMatricula(): ?string
    {
        return $this->matricula;
    }

    public function setMatricula(?string $matricula): self
    {
        $this->matricula = $matricula;

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

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getVinculo(): ?string
    {
        return $this->vinculo;
    }

    public function setVinculo(string $vinculo): self
    {
        $this->vinculo = $vinculo;

        return $this;
    }

    public function getDataAdmissao(): ?\DateTimeInterface
    {
        return $this->dataAdmissao;
    }

    public function setDataAdmissao(?\DateTimeInterface $dataAdmissao): self
    {
        $this->dataAdmissao = $dataAdmissao;

        return $this;
    }

    public function getDataExoneracao(): ?\DateTimeInterface
    {
        return $this->dataExoneracao;
    }

    public function setDataExoneracao(?\DateTimeInterface $dataExoneracao): self
    {
        $this->dataExoneracao = $dataExoneracao;

        return $this;
    }

    public function getCargo(): ?string
    {
        return $this->cargo;
    }

    public function setCargo(?string $cargo): self
    {
        $this->cargo = $cargo;

        return $this;
    }

    public function getFuncao(): ?string
    {
        return $this->funcao;
    }

    public function setFuncao(?string $funcao): self
    {
        $this->funcao = $funcao;

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

    public function getCoordenador(): ?int
    {
        return $this->coordenador;
    }

    public function setCoordenador(?int $coordenador): self
    {
        $this->coordenador = $coordenador;

        return $this;
    }

    public function getSecretaria(): ?Secretaria
    {
        return $this->secretaria;
    }

    public function setSecretaria(?Secretaria $secretaria): self
    {
        $this->secretaria = $secretaria;

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

    public function getRemuneracao(): ?remuneracao
    {
        return $this->remuneracao;
    }

    public function setRemuneracao(remuneracao $remuneracao): self
    {
        $this->remuneracao = $remuneracao;

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

    public function getRgProfissao(): ?string
    {
        return $this->rgProfissao;
    }

    public function setRgProfissao(?string $rgProfissao): self
    {
        $this->rgProfissao = $rgProfissao;

        return $this;
    }

    public function getOrgaoRgProfissao(): ?string
    {
        return $this->orgaoRgProfissao;
    }

    public function setOrgaoRgProfissao(?string $orgaoRgProfissao): self
    {
        $this->orgaoRgProfissao = $orgaoRgProfissao;

        return $this;
    }

    public function __toString()
    {
        return $this->getNome();
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
            $atendimento->setFuncionario($this);
        }

        return $this;
    }

    public function removeAtendimento(Atendimento $atendimento): self
    {
        if ($this->atendimento->contains($atendimento)) {
            $this->atendimento->removeElement($atendimento);
            // set the owning side to null (unless already changed)
            if ($atendimento->getFuncionario() === $this) {
                $atendimento->setFuncionario(null);
            }
        }

        return $this;
    }
}
