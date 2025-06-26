<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\Productos_model;

class AdminController extends Controller
{
    public function index()
    {
        $session = session();

        if (!$session->get('id_usuario')) {
            return redirect()->to('/login');
        }

        if ($session->get('perfil_id') == 1) {
            $userModel = new UserModel();
            $productoModel = new Productos_model();

            $data['usuarios'] = $userModel->where('baja', 'NO')->findAll();
            $data['usuariosBaja'] = $userModel->where('baja', 'SI')->findAll();

            $data['productos'] = $productoModel->where('baja', 'NO')->findAll();
            $data['productosBaja'] = $productoModel->where('baja', 'SI')->findAll();

            $data['titulo'] = 'Panel de Administración';
            return view('back/admin/admin_dashboard', $data);
        }

        return redirect()->to('/profile');
    }

    // ---------- USUARIOS ----------

    public function guardarUsuario()
    {
        $model = new UserModel();
        $datos = $this->request->getPost();

        $datos['perfil_id'] = 2;
        $datos['pass'] = password_hash($datos['pass'], PASSWORD_DEFAULT);
        $datos['baja'] = 'NO';

        if ($model->insert($datos)) {
            return redirect()->to('/admin')->with('success', 'Usuario creado correctamente.');
        }

        return redirect()->to('/admin')->with('error', 'Error al crear usuario.');
    }

    public function actualizarUsuario()
    {
        $model = new UserModel();
        $datos = $this->request->getPost();
        $id = $datos['id'];
        unset($datos['id']);

        if ((int)$id === session()->get('id_usuario')) {
            return redirect()->to('/admin')->with('error', 'No podés editarte a vos mismo.');
        }

        if ($model->update($id, $datos)) {
            return redirect()->to('/admin')->with('success', 'Usuario actualizado.');
        }

        return redirect()->to('/admin')->with('error', 'Error al actualizar usuario.');
    }

    public function eliminarUsuario($id)
    {
        if ((int)$id === session()->get('id_usuario')) {
            return redirect()->to('/admin')->with('error', 'No podés eliminarte a vos mismo.');
        }

        $model = new UserModel();
        $usuario = $model->find($id);

        if (!$usuario) {
            return redirect()->to('/admin')->with('error', 'Usuario no encontrado.');
        }

        $model->update($id, ['baja' => 'SI']);
        return redirect()->to('/admin')->with('success', 'Usuario dado de baja.');
    }

    public function reactivarUsuario($id)
    {
        $model = new UserModel();
        $model->update($id, ['baja' => 'NO']);
        return redirect()->to('/admin')->with('success', 'Usuario reactivado.');
    }

    // ---------- PRODUCTOS ----------

    public function guardarProducto()
    {
        helper(['form', 'url']);
        $productoModel = new Productos_model();

        $foto = $this->request->getFile('foto');
        $nombreArchivo = null;

        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $nombreArchivo = $foto->getRandomName();
            $foto->move('public/uploads', $nombreArchivo);
        }

        $productoModel->insert([
            'nombre' => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
            'precio' => $this->request->getPost('precio'),
            'talle' => $this->request->getPost('talle'),
            'foto' => $nombreArchivo,
            'baja' => 'NO'
        ]);

        return redirect()->to('/admin')->with('success', 'Producto creado correctamente.');
    }

    public function actualizarProducto()
    {
        helper(['form', 'url']);
        $productoModel = new Productos_model();
        $id = $this->request->getPost('id');

        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
            'precio' => $this->request->getPost('precio'),
            'talle' => $this->request->getPost('talle'),
        ];

        $foto = $this->request->getFile('foto');
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $nombreArchivo = $foto->getRandomName();
            $foto->move('public/uploads', $nombreArchivo);
            $data['foto'] = $nombreArchivo;
        }

        $productoModel->update($id, $data);
        return redirect()->to('/admin')->with('success', 'Producto actualizado correctamente.');
    }

    public function eliminarProducto($id)
    {
        $productoModel = new Productos_model();
        $productoModel->update($id, ['baja' => 'SI']);
        return redirect()->to('/admin')->with('success', 'Producto dado de baja.');
    }

    public function reactivarProducto($id)
    {
        $productoModel = new Productos_model();
        $productoModel->update($id, ['baja' => 'NO']);
        return redirect()->to('/admin')->with('success', 'Producto reactivado.');
    }
}
