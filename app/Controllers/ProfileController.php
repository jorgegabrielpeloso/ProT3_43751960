<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class ProfileController extends BaseController
{
    public function index()
    {
        $session = session();
        $id = $session->get('id_usuario');

        $model = new UserModel();
        $usuario = $model->find($id);

        if (!$usuario) {
            return redirect()->to('/login');
        }

        return view('back/usuario/profile', ['usuario' => $usuario]);
    }

    public function update()
    {
        $session = session();
        $id = $session->get('id_usuario');
        $model = new UserModel();

        $usuario = $model->find($id);

        if (!$usuario) {
            return redirect()->to('/login');
        }

        $data = [
            'nombre'   => $this->request->getPost('nombre'),
            'apellido' => $this->request->getPost('apellido'),
            'email'    => $this->request->getPost('email'),
            'usuario'  => $this->request->getPost('usuario'),
        ];

        $pass = $this->request->getPost('pass');
        if (!empty($pass)) {
            $data['pass'] = password_hash($pass, PASSWORD_DEFAULT);
        }

        // Subida de imagen
        $file = $this->request->getFile('avatar');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $ext = $file->getClientExtension();
            if (in_array($ext, ['jpg', 'jpeg', 'png'])) {
                if ($usuario['avatar']) {
                    $rutaAnterior = FCPATH . 'uploads/' . $usuario['avatar'];
                    if (file_exists($rutaAnterior)) {
                        unlink($rutaAnterior);
                    }
                }

                $nombre = $file->getRandomName();
                $file->move('uploads', $nombre);
                $data['avatar'] = $nombre;
            }
        }

        // Eliminar imagen si se tildó el checkbox
        if ($this->request->getPost('eliminar_avatar') == '1' && $usuario['avatar']) {
            $ruta = FCPATH . 'uploads/' . $usuario['avatar'];
            if (file_exists($ruta)) {
                unlink($ruta);
            }
            $data['avatar'] = null;
        }

        $model->update($id, $data);

        return redirect()->to('/profile')->with('success', 'Perfil actualizado correctamente.');
    }
}
