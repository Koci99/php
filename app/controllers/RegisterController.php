<?php


class RegisterController extends ControllerBase
{

    public function indexAction()
    {

    }


    public function registerAction()
    {
        $user = new Users();

        $userArray = $this->request->getPost();
        $user->username = $userArray['name'];
        $user->email = $userArray['email'];

        $exists = $user->checkUsers($user->username,$user->email);

        if ($exists)
        {
            echo "User is already exists.";
            echo "<br/>";
            echo $this->tag->linkTo(['/register', 'Go back', 'class' => 'btn btn-primary']);
            return;
        }

        // Store and check for errors
        $success = $user->save();

        if ($success) {
            echo "Thanks for registering!";
            echo "<br/>";
            echo $this->tag->linkTo(['/signup', 'Go back', 'class' => 'btn btn-primary']);
        } else {
            echo "Sorry, the following problems were generated: ";
            $messages = $user->getMessages();

            foreach ($messages as $message) {
                echo $message->getMessage(), "<br/>";
            }

            echo "<br/>";
            echo $this->tag->linkTo(['/register', 'Go back', 'class' => 'btn btn-primary']);
        }

        $this->view->disable();
    }
}