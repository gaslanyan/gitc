<?php


/* @var $this yii\web\View */


$this->title = $content['name'];


$this->params['breadcrumbs'][] = $this->title;


$this->registerMetaTag(['name' => 'keywords', 'content' => $content['keywords']]);

$this->registerMetaTag(['name' => 'description', 'content' => $content['description']]);
?>

<div class="pages container">
    <?php if ($slug === "about"): ?>

        <div class="gitc_our-staff">
            <div class="gitc_wrapper">
                <h2 class="gitc_our"><?= Yii::t('app', 'Our Staff'); ?></h2>
                <div class="gitc_staff">
                    <?php if (!empty($content['s_name'])): ?>
                        <?php foreach ($content['s_name'] as $k => $v): ?>

                            <div class="gitc_staff-circle">
                                <figure>
                                    <div>
                                        <img src="<?= $content['s_image'][$k]; ?>">
                                    </div>
                                    <?php if (!empty($content['s_linkedin'][$k])): ?>
                                        <a target="_blank"
                                           href="<?php echo $content['s_linkedin'][$k]; ?>">
                                            <img src="<?= Yii::$app->homeUrl ?>image/in.png" class="gitc_in"
                                                 alt="linkedin">
                                        </a>
                                    <?php endif; ?>
                                    <figcaption><?= $content['s_name'][$k]; ?>
                                        <span><?= $content['s_profession'][$k]; ?></span>
                                    </figcaption>
                                </figure>

                            </div>

                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <div class="gitc_arrow-block arrow_staff">
                    <img src="<?= Yii::$app->homeUrl ?>image/arrow.png" alt="arrow">
                </div>
                <input type="hidden" name="s_name" value="<?= count($content['s_name']) ?>">
            </div>
        </div>
        <?php if (!empty($content['l_name'])): ?>
            <div class="gitc_our-staff">
                <div class="gitc_wrapper">
                    <h2 class="gitc_our"><?= Yii::t('app', 'Our Trainers'); ?></h2>
                    <div class="gitc_staff">

                        <?php foreach ($content['l_name'] as $k => $v): ?>

                            <div class="gitc_staff-circle">
                                <figure>
                                    <div>
                                        <img src="<?= $content['l_image'][$k]; ?>">
                                    </div>
                                    <?php if (!empty($content['l_linkedin'][$k])): ?>
                                        <a href="<?= $content['l_linkedin'][$k]; ?> " target="_blank">
                                            <img src="<?= Yii::$app->homeUrl ?>image/in.png" class="gitc_in"
                                                 alt="linkedin">
                                        </a>
                                    <?php endif; ?>
                                    <figcaption><?= $content['l_name'][$k]; ?>
                                        <span><?= $content['l_profession'][$k]; ?></span>
                                    </figcaption>
                                </figure>

                            </div>

                        <?php endforeach; ?>

                    </div>

                    <div class="gitc_arrow-block arrow_lecture">
                        <img src="<?= Yii::$app->homeUrl ?>image/arrow.png" alt="arrow">
                    </div>
                    <input type="hidden" name="l_name" value="<?= count($content['l_name']) ?>">
                </div>
            </div>
        <?php endif; ?>

    <?php endif; ?>
    <div class="gitc_wrapper">
        <?= $content['content'] ?>
    </div>
    <?php if ($slug === "about"): ?>
        <?php if (!empty($media)): ?>
            <div class="gitc_wrapper">
                <h2 class="gitc_our"><?= Yii::t('app', 'media'); ?></h2>
                <!--                <div class="pagerNavigation pagerNavigationTop">-->
                <!--                    <span class="top"><i class="fa fa-angle-up"></i></span>-->
                <!--                </div>-->
                <div class="gitc_student_opinion_block media_tv">
                    <?php foreach ($media as $k => $v): ?>
                        <article class="gitc_one_student_opinion">
                            <div class="gitc_student_img">
                                <div class="gitc_student_circle">
                                    <figure>

                                        <a href="<?= $v['video'] ?>" target="_blank">
                                            <img class="student" src="<?= $v['img_name']; ?>" alt="student">
                                        </a>
                                    </figure>
                                </div>
                            </div>
                            <div class="gitc_student_opinion">
                                <p class="gitc_student_name_line">
                                    <a href="<?= $v['video'] ?>" target="_blank">
                            <span class="gitc_student_name">
                                <?= $v['content']['name']; ?>
                            </span>
                                    </a>
                                    <?= $v['date']; ?> </p>
                                <p class="gitc_student_opinion_p">
                                    <?= $v['content']['content']; ?>
                                </p>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
                <div class="pagerNavigation pagerNavigationBottom">
                    <span class="bottom"><i class="fa fa-angle-down"></i></span>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>
</div>

