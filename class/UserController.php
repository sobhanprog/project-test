<?php

class UserController
{
    public function __construct()
    {
        if (isset($_SESSION['username']))
        {
            redirectBack();
        }
    }

    public function registerView()
    {
        view('register');
    }

    public function loginView()
    {
        view('login');
    }

    public function register($req)
    {
        if (!empty($req['username'])) {
            if (!empty($req['email'])) {
                if (!empty($req['password'])) {
                    if ($req['password'] == $req['password2']) {
                        $db = new \database\Database();
                        $db->insert('users', array_keys($req), $req);
                        redirect('login');
                    } else {
                        echo "password not same";
                    }
                } else {
                    echo "empty password";
                }
            } else {
                echo "empty email";
            }
        } else {
            echo "empty usename";
        }
    }

    public function login($req)
    {
        if (!empty($req['username']) and !empty($req['password'])) {
            $db = new \database\Database();
            $user = $db->select("SELECT * FROM users WHERE username = ? AND password = ?", [$req['username'], $req['password']])->fetch();

            if ($user) {
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];
                redirect('/');
            } else {
                echo "not find user";
            }
        } else {
            redirectBack();
        }
    }
    public function logout()
    {
        session_destroy();
    }
}