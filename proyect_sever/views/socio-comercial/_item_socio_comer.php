<?php

// _list_item.php
use yii\helpers\Html;
use yii\helpers\Url;
$categorias= app\models\DetalleCategoria::find()->where(['idPresentacion'=>$model->codigoProducto])->all();

?>
<div class="row mt-2 border-bottom border-primary" >
    <div class="col-md-12">
        <div class="row bg-light">
            <div class="col-md-11 flex-column p-2">
                <div class="card">
                    <div class="card-horizontal">
                        <img class="" style="height: 72px; width: 72px;" src="<?= Html::encode('/img/avatar.jpg'); ?>">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <h6 class="d-inline-flex">
                                        Código: 
                                    </h6>
                                    <h3 class="d-inline-flex"><?= Html::encode($model->razonSocial); ?></h3>
                                </div>
                                <div class="col-md-4">
                                    <h6 class="card-subtitle my-2 text-muted"><?= Html::encode($model->rubro); ?></h6>
                                    <p class="card-text"><?= Html::encode($model->localidad.' - '.$model->direccion); ?></p>
                                </div>
                                <div class="col-md-4">
                                     <h5 class="card-title"><b><?= Html::encode(''); ?></b></h5>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <h6 class="d-inline-flex"> Precio de Costo: </h6>
                                    <h4 class="d-inline-flex">$<?= Html::encode(''); ?></h4>
                                </div>
                                <div class="col-md-3">
                                    <h6 class="d-inline-flex">Ganancia: </h6>
                                    <h4 class="d-inline-flex">$<?= Html::encode(''); ?></h4>
                                </div>
                                <div class="col-md-5">
                                    <h6 class="d-inline-flex">Precio Sugerido: </h6>
                                    <h3 class="d-inline-flex text-primary">$<?= Html::encode(''); ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1 my-2">
                <ul class="nav nav-pills justify-content-end bg-light">
                    <li class="nav-item"> <a class="nav-link" href="index.php?r=socio-comercial/update&id=<?= Html::encode($model->idSocioComercial); ?>&idMarca=<?= Html::encode($model->idMarca); ?>"><i class="d-block fa fa-pencil fa-lg"></i></a> </li>
                    <li class="nav-item"> <a href="index.php?r=socio-comercial/delete&id=<?= Html::encode($model->idSocioComercial); ?>&idMarca=<?= Html::encode($model->idMarca); ?>" class="nav-link"  data-confirm="Usted está seguro de borrar este registro?" data-method="post"><i class="d-block fa fa-trash-o fa-lg"></i></a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="collapse" href="#collapse_<?= Html::encode($model->idSocioComercial); ?>" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="d-block fa fa-percent fa-lg"></i> </a> </li>
                </ul>
            </div>
        </div>
    </div>
   
        <div class="collapse" id="collapse_<?= Html::encode($model->codigoProducto); ?>" style="width: 100%;">
            <div class="card card-body">
             <?php
                $tbHead='<thead><tr>';
                $tbBody='<tbody><tr>';
                foreach ($categorias as $categoria){
                    $tbHead.='<th scope="col">'.$categoria->categoria->nombre.'</th>';
                    $tbBody.='<td><h4>'. (floatval($model->costo) + floatval($categoria->monto)) .'</h4></td>';
                }
                 $tbHead.='</tr></thead>';
                 $tbBody.='</tr></tbody>';
             ?>
             <table class="table" >
               <?=$tbHead?>
               <?=$tbBody?>
              </table>
            </div>
    </div>
</div>
