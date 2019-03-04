<?php

use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */

?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">APP</span><span class="logo-lg">' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <a href="<?= Yii::$app->urlManagerFrontend->baseUrl; ?>" target="_blank" style="float: left;padding: 15px 15px; background-color: transparent; color: #ffffff">Open site</a>

        <div class="navbar-custom-menu">
            <?php
            //query model
            $query = new \yii\db\Query();
            $query->select([
                        'profile.image_profile',
                        'profile.image_header',
                        'profile.name',
                    ])
                    ->from('profile')
                    ->where(['user_id' => Yii::$app->user->identity->id])
                    ->all();

            $command = $query->createCommand();
            $data = $command->queryAll();
            ?>
            <?php foreach ($data as $row) { ?>

                <ul class="nav navbar-nav">

                    <!--                     Messages: style can be found in dropdown.less-->
                    <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
    <!--                                            <span class="label label-success">-->

                            <!--                                            </span>-->
                        </a>

                    </li>

                    <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-flag-o"></i>
<!--                            <span class="label label-danger">--><?//= ($reportNotif) ? $reportNotif : "0"; ?><!--</span>-->
                        </a>
                      
                    </li>
                    <!--                                     User Account: style can be found in dropdown.less -->

                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <?php if (!empty($row['image_profile'])) { ?>
                                <img src="<?php echo \Yii::$app->request->BaseUrl . '/' . $row['image_profile'] ?>" class="user-image" alt="User Image" style=""/>
                            <?php } else { ?>
                                <img src="<?= Yii::$app->homeUrl ?>/g-profile.png" class="img-thumbnail img-profile">
                            <?php } ?>

                            <?php if (empty($row['name'])) { ?>
                                <span class="hidden-xs"><?= Yii::$app->user->identity->username; ?></span>
                            <?php } else { ?>
                                <span class="hidden-xs"><?= $row['name']; ?></span>
                            <?php } ?>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <?php if (!empty($row['image_profile'])) { ?>
                                    <img src="<?php echo \Yii::$app->request->BaseUrl . '/' . $row['image_profile'] ?>" class="img-circle" alt="User Image" style=""/>
                                <?php } else { ?>
                                    <img src="g-profile.png" class="img-thumbnail img-profile">
                                <?php } ?>

                                <?php if (empty($row['name'])) { ?>
                                    <p><?= Yii::$app->user->identity->username; ?></p>
                                <?php } else { ?>
                                    <p><?= $row['name']; ?></p>
                                <?php } ?>

                                <?php
                                $queryJoined = new yii\db\Query();
                                $queryJoined->select(['created_at'])
                                        ->from('user')
                                        ->where(['id' => Yii::$app->user->identity->id])
                                        ->all();

                                $commandJoined = $queryJoined->createCommand();
                                $dataJoined = $commandJoined->queryAll();
                                ?>

                                <?php foreach ($dataJoined as $rowJoined) { ?>

                                    <p><small>Joined : <?= Yii::$app->formatter->format($rowJoined['created_at'], 'date') ?></small></p>
                                <?php } ?>
                            </li>
                            <!-- Menu Body -->

                            <!-- /End Menu Body -->

                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="<?php echo yii\helpers\Url::to(['/user/settings/']); ?>" class="btn btn-primary btn-flat btn-sm"><i class="fa fa-user"></i> Profile</a>
                                    <a href="<?php echo yii\helpers\Url::to(['/user/settings/account']); ?>" class="btn btn-success btn-flat btn-sm"><i class="fa fa-key"></i> Account</a>
                                </div>
                                <div class="pull-right">
                                    <a href="<?php echo yii\helpers\Url::to(['/user/security/logout/']); ?>" class="btn btn-danger btn-flat btn-sm" data-method="post"><i class="fa fa-remove"></i> Sign out</a>

                                </div>
                            </li>
                        </ul>
                    </li>

                    <!-- User Account: style can be found in dropdown.less -->
                    <!--                <li>
                                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                                    </li>-->
                </ul>
            <?php } ?>
        </div>
    </nav>
</header>
