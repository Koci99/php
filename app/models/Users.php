<?php

use Phalcon\Mvc\Model;

class Users extends Model
{
    public $id;
    public $username;
    public $email;

    public function checkAdmin($name,$email) : bool
    {
        $admin = false;

        if ($name == "admin" && $email == "admin@admin.com")
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

    public function checkUsers($name,$email)
    {
        $users = Users::find()->toArray();
        $exists = false;

        foreach ($users as $regUser)
        {
            if ($regUser['name'] == $name && $regUser['email'] == $email)
            {
                $exists = true;
            }
        }

        return $exists;
    }
}