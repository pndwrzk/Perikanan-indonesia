<?php

namespace App\Controllers;
use App\Models\Pelanggan_model;
use App\Models\Varian_model;
use App\Models\Nota_model;
use App\Models\Detail_Nota_Model;

class Transaksi extends BaseController
{
	public function index()
	{
    session()->destroy();
    $modelpelanggan = new Pelanggan_model();
    $modelvarian = new varian_model();
    $varian = $modelvarian->findAll();
    $pelanggan = $modelpelanggan->getPelanggan();
		$data =[
			'judul'=> 'Transaksi',
            'pelanggan'=> $pelanggan,
            'varian'=> $varian,
            'validation' => \Config\Services::validation()
		];
		return view('Transaksi',$data);
	}

  public function Checkout(){
$session = session();
  $modelpelanggan = new Pelanggan_model();
          if (!$this->validate([
            'pelanggan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Silahkan pilih pelanggan'
        ]
        ],
        'tanggal' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Tanggal perlu diisi'
          ]
                    ],'menu' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Silahkan pilih menu terlebih dahulu'
                        ]
                    ]
          
        ])) {
            return redirect()->to('/Transaksi')->withInput();
        } else{
            $kd_pelanggan = $this->request->getPost('pelanggan');
            $pelanggan = $modelpelanggan->getPelanggan($kd_pelanggan);
            $tanggal = $this->request->getPost('tanggal');
            $menu = $this->request->getPost('menu');
            $menu_varian = $this->varian($menu);


        
            $menu_varian = $this->varian($menu);
            $sess_data = [
              'menu'=> $menu_varian,
              'pelanggan'=> $pelanggan,
              'tanggal'=> $tanggal
            ];
            $session->set($sess_data);
            

            $data =[
            
              'judul'=> 'Checkout'
            ];

            return view('Checkout',$data);
          }
  
}


public function Nota(){

  $qty = $this->request->getPost('qty');
 
 
  $pelanggan = session()->get('pelanggan');
  $menu = session()->get('menu');

session()->set(['qty'=> $qty]);
  $Grandtotal = $this->HitungGrandTotal($menu,$qty,$pelanggan);

 $data =[
  'judul'=> 'Nota',
  'Grandtotal'=> $Grandtotal,
  'qty'=> $qty
];

return view('Nota',$data);

}

public function SelesaiTransaksi(){

  $d_nota = new Detail_Nota_Model();
$notamodel = new Nota_model();
  $qty = session()->get('qty');
  $tanggal = session()->get('tanggal');

  $menu= session()->get('menu');


  $pelanggan = session()->get('pelanggan');
  $cetak = $this->request->getPost('kwitansi');
  $nota =  $notamodel->get_kd_nota();
  if($nota->kd_nota){
    $no_nota = $nota->kd_nota + 1;
  }else{
    $no_nota = 1;
  }

  

  for( $i=0; $i <count($menu) ; $i++ ){

    $datadetailnota = [
      'kd_nota'=> $no_nota,
      'id_varian'=> $menu[$i]['id_varian'],
      'jumlah'=> $qty[$i]
    ];

    $savedetailnota = $d_nota->save($datadetailnota);
  }
  if($savedetailnota){

    $datanota =[
      'kd_nota'=> $no_nota,
      'kd_pelanggan'=> $pelanggan['kd_pelanggan'],
      'tgl_nota'=> $tanggal
    ];
    $savenota = $notamodel->save($datanota);
  }

  if($savenota){
$grandtotal = $this->HitungGrandTotal( $menu ,$qty ,$pelanggan);
    if($cetak == 1){
    $data =[
      'kd_nota'=> $no_nota,
      'menu'=> $menu,
      'tanggal'=> $tanggal,
      'qty'=> $qty ,
      'pelanggan'=>$pelanggan,
      'grandtotal'=>$grandtotal
    ] ;
    session()->destroy();
    return view('Nota_Cetak',$data);

    }else if($cetak == 0 ){
      session()->setFlashdata('berhasil-transaksi', 'Transaksi Telah Selesai');
      return redirect()->to('/Transaksi');
    }
  }




}
  


protected function varian($menu){
  $modelvarian = new Varian_model();
  $menu_varian =[];
  foreach($menu as $m){  
    $varian = $modelvarian->find($m);
   array_push($menu_varian,$varian);
  }

  return $menu_varian;

  
}

protected function HitungGrandTotal( $menu ,$qty ,$pelanggan){

  
  $total = 0;
  for( $i=0; $i <count($menu) ; $i++ ){

  $total += ($qty[$i]* $menu[$i]['harga']);
 }


 $ppn = ($pelanggan['ppn']/100) * $total;
 $Grandtotal = $total + $ppn;
 return $Grandtotal;

}
}