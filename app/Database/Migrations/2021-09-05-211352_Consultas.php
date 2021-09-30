<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Consultas extends Migration
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
            'user_id'       => [
                'type'       => 'INT',
                'constraint'     => 5,
                'unsigned'   => true,
            ],
            'date_id' => [
                'type' => 'INT',
                'constraint'     => 5,
                'unsigned'   => true,
            ],

            'start_hour_id' => [
                'type' => 'INT',
                'constraint'     => 5,
                'unsigned'   => true,
            ],

            'end_hour_id' => [
                'type' => 'INT',
                'constraint'     => 5,
                'unsigned'   => true,
            ],
            'type_id' => [
                'type' => 'INT',
                'constraint'     => 5,
                'unsigned'   => true,
            ],

        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id','users','id','CASCADE','CASCADE');

        $this->forge->addForeignKey('start_hour_id','hours','id');
        $this->forge->addForeignKey('end_hour_id','hours','id');

        $this->forge->addForeignKey('date_id','days','id');
        $this->forge->addForeignKey('type_id','types','id');
        $this->forge->createTable('Consultas');
    }

    public function down()
    {
        $this->forge->dropTable('Consultas');
    }
}