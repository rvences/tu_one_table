<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\CuentasIp */

$this->title = 'Update Cuentas Ip: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cuentas Ips', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cuentas-ip-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
