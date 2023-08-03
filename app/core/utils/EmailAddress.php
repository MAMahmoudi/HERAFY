<?php

class EmailAddress
{
    public $localPart;
    public $domain;
    public $address;
    public function __construct($address = null)
    {
        if ($address) {
            $this->address = $address;
            $this->extract();
        }
    }
    protected function extract()
    {
        list($this->localPart, $this->domain) = explode("@", $this->address);
    }
}
