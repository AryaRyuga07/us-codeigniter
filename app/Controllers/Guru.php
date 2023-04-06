<?php

namespace App\Controllers;

use App\Models\GuruModel;

class Guru extends BaseController
{
    public function guru()
    {
        $guru = new GuruModel();
        $data['guru'] = $guru->findAll();
        return view('admin/guru', $data);
    }

    public function create()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama' => 'required'
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();

        if($isDataValid){
            $guru = new GuruModel();
            $guru->insert([
                'nama' => $this->request->getPost('nama')
            ]);
            return redirect('admin/guru');
        }
    }

    public function delete($id)
    {
        $guru = new GuruModel();
        $guru->delete($id);
        return redirect('admin/guru');
    }
}
