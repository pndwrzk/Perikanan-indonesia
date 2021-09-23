<?php

namespace App\Controllers;

use App\Models\Detail_Nota_Model;
use App\Models\Nota_model;

class Laporan extends BaseController
{
	public function index()
	{

		$data =[
			'judul'=> 'Data Laporan',
			'validation' => \Config\Services::validation()
		];
		return view('Laporan',$data);
	}


	public function Pemesanan(){

		$modelnota = new Nota_model();
        $nota = $modelnota->getDetailNota();
        

        $data=[
            'judul'=> 'Laporan Pemesanan',
			'penjualan' => $nota,
			'validation' => \Config\Services::validation()
        ];
		return view('Laporan_pemesanan',$data);
	}

	public function detailpemesanan(){

		if ($this->request->isAJAX()) {

$kd_nota = $this->request->getPost('kd_nota');
$modeldetailnota = new Detail_Nota_Model();
$detail = $modeldetailnota->getDetailNota($kd_nota);

$data = [
	'detail'=> $detail
];

return $this->response->setJSON($data);

		}
	}

	public function CetakPemesanan(){
		$awal = $this->request->getPost('tanggalmulai');
		$akhir = $this->request->getPost('tanggalakhir');

		if($awal && $akhir){
			$modelnota = new Nota_model();
			$laporanpemesanan = $modelnota->Laporan_pemesanan($awal,$akhir);
			
			$data =[
				'pemesanan'=> $laporanpemesanan,
				'awal'=> $awal,
				'akhir'=> $akhir,
				'judul'=> 'Laporan Pemesanan'
			];

			return view('Cetak_LaporanPemesanan',$data);
		}else{
			session()->setFlashdata('gagal', 'Silahkan Mengisi Periode tanggal terlebih dahulu');
			return redirect()->to('/Laporan/pemesanan');
		}
		
	}

	public function Varian(){
		$modelnota = new Nota_model();
		$laporanvarian = $modelnota->varian();

        $data=[
            'judul'=> 'Laporan Penjualan Varian',
			'varian'=> $laporanvarian,
			'validation' => \Config\Services::validation()
			
        ];
		return view('Laporan_Varian',$data);
		
	}

	public function CetakVarian(){
		$awal = $this->request->getPost('tanggalmulai');
		$akhir = $this->request->getPost('tanggalakhir');

		if($awal && $akhir){
			$modelnota = new Nota_model();
			$laporanvarian = $modelnota->laporan_varian($awal,$akhir);
			
			$data =[
				'varian'=> $laporanvarian,
				'awal'=> $awal,
				'akhir'=> $akhir,
				'judul'=> 'Laporan Varian'
			];

			return view('Cetak_LaporanVarian',$data);
		}else{
			session()->setFlashdata('gagal', 'Silahkan Mengisi Periode tanggal terlebih dahulu');
			return redirect()->to('/Laporan/Varian');
		}
		
	}

	public function Pendapatan(){

		$modelnota = new Nota_model();
        $pendapatan = $modelnota->pendapatan();
        

        $data=[
            'judul'=> 'Laporan Pendapatan',
			'pendapatan' => $pendapatan,
			'validation' => \Config\Services::validation()
        ];

		return view('Laporan_pendapatan',$data);
	}


	public function CetakPendapatan(){
		$awal = $this->request->getPost('tanggalmulai');
		$akhir = $this->request->getPost('tanggalakhir');

		if($awal && $akhir){
			$modelnota = new Nota_model();
			$Laporan_pendapatan = $modelnota->pendapatan($awal,$akhir);
			
			$data =[
				'pendapatan'=> $Laporan_pendapatan,
				'awal'=> $awal,
				'akhir'=> $akhir,
				'judul'=> 'Laporan Pendapatan'
			];

			return view('Cetak_LaporanPendapatan',$data);
		}else{
			session()->setFlashdata('gagal', 'Silahkan Mengisi Periode tanggal terlebih dahulu');
			return redirect()->to('/Laporan/Pendapatan');
		}
		
	}
}