<?php

namespace App\Controllers;
use App\Models\Pelanggan_model;
use phpDocumentor\Reflection\Types\Integer;

class Pelanggan extends BaseController
{
	public function __construct()
    {
        session();
    }

	public function index()
	{

		$Pelangganmodel = new Pelanggan_model();

		$Pelanggan = $Pelangganmodel->getPelanggan();
     
        $data =[
            'judul'=> 'Data Pelanggan',
			'pelanggan'=> $Pelanggan,
			'validation' => \Config\Services::validation()
        ];
		return view('Pelanggan',$data);
	
    }

    public function TambahPelanggan(){

        $pelangganmodel = new Pelanggan_model();
		if (!$this->validate([
            'nm_pelanggan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'nama pelanggan harus diisi'
				]
				],
				'jenis' => [
					'rules' => 'required',
					'errors' => [
						'required' => 'jenis pelanggan harus diisi'
					]
                    ],'telepon' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Telepon Pelanggan harus diisi'
                        ]
                        ]
					
        ])) {
            session()->setFlashdata('error_tambah_pelanggan', true);
            return redirect()->to('/Pelanggan')->withInput();
        } else {
            $nm_pelanggan = $this->request->getPost('nm_pelanggan');
			$jenis = $this->request->getPost('jenis');
            $telepon = $this->request->getPost('telepon');
            $menu = $this->request->getPost('menu');
            $data = [
                'nm_pelanggan' => $nm_pelanggan,
				'id_jenis'=> $jenis,
                'telepon'=> $telepon,
            ];
            $tambahpelanggan = $pelangganmodel->save($data);
            if ($tambahpelanggan) {

                if($menu == 1){
                    session()->setFlashdata('berhasil', 'data Pelanggan berhasil ditambah');
                    return redirect()->to('/Pelanggan');
                }else if($menu == 2){
                    session()->setFlashdata('berhasil', 'data Pelanggan berhasil ditambah');
                    return redirect()->to('/Transaksi');
                }
               
            }
		}
    }


    public function UbahPelanggan(){

        $pelangganmodel = new Pelanggan_model();
        $kd_pelanggan = $this->request->getPost('kd_pelanggan_edit');
        $nm_pelanggan = $this->request->getPost('nm_pelanggan_edit');
        $jenis = $this->request->getPost('jenis_edit');
      
         $telepon = $this->request->getPost('telepon_edit');
		if (!$this->validate([
            'nm_pelanggan_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'nama harus harus diisi'
				]
				],
				'jenis_edit' => [
					'rules' => 'required',
					'errors' => [
						'required' => 'jenis pelanggan harus diisi'
					]
                    ],'telepon_edit' => [
                        'rules' => 'required|integer',
                        'errors' => [
                            'required' => 'Telepon Pelanggan harus diisi',
                            'integer' => 'Telepon Pelanggan harus angka',
                        ]
                    ]
					
        ])) {
            session()->setFlashdata('error_ubah_pelanggan', 'Data Pelanggan <strong>'.$nm_pelanggan.'</strong> Gagal Diubah');
            return redirect()->to('/Pelanggan')->withInput();
        } else {
           
            $data = [
                'nm_pelanggan' => $nm_pelanggan,
				'id_jenis'=> $jenis,
                'telepon'=> $telepon,
            ];
            $ubahpelanggan = $pelangganmodel->UbahPelanggan($kd_pelanggan,$data);
            if ($ubahpelanggan) {
                session()->setFlashdata('berhasil', 'Data Pelanggan <strong>'.$nm_pelanggan.'</strong> Berhasil Diubah');
                return redirect()->to('/Pelanggan');
            }
		}

       
    }

    public function HapusPelanggan(){
		$kd_pelanggan = $this->request->getPost('kd_pelanggan');
		$modelpelanggan = new Pelanggan_model();
		$hapus = $modelpelanggan->delete($kd_pelanggan);
        if ($hapus) {
            session()->setFlashdata('berhasil', 'Data Pelanggan berhasil dihapus');
            return redirect()->to('/Pelanggan');
        }
		
	}
}