<?php
$uname=Yii::$app->user->identity->username;

$email=Yii::$app->user->identity->email;
$img=Yii::$app->user->identity->USER_FOTO;
$foto = "/sitama/frontend/web/foto/".$img;
$role = Yii::$app->user->identity->getRoleName();
?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <?php if ($img != NULL) { ?>
                    <img src="<?php echo $foto; ?>" class="img-circle" alt="User Image"/>
                <?php } else{ ?>
                    <img src="../web/image/default.jpg" class="img-circle" alt="User Image"/>
                <?php } ?>
            </div>
            <div class="pull-left info">
                <p><?php echo $uname; ?></p>
                <?php echo $email; ?>
            </div>
            
        </div>

        <!-- search form -->
        <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form> -->
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                    [
                        'label' => 'Admin tools',
                        'icon' => 'key',
                        'visible' => Yii::$app->user->can('SuperAdminRole'),
                        'url' => '#',
                        'items' => [
                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                            ['label' => 'Admin', 'icon' => 'key', 'url' => ['/admin'],],
                            
                        ],
                    ],
                    [
                        'label' => 'Management Anggota',
                        'icon' => 'gears',
                        'url' => '#',
                        'items' => [
                            ['label' => 'User Management', 'icon' => 'user', 'url' => ['/user']],
                            ['label' => 'Kelompok Tani', 'icon' => 'users', 'url' => ['/kelompok-tani']],
                            
                        ],
                    ],
                    

                    ['label' => 'Toko', 'icon' => 'home','visible' => Yii::$app->user->can('SuperAdminRole'), 'url' => ['/toko']],
                    ['label' => 'Kategori', 'icon' => 'gear','visible' => Yii::$app->user->can('SuperAdminRole'), 'url' => ['/kategori']],
                    ['label' => 'Jenis Barang', 'icon' => 'tags','visible' => Yii::$app->user->can('SuperAdminRole'), 'url' => ['/jenis-barang']],
                    ['label' => 'Katalog', 'icon' => 'shopping-cart','visible' => Yii::$app->user->can('SuperAdminRole'), 'url' => ['/katalog']],
                    ['label' => 'Master Order', 'icon' => 'money','visible' => Yii::$app->user->can('SuperAdminRole'), 'url' => ['/masterorder']],
                    ['label' => 'Detail Order', 'icon' => 'list','visible' => Yii::$app->user->can('SuperAdminRole'), 'url' => ['/detailorder']],
                    //['label' => 'Frontend', 'icon' => 'list', 'url' => ['frontend']],
                    [
                        'label' => 'Atur Frontend',
                        'icon' => 'gears',
                        'url' => '#',
                        'visible' => Yii::$app->user->can('SuperAdminRole'),
                        'items' => [
                            ['label' => 'Image', 'icon' => 'slideshare', 'url' => ['/gambar']],
                            ['label' => 'Berita', 'icon' => 'newspaper-o', 'url' => ['/berita']],
                            ['label' => 'Testimoni', 'icon' => 'quote-left', 'url' => ['/testimoni']],
                            
                        ],
                    ],
                    
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                   

                    
                ],
            ]
        ) ?>

    </section>

</aside>
