<?php

class User
{

    function __construct(
        string $id,
        string $fullname,
        string $email,
        string $password
    ) {
        $this->id = $id;
        $this->name = $fullname;
        $this->email = $email;
        $this->password = $password;
    }
}
