<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;

class StateController extends BaseController
{
    /**
     * @Route("/state", name="state")
     */
    public function index()
    {
        return $this->render('state/index.html.twig', [
            'controller_name' => 'StateController',
        ]);
    }
}
