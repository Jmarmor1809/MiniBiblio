<?php

namespace App\Controller;

use App\Entity\Libro;
use App\Repository\LibroRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LibroController extends AbstractController
{
    #[Route("/libro/listar", name: "libro_listar,")]
    final public function Listar(LibroRepository $libroRepository) :Response
    {
        return $this->render('libro.html.twig', [
           'libros' => $libroRepository->findAll()
        ]);
    }

    #[Route('/libro/{id}', name: 'libro_detalle')]
    final public function Listar_id(Libro $libro):Response
    {
        return $this->render('librodetalle.html.twig',[
            'libro' => $libro
        ]);
    }

    #[Route("/ap1", name: "ejercicio1")]
    final public function Listar_Por_Orden(LibroRepository $libroRepository) :Response
    {
        $libros = $libroRepository->findByOrdenAlfabetico();
        return $this->render('ejercicio/ap1.html.twig' , [
           'libros' => $libros
        ]);
    }

    #[Route("/ap2", name: "ejercicio2")]
    final public function Listar_Por_Anio(LibroRepository $libroRepository) :Response
    {
        $libros = $libroRepository->findByAnioPublicacion();
        return $this->render('ejercicio/ap2.html.twig' , [
            'libros' => $libros
        ]);
    }
}