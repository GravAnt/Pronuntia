<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Seduta */

$this->title = 'Create Seduta';
$this->params['breadcrumbs'][] = ['label' => 'Seduta', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seduta-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
