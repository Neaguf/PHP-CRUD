<?php

namespace App\Controllers;

class Services extends BaseController
{
    public function index()
    {
        $db = db_connect();


        $query = "SELECT * FROM content WHERE Id = 1";
        $result = $db->query($query)->getResult();


        $session = \Config\Services::session();
        $data = [


            'title' => $result[0]->Text,
            'imageUrl' => $result[0]->Imagine,
            'admin' => $session->get('admin'),
            'editMode' => false,
        ];

        if ($session->get('email')) {
            return view('/structure/header', ['login' => $session->get('email')]) . view("services", $data) . view('structure/footer');
        } else {
            return redirect()->to(base_url('Login'));
        }
    }



    public function edit()
    {

        $db = db_connect();


        $query = "SELECT * FROM content WHERE Id = 1";
        $result = $db->query($query)->getResult();


        $session = \Config\Services::session();
        $data = [


            'title' => $result[0]->Text,
            'imageUrl' => $result[0]->Imagine,
            'admin' => $session->get('admin'),
            'editMode' => true,
        ];
        return view('/structure/header', ['login' => $session->get('email')]) . view("services", $data) . view('structure/footer');
    }

    public function save_changes()
    {
        $editedTitle = $this->request->getPost('editedTitle');

        $file = $this->request->getFile('userfile');

        if (!$file->isValid()) {
            throw new RuntimeException($file->getErrorString() . '(' . $file->getError() . ')');
        }

        // Set a file name
        $name = $file->getRandomName();

        // Move the file to its designated folder
        $file->move(FCPATH . 'assets', $name);

        $editedImageUrl = base_url() . 'assets/' . $name;

        $data = [
            'Text' => $editedTitle,
            'Imagine' => $editedImageUrl
        ];


        $db = db_connect();


        $db->table('content')->where('Id', 1)->update($data);

        return redirect()->to(base_url('services'));
    }

    public function do_upload()
    {


        // if (!) {
        //     $error = array('error' => $this->upload->display_errors());
        // } else {
        //     $data = array('upload_data' => $this->upload->data());
        // }
    }
}
