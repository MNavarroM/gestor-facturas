<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Cliente;


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
        return $this->render('gestor/formulario-cliente.html.twig', [
            'controller_name' => 'GestorController',
        ]);
    }

    public function verClientes(){

    }

    public function sendCliente(Request $request){
        $nombre = $request->request->get('nombre');
        $nif = $request->request->get('nif');
        $direccion = $request->request->get('direccion');
        $provincia = $request->request->get('provincia');
        $poblacion = $request->request->get('poblacion');
        $cp = $request->request->get('cp');

        $cliente = new Cliente();
        $cliente->setNombre($nombre);
        $cliente->setCif($nif);
        $cliente->setPoblacion($poblacion);
        $cliente->setDireccion($direccion);
        $cliente->setCp($cp);
        $cliente->setProvincia($provincia);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($cliente);
        $entityManager->flush();
        //return "Persist";
    }

    public function crearFactura(Request $request){
        //$idCliente = $request->request->get('id_cliente');
        $clientes = $this->getDoctrine()->getRepository(Cliente::class)->findAll();
        return $this->render('gestor/new-invoice.html.twig', [
            'controller_name' => 'GestorController',
            'clientes' => $clientes
        ]);
    }

    public function generarFactura(Request $request){
        $idCliente = $request->request->get('id_cliente');
        $cliente = $this->getDoctrine()->getRepository(Cliente::class)->find($idCliente);
        //print_r($request->request);
        $array = $request->request->get('arrayServices');
        //echo $array;
        parse_str($array);
        echo $array;
        die();
        return $this->render('gestor/factura2.html.twig', [
            'controller_name' => 'GestorController',
            'cliente' => $cliente
        ]);        
    }

}
