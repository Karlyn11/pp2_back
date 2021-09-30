<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Days extends Migration
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
            'date'       => [
                'type'       => 'date',

            ],
            'day' => [
                'type' => 'int',

            ],
            'weekday' => [
                'type' => 'text',

            ],
            'month' => [
                'type' => 'int',

            ],
            'monthname' => [
                'type' => 'text',

            ],
            'year' => [
                'type' => 'int',

            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('Days');
    }

    public function down()
    {
        $this->forge->dropTable('Days');
    }
}
