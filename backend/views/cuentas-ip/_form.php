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
            <?php
            $listaUsuarios = ArrayHelper::map(User::find()->asArray()->all(), 'id', 'username');
            $model->user_id = Yii::$app->user->identity->id; // Para preseleccionar el dato
            echo $form->field($model, 'user_id')->dropDownList($listaUsuarios);
            ?>
        </div>
        <div class="col-xs-2">
            <?php
            $listaUsuarios = Array(
                "Cliente" => "Cliente", "Visitado" => "Visitado", "NO Visitado" => "No Visitado", "Fuera del DF" => "Fuera del DF",
            );
            echo $form->field($model, 'status')->dropDownList($listaUsuarios);
            ?>
        </div>
        <div class="col-xs-4">
            <?= $form->field($model, 'cuenta')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-xs-4">
            <?= $form->field($model, 'subcuenta')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-4">
            <?= $form->field($model, 'categoria')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-xs-4">
            <?= $form->field($model, 'campana')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-xs-4">
            <?= $form->field($model, 'sector')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-2">
            <?= $form->field($model, 'puesto')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-xs-3">
            <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-xs-3">
            <?= $form->field($model, 'tel')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-xs-4">
            <?= $form->field($model, 'mail')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-8">
            <?= $form->field($model, 'direccion')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-xs-2">
            <?= $form->field($model, 'freunion')->textInput() ?>
        </div>
        <div class="col-xs-2">
            <?= $form->field($model, 'temporalidad')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-2">
            <?= $form->field($model, 'i2010')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-xs-2">
            <?= $form->field($model, 'i2011')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-xs-2">
            <?= $form->field($model, 'i2012')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-xs-2">
            <?= $form->field($model, 'i2013')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-xs-2">
            <?= $form->field($model, 'i2014')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-xs-2">
            <?= $form->field($model, 'i2015')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-2">
            <?= $form->field($model, 'monto_propuesta')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-xs-2">
            <?= $form->field($model, 'fcampana')->textInput() ?>
        </div>
        <div class="col-xs-4">
            <?= $form->field($model, 'productos')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-xs-4">
            <?= $form->field($model, 'comentario')->textInput(['maxlength' => true]) ?>
        </div>
    </div>


    <?php // = $form->field($model, 'docto_propuesta')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'archivo')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Nueva Cuenta' : 'Actualizar Datos', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
