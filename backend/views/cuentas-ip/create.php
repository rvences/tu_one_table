<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\CuentasIp */

$this->title = 'Create Cuentas Ip';
$this->params['breadcrumbs'][] = ['label' => 'Cuentas Ips', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cuentas-ip-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
