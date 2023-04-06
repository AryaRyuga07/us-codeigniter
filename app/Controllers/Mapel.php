<?php

namespace App\Controllers;

use App\Models\GuruModel;
use App\Models\MapelModel;

class Mapel extends BaseController
{
    public function mapel()
    {
        $model = new MapelModel();
        $guru = new GuruModel();
        $data['mapel'] = $model->getMapel();
        $data['guru'] = $guru->findAll();
        return view('admin/mapel', $data);
    }

    public function create()
    {
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'mapel' => 'required'
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        // jika data valid, simpan ke database
        if($isDataValid){
            $jurusan = new MapelModel();
            $jurusan->insert([
                "id_guru" => $this->request->getPost('guru'),
                "mapel" => $this->request->getPost('mapel')
            ]);
            return redirect('admin/mapel');
        }
    }

    public function delete($id)
    {
        $mapel = new MapelModel();
        $mapel->delete($id);
        return view('admin/mapel');
    }
}
