<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            
            <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
//                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
//                    ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii']],
//                    ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug']],
                    ['label' => 'Login', 'url' => ['/user/security/login'], 'visible' => Yii::$app->user->isGuest],
//                    [
//                        'label' => 'Same tools',
//                        'icon' => 'fa fa-share',
//                        'url' => '#',
//                        'items' => [
//                            ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii'],],
//                            ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug'],],
//                            [
//                                'label' => 'Level One',
//                                'icon' => 'fa fa-circle-o',
//                                'url' => '#',
//                                'items' => [
//                                    ['label' => 'Level Two', 'icon' => 'fa fa-circle-o', 'url' => '#',],
//                                    [
//                                        'label' => 'Level Two',
//                                        'icon' => 'fa fa-circle-o',
//                                        'url' => '#',
//                                        'items' => [
//                                            ['label' => 'Level Three', 'icon' => 'fa fa-circle-o', 'url' => '#',],
//                                            ['label' => 'Level Three', 'icon' => 'fa fa-circle-o', 'url' => '#',],
//                                        ],
//                                    ],
//                                ],
//                            ],
//                        ],
//                    ],
                ],
            ]
        ) ?>
            
<?php if(!Yii::$app->user->isGuest){ ?>
            <div class="pull-left info">
                <p><?php echo Yii::$app->user->identity->username ;?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
<?php }?>
        </div>
        <ul class="sidebar-menu">
            <li class="treeview active">
                    <a href="#">
                        <i class="glyphicon glyphicon-cog"></i><span>ระบบแจ้งซ่อม</span>
                        <i class="fa pull-right fa-angle-down"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="<?php echo yii\helpers\Url::to(['/repair/repairs/index']);?>">
                                <i class="fa fa-circle text-blue"></i>
                                <span>แจ้งซ่อม</span> 
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo yii\helpers\Url::to(['/repair/repairs/indexapprove']);?>">
                                <i class="fa fa-circle text-green"></i> หน.รับงาน
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo yii\helpers\Url::to(['/repair/repairs/indexengineer']);?>">
                                <i class="fa fa-circle text-yellow"></i> ช่าง.รับงาน
                            </a>
                        </li>
                    </ul>
            </li>
   </ul>     

    </section>

</aside>
