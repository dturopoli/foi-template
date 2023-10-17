<?php

namespace App\Controller;

use App\Form\ProductType;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/product/create', name: 'app_product_create', methods: ['GET', 'POST'])]
    public function create(Request $request, ProductRepository $productRepository)
    {
        $form = $this->createForm(ProductType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $formData = $form->getData();

            $productRepository->save($formData);
        }

        return $this->render('product/create.html.twig', [
            'product_form' => $form->createView(),
        ]);
    }
}
