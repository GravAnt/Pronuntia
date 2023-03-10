<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

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

    public function actionRegistrazione()
    {
        return $this->render('registrazione');
    }

    public function actionEsitoregistrazione()
    {
        return $this->render('esitoregistrazione');
    }

    public function actionAssociautente()
    {
        return $this->render('associautente');
    }

    public function actionEsitoassociazione()
    {
        return $this->render('esitoassociazione');
    }

    public function actionListapazienti()
    {
        return $this->render('listapazienti');
    }

    public function actionListadiagnosi()
    {
        return $this->render('listadiagnosi');
    }

    public function actionListaterapie()
    {
        return $this->render('listaterapie');
    }

    public function actionListaesercizi()
    {
        return $this->render('listaesercizi');
    }

    public function actionAssociadiagnosi()
    {
        return $this->render('associadiagnosi');
    }

    public function actionEsitodiagnosi()
    {
        return $this->render('esitodiagnosi');
    }

    public function actionAssociaterapia()
    {
        return $this->render('associaterapia');
    }

    public function actionEsitoterapia()
    {
        return $this->render('esitoterapia');
    }

    public function actionListasedute()
    {
        return $this->render('listasedute');
    }

    public function actionCambiastatoseduta()
    {
        return $this->render('cambiastatoseduta');
    }

    public function actionAutenticazione()
    {
        return $this->render('autenticazione');
    }

    public function actionEsitologin()
    {
        return $this->render('esitologin');
    }

    public function actionModello()
    {
        return $this->render('modello');
    }
    
    public function actionPrenotaseduta()
    {
        return $this->render('prenotaseduta');
    }

    public function actionEsitoseduta()
    {
        return $this->render('esitoseduta');
    }

    public function actionEseguiterapia()
    {
        return $this->render('eseguiterapia');
    }

    public function actionEseguiesercizio()
    {
        return $this->render('eseguiesercizio');
    }

    public function actionEsitoesercizio()
    {
        return $this->render('esitoesercizio');
    }

    public function actionEsci()
    {
        return $this->render('esci');
    }

    public function actionEsitologout()
    {
        return $this->render('esitologout');
    }

    public function actionInfoaccount()
    {
        return $this->render('infoaccount');
    }

    public function actionClassificautenti()
    {
        return $this->render('classificautenti');
    }

    public function actionChatlogopedista()
    {
        return $this->render('chatlogopedista');
    }

    public function actionChatcaregiver()
    {
        return $this->render('chatcaregiver');
    }

    public function actionEsitomessaggio()
    {
        return $this->render('esitomessaggio');
    }

}

