<?php
/* @var $model app\models\SocioComercial */
// _list_item.php
use yii\helpers\Html;
use yii\helpers\Url;


?>
<div class="row mt-2 border-bottom border-primary" >
    <div class="col-md-12">
        <div class="row bg-light">
            <div class="col-md-11 flex-column p-2">
                <div class="card" >
                    <div class="card-horizontal">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-1">
                                    <p>Estado</p>
                                    <h3 class="d-inline-flex">  <?= $model->activo ? 'Activo' : 'Baja'; ?></h3>
                                </div>
                                <div class="col-md-3">
                                    <h6 class="d-inline-flex">
                                        Razon Social
                                    </h6>
                                    <h3 class="d-inline-flex"><?= Html::encode($model->razonSocial); ?></h3>
                                </div>
                                <div class="col-md-4">
                                    <h6 class="card-subtitle my-2 text-muted"><?= Html::encode($model->rubro); ?></h6>
                                    <p class="card-text"><?= Html::encode($model->tipoSocio == 'MAY' ? 'Mayorista' : 'Minorista'); ?></p>
                                </div>
                                <div class="col-md-4">
                                     <h5 class="card-title"><b><?= Html::encode($model->localidad . " " . $model->direccion); ?></b></h5>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-6">
                                    <h6 class="d-inline-flex"> Encargado: </h6>
                                    <h4 class="d-inline-flex"><?= Html::encode($model->encargado0->apellido . " ". $model->encargado0->nombre); ?></h4>
                                </div>
                                <div class="col-md-5">
                                    <h6 class="d-inline-flex"> Telefono: </h6>
                                    <h3 class="d-inline-flex text-primary"><?= Html::encode($model->encargado0->telefono ? $model->encargado0->telefono : "-" ); ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1 my-2">
                <ul class="nav nav-pills justify-content-end bg-light">
                    <li class="nav-item"> <a class="nav-link" href="index.php?r=socio-comercial/update&id=<?= Html::encode($model->idSocioComercial);?>"><i class="d-block fa fa-pencil fa-lg"></i></a> </li>
                    <li class="nav-item"> <a href="index.php?r=socio-comercial/delete&id=<?= Html::encode($model->idSocioComercial);?>" class="nav-link"  data-confirm="Usted está seguro de borrar este registro?" data-method="post"><i class="d-block fa fa-trash-o fa-lg"></i></a> </li>
                </ul>
            </div>
        </div>
    </div>
</div>
