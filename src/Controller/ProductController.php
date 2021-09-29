<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\Type\ProductType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProductController extends AbstractApiController
{
    public function indexAction(Request $request): Response
    {
        $products = $this->getDoctrine()->getRepository(Product::class)->findAll();

        return $this->respond($products);
    }

    public function createAction(
        Request $request,
        EntityManagerInterface $em
    ): Response {
        $form = $this->buildForm(ProductType::class);

        $form->handleRequest($request);

        if (!$form->isSubmitted() || !$form->isValid()) {
            return $this->respond($form, Response::HTTP_BAD_REQUEST);
        }

        /** @var Product $product */
        $product = $form->getData();
        $em->persist($product);
        $em->flush();

        return $this->respond($product);
    }

    public function actionUpdate(
        Request $request,
        EntityManagerInterface $em
    ): Response {

        $productId = $request->get('productId');

        $product = $this->getDoctrine()->getRepository(Product::class)->findOneBy([
           'id' => $productId,
        ]);

        if (!$product) {
            throw new NotFoundHttpException('No product');
        }

        $form = $this->buildForm(ProductType::class, $product, [
           'method' => $request->getMethod(),
        ]);

        $form->handleRequest($request);

        if (!$form->isSubmitted() || !$form->isValid()) {
            return $this->respond($form, Response::HTTP_BAD_REQUEST);
        }

        /** @var Product $product */
        $product = $form->getData();
        $em->persist($product);
        $em->flush();

        return $this->respond($product);
    }

    public function deleteAction(
        Request $request,
        EntityManagerInterface $entityManager
    ): Response {
        $productId = $request->get('productId');

        $product = $this->getDoctrine()->getRepository(Product::class)->findOneBy([
           'id' => $productId
        ]);

        if (!$product) {
            throw new NotFoundHttpException('Cannot delete this product');
        }

        $entityManager->remove($product);
        $entityManager->flush();

        return $this->respond('');
    }
}