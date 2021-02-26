<?php
namespace App\DataFixtures;
use Faker;
use App\Entity\Categorias;
use App\Entity\Productos;
use App\Entity\Usuarios;
use App\Entity\ProductosUsuarios;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
class AppFixtures extends Fixture
{
 public function load(ObjectManager $manager)
 {
 // Creating 20 job offers
 for ($i = 0; $i < 1; $i++)
 {
 $jobFaker = Faker\Factory::create();
 // Categoria
 $categoria = new Categorias();
 $categoria->setNombre("Placa Base");
 $manager->persist($categoria);
 // Producto
 $producto = new Productos();
 $producto->setNombre("Bazooka-250M");
 $producto->setEmpresa('MSI');
 $producto->setPrecio(150);
 $producto->setCategorias($categoria);
 $manager->persist($producto);
  // Usuario
 $usuario = new Usuarios();
 $usuario->setNombre("Gorka");
 $usuario->setContrasena('4v');
 $usuario->setAdministrador(false);
 $manager->persist($usuario);
   // UsuarioProducto
 $usuarioProducto = new ProductosUsuarios();
 $usuarioProducto->setProductos($producto);
 $usuarioProducto->setUsuarios($usuario);
 $manager->persist($usuarioProducto);
 }
 $manager->flush();
 }
}

