<?php

namespace App\Controllers;

use App\Models\kelasModel;

class Kelas extends BaseController
{
    public function kelas()
    {
        $kelas = new KelasModel();
        $data['kelas'] = $kelas->findAll();
        echo view('admin/kelas', $data);
    }

    public function create(){
        $validation = \Config\Services::validation();
        $validation->setRules
        ([
            'kelas' => 'required',
            'jurusan' => 'required',
            'urutan' => 'required'
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $kelas = new KelasModel();
            $kelas->insert([
                'kelas' => $this->request->getPost('kelas') . ' ' . $this->request->getPost('jurusan') . ' ' . $this->request->getPost('urutan')
            ]);
            return redirect('admin/kelas');
        }
    }

    public function delete($id){
        $kelas = new KelasModel();
        $kelas->delete($id);
        return redirect('admin/kelas');
    }
}
