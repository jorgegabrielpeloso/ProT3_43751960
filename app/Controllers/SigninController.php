<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Controllers\BaseController;

class SigninController extends BaseController
{
    public function index()
    {
        // Si ya está logueado, redirige a perfil o admin
        if (session()->get('id_usuario')) {
            if (session()->get('perfil_id') == 1) {
                return redirect()->to('/admin');
            } else {
                return redirect()->to('/profile');
            }
        }

        $data['titulo'] = 'Login';

        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('back/usuario/login');
        echo view('front/footer_view');
    }

    public function loginAuth()
    {
        $session = session();
        $model = new UserModel();

        $usuario = $this->request->getVar('usuario');
        $pass    = $this->request->getVar('pass');

        $data = $model
            ->where('usuario', $usuario)
            ->orWhere('email', $usuario)
            ->first();

        if ($data) {
            if (password_verify($pass, $data['pass'])) {
                $session->set([
                    'id_usuario' => $data['id_usuario'],
                    'usuario'    => $data['usuario'],
                    'nombre'     => $data['nombre'],
                    'perfil_id'  => $data['perfil_id'],
                    'logged_in'  => true
                ]);

                // Redirige según el perfil
                if ($data['perfil_id'] == 1) {
                    return redirect()->to('/admin');
                } else {
                    return redirect()->to('/profile');
                }

            } else {
                // Contraseña incorrecta
                $session->setFlashdata('error', 'Contraseña incorrecta.');
                return redirect()->to('/login');
            }
        } else {
            // Usuario o email no encontrado
            $session->setFlashdata('error', 'Usuario o email no encontrados.');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
