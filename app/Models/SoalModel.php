<?php

namespace App\Models;

use CodeIgniter\Model;

class SoalModel extends Model
{
    protected $table      = 'soal';
    protected $primaryKey = 'id_soal';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_mapel', 'waktu'];

    public function getSoal()
    {
         return $this->db->table('soal')
         ->join('mapel','mapel.id_mapel=soal.id_mapel')
         ->get()->getResultArray();  
    }
}