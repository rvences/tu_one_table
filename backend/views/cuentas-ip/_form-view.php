<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

use common\models\User;






/* @var $this yii\web\View */
/* @var $model backend\models\CuentasIp */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cuentas-ip-form">

    <?php //$form = ActiveForm::begin(); ?>
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <div class="row">
        <div class="col-xs-2">
            <?= $form->field($model, 'username')->textInput(['readonly' => true]); ?>
        </div>
        <div class="col-xs-2">
            <?= $form->field($model, 'status')->textInput(['readonly' => true]); ?>

        </div>
        <div class="col-xs-4">
            <?= $form->field($model, 'cuenta')->textInput(['maxlength' => true])->textInput(['readonly' => true]); ?>
        </div>
        <div class="col-xs-4">
            <?= $form->field($model, 'subcuenta')->textInput(['maxlength' => true])->textInput(['readonly' => true]); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-4">
            <?= $form->field($model, 'categoria')->textInput(['maxlength' => true])->textInput(['readonly' => true]); ?>
        </div>
        <div class="col-xs-4">
            <?= $form->field($model, 'campana')->textInput(['maxlength' => true])->textInput(['readonly' => true]); ?>
        </div>
        <div class="col-xs-4">
            <?= $form->field($model, 'sector')->textInput(['maxlength' => true])->textInput(['readonly' => true]); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-2">
            <?= $form->field($model, 'puesto')->textInput(['maxlength' => true])->textInput(['readonly' => true]); ?>
        </div>
        <div class="col-xs-3">
            <?= $form->field($model, 'nombre')->textInput(['maxlength' => true])->textInput(['readonly' => true]); ?>
        </div>
        <div class="col-xs-3">
            <?= $form->field($model, 'tel')->textInput(['maxlength' => true])->textInput(['readonly' => true]); ?>
        </div>
        <div class="col-xs-4">
            <?= $form->field($model, 'mail')->textInput(['maxlength' => true])->textInput(['readonly' => true]); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-8">
            <?= $form->field($model, 'direccion')->textInput(['maxlength' => true])->textInput(['readonly' => true]); ?>
        </div>
        <div class="col-xs-2">
            <?php if ($model->freunion) { ?>
                <label class="control-label" for="cuentasip-freunion">Fecha de Reunión</label>

                <input type="text" id="cuentasip-freunion" class="form-control" readonly value="<?= Yii::$app->formatter->asDate($model->freunion); ?>">
            <?php } else { ?>
                <?= $form->field($model, 'freunion')->textInput(['readonly' => true]); ?>
            <?php } ?>
        </div>
        <div class="col-xs-2">
            <?= $form->field($model, 'temporalidad')->textInput(['maxlength' => true])->textInput(['readonly' => true]); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-2">
            <?= $form->field($model, 'i2010')->textInput(['maxlength' => true])->textInput(['readonly' => true]); ?>
        </div>
        <div class="col-xs-2">
            <?= $form->field($model, 'i2011')->textInput(['maxlength' => true])->textInput(['readonly' => true]); ?>
        </div>
        <div class="col-xs-2">
            <?= $form->field($model, 'i2012')->textInput(['maxlength' => true])->textInput(['readonly' => true]); ?>
        </div>
        <div class="col-xs-2">
            <?= $form->field($model, 'i2013')->textInput(['maxlength' => true])->textInput(['readonly' => true]); ?>
        </div>
        <div class="col-xs-2">
            <?= $form->field($model, 'i2014')->textInput(['maxlength' => true])->textInput(['readonly' => true]); ?>
        </div>
        <div class="col-xs-2">
            <?= $form->field($model, 'i2015')->textInput(['maxlength' => true])->textInput(['readonly' => true]); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-2">
            <?= $form->field($model, 'monto_propuesta')->textInput(['maxlength' => true])->textInput(['readonly' => true]); ?>
        </div>
        <div class="col-xs-2">
            <?php if ($model->fcampana) { ?>
                <label class="control-label" for="cuentasip-freunion">Fecha de Campaña</label>

                <input type="text" id="cuentasip-fcampana" class="form-control" readonly value="<?= Yii::$app->formatter->asDate($model->fcampana); ?>">
            <?php } else { ?>
                <?= $form->field($model, 'fcampana')->textInput(['readonly' => true]); ?>
            <?php } ?>
        </div>
        <div class="col-xs-4">
            <?= $form->field($model, 'productos')->textInput(['maxlength' => true])->textInput(['readonly' => true]); ?>
        </div>
        <div class="col-xs-4">
            <?= $form->field($model, 'comentario')->textInput(['maxlength' => true])->textInput(['readonly' => true]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-4">
            <?php if ($model->docto_propuesta) { ?>
                <label class="control-label" for="cuentasip-archivo">Documento del Proyecto: </label>
                <a id=cuentasip-archivo" href="<?=$model->docto_propuesta?>">Documento</a>
            <?php } ?>
        </div>

    </div>

    <?php ActiveForm::end(); ?>

</div>
