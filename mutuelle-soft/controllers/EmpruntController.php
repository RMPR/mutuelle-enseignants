<?php

namespace app\controllers;

use Yii;
use app\models\Emprunt;
use app\models\EmpruntSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EmpruntController implements the CRUD actions for Emprunt model.
 */
class EmpruntController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Emprunt models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EmpruntSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Emprunt model.
     * @param integer $idemprunt
     * @param integer $enseignant_idenseignant
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idemprunt, $enseignant_idenseignant)
    {
        return $this->render('view', [
            'model' => $this->findModel($idemprunt, $enseignant_idenseignant),
        ]);
    }

    /**
     * Creates a new Emprunt model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Emprunt();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idemprunt' => $model->idemprunt, 'enseignant_idenseignant' => $model->enseignant_idenseignant]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Emprunt model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idemprunt
     * @param integer $enseignant_idenseignant
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idemprunt, $enseignant_idenseignant)
    {
        $model = $this->findModel($idemprunt, $enseignant_idenseignant);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idemprunt' => $model->idemprunt, 'enseignant_idenseignant' => $model->enseignant_idenseignant]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Emprunt model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idemprunt
     * @param integer $enseignant_idenseignant
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idemprunt, $enseignant_idenseignant)
    {
        $this->findModel($idemprunt, $enseignant_idenseignant)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Emprunt model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idemprunt
     * @param integer $enseignant_idenseignant
     * @return Emprunt the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idemprunt, $enseignant_idenseignant)
    {
        if (($model = Emprunt::findOne(['idemprunt' => $idemprunt, 'enseignant_idenseignant' => $enseignant_idenseignant])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
