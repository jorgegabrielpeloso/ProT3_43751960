<?php

namespace App\Controllers;

use App\Models\UserModel;

class SigninController extends BaseController
{
    public function index()
    {
        // Evita que usuarios logueados vean esta vista
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/profile');
        }

        helper(['form']);
        echo view('front/head_view')
            . view('front/navbar_view')
            . view('front/login')
            . view('front/footer_view');
    }

    public function loginAuth()
    {
        $session = session();
        $userModel = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $user = $userModel->where('email', $email)->first();

        if ($user) {
            $pass = $user['password'];
            $authenticatePassword = password_verify($password, $pass);
            if ($authenticatePassword) {
                $ses_data = [
                    'id' => $user['id'],
                    'nombre' => $user['nombre'],
                    'apellido' => $user['apellido'],
                    'email' => $user['email'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/profile');
            } else {
                $session->setFlashdata('msg', 'Contraseña incorrecta.');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'El email no existe.');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
