<?php

namespace App\Controller;

use App\Entity\Customer;
use App\Form\Type\CustomerType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerController extends AbstractApiController
{
    public function indexAction(Request $request): Response
    {
        $customers = $this->getDoctrine()->getRepository(Customer::class)->findAll();

        return $this->json($customers);
    }

    public function createAction(
        Request $request,
        EntityManagerInterface $em
    ): Response {
        $form = $this->buildForm(CustomerType::class);

        $form->handleRequest($request);

        if (!$form->isSubmitted() || !$form->isValid()) {
            print('Error');
            exit;
        }

        /** @var Customer $customer */
        $customer = $form->getData();
        $em->persist($customer);
        $em->flush();

        return $this->json($customer);
    }
}