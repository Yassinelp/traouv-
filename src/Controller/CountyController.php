<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;

class CountyController extends BaseController
{
    /**
     * @Route("/county", name="county")
     */
    public function index()
    {
        return $this->render('county/index.html.twig', [
            'controller_name' => 'CountyController',
        ]);
    }
}
