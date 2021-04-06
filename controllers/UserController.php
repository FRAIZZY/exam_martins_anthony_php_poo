<?php

class UserController
{
    private $userManager;

    public function __construct()
    {
        $this->userManager = new UserManager();
    }

    public function login()
    {
        require('views/login.php');
    }

    public function submitLogin()
    {
        $errors = [];
        if (empty($_POST['username'])) {
            $errors[] = "The Field Username Can't Be Empty !";
        }

        if (empty($_POST['password'])) {
            $errors[] = "The Field Password Can't Be Empty !";
        }

        if (count($errors) == 0) {
            $user = new User($_POST['username'], $_POST['password']);
            $userBdd = $this->userManager->checkLogin($user);
            if ($userBdd) {
                $_SESSION['username'] = $userBdd[1];
                header('Location: index.php?controller=home&action=display');
            } else {
                echo ('error');
            }
        } else {
            require('views/login.php');
            die();
        }
    }

    public function displayRegister()
    {
        require('views/register.php');
    }

    public function register()
    {
        $errors = [];
        if (empty($_POST['username'])) {
            $errors[] = "The Field Username Can't Be Empty !";
        }

        if (empty($_POST['password'])) {
            $errors[] = "The Field Password Can't Be Empty !";
        }

        if (count($errors) == 0) {
            $user = new User($_POST['username'], $_POST['password']);
            $userBdd = $this->userManager->register($user);
            if ($userBdd) {
                $_SESSION['username'] = $_POST['username'];
                header('Location: index.php?controller=home&action=display');
            } else {
                echo ('error');
            }
        } else {
            require('views/register.php');
            die();
        }
    }
}
