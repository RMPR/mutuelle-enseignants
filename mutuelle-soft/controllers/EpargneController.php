<?php

namespace app\controllers;

use Yii;
use app\models\Epargne;
use app\models\EpargneSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EpargneController implements the CRUD actions for Epargne model.
 */
class EpargneController extends Controller
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
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                        'class' => \yii\filters\AccessControl::className(),
                        'only' => ['index','create','update','view'],
                        'rules' => [
                            // allow authenticated users
                            [
                                'allow' => true,
                                'roles' => ['@'],
                            ],
                            // everything else is denied
                        ],
                    ],            
        ];
    }

    /**
     * Lists all Epargne models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EpargneSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Epargne model.
     * @param integer $idepargne
     * @param integer $enseignant_idenseignant
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idepargne, $enseignant_idenseignant)
    {
        return $this->render('view', [
            'model' => $this->findModel($idepargne, $enseignant_idenseignant),
        ]);
    }

    /**
     * Creates a new Epargne model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Epargne();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idepargne' => $model->idepargne, 'enseignant_idenseignant' => $model->enseignant_idenseignant]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Epargne model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idepargne
     * @param integer $enseignant_idenseignant
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idepargne, $enseignant_idenseignant)
    {
        $model = $this->findModel($idepargne, $enseignant_idenseignant);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idepargne' => $model->idepargne, 'enseignant_idenseignant' => $model->enseignant_idenseignant]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Epargne model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idepargne
     * @param integer $enseignant_idenseignant
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idepargne, $enseignant_idenseignant)
    {
        $this->findModel($idepargne, $enseignant_idenseignant)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Epargne model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idepargne
     * @param integer $enseignant_idenseignant
     * @return Epargne the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idepargne, $enseignant_idenseignant)
    {
        if (($model = Epargne::findOne(['idepargne' => $idepargne, 'enseignant_idenseignant' => $enseignant_idenseignant])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
