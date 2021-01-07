<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KunjunganPasien */

$this->title = 'Registrasi Pasien';
?>
<div class="kunjungan-pasien-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
