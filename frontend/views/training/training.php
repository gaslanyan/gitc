<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 10/18/2017
 * Time: 2:09 AM
 */
$this->title = $content['name'];


$this->params['breadcrumbs']['img'] = $thread['img_name'];


$this->registerMetaTag(['name' => 'keywords', 'content' => $content['keywords']]);

$this->registerMetaTag(['name' => 'description', 'content' => $content['description']]);

?>
<?php if (!empty($content)): ?>
    <section class="gitc_training_info">

        <div>
            <p><i class="fa fa-calendar" aria-hidden="true"></i>
                <?= Yii::t('app', 'Starting Date'); ?>
            </p>
            <p><?= $content['start'] ?></p>
        </div>
        <div>
            <p><i class="fa fa-calendar" aria-hidden="true"></i>
                <?= Yii::t('app', 'Training Days'); ?>
            </p>
            <p><?= $content['day'] ?></p>
        </div>
        <div>
            <p><i class="fa fa-clock-o" aria-hidden="true"></i>
                <?= Yii::t('app', 'Training Duration'); ?>
            </p>
            <p><?= $content['duration'] ?></p>
        </div>
        <div>
            <p><i class="fa fa-clock-o" aria-hidden="true"></i>
                <?= Yii::t('app', 'Training Hours'); ?>
            </p>
            <p><?= $content['hours'] ?></p>
        </div>
    </section>
    <section class="training">
        <article class="gitc_wrapper">
            <h2 class="gitc_our"> <?= $content['name'] ?></h2>
            <?= $content['content'] ?>
            <div class="addthis_native_toolbox"></div>
        </article>
        <?php if ($thread['status'] === 'popular'): ?>
            <?= \frontend\widgets\EnrollWidget::widget(['title' => $thread['slug']]); ?>
        <?php endif; ?>

    </section>
<?php endif; ?>