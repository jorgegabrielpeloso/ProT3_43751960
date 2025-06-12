<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function registro()
    {
        helper(['form']);

        if ($this->request->getMethod() === 'post') {
            $model = new UserModel();

            $data = [
                'nombre'    => $this->request->getPost('nombre'),
                'apellido'  => $this->request->getPost('apellido'),
                'email'     => $this->request->getPost('email'),
                'password'  => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            ];

            if ($model->insert($data)) {
                // Registro exitoso
                return view('front/head_view')
                    . view('front/navbar_view')
                    . "
                    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                    <script>
                    Swal.fire({
                        icon: 'success',
                        title: '¡Registro exitoso!',
                        text: 'Bienvenido, {$data['nombre']} {$data['apellido']}',
                        confirmButtonColor: '#3085d6'
                    }).then(() => {
                        window.location.href = '" . base_url('/') . "';
                    });
                    </script>
                    "
                    . view('front/footer_view');
            } else {
                // Error en la inserción
                return view('front/head_view')
                    . view('front/navbar_view')
                    . "<div class='container mt-4'><div class='alert alert-danger'>Error al registrar. Por favor, intentá de nuevo.</div></div>"
                    . view('front/footer_view');
            }
        }

        // Si no es POST, mostrar el formulario
        echo view('front/registro');
    }
}
