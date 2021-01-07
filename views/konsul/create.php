<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DataRujukUnit */

$this->title = 'Create Data Rujuk Unit';
$this->params['breadcrumbs'][] = ['label' => 'Data Rujuk Units', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-rujuk-unit-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
