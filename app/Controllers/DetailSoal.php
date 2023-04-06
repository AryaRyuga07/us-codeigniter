<?php

namespace App\Controllers;

use App\Models\DetailSoalModel;
use App\Models\SoalModel;

class DetailSoal extends BaseController
{
    public function soal()
    {
        $detail = new DetailSoalModel();
        $soal = new SoalModel();
        $data['detail'] = $detail->getSoal();
        $data['soal'] = $soal->findAll();
        return view('admin/detail-soal', $data);
    }

    public function create()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'soal' => 'required',
            'a' => 'required',
            'b' => 'required',
            'c' => 'required',
            'd' => 'required',
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        if ($isDataValid) {
            $detail = new DetailSoalModel();
            $detail->insert([
                'id_soal' => $this->request->getPost('id_soal'),
                'soal' => $this->request->getPost('soal'),
                'a' => $this->request->getPost('a'),
                'b' => $this->request->getPost('b'),
                'c' => $this->request->getPost('c'),
                'd' => $this->request->getPost('d'),
                'jawaban' => $this->request->getPost('jawaban')
            ]);
            return redirect('admin/detail-soal');
        }
    }

    public function delete($id)
    {
        $detail = new DetailSoalModel();
        $detail->delete($id);
        return redirect('admin/detail-soal');
    }
}
