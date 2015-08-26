<?php

namespace backend\models;

use Yii;
use common\models\User;
// Para manejo de archivos

/**
 * This is the model class for table "cuentas_ip".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $status
 * @property string $cuenta
 * @property string $categoria
 * @property string $subcuenta
 * @property string $campana
 * @property string $sector
 * @property string $puesto
 * @property string $nombre
 * @property string $tel
 * @property string $mail
 * @property string $direccion
 * @property string $freunion
 * @property string $temporalidad
 * @property string $i2010
 * @property string $i2011
 * @property string $i2012
 * @property string $i2013
 * @property string $i2014
 * @property string $i2015
 * @property string $monto_propuesta
 * @property string $fcampana
 * @property string $productos
 * @property string $comentario
 * @property string $docto_propuesta
 *
 * @property User $user
 */
class CuentasIp extends \yii\db\ActiveRecord
{
    /**
     * @var ArchivoSubido
     */
    public $archivo;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cuentas_ip';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'status', 'cuenta', 'nombre', 'tel'], 'required'],
            [['user_id'], 'integer'],
            [['freunion', 'fcampana'], 'safe'],
            [['i2010', 'i2011', 'i2012', 'i2013', 'i2014', 'i2015', 'monto_propuesta'], 'number', 'min'=>100000, 'max'=>10000000],
            [['status'], 'string', 'max' => 20],
            [['cuenta', 'categoria', 'subcuenta', 'campana', 'sector', 'puesto', 'nombre', 'tel', 'mail', 'direccion', 'temporalidad'], 'string', 'max' => 100],
            [['productos', 'comentario', 'docto_propuesta'], 'string', 'max' => 255],
           // [['file'], 'file', 'skipOnEmpty'=>false, 'extensions'=>'pdf, doc, docx'],
            [['archivo'], 'file', 'skipOnEmpty'=>true, 'extensions'=>'pdf, doc, docx'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'Gerente ',
            'status' => 'Status ',
            'cuenta' => 'Cuenta',
            'categoria' => 'Categoria',
            'subcuenta' => 'Subcuenta',
            'campana' => 'Campaña',
            'sector' => 'Sector',
            'puesto' => 'Puesto',
            'nombre' => 'Nombre',
            'tel' => 'Teléfono',
            'mail' => 'Correo Electrónico',
            'direccion' => 'Dirección de oficinas',
            'freunion' => 'Fecha de Reunión',
            'temporalidad' => 'Temporalidad',
            'i2010' => 'Inversión 2010',
            'i2011' => 'Inversión 2011',
            'i2012' => 'Inversión 2012',
            'i2013' => 'Inversión 2013',
            'i2014' => 'Inversión 2014',
            'i2015' => 'Inversión 2015',
            'monto_propuesta' => 'Monto de la Propuesta',
            'fcampana' => 'Fecha de la Campaña',
            'productos' => 'Producto de Interés',
            'comentario' => 'Comentario',
            'docto_propuesta' => 'Documento de la Propuesta',
            'archivo' => 'Documento a Subir',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getUserName() {
        return $this->user->username;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContactosIps()
    {
        return $this->hasMany(ContactosIp::className(), ['cuentas_ip_id' => 'id']);
    }

    /**
     * Función para subir el archivo
     */
    /*
    public function subeArchivo()
    {
        if ($this->validate()) {
            $this->archivo->saveAs('uploads/' . $this->archivo->baseName . '.' . $this->archivo->extension);
            return true;
        } else {
            return false;
        }
    }*/


}
