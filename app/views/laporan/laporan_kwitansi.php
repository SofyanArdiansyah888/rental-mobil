<style>
.full {
    width: 100%;
}
</style>
<div class="container my-3">
  <div class="text-center my-4" id="no-print">
    <div class="h2"><?= $data['judul'] ?></div>
    Tekan tombol <span class="badge badge-light shadow-none">CTRL + P</span> untuk mencetak.
	<a href="<?php echo BASEURL; ?>/laporan/kwitansi_pdf/<?= $data['laporanKwitansi']['NoTransaksi'] ?>" target="_blank" download>Export to PDF</a>
  </div>
  <div class="p-3 bg-white mb-4" id="print-kwitansi">
    <table class="table table-sm">
      <!-- BARIS pertama -->
      <tr>
        <td>NIK</td>
        <td style="width:10px">:</td>
        <td class="font-weight-normal">
          <?= $data['laporanKwitansi']['NIK'] ?>
		</td>
	  </tr>
	  
	  <tr>
		<td>Nama</td>
        <td style="width:10px">:</td>
		<td class="font-weight-normal">
          <?= $data['laporanKwitansi']['Nama'] ?>
		</td>
		</tr>
		<tr>
		<td>Telepon</td>
        <td style="width:10px">:</td>
		<td class="font-weight-normal">
		  <?= $data['laporanKwitansi']['NoTelp'] ?><br>
		</td>
		</tr>
		<tr>
		<td>Alamat</td>
        <td style="width:10px">:</td>
		<td class="font-weight-normal">
		  <?= $data['laporanKwitansi']['Alamat'] ?><br>
        </td>
		</tr>
		
		<tr>
		<td class="border-0"></td>
        <td class="border-0" style="width:10px"></td>
        <td class="full border-0 font-weight-normal">Dengan ini menyatakan bahwa pihak rental menitipkan kendaraan spesifikasi kendaraan sebagai berikut :</td>
		</tr>
	 </table> 
	  
	 <table class="table table-sm">
	  <tr>
        <!-- BARIS Kedua -->
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
      </tr>
	  
      <!-- BARIS KETIGA -->
      <tr>
        <td>Mobil</td>
        <td style="width:10px">:</td>
        <td class="font-weight-normal">
          <?= ' <span class="badge badge-light shadow-none"> '
            . $data['laporanKwitansi']['NoPlat']
            . ' </span> '
            . $data['laporanKwitansi']['NmMerk']
            . ' '
            . $data['laporanKwitansi']['NmType']
          ?>
        </td>
        <td>Deskripsi Kerusakan</td>
        <td style="width:10px">:</td>
        <td class="font-weight-normal">
          <?= $data['laporanKwitansi']['Kerusakan'] ?>
        </td>
      </tr>
      <!-- BARIS KEEMPAT -->
      <tr>
        <td>Sopir</td>
        <td style="width:10px">:</td>
        <td class="font-weight-normal">
          <?= ' <span class="badge badge-light shadow-none"> '
            . $data['laporanKwitansi']['Id_Sopir']
            . ' </span> '
            . $data['laporanKwitansi']['NmSopir']
          ?>
        </td>
        <td>Biaya Kerusakan</td>
        <td style="width:10px">:</td>
        <td class="font-weight-normal">
          Rp.<span class="uang"><?= $data['laporanKwitansi']['BiayaKerusakan'] ?></span>,-
        </td>
      </tr>
      <!-- BARIS KELIMA -->
      <tr>
        <td>Tanggal Pesan</td>
        <td style="width:10px">:</td>
        <td class="font-weight-normal">
          <?= $data['laporanKwitansi']['Tanggal_Pesan'] ?>
        </td>
        <td>Biaya BBM</td>
        <td style="width:10px">:</td>
        <td class="font-weight-normal">
          Rp.<span class="uang"><?= $data['laporanKwitansi']['BiayaBBM'] ?></span>,-
        </td>
      </tr>
      <!-- BARIS KEENAM -->
      <tr>
        <td>Tanggal Mulai</td>
        <td style="width:10px">:</td>
        <td class="font-weight-normal">
          <?= $data['laporanKwitansi']['Tanggal_Pinjam'] ?>
        </td>
        <td>Harga Sewa Mobil / Hari</td>
        <td style="width:10px">:</td>
        <td class="font-weight-normal">
          Rp.<span class="uang"><?= $data['laporanKwitansi']['Mhrg_harian'] ?></span>,-
        </td>
      </tr>
      <!-- BARIS KETUJUH -->
      <tr>
        <td>Tanggal Kembali</td>
        <td style="width:10px">:</td>
        <td class="font-weight-normal">
          <?= $data['laporanKwitansi']['Tanggal_Kembali_Rencana'] ?>
        </td>
        <td>Tarif Sopir / Hari</td>
        <td style="width:10px">:</td>
        <td class="font-weight-normal">
          Rp.<span class="uang"><?= $data['laporanKwitansi']['TarifPerhari'] ?></span>,-
        </td>
      </tr>
      <!-- BARIS KEDELAPAN -->
      <tr>
        <td>Lama Rental</td>
        <td style="width:10px">:</td>
        <td class="font-weight-normal">
          <?= $data['laporanKwitansi']['LamaRental'] ?> Hari
        </td>
        <td>Total Bayar</td>
        <td style="width:10px">:</td>
        <td class="font-weight-bold text-danger" style="font-size:20px">
          Rp.<span class="uang"><?= $data['laporanKwitansi']['Total_Bayar'] ?></span>,-
        </td>
      </tr>
	  
	  <tr>
        <td>Telat</td>
        <td style="width:10px">:</td>
        <td class="font-weight-normal">
          <?= $data['laporanKwitansi']['LamaDenda'] ?> Hari
        </td>
      </tr>
	  
      <!-- BARIS KESEMBILAN -->
      <tr>
        <td></td>
        <td style="width:10px"></td>
        <td class="font-weight-normal"></td>
        <td>Jumlah Bayar</td>
        <td style="width:10px"></td>
        <td class="font-weight-normal">
          Rp.<span class="uang"><?= $data['laporanKwitansi']['Jumlah_Bayar'] ?></span>,-
        </td>
      </tr>
      <!-- BARIS KESEPULUH -->
      <tr>
        <td class="border-0"></td>
        <td style="width:10px" class="border-0"></td>
        <td class="font-weight-normal border-0"> </td>
        <td>Kembalian</td>
        <td style="width:10px"></td>
        <td class="font-weight-normal">
          Rp.<span class="uang"><?= $data['laporanKwitansi']['Kembalian'] ?></span>,-
        </td>
      </tr>
    </table>
	
	<div><h4>CEKLIST UNIT DAN KELENGKAPAN KENDARAAN</h4></div>
	
	<table class="table">
<tbody>
<tr>
<td colspan="2" width="203">Body Kendaraan</td>
<td colspan="3" width="407">Keterangan</td>
</tr>
<tr>
<td colspan="2" rowspan="7" width="203">&nbsp;
<table>
<tbody>
<tr>
<td></td>
</tr>
</tbody>
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
<td colspan="2" rowspan="7" width="203">&nbsp;
<table>
<tbody>
<tr>
<td></td>
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
<td colspan="2" rowspan="7" width="203">&nbsp;
<table>
<tbody>
<tr>
<td></td>
</tr>
</tbody>
</table>
Foto Samping Depan</td>
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
<td colspan="2" rowspan="7" width="203">&nbsp;
<table>
<tbody>
<tr>
<td></td>
</tr>
</tbody>
</table>
Foto Samping Belakang</td>
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
<td rowspan="2" width="183">Jenis Kelengkapan Kendaraan</td>
<td colspan="2" width="145">Status</td>
<td rowspan="2" width="112">&nbsp;

Keterangan</td>
<td rowspan="5" width="169">&nbsp;
<table>
<tbody>
<tr>
<td></td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td width="43">Ada</td>
<td width="103">Tidak Ada</td>
</tr>
<tr>
<td width="183">STNK</td>
<td width="43"></td>
<td width="103"></td>
<td width="112"></td>
</tr>
<tr>
<td width="183">Dongkrak</td>
<td width="43"></td>
<td width="103"></td>
<td width="112"></td>
</tr>
<tr>
<td width="183">Kotak P3K</td>
<td width="43"></td>
<td width="103"></td>
<td width="112"></td>
</tr>
<tr>
<td width="183">Seigitiga Pengaman</td>
<td width="43"></td>
<td width="103"></td>
<td width="112"></td>
<td width="169">Posisi Jarum BBM</td>
</tr>
<tr>
<td width="183">Kunci Roda</td>
<td width="43"></td>
<td width="103"></td>
<td width="112"></td>
<td width="169">Start :</td>
</tr>
<tr>
<td width="183">Ban Cadangan</td>
<td width="43"></td>
<td width="103"></td>
<td width="112"></td>
<td width="169">Kembali :</td>
</tr>
</tbody>
</table>
	
    <div class="d-none" id="print">
      <div class="row justify-content-center mt-4">
        <div class="col text-center">
          <?= date('l, d F Y') ?>
        </div>
      </div>
      <div class="row mt-2">
        <div class="col text-center">
          <?php
          if ($_SESSION['Login']['RoleId'] == 1 || $_SESSION['Login']['RoleId'] == 2) {
            echo $_SESSION['Login']['Role'];
          } else {
            echo 'Karyawan';
          }
          ?>
          <br>
          CV. Jasa Saudagar
          <br><br>
          <h1>
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
          </h1>
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
        <div class="col text-center">
        </div>
        <div class="col text-center">
          Penyewa <br> <br><br><br><br><br>
          (<b><?= $data['laporanKwitansi']['Nama'] ?></b>)
        </div>
      </div>
    </div>
  </div>
</div>