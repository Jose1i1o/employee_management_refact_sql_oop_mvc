<?php

require_once(MODELS . '/entities/user.php');

class LoginModel extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function get($params)
    {
        $email = $params['email'];
        try {
            $item = null;
            $this->db->connect();
            $this->db->query("SELECT * FROM user WHERE email = :email");
            $this->db->bind(':email', $email);
            $item = $this->db->singleData();
            return $item;
        } catch (PDOException $error) {
            echo $error;
            throw new Exception($error->getMessage());
        }
    }
}