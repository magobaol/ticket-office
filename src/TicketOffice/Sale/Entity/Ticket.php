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

    public function toArray()
    {
        return [
            'id' => $this->id,
            'customerId' => $this->customerId,
            'trainNumber' => $this->trainNumber,
            'departure' => $this->departure,
            'seatNumber' => $this->seatNumber,
            'PNR' => $this->PNR,
        ];
    }

    public function toJson()
    {
        return json_encode($this->toArray());
    }
}