<?php

namespace app\controllers;

use app\models\enseignant;
use app\models\AjoutmembreForm;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\web\UploadedFile;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /*
     * Redirige vers la page d'ajout d'un membre
     */
    public function actionAjoutmembre()
    {
        $model = new AjoutmembreForm();
        $enseignant = new Enseignant();

        if ($model->load(Yii::$app->request->post()) && $model->validate())
        {
            $model->photo = UploadedFile::getInstance($model, 'photo');
            $enseignant->nom = $model->nom;
            $enseignant->telephone = $model->telephone;
            $enseignant->prenom = $model->prenom;
            $enseignant->email = $model->email;
            $enseignant->adresse = $model->adresse;
            $enseignant->photo =  $model->nom . '.' . $model->photo->extension;
            $enseignant->dateinscription = $model->dateinscription;
            $enseignant->pass = $model->pass;
            $enseignant->save();

            if ($model->photo && $model->validate()) {
                if($model->photo->saveAs('../uploads/' . $model->nom . '_' . $model->prenom . '.' . $model->photo->extension));
            }

             Yii::$app->session->setFlash("succes", "Membre ajouté avec succès");
        }
        return $this->render('ajoutmembre', ['model' => $model]);

    }

    /*
     * Redirige vers la liste des membres
     */
    public function actionListemembres()
    {
        return $this->render('listemembres');
    }
}
