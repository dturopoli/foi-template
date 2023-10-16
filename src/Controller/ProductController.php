<?php

namespace App\Controller;

use App\Form\ProductType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/product/create', name: 'product_create', methods: Request::METHOD_GET)]
    public function create(): Response
    {
        $form = $this->createForm(ProductType::class);

        return $this->render('product/create.html.twig', [
            'product_form' => $form->createView(),
        ]);
    }
}
