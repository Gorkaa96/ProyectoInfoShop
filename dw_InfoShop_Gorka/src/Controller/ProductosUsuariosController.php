<?php

namespace App\Controller;

use App\Entity\ProductosUsuarios;
use App\Form\ProductosUsuariosType;
use App\Repository\ProductosUsuariosRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/productos/usuarios")
 */
class ProductosUsuariosController extends AbstractController
{
    /**
     * @Route("/", name="productos_usuarios_index", methods={"GET"})
     */
    public function index(ProductosUsuariosRepository $productosUsuariosRepository): Response
    {
        return $this->render('productos_usuarios/index.html.twig', [
            'productos_usuarios' => $productosUsuariosRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="productos_usuarios_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $productosUsuario = new ProductosUsuarios();
        $form = $this->createForm(ProductosUsuariosType::class, $productosUsuario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($productosUsuario);
            $entityManager->flush();

            return $this->redirectToRoute('productos_usuarios_index');
        }

        return $this->render('productos_usuarios/new.html.twig', [
            'productos_usuario' => $productosUsuario,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="productos_usuarios_show", methods={"GET"})
     */
    public function show(ProductosUsuarios $productosUsuario): Response
    {
        return $this->render('productos_usuarios/show.html.twig', [
            'productos_usuario' => $productosUsuario,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="productos_usuarios_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ProductosUsuarios $productosUsuario): Response
    {
        $form = $this->createForm(ProductosUsuariosType::class, $productosUsuario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('productos_usuarios_index');
        }

        return $this->render('productos_usuarios/edit.html.twig', [
            'productos_usuario' => $productosUsuario,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="productos_usuarios_delete", methods={"DELETE"})
     */
    public function delete(Request $request, ProductosUsuarios $productosUsuario): Response
    {
        if ($this->isCsrfTokenValid('delete'.$productosUsuario->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($productosUsuario);
            $entityManager->flush();
        }

        return $this->redirectToRoute('productos_usuarios_index');
    }
}
