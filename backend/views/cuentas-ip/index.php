<?php
use yii\helpers\Html;
use kartik\grid\GridView;
use common\models\User;
use backend\models\ContactosIp;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\CuentasIpSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Iniciativa Privada';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cuentas-ip-index">
    <p><strong>Comentarios:</strong></p>
    <ul>
        <li>Todos los campos son editables a excepción de Inversión de 2010 a 2014 que deben ser históricos</li>
        <li>Te pido me confirmes si esto es lo que quieres para que se generen las demás hojas tipo Excel</li>

    </ul>

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Cuenta IP', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php
    $gridColumns = [

        ['class' => 'yii\grid\ActionColumn'],

        // Volviendo Colapsable
        [
            'class' => 'kartik\grid\ExpandRowColumn',
            // http://demos.krajee.com/grid#expand-row-column
            'value' => function ($modelo, $key, $index, $column) {

                return GridView::ROW_COLLAPSED;
            },
            'expandOneOnly' =>true,
            'detail' => function ($modelo, $key, $index, $column) {
                $searchModel = new \backend\models\search\ContactosIpSearch();
                $searchModel->cuentas_ip_id = $modelo->id;
                //print_r(Yii::$app->request->queryParams);
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                return Yii::$app->controller->renderPartial('_contactos-details', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                ]);
            },
        ],



        // Haciendo el campo de Gerente editable
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'user_id',
            // Cambiando el valor que se muestra en pantalla
            'value'=> 'username',
            'pageSummary' => true,
            'readonly' => function ($model, $key, $index, $widget) {
                if ($model->user_id != Yii::$app->user->identity->id)
                return true; // No se permite editar registros inactivos
            },
            // Yii::$app->user->identity->id
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



        // Haciendo el campo de Status editable
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'status',
            'pageSummary' => true,
            'readonly' => function ($model, $key, $index, $widget) {
                if ($model->user_id != Yii::$app->user->identity->id)
                    return true; // No se permite editar registros inactivos
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

        [
            'class' => '\kartik\grid\FormulaColumn',
            'header' =>'Monto de Inversión',
            'value' => function ($model, $key, $index, $widget) {
                $p = compact('model', 'key', 'index');
                // Write your formula below
                return $widget->col(15, $p) + $widget->col(16, $p) + $widget->col(17, $p) + $widget->col(18, $p) + $widget->col(19, $p) + $widget->col(20, $p);
            },
            'format' => 'decimal',
        ],







/*

        [
            [
                'class' => '\kartik\grid\EditableColumn',

                'value' => function ($model, $key, $index, $widget) {
                    $p = compact('model', 'key', 'index');
                    // Write your formula below
                    return $widget->col(10, $p);// + $widget->col(4, $p);
                }
            ]
        ],

    */


        // Haciendo el campo de cuenta campo editable
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'cuenta',
            'pageSummary' => true,
            'readonly' => function ($model, $key, $index, $widget) {
                if ($model->user_id != Yii::$app->user->identity->id)
                    return true; // No se permite editar registros inactivos
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
                if ($model->user_id != Yii::$app->user->identity->id)
                    return true; // No se permite editar registros inactivos
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
                if ($model->user_id != Yii::$app->user->identity->id)
                    return true; // No se permite editar registros inactivos
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
                if ($model->user_id != Yii::$app->user->identity->id)
                    return true; // No se permite editar registros inactivos
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
                if ($model->user_id != Yii::$app->user->identity->id)
                    return true; // No se permite editar registros inactivos
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
                if ($model->user_id != Yii::$app->user->identity->id)
                    return true; // No se permite editar registros inactivos
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
                if ($model->user_id != Yii::$app->user->identity->id)
                    return true; // No se permite editar registros inactivos
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
                if ($model->user_id != Yii::$app->user->identity->id)
                    return true; // No se permite editar registros inactivos
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
                if ($model->user_id != Yii::$app->user->identity->id)
                    return true; // No se permite editar registros inactivos
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
                if ($model->user_id != Yii::$app->user->identity->id)
                    return true; // No se permite editar registros inactivos
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
                if ($model->user_id != Yii::$app->user->identity->id)
                    return true; // No se permite editar registros inactivos
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
                if ($model->user_id != Yii::$app->user->identity->id)
                    return true; // No se permite editar registros inactivos
            },
            'editableOptions' => function ($model, $key, $index, $widget) {
                return [
                    'header' => 'Temporalidad',
                    'size' => 'md',     // http://demos.krajee.com/popover-x#settings
                    'inputType' => \kartik\editable\Editable::INPUT_TEXT, // http://demos.krajee.com/editable


                ];
            }
        ],

        [
            'attribute' => 'i2010',
            'format' => 'decimal',
        ],
        [
            'attribute' => 'i2011',
            'format' => 'decimal',
        ],
        [
            'attribute' => 'i2012',
            'format' => 'decimal',
        ],
        [
            'attribute' => 'i2013',
            'format' => 'decimal',
        ],
        [
            'attribute' => 'i2014',
            'format' => 'decimal',
        ],
        // Haciendo el campo de inversion 2015 campo editable
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'i2015',
            'format' => 'decimal',
            'pageSummary' => true,
            'readonly' => function ($model, $key, $index, $widget) {
                if ($model->user_id != Yii::$app->user->identity->id)
                    return true; // No se permite editar registros inactivos
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
                if ($model->user_id != Yii::$app->user->identity->id)
                    return true; // No se permite editar registros inactivos
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
                if ($model->user_id != Yii::$app->user->identity->id)
                    return true; // No se permite editar registros inactivos
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
                if ($model->user_id != Yii::$app->user->identity->id)
                    return true; // No se permite editar registros inactivos
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
                if ($model->user_id != Yii::$app->user->identity->id)
                    return true; // No se permite editar registros inactivos
            },
            'editableOptions' => function ($model, $key, $index, $widget) {
                return [
                    'header' => 'Comentarios',
                    'size' => 'md',     // http://demos.krajee.com/popover-x#settings
                    'inputType' => \kartik\editable\Editable::INPUT_TEXTAREA, // http://demos.krajee.com/editable


                ];
            }
        ],

       // 'docto_propuesta - No se edita directamente',
        [
            'attribute' =>'docto_propuesta',
            'format'=>'html',

            'value' =>function ($model) {
                if ($model->docto_propuesta) {
                    return Html::a('Propuesta', $model->docto_propuesta);
                    //return Html::a(Html::encode($model->docto_propuesta),$model->docto_propuesta);
                }

            }

        ]

    ];
    ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        // 'columns' => $gridColumns,
        // Deshabilitando que se pueda hacer cualquier tipo de exportación evitando exportar .PDF
        'export' => false,
        'pjax' => false,

        'beforeHeader'=>[
            [
                'columns'=>[
                    ['content'=>'Cuenta', 'options'=>['colspan'=>9, 'class'=>'text-center warning']],
                    ['content'=>'Datos de Contacto', 'options'=>['colspan'=>5, 'class'=>'text-center warning']],
                    ['content'=>'Seguimiento', 'options'=>['colspan'=>13, 'class'=>'text-center warning']],
                ],
                'options'=>['class'=>'skip-export'] // remove this row from export
            ]
        ],



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

        'columns' => $gridColumns,


    ]); ?>

</div>
