<?php

namespace App\Models;

use CodeIgniter\Model;

class MapelModel extends Model
{
    protected $table      = 'mapel';
    protected $primaryKey = 'id_mapel';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_guru', 'mapel'];

    public function getMapel()
    {
         return $this->db->table('mapel')
         ->join('guru','guru.id_guru=mapel.id_guru')
         ->get()->getResultArray();  
    }
}