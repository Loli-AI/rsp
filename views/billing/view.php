<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\KunjunganPasien */

\yii\web\YiiAsset::register($this);
?>
<div class="kunjungan-pasien-view">

    <p>
        <?= Html::a('<i class="fas fa-pen"></i> Edit', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<i class="fas fa-trash-alt"></i> Hapus', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Hapus Pasien ' . $model->nama . '?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'no_rm',
            'nama',
            'nik',
            'suami_istri',
            'ortu',
            'pendidikan',
            'kewarganegaraan',
            'pekerjaan',
            'no_telepon',
            'jenis_kelamin',
            'agama',
            'gol_darah',
            'tgl_lahir',
            'umur',
            'alamat',
            'propinsi',
            'kabupaten',
            'kecamatan',
            'kelurahan',
            'rw',
            'rt',
            'loket',
            'tgl_kunjungan',
            'alasan_msk',
            'status_pasien',
            'tgl_sjp',
            'no_sjp',
            'jenis_layanan',
            'temp_layanan',
            'kelas',
            'retribusi',
            'dokter',
            'ket_pasien',
            'penjamin_pasien',
            'no_anggota',
            'hak_kelas',
            'status',
            'user',
        ],
    ]) ?>

</div>
