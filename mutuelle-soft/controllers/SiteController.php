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
use app\models\Fondsocial;
use app\models\RemboursementForm;
use app\models\RetraitEpargneForm;
use app\models\RetraitFondForm;
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
     * Affiche la page d'accueil du site web
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Affiche la page d'authentification qui va permettre aux enseignants
     *  de se connecter pour avoir acces aux fonctionnalites offertes par l'application web.
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
     * Le bouton de deconnexion permet aux enseignants de se deconnecter de leurs comptes.
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
        $retraitEpargneForm = new RetraitEpargneForm();
        // Liste des épargnants
        $post = Yii::$app->db->createCommand("SELECT id,username,email,idepargne, sum(montant) as montant,session FROM user JOIN epargne  ON id=enseignant_idenseignant  GROUP BY username ORDER BY username ASC ;")->queryAll();

        // Récupération des noms des épargnants
        $nomsEpargnants = Yii::$app->db->createCommand("SELECT id, username FROM user")->queryAll();

        // Si le formulaire d'ajout d'épargne est validé
        if ($ajoutEpargneForm->load(Yii::$app->request->post()) && $ajoutEpargneForm->validate())
        {
            $epargne->montant = $ajoutEpargneForm->montant_a;
            $epargne->session = $ajoutEpargneForm->session_a;
            $epargne->enseignant_idenseignant = $_POST["selectnomepr"];
            $epargne->save();
            Yii::$app->session->setFlash("succesajoutepr", "Epargne ajoutée avec succès");
            $this->refresh();
        }

        if ($retraitEpargneForm->load(Yii::$app->request->post()) && $retraitEpargneForm->validate())
        {
            $epargne->montant = -1 * $retraitEpargneForm->montant_r;
            $epargne->session = $retraitEpargneForm->session_r;
            $epargne->enseignant_idenseignant = $_POST["selectnomepr2"];
            $epargne->save();
            Yii::$app->session->setFlash("succesajoutepr", "Argent retiré avec succès");
            $this->refresh();
        }

        return $this->render('listeepargnes', ['post' => $post,
            'ajoutEpargneForm' => $ajoutEpargneForm,
            'nomsEpargnants' => $nomsEpargnants,
            'retraitEpargneForm' => $retraitEpargneForm]);
    }




    /**
     * Redirection vers la liste des emprunts
     */
    public function actionListeemprunts()
    {
        //Instance du formulaire d'emprunt
        $ajoutEmpruntForm = new AjoutEmpruntForm();

        //Liste des enseignants
        $enseignants = Yii::$app->db->createCommand("SELECT id, username FROM user")->queryAll();


        //La liste des emprunteurs
        $listeEmprunteurs = Yii::$app->db->createCommand("SELECT id, username, montant , session, interet, databutoir FROM user JOIN emprunt ON id=enseignant_idenseignant ORDER BY username ASC ;")->queryAll();

        // Nouvel emprunt
        $emprunt = new Emprunt();

        // Si le formulaire est soumis
        if($ajoutEmpruntForm->load(Yii::$app->request->post()) && $ajoutEmpruntForm->validate())
        {
            $dateButoir = Yii::$app->db->createCommand("SELECT ADDDATE('" . $ajoutEmpruntForm->session_a . "',interval 3 month) as datebutoir")->queryOne()["datebutoir"];
            $emprunt->montant = $ajoutEmpruntForm->montant_a * 1.01;
            $emprunt->session = $ajoutEmpruntForm->session_a;
            if($_SERVER["REQUEST_METHOD"] == "POST")
                $emprunt->enseignant_idenseignant = $_POST["select"];

            $emprunt->interet = 0.01;
            $emprunt->databutoir = $dateButoir;
            $emprunt->save();

            Yii::$app->session->setFlash("succesajoutemp", "Emprunt ajoutée avec succès");

            $this->refresh();
        }
        return $this->render('listeemprunts', ['ajoutEmpruntForm' => $ajoutEmpruntForm,
                                                     'listeEmprunteurs' => $listeEmprunteurs,
                                                     'enseignants' => $enseignants]);
    }


    /**
     * Redirection vers la liste des remboursements
     * Ici, on insère simplément des emprunts négatifs
     */
    public function actionListeremboursements()
    {
        $emprunt = new Emprunt();

        //Liste des enseignants
        $enseignants = Yii::$app->db->createCommand("SELECT id, username FROM user")->queryAll();

        // Jointure des tables enseignants et epargnes
        $post = Yii::$app->db->createCommand("SELECT * FROM enseignant JOIN emprunt ON idenseignant=enseignant_idenseignant ORDER BY nom ASC;")->queryAll();

        // Représente le formulaire de remboursement
        $remboursementForm = new RemboursementForm();

        // Liste des emprunteurs
        $listeEmprunteurs = Yii::$app->db->createCommand("SELECT id, username, sum(montant) as montant , session, interet, databutoir FROM user JOIN emprunt ON id=enseignant_idenseignant GROUP BY username ORDER BY username ASC ;")->queryAll();

        // Si le formulaire est validé alors
        if($remboursementForm->load(Yii::$app->request->post()) && $remboursementForm->validate())
        {
            $dateButoir = Yii::$app->db->createCommand("SELECT ADDDATE('" . $remboursementForm->session . "',interval 3 month) as datebutoir")->queryOne()["datebutoir"];
            $emprunt->montant = -1 * $remboursementForm->montant;
            $emprunt->session = $remboursementForm->session;
            if($_SERVER["REQUEST_METHOD"] == "POST")
                $emprunt->enseignant_idenseignant = $_POST["select"];

            $emprunt->interet = 0.01;
            $emprunt->databutoir = $dateButoir;
            $emprunt->save();
            $this->refresh();
        }
        return $this->render('listeremboursements', ['post' => $post,
                                     'remboursementForm' => $remboursementForm,
                                    'listeEmprunteurs' => $listeEmprunteurs,
                                    'enseignants' => $enseignants]);
    }

    /**
     * Redirige vers la page des fonds sociaux
     */

    public function actionFondsocial()
    {
        $fondsocial = new Fondsocial();
        $retraitFondForm = new RetraitFondForm();

        $totalfonds = Yii::$app->db->createCommand("SELECT sum(montant) as montant FROM fondsocial ")->queryOne()["montant"];
        return $this->render('fondsocial', [
            "totalfonds" => $totalfonds,
        ]);
    }

}
