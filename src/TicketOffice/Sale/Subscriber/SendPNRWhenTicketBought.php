<?php

namespace TicketOffice\Sale\Subscriber;

use Psr\Log\LoggerInterface;
use TicketOffice\Sale\Entity\CustomerRepository;
use TicketOffice\Sale\Entity\TicketRepository;
use TicketOffice\Sale\Event\TicketBought;

class SendPNRWhenTicketBought
{
    /**
     * @var LoggerInterface
     */
    private $logger;
    /**
     * @var TicketRepository
     */
    private $ticketRepository;
    /**
     * @var CustomerRepository
     */
    private $customerRepository;

    public function __construct(
        LoggerInterface $logger,
        TicketRepository $ticketRepository,
        CustomerRepository $customerRepository
    ) {
        $this->logger = $logger;
        $this->ticketRepository = $ticketRepository;
        $this->customerRepository = $customerRepository;
    }

    public function notify(TicketBought $ticketBought)
    {
        $ticket = $this->ticketRepository->findById($ticketBought->getTicketId());
        $this->logger->info(sprintf('Invio PNR %s a customer %s', $ticket->getPNR(), $ticketBought->getCustomerId()));
    }
}