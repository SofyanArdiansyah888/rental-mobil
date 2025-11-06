<?php
setlocale(LC_TIME, 'id_ID');
$date = strftime('%A, %d %B %Y');

$englishDays = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
$indonesianDays = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];

$englishMonths = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
$indonesianMonths = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

$date = str_replace($englishDays, $indonesianDays, $date);
$date = str_replace($englishMonths, $indonesianMonths, $date);

?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SPK JASA SAUDAGAR</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <style>
    /* Gaya tambahan di sini */
    /* Menggunakan Grid Layout untuk Tabel */
    .table {
      gap: 5px;
    }

    /* Flexbox untuk Aligment */
    .container {
      display: flex;
      flex-direction: column;
      align-items: center;
    }
	.infox {
    font-size: 11px;
}
table, p, li {
    font-weight: bolder;
    font-family: Google Sans, Roboto, Helvetica, Arial, sans-serif;
}

.flex-container {
    display: flex;
}

.col-md-2.text-center {
    flex: 0 0 auto;
}

.col-md-10 {
    flex: 1;
	width: 100%;
}



.kecilnya h5 {
    font-size: 12px;
}

.ttd {
    font-size: 11px;
}

table.cek td {
    font-size: 11px;
    box-shadow: unset;
}
	
	li {
    font-size: 12px;
	}
	
	table .noborder tbody  {
        border-width: 0px !important;
		    --bs-table-bg: var(--bs-body-bg);
}

h6 {
    margin-bottom: 1px;
}

ul {
    margin-top: 0;
    margin-bottom: 5px;
}
.satu td {
    padding: 0 0.5rem;
}


.shadow-none {
    box-shadow: none!important;
    --bs-badge-color: #101010;
}


table .noborder td {
    border-width: 0px !important;
    --bs-table-bg: var(--bs-body-bg);
}
	
	tbody, td, tfoot, th, thead {
        border-width: 1px;
    font-size: 12px;
}

table.table-borderless {
    border: unset !important;
}

.table-borderless>:not(caption)>*>*, .table-borderless tbody {
    border-bottom-width: 0;
    border-width: 0;
    border-color: #000 !important;
}
	h5 {
    font-size: 16px;
}
	.kanan {
    text-align: left !important;
    padding-left: 7px;
}

.kiri {
    text-align: left;
    padding-right: 7px;
}
	
	.kepala img {
    width: 100px;
}
	
	.kepala span {
		font-size:13px !important;
	}
	.kepala {
    border-bottom: 2px solid #000 !important;
    padding-bottom: 12px;
    margin-bottom: 32px;
}

.col-md-6 {
    width: 100%;
    display: inline-block;
}

.table-bordered>:not(caption)>*>* {
    border: 1px solid #000;
    border-bottom-width: 1px;
}

.table {
    border: 1px solid #000 !important;
    box-shadow: unset;
        border-bottom-width: 1px;
}

body, td, tfoot, th, thead, tr {
    border-color: #000;
}

.table img {
    width: 90%;
}
	

    /* Media Queries */
    @media screen and (max-width: 768px) {
      .table {
        grid-template-columns: repeat(auto-fit, minmax(80px, 1fr));
      }
	  
    }
  </style>
</head>
<body>

  <div class="container ">
    <div class="text-center" id="no-print">
      <button id="download-pdf">Download PDF</button>
    </div>
	
    <div class="p-3 bg-white" id="content">
		<div class="container kepala">
    <div class="flex-container">
        <div class="col-md-2 text-center">
            <img src="<?= BASEURL ?>/img/assets/logonya.jpeg" alt="logo Image">
        </div>
        <div class="col-md-10">
            <h4 class="text-left" style="font-size:25px; margin-bottom: 0;" class="font-weight-bold"><?= APP_NAME; ?></h4>
            <div class="col-md-6 kiri">
                <span style="font-size:18px" class="font-weight-regular">Alamat : <?= alamat_usaha; ?></span><br>
            </div>
			<div class="col-md-6 kiri">
                <span style="font-size:18px" class="font-weight-regular">Telepon : <?= phone; ?></span><br>
            </div>
            <div class="col-md-6 kiri">
                <span style="font-size:18px" class="font-weight-regular">Website : <?= website; ?> | Email : <?= email; ?> </span><br>
            </div>
            <div class="text-left">
                <?php echo $date;?>
            </div>
        </div>
    </div>
</div>

			
			<h5 style="margin-bottom: 0px;" class="text-center">SURAT PERNYATAAN SEWA KENDARAAN</h5>
				<p style="font-size: 13px;" class="text-center">No. SPK: <?= $data['laporanKwitansi']['NoTransaksi'] ?></p>
	<br>
	<table class="table table-borderless satu">
      <!-- BARIS pertama -->
      <tr>
        <td width="150"><b>NIK</b></td>
        <td style="width:10px">:</td>
        <td class="font-weight-normal">
          <?= $data['laporanKwitansi']['NIK'] ?>
		</td>
		<td width="150"><b>Pekerjaan</b></td>
        <td style="width:10px">:</td>
        <td class="font-weight-normal">
          <?= $data['laporanKwitansi']['pekerjaan'] ?>
		</td>
	  </tr>
	  
	  <tr>
		<td><b>Nama</b></td>
        <td style="width:10px">:</td>
		<td class="font-weight-normal">
          <?= $data['laporanKwitansi']['Nama'] ?>
		</td>
		<td><b>Telepon</b></td>
        <td style="width:10px">:</td>
		<td class="font-weight-normal">
		  <?= $data['laporanKwitansi']['NoTelp'] ?><br>
		</td>
		</tr>
		<tr>
		<td><b>Alamat</b></td>
        <td style="width:10px">:</td>
		<td class="font-weight-normal">
		  <?= $data['laporanKwitansi']['Alamat'] ?><br>
        </td>
		<td><b>Telepon Kerabat</td>
        <td style="width:10px">:</td>
		<td class="font-weight-normal">
		  <?= $data['laporanKwitansi']['NoTelpKerabat'] ?><br>
		</td>
		</tr>
		
		<tr>
		<td><b>Tempat, Tanggal Lahir</b></td>
        <td style="width:10px">:</td>
		<td class="font-weight-normal">
		  <?= $data['laporanKwitansi']['ttl'] ?><br>
		</td>
		</tr>
	 </table> 
	 <br>
	 <p style="font-size: 12px;">Dengan ini menyatakan bahwa pihak rental menitipkan kendaraan spesifikasi kendaraan sebagai berikut : </p>
	  
	 <table class="table table-bordered dataTable">
	  <!-- <tr>
        <!-- BARIS Kedua 
        <td class="border-0">No Transaksi</td>
        <td class="border-0" style="width:10px">:</td>
        <td class="border-0 font-weight-normal">
          <?= $data['laporanKwitansi']['NoTransaksi'] ?>
        </td>
        <td class="border-0">Tanggal Dikembalikan</td>
        <td class="border-0" style="width:10px">:</td>
        <td class="border-0 font-weight-normal">
          <?= $data['laporanKwitansi']['Tanggal_Kembali_Sebenarnya'] ?>
        </td>
      </tr> -->
	  
      <!-- BARIS KETIGA -->
      <tr>
        <td><b>Mobil</b></td>
        <td style="width:10px">:</td>
        <td class="font-weight-normal">
          <?= ' <span class="badge badge-light shadow-none"> '
            . $data['laporanKwitansi']['NoPlat']
            . ' </span> '
            . $data['laporanKwitansi']['NmType']
          ?>
        </td>
        <td><b>Deskripsi Kerusakan</b></td>
        <td style="width:10px">:</td>
        <td class="font-weight-normal">
          <?= $data['laporanKwitansi']['Kerusakan'] ?>
        </td>
      </tr>
      <!-- BARIS KEEMPAT -->
      <tr>
        <td><b>Sopir</b></td>
        <td style="width:10px">:</td>
        <td class="font-weight-normal">
          <?= ' <span class="badge badge-light shadow-none"> '
            . $data['laporanKwitansi']['Id_Sopir']
            . ' </span> '
            . $data['laporanKwitansi']['NmSopir']
          ?>
        </td>
        <td><b>Biaya Kerusakan</b></td>
        <td style="width:10px">:</td>
        <td class="font-weight-normal">
          Rp.<span class="uang"><?= $data['laporanKwitansi']['BiayaKerusakan'] ?></span>,-
        </td>
      </tr>
      <!-- BARIS KELIMA -->
      <tr>
        <td><b>Tanggal Sewa</b></td>
        <td style="width:10px">:</td>
        <td class="font-weight-normal">
          <?= $data['laporanKwitansi']['Tanggal_Pinjam'] ?> - <?= $data['laporanKwitansi']['Tanggal_Kembali_Rencana'] ?>
        </td>
        <td><b>Biaya BBM</b></td>
        <td style="width:10px">:</td>
        <td class="font-weight-normal">
          Rp.<span class="uang"><?= $data['laporanKwitansi']['BiayaBBM'] ?></span>,-
        </td>
      </tr>
      <!-- BARIS KEENAM -->
      <tr>
        <td><b>Jam</b></td>
        <td style="width:10px">:</td>
        <td class="font-weight-normal">
          <?= $data['laporanKwitansi']['berangkat'] ?> - <?= $data['laporanKwitansi']['pulang'] ?>
        </td>
        <td><b>Harga Sewa Mobil / Hari</b></td>
        <td style="width:10px">:</td>
        <td class="font-weight-normal">
          Rp.<span class="uang"><?= $data['laporanKwitansi']['Mhrg_harian'] ?></span>,-
        </td>
      </tr>
      <!-- BARIS KETUJUH -->
      <tr>
        <td><b>Tujuan</b></td>
        <td style="width:10px">:</td>
        <td class="font-weight-normal">
          <?= $data['laporanKwitansi']['tujuan'] ?>
        </td>
        <td><b>Tarif Sopir / Hari</td>
        <td style="width:10px">:</td>
        <td class="font-weight-normal">
          Rp.<span class="uang"><?= $data['laporanKwitansi']['TarifPerhari'] ?></span>,-
        </td>
      </tr>
      <!-- BARIS KEDELAPAN -->
      <tr>
        <td><b>Jaminan</b></td>
        <td style="width:10px">:</td>
        <td class="font-weight-normal">
          <?= $data['laporanKwitansi']['jaminan'] ?> Hari
        </td>
        <td><b>Total Bayar</b></td>
        <td style="width:10px">:</td>
        <td class="font-weight-bold text-danger" style="font-size:20px">
          Rp.<span class="uang"><?= $data['laporanKwitansi']['Total_Bayar'] ?></span>,-
        </td>
      </tr>
	  
	  <tr>
		<td><b>Durasi</b></td>
        <td style="width:10px">:</td>
        <td class="font-weight-normal">
          <?= $data['laporanKwitansi']['LamaRental'] ?> Hari
        </td>
		<td><b>Panjar</td>
        <td style="width:10px">:</td>
        <td class="font-weight-normal">
          Rp.<span class="uang"><?= $data['laporanKwitansi']['panjar'] ?></span>,-
        </td>
      </tr>
	  
	  
      <!-- BARIS KESEMBILAN -->
      <tr>
		<td><b>Telat</b></td>
        <td style="width:10px">:</td>
        <td class="font-weight-normal">
          <?= $data['laporanKwitansi']['LamaDenda'] ?> Hari
        </td>
        <td><b>Jumlah Bayar</td>
        <td style="width:10px"></td>
        <td class="font-weight-normal">
          Rp.<span class="uang"><?= $data['laporanKwitansi']['Jumlah_Bayar'] ?></span>,-
        </td>
      </tr>
      <!-- BARIS KESEPULUH -->
      <tr>
        <td><b>Denda</b></td>
        <td style="width:10px">:</td>
		<td class="font-weight-normal">
          Rp.<span class="uang"><?= $data['laporanKwitansi']['Denda'] ?></span>,-
        </td>
        <td><b>Sisa Pembayaran</b></td>
        <td style="width:10px">:</td>
        <td class="font-weight-normal">
          Rp.<span class="uang"><?= $data['laporanKwitansi']['sisa_bayar'] ?></span>,-
        </td>
      </tr>
    </table>
	<br>
	 <h6>Bersedia menyanggupi Syarat & Ketentuan penyewaan kendaraan dibawah ini:</h6>
  <ul>
    <li>Penyewa harus mengonfirmasi perpanjangan sewa kendaraan ke pihak rental.</li>
    <li>Jika terlambat mengembalikan kendaraan, akan dikenakan biaya overtime 10% per jam dari harga sewa per hari.</li>
    <li>Penyewa bertanggung jawab atas segala kerusakan atau kehilangan kendaraan selama masa sewa.</li>
    <li>Kendaraan tidak boleh digadaikan atau diubah bentuk aslinya oleh penyewa.</li>
	<li>Penyewa tidak diizinkan membawa kendaraan ke tempat tujuan selain yang telah ditentukan.</li>
    <li>Penyewa wajib melunasi semua biaya sewa dan tagihan terkait kerusakan kendaraan.</li>
    <!-- Tambahkan tanggung jawab lainnya sesuai kebutuhan -->
  </ul>
    <!-- Tambahkan poin lainnya sesuai kebutuhan -->
<br><br>
  <div class="row mt-2">
        <div class="col text-center ttd">
          <?php
          if ($_SESSION['Login']['RoleId'] == 1 || $_SESSION['Login']['RoleId'] == 2) {
            echo $_SESSION['Login']['Role'];
          } else {
            echo 'Karyawan';
          }
          ?>
          CV. Jasa Saudagar
          <br><br><br><br>
          <h6>
            <?php if ($data['laporanKwitansi']['StatusTransaksi'] == "Selesai") : ?>
              <span class="badge badge-success my-0">
                <i class="fa fa-check" aria-hidden="true"></i>
                LUNAS
              </span>
            <?php elseif ($data['laporanKwitansi']['StatusTransaksi'] == "Proses" || $data['laporanKwitansi']['StatusTransaksi'] == "Mulai") : ?>
              <span class="badge badge-warning my-0">
                <i class="fa fa-info-circle" aria-hidden="true"></i>
                BELUM LUNAS
              </span>
            <?php else : ?>
              <span class="badge badge-danger my-0">
                <i class="fa fa-ban" aria-hidden="true"></i>
                BATAL
              </span>
            <?php endif; ?>
          </h6>
          <br>
          (<b>
            <?php
            if ($_SESSION['Login']['RoleId'] == 1 || $_SESSION['Login']['RoleId'] == 2) {
              echo $_SESSION['Login']['Nama'];
            } else {
              echo '....................................';
            }
            ?>
          </b>)
        </div>
        <div class="col text-center ttd">
        </div><br>
        <div class="col text-center ttd">
          Penyewa <br> <br><br><br><br><br>
          (<b><?= $data['laporanKwitansi']['Nama'] ?></b>)
        </div>
      </div>
  
	<br><br><br><br>
	<div class="text-center kecilnya"><h5>CEKLIST UNIT DAN KELENGKAPAN KENDARAAN</h5></div>
		<div class="row mt-2">
			<div class="col text-center infox">
			<span class="text-center">No. SPK: <?= $data['laporanKwitansi']['NoTransaksi'] ?></span>
				<?= ' <span class="badge badge-light shadow-none"> '
				. $data['laporanKwitansi']['NoPlat']
				. ' </span> '
				. $data['laporanKwitansi']['NmType']
				?>
			  </div>
			<div class="col text-center infox">
			  <?php echo $date;?>
			   </div>
		</div>
	
	<table class="table cek dataTable no-border">
<tbody>
<tr>
<td colspan="2" width="203" align="center"><b>Body Kendaraan</b></td>
<td colspan="3" width="407" align="center"><b>Keterangan</b></td>
</tr>
<tr>
<td colspan="2" rowspan="7" width="203" align="center">&nbsp;
<table class="noborder">
<tr>
<td align="center"><img src="<?= BASEURL ?>/img/display/kanan.png"></td>
</tr>
</table>
Foto Samping Kanan</td>
<td colspan="3" width="407"></td>
</tr>
<tr>
<td colspan="3" width="407"></td>
</tr>
<tr>
<td colspan="3" width="407"></td>
</tr>
<tr>
<td colspan="3" width="407"></td>
</tr>
<tr>
<td colspan="3" width="407"></td>
</tr>
<tr>
<td colspan="3" width="407"></td>
</tr>
<tr>
<td colspan="3" width="407"></td>
</tr>
<tr>
<td colspan="2" rowspan="7" width="203" align="center">&nbsp;
<table class="noborder">
<tbody>
<tr>
<td align="center"><img src="<?= BASEURL ?>/img/display/kiri.png"></td>
</tr>
</tbody>
</table>
Foto Samping Kiri</td>
<td colspan="3" width="407"></td>
</tr>
<tr>
<td colspan="3" width="407"></td>
</tr>
<tr>
<td colspan="3" width="407"></td>
</tr>
<tr>
<td colspan="3" width="407"></td>
</tr>
<tr>
<td colspan="3" width="407"></td>
</tr>
<tr>
<td colspan="3" width="407"></td>
</tr>
<tr>
<td colspan="3" width="407"></td>
</tr>
<tr>
<td colspan="2" rowspan="7" width="203" align="center">&nbsp;
<table class="noborder">
<tbody>
<tr>
<td align="center"><img src="<?= BASEURL ?>/img/display/depan.png"></td>
</tr>
</tbody>
</table>
Foto Tampak Depan</td>
<td colspan="3" width="407"></td>
</tr>
<tr>
<td colspan="3" width="407"></td>
</tr>
<tr>
<td colspan="3" width="407"></td>
</tr>
<tr>
<td colspan="3" width="407"></td>
</tr>
<tr>
<td colspan="3" width="407"></td>
</tr>
<tr>
<td colspan="3" width="407"></td>
</tr>
<tr>
<td colspan="3" width="407"></td>
</tr>
<tr>
<td colspan="2" rowspan="7" width="203" align="center">&nbsp;
<table class="noborder">
<tbody>
<tr>
<td align="center"><img src="<?= BASEURL ?>/img/display/belakang.png"></td>
</tr>
</tbody>
</table>
Foto Tampak Belakang</td>
<td colspan="3" width="407"></td>
</tr>
<tr>
<td colspan="3" width="407"></td>
</tr>
<tr>
<td colspan="3" width="407"></td>
</tr>
<tr>
<td colspan="3" width="407"></td>
</tr>
<tr>
<td colspan="3" width="407"></td>
</tr>
<tr>
<td colspan="3" width="407"></td>
</tr>
<tr>
<td colspan="3" width="407"></td>
</tr>
<tr>
<td rowspan="2" width="183" align="center"><b>Jenis Kelengkapan Kendaraan</b></td>
<td colspan="2" width="145" align="center"><b>Status</b></td>
<td rowspan="2" width="112" align="center">&nbsp;

<b>Keterangan</b></td>
<td rowspan="5" width="169" align="center">&nbsp;
<table class="noborder">
<tbody>
<tr>
<td align="center"><img src="<?= BASEURL ?>/img/display/spidometer.png"></td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td width="43" align="center"><b>Ada</b></td>
<td width="103" align="center"><b>Tidak Ada</b></td>
</tr>
<tr>
<td width="183"><b>STNK</b></td>
<td width="43"></td>
<td width="103"></td>
<td width="112"></td>
</tr>
<tr>
<td width="183"><b>Dongkrak</b></td>
<td width="43"></td>
<td width="103"></td>
<td width="112"></td>
</tr>
<tr>
<td width="183"><b>Kotak P3K</b></td>
<td width="43"></td>
<td width="103"></td>
<td width="112"></td>
</tr>
<tr>
<td width="183"><b>Segitiga Pengaman</b></td>
<td width="43"></td>
<td width="103"></td>
<td width="112"></td>
<td width="169"><b>Posisi Jarum BBM</b></td>
</tr>
<tr>
<td width="183"><b>Kunci Roda</b></td>
<td width="43"></td>
<td width="103"></td>
<td width="112"></td>
<td width="169"><b>Start KM :</b></td>
</tr>
<tr>
<td width="183"><b>Ban Cadangan</b></td>
<td width="43"></td>
<td width="103"></td>
<td width="112"></td>
<td width="169"><b>Kembali KM :</b></td>
</tr>
</tbody>
</table>

<div class="row mt-2">
        <div class="col text-center ttd">
          <?php
          if ($_SESSION['Login']['RoleId'] == 1 || $_SESSION['Login']['RoleId'] == 2) {
            echo $_SESSION['Login']['Role'];
          } else {
            echo 'Karyawan';
          }
          ?>
          CV. Jasa Saudagar
          <h6>
            <?php if ($data['laporanKwitansi']['StatusTransaksi'] == "Selesai") : ?>
              <span class="badge badge-success my-0">
                <i class="fa fa-check" aria-hidden="true"></i>
                Lunas
              </span>
            <?php elseif ($data['laporanKwitansi']['StatusTransaksi'] == "Proses" || $data['laporanKwitansi']['StatusTransaksi'] == "Mulai") : ?>
              <span class="badge badge-warning my-0">
                <i class="fa fa-info-circle" aria-hidden="true"></i>
                Belum Lunas
              </span>
            <?php else : ?>
              <span class="badge badge-danger my-0">
                <i class="fa fa-ban" aria-hidden="true"></i>
                Batal
              </span>
            <?php endif; ?>
          </h6>
          <br><br><br><br>
          (<b>
            <?php
            if ($_SESSION['Login']['RoleId'] == 1 || $_SESSION['Login']['RoleId'] == 2) {
              echo $_SESSION['Login']['Nama'];
            } else {
              echo '....................................';
            }
            ?>
          </b>)
        </div>
        <div class="col text-center ttd">
        </div>
        <div class="col text-center ttd">
          Penyewa <br> <br><br><br><br><br>
          (<b><?= $data['laporanKwitansi']['Nama'] ?></b>)
        </div>
      </div>
	
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
  <script>
document.getElementById('download-pdf').addEventListener('click', function () {
    var element = document.getElementById('content');
    var currentDate = new Date();
    var timestamp = currentDate.getFullYear() + '-' + (currentDate.getMonth() + 1) + '-' + currentDate.getDate() + '_' + currentDate.getHours() + '-' + currentDate.getMinutes() + '-' + currentDate.getSeconds();
    var fileName = "<?= $data['laporanKwitansi']['NoTransaksi'] ?>_" + timestamp; // Combine NoTransaksi and timestamp
    html2pdf().from(element).toPdf().get('pdf').then(function (pdf) {
        pdf.save(fileName);
    });
});
</script>

</body>
</html>
