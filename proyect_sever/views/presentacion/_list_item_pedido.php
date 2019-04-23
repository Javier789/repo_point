<?php
// _list_item.php
use yii\helpers\Html;
use yii\helpers\Url;


?>

<?php 
  $fText=$findText;
  $iconModo='fa-globe';
  $colorFondo='rgba(214,214,214,0.3)';
  $textEstado='<h3 class="my-2 mx-3"> <i class="fa fa-fw fa-clock-o"></i>&nbsp;En espera... </h3>';
  $estadoBotonAccion='';
  
  $iconoCliente= Url::to('@web/img/icon_user.png');
  $estado='enEspera';
  
  
  if(isset($estado)){
        switch ($estado){
            case 'enEspera':
                $colorFondo='rgba(61,109,247,0.3)';
                $textEstado='<h3 class="my-2 mx-3" style="color:#337ab7;"> <i class="fa fa-fw fa-clock-o"></i>&nbsp;En espera </h3> ';
                $estadoBotonAccion='';
                break;
            case 'aprobado':
                $colorFondo='rgba(184,61,247,0.3)';
                $textEstado='<h3 class="my-2 mx-3" style="color:#8a33b7;"> <i class="fa fa-fw fa-thumbs-o-up"></i>&nbsp;Aprobado </h3> ';
                $estadoBotonAccion=' disabled ';
                 break;

            case 'preparando':  
                $colorFondo='rgba(247,164,61,0.3)';
                $textEstado='<h3 class="my-2 mx-3" style="color:#d2a525;"> <i class="fa fa-fw fa-cubes"></i>&nbsp;Preparado </h3>';
                $estadoBotonAccion=' disabled ';
                 break;

            case 'desaprobado':  
                $colorFondo='rgba(247,61,61,0.3)';
                $textEstado='<h3 class="my-2 mx-3" style="color:#ff1919;"> <i class="fa fa-fw fa-thumbs-down"></i>&nbsp;Rechazado </h3> ';
                $estadoBotonAccion=' disabled ';
                 break; 
             default :
                 $colorFondo='rgba(214,214,214,0.3)';
                 $textEstado='<h3 class="my-2 mx-3" style="color:#ff1919;"> <i class="fa fa-fw fa-frown-o"></i>&nbsp; sin Estado </h3>';
                 $estadoBotonAccion=' disabled ';
                 

        }
  }
  if('preventa'=='preventa'){
    $iconModo='fa-handshake-o';  
      
  }  
  
?>
<div class="py-5" >
    <div class="container">
        <div class="row bordeSelect" style="background-color: <?= Html::encode($colorFondo); ?> ;border-style: solid;border-radius: 10px;">
          <div class="col-md-1 align-items-center justify-content-center text-center my-2"><img class="img-fluid d-block my-5 bg-primary" src="<?php echo $iconoCliente; ?>" width="72px" style="margin-top:30px; border-radius:50%"></div>
        <div class="col-md-10">
          <div class="row">
            <div class="col-md-4">
              <h2 class=""><?= Html::encode($model->cliente->getNombre()); ?>  <small class="text-muted"><?= Html::encode($model->direccionEntrega->nombreLocalidad); ?> </small></h2>
              <p class="text-monospace"><?= Html::encode($model->direccionEntrega->toString()); ?> </p>
           
            </div>
            <div class="col-md-4">
              <?php echo $textEstado; ?>
            </div>
            <div class="col-md-4">
              <h4 class="my-2 mx-3">
                <i class="fa fa-fw <?= Html::encode($iconModo); ?>"></i>&nbsp;<?= Html::encode($model->usuarioCargo->username); ?></h4>
            </div>
            <div class="col-md-4 text-center">
                
                <a class="btn align-items-start btn-success mr-3 <?= Html::encode($estadoBotonAccion); ?>" href="aprobar/<?= Html::encode($model->nroPedido); ?>" onclick="">
                  <i class="fa fa-fw fa-thumbs-o-up"></i>&nbsp;Aprobar </a>
              <a class="btn btn-danger <?= Html::encode($estadoBotonAccion); ?>" href="desaprobar/<?= Html::encode($model->nroPedido); ?>">
                  <i class="fa fa-fw fa-thumbs-down"></i>&nbsp;Rechazar </a>
            
            </div>
            <div class="col-md-4">
              <h3 class="my-2 mx-3">
                <i class="fa fa-fw fa-calendar-o"></i>&nbsp; <?=Yii::$app->formatter->asDate($model->fechaRealizado, 'yyyy-MM-dd'); ?> </h3>
            </div>
            <div class="col-md-4">
              <h5> Total: </h5>
              <h3 class="my-2 mx-3">
                <i class="fa fa-fw fa-usd"></i>&nbsp;<?= Html::encode($model->getTotal()); ?></h3>
            </div>
          </div>
        </div>
        <div class="col-md-1 text-center">
            <a class="btn btn-light align-middle" href="#" >
                <i class="fa fa-fw fa-1x py-1 fa-eye fa-3x"></i>
            </a>
        </div>
      </div>
    </div>
  </div>
