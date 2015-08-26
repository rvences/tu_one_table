<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\CuentasIp */


?>
<div class="cuentas-ip-view">

    <h1><?= $this->title = 'Datos de:' . ' ' . $model->cuenta; ?></h1>

    <p>
        <?= Html::a('Regresar', Yii::$app->request->referrer, ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>


    <div class="cuentas-ip-update">


        <?= $this->render('_form-view', [
            'model' => $model,
        ]) ?>

    </div>
    <?php /*= DetailView::widget([
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
    ]) */?>

</div>
