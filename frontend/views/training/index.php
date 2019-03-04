<?php

$this->title = Yii::t('app', 'Training');
$this->params['breadcrumbs'][] = $this->title;

$this->registerMetaTag(['name' => 'keywords', 'content' => Yii::t('app', 'News & Events')]);
$this->registerMetaTag(['name' => 'description', 'content' => Yii::t('app', 'News & Events')]);

?>
<section class="gitc_wrapper training">
    <?php if (!empty($popular)): ?>
        <h2 class="gitc_our"><?= Yii::t('app', 'Suggested Courses'); ?></h2>
        <div class="gitc_courses">
            <?php foreach ($popular as $key => $item) : ?>
                <div class="gitc_one_course">
                    <div class="gitc_course_logos">
                        <i class="fa <?= $item['icon']; ?> fa-3x" aria-hidden="true"></i>
                    </div>
                    <p>
                        <?= $item['content']['name'] ?>
                    </p>
                    <a href="<?= Yii::$app->homeUrl ?>training/<?= $item['slug']; ?>" class="gitc_learn_more_btn">
                        <?= Yii::t('app', 'Learn more'); ?>
                    </a>
                </div>

            <?php endforeach; ?>

        </div>
    <?php endif; ?>
    <?php if (!empty($other)): ?>
        <h2 class="gitc_our"><?= Yii::t('app', 'Current Courses'); ?></h2>
        <div class="gitc_other_courses">
            <?php foreach ($other as $key => $item) : ?>
                <div class="gitc_one_course_other">
                    <div class="gitc_course_logos">
                        <i class="fa <?= $item['icon']; ?> fa-3x" aria-hidden="true"></i>
                    </div>
                    <p>
                        <?= $item['content']['name'] ?>
                    </p>
                    <a href="<?= Yii::$app->homeUrl ?>training/<?= $item['slug']; ?>"" class="gitc_learn_more_btn">
                    <?= Yii::t('app', 'Learn more'); ?>
                    </a>
                </div>

            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <h2 class="gitc_training_title"><?= Yii::t('app', 'Results'); ?></h2>
    <?= \frontend\widgets\ResultWidget::widget(); ?>
    <?php if (!empty($options)): ?>
        <h2 class="gitc_our"><?= Yii::t('app', 'Opinion of Students'); ?></h2>
        <div class="gitc_student_opinion_block">
            <?php foreach ($options as $k => $v): ?>
                <article class="gitc_one_student_opinion">
                    <div class="gitc_student_img">
                        <div class="gitc_student_circle">
                            <figure>
                                <img class="student" src="<?= $v['img_name']; ?>" alt="student">

                            </figure>
                        </div>
                    </div>
                    <div class="gitc_student_opinion">
                        <p class="gitc_student_name_line">
                            <span class="gitc_student_name">
                                <?= $v['content']['name']; ?>
                            </span>
                            <!--                            --><? //= $v['content']['status'];?><!-- </p>-->
                        <p class="gitc_student_opinion_p">
                            <?= $v['content']['content']; ?>
                        </p>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <?php if (!empty($work)): ?>
        <h2 class="gitc_our"><?= Yii::t('app', 'Our Students Work') ?></h2>
        <section class="gitc_student_work">
            <?php foreach ($work as $k => $v): ?>
                <div class="gitc_student_work_company">
                    <a href="<?= $v['link']; ?>" target="_blank">
                        <img src="<?= $v['name']; ?>" alt="w_p">
                    </a>
                </div>
            <?php endforeach; ?>
        </section>
    <?php endif ?>
</section>
