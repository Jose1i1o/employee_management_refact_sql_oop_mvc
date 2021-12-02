<?php

// require_once(CONTROLLERS . '/errorController.php');
// require_once(LIBS . '/timeout.php');


class Router
{
    public $uri;
    public $controller;
    public $method;
    public $param;

    public function __construct()
    {
        $this->setUri();
        $this->setController();
        $this->setMethod();
        $this->setParam();
    }

    public function setUri()
    {
        $url = rtrim($_SERVER['REQUEST_URI'], '/');
        $this->uri = explode("/", $url);
    }

    public function setController()
    {
        $this->controller = isset($this->uri[2]) ? $this->uri[2] : '';
    }

    public function setMethod()
    {
        $this->method = !empty($this->uri[3]) ? $this->uri[3] : 'render';
    }

    public function setParam()
    {
        $this->param = !empty($this->uri[4]) ? $this->uri[4] : '';
    }

    public function __get($property)
    {
        if (property_exists($this, $property))
            return $this->$property;
    }

    public function loadUriRequest()
    {

        // When there is no controller defined
        if (empty($this->controller)) {
            $fileController = CONTROLLERS . '/' . 'loginController.php';
            var_dump("$fileController");
            require_once($fileController);

            $controller = new LoginController();
            $controller->loadModel('loginModel');
            $controller->render();
            return;
        }
        // check user timeout
        if ($this->controller !== "login") {
            $fileController = CONTROLLERS . '/' . 'loginController.php';
            require_once($fileController);

            $this->timeOut = new Timeout();

            if ($this->timeOut->checkUserTime()) {
                $this->login = new LoginController();
                $this->login->signOut();
                return;
            }
        }

        $fileController = CONTROLLERS . '/' . $this->controller . 'Controller.php';
        $classController =  ucfirst($this->controller) . 'Controller';

        if (file_exists($fileController)) {
            require_once($fileController);
            $controller = new $classController;
            $controller->loadModel($this->controller);

            try {
                if (!empty($this->method)) {
                    $controller->{$this->method}($this->param);
                }
            } catch (Throwable $th) {
                $controller = new errorController(
                    'Error loading method ' . $this->method
                );
            }
        } else {
            $controller = new errorController(
                'Error loading controller ' . $this->controller
            );
        }
    }


    public function getUri()
    {
        return $this->uri;
    }

    public function getController()
    {
        return $this->controller;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function getParam()
    {
        return $this->param;
    }
}
