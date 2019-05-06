<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use consynki\yii\input\ImageInput;
use yii\helpers\Url;
use yii\base\DynamicModel;


/* @var $this yii\web\View */
/* @var $model app\models\Presentacion */
/* @var $form yii\widgets\ActiveForm */
/* @var $searchModel app\models\PresentacionSearch */
/* @var  $stockData app\models\FormEpressPresentacion */
$hayPresentacion=false;
if($model){
    $hayPresentacion=true;
    $stockData->codigo=$model->codigoProducto;
    echo 'el codigo del  producto es '.$model->codigoProducto;
}
    


?>

<div class="presentacion-form">

    <?php 
    if(!$hayPresentacion){
        $form = ActiveForm::begin([
            'id' => 'search-form',
            'method' => 'get',
            'action' => Url::to(['presentacion/update-spress'])
        ]); 
        
    }
    ?>
     <div class="py-2">
    <div class="container">
      <div class="row">
        <div class="col-md-12 bg-primary text-light pt-2">
          <h3 class="text-center" >Nuevo Producto</h3>
        </div>
      </div>
      <div class="row bg-light">
        <div class="col-md-12 border-bottom border-primary">
          <div class="blockquote">
            <div class="form-group">
              <label for="exampleFormControlSelect1"></label>
            </div>
            <div class="form-group">
              <label for="inlineFormInputGroupUsername2">Código de barra</label>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="input-group mb-2 mr-sm-2">
                      <?php if(!$hayPresentacion){
                          echo $form->field($searchModel, 'txtSearch')->textInput(['class'=>'form-control-lg','placeholder'=>'Codido de barra','style'=>'font-size:24px'])->label('Buscar:');
                      } else{ ?> 
                    <input type="text" class="form-control form-control-lg" id="inlineFormInputGroupUsername2" placeholder="Codido de barra" style="font-size:30px" disabled="true" value ="<?=Html::encode($model->codigoProducto);?>">
                     <?php } ?>
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fa fa-barcode fa-2x text-primary"></i></div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 text-right"><a class="btn text-uppercase w-25 btn-success text-right" href="#">
                  <h6> <i class="fa fa-plus fa-2x"></i>&nbsp;Agregar</h6>
                </a></div>
            </div>
              
    <div class="form-group">
         <?php if(!$hayPresentacion){ echo Html::submitButton('Save', ['class' => 'btn btn-success']);} ?>
    </div>

          </div>
        </div>
      </div>
    </div>
  </div>
    
    
    <div class="py-2">
    <div class="container">
      <div class="row">
        <div class="col-md-12" style="">
          <div class="card border border-primary">
            <div class="card-header bg-primary text-light">
              <h3 > Descripción</h3>
            </div>
            <div class="card-body">
              <div class="row">
                  <?php 
                  if($model){?>
                        <div class="col-md-3" style=""><img class="img-fluid d-block justify-content-center align-items-center w-100" src="<?= Html::encode($model->foto); ?>" width="150px"></div>
                     <div class="col-md-9" style="">
                       <h4> <?= Html::encode($model->producto->nombre); ?></h4>
                        <h6><?= Html::encode($model->marca->nombre); ?></h6>
                       <p> <?= Html::encode($model->descripcion); ?> </p>
                       <h5 class="py-1">Costo:$<?= Html::encode($model->costo); ?></h5>
                       <h5 class="py-1">ganancia:$<?= Html::encode($model->costo); ?></h5>
                       <h5 class="py-1">Precio de venta:$<?= Html::encode($model->precioSugerido); ?></h5>
                     </div>
               <?php   }else{ ?>
                  
                   <div class="col-md-3" style=""><img class="img-fluid d-block justify-content-center align-items-center w-100" src="" width="150px"></div>
                     <div class="col-md-9" style="">
                       <h4> sin dato</h4>
                        <h6>sin datos</h6>
                       <p> sin datos</p>
                       <h5 class="py-1">Costo:$0,00</h5>
                       <h5 class="py-1">ganancia:$0,00</h5>
                       <h5 class="py-1">Precio de venta:$0,00</h5>
                     </div>
                
               <?php }; ?>
 
      <?php if(!$hayPresentacion){  ActiveForm::end();} ?>
              </div>
              <div class="col-md-12 text-right my-1"><a class="btn text-uppercase mr-3 w-25 btn-light border border-primary" href="#">
                  <h6 class="text-primary"> <i class="fa fa-fw fa-pencil fa-2x"></i>&nbsp;Modificar</h6>
                </a></div>
            </div>
            <div class="row m-2">
              <div class="col-md-12">
              </div>
            </div>
            <div class="row m-2">
              <div class="col-md-3">
                <h1 class="">Cantidad</h1>
              </div>
              <?php $formup = ActiveForm::begin([
                    'id' => 'update-form',
                    'method' => 'post',
                    'action' => Url::to(['presentacion/update-stock'])
                ]); ?>
              <div class="col-md-9">
                <div class="input-group mb-2 mr-sm-2 input-group-lg">
                     <?= $formup->field($stockData ,'cantidad')->textInput(['class'=>'form-control-lg','placeholder'=>'0,00','style'=>'font-size:24px','value'=>'1', 'autofocus'=>true,'onfocus'=>'this.select()','onkeeyup'=>'enterCantidad(event);'])->label('Buscar:') ?> 
                     <?= $formup->field($stockData ,'codigo')->hiddenInput()->label(false);?>
                     <?= $formup->field($stockData ,'numeroComprobante')->hiddenInput(['value'=>'333'])->label(false);?>
<!--                    <input type="number" class="form-control-lg" id="numCantidad" placeholder="0,00" style="" value="1" autofocus onfocus="this.select();" onkeyup="enterCantidad(event);">-->
                  <div class="input-group-prepend">
                    <div class="input-group-text bg-primary text-light ml-1 px-2">
                      <i class="fa fa-calculator fa-lg text-light "></i>
                    </div>
                  </div>
                </div>
              </div>
                 <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
        <script>
            function enterCantidad(e){
                 var enterKey = 13;
                    if (e.which == enterKey){
                        
                        //document.location.href='index.php?r=precentacion/update-stock';
                        $('#update-form').yiiActiveForm('submitForm');
                    }
            }
        </script>
    
  </div>  
    
     <!-- .................................................................-->


    <?php ActiveForm::end(); ?>

</div>
