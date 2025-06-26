<?php

namespace App\Controllers;

use App\Models\UserModel;

class SignupController extends BaseController
{
    public function index()
    {
        // Si ya hay sesión iniciada, redirigir a perfil
        if (session()->get('id_usuario')) {
            return redirect()->to('/profile');
        }

        $perfilModel = new \App\Models\Perfiles_model();
        $data['titulo'] = 'Registro';
        $data['perfiles'] = $perfilModel->findAll();

        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('back/usuario/registro', $data);
        echo view('front/footer_view');
    }

    public function store()
    {
        helper(['form']);

        $rules = [
            'nombre'   => 'required|min_length[3]',
            'apellido' => 'required|min_length[3]|max_length[25]',
            'usuario'  => 'required|min_length[3]',
            'email'    => 'required|min_length[4]|max_length[100]|valid_email|is_unique[usuarios.email]',
            'pass'     => 'required|min_length[3]|max_length[10]'
        ];

        if (!$this->validate($rules)) {
            $perfilModel = new \App\Models\Perfiles_model();
            $data['titulo'] = 'Registro';
            $data['validation'] = $this->validator;
            $data['perfiles'] = $perfilModel->findAll();

            echo view('front/head_view', $data);
            echo view('front/navbar_view');
            echo view('back/usuario/registro', $data);
            echo view('front/footer_view');
        } else {
            $userModel = new UserModel();
            $userModel->save([
                'nombre'    => $this->request->getVar('nombre'),
                'apellido'  => $this->request->getVar('apellido'),
                'usuario'   => $this->request->getVar('usuario'),
                'email'     => $this->request->getVar('email'),
                'pass'      => password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT),
                'perfil_id' => 2 // por defecto usuario normal
            ]);

            session()->setFlashdata('success', 'Usuario registrado con éxito');
            return redirect()->to('/login');
        }
    }
}
