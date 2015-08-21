<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\CuentasIp */

$this->title = 'Nueva cuenta de Iniciativa Privada';
?>
<div class="cuentas-ip-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
