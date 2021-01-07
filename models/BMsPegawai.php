<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "b_ms_pegawai".
 *
 * @property string|null $id
 * @property string|null $user_id_inacbg
 * @property string|null $kode
 * @property string|null $username
 * @property string|null $pwd
 * @property string|null $nip
 * @property string|null $sip
 * @property string|null $nama
 * @property string|null $sex
 * @property string|null $agama
 * @property string|null $kode_agama
 * @property string|null $tmpt_lahir
 * @property string|null $tgl_lahir
 * @property string|null $alamat
 * @property string|null $telp
 * @property string|null $hp
 * @property string|null $pegawai_jenis
 * @property string|null $kode_jenis
 * @property string|null $pegawai_status_id
 * @property string|null $peg_status_kode
 * @property string|null $spesialisasi_id
 * @property string|null $spesialisasi
 * @property string|null $staplikasi
 * @property string|null $marital
 * @property string|null $nama_ortu
 * @property string|null $alamat_ortu
 * @property string|null $nama_suami_istri
 * @property string|null $no_sipa
 * @property string|null $tgl_act
 * @property string|null $user_act
 * @property string|null $aktif
 * @property string|null $flag
 */
class BMsPegawai extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'b_ms_pegawai';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id_inacbg', 'kode', 'username', 'pwd', 'nip', 'sip', 'nama', 'sex', 'agama', 'kode_agama', 'tmpt_lahir', 'tgl_lahir', 'alamat', 'telp', 'hp', 'pegawai_jenis', 'kode_jenis', 'pegawai_status_id', 'peg_status_kode', 'spesialisasi_id', 'spesialisasi', 'staplikasi', 'marital', 'nama_ortu', 'alamat_ortu', 'nama_suami_istri', 'no_sipa', 'tgl_act', 'user_act', 'aktif', 'flag'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id_inacbg' => 'User Id Inacbg',
            'kode' => 'Kode',
            'username' => 'Username',
            'pwd' => 'Pwd',
            'nip' => 'Nip',
            'sip' => 'Sip',
            'nama' => 'Nama',
            'sex' => 'Sex',
            'agama' => 'Agama',
            'kode_agama' => 'Kode Agama',
            'tmpt_lahir' => 'Tmpt Lahir',
            'tgl_lahir' => 'Tgl Lahir',
            'alamat' => 'Alamat',
            'telp' => 'Telp',
            'hp' => 'Hp',
            'pegawai_jenis' => 'Pegawai Jenis',
            'kode_jenis' => 'Kode Jenis',
            'pegawai_status_id' => 'Pegawai Status ID',
            'peg_status_kode' => 'Peg Status Kode',
            'spesialisasi_id' => 'Spesialisasi ID',
            'spesialisasi' => 'Spesialisasi',
            'staplikasi' => 'Staplikasi',
            'marital' => 'Marital',
            'nama_ortu' => 'Nama Ortu',
            'alamat_ortu' => 'Alamat Ortu',
            'nama_suami_istri' => 'Nama Suami Istri',
            'no_sipa' => 'No Sipa',
            'tgl_act' => 'Tgl Act',
            'user_act' => 'User Act',
            'aktif' => 'Aktif',
            'flag' => 'Flag',
        ];
    }
}
