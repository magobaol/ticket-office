<?php

namespace TicketOffice\Sale\Command;

class BuyTicket
{
    private $id;
    private $customerId;
    private $trainNumber;
    private $departure;

    public function __construct($id, $customerId, $trainNumber, $departure)
    {
        $this->id = $id;
        $this->customerId = $customerId;
        $this->trainNumber = $trainNumber;
        $this->departure = $departure;
    }

    /**
     * @return mixed
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * @return mixed
     */
    public function getTrainNumber()
    {
        return $this->trainNumber;
    }

    /**
     * @return mixed
     */
    public function getDeparture()
    {
        return $this->departure;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

}