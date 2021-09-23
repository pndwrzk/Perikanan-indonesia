<?php

namespace App\Models;

use CodeIgniter\Database\MySQLi\Builder;
use CodeIgniter\Model;

class Varian_model extends Model

{
    protected $table      = 'varian';
    protected $primaryKey = 'id_varian';

    // protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    // allowedfields adalah field mana saja yg boleh diisi secara manual
    protected $allowedFields = ['nm_varian','harga'];

    protected $useTimestamps = false;
    


   
    public function UbahVarian($id, $data)

    {

        
        return $this->db->table($this->table)->update($data, ['id_varian' => $id]);
    }



    
}