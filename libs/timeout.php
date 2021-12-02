<?php

require_once(LIBS . 'session.php');

class Timeout
{
    function __construct()
    {
        $this->session = new Session;
    }
}
