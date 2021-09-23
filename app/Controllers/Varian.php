<?php

namespace App\Controllers;
use App\Models\Varian_model;
use phpDocumentor\Reflection\Types\Integer;

class Varian extends BaseController
{
	public function __construct()
    {
        session();

    }

	public function index()
	{

		$varianmodel = new Varian_model();

		$varian = $varianmodel->findAll();
        $data =[
            'judul'=> 'Data Varian',
			'varian'=> $varian,
			'validation' => \Config\Services::validation()
        ];
		return view('Varian',$data);
	}

	public function TambahVarian(){
		$varianmodel = new Varian_model();
		if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'nama varian harus diisi'
				]
				],
				'harga' => [
					'rules' => 'required',
					'errors' => [
						'required' => 'Harga varian harus diisi'
					]
				]
					
        ])) {
            session()->setFlashdata('error_tambah_varian', true);
            return redirect()->to('/Varian')->withInput();
        } else {
            $nama = $this->request->getPost('nama');
			$harga = $this->request->getPost('harga');
            $data = [
                'nm_varian' => $nama,
				'harga'=> $harga
            ];
            $tambahvarian = $varianmodel->save($data);
            if ($tambahvarian) {
                session()->setFlashdata('berhasil', 'data varian berhasil ditambah');
                return redirect()->to('/Varian');
            }
		}
	}


	public function HapusVarian(){

		$id_varian = $this->request->getPost('id_varian');

		$modelvarian = new Varian_model();
		$hapus = $modelvarian->delete($id_varian);
        if ($hapus) {
            session()->setFlashdata('berhasil', 'Data Varian berhasil dihapus');
            return redirect()->to('/Varian');
        }
		
	}


	public function UbahVarian(){

		$varianmodel = new Varian_model();
		$id = $this->request->getPost('id_varian_edit');
		$nama = $this->request->getPost('nama_varian_edit');
		$harga = $this->request->getPost('harga_varian_edit');
		if (!$this->validate([
            'nama_varian_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'nama varian harus diisi'
				]
				],
				'harga_varian_edit' => [
					'rules' => 'required',
					'errors' => [
						'required' => 'Harga varian harus diisi'
					]
				]
        ])) {
            session()->setFlashdata('error_ubah_varian', 'Data Varian <strong>'.$nama.'</strong> Gagal Diubah');
            return redirect()->to('/Varian')->withInput();
        } else {
			
			$data = [
				'nm_varian' => $nama,
				'harga'=> $harga
			];
            $ubahvarian = $varianmodel->UbahVarian($id,$data);
            if ($ubahvarian) {
                session()->setFlashdata('berhasil', 'Data Varian <strong>'.$nama.'</strong> Gagal Diubah');
                return redirect()->to('/Varian');
            }
        }


		
	}
}