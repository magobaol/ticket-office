<?php

namespace TicketOffice\Sale\Entity;

class Ticket
{
    private $id;
    private $customerId;
    private $trainNumber;
    private $departure;
    private $seatNumber;
    private $PNR;

    public function __construct($id, $customerId, $trainNumber, $departure, $seatNumber, $PNR)
    {
        $this->id = $id;
        $this->customerId = $customerId;
        $this->trainNumber = $trainNumber;
        $this->departure = $departure;
        $this->seatNumber = $seatNumber;
        $this->PNR = $PNR;
    }
}