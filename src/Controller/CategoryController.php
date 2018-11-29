<?php

namespace App\Controller;

use App\Entity\Category;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Class CategoryController
 * @package App\Controller
 * @Route("/category")
 */
class CategoryController extends BaseController
{
    /**
     * @Route("/show/{id}", name="category_show")
     */
    public function show(Category $category)
    {
        return $this->render("category/show.html.twig", ['category' => $category]);
    }

    public function allCategories ()
    {
        $categories = $this->getDoctrine()->getRepository(Category::class)->findAll();

        return $this->render('category/all_categories.html.twig', ['categories' => $categories]);
    }
}
