<?php

namespace backend\controllers;

use Yii;
use backend\models\CuentasIp;
use backend\models\search\CuentasIpSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\UploadedFile;

/**
 * CuentasIpController implements the CRUD actions for CuentasIp model.
 */
class CuentasIpController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all CuentasIp models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CuentasIpSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        // En caso de que exista un valor que sea editable vía AJAX
        if (Yii::$app->request->post('hasEditable')) {
            // Creando una nueva instancia de la clase empresa para guardar
            $empresaId = Yii::$app->request->post('editableKey');
            $modelo = CuentasIp::findOne($empresaId);

            // Almacenando la respuesta JSON por defecto para el dato editable
            $out = Json::encode(['output'=>'', 'message'=>'']);

            // Obtiene el primer dato envíado vía POST (Solo debe de ser un dato)
            // $posted Es el dato enviado por Empresas sin indices
            // $post Es el dato convertido en un arreglo para realizar validaciones
            $post = [];
            $posted = current($_POST['CuentasIp']);
            $post['CuentasIp'] = $posted;

            // Ejecutando el modelo como cualquier validacion simple
            if ($modelo->load($post)) {
                // Guardando el modelo o se puede realizar algo antes de guardar
                $modelo->save();
                // Texto a ser retornado para ser mostrado en la celda editable
                $output = '';
                // Validando diferentes datos del modelo que sean enviados vía AJAX
                if (isset($posted['status'])) {
                    $output = Yii::$app->formatter->asText($modelo->status);
                }
                if (isset($posted['cuenta'])) {
                    $output = Yii::$app->formatter->asText($modelo->cuenta);
                }
                if (isset($posted['user_id'])) {
                    // Muestra en el campo de texto el valor del compo mostrado no el ID
                    $output = Yii::$app->formatter->asText($modelo->username);
                }



                $out = Json::encode(['output'=>$output, 'message'=>'']);
                echo $out;
                return;

            }




        }

        // En caso de que no sea actualizado via AJAX

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CuentasIp model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new CuentasIp model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CuentasIp();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            // Obteniendo la instancia del archivo a subir
            $nombreImagen = $model->cuenta .'-'.date('Ymd-His');
            // Solo se guarda la información si existe información en el modelo de archivo
            if ($model->archivo) {
                $model->archivo = UploadedFile::getInstance($model, 'archivo');
                $model->archivo->saveAs('doctos/'.$nombreImagen.'.'.$model->archivo->extension );
                // Guardando la direccion en la BD
                $model->docto_propuesta = 'doctos/' .$nombreImagen. '.' .$model->archivo->extension;

                $model->save();
            }




            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CuentasIp model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            // Queda pendiente la funcionalidad de eliminar el archivo
            if ($model->archivo) {
                // Elimina el archivo actual
                unlink(Yii::$app->basePath.'/web/'.$model->docto_propuesta);
                // Obteniendo la instancia del archivo a subir
                $nombreImagen = $model->cuenta .'-'.date('Ymd-His');
                $model->archivo = UploadedFile::getInstance($model, 'archivo');
                $model->archivo->saveAs('doctos/'.$nombreImagen.'.'.$model->archivo->extension );
                // Guardando la direccion en la BD
                $model->docto_propuesta = 'doctos/' .$nombreImagen. '.' .$model->archivo->extension;

                $model->save();
            }
            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CuentasIp model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CuentasIp model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CuentasIp the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CuentasIp::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
