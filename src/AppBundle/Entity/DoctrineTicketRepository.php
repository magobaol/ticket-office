<?php

namespace AppBundle\Entity;


use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use TicketOffice\Sale\Entity\Ticket;
use TicketOffice\Sale\Entity\TicketRepository;

class DoctrineTicketRepository implements TicketRepository
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
        $this->entityRepository = $this->entityManager->getRepository('AppSale:Ticket');
    }

    public function save(Ticket $ticket)
    {
        $this->entityManager->persist($ticket);
        $this->entityManager->flush();
    }

    /**
     * @param $id
     * @return Ticket
     */
    public function findById($id)
    {
        return $this->entityRepository->find($id);
    }
}