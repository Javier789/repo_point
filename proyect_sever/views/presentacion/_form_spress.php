<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\grid\GridView ;
use yii\data\ActiveDataProvider;
	


/* @var $this yii\web\View */
/* @var $model app\models\Presentacion */
/* @var $form yii\widgets\ActiveForm */
/* @var  $stockData app\models\FormEpressPresentacion */


$hayPresentacion=false;
$cantidadActivar='true';
$focoNumComp=false;
$focoCodigoBarra=false;
$focoCantidad=false;


$listArtComp = new ActiveDataProvider([
            'query' => \app\models\DetalleComprobante::find()->where(['idComprobante' => $stockData->numeroComprobante]),
            'pagination' => [
                'pageSize' => 8,
            ],
        ]);




if(isset($stockData->codigoProducto)){
    if($model){
        $hayPresentacion=true;
       // $stockData->codigoProducto=$model->codigoProducto;
        $focoCantidad=true;
     }else{
         $hayPresentacion=false;
         $focoCodigoBarra=true;
     }
}else{
     $focoNumComp=true;
}
   
//echo var_dump($stockData);
?>

<div class="presentacion-form">

    <?php 
   
     $formup = ActiveForm::begin([
             'id' => 'update-form',
             'method' => 'post',
             'action' => Url::to(['presentacion/update-spress'])
             
         ]);
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
     
             <div class="row">
                  <div class="col-md-6">
                         <?= $formup->field($stockData ,'numeroComprobante')->textInput(['class'=>'form-control form-control-lg', 'autofocus'=>$focoNumComp,'onfocus'=>'this.select()', 'id'=>'txtNumeroComprobante', 'placeholder'=>'Número de Comprobante', 'style'=>'font-size:24px'])->label('Nº de Comprobante');?>
<!--                      <input type="text" class="form-control form-control-lg" id="txtNumeroComprobante" placeholder="Número de Comprobante" style="font-size:24px" value ="<=Html::encode($stockData->numeroComprobante);?>">-->
                  </div>
              </div>
              
             <div class="row">
                <div class="col-md-6">
                  <div class="input-group mb-2 mr-sm-2">
                        <?php if(!$hayPresentacion){
                            //echo $form->field($searchModel, 'txtSearch')->textInput(['class'=>'form-control-lg', 'autofocus'=>$focoCodigoBarra,'onfocus'=>'this.select()' ,'placeholder'=>'Codido de barra','style'=>'font-size:24px'])->label('Buscar:');
                            echo $formup->field($stockData, 'codigoProducto')->textInput(['class'=>'form-control-lg', 'autofocus'=>$focoCodigoBarra,'onfocus'=>'this.select()' ,'placeholder'=>'Codido de barra','style'=>'font-size:24px'])->label('Código de barra');
                           
                            } else{ ?> 
                      <input type="text" class="form-control form-control-lg" id="inlineFormInputGroupUsername2" placeholder="Codido de barra" style="font-size:30px" disabled="true" value ="<?=Html::encode($model->codigoProducto);?>">
                       <?php
                          $cantidadActivar='false';

                        } ?>
                      
                 <spam style="margin:10px;"><i class="fa fa-barcode fa-3x text-primary"></i></spam>
                 <spam style="margin:10px;">
                    <?php if(!$hayPresentacion){
                        echo Html::submitButton('<i class="fa fa-search fa-2x"></i>', ['class' => 'btn btn-success']);
                        
                    }else{
                         echo Html::submitButton('<i class="fa fa-close fa-2x"></i>', ['class' => 'btn btn-danger','onclick'=>'$("#inlineFormInputGroupUsername2").val("");']);
                    } ?>
                 </spam>
                 
                  </div>
                </div>
                <div class="col-md-5 text-right">
                    <?php if(!$hayPresentacion){?>
                      <a class="btn text-uppercase  btn-success text-center" href="index.php?r=presentacion/create" target="_blank">
                        <h6> <i class="fa fa-plus fa-2x"></i>&nbsp;Agregar</h6>
                      </a> 
                    <?php  }else{
                        if($model->activo===0){?>
                      <div class="row">
                          <div class="col-md-6">
                              <p>Éste articulo está dado de baja, esos significa que lo estará disponibles, para poder activarlos haga click en el boton Activar </p>
                          </div>
                          <div class="col-md-6">
                              <a class="btn text-uppercase  btn-success text-center" href="#" >
                                <h6> <i class="fa fa-check fa-2x"></i>&nbsp;Activar</h6>
                              </a>
                          </div>
                      </div>
                      
                  <?php }
                    }?> 
                    
                </div>
            </div>


          </div>
        </div>
      </div>
    </div>
  </div>
    
  <?php ActiveForm::end(); ?>   


      <div class="row">
        <div class="col-md-6" style="">
          <div class="card border border-primary">
            <div class="card-header bg-primary text-light">
              <h3 > Descripción</h3>
            </div>

            <div class="card-body">
                  <div class="row">
                      <?php if ($model) { ?>
                          <div class="col-md-3" style=""><img class="img-fluid d-block justify-content-center align-items-center " src="<?= Html::encode($model->foto); ?>" height="100px"></div>
                          <div class="col-md-9" style="">
                              <h4> <?= Html::encode($model->producto->nombre); ?></h4>
                              <h6><?= Html::encode($model->marca->nombre); ?></h6>
                              <p> <?= Html::encode($model->descripcion); ?> </p>
                              <h5 class="py-1">Costo:$<?= Html::encode($model->costo); ?></h5>
                              <h5 class="py-1">ganancia:$<?= Html::encode($model->costo); ?></h5>
                              <h5 class="py-1">Precio de venta:$<?= Html::encode($model->precioSugerido); ?></h5>
                              <a class="btn text-uppercase mr-3 w-25 btn-light border border-primary" href="#">
                                  <h6 class="text-primary"> <i class="fa fa-fw fa-pencil fa-2x"></i>&nbsp;Modificar</h6>
                              </a>
                          </div>
                      <?php } else { ?>

                          <div class="col-md-3" style=""><img class="img-fluid d-block justify-content-center align-items-center w-100" src="" width="150px"></div>
                          <div class="col-md-9" style="">
                              <h4>sin dato</h4>
                              <h6>sin datos</h6>
                              <p> sin datos</p>
                              <h5 class="py-1">Costo:$0,00</h5>
                              <h5 class="py-1">ganancia:$0,00</h5>
                              <h5 class="py-1">Precio de venta:$0,00</h5>
                          </div>

                      <?php }; ?>


                  </div>

            </div>
            
         <!-- llamamos a la actualizacion de stock-->
             <?php
             $form = ActiveForm::begin([
                         'id' => 'updateStock-form',
                         'method' => 'post',
                         'action' => Url::to(['presentacion/update-stock'])
             ]);
             ?>
            <div class="row m-2">
              <div class="col-md-3">
                <h1 class="">Cantidad</h1>
              </div>
             
                
              <div class="col-md-9">
                <div class="input-group mb-2 mr-sm-2 input-group-lg">
           
                     <?= $form->field($stockData ,'cantidad')->textInput(['class'=>'form-control-lg','placeholder'=>'0,00','style'=>'font-size:24px; disabled:"'.$cantidadActivar.'"','disabled'=>!$hayPresentacion,'value'=>'1', 'autofocus'=>$focoCantidad,'onfocus'=>'this.select()','onkeeyup'=>'enterCantidad(event);'])->label('Buscar:') ?> 
                     <?= $form->field($stockData ,'codigoProducto')->hiddenInput(['value'=> $stockData->codigoProducto])->label(false);?>
                    <?= $form->field($stockData ,'numeroComprobante')->hiddenInput(['value'=> $stockData->numeroComprobante])->label(false);?>
<!--                    <input type="number" class="form-control-lg" id="numCantidad" placeholder="0,00" style="" value="1" autofocus onfocus="this.select();" onkeyup="enterCantidad(event);">-->
               
    
                 <spam style="margin:10px;"><i class="fa fa-calculator fa-3x text-primary"></i></spam>
                 <spam style="margin:10px;">
                    <?php if(!$hayPresentacion){
                        echo Html::submitButton('<i class="fa fa-save fa-2x"></i> Guardar', ['class' => 'btn btn-success','disabled'=>!$hayPresentacion]);
                        
                    }else{
                         echo Html::submitButton('<i class="fa fa-save fa-2x"></i>', ['class' => 'btn btn-success','onclick'=>'']);
                    } ?>
                 </spam>
                    
                    
                </div>
              </div>

            </div>
           <?php ActiveForm::end(); ?>   
              
          </div>
        </div>
          
          <!-- LISTA-->
        <div class="col-md-6" style="">
            <div class="card border border-primary" style="height:100%">
                <div class="card-header bg-primary text-light text-center">
                    <h3 > Articulos del comprobante registrados</h3>
                </div>

                <div class="card-body">

                    <?=
                    GridView::widget([
                        'dataProvider' => $listArtComp,
                        'columns' => [
                            'cantidad',
                            'presentacion.descripcion',
                            'presentacion.precioSugerido',
                        ],
                    ]);
                    ?>
                </div>
            </div>  
        </div>  

     

        <script>
            

                 
                 
            function enterCantidad(e){
                 var enterKey = 13;
                    if (e.which == enterKey){
                        
                        //document.location.href='index.php?r=precentacion/update-stock';
                        $('#updateStock-form').yiiActiveForm('submitForm');
                    }
            }
        </script>

    
     <!-- .................................................................-->


 

</div>
 <?php
$script = <<< JS
    jQuery(document).ready(function($) {
                    $(".spress-form000").submit(function(event) {
                         event.preventDefault(); // stopping submitting
                         var data = $(this).serializeArray();
                         var url = $(this).attr('action');
                         $.ajax({
                             url: url,
                             type: 'post',
                             dataType: 'json',
                             data: data
                         })
                         .done(function(response) {
                             if (response.data.success == true) {
                                 alert("Wow you commented");
                             }
                         })
                         .fail(function() {
                             console.log("error");
                         });

                     });
                 });
JS;
    
    $this->registerJs($script);
 ?>