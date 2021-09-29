<?php

namespace App\Controller;

use App\Entity\Customer;
use App\Form\Type\CustomerType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerController extends AbstractApiController
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function indexAction(Request $request): Response
    {
        $customers = $this->getDoctrine()->getRepository(Customer::class)->findAll();

        return $this->respond($customers);
    }

    public function createAction(Request $request): Response
    {
        $form = $this->buildForm(CustomerType::class);

        $form->handleRequest($request);

        if (!$form->isSubmitted() || !$form->isValid()) {
            return $this->respond($form, Response::HTTP_BAD_REQUEST);
        }

        /** @var Customer $customer */
        $customer = $form->getData();
        $this->em->persist($customer);
        $this->em->flush();

        return $this->respond($customer);
    }
}