<?php

use yii\widgets; ?>
<div class="menu_header">
    <div class="gitc_container">
        <?php
        $this->title = Yii::t('app', 'Alumni');
        $this->params['breadcrumbs'][] = $this->title;
        echo "<h2>" . $this->title . "</h2>";
        ?>

    </div>
</div>
<?php
$this->registerMetaTag(['name' => 'keywords', 'content' => Yii::t('app', 'Alumni')]);
$this->registerMetaTag(['name' => 'description', 'content' => Yii::t('app', 'Alumni')]);
if (!empty($alumniList)): ?>
    <section class="container">
        <div class="gitc_container">
            <ul class="list-group alumni-list">
                <?php foreach ($alumniList as $item): ?>
                    <li class="list-group-item">
                        <a
                            href="<?= Yii::$app->homeUrl ?>alumni/<?= $item['id']; ?>"
                            class="text-capitalize alumni_info"><?= $item['name'] . " " . $item['surname'] . " " . $item['fname']; ?>
                        </a>
                        <a
                            href="<?= Yii::$app->homeUrl ?>alumni/<?= $item['id']; ?>"
                            class="text-capitalize alumni_tl"><?= $item['profession']; ?>
                        </a>
<!--                        <div class="text-capitalize alumni_tl">-->
<!--                            --><?php //if (!empty($item['technical_languages'])): ?>
<!--                                --><?php //foreach (json_decode($item['technical_languages']) as $index => $i) : ?>
<!--                                    <span>-->
<!--                            --><?//= $i; ?>
<!--                        </span>-->
<!--                                --><?php //endforeach; ?>
<!--                            --><?php //endif; ?>
<!--                        </div>-->
                    </li>

                <?php endforeach; ?>
            </ul>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                <?= widgets\LinkPager::widget(['pagination' => $pagination]); ?>
            </div>
        </div>
    </section>
<?php endif; ?>

