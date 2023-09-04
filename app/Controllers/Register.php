<?php

namespace App\Controllers;

class Register extends BaseController
{
    public function index(): string
    {
        $session = \Config\Services::session();

        return view('/structure/header', ['login' => $session->get('email')]) . view('register') . view('structure/footer');
    }


    public function registerUser()
    {

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $passwordConf = $this->request->getPost('passwordConf');

        $email = $this->request->getPost('email');


        $db = db_connect();

        if ($password != $passwordConf) {
            return view('register', ['errorMessage' => "Parola nu corespunde"]);
        }

        $query = "SELECT * FROM users WHERE Username = '{$username}'";
        $result = $db->query($query)->getResult();

        if (count($result) > 0) {
            return view('register', ['errorMessage' => "Contul exista deja"]);
        } else {
            $password = md5($password);
            $query = "INSERT INTO users ( Username, Email, Password ) VALUES ('$username', '$email', '$password')";
            $db->query($query);
            return redirect()->to('/');
        }
    }
}
