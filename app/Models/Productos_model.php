<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\Productos_model;


class Productos_model extends Model
{
    protected $table            = 'productos';
    protected $primaryKey       = 'id_producto';
    protected $allowedFields    = ['nombre', 'descripcion', 'precio', 'talle', 'foto', 'baja'];
}
