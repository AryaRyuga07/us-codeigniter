<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Mapel extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_mapel' => [
                'type'       => 'INT',
                'constraint' => '11',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_guru' => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
            'mapel' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP'
        ]);
        $this->forge->addKey('id_mapel', true);
        // $this->forge->addForeignKey('id_guru', 'guru');
        $this->forge->createTable('mapel');
    }

    public function down()
    {
        $this->forge->dropTable('mapel');
    }
}
