<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FacturaRepository")
 */
class Factura
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $numeracion;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fecha;

    /**
     * @ORM\Column(type="float")
     */
    private $total;

    /**
     * @ORM\Column(type="float")
     */
    private $total_sin_iva;

    /**
     * @ORM\Column(type="float")
     */
    private $iva;

    /**
     * @ORM\Column(type="integer")
     */
    private $tipo_iva;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Servicio", mappedBy="factura")
     */
    private $servicios;

    public function __construct()
    {
        $this->servicios = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeracion(): ?int
    {
        return $this->numeracion;
    }

    public function setNumeracion(int $numeracion): self
    {
        $this->numeracion = $numeracion;

        return $this;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getTotal(): ?float
    {
        return $this->total;
    }

    public function setTotal(float $total): self
    {
        $this->total = $total;

        return $this;
    }

    public function getTotalSinIva(): ?float
    {
        return $this->total_sin_iva;
    }

    public function setTotalSinIva(float $total_sin_iva): self
    {
        $this->total_sin_iva = $total_sin_iva;

        return $this;
    }

    public function getIva(): ?float
    {
        return $this->iva;
    }

    public function setIva(float $iva): self
    {
        $this->iva = $iva;

        return $this;
    }

    public function getTipoIva(): ?int
    {
        return $this->tipo_iva;
    }

    public function setTipoIva(int $tipo_iva): self
    {
        $this->tipo_iva = $tipo_iva;

        return $this;
    }

    /**
     * @return Collection|Servicio[]
     */
    public function getServicios(): Collection
    {
        return $this->servicios;
    }

    public function addServicio(Servicio $servicio): self
    {
        if (!$this->servicios->contains($servicio)) {
            $this->servicios[] = $servicio;
            $servicio->setFactura($this);
        }

        return $this;
    }

    public function removeServicio(Servicio $servicio): self
    {
        if ($this->servicios->contains($servicio)) {
            $this->servicios->removeElement($servicio);
            // set the owning side to null (unless already changed)
            if ($servicio->getFactura() === $this) {
                $servicio->setFactura(null);
            }
        }

        return $this;
    }
}
