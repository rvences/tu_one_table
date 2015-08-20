<?php

//use yii\db\Schema;
use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),

            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        // Crea los usuarios que se pueden loguear en el sistema
        $this->batchInsert('user',
            array('username', 'auth_key', 'password_hash', 'email', 'status', 'created_at', 'updated_at'),
            array(
                ['jcasturiano',  'RjwwBJFBEWPsRsj9oCcgivVErTFegjfm', '$2y$13$qCG9wSmSRq6C0FEMdU9pbeZWfYkwkXrSVG3boHf5Nv3dsbI4km9My', 'kvences@gmail.com', '10', '1438127540', '1438127540'  ],
                ['mmedina', 'RjwwBJFBEWPsRsj9oCcgivVErTFegjfm', '$2y$13$qCG9wSmSRq6C0FEMdU9pbeZWfYkwkXrSVG3boHf5Nv3dsbI4km9My', 'rafael.vences@gmail.com', '10', '1438127540', '1438127540'  ]
            )
        );
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
