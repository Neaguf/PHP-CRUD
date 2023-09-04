<?php

namespace App\Controllers;

use stdClass;

class Login extends BaseController
{
    public function index(): string
    {
        $session = \Config\Services::session();
        return view('/structure/header', ['login' => $session->get('email')]) . view('login') . view('structure/footer');
    }


    public function login_user()
    {

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $db = db_connect();


        $query = "SELECT * FROM users WHERE Username = '{$username}'";
        $result = $db->query($query)->getResult();


        if (count($result) <= 0) {

            return view('login', ['errorMessage' => "User dosen't exist"]);
        } else {
            $user = $result[0];
            if ($user->Password != md5($password)) {

                return view('/structure/header') . view('login') . view('structure/footer');
            }


            $this->set_sesion($user);
            // $data = [];

            // $data['sesiune'] = $sesiune;

            // return view('/structure/header') . view('home', $data) . view('structure/footer');
            return redirect()->to('/');
        }
    }

    public function set_sesion($user)
    {

        $session = \Config\Services::session();
        // $session->destroy();
        $newdata = [
            'username'  => $user->Username,
            'email'     => $user->Email,
            'admin' => $user->Admin,
        ];
        $session->set($newdata);
    }

    public function logout()
    {
        $session = \Config\Services::session();
        $session->destroy();

        return redirect()->to('/');
    }
}
