<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 11/4/2017
 * Time: 2:05 AM
 */

namespace frontend\components;

use common\models\Subjects;
use Yii;

class Helper
{
    public static function getSubjectNames($subjects)
    {
        if ($subjects) {
            $str = '';
            foreach ($subjects as $key => $sub) {
                $model = Subjects::find()->where(['id' => $sub])->one();
                if ($key == 1) {
                    $str = $model->title_hy;
                } else {
                    $str .= ',' . $model->title_hy;
                }
            }
            return $str;
        } else {
            return Yii::t('app', 'No subjects selected');
        }


    }

    public static function under_header($img, $title)
    {
//        echo $_SERVER['REMOTE_ADDR'];
        if (Yii::$app->controller->action->id === "index"
            && Yii::$app->controller->id === "site"
        ): ?>
            <section id="gitc_banner" >
<!--                <div class="gitc_inner-enroll">-->
<!--                    <a href="#gitc-enroll-form">-->
<!--                        --><?//= Yii::t('app', 'Enroll now'); ?>
<!--                    </a>-->
<!--                </div>-->
                <video playsinline autoplay loop muted controls id="video">
                    <source src="<?= \yii\helpers\Url::home(); ?>image/banner.mp4" type="video/mp4">
                    <source src="<?= \yii\helpers\Url::home(); ?>image/banner.webm" type="video/webm">
                    <source src="<?= \yii\helpers\Url::home(); ?>image/banner.ogv" type="video/ogg">
<!--                    <object id="flowplayer" data="flowplayer-3.2.2.swf" type="application/x-shockwave-flash" width="320" height="240" >-->
<!--                        <param name="movie" value="flowplayer-3.2.2.swf">-->
<!--                        <param name="allowfullscreen" value="true">-->
<!--                        <param name="flashvars" value="config={'clip':{'url':'banner.mp4','autoPlay':false}}">-->
<!--                    </object>-->
                </video>
            </section>

        <?php endif;

        if (Yii::$app->controller->id === "training"
            || Yii::$app->controller->id === "about"):

            if (!empty($img['img'])):?>
                <section class="gitc_training-banner gitc_banner" style="background-image: url('<?= $img['img']; ?>')">
                    <div class="gitc_wrapper">
                        <div class="gitc_training">
                            <p><?= $title; ?></p>
                        </div>
                    </div>
                </section>
            <?php else: ?>
                <?= \frontend\widgets\MediaWidget::widget(); ?>
            <?php endif; ?>
        <?php endif; ?>
        <?php if (Yii::$app->controller->id === "projects"): ?>
        <section class="gitc_project-banner gitc_banner">
            <div class="gitc_wrapper">
                <div class="gitc_projects">
                    <p><?= Yii::t('app', 'Projects'); ?></p>
                </div>
            </div>
        </section>
        <?php elseif (Yii::$app->controller->id === "regions"): ?>
            <section class="gitc_region-banner gitc_banner">
                <div class="gitc_wrapper">
                    <div class="gitc_regions">
                        <p><?= Yii::t('app', 'GITC in'); ?></p>
                    </div>
                </div>
            </section>
    <?php endif;
        if (Yii::$app->controller->action->id === "contact"):
            ?>

            <?= \frontend\widgets\MapWidget::widget(); ?>
        <?php endif;
    }
}