<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Entities\User;
use App\Libraries\UtilityLib;

class Auth extends BaseController
{

    protected $UserModel;
    protected $Utiltiy;

    public function __construct()
    {
        $this->UserModel = new UserModel();
        $this->Utiltiy = new UtilityLib();
    }

    public function register()
    {
        if ($this->request->getPost()) {

            if (!$this->validate('register')) {
                goto view;
            } else {
                $user = new User();
                $data = $this->request->getPost();
                $user->fill($data);
                $user->created_by = 0;
                $user->created_date = date("Y-m-d H:i:s");

                if ($this->UserModel->SaveUser($user)) {
                    $this->Utiltiy->pesan("Berhasil <s>Registrasi</s>", "success");
                } else {
                    $this->Utiltiy->pesan("Gagal <s>Registrasi</s>", "danger");
                }

                return redirect()->to('login');
            }
        } else {
            view:
            $data['validation'] = \Config\Services::validation();
            $data['title'] = "Register";
            return view('register', $data);
        }
    }

    public function login()
    {
        if ($this->request->getPost()) {

            if (!$this->validate('login')) {
                goto view;
            } else {
                $username = $this->request->getPost('username');
                $password = $this->request->getPost('password');

                $user = $this->UserModel->where('username', $username)->first();

                $this->setUserdata($user);
                return redirect()->to('/');
            }
        } else {
            view:
            $data['validation'] = \Config\Services::validation();
            $data['title'] = "Login";
            return view('login', $data);
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(site_url('auth/login'));
    }

    private function setUserdata($user)
    {
        $sessData = [
            'username' => $user->username,
            'id' => $user->id,
            'role' => $user->role,
            'isLoggedIn' => TRUE
        ];

        session()->set($sessData);
    }
}
