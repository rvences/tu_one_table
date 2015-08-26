<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ContactosIp */

$this->title = 'Update Contactos Ip: ' . ' ' . $model->idcontacto;
$this->params['breadcrumbs'][] = ['label' => 'Contactos Ips', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idcontacto, 'url' => ['view', 'id' => $model->idcontacto]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="contactos-ip-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
