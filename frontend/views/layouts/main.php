<?php

/* @var $this \yii\web\View */

/* @var $content string */

use frontend\assets\AppAsset;
use frontend\components\Helper;
use yii\helpers\Html;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <style>
        <?= Yii::$app->language == 'en'?"
        body{font-family: 'Emoji',sans-serif}":"body{font-family: 'ArialAMU',sans-serif}" ?>
    </style>
    <!--[if IE]>
    <link href="stylesheets/ie.css" media="screen, projection" rel="stylesheet" type="text/css"/>
    <script>
        var _csrf = "<?= Yii::$app->request->getCsrfToken()?>";
    </script>
    <![endif]-->
</head>
<body>
<?php $this->beginBody() ?>
<?= $this->render('../partials/header');
?>
<?php Helper::under_header($this->params['breadcrumbs'], $this->title) ?>
<?= $content ?>
<?= $this->render('../partials/footer') ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
