
<div class="row profile" style="background-color: rgb(241, 241, 241); border: none">
    <div style="background-color: #ffffff; padding: 10px; margin-bottom: 10px; font-size: 16px">
        <b><i class="fa fa-cogs"></i> Setting</b>
    </div>
    <div class="profile-sidebar" style="padding-top: 0px">
        <!-- SIDEBAR USERPIC -->
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
        <div class="" style="text-align: center;">
            <?php foreach ($data as $row) { ?>
                <div class="image">
                    <?php if (!empty($row['image_header'])) { ?>
                        <img src="<?php echo \Yii::$app->request->BaseUrl . '/' . $row['image_header'] ?>" style="height: 140px; width: 100%">
                    <?php } else { ?>
                        <img src="back-default.png" style="height: 140px;">
                    <?php } ?>
                </div>
                <div class="user clearfix" style="margin-left: 23%">
                    <div class="avatar">
                        <?php if (!empty($row['image_profile'])) { ?>
                            <img src="<?php echo \Yii::$app->request->BaseUrl . '/' . $row['image_profile'] ?>" class="img-thumbnail img-profile">
                        <?php } else { ?>
                            <img src="pp-default.png" class="img-thumbnail img-profile">
                        <?php } ?>
                    </div>
                </div>

            </div>
            <br>
            <!-- END SIDEBAR USERPIC -->
            <!-- SIDEBAR USER TITLE -->
            <div class="profile-usertitle">
                <div class="profile-usertitle-name">
                    <?php if(empty($row['name'])){ ?>
                        <?= Yii::$app->user->identity->username; ?>
                    <?php }else{
                        echo $row['name'];
                    } ?>
                </div>
                <div class="profile-usertitle-job">

                </div>
            </div>
            <!-- END SIDEBAR USER TITLE -->
        <?php } ?>
        <!-- SIDEBAR MENU -->
        <div class="profile-usermenu">
            <ul class="nav">
                <li class="">
                    <a href="<?= yii\helpers\Url::to(['/user/settings/profile']); ?>">
                        <i class="glyphicon glyphicon-home"></i>
                        Profile </a>
                </li>
                <li>
                    <a href="<?= yii\helpers\Url::to(['/user/settings/account/']); ?>">
                        <i class="glyphicon glyphicon-user"></i>
                        Account </a>
                </li>
                <li>
                    <a href="<?= Yii::$app->urlManager->createUrl(['/classified/my-list', 'id' => Yii::$app->user->identity->id]) ?>">
                        <i class="glyphicon glyphicon-list"></i>
                        Classified List </a>
                </li>
                <li>
                    <a href="<?= yii\helpers\Url::to(['/user/settings/help/']); ?>">
                        <i class="glyphicon glyphicon-flag"></i>
                        Help </a>
                </li>
                <li>
                    <a href="<?= Yii::$app->urlManager->createUrl(['/home/', 'id' => Yii::$app->user->identity->id]); ?>">
                        <i class="glyphicon glyphicon-arrow-left"></i>
                        Back home </a>
                </li>
            </ul>
        </div>
        <!-- END MENU -->
    </div>
</div>
