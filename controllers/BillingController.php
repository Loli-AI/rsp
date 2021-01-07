<?php

namespace app\controllers;

use Yii;
use app\models\KunjunganPasien;
use app\models\DataLayananPasien;
use app\models\BMsDiagnosa;
use app\models\BMsPegawai;
use app\models\BMsTaripBaru;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\helpers\Url;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use app\models\BMsBobat;

/**
 * BillingController implements the CRUD actions for KunjunganPasien model.
 */
class BillingController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all KunjunganPasien models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => KunjunganPasien::find(),
        ]);
        $model = new KunjunganPasien();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }

    /**
     * Displays a single KunjunganPasien model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new KunjunganPasien model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new KunjunganPasien();
        $layanan = new DataLayananPasien();
        $db = Yii::$app->db;
        $rm = $db->createCommand("SELECT no_rm FROM kunjungan_pasien WHERE id = (SELECT MAX(id) FROM kunjungan_pasien)")->queryOne();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if ($model->temp_layanan == 'MCU') {
            $check1 = $db->createCommand()->insert('data_layanan_pasien', ['nama' => $model->nama, 'ortu' => $model->ortu, 'jenis_kelamin' => $model->jenis_kelamin, 'tgl_lahir' => $model->tgl_lahir, 'no_rm' => $model->no_rm, 'tgl_kunjungan' => $model->tgl_kunjungan, 'alasan_msk' => $model->alasan_msk, 'jenis_layanan' => $model->jenis_layanan, 'temp_layanan' => 'Poli Umum', 'kelas' => $model->kelas, 'dokter' => '', 'ket_pasien' => $model->ket_pasien, 'penjamin_pasien' => $model->penjamin_pasien, 'stat_lay' => $model->stat_lay, 'pasien_id' => $model->id, 'dokter_tujuan' => $model->dokter, 'alamat' => $model->alamat ])->execute();

            $check2 = $db->createCommand()->insert('data_layanan_pasien', ['nama' => $model->nama, 'ortu' => $model->ortu, 'jenis_kelamin' => $model->jenis_kelamin, 'tgl_lahir' => $model->tgl_lahir, 'no_rm' => $model->no_rm, 'tgl_kunjungan' => $model->tgl_kunjungan, 'alasan_msk' => $model->alasan_msk, 'jenis_layanan' => $model->jenis_layanan, 'temp_layanan' => 'Poli Gigi', 'kelas' => $model->kelas, 'dokter' => '', 'ket_pasien' => $model->ket_pasien, 'penjamin_pasien' => $model->penjamin_pasien, 'stat_lay' => $model->stat_lay, 'pasien_id' => $model->id, 'dokter_tujuan' => $model->dokter, 'alamat' => $model->alamat ])->execute();

            $check3 = $db->createCommand()->insert('data_layanan_pasien', ['nama' => $model->nama, 'ortu' => $model->ortu, 'jenis_kelamin' => $model->jenis_kelamin, 'tgl_lahir' => $model->tgl_lahir, 'no_rm' => $model->no_rm, 'tgl_kunjungan' => $model->tgl_kunjungan, 'alasan_msk' => $model->alasan_msk, 'jenis_layanan' => $model->jenis_layanan, 'temp_layanan' => 'Poli Penyakit Dalam', 'kelas' => $model->kelas, 'dokter' => '', 'ket_pasien' => $model->ket_pasien, 'penjamin_pasien' => $model->penjamin_pasien, 'stat_lay' => $model->stat_lay, 'pasien_id' => $model->id, 'dokter_tujuan' => $model->dokter, 'alamat' => $model->alamat ])->execute();

            $check4 = $db->createCommand()->insert('data_layanan_pasien', ['nama' => $model->nama, 'ortu' => $model->ortu, 'jenis_kelamin' => $model->jenis_kelamin, 'tgl_lahir' => $model->tgl_lahir, 'no_rm' => $model->no_rm, 'tgl_kunjungan' => $model->tgl_kunjungan, 'alasan_msk' => $model->alasan_msk, 'jenis_layanan' => $model->jenis_layanan, 'temp_layanan' => 'RADIOLOGI', 'kelas' => $model->kelas, 'dokter' => '', 'ket_pasien' => $model->ket_pasien, 'penjamin_pasien' => $model->penjamin_pasien, 'stat_lay' => $model->stat_lay, 'pasien_id' => $model->id, 'dokter_tujuan' => $model->dokter, 'alamat' => $model->alamat ])->execute();

            $check5 = $db->createCommand()->insert('data_layanan_pasien', ['nama' => $model->nama, 'ortu' => $model->ortu, 'jenis_kelamin' => $model->jenis_kelamin, 'tgl_lahir' => $model->tgl_lahir, 'no_rm' => $model->no_rm, 'tgl_kunjungan' => $model->tgl_kunjungan, 'alasan_msk' => $model->alasan_msk, 'jenis_layanan' => $model->jenis_layanan, 'temp_layanan' => 'LAB PK', 'kelas' => $model->kelas, 'dokter' => '', 'ket_pasien' => $model->ket_pasien, 'penjamin_pasien' => $model->penjamin_pasien, 'stat_lay' => $model->stat_lay, 'pasien_id' => $model->id, 'dokter_tujuan' => $model->dokter, 'alamat' => $model->alamat ])->execute();
            
                if ($check1 && $check2 && $check3 && $check4 && $check5) {
                    $idKonsul = $db->createCommand("SELECT * FROM data_layanan_pasien WHERE id = (SELECT MAX(id) FROM data_layanan_pasien)")->queryOne();

                    $db->createCommand()->insert('data_rujuk_unit', ['tgl' => $model->tgl_kunjungan, 'unit' => 'Poli Umum', 'dokter' => $model->dokter, 'dokter_tujuan' => $model->dokter, 'keterangan' => $model->ket_pasien, 'konsul_id' => $idKonsul['id']-4,'pasien_id' => $model->id])->execute();
                    $db->createCommand()->insert('data_rujuk_unit', ['tgl' => $model->tgl_kunjungan, 'unit' => 'Poli Gigi', 'dokter' => $model->dokter, 'dokter_tujuan' => $model->dokter, 'keterangan' => $model->ket_pasien, 'konsul_id' => $idKonsul['id']-3,'pasien_id' => $model->id])->execute();
                    $db->createCommand()->insert('data_rujuk_unit', ['tgl' => $model->tgl_kunjungan, 'unit' => 'Poli Penyakit Dalam', 'dokter' => $model->dokter, 'dokter_tujuan' => $model->dokter, 'keterangan' => $model->ket_pasien, 'konsul_id' => $idKonsul['id']-2,'pasien_id' => $model->id])->execute();
                    $db->createCommand()->insert('data_rujuk_unit', ['tgl' => $model->tgl_kunjungan, 'unit' => 'RADIOLOGI', 'dokter' => $model->dokter, 'dokter_tujuan' => $model->dokter, 'keterangan' => $model->ket_pasien, 'konsul_id' => $idKonsul['id']-1,'pasien_id' => $model->id])->execute();
                    $db->createCommand()->insert('data_rujuk_unit', ['tgl' => $model->tgl_kunjungan, 'unit' => 'LAB PK', 'dokter' => $model->dokter, 'dokter_tujuan' => $model->dokter, 'keterangan' => $model->ket_pasien, 'konsul_id' => $idKonsul['id'],'pasien_id' => $model->id])->execute();
                }
            }
            $db->createCommand()->insert('data_layanan_pasien', ['nama' => $model->nama, 'ortu' => $model->ortu, 'jenis_kelamin' => $model->jenis_kelamin, 'tgl_lahir' => $model->tgl_lahir, 'no_rm' => $model->no_rm, 'tgl_kunjungan' => $model->tgl_kunjungan, 'alasan_msk' => $model->alasan_msk, 'jenis_layanan' => $model->jenis_layanan, 'temp_layanan' => $model->temp_layanan, 'kelas' => $model->kelas, 'dokter' => $model->dokter, 'ket_pasien' => $model->ket_pasien, 'penjamin_pasien' => $model->penjamin_pasien, 'stat_lay' => $model->stat_lay, 'pasien_id' => $model->id, 'dokter_tujuan' => '', 'alamat' => $model->alamat ])->execute();

            return $this->redirect(['create']);
        }

        return $this->render('create', ['model' => $model, 'rm' => $rm, 'layanan' => $layanan]);
    }

    /**
     * Updates an existing KunjunganPasien model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $db = Yii::$app->db;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['create', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing KunjunganPasien model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['create']);
    }

    /**
     * Finds the KunjunganPasien model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return KunjunganPasien the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = KunjunganPasien::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    // public function actionGetData($rm){
    //     $location = KunjunganPasien::findBySql("SELECT * FROM kujungan_pasien WHERE no_rm = '$rm' ");
    //     return Json::encode($location);
    // }

        public function actionRmBaru(){
            $db = Yii::$app->db;
            $rm = $db->createCommand("SELECT no_rm FROM kunjungan_pasien WHERE id = (SELECT MAX(id) FROM kunjungan_pasien)")->queryOne(); 
            echo json_encode($rm);
        }
        
    public function actionAlergi($id){
        $db = Yii::$app->db;
        $data = $db->createCommand("SELECT * FROM riwayat_alergi WHERE pasien_id = '$id' ORDER BY id DESC")->queryAll();
        $response = ['data' => $data];
        echo json_encode($response);
    }

    public function actionAlergiTambah($id, $alergi, $tgl){
        $db = Yii::$app->db;
        $db->createCommand("UPDATE kunjungan_pasien SET alergi = '$alergi' WHERE id = '$id' ")->execute();
        $db->createCommand()->insert('riwayat_alergi', ['tgl' => $tgl, 'pasien_id' => $id, 'alergi' => $alergi])->execute();
    }

    public function actionHapusAlergi($id){
        $db = Yii::$app->db;
        $db->createCommand()->delete('riwayat_alergi', 'id= :alergi', array(':alergi' => $id))->execute();
    }

    public function actionAmbilDataTindakan($tind){
        $db = Yii::$app->db;
        $data = $db->createCommand("SELECT * FROM b_ms_tindakan WHERE nama = '$tind'")->queryAll();
        $response = ['data' => $data];
        echo json_encode($response);
    } 

    public function actionTambahTindakan($id, $tgl, $tind, $biaya, $jumlah, $kelas, $pelak, $ket, $total, $unit, $idLayanan){
        $db = Yii::$app->db;
        $db->createCommand("UPDATE data_layanan_pasien SET stat_lay = 'Sudah' WHERE id = '$idLayanan' ")->execute();
        $db->createCommand()->insert('data_tindakan', ['pasien_id' => $id, 'tanggal' => $tgl, 'tindakan' => $tind, 'kelas' => $kelas, 'biaya' => $biaya, 'jumlah' => $jumlah, 'subtotal' => $total, 'dokter' => $pelak, 'keterangan' => $ket, 'petugas_input' => 'Administrator', 'unit' => $unit])->execute();
        echo $id, $tgl, $tind, $biaya, $jumlah, $kelas, $pelak, $ket, $total;
    }

    public function actionDataTindakan($id, $unit){
        $db = Yii::$app->db;
        $data = $db->createCommand("SELECT * FROM data_tindakan WHERE pasien_id = '$id' AND unit = '$unit'")->queryAll();
        $response = ['data' => $data];
        echo json_encode($response);
    }

    public function actionHapusTindakan($id){
        $db = Yii::$app->db;
        $message = 'Tindakan Berhasil Dihapus!';
        $db->createCommand()->delete('data_tindakan', 'id= :id', array(':id' => $id))->execute();
        $mess = ['message' => $message];
        echo json_encode($mess);
    }

    public function actionDpjp($id, $dpjp, $idL){
        $db = Yii::$app->db;
        $db->createCommand("UPDATE kunjungan_pasien SET dpjp = '$dpjp' WHERE id = '$id' ")->execute();
        $url = Url::toRoute(['billing/pelayanan', 'id' => $id, 'idLayanan' => $idL]);
        return $this->redirect($url);
    }

    public function actionTelepon($id, $no, $idL){
        $db = Yii::$app->db;
        $query = $db->createCommand("UPDATE kunjungan_pasien SET no_telepon = '$no' WHERE id = '$id' ");
        $query->execute();
        $url = Url::toRoute(['billing/pelayanan', 'id' => $id, 'idLayanan' => $idL]);
        return $this->redirect($url);
    }

    public function actionCetakAntrian($id){
        $db = Yii::$app->db;
        $query = $db->createCommand("SELECT * FROM kunjungan_pasien WHERE id = '$id' ")->queryOne();
        return $this->render('cetak-antrian', ['data' => $query]);
    }

    public function actionPelayanan($id, $idLayanan){
        $db = Yii::$app->db;
        $data = $db->createCommand("SELECT * FROM kunjungan_pasien WHERE id = '$id' ")->queryOne();
        $jenis_layanan = $db->createCommand("SELECT * FROM jenis_layanan")->queryAll();
        $tempat_layanan_rj = $db->createCommand("SELECT * FROM tempat_layanan_rj")->queryAll();
        $bobat = $db->createCommand("SELECT * FROM b_ms_bobat")->queryAll();
        $dokterP = $db->createCommand("SELECT * FROM dokter_pengganti")->queryAll();
        $data_layanan = $db->createCommand("SELECT * FROM data_layanan_pasien WHERE pasien_id = '$id' ")->queryOne();
        $alergi = $db->createCommand("SELECT * FROM riwayat_alergi WHERE pasien_id = '$id' ORDER BY id DESC")->queryOne();
        $konsul = $db->createCommand("SELECT * FROM data_rujuk_unit WHERE pasien_id = '$id' ")->queryAll();
        $temp_layanan = $db->createCommand("SELECT * FROM data_layanan_pasien WHERE id = '$idLayanan' ")->queryOne();
        $diagnosaResep = $db->createCommand("SELECT diagnosa FROM data_diagnosa WHERE pasien_id = '$id'")->queryOne();

        $dokter = BMsPegawai::find('nama')->all();
        $dokter = ArrayHelper::map($dokter, 'nama', 'nama');
        $dokterPengganti = BMsPegawai::find('nama')->all();
        $dokterPengganti = ArrayHelper::map($dokterPengganti, 'nama', 'nama');
        $diagnosa = BMsDiagnosa::find('nama')->all();
        $diagnosa = ArrayHelper::map($diagnosa, 'nama', 'nama');
        $tindakan = BMsTaripBaru::find('nama')->all();
        $tindakan = ArrayHelper::map($tindakan, 'nama', 'nama');

        $riwayatP = Url::toRoute(['billing/rekam-pasien', 'id' => $id]);
        $resum = Url::toRoute(['billing/resum', 'id' => $id]);


        $response = ['data' => $data, 
                    'resum' => $resum,        
                    'riwayat' => $riwayatP,
                    'jenis_layanan' => $jenis_layanan,
                    'tempat_layanan_rj' => $tempat_layanan_rj,
                    'dokter' => $dokter,
                    'konsul' => $konsul,
                    'alergi' => $alergi,
                    'data_layanan' => $data_layanan,
                    'temp_layanan' => $temp_layanan,
                    'diagnosa' => $diagnosa,
                    'dokterP' => $dokterP,
                    'tindakan' => $tindakan,
                    'dokterPe' => $dokterPengganti,
                    'bobat' => $bobat,
                    'diagResep' => $diagnosaResep];
        return $this->render('pelayanan',$response); 
    }

    

    public function actionDataDiagnosa($id){
        $db = Yii::$app->db;
        $data = $db->createCommand("SELECT * FROM data_diagnosa WHERE pasien_id = '$id'")->queryAll();
        $response = ['data' => $data];
        echo json_encode($response);
    }

    public function actionDataDiagnosaClick($id){
        $db = Yii::$app->db;
        $data = $db->createCommand("SELECT * FROM data_diagnosa WHERE id = '$id'")->queryAll();
        $response = ['data' => $data];
        echo json_encode($response);
    }

    public function actionHapusDiagnosa($id){
        $db = Yii::$app->db;
        $db->createCommand()->delete('data_diagnosa', ['id' => $id])->execute();
    }

    public function actionTambahDiagnosa($id, $diag, $bandingout, $prio, $klinis, $akhir, $diagMati, $dokter, $date, $unit, $idLayanan){
        $db = Yii::$app->db;
        $db->createCommand("UPDATE data_layanan_pasien SET stat_lay = 'Sudah' WHERE id = '$idLayanan' ")->execute();
        if ($bandingout == '') {
            $db->createCommand()->insert('data_diagnosa', ['tgl' => $date, 'diagnosa' => $diag, 'banding' => 'Tidak', 'dokter' => $dokter, 'prioritas' => $prio, 'akhir' => $akhir,'penyebab_kematian' => $diagMati, 'klinis' => $klinis, 'pasien_id' => $id, 'unit' => $unit])->execute();
        } else {
            $test = $db->createCommand()->insert('data_diagnosa', ['tgl' => $date, 'diagnosa' => $diag, 'banding' => "Ya", 'dokter' => $dokter, 'prioritas' => $prio, 'akhir' => $akhir,'penyebab_kematian' => $diagMati, 'klinis' => $klinis, 'pasien_id' => $id, 'unit' => $unit])->execute();
            if ($test) {
                $show = $db->createCommand("SELECT * FROM data_diagnosa WHERE id = (SELECT MAX(id) FROM data_diagnosa)")->queryOne();
                $db->createCommand()->insert('diagnosa_banding', ['diagnosa' => $bandingout, 'pasien_id' => $id, 'diagnosa_id' => $show['id']])->execute();
            }
            
        }
    }

    public function actionTambahBanding($id, $diag){
        $db = Yii::$app->db;
        $id_diag = $db->createCommand("SELECT * FROM data_diagnosa WHERE id = (SELECT MAX(id) FROM data_diagnosa)")->queryOne();
        $db->createCommand()->insert('diagnosa_banding', ['diagnosa' => $diag, 'pasien_id' => $id, 'diagnosa_id' => $id_diag['id']])->execute();
    }

    

    public function actionSearchPel(){
        $tgl = $_POST['tgl'];
        $dokter = $_POST['dokter'];
        $layanan = $_POST['layanan'];
        $status = $_POST['status'];
        $tempat = $_POST['tempat'];
        $rm = $_POST['rm'];
        
        $url = Url::toRoute(['billing/pelayanan', 'id' => '']);
        $db = Yii::$app->db;

        // If Cabang 1 Parent
        if ($dokter != '' && ($tgl == '' && $layanan == '' && $status == '' && $tempat == '' && $rm == '') ) {
            $search = $db->createCommand("SELECT * FROM data_layanan_pasien WHERE dokter = '$dokter'")->queryAll();
        } else if ($rm != '' && ($tgl == '' && $layanan == '' && $status == '' && $tempat == '' && $dokter == '')) {
            $search = $db->createCommand("SELECT * FROM data_layanan_pasien WHERE no_rm = '$rm'")->queryAll();
        } else if ($tgl != '' && ($rm == '' && $layanan == '' && $status == '' && $tempat == '' && $dokter == '')) {
            $search = $db->createCommand("SELECT * FROM data_layanan_pasien WHERE tgl_kunjungan = '$tgl'")->queryAll();
        } else if ($layanan != '' && ($rm == '' && $tgl == '' && $status == '' && $tempat == '' && $dokter == '')) {
            $search = $db->createCommand("SELECT * FROM data_layanan_pasien WHERE jenis_layanan = '$layanan'")->queryAll();
        } else if ($tempat != '' && ($rm == '' && $tgl == '' && $status == '' && $layanan == '' && $dokter == '')) {
            $search = $db->createCommand("SELECT * FROM data_layanan_pasien WHERE temp_layanan = '$tempat'")->queryAll();
        } else if ($status != '' && ($rm == '' && $tgl == '' && $tempat == '' && $layanan == '' && $dokter == '')) {
            $search = $db->createCommand("SELECT * FROM data_layanan_pasien WHERE stat_lay = '$status'")->queryAll();
            
        // If Cabang 2
        } else if ( ($dokter != '' && $tgl != '') && ($layanan == '' && $status == '' && $tempat == '' && $rm == '') ) {
            $search = $db->createCommand("SELECT * FROM data_layanan_pasien WHERE dokter = '$dokter' AND tgl_kunjungan = '$tgl'")->queryAll();
        } else if ( ($dokter != '' && $layanan != '') && ($tgl == '' && $status == '' && $tempat == '' && $rm == '') ) {
            $search = $db->createCommand("SELECT * FROM data_layanan_pasien WHERE dokter = '$dokter' AND jenis_layanan = '$layanan'")->queryAll();
        } else if ( ($dokter != '' && $status != '') && ($tgl == '' && $layanan == '' && $tempat == '' && $rm == '') ) {
            $search = $db->createCommand("SELECT * FROM data_layanan_pasien WHERE dokter = '$dokter' AND stat_lay = '$status'")->queryAll();
        } else if ( ($dokter != '' && $tempat != '') && ($tgl == '' && $layanan == '' && $status == '' && $rm == '') ) {
            $search = $db->createCommand("SELECT * FROM data_layanan_pasien WHERE dokter = '$dokter' AND temp_layanan = '$tempat'")->queryAll();
        } else if ( ($dokter != '' && $rm != '') && ($tgl == '' && $layanan == '' && $status == '' && $tempat == '') ) {
            $search = $db->createCommand("SELECT * FROM data_layanan_pasien WHERE dokter = '$dokter' AND no_rm = '$rm ")->queryAll();
        } 

        else if ( ($rm != '' && $tgl != '') && ($layanan == '' && $status == '' && $tempat == '' && $dokter == '') ) {
            $search = $db->createCommand("SELECT * FROM data_layanan_pasien WHERE no_rm = '$rm' AND tgl_kunjungan = '$tgl'")->queryAll();
        } else if ( ($rm != '' && $layanan != '') && ($tgl == '' && $status == '' && $tempat == '' && $dokter == '') ) {
            $search = $db->createCommand("SELECT * FROM data_layanan_pasien WHERE no_rm = '$rm' AND jenis_layanan = '$layanan'")->queryAll();
        } else if ( ($rm != '' && $status != '') && ($tgl == '' && $layanan == '' && $tempat == '' && $dokter == '') ) {
            $search = $db->createCommand("SELECT * FROM data_layanan_pasien WHERE no_rm = '$rm' AND stat_lay = '$status'")->queryAll();
        } else if ( ($rm != '' && $tempat != '') && ($tgl == '' && $layanan == '' && $status == '' && $dokter == '') ) {
            $search = $db->createCommand("SELECT * FROM data_layanan_pasien WHERE no_rm = '$rm' AND temp_layanan = '$tempat'")->queryAll();
        }

         else if ( ($layanan != '' && $tgl != '') && ($rm == '' && $status == '' && $tempat == '' && $dokter == '') ) {
            $search = $db->createCommand("SELECT * FROM data_layanan_pasien WHERE jenis_layanan = '$layanan' AND tgl_kunjungan = '$tgl'")->queryAll();
        } else if ( ($layanan != '' && $status != '') && ($tgl == '' && $rm == '' && $tempat == '' && $dokter == '') ) {
            $search = $db->createCommand("SELECT * FROM data_layanan_pasien WHERE jenis_layanan = '$layanan' AND stat_lay = '$status'")->queryAll();
        } else if ( ($layanan != '' && $tempat != '') && ($tgl == '' && $rm == '' && $status == '' && $dokter == '') ) {
            $search = $db->createCommand("SELECT * FROM data_layanan_pasien WHERE jenis_layanan = '$layanan' AND temp_layanan = '$tempat'")->queryAll();
        }

        else if ( ($tgl != '' && $status != '') && ($layanan == '' && $rm == '' && $tempat == '' && $dokter == '') ) {
            $search = $db->createCommand("SELECT * FROM data_layanan_pasien WHERE tgl_kunjungan = '$tgl' AND stat_lay = '$status'")->queryAll();
        } else if ( ($tgl != '' && $tempat != '') && ($layanan == '' && $rm == '' && $status == '' && $dokter == '') ) {
            $search = $db->createCommand("SELECT * FROM data_layanan_pasien WHERE tgl_kunjungan = '$tgl' AND temp_layanan = '$tempat'")->queryAll();
        } 

         else if ( ($status != '' && $tempat != '') && ($layanan == '' && $rm == '' && $tgl == '' && $dokter == '') ) {
            $search = $db->createCommand("SELECT * FROM data_layanan_pasien WHERE stat_lay = '$status' AND temp_layanan = '$tempat'")->queryAll();
        } 

        // If Cabang 3
        else if ( ($dokter != '' && $layanan && $tempat != '') && ($tgl == '' && $status == '' && $rm == '') ) {
            $search = $db->createCommand("SELECT * FROM data_layanan_pasien WHERE temp_layanan = '$tempat' AND dokter = '$dokter' AND jenis_layanan = '$layanan'")->queryAll();
        } else if ( ($dokter != '' && $layanan != '' && $tgl != ''  ) && ($tempat == '' && $status == '' && $rm == '') ) {
            $search = $db->createCommand("SELECT * FROM data_layanan_pasien WHERE dokter = '$dokter' AND tgl_kunjungan = '$tgl' AND jenis_layanan = '$layanan'")->queryAll();
        } else if ( ($dokter != '' && $layanan != '' && $status != '') && ($tempat == '' && $tgl == '' && $rm == '') ) {
            $search = $db->createCommand("SELECT * FROM data_layanan_pasien WHERE dokter = '$dokter' AND stat_lay = '$status' AND jenis_layanan = '$layanan'")->queryAll();
        } else if ( ($dokter != '' && $layanan != '' && $rm != '' ) && ($tempat == '' && $status == '' && $status == '') ) {
            $search = $db->createCommand("SELECT * FROM data_layanan_pasien WHERE dokter = '$dokter' AND no_rm = '$rm' AND jenis_layanan = '$layanan'")->queryAll();
        } 
        else if ( ($dokter != '' && $rm != '' && $tgl != '') && ($tempat == '' && $status == '' && $layanan == '') ) {
            $search = $db->createCommand("SELECT * FROM data_layanan_pasien WHERE dokter = '$dokter' AND no_rm = '$rm' AND tgl_kunjungan = '$tgl'")->queryAll();
        } else if ( ($dokter != '' && $rm != '' && $status != '') && ($tempat == '' && $tgl == '' && $layanan == '') ) {
            $search = $db->createCommand("SELECT * FROM data_layanan_pasien WHERE dokter = '$dokter' AND no_rm ='$rm' AND stat_lay = '$status'")->queryAll();
        } else if ( ($dokter != '' && $rm != '' && $tempat != '') && ($status == '' && $tgl == '' && $layanan == '') ) {
            $search = $db->createCommand("SELECT * FROM data_layanan_pasien WHERE dokter = '$dokter' AND no_rm ='$rm' AND temp_layanan = '$tempat'")->queryAll();
        } 
        else if ( ($dokter != '' && $tgl != '' && $status != '') && ($tempat == '' && $rm == '' && $layanan == '') ) {
            $search = $db->createCommand("SELECT * FROM data_layanan_pasien WHERE dokter = '$dokter' AND tgl_kunjungan = '$tgl' AND stat_lay = '$status'")->queryAll();
        } else if ( ($dokter != '' && $tgl != '' && $tempat != '') && ($status == '' && $rm == '' && $layanan == '') ) {
            $search = $db->createCommand("SELECT * FROM data_layanan_pasien WHERE dokter = '$dokter' AND tgl_kunjungan = '$tgl' AND temp_layanan = '$tempat'")->queryAll();
        }
        else if ( ($dokter != '' && $status != '' && $tempat != '') && ($tgl == '' && $rm == '' && $layanan == '') ) {
            $search = $db->createCommand("SELECT * FROM data_layanan_pasien WHERE dokter = '$dokter' AND temp_layanan = '$tempat' AND stat_lay = '$status'")->queryAll();
        }

        else if ( ($layanan != '' && $tgl != '' && $rm != '') && ($dokter == '' && $status == '' && $tempat == '') ) {
            $search = $db->createCommand("SELECT * FROM data_layanan_pasien WHERE jenis_layanan = '$layanan' AND tgl_kunjungan = '$tgl' AND no_rm = '$rm'")->queryAll();
        } else if ( ($layanan != '' && $tgl != '' && $status != '') && ($dokter == '' && $rm == '' && $tempat == '') ) {
            $search = $db->createCommand("SELECT * FROM data_layanan_pasien WHERE jenis_layanan = '$layanan' AND tgl_kunjungan = '$tgl' AND stat_lay = '$status'")->queryAll();
        } else if ( ($layanan != '' && $tgl != '' && $tempat != '') && ($dokter == '' && $rm == '' && $status == '') ) {
            $search = $db->createCommand("SELECT * FROM data_layanan_pasien WHERE jenis_layanan = '$layanan' AND stat_lay = '$status' AND temp_layanan = '$tempat'")->queryAll();
        }
        else if ( ($layanan != '' && $rm != '' && $tempat != '') && ($dokter == '' && $tgl == '' && $status == '') ) {
            $search = $db->createCommand("SELECT * FROM data_layanan_pasien WHERE jenis_layanan = '$layanan' AND no_rm = '$rm' AND temp_layanan = '$tempat'")->queryAll();
        } else if ( ($layanan != '' && $rm != '' && $status != '') && ($dokter == '' && $tgl == '' && $status == '') ) {
            $search = $db->createCommand("SELECT * FROM data_layanan_pasien WHERE jenis_layanan = '$layanan' AND no_rm = '$rm' AND stat_lay = '$status'")->queryAll();
        }
        else if ( ($layanan != '' && $status != '' && $tempat != '') && ($dokter == '' && $tgl == '' && $rm == '') ) {
            $search = $db->createCommand("SELECT * FROM data_layanan_pasien WHERE jenis_layanan = '$layanan' AND temp_layanan = '$tempat' AND stat_lay = '$status'")->queryAll();
        }

        else if ( ($tempat != '' && $status != '' && $rm != '') && ($dokter == '' && $tgl == '' && $layanan == '') ) {
            $search = $db->createCommand("SELECT * FROM data_layanan_pasien WHERE tempat = '$tempat' AND stat_lay = '$status' AND no_rm = '$rm'")->queryAll();
        } else if ( ($tempat != '' && $status != '' && $tgl != '') && ($dokter == '' && $tgl == '' && $layanan == '') ) {
            $search = $db->createCommand("SELECT * FROM data_layanan_pasien WHERE tempat = '$tempat' AND stat_lay = '$status' AND tgl_kunjungan = '$tgl'")->queryAll();
        }
        else if ( ($rm != '' && $tempat != '' && $tgl != '') && ($dokter == '' && $tgl == '' && $layanan == '') ) {
            $search = $db->createCommand("SELECT * FROM data_layanan_pasien WHERE no_rm = '$rm' AND temp_layanan = '$tempat' AND tgl_kunjungan = '$tgl'")->queryAll();
        }
        
        $response = [
            'search' => $search,
            'urlbutton' => $url
        ];
        echo json_encode($response);
    }

    public function actionDataKonsul($id){
        $db = Yii::$app->db;
        $konsul = $db->createCommand("SELECT * FROM data_rujuk_unit WHERE pasien_id = '$id' ")->queryAll();
        $layanan = $db->createCommand("SELECT * FROM data_layanan_pasien WHERE pasien_id = '$id' ")->queryAll();

        $urlHapus = Url::toRoute(['billing/hapus-konsul', 'id' => $id]);
        $response = ['layanan' => $layanan, 'konsul' => $konsul, 'hapus' => $urlHapus];
        echo json_encode($response);
    }

    public function actionTambahKonsul(){
        $tgl = $_POST['tgl'];
        $id = $_POST['id'];
        $dokter = $_POST['dokter'];
        $dokterT = $_POST['dokterT'];
        $tempat = $_POST['tempat'];
        $ket = $_POST['ket'];
        $tempatAsal = $_POST['tempatAsal'];
        $message = '';
        $db = Yii::$app->db;
        
        $flag = false;
        $check = $db->createCommand("SELECT * FROM data_layanan_pasien WHERE pasien_id = '$id' ")->queryOne();
        $Konsulcheck = $db->createCommand("SELECT * FROM data_rujuk_unit WHERE pasien_id = '$id' ")->queryAll();

        if ($check['temp_layanan'] == $tempat) {
            $message = 'Pasien Sudah Berada Di Unit ' . $tempat;
            $data = $db->createCommand("SELECT * FROM data_rujuk_unit WHERE pasien_id = '$id' ")->queryAll();
        } else {
            foreach ($Konsulcheck as $value) {
                if ($value['unit'] == $tempat) {
                    $message = 'Pasien Sudah Berkunjung Ke Unit ' . $tempat . ' Hari Ini';
                    $data = $db->createCommand("SELECT * FROM data_rujuk_unit WHERE pasien_id = '$id' ")->queryAll();
                    $flag = true;
                }
            }
            if ($flag != true){
                $data_layanan = $db->createCommand()->insert('data_layanan_pasien', ['nama' => $check['nama'], 'ortu' => $check['ortu'], 'jenis_kelamin' => $check['jenis_kelamin'], 'tgl_lahir' => $check['tgl_lahir'], 'no_rm' => $check['no_rm'], 'tgl_kunjungan' => $tgl, 'alasan_msk' => $check['alasan_msk'], 'jenis_layanan' => $check['jenis_layanan'], 'temp_layanan' => $tempat, 'kelas' => $check['kelas'], 'dokter' => $dokter, 'ket_pasien' => 'Dirujuk Dari ' . $tempatAsal,'penjamin_pasien' => $check['penjamin_pasien'], 'stat_lay' => $check['stat_lay'], 'pasien_id' => $id, 'dokter_tujuan' => $dokterT, 'alamat' => $check['alamat'] ])->execute();
                    if ($data_layanan) {
                        $data_lay = $db->createCommand("SELECT * FROM data_layanan_pasien WHERE id = (SELECT MAX(id) FROM data_layanan_pasien)")->queryOne();
                        $db->createCommand()->insert('data_rujuk_unit', ['tgl' => $tgl, 'unit' => $tempat, 'dokter' => $dokter, 'dokter_tujuan' => $dokterT, 'keterangan' => $ket, 'konsul_id' => $data_lay['id'], 'pasien_id' => $id])->execute();
                        $db->createCommand()->delete('data_layanan_pasien', ['pasien_id' => $id, 'temp_layanan' => $tempatAsal])->execute();
                        $db->createCommand()->delete('data_rujuk_unit', ['pasien_id' => $id, 'unit' => $tempatAsal])->execute();
                        $data = $db->createCommand("SELECT * FROM data_rujuk_unit WHERE pasien_id = '$id' ")->queryAll();
                        $message = 'Konsul Berhasil Ditambahkan';
                    } 
    }
}
        $response = ['data' => $data, 'message' => $message];
        echo json_encode($response);
    }

    public function actionHapusKonsul($idKonsul){
        $db = Yii::$app->db;
        $db->createCommand()->delete('data_rujuk_unit', 'konsul_id= :idKonsul', array(':idKonsul' => $idKonsul))->execute();
        $db->createCommand()->delete('data_layanan_pasien', 'id= :idKonsul', array(':idKonsul' => $idKonsul))->execute();

    } 

    public function actionPelayananKunjungan(){
        $db = Yii::$app->db;
        $temp_lay_rj = $db->createCommand("SELECT * FROM tempat_layanan_rj")->queryAll();
        $jenis_layanan = $db->createCommand("SELECT * FROM jenis_layanan")->queryAll();
        $status_layanan = $db->createCommand("SELECT * FROM status_layanan")->queryAll();
        $dokter = $db->createCommand("SELECT * FROM dokter")->queryAll();

        return $this->render('pelayanan-kunjungan', ['tempat' => $temp_lay_rj, 'layanan' => $jenis_layanan, 'status' => $status_layanan, 'dokter' => $dokter]);
    }

    public function actionCheckoutPasien($id){
        $db = Yii::$app->db;
        $db->createCommand("UPDATE data_layanan_pasien SET check_pasien = 'Check Out' WHERE pasien_id = '$id' ")->execute();
    }

    public function actionResum(){
        return $this->render('resum');
    }

    public function actionRekamPasien($id){
        $db = Yii::$app->db;
        $data = $db->createCommand("SELECT * FROM kunjungan_pasien WHERE id = '$id'")->queryOne();
        $response = ['data' => $data];
        return $this->render('rekam-pasien', $response);
    }

    public function actionDataDiagnosisR($id){
        $db = Yii::$app->db;
        $diag = $db->createCommand("SELECT * FROM data_diagnosa WHERE pasien_id = '$id'")->queryAll();
        $response = ['diagnosis' => $diag];
        echo json_encode($response);
    }

    public function actionDataBandingR($id){
        $db = Yii::$app->db;
        $diag = $db->createCommand("SELECT * FROM diagnosa_banding WHERE diagnosa_id = '$id'")->queryAll();
        $response = ['diagnosis' => $diag];
        echo json_encode($response);
    }

    public function actionDataTindakanR($id){
        $db = Yii::$app->db;
        $diag = $db->createCommand("SELECT * FROM data_tindakan WHERE pasien_id = '$id'")->queryAll();
        $response = ['data' => $diag];
        echo json_encode($response);
    }

    public function actionPembayaran(){
        $db = Yii::$app->db;
        $data = $db->createCommand("SELECT nama FROM data_layanan_pasien WHERE check_pasien = 'Check Out'")->queryAll();;
        $data = ArrayHelper::map($data, 'nama', 'nama');
        return $this->render('pembayaran', ['search' => $data]);
    } 

    public function actionCariDataPembayaran($nama, $rm){
        $db = Yii::$app->db;
        if ($nama == '') {
            $check = $db->createCommand("SELECT pasien_id FROM data_layanan_pasien WHERE no_rm = '$rm' AND check_pasien = 'Check Out'")->queryOne();
            $id = $check['pasien_id'];
        } else if ($rm == '') {
            $check = $db->createCommand("SELECT pasien_id FROM data_layanan_pasien WHERE nama = '$nama' AND check_pasien = 'Check Out'")->queryOne();
            $id = $check['pasien_id'];
        }
        
        $alamat = $db->createCommand("SELECT alamat FROM kunjungan_pasien WHERE id = '$id'")->queryOne();

        if ($check) {
            $biaya =  $db->createCommand("SELECT * FROM data_tindakan WHERE pasien_id = '$id'")->queryAll();
        }
        $data = ['biaya' => $biaya, 'alamat' => $alamat];
        echo json_encode($data);
    }

    public function actionTambahPembayaran($tgl, $terima, $id, $total){
        $db = Yii::$app->db;
        $status = $db->createCommand("SELECT status_pasien FROM kunjungan_pasien WHERE id = '$id'")->queryOne();
        if ($status) {
            $db->createCommand()->insert('data_pembayaran', ['tgl' => $tgl, 'no_bukti' => '000.' . $id, 'jumlah' => $total, 'status' => $status['status_pasien'], 'terima_dari' => $terima, 'pasien_id' => $id])->execute();
        }
    }

    public function actionDataPembayaran(){
        $db = Yii::$app->db;
        $data = $db->createCommand("SELECT * FROM data_pembayaran")->queryAll();

        $response = ['data' => $data];
        echo json_encode($response);
    }

    public function actionPulangPasien ($id, $date){
        $db = Yii::$app->db;
        $db->createCommand("UPDATE kunjungan_pasien SET tgl_keluar = '$date' WHERE id = '$id' ")->execute();
        $db->createCommand("UPDATE kunjungan_pasien SET check_pasien = 'Keluar' WHERE id = '$id' ")->execute();
        $db->createCommand("UPDATE data_layanan_pasien SET check_pasien = 'Keluar' WHERE pasien_id = '$id' ")->execute();

    }

    public function actionRiwayatKunjungan(){
        $db = Yii::$app->db;
        $data = $db->createCommand("SELECT nama FROM kunjungan_pasien WHERE check_pasien = 'Keluar'")->queryAll();;
        $data = ArrayHelper::map($data, 'nama', 'nama');
        return $this->render('riwayat-kunjungan', ['search' => $data]);
    }

    public function actionDataRiwayatKunjungan($rm, $nama) {
        $db = Yii::$app->db;
        if ($rm == '') {
            $dataR = $db->createCommand("SELECT * FROM kunjungan_pasien WHERE nama = '$nama'")->queryAll();
        } else {
            $dataR = $db->createCommand("SELECT * FROM kunjungan_pasien WHERE no_rm = '$rm'")->queryAll();
        }
        
        $response = ['dataR' => $dataR];
        echo json_encode($response);
    }

    public function actionDataRiwayatDiagnosa($id) {
        $db = Yii::$app->db;
        $dataR = $db->createCommand("SELECT * FROM data_layanan_pasien WHERE pasien_id = '$id'")->queryAll();
        $response = ['dataR' => $dataR];
        echo json_encode($response);
    }

    public function actionDataRiwayatTindakan($id) {
        $db = Yii::$app->db;
        $dataR = $db->createCommand("SELECT * FROM data_tindakan WHERE pasien_id = '$id'")->queryAll();
        $response = ['dataR' => $dataR];
        echo json_encode($response);
    }

}
