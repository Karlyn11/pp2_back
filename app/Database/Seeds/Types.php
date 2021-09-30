<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Types extends Seeder
{
    public function run()
    {
        for ($i=1;$i<10;$i++){
            $data = [
                'consulta_nombre' => "Consulta ".$i,

            ];




            $this->db->table('Types')->insert($data);
        }
    }
}