<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class TicketController extends Controller
{
    /**
     * @Route("tickets/new", name="tickets.new")
     */
    public function createTicketAction(Request $request)
    {
        //customerId
        //trainNumber
        //departure
    }
}