<?php

namespace App\Models;

use CodeIgniter\Database\MySQLi\Builder;
use CodeIgniter\Model;

class Pelanggan_model extends Model

{
    protected $table      = 'pelanggan';
    protected $primaryKey = 'kd_pelanggan';

    // protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    // allowedfields adalah field mana saja yg boleh diisi secara manual
    protected $allowedFields = ['nm_pelanggan','id_jenis','telepon'];

    protected $useTimestamps = false;
    


   
    public function UbahPelanggan($kd_pelanggan, $data)

    {

        
        return $this->db->table($this->table)->update($data, ['kd_pelanggan' => $kd_pelanggan]);
    }

    // public function getPelanggan($kd_pelanggan){
      
    // $builder = $this->Select('nm_pelanggan','kd_pelanggan','jenis');
    //  $builder = $this->where('kd_pelanggan',$kd_pelanggan);
    // $builder= $this->first();
    // return $builder;
        
       


    // }
    public function getPelanggan($kd_pelanggan = null){

        $this->db->table('pelanggan');
            $this->join('jenis_pelanggan', 'jenis_pelanggan.id_jenis = pelanggan.id_jenis');
            $this->select('pelanggan.*');
            $this->select('jenis_pelanggan.*');
            if($kd_pelanggan){
                $this->where('kd_pelanggan',$kd_pelanggan);
                return $this->first();
            }else{
                return $this->findAll();
            }

           
    }




    
}