
<div class="box box-widget widget-user-2">
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
        <!-- Add the bg color to the header using any of the bg-* classes -->
        <div class="widget-user-header bg-aqua-active">
            <div class="widget-user-image">
                <?php if (!empty($row['image_profile'])) { ?>
                    <img src="<?php echo \Yii::$app->request->BaseUrl . '/' . $row['image_profile'] ?>" class="img-circle" alt="User Avatar" style="height: 70px; width: 70px;">
                <?php } else { ?>
                    <img src="<?= Yii::$app->homeUrl ?>/g-profile.png" class="img-thumbnail img-profile">
                <?php } ?>
            </div><!-- /.widget-user-image -->
            <?php if (empty($row['name'])) { ?>
                <h3 class="widget-user-username"><?= Yii::$app->user->identity->username; ?></h3>
            <?php } else { ?>
                <h3 class="widget-user-username"><?= $row['name']; ?></h3>
            <?php } ?>


            <?php
            $queryAuth = new yii\db\Query();
            $queryAuth->select(['item_name'])
                    ->from('auth_assignment')
                    ->where(['user_id' => Yii::$app->user->identity->id])
                    ->all();

            $commandAuth = $queryAuth->createCommand();
            $dataAuth = $commandAuth->queryAll();
            ?>
                
                <!-- Show query auth_assignment -->
            <?php foreach ($dataAuth as $rowAuth) { ?>
                
                <h5 class="widget-user-desc"><?php // $rowAuth['item_name'] ?></h5>
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
                
                <h5 class="widget-user-desc">Joined : <?= Yii::$app->formatter->format($rowJoined['created_at'], 'date') ?></h5>
            <?php } ?>

        </div>
        <div class="box-footer no-padding">
            <ul class="nav nav-stacked">
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
                    <a href="<?= yii\helpers\Url::to(['/user/settings/help/']); ?>">
                        <i class="glyphicon glyphicon-flag"></i>
                        Help </a>
                </li>
            </ul>
        </div>
    <?php } ?>
</div>
