<?php

namespace App\Controller;

use App\Entity\Traobject;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class TraobjectController
 * @package App\Controller
 * @Route("/traobject")
 */
class TraobjectController extends BaseController
{
    /**
     * @Route("/traobject/{slug}", name="traobject_show")
     */
    public function show(Traobject $traobject)
    {
        return $this->render('traobject/index.html.twig', [
            'controller_name' => 'TraobjectController',
        ]);
    }
}
