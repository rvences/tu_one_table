<?php
// ./yii migrate/create base_tipo_excel
//use yii\db\Schema;
use yii\db\Migration;

class m150818_201606_base_tipo_excel_ip extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        // show create table cuentas;

        $this->createTable('{{%cuentas_ip}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull() . " COMMENT  'Gerente '",
            'status' => $this->string(20)->notNull() . " COMMENT 'Status '",
            'cuenta' => $this->string(100)->notNull() . " COMMENT 'Cuenta'",
            'categoria' => $this->string(100),
            'subcuenta' => $this->string(100) . " COMMENT 'Subcuenta'",
            'campana' => $this->string(100) . " COMMENT 'Campaña'",
            'sector' => $this->string(100) . " COMMENT 'Sector'",
            'puesto' => $this->string(100) . " COMMENT 'Puesto'",
            'nombre' => $this->string(100)->notNull() . " COMMENT 'Nombre'",
            'tel' => $this->string(100)->notNull() . " COMMENT 'Teléfono'",
            'mail' => $this->string(100) . " COMMENT 'Correo Electrónico'",
            'direccion' => $this->string(100) . " COMMENT 'Dirección de oficinas'",
            'freunion' =>$this->date() . " COMMENT 'Fecha de Reunión'",
            'temporalidad' =>$this->string(100) . " COMMENT 'Temporalidad'",
            'i2010'=> $this->decimal(10,2) . " COMMENT 'Inversión 2010'",
            'i2011'=> $this->decimal(10,2) . " COMMENT 'Inversión 2011'",
            'i2012'=> $this->decimal(10,2) . " COMMENT 'Inversión 2012'",
            'i2013'=> $this->decimal(10,2) . " COMMENT 'Inversión 2013'",
            'i2014'=> $this->decimal(10,2) . " COMMENT 'Inversión 2014'",
            'i2015'=> $this->decimal(10,2) . " COMMENT 'Inversión 2015'",
            'monto_propuesta'=> $this->decimal(10,2) . " COMMENT 'Monto de la Propuesta'",
            'fcampana'=> $this->date() . " COMMENT 'Fecha de la Campaña'",
            'productos' => $this->string(255) . " COMMENT 'Producto de Interés'",
            'comentario' => $this->string(255) . " COMMENT 'Comentario'",
            'docto_propuesta' => $this->string(255) . " COMMENT 'Documento de la Propuesta'",
        ], $tableOptions);

        $this->addForeignKey('fk_users', 'cuentas_ip', 'user_id', 'user', 'id', 'RESTRICT', 'RESTRICT');

        // Crea los usuarios que se pueden loguear en el sistema
        $this->batchInsert('cuentas_ip',
            array('user_id', 'status', 'cuenta', 'nombre', 'tel', 'mail', 'direccion', 'i2010', 'i2015'),
            array(
                [ 1, 'FUERA DEL DF', 'ALCATEL (ONE TOUCH)', 'DENISE LOPEZ', '59997494', 'denise.lopez@alcatelonetouch.com', 'JORGE JIMENEZ CANTU  S/N ATIZAPAN DE ZARAGOZA', 100000, 3000000 ],
                [1, 'EN CONTACTO', 'ANDREA', 'MAYA SOSA', '55343469', 'mayasosa@sampublicidad.mx', ' JOSE MARÍA RICO COL. DEL VALLE', 250000, 500000 ],
                [2, 'EN CONTACTO', 'BOING', 'EVERARDO MARTINEZ', '51320830', 'ever10_mart@hotmail.com', 'CLAVIJERO 75 COL TRANSITO', 450000, 1000000]
            )
        );

    }

    public function down()
    {
        echo "m150818_201606_base_tipo_excel cannot be reverted.\n";
        $this->dropTable('{{%cuentas_ip}}');

        return true;
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
