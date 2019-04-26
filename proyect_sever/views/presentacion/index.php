<?php

use yii\helpers\Html;
use yii\grid\GridView;//?

use yii\helpers\Url;
use yii\widgets\ListView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PresentacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lista de Articulos';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="presentacion-index">

    <h1><?= Html::encode($this->title) ?></h1>

</div>


 <!-- -------------------------- ------------------------------------------ -->
  <div class="py-0">
    <div class="container">
      <div class="row bg-primary" style=" padding: 10px 5px;height: 60px;">
        <div class="col-md-3">
        <?php
        $estado=0;

        $form = ActiveForm::begin([
            'id' => 'search-form',
            'method' => 'get',
            'action' => Url::to(['presentacion/index']),
            'options' => ['class' => 'form-inline'],
        ]) ?>
            

            <!-- Form code begins -->
          <?= $form->field($searchModel, 'txtSearch')->textInput()->label('Buscar:') ?> 
          </div>

       <!-- Form code ends --> 
            <div class="form-group col-md-9">
                <div class="col-lg-offset-1 col-lg-11">
                   
                    <?= Html::submitButton('<i class="fa  fa-search fa-2x"></i>', ['class' => 'btn  btn-success','id'=>'botSubmit']) ?>
                </div>
            </div>
        <?php ActiveForm::end() ?>
      </div>
    </div>
  </div>


<!-- -------------------------- ------------------------------------------ -->
     <?= ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => function ($model, $key, $index, $widget) {
        return $this->render('_item_articulo',['model' => $model,'findText'=>'Al']);
    },
             // Customzing options for pager container tag
        'options' => [
            'tag' => 'div',
            'class' => 'pager-wrapper',
            'id' => 'pager-container',
        ],
          'emptyText'=>'<h5>NO HAY ARTICULOS PARA MOSTRAR</h5>',
            'separator'=>'<hr/>',
    'pager' => [
        'firstPageLabel' => 'first',
        'lastPageLabel' => 'last',
        'prevPageLabel' => '<span class="glyphicon glyphicon-chevron-left"></span>',
        'nextPageLabel' => '<span class="glyphicon glyphicon-chevron-right"></span>',
        
    ],

]); ?>    

    <p>
        <?= Html::a('Agregar', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
