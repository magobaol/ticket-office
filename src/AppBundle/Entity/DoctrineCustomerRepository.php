<?php

namespace AppBundle\Entity;


use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use TicketOffice\Sale\Entity\Customer;
use TicketOffice\Sale\Entity\CustomerRepository;

class DoctrineCustomerRepository implements CustomerRepository
{
    /**
     * @var EntityRepository
     */
    private $entityRepository;
    /**
     * @var EntityManager
     */
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->entityRepository = $this->entityManager->getRepository('AppSale:Customer');
    }

    /**
     * @param $id
     * @return Customer
     */
    public function findById($id)
    {
        return $this->entityRepository->find($id);
    }
}