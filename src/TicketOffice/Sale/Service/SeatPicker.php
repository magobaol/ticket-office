<?php

namespace TicketOffice\Sale\Service;


class SeatPicker
{
    public function pick($trainNumber, $departure)
    {
        return rand(1, 1000);
    }
}