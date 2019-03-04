<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 5/5/2016
 * Time: 9:29 PM
 */
use backend\assets\AppAsset;

AppAsset::register($this);

?>
<ul>
    <?php
    $pageInfo = \common\models\Pages::find()->where([
        'is_active' => 1,
        'active_in_menu' => 1
    ])->asArray()->all();
    $temp = [];
    foreach ($pageInfo as $key => $info) {
        $temp[$key] = json_decode($info['content'], true);
        $temp[$key]['slug'] = $info['slug'];
    }

    ?>

    <li>
        <a href="<?= Yii::$app->homeUrl ?>about" <?= Yii::$app->controller->id == 'about' ? "class='active'" : '' ?>><?= Yii::t('app',
                'ABOUT') ?></a>
    </li>
    <li>
        <a href="<?= Yii::$app->homeUrl ?>projects" <?= Yii::$app->controller->id == 'projects' ? "class='active'" : '' ?>><?= Yii::t('app',
                'Projects') ?></a>
    </li>
    <li>
        <a href="<?= Yii::$app->homeUrl ?>training" <?= Yii::$app->controller->id == 'training' ? "class='active'" : '' ?>><?= Yii::t('app',
                'Training') ?></a>
    </li>
    <li>
        <a href="<?= Yii::$app->homeUrl ?>news" <?= Yii::$app->controller->id == 'news' ? "class='active'" : '' ?>><?= Yii::t('app',
                'Life in GITC') ?></a>
    </li>
    
    <li>
        <a href="<?= Yii::$app->homeUrl ?>regions" <?= Yii::$app->controller->id == 'regions' ? "class='active'" : '' ?>><?= Yii::t('app',
                'GITC in') ?></a>
    </li>
    
    <li>
        <a href="<?= Yii::$app->homeUrl ?>site/contact" <?= Yii::$app->controller->action->id == 'contact' ? "class='active'" : '' ?>><?= Yii::t('app',
                'CONTACT US') ?></a>
    </li>
    <li class="nav-item">
        <div class="lang non_padding  text-uppercase">
            <div class="drop-down">
                <div class="selected">

                    <div><span><?= Yii::t('app', \Yii::$app->language); ?></span></div>
                </div>
                <div class="options">

                    <ul>
                        <?php foreach (Yii::$app->params['languages'] as $key => $v):?>
                            <li>
                                <i class="lng" id="<?= $key; ?>"><?= Yii::t('app', $v); ?></i>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </li>
</ul>