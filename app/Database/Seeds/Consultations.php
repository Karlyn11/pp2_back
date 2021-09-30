<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Consultations extends Seeder
{
	public function run()
	{
        for ($i=1;$i<10;$i++){
            $data = [
                'user_id' => $i,
                'date_id' => $i,
                'start_hour_id' => $i%12,
                'end_hour_id' => ($i+1)%12,
                'type_id' => $i,
            ];




            $this->db->table('consultas')->insert($data);
        }
	}
}
