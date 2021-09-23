<?php

namespace App\Models;

use CodeIgniter\Database\MySQLi\Builder;
use CodeIgniter\Model;

class Nota_model extends Model

{
    protected $table      = 'nota';


    // protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    // allowedfields adalah field mana saja yg boleh diisi secara manual
    protected $allowedFields = ['kd_nota','kd_pelanggan','tgl_nota'];

    protected $useTimestamps = false;
    


   
    public function UbahPelanggan($kd_pelanggan, $data)

    {

        
        return $this->db->table($this->table)->update($data, ['kd_pelanggan' => $kd_pelanggan]);
    }

    public function getPelanggan($kd_pelanggan){
      
    $builder = $this->Select('nm_pelanggan','kd_pelanggan');
     $builder = $this->where('kd_pelanggan',$kd_pelanggan);
    $builder= $this->first();
    return $builder;
        
       


    }

    public function get_kd_nota()
    {
        $query = $this->db->query("SELECT MAX(kd_nota) as kd_nota from nota");
        return $query->getRow();
    }

    public function getDetailNota(){

        $this->db->table('nota');
        $this->join('pelanggan', 'pelanggan.kd_pelanggan = nota.kd_pelanggan');
        $this->join('jenis_pelanggan', 'jenis_pelanggan.id_jenis = pelanggan.id_jenis');
        $this->select('nota.*');
        $this->select('jenis_pelanggan.*');
        $this->select('pelanggan.nm_pelanggan');
        return $this->findAll();
    }

    public function Laporan_pemesanan($awal = null ,$akhir = null){
        $query = $this->db->query("SELECT nota.tgl_nota, varian.nm_varian,varian.harga  ,SUM(detail_nota.jumlah) as jumlah ,(SUM(detail_nota.jumlah) * varian.harga) AS total_harga FROM detail_nota INNER JOIN nota ON detail_nota.kd_nota = nota.kd_nota INNER JOIN varian ON detail_nota.id_varian = varian.id_varian GROUP BY detail_nota.id_varian");
        if($awal && $akhir){
            $this->where('nota.tgl_nota >=', $awal);
            $this->where('nota.tgl_nota <=', $akhir);
        }
        return $query->getResultArray();
    }

    public function laporan_varian($awal = null ,$akhir = null){
        $query = $this->db->query("SELECT varian.nm_varian ,SUM(detail_nota.jumlah) as jumlah FROM detail_nota INNER JOIN nota ON detail_nota.kd_nota = nota.kd_nota INNER JOIN varian ON detail_nota.id_varian = varian.id_varian GROUP BY varian.id_varian");
        if($awal && $akhir){
            $this->where('nota.tgl_nota >=', $awal);
            $this->where('nota.tgl_nota <=', $akhir);
        }
        return $query->getResultArray();
    }

    public function varian(){
        $query = $this->db->query("SELECT varian.nm_varian ,SUM(detail_nota.jumlah) as jumlah FROM detail_nota INNER JOIN nota ON detail_nota.kd_nota = nota.kd_nota INNER JOIN varian ON detail_nota.id_varian = varian.id_varian GROUP BY varian.id_varian");
       
          
            $this->where('nota.tgl_nota <=', date('m'));
        
        return $query->getResultArray();
    }


    public function pendapatan($awal = null ,$akhir = null){

        $query = $this->db->query("SELECT nota.tgl_nota ,SUM(varian.harga * detail_nota.jumlah) as jumlah FROM detail_nota INNER JOIN nota ON detail_nota.kd_nota = nota.kd_nota INNER JOIN varian ON detail_nota.id_varian = varian.id_varian GROUP BY nota.tgl_nota");
        if($awal && $akhir){
            $this->where('nota.tgl_nota >=', $awal);
            $this->where('nota.tgl_nota <=', $akhir);
        }
        return $query->getResultArray();
        
    }



    
}