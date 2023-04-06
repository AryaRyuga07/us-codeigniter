<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DetailSoal extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_soal' => [
                'type'       => 'INT',
                'constraint' => '11',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'soal' => [
                'type'       => 'TEXT',
            ],
            'a' => [
                'type'       => 'varchar',
                'constraint' => '255',
            ],
            'b' => [
                'type'       => 'varchar',
                'constraint' => '255',
            ],
            'c' => [
                'type'       => 'varchar',
                'constraint' => '255',
            ],
            'd' => [
                'type'       => 'varchar',
                'constraint' => '255',
            ],
            'jawaban' => [
                'type'       => 'char',
                'constraint' => '1',
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP'
        ]);
        $this->forge->addKey('id_soal', false);
        $this->forge->createTable('detail_soal', true);
    }
    
    public function down()
    {
        $this->forge->dropTable('detail_soal');
    }
}
