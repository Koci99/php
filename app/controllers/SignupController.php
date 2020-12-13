<?php

use Phalcon\Mvc\Controller;

class SignupController extends Controller
{

    public function indexAction()
    {
        $users = Users::find();
        if ($this->session->has('user-admin'))
        {
            $userAdmin = $this->session->get('user-admin');
        }
        else
        {
            $userAdmin = false;
        }

        if ($this->session->has('user-name'))
        {
            $userName = $this->session->get('user-name');
        }
        else
        {
            $userName = null;
        }

        $this->view->setVar('users',$users);
        $this->view->setVar('userAdmin',$userAdmin);
        $this->view->setVar('userName',$userName);

    }


    public function signupAction()
    {
        $user = new Users();
        $users = Users::find()->toArray();
        $userArray = $this->request->getPost();
        if ($userArray['username'] == null || $userArray['email'] == null)
        {
            echo "Please, fill user name and email.";
            echo "<br/>";
            echo $this->tag->linkTo(['/signup', 'Go back', 'class' => 'btn btn-primary']);
            return;
        }
        else
        {
            $user->username = $userArray['username'];
            $user->email = $userArray['email'];
        }

        $find = false;

        foreach ($users as $regUser)
        {
            if ($regUser['username'] == $user->username && $regUser['email'] == $user->email)
            {
                $find = true;
                $this->session->set('user-name', $user->username);
                $this->session->set('user-admin', $user->checkAdmin());

                echo "User is sign up";
                echo "<br/>";
                echo $this->tag->linkTo(['/signup', 'Go back', 'class' => 'btn btn-primary']);
                break;
            }
        }

        if ($find == false)
        {
            echo "User not exists, please register user";
            echo "<br/>";
            echo $this->tag->linkTo(['/signup', 'Go back', 'class' => 'btn btn-primary']);
        }

    }

    public function logoutAction()
    {
        $this->session->remove('user-name');
        if ($this->session->has('user-admin'))
        {
            $this->session->remove('user-admin');
        }

        $this->session->destroy();

        echo "User successful logout.";
        echo "<br/>";
        echo $this->tag->linkTo(['/signup', 'Go back', 'class' => 'btn btn-primary']);

    }
}