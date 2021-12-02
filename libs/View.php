<?php

class View
{
    function __construct()
    {
    }

    function render($view)
    {
        require_once 'views/' . $view . '.php';
    }
}
