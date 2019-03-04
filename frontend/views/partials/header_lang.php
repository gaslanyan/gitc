<!--START HEADER-->
<header>
    <div class="gitc_container">
        <div class="gitc_top_bar">
            <nav class="col-md-6 col-xs-12">
                <ul class="fa-ul">
                    <li class="fa-li ">
                        <a href="" class="icon fa-stack">
                            <i class="fa fa-circle-thin fa-stack-2x"></i>
                            <i class="fa fa-twitter fa-stack-1x"></i>
                        </a>
                    </li>
                    <li class="fa-li">
                        <a href="" class="icon fa-stack ">
                            <i class="fa fa-circle-thin fa-stack-2x"></i>
                            <i class="fa fa-facebook fa-stack-1x "></i>
                        </a>
                    </li>
                    <li class="fa-li">
                        <a href="" class="icon fa-stack">
                            <i class="fa fa-circle-thin fa-stack-2x"></i>
                            <i class="fa fa-rss fa-stack-1x"></i>
                        </a>
                    </li>
                    <li class="fa-li">
                        <a href="" class="icon fa-stack">
                            <i class="fa fa-circle-thin fa-stack-2x"></i>
                            <i class="fa fa-pinterest fa-stack-1x"></i>
                        </a>
                    </li>
                    <li class="fa-li">
                        <a href="" class="icon fa-stack">
                            <i class="fa fa-circle-thin fa-stack-2x"></i>
                            <i class="fa fa-google-plus fa-stack-1x"></i>
                        </a>
                    </li>
                    <li class="fa-li">
                        <a href="" class="icon fa-stack">
                            <i class="fa fa-circle-thin fa-stack-2x"></i>
                            <i class="fa fa-youtube fa-stack-1x"></i>
                        </a>
                    </li>


                </ul>
            </nav>
            <nav class="lng">
                <ul class="fa-ul">
                    <!--                    <li class="fa-li">-->
                    <!--                        <a href="" class="icon fa-stack lng">-->
                    <!--                            <i class="am"></i>-->
                    <!--                        </a>-->
                    <!--                    </li>-->
                    <!--                    <li class="fa-li">-->
                    <!--                        <a href="" class="icon fa-stack lng">-->
                    <!--                            <i class="en"></i>-->
                    <!--                        </a>-->
                    <!--                    </li>-->

                    <?php

                    foreach (Yii::$app->params['languages'] as $key => $lang) {
                        ?>
                        <li class="langs">

                            <i class="language" id="<?= $key ?>"><?= $lang ?></i>

                        </li>
                        <?php
                    }
                    ?>

                </ul>
            </nav>
        </div>
        <figure id="gitc_logo">
            <a href="<?= Yii::$app->homeUrl ?>"><img src="<?= Yii::$app->homeUrl ?>image/logo.png" alt="gitc"
                                                     title="<?= Yii::t('app', 'GITC') ?>"></a>
            <figcaption>
                <h1><?= Yii::t('app', 'GYUMRI INFORMATION TECHNOLOGIES CENTER') ?></h1>
            </figcaption>
        </figure>
        <div class="buttons">
            <!--            <form>-->
            <!--                <input type="submit" value="Apply now">-->
            <!--            </form>-->
            <!--            <form>-->
            <a href="<?= Yii::$app->homeUrl ?>enroll"><input type="submit"
                                                             value="<?= Yii::t('app', 'Enroll now') ?>"></a>
            <!--            </form>-->
        </div>
        <!--        <div class="search">-->
        <!--            <span class="fa fa-search"></span>-->
        <!--            <input placeholder="Search term">-->
        <!--        </div>-->

        <nav class="gitc_menu">
            <ul>
                <li>
                    <a href="<?= Yii::$app->homeUrl . Yii::$app->language ?>" class="active"><?= Yii::t('app',
                            'HOME') ?></a>
                </li>

                <li>
                    <a href="<?= Yii::$app->homeUrl . Yii::$app->language ?>/site/about"><?= Yii::t('app',
                            'ABOUT US') ?></a>
                </li>
                <li>
                    <a href="<?= Yii::$app->homeUrl . Yii::$app->language ?>/site/education"><?= Yii::t('app',
                            'EDUCATION') ?></a>
                </li>
                <li>
                    <a href="<?= Yii::$app->homeUrl . Yii::$app->language ?>/site/careers"><?= Yii::t('app',
                            'CAREERS') ?></a>
                </li>
                <li>
                    <a href="<?= Yii::$app->homeUrl . Yii::$app->language ?>/site/contact"><?= Yii::t('app',
                            'CONTACT US') ?></a>
                </li>
            </ul>

        </nav>


    </div>
</header>
<!--END HEADER-->