<?php

require_once(MODELS . '/entities/user.php');

class LoginModel extends Model
{

    function __construct()
    {
    }

    public function get($params)
    {
        $email = $params['email'];
        try {
        } catch (PDOException $error) {
            throw new Exception($error->getMessage());
        }
    }
}
