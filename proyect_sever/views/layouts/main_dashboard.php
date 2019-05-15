<?php
/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
$this->title = 'Point soliciones en accesorios';
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head >
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

<?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
        <!-- Custom styles for this template -->
        <link href="css/simple-sidebar.css" rel="stylesheet">
    </head>
    <body>
<?php $this->beginBody() ?>

        <div class="wrap">


            <nav class="navbar navbar-expand-md navbar-dark bg-primary" style="margin-bottom:0px">
            </nav>


            <div class="area">
                <div class="container">
<?= $content ?>
                </div>
            </div>
            <nav class="main-menu">
                <ul>
                    <li>
                        <a href="index.php?r=site/index">
                             <i class="fa fa-home fa-2x"></i>
                            <span class="nav-text">
                                <img class="img-fluid d-block" src="img/logo_point_blanco.svg" width="102px">
                            </span>
                        </a>
                    </li>
                    <li class="has-subnav">
                        <a href="index.php?r=presentacion">
                            <i class="fa fa-product-hunt fa-2x"></i>
                            <span class="nav-text">
                                Productos
                            </span>
                        </a>

                    </li>
                    <li class="has-subnav">
                        <a href="index.php?r=presentacion/update-spress">
                            <i class="fa fa-shopping-basket fa-2x"></i>
                            <span class="nav-text">
                                Entrada de Mercaderia
                            </span>
                        </a>

                    </li>
                    <li class="has-subnav">
                        <a href="index.php?r=ruta">
                            <i class="fa fa-map-signs fa-2x"></i>
                            <span class="nav-text">
                                Rutas
                            </span>
                        </a>

                    </li>
                    <li class="has-subnav">
                        <a href="index.php?r=socio-comercial">
                            <i class="fa fa-users fa-2x"></i>
                            <span class="nav-text">
                                Socios comerciales
                            </span>
                        </a>

                    </li>


                </ul>

                <ul class="logout">
                    <!--                <li>
                                       <a href="#">
                                             <i class="fa fa-power-off fa-2x"></i>
                                            <span class="nav-text">
                                                Logout
                                            </span>
                                        </a>
                                    </li>  -->
<?php
echo Yii::$app->user->isGuest ? (
        '<a href="/index.php?r=site/login" class="btn navbar-btn ml-md-2 btn-light text-dark">login</a>'
        ) : (
        '<li> '
        . '<a href="#">  '
        . '<i class="fa fa-power-off fa-2x"></i>'
        . ' <span class="nav-text">'
        . Html::beginForm(['/site/logout'], 'post')
        . Html::submitButton(
                'Salir (' . Yii::$app->user->identity->username . ')', ['class' => 'btn btn-link logout', 'style' => 'font-size:1.5em']
        )
        . Html::endForm() .
        ' </span>'
        . '</a>'
        . '</li>'
        );
?>
                </ul>
            </nav>

        </div>
        <footer class="footer">
            <div class="container">
                <p class="pull-right">&copy; Ties <?= date('Y') ?></p>
            </div>
        </footer>

<?php $this->endBody() ?>
    </body>
</html>
        <?php $this->endPage() ?>
