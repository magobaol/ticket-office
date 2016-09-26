<?php

namespace TicketOffice\Sale\Service;


class PNRGenerator
{
    public function generate($trainNumber, $departure, $seatNumber)
    {
        return uniqid();
    }
}