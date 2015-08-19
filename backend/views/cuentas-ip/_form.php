<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CuentasIp */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cuentas-ip-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cuenta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'categoria')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'subcuenta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'campana')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sector')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'puesto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'direccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'freunion')->textInput() ?>

    <?= $form->field($model, 'temporalidad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'i2010')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'i2011')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'i2012')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'i2013')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'i2014')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'i2015')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'monto_propuesta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fcampana')->textInput() ?>

    <?= $form->field($model, 'productos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comentario')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'docto_propuesta')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
