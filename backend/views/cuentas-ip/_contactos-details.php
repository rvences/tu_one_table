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


    <?= GridView::widget([
        'dataProvider' => $dataProvider,

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            /*[
                'attribute'=> 'puesto',
                'value' => function($data) {         //*the closure that works*
                    return '<div class="col-xs-1">'.$data->puesto.'</div>';
                },
                'format' => 'raw',
                'contentOptions'=>['style'=>' col-xs-1']
                ],*/
            [
                'attribute'=> 'puesto',
                'contentOptions' => ['class' => 'col-xs-2'],
                //'headerOptions' => ['class' => 'col-xs-1'],

            ],
            [
                'attribute'=> 'nombre',
                'contentOptions' => ['class' => 'col-xs-1'],
                //'headerOptions' => ['class' => 'col-xs-1'],
            ],
            [
                'attribute'=> 'telefono',
                'contentOptions' => ['class' => 'col-xs-1'],
                //'headerOptions' => ['class' => 'col-xs-1'],
            ],

             'correo',
        ],
    ]); ?>

</div>
