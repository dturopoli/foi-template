<?php

namespace App\Controller;

use App\Form\ProductType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/product/create', name: 'app_product_create', methods: 'GET')]
    public function create()
    {
        $form = $this->createForm(ProductType::class);

        return $this->render('product/create.html.twig', [
            'product_form' => $form->createView(),
        ]);
    }
}
