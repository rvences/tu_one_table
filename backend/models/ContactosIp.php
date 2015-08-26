<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "contactos_ip".
 *
 * @property integer $idcontacto
 * @property integer $cuentas_ip_id
 * @property string $puesto
 * @property string $nombre
 * @property string $telefono
 * @property string $correo
 *
 * @property CuentasIp $cuentasIp
 */
class ContactosIp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contactos_ip';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cuentas_ip_id', 'puesto', 'nombre'], 'required'],
            [['cuentas_ip_id'], 'integer'],
            [['puesto'], 'string', 'max' => 50],
            [['nombre', 'correo'], 'string', 'max' => 100],
            [['telefono'], 'string', 'max' => 15],
            [['nombre', 'telefono'], 'unique', 'targetAttribute' => ['nombre', 'telefono'], 'message' => 'The combination of Nombre and Telefono has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idcontacto' => 'Idcontacto',
            'cuentas_ip_id' => 'Cuentas Ip ID',
            'puesto' => 'Puesto',
            'nombre' => 'Nombre',
            'telefono' => 'Telefono',
            'correo' => 'Correo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCuentasIp()
    {
        return $this->hasOne(CuentasIp::className(), ['id' => 'cuentas_ip_id']);
    }
}
