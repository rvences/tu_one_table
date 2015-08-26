<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ContactosIpSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Contactos Ips';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contactos-ip-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Contactos Ip', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idcontacto',
            'cuentas_ip_id',
            'puesto',
            'nombre',
            'telefono',
            // 'correo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
