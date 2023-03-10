<?php
include('../views/site/modello.php');
/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
    <?php
    NavBar::begin([
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            $GLOB_TIPO == 'none' ? (
                ['label' => '', 'url' => ['/site/login']]
            ) : (
                ['label' => 'Logout', 'url' => ['/site/esci']]
            ),
            $GLOB_TIPO == 'none' ? (
                ['label' => '', 'url' => ['/site/login']]
            ) : (
                ['label' => 'Informazioni account', 'url' => ['/site/infoaccount']]
            ),
            $GLOB_TIPO == 'logopedista' ? (
                ['label' => 'Chat', 'url' => ['/site/chatlogopedista']]
            ) : (
                ['label' => '', 'url' => ['/site/login']]
            ),
            $GLOB_TIPO == 'caregiver' ? (
                ['label' => 'Chat', 'url' => ['/site/chatcaregiver']]
            ) : (
                ['label' => '', 'url' => ['/site/login']]
            ),
        ],
    ]);
    NavBar::end();
    ?>
</header>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer class="footer mt-auto py-3 text-muted">
    <div class="container">
        <p class="float-left">&copy; Pronuntia <?= date('Y') ?></p>
        <p class="float-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
