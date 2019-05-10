<?php

// _list_item.php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="row mt-2 border-bottom border-primary" >
    <div class="col-md-12">
        <div class="row bg-light">
            <div class="col-md-11 flex-column p-2">
                <div class="card">
                    <div class="card-horizontal">
                        <img class="" style="height: 100px; width: 100px;" src="<?= Html::encode($model->foto); ?>">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <h6 class="d-inline-flex">
                                        Código: 
                                    </h6>
                                    <h3 class="d-inline-flex"><?= Html::encode($model->codigoProducto); ?></h3>
                                </div>
                                <div class="col-md-4">
                                    <h6 class="card-subtitle my-2 text-muted"><?= Html::encode($model->marca->nombre); ?></h6>
                                    <p class="card-text"><?= Html::encode($model->descripcion); ?></p>
                                </div>
                                <div class="col-md-4">
                                     <h5 class="card-title"><b><?= Html::encode($model->producto->nombre); ?></b></h5>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <h6 class="d-inline-flex"> Precio de Costo: </h6>
                                    <h4 class="d-inline-flex">$<?= Html::encode($model->costo); ?></h4>
                                </div>
                                <div class="col-md-3">
                                    <h6 class="d-inline-flex">Ganancia: </h6>
                                    <h4 class="d-inline-flex">$<?= Html::encode($model->ganancia); ?></h4>
                                </div>
                                <div class="col-md-5">
                                    <h6 class="d-inline-flex">Precio Sugerido: </h6>
                                    <h3 class="d-inline-flex text-primary">$<?= Html::encode($model->precioSugerido); ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1 my-2">
                <ul class="nav nav-pills justify-content-end bg-light">
                    <li class="nav-item"> <a class="nav-link" href="index.php?r=presentacion/update&codigoProducto=<?= Html::encode($model->codigoProducto); ?>&idMarca=<?= Html::encode($model->idMarca); ?>"><i class="d-block fa fa-pencil fa-lg"></i></a> </li>
                    <li class="nav-item"> <a href="index.php?r=presentacion/delete&codigoProducto=<?= Html::encode($model->codigoProducto); ?>&idMarca=<?= Html::encode($model->idMarca); ?>" class="nav-link"  data-confirm="Usted está seguro de borrar este registro?" data-method="post"><i class="d-block fa fa-trash-o fa-lg"></i></a> </li>
                </ul>
            </div>
        </div>
    </div>
</div>
