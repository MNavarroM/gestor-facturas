<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EmpresaRepository")
 */
class Empresa
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
    private $nombre;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $cif;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $poblacion;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $provincia;

    /**
     * @ORM\Column(type="integer")
     */
    private $cp;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Cliente", mappedBy="empresa")
     */
    private $clientes;

    public function __construct()
    {
        $this->clientes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getCif(): ?string
    {
        return $this->cif;
    }

    public function setCif(string $cif): self
    {
        $this->cif = $cif;

        return $this;
    }

    public function getPoblacion(): ?string
    {
        return $this->poblacion;
    }

    public function setPoblacion(string $poblacion): self
    {
        $this->poblacion = $poblacion;

        return $this;
    }

    public function getProvincia(): ?string
    {
        return $this->provincia;
    }

    public function setProvincia(string $provincia): self
    {
        $this->provincia = $provincia;

        return $this;
    }

    public function getCp(): ?int
    {
        return $this->cp;
    }

    public function setCp(int $cp): self
    {
        $this->cp = $cp;

        return $this;
    }

    /**
     * @return Collection|Cliente[]
     */
    public function getClientes(): Collection
    {
        return $this->clientes;
    }

    public function addCliente(Cliente $cliente): self
    {
        if (!$this->clientes->contains($cliente)) {
            $this->clientes[] = $cliente;
            $cliente->setEmpresa($this);
        }

        return $this;
    }

    public function removeCliente(Cliente $cliente): self
    {
        if ($this->clientes->contains($cliente)) {
            $this->clientes->removeElement($cliente);
            // set the owning side to null (unless already changed)
            if ($cliente->getEmpresa() === $this) {
                $cliente->setEmpresa(null);
            }
        }

        return $this;
    }
}
