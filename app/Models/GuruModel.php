<?php

namespace App\Models;

use CodeIgniter\Model;

class GuruModel extends Model
{
    protected $table      = 'guru';
    protected $primaryKey = 'id_guru';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['nama'];
}