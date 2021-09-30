<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Hours extends Seeder
{
    public function run()
    {
        for ($i=8;$i<18;$i++){
            $data = [
                'time' => $i,

            ];


            $this->db->table('hours')->insert($data);
            $data = [
                'time' => $i+0.5
            ];


            $this->db->table('hours')->insert($data);
        }


    }
}
