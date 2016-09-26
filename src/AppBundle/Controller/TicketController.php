<?php

namespace AppBundle\Controller;

use Basic\CustomerNotAllowedException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Ramsey\Uuid\Uuid;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use TicketOffice\Sale\Command\BuyTicket;

class TicketController extends Controller
{
    /**
     * @Route("tickets/new", name="tickets.new")
     */
    public function createTicketAction(Request $request)
    {
        $id = Uuid::uuid4();
        $command = new BuyTicket(
            $id,
            $request->get('customerId'),
            $request->get('trainNumber'),
            new \DateTime($request->get('departure'))
        );
        try {
            $this->get('command_bus')->handle($command);
            return new JsonResponse(['id' => $id], 200);
        } catch (CustomerNotAllowedException $e) {
            return new Response($e->toJson(), 400);
        }
    }

    /**
     * @Route("tickets/{id}", name="ticket.get_single")
     */
    public function getSingleAction($id)
    {
        $repo = $this->get('ticket_office.sale.entity.ticket_repository');
        $ticket = $repo->findById($id);
        return new Response($ticket->toJson(), 200);
    }
}