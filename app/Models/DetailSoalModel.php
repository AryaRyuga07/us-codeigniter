<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailSoalModel extends Model
{
    protected $table      = 'detail_soal';

    protected $allowedFields = ['id_soal', 'soal', 'a', 'b', 'c', 'd', 'jawaban'];

    public function getSoal()
    {
        return $this->db->table('detail_soal')
         ->join('soal','soal.id_soal=detail_soal.id_soal')
         ->join('mapel','mapel.id_mapel=soal.id_mapel')
         ->get()->getResultArray();  
    }
}