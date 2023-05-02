<?php

class UserController
{
    public function __construct()
    {
        if (isset($_SESSION['username'])) {
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
        $msg = "";
        if (!empty($req['username'])) {
            if (!empty($req['email'])) {
                if (!empty($req['password'])) {
                    if ($req['password'] == $req['password2']) {
                        $db = new \database\Database();
                        $user = $db->select("SELECT * FROM users WHERE username = ? OR email = ?", array($req['username'], $req['email']))->fetch();
                        if ($user) {
                            $msg = "ایمیل یا نام کاربری  در سیستم وجود دارد";
                            flash('error', $msg);
                            return redirectBack();
                        } else {
                            $db->insert('users', array_keys($req), $req);
                            redirect('login');
                        }
                    } else {
                        $msg = "پسورد یکسان وارد کنید";
                        flash('error', $msg);
                        return redirectBack();
                    }
                } else {
                    $msg = "پسورد خالی می باشد";
                    flash('error', $msg);
                    return redirectBack();
                }
            } else {
                $msg = "ایمیل خالی می باشد";
                flash('error', $msg);
                return redirectBack();
            }
        } else {
            $msg = "نام کاربری خالی می باشد";
            flash('error', $msg);
            return redirectBack();
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
                $msg = "کاربری با این مشخصات وجود ندارد";
                flash('error', $msg);
                return redirectBack();
            }
        } else {
            $msg = "همه فیلد ها پر شوند";
            flash('error', $msg);
            return redirectBack();
            redirectBack();
        }
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        redirect('/');
    }
}