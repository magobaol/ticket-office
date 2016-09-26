<?php

namespace TicketOffice\Sale\Entity;


interface CustomerRepository
{
    /**
     * @param $id
     * @return Customer
     */
    public function findById($id);
}