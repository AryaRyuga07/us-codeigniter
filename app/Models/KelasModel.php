<?php

namespace App\Models;

use CodeIgniter\Model;

class kelasModel extends Model
{
    protected $table      = 'kelas';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['kelas'];
}