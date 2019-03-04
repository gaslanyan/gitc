<?php

$this->title = Yii::t('app', 'News & Events');
$this->params['breadcrumbs'][] = $this->title;

$this->registerMetaTag(['name' => 'keywords', 'content' => Yii::t('app', 'News & Events')]);
$this->registerMetaTag(['name' => 'description', 'content' => Yii::t('app', 'News & Events')]);


if (!empty($newsContent)): ?>
    <section class="gitc_wrapper">

        <div class="gitc_news_block">
            <aside class="gitc_news">
                <div class="pagerNavigation pagerNavigationTop">
                    <span class="top"><i class="fa fa-angle-up"></i></span>
                </div>
                <ul class="gitc_trainings ">
                    <?php foreach ($newsContent as $item): ?>
                        <li>
                            <a href="<?= Yii::$app->homeUrl ?>news/index/<?= $item['slug']; ?>"
                               class="text-capitalize">
                                <?= $item['content'][Yii::$app->language]['name']; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>

                <div class="pagerNavigation pagerNavigationBottom">
                    <span class="bottom"><i class="fa fa-angle-down"></i></span>
                </div>
            </aside>
            <article class="gitc_news_more">
                <?php
                $getRequest = Yii::$app->request->get();
                if (!empty($thread)): ?>

                    <div class="news-content">

                        <h3 class="gitc_training_title">
                            <?= $lcontent['name']; ?>
                        </h3>
                        <article class="gitc_news_more_content">
                            <?php if (!empty($result)): ?>

                                <img <?= $result[0][0] ?> alt="<?= $lcontent['name']; ?>" class="gitc_news_image">
                            <?php endif; ?>
                            <p><?= $content; ?></p>

                        </article>
                        <div class="gitc_clear"></div>
                        <?php if (!empty($result) && count($result[0]) > 1): ?>

                            <section class="gitc_news_carousel slider-nav" id="slick-demo">
                                <?php $carousel = []; ?>
                                <?php foreach ($result[0] as $k => $v): ?>
                                    <div data-toggle="modal" data-target="#myModal">
                                        <img <?= $v; ?> alt="<?= $lcontent['name'] ?>">
                                    </div>
                                <?php endforeach; ?>
                            </section>
                        <?php endif; ?>
                        <div class="addthis_native_toolbox"></div>
                    </div>
                <?php endif; ?>

            </article>
        </div>
    </section>
<?php endif; ?>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="slider-for">
                    <?php if (!empty($result)): ?>
                        <?php foreach ($result[0] as $k => $item): ?>
                            <div>
                                <img <?= $item ?> alt="carousel" class="news_img" >
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>
</div>

