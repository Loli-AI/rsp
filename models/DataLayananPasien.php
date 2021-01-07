<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "data_layanan_pasien".
 *
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
 * @property string $kelurahan
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
 * @property string|null $user
 * @property string|null $stat_lay
 * @property string|null $alergi
 * @property int $id
 * @property string|null $dpjp
 */
class DataLayananPasien extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data_layanan_pasien';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'tgl_lahir', 'propinsi', 'kabupaten', 'kecamatan', 'kelurahan', 'dokter'], 'required'],
            [['nik', 'no_sjp'], 'number'],
            [['tgl_lahir', 'tgl_sjp'], 'safe'],
            [['nama', 'suami_istri', 'ortu', 'pendidikan', 'kewarganegaraan', 'pekerjaan', 'no_telepon', 'jenis_kelamin', 'agama', 'gol_darah', 'umur', 'alamat', 'propinsi', 'kabupaten', 'kecamatan', 'kelurahan', 'rw', 'rt', 'loket', 'tgl_kunjungan', 'alasan_msk', 'status_pasien', 'jenis_layanan', 'temp_layanan', 'kelas', 'retribusi', 'dokter', 'ket_pasien', 'penjamin_pasien', 'no_anggota', 'hak_kelas', 'status', 'user', 'stat_lay', 'alergi', 'dpjp'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nama' => 'Nama',
            'nik' => 'Nik',
            'suami_istri' => 'Suami Istri',
            'ortu' => 'Ortu',
            'pendidikan' => 'Pendidikan',
            'kewarganegaraan' => 'Kewarganegaraan',
            'pekerjaan' => 'Pekerjaan',
            'no_telepon' => 'No Telepon',
            'jenis_kelamin' => 'Jenis Kelamin',
            'agama' => 'Agama',
            'gol_darah' => 'Gol Darah',
            'tgl_lahir' => 'Tgl Lahir',
            'umur' => 'Umur',
            'alamat' => 'Alamat',
            'propinsi' => 'Propinsi',
            'kabupaten' => 'Kabupaten',
            'kecamatan' => 'Kecamatan',
            'kelurahan' => 'Kelurahan',
            'rw' => 'Rw',
            'rt' => 'Rt',
            'loket' => 'Loket',
            'no_rm' => 'No Rm',
            'tgl_kunjungan' => 'Tgl Kunjungan',
            'alasan_msk' => 'Alasan Msk',
            'status_pasien' => 'Status Pasien',
            'tgl_sjp' => 'Tgl Sjp',
            'no_sjp' => 'No Sjp',
            'jenis_layanan' => 'Jenis Layanan',
            'temp_layanan' => 'Temp Layanan',
            'kelas' => 'Kelas',
            'retribusi' => 'Retribusi',
            'dokter' => 'Dokter',
            'ket_pasien' => 'Ket Pasien',
            'penjamin_pasien' => 'Penjamin Pasien',
            'no_anggota' => 'No Anggota',
            'hak_kelas' => 'Hak Kelas',
            'status' => 'Status',
            'user' => 'User',
            'stat_lay' => 'Stat Lay',
            'alergi' => 'Alergi',
            'id' => 'ID',
            'dpjp' => 'Dpjp',
        ];
    }
}
