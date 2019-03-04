<?php

//$this->title = $content['name'];

//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'News & Events'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;

//$this->registerMetaTag(['name' => 'keywords', 'content' => $content['keywords']]);
//$this->registerMetaTag(['name' => 'description', 'content' => $content['description']]);

$getRequest = Yii::$app->request->get();
?>
<?php if (!empty($alumni_content)): ?>
    <section class="container">
        <div class="menu_header">
            <div class="gitc_container">
                <h2><a href="<?= Yii::$app->homeUrl ?>alumni/sample/<?= $alumni_content['id']?>" style="color: #fff" target="_blank" ><?= strtoupper(Yii::t('app', 'download  resume of alumni'))?></a></h2>
            </div>
        </div>
        <div class="alumni_cv ">
            <aside class="col-lg-4 col-md-4 ">
                <ul class="alumni">
                    <li>
                        <div class="col-lg-2>">
                                <span class="fa-li">
                                    <a href="" class="icon fa-stack ">
                                        <i class="fa  fa-stack-2x"></i>
                                        <i class="fa fa-user fa-stack-1x "></i>
                                    </a>
                                </span>
                        </div>
                        <div class="col-lg-10">
                            <h5 class=""><?php if (!empty($alumni_content['name'])) echo $alumni_content['name'] . " ";
                                if (!empty($alumni_content['surname'])) echo $alumni_content['surname'] . " ";
                                if (!empty($alumni_content['fname'])) echo $alumni_content['fname']; ?>
                            </h5>
                            <em class='a_info text-center'><?php if (!empty($alumni_content['fname'])) echo $alumni_content['profession']; ?></em>
                        </div>
                    </li>
                    <?php if (!empty($alumni_content['birthday'])): ?>
                        <li>
                            <div class="col-lg-2>">
                                        <span class="fa-li">
                                            <a href="" class="icon fa-stack ">
                                                <i class="fa  fa-stack-2x"></i>
                                                <i class="fa fa-birthday-cake fa-stack-1x "></i>
                                            </a>
                                        </span>
                            </div>
                            <div class="col-lg-10">
                                <span class='a_info'><?= 'Birth date <br>' . $alumni_content['birthday']; ?></span>
                            </div>
                        </li>
                    <?php endif; ?>
                    <?php if (!empty($alumni_content['phone'])): ?>
                        <li>
                            <div class="col-lg-2>">
                                        <span class="fa-li">
                                            <a href="" class="icon fa-stack ">
                                                <i class="fa  fa-stack-2x"></i>
                                                <i class="fa fa-phone fa-stack-1x "></i>
                                            </a>
                                        </span>
                            </div>
                            <div class="col-lg-10">
                                <span class='a_info'><?= '(+374) ' . $alumni_content['phone']; ?></span>
                            </div>
                        </li>
                    <?php endif; ?>
                    <?php if (!empty($alumni_content['e-mail'])): ?>
                        <li>
                            <div class="col-lg-2>">
                                        <span class="fa-li">
                                            <a href="" class="icon fa-stack ">
                                                <i class="fa  fa-stack-2x"></i>
                                                <i class="fa fa-envelope fa-stack-1x "></i>
                                            </a>
                                        </span>
                            </div>
                            <div class="col-lg-10">
                                <span class='a_info'><?= $alumni_content['e-mail']; ?></span>
                            </div>
                        </li>
                    <?php endif; ?>
                    <?php if (!empty($alumni_content['address'])): ?>
                        <li>
                            <div class="col-lg-2>">
                                        <span class="fa-li">
                                            <a href="" class="icon fa-stack ">
                                                <i class="fa  fa-stack-2x"></i>
                                                <i class="fa fa-home fa-stack-1x "></i>
                                            </a>
                                        </span>
                            </div>
                            <div class="col-lg-10">
                                <span class='a_info'><?= $alumni_content['address']; ?></span>
                            </div>
                        </li>
                    <?php endif; ?>
                    <?php if (!empty($alumni_content['languages'])): ?>
                        <li>
                            <div class="col-lg-2>">
                                        <span class="fa-li">
                                            <a href="" class="icon fa-stack ">
                                                <i class="fa fa-language  fa-stack-1x "></i>
                                            </a>
                                        </span>
                            </div>
                            <div class="col-lg-10">

                                <?php foreach ($alumni_content['languages'] as $index => $item) : ?>
                                    <div><span class='a_info_span'><?= Yii::t('app', $item); ?></span></div>
                                <?php endforeach; ?>

                            </div>
                        </li>
                    <?php endif; ?>
                    <?php if (!empty($alumni_content['technical_languages'])): ?>
                        <li>
                            <div class="col-lg-2>">
                                        <span class="fa-li">
                                            <a href="" class="icon fa-stack ">
                                                <i class="fa fa-pencil fa-stack-1x "></i>
                                            </a>
                                        </span>
                            </div>
                            <div class="col-lg-10">

                                <?php foreach ($alumni_content['technical_languages'] as $index => $item) : ?>
                                    <div><span class='a_info_span'><?= $item; ?></span></div>
                                <?php endforeach; ?>

                            </div>
                        </li>
                    <?php endif; ?>
                    <?php if (!empty($alumni_content['occupation'])): ?>
                        <li>
                            <div class="col-lg-2>">
                                        <span class="fa-li">
                                            <a href="" class="icon fa-stack ">
                                                <i class="fa fa-handshake-o fa-stack-1x "></i>
                                            </a>
                                        </span>
                            </div>
                            <div class="col-lg-10">
                                <span class='a_info'><?= $alumni_content['occupation']; ?></span>
                            </div>
                        </li>
                    <?php endif; ?>
                    <?php if (!empty($alumni_content['family_condition'])): ?>
                        <li>
                            <div class="col-lg-2>">
                                        <span class="fa-li">
                                            <a href="" class="icon fa-stack ">
                                                <i class="fa  fa-stack-2x"></i>
                                                <i class="fa fa-heart fa-stack-1x "></i>
                                            </a>
                                        </span>
                            </div>
                            <div class="col-lg-10">
                                <span class='a_info'><?= $alumni_content['family_condition']; ?></span>
                            </div>
                        </li>
                    <?php endif; ?>
                </ul>
            </aside>
            <section class="col-lg-8">
                <div>
                    <ul class="alumni_ex col-lg-12 ">
                        <?php if (!empty($alumni_content['experience'])): ?>
                            <li class="col-lg-12">
                                <div class="col-lg-1">
                                        <span class="fa-li">
                                            <a href="" class="icon fa-stack ">
                                                <i class="fa fa-briefcase fa-stack-1x "></i>
                                            </a>
                                        </span>
                                </div>
                                <div class="col-lg-11"><span class='a_info_'><?= Yii::t('app','Work Experience');?></span></div>
                                <div class="col-lg-offset-1 col-lg-11">
                                    <ul class="col-lg-12 _alumni_">
                                        <?php foreach ($alumni_content['experience'] as $index => $alumni) : ?>
                                            <?php foreach ($alumni as $i => $item) : ?>
                                                <li><span class=''><?= $item; ?></span></li>
                                            <?php endforeach; ?>
                                        <?php endforeach; ?>
                                    </ul>

                                </div>
                            </li>

                        <?php endif; ?>
                    </ul>
                    <ul class="alumni_ed col-lg-12">
                        <?php if (!empty($alumni_content['education'])): ?>
                            <li class="col-lg-12">
                                <div class="col-lg-1">
                                        <span class="fa-li">
                                            <a href="" class="icon fa-stack ">
                                                <i class="fa fa-graduation-cap fa-stack-1x "></i>
                                            </a>
                                        </span>
                                </div>
                                <div class="col-lg-11"><span class='a_info_'><?= Yii::t('app','Education');?></span></div>
                                <div class="col-lg-12">
                                    <ul class="col-lg-offset-1 col-lg-11 _alumni_">
                                        <?php foreach ($alumni_content['education'] as $index => $alumni) : ?>
                                            <?php foreach ($alumni as $i => $item) : ?>
                                                <li><span class=''><?= $item; ?></span></li>
                                            <?php endforeach; ?>
                                        <?php endforeach; ?>
                                    </ul>

                                </div>
                            </li>

                        <?php endif; ?>
                    </ul>
                    <ul class="alumni_sk col-lg-12">
                        <?php if (!empty($alumni_content['skills'])): ?>
                            <li class="col-lg-12">
                                <div class="col-lg-1">
                                        <span class="fa-li">
                                            <a href="" class="icon fa-stack ">
                                                <i class="fa  fa-stack-2x"></i>
                                                <i class="fa fa-calendar-o fa-stack-1x "></i>
                                            </a>
                                        </span>
                                </div>
                                <div class="col-lg-11"><span class='a_info_'><?= Yii::t('app','Professional Skills');?></span></div>
                                <div class="col-lg-offset-1 col-lg-11 _alumni_">
                                    <span class='a_info'><?= $alumni_content['skills']; ?></span>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                    <ul class="alumni_in col-lg-12">

                        <li class="col-lg-12 ">
                            <div class="col-lg-1">
                                        <span class="fa-li">
                                            <a href="" class="icon fa-stack ">
                                                <i class="fa  fa-stack-2x"></i>
                                                <i class="fa fa-hourglass-half  fa-stack-1x "></i>
                                            </a>
                                        </span>
                            </div>
                            <div class="col-lg-11"><span class='a_info_'><?= Yii::t('app','Interests');?></span></div>
                            <div class="interest col-lg-offset-1 col-lg-11">
                                <?php $list = rand_interest(); ?>
                                <?php foreach ($list as $key => $val): ?>
                                    <span class="fa-li">
                                            <a href="" class="icon fa-stack" title="<?= $key; ?>">
                                                <i class="fa <?= $val; ?> fa-stack-2x "></i>
                                            </a>
                                        </span>
                                <?php endforeach;; ?>
                            </div>
                        </li>

                    </ul>
                </div>
            </section>

        </div>
    </section>

<?php endif; ?>

<?php function rand_interest()
{
    $icons = ['watching' => 'fa-television',
        'taking photo' => 'fa-camera',
        'chatting' => 'fa-weixin',
        'playing games' => 'fa-futbol-o',
        'listening to a music' => 'fa-music',
        'drinking' => 'fa-coffee',
        'painting' => 'fa-paint-brush',
        'singing' => 'fa-microphone',
        'coding' => 'fa-desktop',
        'shopping' => 'fa-shopping-basket '];
    $list = [];
    $key = array_rand($icons, 5);
    foreach ($key as $index => $item) {
        $list[$item] = $icons[$item];
    }
    return $list;
}

?>