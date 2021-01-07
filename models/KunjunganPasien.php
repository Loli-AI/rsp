<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kunjungan_pasien".
 *
 * @property int $id
 * @property string $nama
 * @property float|null $nik
 * @property string|null $suami_istri
 * @property string|null $ortu
 * @property string|null $pendidikan
 * @property string|null $kewarganegaraan
 * @property string|null $pekerjaan
 * @property string|null $no_telepon
 * @property string|null $jenis_kelamin
 * @property string|null $agama
 * @property string|null $gol_darah
 * @property string $tgl_lahir
 * @property string|null $umur
 * @property string|null $alamat
 * @property string $propinsi
 * @property string $kabupaten
 * @property string $kecamatan
 * @property string|null $kelurahan
 * @property string|null $rw
 * @property string|null $rt
 * @property string|null $loket
 * @property int $no_rm
 * @property string|null $tgl_kunjungan
 * @property string|null $alasan_msk
 * @property string|null $status_pasien
 * @property string|null $tgl_sjp
 * @property float|null $no_sjp
 * @property string|null $jenis_layanan
 * @property string|null $temp_layanan
 * @property string|null $kelas
 * @property string|null $retribusi
 * @property string $dokter
 * @property string|null $ket_pasien
 * @property string|null $penjamin_pasien
 * @property string|null $no_anggota
 * @property string|null $hak_kelas
 * @property string|null $status
 */
class KunjunganPasien extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kunjungan_pasien';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'tgl_lahir', 'tgl_kunjungan', 'propinsi', 'kabupaten', 'kecamatan', 'dokter', 'kelurahan', 'no_rm'], 'required'],
            [['nik', 'no_sjp'], 'number'],
            [['tgl_sjp'], 'safe'],
            [['nama', 'stat_lay', 'user', 'suami_istri', 'ortu', 'pendidikan', 'kewarganegaraan', 'pekerjaan', 'no_telepon', 'jenis_kelamin', 'agama', 'gol_darah', 'umur', 'alamat', 'propinsi', 'kabupaten', 'kecamatan', 'kelurahan', 'rw', 'rt', 'loket', 'alasan_msk', 'status_pasien', 'jenis_layanan', 'temp_layanan', 'kelas', 'retribusi', 'dokter', 'ket_pasien', 'penjamin_pasien', 'no_anggota', 'hak_kelas', 'status'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user' => 'User',
            'nama' => 'Nama Lengkap',
            'nik' => 'NIK',
            'suami_istri' => 'Suami / Istri',
            'ortu' => 'Nama Orangtua',
            'pendidikan' => 'Pendidikan',
            'kewarganegaraan' => 'Kewarganegaraan',
            'pekerjaan' => 'Pekerjaan',
            'no_telepon' => 'No. Telepon',
            'jenis_kelamin' => 'Jenis Kelamin',
            'agama' => 'Agama',
            'gol_darah' => 'Gol. Darah',
            'tgl_lahir' => 'Tgl. Lahir',
            'umur' => 'Umur',
            'alamat' => 'Alamat',
            'propinsi' => 'Propinsi',
            'kabupaten' => 'Kabupaten',
            'kecamatan' => 'Kecamatan',
            'kelurahan' => 'Kelurahan',
            'rw' => 'RW',
            'rt' => 'RT',
            'loket' => 'Loket',
            'no_rm' => 'RM',
            'tgl_kunjungan' => 'Tgl. Kunjungan',
            'alasan_msk' => 'Alasan Masuk',
            'status_pasien' => 'Status Pasien',
            'tgl_sjp' => 'Tgl. SJP',
            'no_sjp' => 'No. SJP',
            'jenis_layanan' => 'Jenis Layanan',
            'temp_layanan' => 'Tempat Layanan',
            'kelas' => 'Kelas',
            'retribusi' => 'Retribusi',
            'dokter' => 'Dokter',
            'ket_pasien' => 'Keterangan Pasien',
            'penjamin_pasien' => 'Penjamin Pasien',
            'no_anggota' => 'No. Anggota',
            'hak_kelas' => 'Hak Kelas',
            'status' => 'Status',
            'stat_lay' => 'Sttus',
        ];
    }

}
