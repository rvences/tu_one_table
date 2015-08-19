<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\CuentasIp;

/**
 * CuentasIpSearch represents the model behind the search form about `backend\models\CuentasIp`.
 */
class CuentasIpSearch extends CuentasIp
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id'], 'integer'],
            [['status', 'cuenta', 'categoria', 'subcuenta', 'campana', 'sector', 'puesto', 'nombre', 'tel', 'mail', 'direccion', 'freunion', 'temporalidad', 'fcampana', 'productos', 'comentario', 'docto_propuesta'], 'safe'],
            [['i2010', 'i2011', 'i2012', 'i2013', 'i2014', 'i2015', 'monto_propuesta'], 'number'],
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
        $query = CuentasIp::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'freunion' => $this->freunion,
            'i2010' => $this->i2010,
            'i2011' => $this->i2011,
            'i2012' => $this->i2012,
            'i2013' => $this->i2013,
            'i2014' => $this->i2014,
            'i2015' => $this->i2015,
            'monto_propuesta' => $this->monto_propuesta,
            'fcampana' => $this->fcampana,
        ]);

        $query->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'cuenta', $this->cuenta])
            ->andFilterWhere(['like', 'categoria', $this->categoria])
            ->andFilterWhere(['like', 'subcuenta', $this->subcuenta])
            ->andFilterWhere(['like', 'campana', $this->campana])
            ->andFilterWhere(['like', 'sector', $this->sector])
            ->andFilterWhere(['like', 'puesto', $this->puesto])
            ->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'tel', $this->tel])
            ->andFilterWhere(['like', 'mail', $this->mail])
            ->andFilterWhere(['like', 'direccion', $this->direccion])
            ->andFilterWhere(['like', 'temporalidad', $this->temporalidad])
            ->andFilterWhere(['like', 'productos', $this->productos])
            ->andFilterWhere(['like', 'comentario', $this->comentario])
            ->andFilterWhere(['like', 'docto_propuesta', $this->docto_propuesta]);

        return $dataProvider;
    }
}
