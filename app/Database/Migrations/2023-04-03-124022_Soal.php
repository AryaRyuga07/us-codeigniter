<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Soal extends Migration
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
            'id_mapel' => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
            'waktu' => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP'
        ]);
        $this->forge->addKey('id_soal', true);
        // $this->forge->addForeignKey('id_mapel', 'mapel');
        $this->forge->createTable('soal');
    }
    
    public function down()
    {
        $this->forge->dropTable('soal');
    }
}
