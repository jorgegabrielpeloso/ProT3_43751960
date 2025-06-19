<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        $session = session();

        if (!$session->get('logged_in')) {
            return redirect()->to('/login');
        }

        $data['titulo'] = 'Mi Perfil';
        $data['usuario'] = [
            'nombre' => $session->get('nombre'),
            'usuario' => $session->get('usuario'),
            'perfil_id' => $session->get('perfil_id')
        ];

        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('back/usuario/profile', $data);
        echo view('front/footer_view');
    }
}
