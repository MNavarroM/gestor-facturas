<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Empresa;


class GestorController extends AbstractController
{
    public function index()
    {
        return $this->render('gestor/index.html.twig', [
            'controller_name' => 'GestorController',
        ]);
    }

    public function createCliente()
    {
        return $this->render('gestor/factural.html.twig', [
            'controller_name' => 'GestorController',
        ]);
    }

    public function sendCliente(Request $request){
        $nombre = $request->request->get('nombre');
        $nif = $request->request->get('nif');
        $direccion = $request->request->get('direccion');
        $provincia = $request->request->get('provincia');
        $poblacion = $request->request->get('poblacion');
        $cp = $request->request->get('cp');

        $cliente = new Empresa();
        $cliente->setNombre($nombre);
        $cliente->setCif($nif);
        $cliente->setLocalidad($poblacion);
        $cliente->setDireccion($direccion);
        $cliente->setCp($cp);
        $cliente->setProvincia($provincia);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($cliente);
        $entityManager->flush();
        //return "Persist";

    }

}
