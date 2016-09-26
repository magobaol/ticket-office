<?php

namespace TicketOffice\Sale\Command;

use SimpleBus\Message\Bus\MessageBus;
use TicketOffice\Sale\Entity\Ticket;
use TicketOffice\Sale\Entity\TicketRepository;
use TicketOffice\Sale\Event\TicketBought;
use TicketOffice\Sale\Service\PNRGenerator;
use TicketOffice\Sale\Service\SeatPicker;

class BuyTicketHandler
{
    /**
     * @var SeatPicker
     */
    private $seatPicker;
    /**
     * @var PNRGenerator
     */
    private $PNRGenerator;
    /**
     * @var TicketRepository
     */
    private $ticketRepository;
    /**
     * @var MessageBus
     */
    private $eventBus;

    public function __construct(
        SeatPicker $seatPicker,
        PNRGenerator $PNRGenerator,
        TicketRepository $ticketRepository,
        MessageBus $eventBus
    ) {
        $this->seatPicker = $seatPicker;
        $this->PNRGenerator = $PNRGenerator;
        $this->ticketRepository = $ticketRepository;
        $this->eventBus = $eventBus;
    }

    public function handle(BuyTicket $command)
    {
        $seat = $this->seatPicker->pick($command->getTrainNumber(), $command->getDeparture());
        $pnr = $this->PNRGenerator->generate($command->getTrainNumber(), $command->getDeparture(), $seat);

        $ticket = new Ticket(
            $command->getId(),
            $command->getCustomerId(),
            $command->getTrainNumber(),
            $command->getDeparture(),
            $seat,
            $pnr
        );
        $this->ticketRepository->save($ticket);
        $event = new TicketBought($command->getTrainNumber(), $command->getCustomerId(), $command->getId());
        $this->eventBus->handle($event);
    }
}