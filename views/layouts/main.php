<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => Yii::t( 'app', 'Admin' ), 'items' => [
                ['label' => Yii::t( 'app', 'City' ),              'url' => ['/admin/city']],
                ['label' => Yii::t( 'app', 'Club' ),              'url' => ['/admin/club']],
                ['label' => Yii::t( 'app', 'Gender' ),            'url' => ['/admin/gender']],
                ['label' => Yii::t( 'app', 'Echelon' ),           'url' => ['/admin/echelon']],
                ['label' => Yii::t( 'app', 'Participant' ),       'url' => ['/admin/participant']],
                ['label' => Yii::t( 'app', 'Qualifying Scheme' ), 'url' => ['/admin/qualifying-scheme']],
                ['label' => Yii::t( 'app', 'Nomination' ),        'url' => ['/admin/nomination']],
                ['label' => Yii::t( 'app', 'Tournament' ),        'url' => ['/admin/tournament']],
            ]],

            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; No-Name <?= date('Y') ?></p>
        <p class="pull-right">Created by <?= Html::a('Nick', '//NikitaGermanov.ru'); ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
