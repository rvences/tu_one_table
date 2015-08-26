<?php

use yii\db\Schema;
use yii\db\Migration;

class m150826_014839_contactos extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%contactos_ip}}', [
            // Toda la información de los contactos NO se liga a nada
            'idcontacto' => Schema::TYPE_PK,
            'cuentas_ip_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'puesto' => Schema::TYPE_STRING . '(50) NOT NULL',
            'nombre' =>  Schema::TYPE_STRING . '(100) NOT NULL',
            'telefono' => Schema::TYPE_STRING . '(15) ',
            'correo' => Schema::TYPE_STRING . '(100) ',
            'UNIQUE KEY (nombre, telefono)',
        ], $tableOptions);

        $this->addForeignKey('fk_emprea1_id', 'contactos_ip', 'cuentas_ip_id', 'cuentas_ip', 'id', 'RESTRICT', 'RESTRICT');

        // Inserta algunos Clientes
        $this->batchInsert('contactos_ip',
            array('cuentas_ip_id', 'puesto', 'nombre', 'telefono', 'correo'),
            array(
                [1, 'Director de Comunicación Institucional', 'Lic. Dante Pinal Ibarra', ' 5265-7404', 'dante.pinal@fonacot.gob.mx'],
                [1, 'Coordinador de Administracion y Finanzas', 'Javier Gilberto Dennis Valenzuwla', '53424966, Nextel 46001898', 'copredsaf@hotmail.com'],
                [2, 'Subdirector de Comunicación Social', 'Mtro. Luis Miguel Aldama Martínez', '55 73 24 63 cel: 5585 810426', 'aldama.luis@gmail.com'],
            )
        );

    }

    public function down()
    {
        echo "m150826_014839_contactos cannot be reverted.\n";
        $this->dropTable(contactos_ip);
        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
