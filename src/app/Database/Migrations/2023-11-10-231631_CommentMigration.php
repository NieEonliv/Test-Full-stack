<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CommentMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 3,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'text' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'date' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'created_at' => [
                'type' => 'DATE',
                'null' => false,
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('comments');
    }

    public function down()
    {
        $this->forge->dropTable('comments');
    }
}
