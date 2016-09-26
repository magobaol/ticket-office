<?php

namespace Basic;


class CustomerNotAllowedException extends TicketOfficeException
{
    protected $code = TicketOfficeException::CUSTOMER_NOT_ALLOWED;
    protected $message = 'Customer is not allowed to use this service.';
}