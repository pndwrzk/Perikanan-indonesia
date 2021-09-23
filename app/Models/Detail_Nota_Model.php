<?php

namespace App\Models;

use CodeIgniter\Database\MySQLi\Builder;
use CodeIgniter\Model;

class Detail_Nota_Model extends Model

{
    protected $table      = 'detail_nota';
    protected $primaryKey = 'id_detail_nota';

    // protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    // allowedfields adalah field mana saja yg boleh diisi secara manual
    protected $allowedFields = ['kd_nota','id_varian','jumlah'];

    protected $useTimestamps = false;
    


public function getDetailNota($kd_nota = null){

             $this->db->table('detail_nota');
            $this->join('varian', 'varian.id_varian = detail_nota.id_varian');
            $this->select('detail_nota.*');
            $this->select('varian.*');
            if($kd_nota){
                $this->where('kd_nota',$kd_nota);
                return $this->findAll();
            }else{
                return $this->findAll();
            }
    
}
}