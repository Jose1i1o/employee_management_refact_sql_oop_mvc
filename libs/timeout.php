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
        $this->session->init();

        if (empty($this->session->get('timeout'))) {
            return true;
        }

        $timeOut = $this->session->get('timeout');
        if ((time() - $timeOut) > 500) {
            return true;
        }
    }
}
