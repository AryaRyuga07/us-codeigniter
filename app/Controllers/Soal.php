<?php

namespace App\Controllers;

use App\Models\MapelModel;
use App\Models\SoalModel;

class Soal extends BaseController
{
    public function soal()
    {
        $soal = new SoalModel();
        $mapel = new MapelModel();
        $data['soal'] = $soal->getSoal();
        $data['mapel'] = $mapel->findAll();
        return view('admin/soal', $data);
    }

    public function create()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'waktu' => 'required'
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        if ($isDataValid) {
            $soal = new SoalModel();
            $soal->insert([
                'id_mapel' => $this->request->getPost('mapel'),
                'waktu' => $this->request->getPost('waktu'),
                'jadwal_start' => $this->request->getPost('jadwal-start'),
                'jadwal_stop' => $this->request->getPost('jadwal-stop')
            ]);
            return redirect('admin/soal');
        }
    }

    public function delete($id)
    {
        $soal = new SoalModel();
        $soal->delete($id);
        return redirect('admin/soal');
    }
}
