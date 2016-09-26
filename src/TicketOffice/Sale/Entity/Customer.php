<?php

namespace TicketOffice\Sale\Entity;

class Customer
{
    private $id;
    private $email;

    public function __construct($id, $email)
    {
        $this->id = $id;
        $this->email = $email;
    }
}