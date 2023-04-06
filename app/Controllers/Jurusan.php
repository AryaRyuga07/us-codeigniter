<?php

namespace App\Controllers;

use App\Models\JurusanModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Jurusan extends BaseController
{
    public function jurusan()
    {
        $jurusan = new JurusanModel();
        $data['jurusan'] = $jurusan->findAll();
        echo view('admin/jurusan', $data);
    }

    public function create()
    {
        // lakukan validasi
        $validation =  \Config\Services::validation();
        $validation->setRules(['jurusan' => 'required|is_unique[jurusan.jurusan]']);
        $isDataValid = $validation->withRequest($this->request)->run();
        // jika data valid, simpan ke database
        if($isDataValid){
            $jurusan = new JurusanModel();
            $jurusan->insert([
                "jurusan" => $this->request->getPost('jurusan')
            ]);
            return redirect('admin/jurusan');
        }
    }

    public function edit()
    {
        // ambil artikel yang akan diedit
        $jurusan = new JurusanModel();
        $id = $this->request->getPost('id');
        $data['jurusan'] = $jurusan->where('id', $id)->first();
        
        // lakukan validasi data artikel
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'jurusan' => 'required|is_unique[jurusan.jurusan]'
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        // jika data vlid, maka simpan ke database
        if($isDataValid){
            $jurusan->update($id, [
                "jurusan" => $this->request->getPost('jurusan')
            ]);
            return redirect('admin/jurusan');
        }
    }

    //--------------------------------------------------------------------------

	public function delete(){
        $jurusan = new JurusanModel();
        $id = $this->request->getPost('id');
        $jurusan->delete($id);
        return redirect('admin/jurusan');
    }

    public function getubah()
    {
        $jurusan = new JurusanModel();
        $id = $this->request->getPost('id');
        $findJurusan = $jurusan->where('id', $id)->first();
        echo json_encode($findJurusan);
    }
}
