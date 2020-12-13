<?php

use Phalcon\Mvc\Model;

class Users extends Model
{
    public $id;
    public $username;
    public $email;

    public function checkAdmin() : bool
    {
        $admin = false;

        if ($this->username == "admin" && $this->email == "admin@admin.com")
        {
            echo "Admin is here" . "<br/>";
            $admin = true;
        }
        else
        {
            echo "This is ussualy user" . "<br/>";
        }

        return $admin;
    }
}