<?php

namespace Basic;

class TicketOfficeException extends \Exception
{
    private $details;

    const CUSTOMER_NOT_ALLOWED = 3000;

    public function toArray()
    {
        $a['error']['code'] = $this->getCode();
        $a['error']['message'] = $this->getMessage();
        $a['error']['details'] = $this->getDetails();
        return $a;
    }

    public static function createWithDetails($details)
    {
        $e = new static();
        $e->setDetails($details);
        return $e;
    }


    public function toJson()
    {
        return json_encode($this->toArray());
    }

    public function setDetails($details)
    {
        $this->details = $details;
    }

    public function getDetails()
    {
        return $this->details;
    }
}