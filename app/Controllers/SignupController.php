<?php

namespace App\Controllers;

use App\Models\UserModel;

class SignupController extends BaseController
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
            . view('front/registro')
            . view('front/footer_view');
    }

    public function store()
    {
        helper(['form']);
        $rules = [
            'nombre'    => 'required|min_length[2]|max_length[100]',
            'apellido'  => 'required|min_length[2]|max_length[100]',
            'email'     => 'required|valid_email|is_unique[usuarios.email]',
            'password'  => 'required|min_length[4]|max_length[50]',
            'confirmar' => 'matches[password]'
        ];

        if ($this->validate($rules)) {
            $model = new UserModel();
            $data = [
                'nombre'   => $this->request->getVar('nombre'),
                'apellido' => $this->request->getVar('apellido'),
                'email'    => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $model->save($data);
            return redirect()->to('/registro')->with('success', '¡Registro exitoso! Podés iniciar sesión.');
        } else {
            $data['validation'] = $this->validator;
            echo view('front/head_view')
                . view('front/navbar_view')
                . view('front/registro', $data)
                . view('front/footer_view');
        }
    }
}
