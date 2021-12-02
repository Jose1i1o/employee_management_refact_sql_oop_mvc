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
            $item = [];
            $query = $this->db->connect()->query("SELECT * FROM users WHERE email = '{$email}'");
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $item = new User(
                    $row['id'],
                    $row['name'],
                    $row['email'],
                    $row['password']
                );
            }
            return $item;
        } catch (PDOException $error) {
            throw new Exception($error->getMessage());
        }
    }
}
