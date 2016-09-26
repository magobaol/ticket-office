<?php

namespace TicketOffice\Sale\Entity;

interface TicketRepository
{
    public function save(Ticket $ticket);

    /**
     * @param $id
     * @return Ticket
     */
    public function findById($id);
}