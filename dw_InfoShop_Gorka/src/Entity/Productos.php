<?php

namespace App\Entity;

use App\Repository\ProductosRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductosRepository::class)
 */
class Productos
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
    private $Empresa;

    /**
     * @ORM\Column(type="integer")
     */
    private $Precio;

    /**
     * @ORM\ManyToOne(targetEntity=Categorias::class, inversedBy="productos")
     */
    private $categorias;

    /**
     * @ORM\OneToMany(targetEntity=ProductosUsuarios::class, mappedBy="productos")
     */
    private $usuarios;

    public function __construct()
    {
        $this->usuarios = new ArrayCollection();
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

    public function getEmpresa(): ?string
    {
        return $this->Empresa;
    }

    public function setEmpresa(string $Empresa): self
    {
        $this->Empresa = $Empresa;

        return $this;
    }

    public function getPrecio(): ?int
    {
        return $this->Precio;
    }

    public function setPrecio(int $Precio): self
    {
        $this->Precio = $Precio;

        return $this;
    }

    public function getCategorias(): ?Categorias
    {
        return $this->categorias;
    }

    public function setCategorias(?Categorias $categorias): self
    {
        $this->categorias = $categorias;

        return $this;
    }

    /**
     * @return Collection|ProductosUsuarios[]
     */
    public function getUsuarios(): Collection
    {
        return $this->usuarios;
    }

    public function addUsuario(ProductosUsuarios $usuario): self
    {
        if (!$this->usuarios->contains($usuario)) {
            $this->usuarios[] = $usuario;
            $usuario->setProductos($this);
        }

        return $this;
    }

    public function removeUsuario(ProductosUsuarios $usuario): self
    {
        if ($this->usuarios->removeElement($usuario)) {
            // set the owning side to null (unless already changed)
            if ($usuario->getProductos() === $this) {
                $usuario->setProductos(null);
            }
        }

        return $this;
    }
}
