<?php

namespace App\Controller;

use App\Entity\County;
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

    /**
     * @Route("/show/{id}", name="county_show")
     */
    public function show(County $county)
    {
        return $this->render("county/show.html.twig", ['county' => $county]);
    }

    public function allCounties ()
    {
        $counties = $this->getDoctrine()->getRepository(County::class)->findAll();

        return $this->render('county/all_counties.html.twig', ['counties' => $counties]);
    }
}
