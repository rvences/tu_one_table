<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\ContactosIp;

/**
 * ContactosIpSearch represents the model behind the search form about `backend\models\ContactosIp`.
 */
class ContactosIpSearch extends ContactosIp
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idcontacto', 'cuentas_ip_id'], 'integer'],
            [['puesto', 'nombre', 'telefono', 'correo'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = ContactosIp::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        // Se comenta esta línea para mostrar solo los contactos de la cuenta al hacer uso de ExpandRowColumn
        //$this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'idcontacto' => $this->idcontacto,
            'cuentas_ip_id' => $this->cuentas_ip_id,
        ]);

        $query->andFilterWhere(['like', 'puesto', $this->puesto])
            ->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'telefono', $this->telefono])
            ->andFilterWhere(['like', 'correo', $this->correo]);

        return $dataProvider;
    }
}
