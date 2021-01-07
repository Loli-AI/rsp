var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0');
var yyyy = today.getFullYear();
today = yyyy + '/' + mm + '/' + dd;
var zero = 1;

function penjamin() {
    let result = $('#sttus').val();
    $('#penjamin').val(result);
}

function umur() {
    let input = $('#fgh').val();
    let today = new Date();
    let birth = new Date(input);
    let umur = today.getFullYear() - birth.getFullYear();
    let m = today.getMonth() - birth.getMonth();
    if (m < 0 || (m == 0 && today.getDate() < birth.getDate())) {
        umur--;
    }
    return $('#umur').val(umur + ' Tahun');
}


function dis() {
    if ($('#check').prop('checked', true)) {
        $('#nmanggota').prop('disabled', false);
        $('#hak_kelas').prop('disabled', false);
        $('#status_penjamin').prop('disabled', false);
    } 
}

function pelayanan() {
    const rm = $('#rmPel').val();
    const tgl = $('#datePel').val();
    const dokter = $('#dokterPel').val();
    const layanan = $('#layananPel').val();
    const tempat = $('#tempatPel').val();
    const status = $('#statusPel').val();

    const tbody = $('#tbody');
    tbody.html('');
    let no = 1;
    $.ajax({
        type: 'POST',
        data: "status=" + status + "&rm=" + rm + "&tgl=" + tgl + "&dokter=" + dokter + "&tempat=" + tempat + "&layanan=" + layanan,
        url: 'index.php?r=billing/search-pel',
        success: (result) => {
            var res = JSON.parse(result);
            $.each(res.search, (key, val) => {
                var newLine = $("<tr onclick='getIdLayanan(" + val.pasien_id + "," + val.id + ","+ val.no_rm +")' class='btn-success'>");
                newLine.html("<td><center>" + no + "</td><td><center>" + val.tgl_kunjungan + "</td><td><center>" + val.ket_pasien + "</td><td><center>" + val.no_rm + "</td><td><center>" + val.nama + "</td><td><center>" + val.jenis_kelamin + "</td><td><center>" + val.penjamin_pasien + "</td><td><center>" + val.alasan_msk + "</td><td><center>" + val.alamat + "</td><td><center>" + val.tgl_lahir + "</td><td><center>" + val.ortu + "</td>");
                tbody.append(newLine);
                no++;
            })
        }
    });
}

function getIdLayanan(id, id2, rm) {
    $('#detailPasien').attr('class', 'btn btn-success');
    $('#detailPasien').html('&raquo; Data Pasien RM No.'+rm);
    $('#detailPasien').attr('href', 'index.php?r=billing%2Fpelayanan&id=' + id + '&idLayanan=' + id2);

}

function AlergiInput() {
    const input = $('#alergiInput').val();
    const id = $('#idPasien').val();
    const date = $('#todayDate').val();
    const tbody = $('#dataAlergi');
    $.ajax({
        type: 'GET',
        data: 'id=' + id + '&alergi=' + input + '&tgl=' + date,
        url: 'index.php?r=billing/alergi-tambah',
        success: () => {alert('Alergi Berhasil Ditambah!');}
    });
}

function Dpjp() {
    const dpjpInput = $('#dpjpInput').val();
    const id = $('#idPasien').val();
    const idL = $('#idLayanan').val();
    $.ajax({
        type: 'GET',
        data: 'id=' + id + '&dpjp=' + dpjpInput + '&idL=' + idL,
        url: 'index.php?r=billing/dpjp',
        success: (result) => {alert('DPJP Berhasil Diubah!');}
    });

}

function HapusAlergi(id){
    $.ajax({
        type : 'GET',
        data : 'id='+id,
        url : 'index.php?r=billing/hapus-alergi',
        success : () => {Alergi(); alert('Alergi Berhasil Dihapus!');}
    });
}

function Alergi() {
    const id = $('#idPasien').val();
    const tbody = $('#dataAlergi');
    tbody.html('');
    let no = 1;
    $.ajax({
        type: 'GET',
        data: "id=" + id,
        url: 'index.php?r=billing/alergi',
        success: (result) => {
            var res = JSON.parse(result);
            $.each(res.data, (key, val) => {
                var newLine = $("<tr>");
                newLine.html("<td><center>" + no + "</td><td><center>" + val.tgl + "</td><td><center>" + val.alergi + "</td><td><center><button type='button' onclick='HapusAlergi(" + val.id +")' class='btn btn-danger'><i  class='fas fa-trash-alt'></i> &nbsp;Hapus</button></td>");
                tbody.append(newLine);
                no++;
            })
        }
    });
}

function UpdateTelepon() {
    const id = $('#idPasien').val();
    const input = $('#telepon').val();
    const idL = $('#idLayanan').val();
    $.ajax({
        type: 'GET',
        data: 'id=' + id + '&no=' + input+'&idL='+idL,
        url: 'index.php?r=billing/telepon',
        success: (result) => {alert('Nomor Berhasil Diubah!');}
    });
}

function newRM() {
    const rm = document.getElementById('nmrrm');
    $.ajax({
        type: 'POST',
        data: '',
        url: 'index.php?r=billing/rm-baru',
        success: (result) => {
            let res = JSON.parse(result);
            rm.value = res.no_rm + 1;
        }

    });
}

function DataKonsul() {
    let num = 1;
    const id = $('#idPasien').val();
    const tbody = $('#dataKonsul');
    tbody.html('');
    $.ajax({
        type: 'GET',
        data: 'id=' + id,
        url: 'index.php?r=billing/data-konsul',
        success: (result) => {
            var res = JSON.parse(result);
            $.each(res.konsul, (key, val) => {
                var newLine = $("<tr onclick='getIdKonsul(" + val.id + ")'>");
                newLine.html("<td><center>" + num + "</td><td><center>" + val.tgl + "</td><td><center>" + val.unit + "</td><td><center>" + val.dokter + "</td><td><center>" + val.dokter_tujuan + "</td><td><center>" + val.keterangan + "</td>");
                tbody.append(newLine);
                num++;
            })
        }
    });
}

function getIdKonsul(id) {
    $('#idKonsul').val(id);
}
function TambahKonsul() {
    const dokter = $('#dokterTujuanKonsul').val();
    const dokterTujuan = $('#dokterPenunjukKonsul').val();
    const tgl = $('#tglKonsul').val();
    const ket = $('#ketKonsul').val();
    const tempat = $('#tempatKonsul').val();
    const id = $('#idPasien').val();
    const tbody = $('#dataKonsul');
    const tempatAsal = $('#unitLayanan').val();
    tbody.html('');
    $.ajax({
        type: 'POST',
        data: 'tgl=' + tgl + '&dokter=' + dokter + '&dokterT=' + dokterTujuan + '&ket=' + ket + '&tempat=' + tempat + '&id=' + id + '&tempatAsal=' + tempatAsal,
        url: 'index.php?r=billing/tambah-konsul',
        success: (result) => {
            var res = JSON.parse(result);
            alert(res.message);

        }
    });
}

function HapusKonsul() {
    const id = $('#idKonsul').val();
    $.ajax({
        type: 'GET',
        data: 'idKonsul=' + id,
        url : 'index.php?r=billing/hapus-konsul',
        success: (result) => { DataKonsul();}
    });
}

function gantiKlinis(){
    const checkKlinis = $('#checkKlinis');
    if (checkKlinis.is(":checked")) {
        $('#klinis').val('Ya');
    } else {
        $('#klinis').val('Tidak');
    }
}

function gantiDiagMati(){
    const checkDiagMati = $('#checkDiagMati');
    if (checkDiagMati.is(":checked")) {
        $('#diagMati').val('Ya');
    } else {
        $('#diagMati').val('Tidak');
    }
}

function gantiAkhir(){
    const checkAkhir = $('#checkAkhir');
    if (checkAkhir.is(":checked")) {
        $('#akhir').val('Ya');
    } else {
        $('#akhir').val('Tidak');
    }
}

function gantiDokterDiag(){
    const checkDokterDiag = $('#checkDokterDiag');
    if (checkDokterDiag.is(":checked")) {
        $('#dokterDiag').hide();
        $('#dokterGanti').show();
    } else {
        $('#dokterGanti').hide();
        $('#dokterDiag').show();
    }
}

function gantiManualDiag(){
    const checkDokter = $('#checkManualDiag');
    if (checkDokter.is(":checked")) {
        $('#diagnosaTable').hide();
        $('#diagnosaManual').show();
        
    } else {
        $('#diagnosaTable').show();
        $('#diagnosaManual').hide();
    }
}

function tambahRow(){
    const container = $('#diagBanding');
    const newLine = $("<tr id='tr"+zero+"'>");
    newLine.html("<td>Diagnosa Banding</td><td>:&emsp;<input class='bout' id='bandingOut" + zero +"' type='text'>&nbsp;&nbsp;<button onclick='deleteRow("+ zero +")' type='button' class='btn btn-danger'><i class='fas fa-times'></i></button></td>");
    container.append(newLine);
    zero++;
}

function deleteRow(id){
    $('#tr'+id).remove()
}

function TambahBanding(){
    const bout = document.querySelectorAll('.bout');
    const id = $('#idPasien').val();
    for (let index = 1; index < bout.length+1; index++) {
        const out = $('#bandingOut'+index).val();
        $.ajax({
            type : 'GET',
            data : 'id='+id+'&diag='+out,
            url: 'index.php?r=billing/tambah-banding',
            success : () => {}
        });
    }
}

function DataDiagnosa(){
    const tbody = $('#dataDiagnosa');
    const id = $('#idPasien').val();
    const unit = $('#unitLayanan').val();
    tbody.html('');
    let no = 1;
    $.ajax({
        type: 'GET',
        data: 'id='+id,
        url: 'index.php?r=billing/data-diagnosa',
        success: (result) => {  
            let res  = JSON.parse(result);
            $.each(res.data, (key, val) => {
                let newLine = $("<tr onclick='getIdDiagnosa("+ val.id +")'>");
                newLine.html("<td>" + no + "</td><td>" + val.tgl + "</td><td>" + val.diagnosa + "</td><td>" + val.banding + "</td><td>" + val.dokter + "</td><td>" + val.prioritas + "</td><td>" + val.akhir +"</td>");
                no++;
                tbody.append(newLine);
            })
        }
    });
}
    $('#diagnosaOn').hide();
    $('#dokterClick').hide();

    function getIdDiagnosa(id){
    $('#idDiag').val(id);
    // $.ajax({
    //     type: 'GET',
    //     data: 'id='+id,
    //     url: 'index.php?r=billing/data-diagnosa-click',
    //     success: (result) => {
    //         let res = JSON.parse(result);
    //         $.each(res.data, (key, val) => {
    //             $('#diagnosaManual').hide();      
    //             $('#diagnosaTable').hide();
    //             $('#dokterDiag').hide();
    //             $('#dokterGanti').hide();
    //             $('#manualDiag').hide();
    //             $('#buttonTambah').hide();
    //             $('#dokterdiag').hide();
    //             $('#checkKlinis').prop('disabled', true);
    //             $('#checkAkhir').prop('disabled', true);
    //             $('#checkDiagMati').prop('disabled', true);
    //             if (val.klinis == 'Ya') {
    //                 $('#checkKlinis').prop('checked', true);
    //             } else if (val.klinis == 'Tidak'){
    //                 $('#checkKlinis').prop('checked', false);
    //             }
    //             if (val.akhir == 'Ya') {
    //                 $('#checkAkhir').prop('checked', true);
    //             } else if (val.akhir == 'Tidak') {
    //                 $('#checkAkhir').prop('checked', false);
    //             }
    //             if (val.penyebab_kematian == 'Ya') {
    //                 $('#checkDiagMati').prop('checked', true);
    //             } else if (val.penyebab_kematian == 'Tidak') {
    //                 $('#checkDiagMati').prop('checked', false);
    //             }
    //             $('#tambahDiag').prop('disabled', true);
    //             $('#diagnosaOn').show();
    //             $('#dokterClick').show();
    //             $('#diagnosaClick').val(val.diagnosa);
    //             $('#diagPrioritas').val(val.prioritas);
    //             $('#dokterOn').val(val.dokter);
    //             $('#banding').val(val.banding);
    //             $('#diagnosaClick').prop('disabled', true);
    //             $('#diagPrioritas').prop('disabled', true);
    //             $('#dokterOn').prop('disabled', true);
    //             $('#banding').prop('disabled', true);
    //         })
    //     }
    // });
    
}

function TambahDiagnosa() {
    const checkDokterDiag = $('#checkDokterDiag');
    const checkDokter = $('#checkManualDiag');
    const id = $('#idPasien').val();
    const date = $('#todayDate').val();
    const unit = $('#unitLayanan').val();
    const idL = $('#idLayanan').val();
    const banding = $('#banding').val();
    const prio = $('#diagPrioritas').val();
    const klinis = $('#klinis').val();
    const akhir = $('#akhir').val();
    const diagMati = $('#diagMati').val();
    if (checkDokter.is(":checked")) {
        var diag = $('#diagnosaData2').val();
    } else {
        var diag = $('#diagnosaData1').val();
    }
    if (checkDokterDiag.is(":checked")) {
        var dokter = $('#dokterDiagnosa2').val();
    } else {
        var dokter = $('#dokterDiagnosa1').val();
    }
    
    if (diag == '') {
        alert('Diagnosa Tidak Boleh Kosong!');
    } else {
        $.ajax({
            type : 'GET',
            data : 'id='+id+'&diag='+diag+'&bandingout='+banding+'&prio='+prio+'&klinis='+klinis+'&akhir='+akhir+'&diagMati='+diagMati+'&dokter='+dokter+'&date='+date+'&unit='+unit+'&idLayanan='+idL,
            url : 'index.php?r=billing/tambah-diagnosa',
            success: (result) => { DataDiagnosa(); TambahBanding(); alert('Diagnosa Berhasil Disimpan!'); }
        });
    }
}

function HapusDiagnosa(){
    const id = $('#idDiag').val();
    $.ajax({
        type : 'GET',
        data : 'id='+id,
        url: 'index.php?r=billing/hapus-diagnosa',
        success : (result) => { DataDiagnosa(); alert('Diagnosa Berhasil Dihapus');}
    });
}

function checkDokterTind(){
    const checkDokterTind = $('#checkDokterTind');
    if (checkDokterTind.is(":checked")) {
        $('#dokterTind1').hide();
        $('#dokterTind2').show();
    } else {
        $('#dokterTind2').hide();
        $('#dokterTind1').show();
    }
}

function getTarip(){
    const tind = $('#inputTind').val();
    const biayaTind = $('#biayaTind');
    $.ajax({
        type : 'GET',
        data : 'tind='+tind,
        url: 'index.php?r=billing/ambil-data-tindakan',
        success: (result) => {
            let res = JSON.parse(result);
            $.each(res.data, (key, val) => {
                if (val.tarip == '' || val.tarip == null) {
                    biayaTind.val('0');                    
                } else {
                    biayaTind.val(val.tarip);
                }
            });
        }
    });
}

function getIdTind(id){
    $('#idTind').val(id);
    
}

function HapusTindakan(){
    const id = $('#idTind').val();
    $.ajax({
        type: 'GET',
        data: 'id='+id,
        url: 'index.php?r=billing/hapus-tindakan',
        success: (result) => { alert('Tindakan Berhasil Dihapus!'); DataTindakan();}
    });
}

function DataTindakan(){
    const id = $('#idPasien').val();
    const unit = $('#unitLayanan').val();
    const tbody = $('#dataTind');
    let no = 1;
    tbody.html('');

    $.ajax({
        type : 'GET',
        data : 'id='+id+'&unit='+unit,
        url : 'index.php?r=billing/data-tindakan',
        success : (result) => {
            let res = JSON.parse(result);
            $.each(res.data, (key, val)=>{
                let newLine = $("<tr onclick='getIdTind("+ val.id +")'>");
                newLine.html("<td>" + no + "</td><td>" + val.tanggal + "</td><td>" + val.tindakan + "</td><td>" + val.kelas + "</td><td>Rp." + val.biaya + "</td><td>" + val.jumlah + " Kali</td><td>Rp." + val.subtotal + "</td><td>" + val.dokter + "</td><td>" + val.keterangan + "</td><td>" + val.petugas_input +"</td>");
                no++;
                tbody.append(newLine);
            })
        }
    });
}

function TambahTindakan(){
    const id = $('#idPasien').val();
    const tgl = $('#tglTind').val();
    const tind = $('#inputTind').val();
    const biaya = $('#biayaTind').val();
    const jumlah = $('#jumlahTind').val();
    const kelas = $('#kelasTind').html();
    const ket = $('#ketTind').val();
    const total = biaya * jumlah;
    const unit = $('#unitLayanan').val();
    const idL = $('#idLayanan').val();
    const checkDokterTind = $('#checkDokterTind');
    if (checkDokterTind.is(":checked")) {
        var pelak = $('#pelTind2').val();
    } else {
        var pelak = $('#pelTind1').val();
    }

    if (tgl == '' || tind == '' || jumlah == '' || jumlah == '0') {
        alert('Mohon Lengkapi Isi Form!'); 
    } else {

        $.ajax({
            type : 'GET',
            data : 'id='+id+'&tgl='+tgl+'&tind='+tind+'&biaya='+biaya+'&jumlah='+jumlah+'&kelas='+kelas+'&pelak='+pelak+'&ket='+ket+'&total='+total+'&unit='+unit+'&idLayanan='+idL,
            url: 'index.php?r=billing/tambah-tindakan',
            success: (res) => { DataTindakan(); alert('Tindakan Berhasil Ditambah!');}
        });
    }
}

function checkDokterResep(){
    const checkDokterPResep = $('#checkDokterPResep');
    if (checkDokterPResep.is(':checked')) {
        $('#dokterResep1').hide();
        $('#dokterResep2').show();
    } else {
        $('#dokterResep2').hide();
        $('#dokterResep1').show();
    }
}

function manual() {
    const manualOff = $('#manualOff');
    if (manualOff.is(':checked')) {
        $('#obatManual').show(); 
        $('#namaobat').hide();
    } else {
        $('#obatManual').hide();
        $('#namaobat').show();
    }
}

function racikan() {
    let check = document.getElementById("check-racikan");
    let fixracik = document.getElementById("racikan");
    if (check.checked == true) {
        fixracik.style.display = "inline-block";
    } else {
        fixracik.style.display = "none";
    }
}

function lainnya() {
    document.getElementById("lainnya").innerHTML = "<input type='text' name='dosis' class='form-control'>";
}

function checkout(){
    $('#contC').html("Anda Yakin Ingin Mencheckout Pasien <b>" + $('#nama').val()+ "</b>?");
}

function checkoutPasien(){
    const id = $('#idPasien').val();
    $.ajax({
        type : 'GET',
        data : 'id='+id,
        url : 'index.php?r=billing/checkout-pasien',
        success: (result) => {
            alert('Pasien Berhasil Di Checkout!');
            window.location.href = 'index.php?r=billing/pelayanan-kunjungan';
        }
    });
}

function CariDataPembayaran(){
    const nama = $('#nama').val();
    const rm = $('#rm').val();
    const keriganan = $('#keriganan').val();
    
    $.ajax({
        type : 'GET',
        data : 'nama='+nama+'&rm='+rm,
        url : 'index.php?r=billing/cari-data-pembayaran',
        success : (result) => {
            var res = JSON.parse(result);
            var sum = 0;
            $.each(res.biaya, (key, val) => {
                $('#totalbyr').val(sum += parseInt(val.subtotal));
                $('#pembayaran').val($('#totalbyr').val() - keriganan);
                $('#bill').val();
                $('#pasienId').val(val.pasien_id);
            });
        }
    });
}

function SelisihPembayaran(){
    const keriganan = $('#keriganan').val();
    const total = $('#totalbyr').val();
    const pembayaran = $('#pembayaran').val();

    $('#pembayaran').val(total - keriganan);
    const terima = $('#terimaUang').val();
    if (terima == '0') {
        $('#kembali').val('0');
    } else {
        $('#kembali').val(terima - pembayaran);
    }
}

function DataPembayaran(){
    var no = 1;
    const tbody = $('#dataP');
    tbody.html('');

    $.ajax({
        type: 'GET',
        data: '',
        url: 'index.php?r=billing/data-pembayaran',
        success: (result) => { 
            let res = JSON.parse(result);
            $.each(res.data, (key, val) => {
                var newLine = $("<tr>");
                newLine.html("<td>" + no + "</td><td>" + val.tgl + "</td><td>" + val.no_bukti + "</td><td>" + val.jumlah + "</td><td>" + val.status + "</td><td>" + val.terima_dari +"</td>");  
                tbody.append(newLine);  
                no++;
            });
        }
    });
}

function TambahPembayaran() {
    const date = $('#todayDate').val();
    const pembayaran = $('#pembayaran').val();
    const terima = $('#terima').val();
    const id = $('#pasienId').val();
    const terimaUang = $('#terimaUang').val();
    if (terimaUang == '0' || terimaUang == '') {
        alert('Jumlah Uang Yg Diterima Tidak Boleh Kosong!');
    } else if (terimaUang < pembayaran) {
        alert('Nomor Nominal Salah!');
    } else {
        $.ajax({
            type: 'GET',
            data: 'tgl=' + date + '&terima=' + terima + '&id=' + id + '&total=' + pembayaran,
            url: 'index.php?r=billing/tambah-pembayaran',
            success: (result) => { alert("Pembayaran Berhasil!"); DataPembayaran(); }
        });
    }
    
}

function TempatLayanan(){
    const loket = $('#loket').val();
    if (loket == 'LOKET IGD') {
        $('#igd2').show();
        $('#igd').prop('disabled', false);
        $('#igdinc').show();
        $('#igdin').prop('disabled', false);
        $('#rjcont').hide();
        $('#rj').prop('disabled', true);
        $('#rjinc').hide();
        $('#rjin').prop('disabled', true);
        $('#ricont').hide();
        $('#ri').prop('disabled', false);
        $('#riinc').hide();
        $('#riin').prop('disabled', false);
    } else if (loket == 'LOKET RAWAT JALAN') {
        $('#rjcont').show();
        $('#rj').prop('disabled', false);
        $('#rjinc').show();
        $('#rjin').prop('disabled', false);
        $('#igd2').hide();
        $('#igd').prop('disabled', true);
        $('#igdinc').hide();
        $('#igdin').prop('disabled', true);
        $('#ricont').hide();
        $('#ri').prop('disabled', false);
        $('#riinc').hide();
        $('#riin').prop('disabled', false);
    } else if (loket == 'LOKET RAWAT INAP') {
        $('#ricont').show();
        $('#ri').prop('disabled', false);
        $('#riinc').show();
        $('#riin').prop('disabled', false);
        $('#rjcont').hide();
        $('#rj').prop('disabled', true);
        $('#rjinc').hide();
        $('#rjin').prop('disabled', true);
        $('#igd2').hide();
        $('#igd').prop('disabled', true);
        $('#igdinc').hide();
        $('#igdin').prop('disabled', true);
    }
}

function DataDiagnosisR() {
    const id = $('#pasienId').val();
    const tbody = $('#dataR');
    tbody.html('');

    var no = 1;
    $.ajax({
        type :'GET',
        data : 'id='+id,
        url : 'index.php?r=billing/data-diagnosis-r',
        success : (result) => {
            let res = JSON.parse(result);
            $.each(res.diagnosis, (key, val) => {
                var newLine = $("<tr>");
                newLine.html("<td>" + no + "</td><td>" + val.tgl + "</td><td>" + val.diagnosa + "</td><td id='bandingD" + val.id + "'></td><td>" + val.unit + "</td><td>" + val.penyebab_kematian + "</td><td>" + val.dokter + "</td><td>" + val.prioritas + "</td><td>" + val.akhir + "</td><td>" + val.klinis + "</td>");
                tbody.append(newLine);
                DataBandingR(val.id);
                no++;
            });
        }
    });
}

function DataBandingR(id) {
    $.ajax({
        type : 'GET',
        data : 'id='+id,
        url : 'index.php?r=billing/data-banding-r',
        success : (result) => {
            let res = JSON.parse(result);
            $.each(res.diagnosis, (key, val) => {
                var newLine = $("<ul>"); 
                newLine.html("<li>" + val.diagnosa + "</li>");
                $('#bandingD' + id).append(newLine);
            });

        }
    });
}

function DataTindakanR() {
    const id = $('#pasienId').val();
    const tbody = $('#dataT');
    tbody.html('');
    var no = 1;
    $.ajax({
        type: 'GET',
        data: 'id=' + id,
        url: 'index.php?r=billing/data-tindakan-r',
        success: (result) => {
            let res = JSON.parse(result);
            $.each(res.data, (key, val) => {
                var newLine = $("<tr>");
                newLine.html("<td>" + no + "</td><td>" + val.tanggal + "</td><td>" + val.tindakan + "</td><td>" + val.biaya + "</td><td>" + val.jumlah + "</td><td>" + val.subtotal + "</td><td>" + val.dokter + "</td><td>" + val.unit + "</td><td>" + val.kelas + "</td><td>" + val.petugas_input + "</td>");
                tbody.append(newLine);
            });

        }
    });
}

function PulangPasien() {
    const id = $('#pasienId').val();
    const date = $('#todayDate').val();
    const nama = $('#nama').val();

    if (id == '') {
        alert("Cari Pasien Terlebih Dahulu!");
    } else {
        let cho = confirm("Pulangkan Pasien "+nama+"?");
        if (cho == true) {
            $.ajax({
                type: 'GET',
                data: 'id=' + id + '&date=' + date,
                url: 'index.php?r=billing/pulang-pasien',
                success: (result) => {
                    alert("Pasien Berhasil Dipulangkan!");
                    window.location.href = 'index.php?r=billing/pembayaran';
                }
            });
        }
    }
    
}

function CariDataRiwayat() {
    var no = 1;
    const rm = $('#rmR').val();
    const nama = $('#namaR').val();
    const tbody = $('#dataKunjungan');
    tbody.html('');
    $.ajax({
        type: 'GET',
        data: 'rm='+rm+'&nama='+nama,
        url: 'index.php?r=billing/data-riwayat-kunjungan',
        success: (result) => {
            let res = JSON.parse(result);
            $.each(res.dataR, (key, val) => {
                let newLine = $("<tr>");
                newLine.html("<td>" + no + "</td><td>" + val.tgl_kunjungan + "</td><td>" + val.tgl_keluar + "</td><td>" + val.temp_layanan + "</td><td>" + val.penjamin_pasien +"</td>");
                tbody.append(newLine);
                $('#alamat').val(val.alamat);
                $('#nmortu').val(val.ortu);                
                $('#pasienId').val(val.id);
                $('#jenkel').val(val.jenis_kelamin);
                no++;
                CariDataDiagnosa();
                CariDataTindakan();
            });
        }
    });
}

function RincianPasien() {
    const id = $('#pasienId').val();
    if (id == '') {
        alert("Pasien Tidak Memiliki Riwayat Tindakan Apapun!");
    } else {
        window.location.href = 'index.php?r=billing/rekam-pasien&id=' + id;

    }
}

function CariDataDiagnosa() {
    var no = 1;
    const id = $('#pasienId').val();
    const tbody = $('#dataDiagnosa');
    tbody.html('');
    $.ajax({
        type: 'GET',
        data: 'id='+id,
        url: 'index.php?r=billing/data-riwayat-diagnosa',
        success: (result) => {
            let res = JSON.parse(result);
            $.each(res.dataR, (key, val) => {
                let newLine = $("<tr>");
                newLine.html("<td>" + no + "</td><td>" + val.tgl_kunjungan + "</td><td>" + val.temp_layanan + "</td><td>" + val.dokter + "</td><td>" + val.kelas + "</td>");
                tbody.append(newLine);
                no++;
            });
        }
    });
}

function CariDataTindakan(){
    var no = 1;
    const id = $('#pasienId').val();
    const tbody = $('#dataTindakan');
    tbody.html('');
    $.ajax({
        type: 'GET',
        data: 'id=' + id,
        url: 'index.php?r=billing/data-riwayat-tindakan',
        success: (result) => {
            let res = JSON.parse(result);
            $.each(res.dataR, (key, val) => {
                let newLine = $("<tr>");
                newLine.html("<td>" + no + "</td><td>" + val.tanggal + "</td><td>" + val.tindakan + "</td><td>" + val.kelas + "</td><td>" + val.dokter + "</td><td>" + val.jumlah + "</td><td>" + val.biaya + "</td><td>" + val.subtotal + "</td><td>" + val.keterangan + "</td>");
                tbody.append(newLine);
                no++;
            });
        }
    });
}

// $(document).ready( () => {
    
// Funct Registrasi
$('#check').change(dis);
$('#tgl_kunj').val(today);
$('#sttus').change(penjamin);
$('#fgh').change(umur);
$('#loket').change(TempatLayanan);
$('#newRM').click(newRM);
$('#rjcont').show();
$('#rj').prop('disabled', false);
$('#rjinc').show();
$('#rjin').prop('disabled', false);
$('#igd2').hide();
$('#igd').prop('disabled', true);
$('#igdinc').hide();
$('#igdin').prop('disabled', true);
$('#ricont').hide();
$('#ri').prop('disabled', false);
$('#riinc').hide();
$('#riin').prop('disabled', false);

// Funct Pelayanan-Kunjungan
$('#rmPel').change(pelayanan);
$('#dokterPel').change(pelayanan);
$('#layananPel').change(pelayanan);
$('#tempatPel').change(pelayanan);
$('#statusPel').change(pelayanan);
$('#datePel').change(pelayanan);
$('#diagnosaManual').hide();
$('#dokterGanti').hide();
$('#inputTind').change(getTarip);
$('#detail').click(() => { window.location.href = 'index.php?r=billing%2Fpelayanan' });

// Funct Pelayanan
$('#tglKonsul').val(today);
$('#tambahKonsul:hidden').click(TambahKonsul);
$('#tambahKonsul:hidden').click(DataKonsul);
$('#dokterTind2').hide();
$('#obatManual').hide();
$('#dokterResep2').hide();
$('#tel').click(UpdateTelepon);
$('#tambahAlergi').click(AlergiInput);
$('#tambahAlergi').click(Alergi);
$('#dpjp').change(Dpjp);

// Funct Pembayaran
$('#nama').change(CariDataPembayaran);
$('#rm').change(CariDataPembayaran);
$('#alamat').change(CariDataPembayaran);
$('#keriganan').keyup(SelisihPembayaran);
$('#terimaUang').keyup(SelisihPembayaran);

// Funct Riwayat Kunjungan
$('#namaR').change(CariDataRiwayat);
$('#rmR').change(CariDataRiwayat);

// });