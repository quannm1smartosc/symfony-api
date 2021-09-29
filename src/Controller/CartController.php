<?php

namespace App\Controller;

use App\Entity\Cart;
use App\Entity\Customer;
use App\Form\Type\CartType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CartController extends AbstractApiController
{
    public function indexAction(Request $request): Response
    {
        $customerId = $request->get('id');
        $customer = $this->getDoctrine()
            ->getRepository(Customer::class)
            ->findOneBy(
            [
                'id' => $customerId,
            ]
        );

        if (!$customer) {
            throw new NotFoundHttpException('Customer Not Found');
        }

        $cart = $this->getDoctrine()->getRepository(Cart::class)->findOneBy([
            'customer' => $customer,
        ]);

        if (!$cart) {
            throw new NotFoundHttpException('Cart does not exists for this customer');
        }

        return $this->respond($cart);
    }

    public function createAction(
        Request $request,
        EntityManagerInterface $em
    ): Response {
        $form = $this->buildForm(CartType::class);

        $form->handleRequest($request);

        if (!$form->isSubmitted() || !$form->isValid()) {
            return $this->respond($form, Response::HTTP_BAD_REQUEST);
        }

        /** @var Cart $cart */
        $cart = $form->getData();
        $em->persist($cart);
        $em->flush();

        return $this->respond($cart);
    }

    public function actionUpdate(
        Request $request,
        EntityManagerInterface $em
    ): Response {
        $customerId = $request->get('customerId');

        $customer = $this->getDoctrine()->getRepository(Customer::class)->findOneBy([
            'id' => $customerId,
        ]);

        if (!$customer) {
            throw new NotFoundHttpException('Customer not found');
        }

        $cart = $this->getDoctrine()->getRepository(Cart::class)->findOneBy([
            'customer' => $customer,
        ]);

        $form = $this->buildForm(CartType::class, $cart, [
            'method' => $request->getMethod(),
        ]);

        $form->handleRequest($request);

        if (!$form->isSubmitted() || !$form->isValid()) {
            return $this->respond($form, Response::HTTP_BAD_REQUEST);
        }

        /** @var Cart $cart */
        $cart = $form->getData();
        $em->persist($cart);
        $em->flush();

        return $this->respond($cart);
    }

    public function deleteAction(
        Request $request,
        EntityManagerInterface $em
    ): Response {
        $cartId = $request->get('cartId');
        $customerId = $request->get('customerId');

        $cart = $this->getDoctrine()->getRepository(Cart::class)->findOneBy([
           'id' => $cartId,
           'customer' => $customerId
        ]);

        if (!$cart) {
            print('Error');
            exit;
        }

        $em->remove($cart);
        $em->flush();

        return $this->respond('');
    }
}
