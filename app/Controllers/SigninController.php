<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class SigninController extends Controller
{
    public function index()
    {
        $data['titulo'] = 'Iniciar Sesión';

        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('back/usuario/login', $data);
        echo view('front/footer_view');
    }

    public function loginAuth()
    {
        $session = session();
        $userModel = new UserModel();

        $userOrEmail = $this->request->getVar('usuario');
        $password = $this->request->getVar('pass');

        $user = $userModel->where('usuario', $userOrEmail)
                          ->orWhere('email', $userOrEmail)
                          ->first();

        if ($user && password_verify($password, $user['pass'])) {
            $sessionData = [
                'id_usuario' => $user['id_usuario'],
                'usuario'    => $user['usuario'],
                'nombre'     => $user['nombre'],
                'perfil_id'  => $user['perfil_id'],
                'logged_in'  => true
            ];
            $session->set($sessionData);
            return redirect()->to('/profile');
        }

        $session->setFlashdata('error', 'Usuario o contraseña incorrectos');
        return redirect()->to('/login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
