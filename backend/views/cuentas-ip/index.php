<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView;
use common\models\User;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\CuentasIpSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Iniciativa Privada';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cuentas-ip-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Cuenta IP', ['create'], ['class' => 'btn btn-success']) ?>
        <?php  echo Url::to(['/archivo']);?>
    </p>

    <?php
    $gridColumns = [



        // Haciendo el campo de Estado editable
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'user_id',
            // Cambiando el valor que se muestra en pantalla
            'value'=> 'username',
            'pageSummary' => true,
            'readonly' => function ($model, $key, $index, $widget) {
                return (!$model->status); // No se permite editar registros inactivos
            },
            'editableOptions' => function ($model, $key, $index, $widget) {
                return [
                    'header' => 'Gerente de la Cuenta',
                    'size' => 'md',     // http://demos.krajee.com/popover-x#settings
                    'inputType' => \kartik\editable\Editable::INPUT_SELECT2, // http://demos.krajee.com/editable
                    'options' => [
                        // Obtiene la lista completa de los usuarios
                        'data' => \yii\helpers\ArrayHelper::map(User::find()->all(), 'id', 'username'),
                    ]


                ];
            }
        ],



        // Haciendo el campo de Estado editable
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'status',
            'pageSummary' => true,
            'readonly' => function ($model, $key, $index, $widget) {
                return (!$model->status); // No se permite editar registros inactivos
            },
            'editableOptions' => function ($model, $key, $index, $widget) {
                return [
                    'header' => 'Estado Actual de la Empresa',
                    'size' => 'md',     // http://demos.krajee.com/popover-x#settings
                    'inputType' => \kartik\editable\Editable::INPUT_SELECT2, // http://demos.krajee.com/editable
                    'options' => [
                        'data' => ["Cliente" => "Cliente", "Visitado" => "Visitado", "NO Visitado" => "No Visitado", "Fuera del DF" => "Fuera del DF"],
                    ]


                ];
            }
        ],

        // Haciendo el campo de cuenta campo editable
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'cuenta',
            'pageSummary' => true,
            'readonly' => function ($model, $key, $index, $widget) {
                return (!$model->status); // No se permite editar registros inactivos
            },
            'editableOptions' => function ($model, $key, $index, $widget) {
                return [
                    'header' => 'Nombre de la Empresa',
                    'size' => 'md',     // http://demos.krajee.com/popover-x#settings
                    'inputType' => \kartik\editable\Editable::INPUT_TEXT, // http://demos.krajee.com/editable


                ];
            }
        ],

        // Haciendo el campo de categoria campo editable
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'categoria',
            'pageSummary' => true,
            'readonly' => function ($model, $key, $index, $widget) {
                return (!$model->status); // No se permite editar registros inactivos
            },
            'editableOptions' => function ($model, $key, $index, $widget) {
                return [
                    'header' => 'Nombre de la Categoría',
                    'size' => 'md',     // http://demos.krajee.com/popover-x#settings
                    'inputType' => \kartik\editable\Editable::INPUT_TEXT, // http://demos.krajee.com/editable


                ];
            }
        ],

        // Haciendo el campo de subcuenta campo editable
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'subcuenta',
            'pageSummary' => true,
            'readonly' => function ($model, $key, $index, $widget) {
                return (!$model->status); // No se permite editar registros inactivos
            },
            'editableOptions' => function ($model, $key, $index, $widget) {
                return [
                    'header' => 'Nombre de la Subcuenta',
                    'size' => 'md',     // http://demos.krajee.com/popover-x#settings
                    'inputType' => \kartik\editable\Editable::INPUT_TEXT, // http://demos.krajee.com/editable


                ];
            }
        ],


        // Haciendo el campo de campaña campo editable
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'campana',
            'pageSummary' => true,
            'readonly' => function ($model, $key, $index, $widget) {
                return (!$model->status); // No se permite editar registros inactivos
            },
            'editableOptions' => function ($model, $key, $index, $widget) {
                return [
                    'header' => 'Nombre de la Campaña',
                    'size' => 'md',     // http://demos.krajee.com/popover-x#settings
                    'inputType' => \kartik\editable\Editable::INPUT_TEXT, // http://demos.krajee.com/editable


                ];
            }
        ],
        // Haciendo el campo de sector campo editable
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'sector',
            'pageSummary' => true,
            'readonly' => function ($model, $key, $index, $widget) {
                return (!$model->status); // No se permite editar registros inactivos
            },
            'editableOptions' => function ($model, $key, $index, $widget) {
                return [
                    'header' => 'Nombre del Sector',
                    'size' => 'md',     // http://demos.krajee.com/popover-x#settings
                    'inputType' => \kartik\editable\Editable::INPUT_TEXT, // http://demos.krajee.com/editable


                ];
            }
        ],
        // Haciendo el campo de puesto campo editable
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'puesto',
            'pageSummary' => true,
            'readonly' => function ($model, $key, $index, $widget) {
                return (!$model->status); // No se permite editar registros inactivos
            },
            'editableOptions' => function ($model, $key, $index, $widget) {
                return [
                    'header' => 'Puesto del Contacto',
                    'size' => 'md',     // http://demos.krajee.com/popover-x#settings
                    'inputType' => \kartik\editable\Editable::INPUT_TEXT, // http://demos.krajee.com/editable


                ];
            }
        ],
        // Haciendo el campo de nombre campo editable
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'nombre',
            'pageSummary' => true,
            'readonly' => function ($model, $key, $index, $widget) {
                return (!$model->status); // No se permite editar registros inactivos
            },
            'editableOptions' => function ($model, $key, $index, $widget) {
                return [
                    'header' => 'Nombre del Contacto',
                    'size' => 'md',     // http://demos.krajee.com/popover-x#settings
                    'inputType' => \kartik\editable\Editable::INPUT_TEXT, // http://demos.krajee.com/editable


                ];
            }
        ],
        // Haciendo el campo de telefono campo editable
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'tel',
            'pageSummary' => true,

            'readonly' => function ($model, $key, $index, $widget) {
                return (!$model->status); // No se permite editar registros inactivos
            },
            'editableOptions' => function ($model, $key, $index, $widget) {
                return [
                    'header' => 'Teléfono del Contacto',
                    'size' => 'md',     // http://demos.krajee.com/popover-x#settings
                    'inputType' => \kartik\editable\Editable::INPUT_TEXT, // http://demos.krajee.com/editable


                ];
            }
        ],
        // Haciendo el campo de correo campo editable
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'mail',
            'pageSummary' => true,
            'readonly' => function ($model, $key, $index, $widget) {
                return (!$model->status); // No se permite editar registros inactivos
            },
            'editableOptions' => function ($model, $key, $index, $widget) {
                return [
                    'header' => 'Correo Electrónico del Contacto',
                    'size' => 'md',     // http://demos.krajee.com/popover-x#settings
                    'inputType' => \kartik\editable\Editable::INPUT_TEXT, // http://demos.krajee.com/editable


                ];
            }
        ],
        // Haciendo el campo de dirección campo editable
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'direccion',
            'pageSummary' => true,
            'readonly' => function ($model, $key, $index, $widget) {
                return (!$model->status); // No se permite editar registros inactivos
            },
            'editableOptions' => function ($model, $key, $index, $widget) {
                return [
                    'header' => 'Dirección del Contacto',
                    'size' => 'md',     // http://demos.krajee.com/popover-x#settings
                    'inputType' => \kartik\editable\Editable::INPUT_TEXT, // http://demos.krajee.com/editable


                ];
            }
        ],

        // Haciendo el campo de próxima reunión campo editable
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'freunion',
            'format' => ['date', 'php:D j M Y'],
            'pageSummary' => true,
            'readonly' => function ($model, $key, $index, $widget) {
                return (!$model->status); // No se permite editar registros inactivos
            },
            'editableOptions' => function ($model, $key, $index, $widget) {
                return [
                    'header' => 'Fecha de Próxima Reunión',
                    'size' => 'md',     // http://demos.krajee.com/popover-x#settings

                    'inputType'=>\kartik\editable\Editable::INPUT_WIDGET,
                    'widgetClass'=> 'kartik\datecontrol\DateControl',
                    'options'=>[
                        'type'=>\kartik\datecontrol\DateControl::FORMAT_DATE,
                        'options' => [
                            'pluginOptions' => [
                                'autoclose' => true
                            ]
                        ]
                    ],


                ];
            }
        ],
        // Haciendo el campo de temporalidad campo editable
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'temporalidad',
            'pageSummary' => true,
            'readonly' => function ($model, $key, $index, $widget) {
                return (!$model->status); // No se permite editar registros inactivos
            },
            'editableOptions' => function ($model, $key, $index, $widget) {
                return [
                    'header' => 'Temporalidad',
                    'size' => 'md',     // http://demos.krajee.com/popover-x#settings
                    'inputType' => \kartik\editable\Editable::INPUT_TEXT, // http://demos.krajee.com/editable


                ];
            }
        ],

        'i2010',
        'i2011',
        'i2012',
        'i2013',
        'i2014',
        // Haciendo el campo de inversion 2015 campo editable
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'i2015',
            'format' => 'decimal',
            'pageSummary' => true,
            'readonly' => function ($model, $key, $index, $widget) {
                return (!$model->status); // No se permite editar registros inactivos
            },
            'editableOptions' => function ($model, $key, $index, $widget) {
                return [
                    'header' => 'Inversión para 2015',
                    'size' => 'md',     // http://demos.krajee.com/popover-x#settings
                    'inputType' => \kartik\editable\Editable::INPUT_MONEY, // http://demos.krajee.com/editable


                ];
            }
        ],

        // Haciendo el campo de monto de propuesta campo editable
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'monto_propuesta',
            'pageSummary' => true,
            'format'=>'decimal',
            'readonly' => function ($model, $key, $index, $widget) {
                return (!$model->status); // No se permite editar registros inactivos
            },
            'editableOptions' => function ($model, $key, $index, $widget) {
                return [
                    'header' => 'Monto de la Propuesta',
                    'size' => 'md',     // http://demos.krajee.com/popover-x#settings
                    'inputType' => \kartik\editable\Editable::INPUT_MONEY, // http://demos.krajee.com/editable


                ];
            }
        ],


        // Haciendo el campo de próxima reunión campo editable
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'fcampana',
            'format' => ['date', 'php:D j M Y'],
            'pageSummary' => true,
            'readonly' => function ($model, $key, $index, $widget) {
                return (!$model->status); // No se permite editar registros inactivos
            },
            'editableOptions' => function ($model, $key, $index, $widget) {
                return [
                    'header' => 'Fecha de Campaña',
                    'size' => 'md',     // http://demos.krajee.com/popover-x#settings

                    'inputType'=>\kartik\editable\Editable::INPUT_WIDGET,
                    'widgetClass'=> 'kartik\datecontrol\DateControl',
                    'options'=>[
                        'type'=>\kartik\datecontrol\DateControl::FORMAT_DATE,
                        'options' => [
                            'pluginOptions' => [
                                'autoclose' => true
                            ]
                        ]
                    ],


                ];
            }
        ],


        // Haciendo el campo de productos campo editable
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'productos',
            'pageSummary' => true,
            'readonly' => function ($model, $key, $index, $widget) {
                return (!$model->status); // No se permite editar registros inactivos
            },
            'editableOptions' => function ($model, $key, $index, $widget) {
                return [
                    'header' => 'Producto en que esta interesado',
                    'size' => 'md',     // http://demos.krajee.com/popover-x#settings
                    'inputType' => \kartik\editable\Editable::INPUT_TEXTAREA, // http://demos.krajee.com/editable


                ];
            }
        ],

        // Haciendo el campo de Comentario campo editable
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'comentario',
            'pageSummary' => true,
            'readonly' => function ($model, $key, $index, $widget) {
                return (!$model->status); // No se permite editar registros inactivos
            },
            'editableOptions' => function ($model, $key, $index, $widget) {
                return [
                    'header' => 'Comentarios',
                    'size' => 'md',     // http://demos.krajee.com/popover-x#settings
                    'inputType' => \kartik\editable\Editable::INPUT_TEXTAREA, // http://demos.krajee.com/editable


                ];
            }
        ],

        // Haciendo el campo de Documento escaneado campo editable
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'docto_propuesta',
            'pageSummary' => true,
            'readonly' => function ($model, $key, $index, $widget) {
                return (!$model->status); // No se permite editar registros inactivos
            },
            'editableOptions' => function ($model, $key, $index, $widget) {
                return [
                    'header' => 'Documento de la Propuesta',
                    'size' => 'md',     // http://demos.krajee.com/popover-x#settings
                    'inputType' => \kartik\editable\Editable::INPUT_FILE, // http://demos.krajee.com/editable
                    'options'=>[
                        'options' => [
                            'pluginOptions' => [
                                'name' => 'attachments',
                                'options' => ['multiple' => true],
                                'pluginOptions' => ['previewFileType' => 'any'],
                                'uploadUrl' => '/archivo',
                            ]
                        ]
                    ],

                ];
            }
        ],






    ];
    ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        // 'columns' => $gridColumns,
        // Deshabilitando que se pueda hacer cualquier tipo de exportación evitando exportar .PDF
        'export' => false,
        'pjax' => true,



        'bordered'=>true,
        'striped'=>true,
        'condensed'=>true,
        'responsive'=>true,
        'hover'=>true,
        'panel'=>[
            'type'=>GridView::TYPE_PRIMARY,
            'heading'=>true,
        ],
        'persistResize'=>false,
        'exportConfig'=>true,

        'columns' => $gridColumns
    ]); ?>







    <?php  /*=  GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
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

           // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); */ ?>

</div>
