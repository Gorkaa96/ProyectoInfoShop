<?php

namespace App\Entity;

use App\Repository\ProductosUsuariosRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductosUsuariosRepository::class)
 */
class ProductosUsuarios
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Productos::class, inversedBy="usuarios")
     */
    private $productos;

    /**
     * @ORM\ManyToOne(targetEntity=Usuarios::class, inversedBy="productos")
     */
    private $usuarios;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProductos(): ?Productos
    {
        return $this->productos;
    }

    public function setProductos(?Productos $productos): self
    {
        $this->productos = $productos;

        return $this;
    }

    public function getUsuarios(): ?Usuarios
    {
        return $this->usuarios;
    }

    public function setUsuarios(?Usuarios $usuarios): self
    {
        $this->usuarios = $usuarios;

        return $this;
    }
}
