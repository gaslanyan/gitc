<aside class="main-sidebar">

    <section class="sidebar">

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
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <?php if (!empty($row['image_profile'])) { ?>
                <img src="<?php echo \Yii::$app->request->BaseUrl . '/' . $row['image_profile'] ?>" class="img-circle" alt="User Image" style="height: 40px; width: 40px;"/>
                <?php } else { ?>
                <img src="<?= Yii::$app->homeUrl ?>/g-profile.png" class="img-thumbnail img-profile">
                <?php } ?>
            </div>
            <div class="pull-left info">
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
                
                <p>Joined : <?= Yii::$app->formatter->format($rowJoined['created_at'], 'date') ?></p>
            <?php } ?>

<!--                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->
            </div>
        </div>
        <?php }
        $q = new \yii\db\Query();
        $q->select([
            'title'
        ])
            ->from('type')
            ->all();

        $command = $q->createCommand();
        $type = $command->queryAll();
        $item =[];
        ['label' => 'Staff', 'url' => ['media/index?type=staff']];
        foreach ($type as $key=> $row) {
            $item[$key]['label']=strtoupper($row['title']);
            $item[$key]['url']=['media/index?type='.$row['title']];
        }
        ?>

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Menu Classified', 'options' => ['class' => 'header']],
                    ['label' => 'Dashboard', 'icon' => 'fa fa-dashboard', 'url' => ['/site/']],
                    [
                        'label' => 'User List',
                        'icon' => 'fa fa-users',
                        'url' => ['/user/admin/'],
                        'active' => Yii::$app->controller->id == '/user/admin/',
                        
                    ],
                    [
                        'label' => 'Result',
                        'icon' => 'fa fa-bar-chart',
                        'url' => ['/result/index/'],
                        'active' => Yii::$app->controller->id == 'result',

                    ],
                    [
                        'label' => 'Pages',
                        'icon' => 'fa fa-book',
                        'url' => ['/pages/index'],
                        'active' => Yii::$app->controller->id == 'pages',

                    ],
                    [
                        'label' => 'Media',
                        'icon' => 'fa fa-medium',
                        'url' => [''],
                        'active' => Yii::$app->controller->id == 'media',
                        'items' => $item
                    ],
                    [
                        'label' => 'Slider',
                        'icon' => 'fa fa-sliders',
                        'url' => ['/slider/index'],
                        'active' => Yii::$app->controller->id == 'slider',

                    ],
                    [
                        'label' => 'Projects',
                        'icon' => 'fa fa-server',
                        'url' => ['/projects/index'],
                        'active' => Yii::$app->controller->id == 'projects',

                    ],

                    [
                        'label' => 'Training',
                        'icon' => 'fa fa-book',
                        'url' => ['/training/index'],
                        'active' => Yii::$app->controller->id == 'training',

                    ],
                    [
                        'label' => 'Region',
                        'icon' => 'fa fa-home',
                        'url' => ['/region/index'],
                        'active' => Yii::$app->controller->id == 'region',

                    ],
                    [
                        'label' => 'Opinion of Students',
                        'icon' => 'fa fa-microphone',
                        'url' => ['/students/index'],
                        'active' => Yii::$app->controller->id == 'students',

                    ],
                    [
                        'label' => 'News & Events',
                        'icon' => 'fa fa-newspaper-o',
                        'url' => ['/news/index'],
                        'active' => Yii::$app->controller->id == 'news',

                    ],
                    [
                        'label' => 'Work Place',
                        'icon' => 'fa fa-home',
                        'url' => ['/work-place/index'],
                        'active' => Yii::$app->controller->id == 'work-place',

                    ],  [
                        'label' => 'Press ',
                        'icon' => 'fa fa-list-ol',
                        'url' => ['/press/index'],
                        'active' => Yii::$app->controller->id == 'press',

                    ],
                    [
                        'label' => 'Enrolls',
                        'icon' => 'fa fa-user',
                        'url' => ['/enroll/index'],
                        'active' => Yii::$app->controller->id == 'enroll',

                    ],
                    [
                        'label' => 'Languages',
                        'icon' => 'fa fa-language',
                        'url' => ['/languages/index'],
                        'active' => Yii::$app->controller->id == 'languages',

                    ],
                    [
                        'label' => 'User Access',
                        'icon' => 'fa fa-key',
                        'url' => ['#'],
                        'items' => [
                            ['label' => 'Route', 'icon' => '', 'url' => ['/admin/route/'], 'active' => Yii::$app->controller->id == 'route'],
                            ['label' => 'Assignment', 'icon' => '', 'url' => ['/admin/assignment/'], 'active' => Yii::$app->controller->id == 'assignment'],
                            ['label' => 'Permission', 'icon' => '', 'url' => ['/admin/permission/'], 'active' => Yii::$app->controller->id == 'permission'],
                            ['label' => 'Role', 'icon' => '', 'url' => ['/admin/role/'], 'active' => Yii::$app->controller->id == 'role'],
                        ]
                    ],
                    [
                        'label' => 'Configuration',
                        'icon' => 'fa fa-cogs',
                        'url' => ['#'],
                        'items' => [
                            ['label' => 'Category', 'icon' => '', 'url' => ['/category/'], 'active' => Yii::$app->controller->id == 'category'],
                            ['label' => 'Subject Report', 'icon' => '', 'url' => ['/subject-report/'], 'active' => Yii::$app->controller->id == 'subject-report'],
                            ['label' => 'Country', 'icon' => '', 'url' => ['/country/'], 'active' => Yii::$app->controller->id == 'country'],
                            ['label' => 'Region', 'icon' => '', 'url' => ['/region/'], 'active' => Yii::$app->controller->id == 'region'],
                            ['label' => 'City', 'icon' => '', 'url' => ['/city/'], 'active' => Yii::$app->controller->id == 'city'],
                        ]
                    ],        
//                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    
                ],
            ]
        ) ?>

    </section>

</aside>
