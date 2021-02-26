<?php

namespace App\Entity;

use App\Repository\UsuariosRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UsuariosRepository::class)
 */
class Usuarios
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Nombre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Contrasena;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Administrador;

    /**
     * @ORM\OneToMany(targetEntity=ProductosUsuarios::class, mappedBy="usuarios")
     */
    private $productos;

    public function __construct()
    {
        $this->productos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->Nombre;
    }

    public function setNombre(string $Nombre): self
    {
        $this->Nombre = $Nombre;

        return $this;
    }

    public function getContrasena(): ?string
    {
        return $this->Contrasena;
    }

    public function setContrasena(string $Contrasena): self
    {
        $this->Contrasena = $Contrasena;

        return $this;
    }

    public function getAdministrador(): ?bool
    {
        return $this->Administrador;
    }

    public function setAdministrador(bool $Administrador): self
    {
        $this->Administrador = $Administrador;

        return $this;
    }

    /**
     * @return Collection|ProductosUsuarios[]
     */
    public function getProductos(): Collection
    {
        return $this->productos;
    }

    public function addProducto(ProductosUsuarios $producto): self
    {
        if (!$this->productos->contains($producto)) {
            $this->productos[] = $producto;
            $producto->setUsuarios($this);
        }

        return $this;
    }

    public function removeProducto(ProductosUsuarios $producto): self
    {
        if ($this->productos->removeElement($producto)) {
            // set the owning side to null (unless already changed)
            if ($producto->getUsuarios() === $this) {
                $producto->setUsuarios(null);
            }
        }

        return $this;
    }
}
