<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\Perfiles_model;
use CodeIgniter\Controller;

class Usuarios_controller extends Controller
{
    protected $helpers = ['form', 'url'];

    public function create()
    {
        helper(['form', 'url']);
        $perfilModel = new Perfiles_model();
        $data['titulo'] = 'Registro';
        $data['perfiles'] = $perfilModel->findAll();

        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('back/usuario/registro', $data);
        echo view('front/footer_view');
    }

    public function validar()
    {
        helper(['form', 'url']);
        $input = $this->validate([
            'nombre'   => 'required|min_length[3]',
            'apellido' => 'required|min_length[3]|max_length[25]',
            'usuario'  => 'required|min_length[3]',
            'email'    => 'required|min_length[4]|max_length[100]|valid_email|is_unique[usuarios.email]',
            'pass'     => 'required|min_length[3]|max_length[10]'
        ]);

        $formModel = new UserModel();

        if (!$input) {
            $perfilModel = new Perfiles_model();
            $data['titulo'] = 'Registro';
            $data['validation'] = $this->validator;
            $data['perfiles'] = $perfilModel->findAll();

            echo view('front/head_view', $data);
            echo view('front/navbar_view');
            echo view('back/usuario/registro', $data);
            echo view('front/footer_view');
        } else {
            $formModel->save([
                'nombre'     => $this->request->getVar('nombre'),
                'apellido'   => $this->request->getVar('apellido'),
                'usuario'    => $this->request->getVar('usuario'),
                'email'      => $this->request->getVar('email'),
                'pass'       => password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT),
                'perfil_id'  => 2,
                'baja'       => 'NO'
            ]);

            session()->setFlashdata('success', 'Usuario registrado con éxito');
            return redirect()->to('/login');
        }
    }
}
