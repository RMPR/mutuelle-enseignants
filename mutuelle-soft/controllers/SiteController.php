<?php
/**
 * @link https://github.com/rmpr/mutuelle-enseignants
 * @copyright None
 * @license Unlicense
 */

namespace app\controllers;

use app\models\AjoutEmpruntForm;
use app\models\AjoutEpargneForm;
use app\models\Emprunt;
use app\models\enseignant;
use app\models\AjoutmembreForm;
use app\models\Epargne;
use app\models\RemboursementForm;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\web\UploadedFile;
use yii\data\Pagination;

/**
 * SiteController gère globlalement les routes 
 * de l'application
 * @author rmpr
 */
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
                'only' => ['logout', 'logout', 'signup'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login', 'signup'],
                        'roles' => ['?']
                    ],
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

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->photo = UploadedFile::getInstance($model, 'photo');
            $enseignant->nom = $model->nom;
            $enseignant->telephone = $model->telephone;
            $enseignant->prenom = $model->prenom;
            $enseignant->email = $model->email;
            $enseignant->adresse = $model->adresse;
            $enseignant->photo = $model->nom . '.' . $model->photo->extension;
            $enseignant->dateinscription = $model->dateinscription;
            $enseignant->pass = $model->pass;
            $enseignant->save();

            if ($model->photo && $model->validate()) {
                if ($model->photo->saveAs('../web/uploads/' . $model->nom . '_' . $model->prenom . '.' . $model->photo->extension)) ;
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

    /**
     * Redirige vers la liste des epargnes
     */
    public function actionListeepargnes()
    {
        $ajoutEpargneForm = new AjoutEpargneForm();
        $epargne = new Epargne();

        // Jointure des tables enseignants et epargnes
        $post = Yii::$app->db->createCommand("SELECT * FROM enseignant JOIN epargne ON idenseignant=enseignant_idenseignant ORDER BY nom ASC;")->queryAll();

        // Récupération des noms des épargnants
        $nomsEpargnants = Yii::$app->db->createCommand("SELECT nom FROM enseignant JOIN epargne ON idenseignant=enseignant_idenseignant ORDER BY nom ASC;")->queryAll();

        // Si le formulaire d'ajout d'épargne est validé
        if ($ajoutEpargneForm->load(Yii::$app->request->post()) && $ajoutEpargneForm->validate()) {

            $idepargnant = array_search($ajoutEpargneForm->nom_a, $nomsEpargnants);
            Yii::$app->db->createCommand()->update("epargne", ["montant" => $ajoutEpargneForm->montant_a,
                "session" => $ajoutEpargneForm->session_a],
                "enseignant_idenseignant= " . $idepargnant)->execute();
            /*$epargne->montant = $ajoutEpargneForm->montant_a;
            $epargne->session = $ajoutEpargneForm->session_a;
            $epargne->enseignant_idenseignant = array_search($ajoutEpargneForm->nom_a, $nomsEpargnants);
            $epargne->save(true);*/
        }

        return $this->render('listeepargnes', ['post' => $post,
            'ajoutEpargneForm' => $ajoutEpargneForm,
            'nomsEpargnants' => $nomsEpargnants,]);
    }


    /**
     * Redirection vers la liste des remboursements
     */
    public function actionListeremboursements()
    {
        // Jointure des tables enseignants et epargnes
        $post = Yii::$app->db->createCommand("SELECT * FROM enseignant JOIN emprunt ON idenseignant=enseignant_idenseignant ORDER BY nom ASC;")->queryAll();

        // Représente le formulaire de remboursement
        $remboursementForm = new RemboursementForm();

        // Si le formulaire est validé alors
        if($remboursementForm->load(Yii::$app->request->post()) && $remboursementForm->validate())
        {

        }
        return $this->render('listeremboursements', ['post' => $post,
                                                           'remboursementForm' => $remboursementForm]);
    }


    /**
     * Redirection vers la liste des emprunts
     */
    public function actionListeemprunts()
    {
        //Instance du formulaire d'emprunt
        $ajoutEmpruntForm = new AjoutEmpruntForm();

        //Liste des enseignants
        $enseignants = Enseignant::find()->orderBy("nom ASC")->all();


        //La liste des emprunteurs
        $listeEmprunteurs = Yii::$app->db->createCommand("SELECT idenseignant, nom, prenom, montant , session, interet, databutoir FROM enseignant JOIN emprunt ON idenseignant=enseignant_idenseignant ORDER BY nom ASC ;")->queryAll();

        // Nouvel emprunt
        $emprunt = new Emprunt();

        $interet = 0;
        // Si le formulaire est soumis
        if($ajoutEmpruntForm->load(Yii::$app->request->post()) && $ajoutEmpruntForm->validate())
        {
            $dateButoir = Yii::$app->db->createCommand("SELECT ADDDATE('".$ajoutEmpruntForm->session_a ."',interval 3 month) as datebutoir")->queryOne()["datebutoir"];
            $emprunt->montant = $ajoutEmpruntForm->montant_a;
            $emprunt->session = $ajoutEmpruntForm->session_a;
            if($_SERVER["REQUEST_METHOD"] == "POST")
                $emprunt->enseignant_idenseignant = $_POST["select"];
            foreach ($listeEmprunteurs as $emprunteur)
            {
                if($emprunteur["idenseignant"] == $_POST["select"])
                    $interet = $emprunteur["interet"];
            }
            $emprunt->interet = $interet;
            $emprunt->databutoir = $dateButoir;
            $emprunt->save();
            $this->refresh();
        }

        return $this->render('listeemprunts', ['ajoutEmpruntForm' => $ajoutEmpruntForm,
                                                     'listeEmprunteurs' => $listeEmprunteurs,
                                                     'enseignants' => $enseignants]);
    }
}

//TODO (1) vérifier l'intérêt
//TODO (2) Ajouter la pagination
//TODO (3) Ajouter des datepickers