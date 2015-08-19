<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\CuentasIpSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cuentas-ip-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'cuenta') ?>

    <?= $form->field($model, 'categoria') ?>

    <?php // echo $form->field($model, 'subcuenta') ?>

    <?php // echo $form->field($model, 'campana') ?>

    <?php // echo $form->field($model, 'sector') ?>

    <?php // echo $form->field($model, 'puesto') ?>

    <?php // echo $form->field($model, 'nombre') ?>

    <?php // echo $form->field($model, 'tel') ?>

    <?php // echo $form->field($model, 'mail') ?>

    <?php // echo $form->field($model, 'direccion') ?>

    <?php // echo $form->field($model, 'freunion') ?>

    <?php // echo $form->field($model, 'temporalidad') ?>

    <?php // echo $form->field($model, 'i2010') ?>

    <?php // echo $form->field($model, 'i2011') ?>

    <?php // echo $form->field($model, 'i2012') ?>

    <?php // echo $form->field($model, 'i2013') ?>

    <?php // echo $form->field($model, 'i2014') ?>

    <?php // echo $form->field($model, 'i2015') ?>

    <?php // echo $form->field($model, 'monto_propuesta') ?>

    <?php // echo $form->field($model, 'fcampana') ?>

    <?php // echo $form->field($model, 'productos') ?>

    <?php // echo $form->field($model, 'comentario') ?>

    <?php // echo $form->field($model, 'docto_propuesta') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
