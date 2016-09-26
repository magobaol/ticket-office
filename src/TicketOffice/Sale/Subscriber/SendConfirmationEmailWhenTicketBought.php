<?php

namespace TicketOffice\Sale\Subscriber;


use Psr\Log\LoggerInterface;
use TicketOffice\Sale\Entity\CustomerRepository;
use TicketOffice\Sale\Entity\TicketRepository;
use TicketOffice\Sale\Event\TicketBought;

class SendConfirmationEmailWhenTicketBought
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

    public function notify(TicketBought $event)
    {
        $this->logger->info(sprintf('Invio email a customer %s per biglietto %s', $event->getCustomerId(), $event->getTicketId()));
    }
}