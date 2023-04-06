<?php

namespace App\Controllers;

use App\Models\SiswaModel;
use App\Models\KelasModel;

class Siswa extends BaseController
{
    public function siswa()
    {
        $siswa = new SiswaModel();
        $kelas = new KelasModel();
        $data['siswa'] = $siswa->findAll();
        $data['kelas'] = $kelas->findAll();
        return view('admin/siswa', $data);
    }

    public function create()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nisn' => 'required|is_unique[siswa.nisn]',
            'nama' => 'required',
            'kelas' => 'required',
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $siswa = new SiswaModel();
            $siswa->insert([
                'nisn' => $this->request->getPost('nisn'),
                'nama' => $this->request->getPost('nama'),
                'kelas' => $this->request->getPost('kelas'),
            ]);
            return redirect('admin/siswa');
        }
    }

    public function delete($id)
    {
        $siswa = new SiswaModel();
        $siswa->delete($id);
        return redirect('admin/siswa');
    }
}
