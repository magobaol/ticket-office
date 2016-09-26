<?php

namespace TicketOffice\Sale\Event;

class TicketBought
{
    private $customerId;
    private $ticketId;
    private $trainNumber;

    public function __construct($trainNumber, $customerId, $ticketId)
    {
        $this->trainNumber = $trainNumber;
        $this->customerId = $customerId;
        $this->ticketId = $ticketId;
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
    public function getTicketId()
    {
        return $this->ticketId;
    }

    /**
     * @return mixed
     */
    public function getTrainNumber()
    {
        return $this->trainNumber;
    }

}