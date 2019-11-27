<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GestorController extends AbstractController
{
    /**
     * @Route("/gestor", name="gestor")
     */
    public function index()
    {
        return $this->render('gestor/index.html.twig', [
            'controller_name' => 'GestorController',
        ]);
    }
}
