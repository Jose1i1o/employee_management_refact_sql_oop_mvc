<?php

require_once(LIBS . '/session.php');

class Timeout
{
    public function __construct()
    {
        $this->session = new Session;
    }

    public function checkSessionTime()
    {
    }
}
