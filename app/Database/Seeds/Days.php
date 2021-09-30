<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Days extends Seeder
{
	public function run()
	{

        for ($i=0;$i<100;$i++){
        $date=date('Y-m-d', strtotime('+'.$i.' day'));
            setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
            $data = [
                'date' => $date,
                'day'    => date('d',strtotime($date)),
                'weekday'    =>  strftime("%A",strtotime($date)),
                'month' => date('m',strtotime($date)),
                'monthname' =>  strftime("%B",strtotime($date)),

                'year'    => date('Y',strtotime($date))

            ];


            $this->db->table('days')->insert($data);
        }
	}
}
