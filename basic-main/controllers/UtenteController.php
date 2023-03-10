<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Utente;

class UtenteController extends Controller
{
    public function actionIndex()
    {
        $query = Country::find();

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $utenti = $query->orderBy('name')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'utenti' => $utenti,
            'pagination' => $pagination,
        ]);
    }
}