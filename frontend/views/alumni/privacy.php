<?php

//$this->title = $content['name'];

//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'News & Events'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;

//$this->registerMetaTag(['name' => 'keywords', 'content' => $content['keywords']]);
//$this->registerMetaTag(['name' => 'description', 'content' => $content['description']]);

$getRequest = Yii::$app->request->get();
?>
<?php if (!empty($alumni_content)): ?>
    <section class="container" style="width: 1280px;">
        <div class="menu_header">
            <div class="gitc_container">
                <h2><a href="<?= Yii::$app->homeUrl ?>alumni/sample/<?= $alumni_content['id'] ?>" style="color: #fff"
                       target="_blank"><?= strtoupper(Yii::t('app', 'download  resume of alumni')) ?></a></h2>
            </div>
        </div>
        <div class="alumni_cv gitc_container">
            <div class="aside col-lg-4 col-md-4 "
                 style="width: 200px; float: left;display: inline-block;-webkit-box-shadow:0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);-moz-box-shadow:0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);box-shadow:0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12)">
                <table cellspacing="5" cellpadding="10">
                    <tr class="alumni" style="border-collapse:collapse; border-bottom: 1px solid #777;font-size: 14pt;">

                        <td class="col-lg-2>">
                                <span class="fa-li">
                                    <a href="" class="icon fa-stack ">
                                        <i class="fa fa-stack-1x "
                                           style="font-family: fontawesome;font-size:14pt;  font-style:normal; color: #fff">
                                            &#xf007;
                                        </i>
                                    </a>
                                </span>
                        </td>
                        <td class="col-lg-10">
                            <h5 class=""><?php if (!empty($alumni_content['name'])) echo $alumni_content['name'] . " ";
                                if (!empty($alumni_content['surname'])) echo $alumni_content['surname'] . " ";
                                if (!empty($alumni_content['fname'])) echo $alumni_content['fname']; ?>
                            </h5>
                            <em class='a_info text-center'><?php if (!empty($alumni_content['fname'])) echo $alumni_content['profession']; ?></em>
                        </td>
                    </tr>
                    <?php if (!empty($alumni_content['birthday'])): ?>
                        <tr>
                            <td class="col-lg-2>">
                                        <span class="fa-li">
                                            <a href="" class="icon fa-stack ">
                                                <i class="fa fa-stack-1x "
                                                   style="font-family: fontawesome;font-size:14pt;  font-style:normal; color: #fff">
                                                    &#xf1fd;
                                                </i>
                                            </a>
                                        </span>
                            </td>
                            <td class="col-lg-10">
                                <span class='a_info'><?= 'Birth date <br>' . $alumni_content['birthday']; ?></span>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($alumni_content['phone'])): ?>
                        <tr>
                            <td class="col-lg-2>">
                                        <span class="fa-li">
                                            <a href="" class="icon fa-stack ">
                                                <i class="fa fa-stack-1x "
                                                   style="font-family: fontawesome;font-size:14pt;  font-style:normal; color: #fff">
                                                    &#xf095;
                                                </i>
                                            </a>
                                        </span>
                            </td>
                            <td class="col-lg-10">
                                <span class='a_info'><?= '(+374) ' . $alumni_content['phone']; ?></span>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($alumni_content['e-mail'])): ?>
                        <tr>
                            <td class="col-lg-2>">
                                        <span class="fa-li">
                                            <a href="" class="icon fa-stack ">
                                                <i class="fa fa-stack-1x "
                                                   style="font-family: fontawesome;font-size:14pt;  font-style:normal; color: #fff">
                                                    &#xf0e0;
                                                </i>
                                            </a>
                                        </span>
                            </td>
                            <td class="col-lg-10">
                                <span class='a_info'><?= $alumni_content['e-mail']; ?></span>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($alumni_content['address'])): ?>
                        <tr>
                            <td class="col-lg-2>">
                                        <span class="fa-li">
                                            <a href="" class="icon fa-stack ">
                                                <i class="fa fa-stack-1x "
                                                   style="font-family: fontawesome;font-size:14pt;  font-style:normal; color: #fff">
                                                    &#xf015;
                                                </i>
                                            </a>
                                        </span>
                            </td>
                            <td class="col-lg-10">
                                <span class='a_info'><?= $alumni_content['address']; ?></span>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($alumni_content['languages'])): ?>
                        <tr>
                            <td class="col-lg-2>">
                                        <span class="fa-li">
                                            <a href="" class="icon fa-stack ">
                                                <i class="fa fa-stack-1x "
                                                   style="font-family: fontawesome;font-size:14pt;  font-style:normal; color: #fff">
                                                    &#xf1ab;
                                                </i>
                                            </a>
                                        </span>
                            </td>
                            <td class="col-lg-10">

                                <?php foreach ($alumni_content['languages'] as $index => $item) : ?>
                                    <div><span class='a_info_span'><?= Yii::t('app', $item); ?></span></div>
                                <?php endforeach; ?>

                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($alumni_content['technical_languages'])): ?>
                        <tr>
                            <td class="col-lg-2>">
                                        <span class="fa-li">
                                            <a href="" class="icon fa-stack ">
                                                <i class="fa fa-stack-1x "
                                                   style="font-family: fontawesome;font-size:14pt;  font-style:normal; color: #fff">
                                                    &#xf040;
                                                </i>
                                            </a>
                                        </span>
                            </td>
                            <td class="col-lg-10">

                                <?php foreach ($alumni_content['technical_languages'] as $index => $item) : ?>
                                    <div><span class='a_info_span'><?= $item; ?></span></div>
                                <?php endforeach; ?>

                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($alumni_content['occupation'])): ?>
                        <tr>
                            <td class="col-lg-2>">
                                        <span class="fa-li">
                                            <a href="" class="icon fa-stack ">
                                                <i class="fa fa-stack-1x "
                                                   style="font-family: fontawesome;font-size:14pt;  font-style:normal; color: #fff">
                                                    &#xf2b5;
                                                </i>
                                            </a>
                                        </span>
                            </td>
                            <td class="col-lg-10">
                                <span class='a_info'><?= $alumni_content['occupation']; ?></span>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($alumni_content['family_condition'])): ?>
                        <tr>
                            <td class="col-lg-2>">
                                        <span class="fa-li">
                                            <a href="" class="icon fa-stack ">
                                                <i class="fa fa-stack-1x "
                                                   style="font-family: fontawesome;font-size:14pt;  font-style:normal; color: #fff">
                                                    &#xf004;
                                                </i>
                                            </a>
                                        </span>
                            </td>
                            <td class="col-lg-10">
                                <span class='a_info'><?= $alumni_content['family_condition']; ?></span>
                            </td>
                        </tr>
                    <?php endif; ?>

                </table>
            </div>
            <div class="section col-lg-8" style="width:360px;float: left;display: inline-block; border:1px solid">
                <table cellspacing="5" cellpadding="10" width="100%">
                    <tr>
                        <td>
                            <div class="alumni_ex col-lg-12 ">
                                <?php if (!empty($alumni_content['experience'])): ?>
                                    <div class="col-lg-12">
                                        <div class="col-lg-1">
                                        <span class="fa-li">
                                            <a href="" class="icon fa-stack ">
                                                <i class="fa fa-stack-1x "
                                                   style="font-family: fontawesome;font-size:14pt;  font-style:normal; ">
                                                    &#xf0b1;
                                                </i>
                                            </a>
                                        </span>
                                        </div>
                                        <div class="col-lg-11"><span
                                                class='a_info_'><?= Yii::t('app', 'Work Experience'); ?></span></div>
                                        <div class="col-lg-offset-1 col-lg-11">
                                            <div class="col-lg-12 _alumni_">
                                                <?php foreach ($alumni_content['experience'] as $index => $alumni) : ?>
                                                    <?php foreach ($alumni as $i => $item) : ?>
                                                        <div><span class=''><?= $item; ?></span></div>
                                                    <?php endforeach; ?>
                                                <?php endforeach; ?>
                                            </div>

                                        </div>
                                    </div>

                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="alumni_ed col-lg-12">
                                <?php if (!empty($alumni_content['education'])): ?>
                                    <div class="col-lg-12">
                                        <div class="col-lg-1" style="float: left">
                                            <a href="" class="icon fa-stack ">
                                                <i class="fa fa-stack-1x "
                                                   style="font-family: fontawesome;font-size:14pt;  font-style:normal; ">
                                                    &#xf19d;
                                                </i>
                                            </a>
                                        </div>
                                        <div class="col-lg-11" style="float: left">
                                            <span class='a_info_' style="font-style: italic; font-size: 14pt;"><?= Yii::t('app', 'Education'); ?></span>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="col-lg-offset-1 col-lg-11 _alumni_">
                                                <?php foreach ($alumni_content['education'] as $index => $alumni) : ?>
                                                    <?php foreach ($alumni as $i => $item) : ?>
                                                        <div><span class=''><?= $item; ?></span></div>
                                                    <?php endforeach; ?>
                                                <?php endforeach; ?>
                                            </div>

                                        </div>
                                    </div>

                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="alumni_sk col-lg-12">
                                <?php if (!empty($alumni_content['skills'])): ?>
                                    <div class="col-lg-12">
                                        <div class="col-lg-1">
                                        <span class="fa-li">
                                            <a href="" class="icon fa-stack ">
                                                <i class="fa fa-stack-1x "
                                                   style="font-family: fontawesome;font-size:14pt;  font-style:normal; ">
                                                    &#xf133;
                                                </i>

                                            </a>
                                        </span>
                                        </div>
                                        <div class="col-lg-11"><span
                                                class='a_info_'><?= Yii::t('app', 'Professional Skills'); ?></span>
                                        </div>
                                        <div class="col-lg-offset-1 col-lg-11 _alumni_">
                                            <span class='a_info'><?= $alumni_content['skills']; ?></span>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="alumni_in col-lg-12">

                                <div class="col-lg-12 ">
                                    <div class="col-lg-1">
                                        <span class="fa-li">
                                            <a href="" class="icon fa-stack ">
                                                <i class="fa fa-stack-1x "
                                                   style="font-family: fontawesome;font-size:14pt;  font-style:normal; ">
                                                    &#xf252;
                                                </i>
                                                <i class="fa fa-hourglass-half  fa-stack-1x "></i>
                                            </a>
                                        </span>
                                    </div>
                                    <div class="col-lg-11"><span
                                            class='a_info_'><?= Yii::t('app', 'Interests'); ?></span>
                                    </div>
                                    <div class="interest col-lg-offset-1 col-lg-11">
                                        <?php $list = rand_interest(); ?>
                                        <?php foreach ($list as $key => $val): ?>
                                            <span class="fa-li">
                                            <a href="" class="icon fa-stack" title="<?= $key; ?>">

                                                <i class="fa fa-stack-1x "
                                                   style="font-family: fontawesome;font-size:14pt;  font-style:normal; ">
                                                    <?= $val; ?>
                                                </i>
                                            </a>
                                        </span>
                                        <?php endforeach;; ?>
                                    </div>
                                </div>

                            </div>
                        </td>
                    </tr>
                </table>
            </div>
    </section>

<?php endif; ?>

<?php function rand_interest()
{
    $icons = ['watching' => '&#xf26c;',
        'taking photo' => 'fa-camera',
        'chatting' => '&#xf030;',
        'playing games' => '&#xf1e3;',
        'listening to a music' => '&#xf001;',
        'drinking' => '&#xf0f4;',
        'painting' => '&#xf1fc;',
        'singing' => '&#xf130;',
        'coding' => '&#xf108;',
        'shopping' => '&#xf291;'];
    $list = [];
    $key = array_rand($icons, 5);
    foreach ($key as $index => $item) {

        $list[$item] = $icons[$item];
    }
    return $list;
}

?>

