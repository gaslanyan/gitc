<!--START HEADER-->

    <header>
        <div class="gitc_wrapper">
        <figure class="gitc_logo_block">
            <a href="<?= Yii::$app->homeUrl ?>">
                <img src="<?= Yii::$app->homeUrl ?>image/logo.png" alt="gitc"
                     title="<?= Yii::t('app', 'GITC') ?>">
            </a>
            <figcaption>
                <h1 class=""><a
                            href="<?= Yii::$app->homeUrl ?>"><?= Yii::t('app', 'GYUMRI INFORMATION TECHNOLOGIES CENTER') ?></a>
                </h1>
            </figcaption>
        </figure>
        <div id="mobile_menu"></div>
        <nav class="gitc_menu_block  transform desktop">
            <?= \frontend\widgets\HeaderWidget::widget(); ?>
        </nav>
        </div>
        <nav class="gitc_menu_block  transform mobile">
            <?= \frontend\widgets\HeaderWidget::widget(); ?>
        </nav>
    </header>
<main>
<!--END HEADER-->