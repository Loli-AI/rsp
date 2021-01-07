<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DataRujukUnit */
/* @var $form ActiveForm */
?>
<div class="billing-site">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'tgl') ?>
        <?= $form->field($model, 'unit') ?>
        <?= $form->field($model, 'dokter') ?>
        <?= $form->field($model, 'dokter_tujuan') ?>
        <?= $form->field($model, 'keterangan') ?>
        <?= $form->field($model, 'pasien_id') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- billing-site -->
