<?php

namespace TicketOffice\Sale\Command;

use TicketOffice\Sale\Entity\Ticket;
use TicketOffice\Sale\Entity\TicketRepository;
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

    public function __construct(
        SeatPicker $seatPicker,
        PNRGenerator $PNRGenerator,
        TicketRepository $ticketRepository
    ) {
        $this->seatPicker = $seatPicker;
        $this->PNRGenerator = $PNRGenerator;
        $this->ticketRepository = $ticketRepository;
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
    }
}