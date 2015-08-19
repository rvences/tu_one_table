<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\CuentasIp */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cuentas Ips', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cuentas-ip-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_id',
            'status',
            'cuenta',
            'categoria',
            'subcuenta',
            'campana',
            'sector',
            'puesto',
            'nombre',
            'tel',
            'mail',
            'direccion',
            'freunion',
            'temporalidad',
            'i2010',
            'i2011',
            'i2012',
            'i2013',
            'i2014',
            'i2015',
            'monto_propuesta',
            'fcampana',
            'productos',
            'comentario',
            'docto_propuesta',
        ],
    ]) ?>

</div>
