<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Hours extends Migration
{

    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'time'       => [
                'type'       => 'double',

            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('Hours');
    }

    public function down()
    {
        $this->forge->dropTable('Hours');
    }
}
