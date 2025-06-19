<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Home extends Controller
{
    public function index()
    {
        $data['titulo'] = 'Inicio';
        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('front/inicio');
        echo view('front/footer_view');
    }

    public function quienes_somos()
    {
        $data['titulo'] = 'Quiénes Somos';
        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('front/quienes_somos');
        echo view('front/footer_view');
    }

    public function acerca_de()
    {
        $data['titulo'] = 'Acerca de';
        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('front/acerca_de');
        echo view('front/footer_view');
    }
}
