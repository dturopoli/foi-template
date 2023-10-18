<?php

namespace App\Controller;

use App\Form\ProductType;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/product/create', name: 'app_product_create', methods: ['GET', 'POST'])]
    public function create(Request $request, ProductRepository $productRepository): Response
    {
        $form = $this->createForm(ProductType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $formData = $form->getData();

            $productRepository->save($formData);

            $this->addFlash('success', 'Product created.');
        }

        return $this->render('product/create.html.twig', [
            'product_form' => $form->createView(),
        ]);
    }

    #[Route('/product/list', name: 'app_product_list', methods: ['GET'])]
    public function list(Request $request, ProductRepository $productRepository): Response
    {
        if ($request->get('sku')) {
            $products = $productRepository->findBy(['sku' => $request->get('sku')]);
        } else {
            $products = $productRepository->getExpensive();
        }

        return $this->render('product/list.html.twig', [
            'products' => $products
        ]);
    }
}
