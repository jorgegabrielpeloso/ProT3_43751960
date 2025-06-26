<?php

namespace App\Controllers;

use App\Models\Productos_model;

class TiendaController extends BaseController
{
    public function index()
    {
        $productoModel = new Productos_model();
        $data['titulo'] = 'Tienda';
        $data['productos'] = $productoModel->where('baja', 'NO')->findAll();
        return view('front/head_view', $data)
            . view('front/navbar_view')
            . view('front/tienda')
            . view('front/footer_view');
    }
}
