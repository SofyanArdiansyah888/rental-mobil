<style>
  .findtelat {
    background: red;
    color: #fff;
    font-size: 8px;
    padding: 5px;
    border-radius: 5px;
    font-weight: 600;
}

table.table td, table.table th {
    text-align: center;
}

.jamnya {font-size: 14px;}

.caddi {font-size: 10px;}

.btn.btn-sm {
    padding: 2px 5px;
    font-size: .64rem;
    display: inline-block;
}

.container {
    max-width: 100%;
}

.baris-telat {
    background-color: #ffcccc; /* Warna latar belakang merah muda */
}
.select2-container--default .select2-results__option[aria-disabled=true]{
    color: red; /* Menunggak */
    font-weight: bold;
}

.select2-container--default .select2-results__option:first-child {
    color: #000000; /* Pilih */
    font-weight: inherit;
}

</style>

<script>
document.addEventListener("DOMContentLoaded", function() {
    // Ambil semua elemen dengan kelas "tgl-kbl" dan "jam-kbl"
    var tanggalKembaliElements = document.querySelectorAll(".tgl-kbl");
    var jamKembaliElements = document.querySelectorAll(".jam-kbl");

    // Loop melalui setiap elemen dengan kelas "tgl-kbl"
    tanggalKembaliElements.forEach(function(element, index) {
        // Ambil tanggal dari setiap elemen dengan kelas "tgl-kbl" dan "jam-kbl"
        var tglKembali = new Date(element.textContent + "T" + jamKembaliElements[index].textContent);
        // Waktu saat ini
        var waktuSaatIni = new Date();
        
        // Hitung selisih waktu dalam milidetik
        var selisihWaktu = waktuSaatIni - tglKembali;

        // Jika perbedaan waktu lebih dari 10 jam, maka dianggap terlambat
        //if (selisihWaktu > 10 * 60 * 60 * 1000) { // 10 jam dalam milidetik
		if (selisihWaktu > 60 * 60 * 1000) { // 10 jam dalam milidetik
            // Hitung jumlah hari dan jam dari selisih waktu
            var selisihHari = Math.floor(selisihWaktu / (24 * 60 * 60 * 1000)); // 1 hari dalam milidetik
            var sisaJam = Math.floor((selisihWaktu % (24 * 60 * 60 * 1000)) / (60 * 60 * 1000)); // 1 jam dalam milidetik

            // Tampilkan hasil selisih waktu di console
            console.log("Terlambat selama: " + selisihHari + " hari " + sisaJam + " jam");
            // Temukan elemen saudara dengan kelas "telat" untuk elemen saat ini
            var telatElement = element.parentElement.nextElementSibling.querySelector(".telat");
            // Tambahkan kelas "telat" pada elemen yang sesuai
            telatElement.classList.add("telat");
            // Tampilkan hasil selisih waktu di elemen "telat" yang sesuai
            telatElement.innerHTML = "<span class='findtelat'>Telat: " + selisihHari + " hari " + sisaJam + " jam</span>";
            // Temukan baris tabel terkait
            var barisTabel = element.parentElement.parentElement;
            // Tambahkan kelas "baris-telat" ke baris tabel
            barisTabel.classList.add("baris-telat");
        }
    });

});


</script>


<!-- TOMBOL -->
<div class="container" id="main-menu">
  <div class="row mb-4">
    <div class="col-md clear-fix">
      <button class="btn btn-primary order shadow-none mb-3 tombolTambahMerk float-right" type="button" data-toggle="modal" data-target="#input">
        <i class="fa fa-plus fa-fw" aria-hidden="true"></i> Tambah Pesanan
      </button>
    </div>
  </div>
  <div class="table-responsive bg-white shadow-sm rounded pt-5 pb-4 px-5">
    <table class="table table-hover table-bordered" id="tolong">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col" class="text-center">Kode</th>
          <th scope="col" class="text-center">Penyewa</th>
          <th scope="col" class="text-center">Mobil</th>
          <th scope="col" class="text-center">Tanggal Sewa</th>
          <th scope="col" class="text-center">Durasi</th>
		  <th scope="col" class="text-center">Jam</th>
          <th scope="col" class="text-center">Total</th>
          <th scope="col" class="text-center">Aksi</th>
        </tr>
      </thead>
      <tbody>
       <?php
// TAMPILKAN BARIS
$no = 1;
foreach ($data['Pemesanan'] as $pemesanan) : 
?>
  <tr>
    <td><?= $no++ ?></td>
    <td width="20"><?= ucfirst($pemesanan['NoTransaksi']); ?></td>
    <td width="180"><?= ucfirst($pemesanan['Nama']); ?></td>
    <td>
      <?= '[ '
          . $pemesanan['NoPlat']
          . ' ] '
          . $pemesanan['NmType']
          . ' '
        ?>
    </td>
    <td class="text-center" width="150"><span class="caddi">Diambil :</span><?= ucfirst($pemesanan['Tanggal_Pinjam']); ?> <br>
      <span class="caddi">Kembali :</span><span class="tgl-kbl"><?= ucfirst($pemesanan['Tanggal_Kembali_Rencana']); ?></span>
    </td>
    <td width="110"><?= ucfirst($pemesanan['LamaRental']); ?> Hari<br>
        <span class="telat"></span>
    </td>
	<td width="100" class="jamnya">
	  <?= ucfirst($pemesanan['berangkat']); ?> - <span class="jam-kbl"><?= ucfirst($pemesanan['pulang']); ?></span>  
    </td>
    <td width="50">
      Rp.<span class="uang"><?= ucfirst($pemesanan['Total_Bayar']); ?></span>,-
    </td>
    <td class="text-center" style="width:100px">
      <?php if ($pemesanan['StatusTransaksi'] != "Mulai") : ?>
        <button data-toggle="modal" data-target="#konfirmasi<?= $pemesanan['NoTransaksi'] ?>" class="btn btn-sm btn-primary text-white shadow-none">
          <i class=" fa fa-car fa-fw" aria-hidden="true"></i> Ambil
        </button>
      <?php else : ?>
        <button data-toggle="modal" data-target="#selesai<?= $pemesanan['NoTransaksi'] ?>" class="btn btn-sm btn-success text-white shadow-none tombol_selesai">
          <i class="fa fa-money fa-fw" aria-hidden="true"></i>
        </button>
      <?php endif; ?>
      <button type="button" class="dropdown btn grey lighten-2 btn-sm shadow-none" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-print fa-fw" aria-hidden="true"></i>
      </button>
      <div class="dropdown-menu dropdown-menu-right">
        <a class="dropdown-item" href="<?= BASEURL ?>/Admin/laporan2/<?= $pemesanan['NoTransaksi'] ?>">Cetak</a>
        <button class="dropdown-item <?php if ($pemesanan['StatusTransaksi'] != "Proses") echo 'disabled' ?>" data-toggle="modal" data-target="#batal<?= $pemesanan['NoTransaksi'] ?>">Batalkan</button>
      </div>
    </td>
  </tr>

          <!-- MODAL SELESAI -->
          <div class="modal fade center selesai" id="selesai<?= $pemesanan['NoTransaksi']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header text-success text-center">
                  <h5 class="modal-title h5 w-100">RENTAL SELESAI</h5>
                </div>
                <!-- AWAL FORM -->
                <form action="<?= BASEURL; ?>/<?= $_SESSION['Login']['Role'] ?>/pesananSelesai" method="post" role="form">

                  <div class="modal-body px-5 grey lighten-5">

                    <div class="form-group">
                      <label for="NoTransaksi_Selesai">Kode Transaksi</label>
                      <input type="text" class="form-control" name="NoTransaksi_selesai" id="NoTransaksi_selesai" value="<?= $pemesanan['NoTransaksi'] ?>" readonly>
                    </div>

                    <input type="hidden" value="<?= $pemesanan['Id_Mobil'] ?>" name="Mobil">
                    <input type="hidden" value="<?= $pemesanan['Id_Sopir'] ?>" name="Sopir">

                    <div class="form-group">
                      <label for="Identitas_Selesai">Penyewa</label>
                      <input type="text" class="form-control" id="Identitas_selesai" value="<?= $pemesanan['Nama'] ?>" readonly>
                    </div>

                    <div class="form-group">
                      <label for="Mobil_selesai">Mobil</label>
                      <input type="text" class="form-control" id="Mobil_selesai" value="<?= '[ ' . $pemesanan['NoPlat'] . ' ] ' . $pemesanan['NmMerk'] . ' ' . $pemesanan['NmType'] ?>" readonly>
                    </div>

                    <div class="form-group">
                      <label for="Sopir_selesai">Sopir</label>
                      <input type="text" class="form-control" id="Sopir_selesai" value="<?= $pemesanan['NmSopir'] ?>" readonly>
                    </div>

                    <div class="form-group">
                      <label for="Tanggal_Pesan_selesai">Tanggal Pesan</label>
                      <input type="text" class="form-control datepicker" id="Tanggal_Pesan_selesai" disabled data-value="<?= $pemesanan['Tanggal_Pesan'] ?>">
                    </div>

                    <div class="form-group">
                      <label for="Tanggal_Pinjam_selesai">Tanggal Mulai Rental</label>
                      <input type="text" class="form-control datepicker" id="Tanggal_Pinjam_selesai" disabled data-value="<?= $pemesanan['Tanggal_Pinjam'] ?>">
                    </div>

                    <div class="form-group">
                      <label for="Tanggal_Kembali_selesai">Tanggal Selesai Rental</label>
                      <input type="text" class="form-control datepicker" id="Tanggal_Kembali_selesai" name="Tanggal_Kembali_selesai" data-value="<?= $pemesanan['Tanggal_Kembali_Rencana'] ?>">
                    </div>
					
					<div class="form-group card border-primary p-3 text-white mt-4">
            <label for="jam" class="text-primary">Jam</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Pukul :</span>
              </div>
              <input type="time" class="form-control" id="berangkat" name="berangkat" value="<?= $pemesanan['berangkat'] ?>" readonly>
			  <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Pukul :</span>
              </div>
			  <input type="time" class="form-control" id="pulang" name="pulang" value="<?= $pemesanan['pulang'] ?>" readonly>
            </div>
          </div>

                    <div class="form-group">
                      <label for="LamaRental_selesai">Lama Rental</label>
                      <div class="input-group" style="width:115px">
                        <input type="text" class="form-control" id="LamaRental_selesai"  value="<?= $pemesanan['LamaRental'] ?>" readonly>
                        <div class="input-group-append">
                          <span class="input-group-text">Hari</span>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="Tanggal_Kembali_Sebenarnya">Tanggal Dikembalikan</label>
                      <input type="text" class="form-control datepicker" id="Tanggal_Sebenarnya" name="Tanggal_Sebenarnya" data-value="[<?= date('Y-m-d') ?>]">
                    </div>

                    <div class="form-group">
                      <label for="JatuhTempo">Telat</label>
                      <div class="input-group" style="width:175px">
                        <input type="text" class="form-control" name="JatuhTempo" id="JatuhTempo" readonly> 
                        <div class="input-group-append">
                          <span class="input-group-text">Hari</span> <span class="input-group-text" id="terlambatki"></span>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="Denda">Denda</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">Rp.</span>
                        </div>
                        <input type="hidden" class="form-control" id="Dendax">
						<input type="text" class="uang form-control" name="Denda" id="telat" placeholder="Nilai Denda Lainnya" autocomplete="off">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="Kerusakan">Deskripsi Kerusakan</label>
                      <textarea class="form-control" id="Kerusakan" name="Kerusakan" required autocomplete="off"></textarea>
                    </div>

                    <div class="form-group">
                      <label for="BiayaKerusakan">Biaya Kerusakan</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">Rp.</span>
                        </div>
                        <input type="text" class="uang biaya-kerusakan form-control" name="BiayaKerusakan" id="BiayaKerusakan" value="0" autocomplete="off">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="BiayaBBM">Biaya BBM</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">Rp.</span>
                        </div>
                        <input type="text" class="uang bbm form-control" name="BiayaBBM" id="BiayaBBM" value="0" autocomplete="off">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="TarifMobilPerhari_selesai">Harga Sewa Mobil Harian</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">Rp.</span>
                        </div>
                        <input type="text" class="uang form-control" id="TarifMobilPerhari_selesai" value="<?= $pemesanan['Mhrg_harian'] ?>" readonly>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="TarifSopirPerhari_selesai">Tarif Sopir / Hari</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">Rp.</span>
                        </div>
                        <input type="text" class="uang form-control" id="TarifSopirPerhari_selesai" readonly value="<?= $pemesanan['tarifsopir'] ?>">
                      </div>
                    </div>

                    <div class="card border-success p-3 text-white mt-4">
                      <div class="form-group">
                        <label for="TotalBayar_selesai" class="text-success">Total Sebelum Denda</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Rp.</span>
                          </div>
                          <input type="text" class="uang form-control" id="TotalBayar_selesai2"  value="<?= $pemesanan['Total_Bayar']; ?>" readonly>
						<input type="text" class="status_bayar2 form-control" id="status_bayar" name="status_bayar" autocomplete="off" value="Belum" readonly>
						</div>
                      </div>
					  
					  <div class="form-group">
                        <label for="TotalBayar_selesai" class="text-success">Sisa Bayar / Denda / Panjar</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Rp.</span>
                          </div>
                          <input type="text" class="form-control" id="TotalBayar_selesai"  value="<?= number_format($pemesanan['Total_Bayar'], 0); ?>" readonly> 
						<input type="text" class="form-control" id="panjar" name="panjar" autocomplete="off" value="<?= $pemesanan['panjar']; ?>" readonly>
						</div>
						<input type="hidden" class="form-control" id="Totalnyami" name="TotalBayar_selesai"  readonly>
                      </div>

                      <div class="form-group">
                        <label for="JumlahBayar" class="text-success">Jumlah Bayar</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Rp.</span>
                          </div>
                          <input type="text" class="form-control" name="JumlahBayar" id="JumlahBayar" data-a-sep="."/ autocomplete="off">
						
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="Kembalian" class="text-success">Sisa Pembayaran</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Rp.</span>
                          </div>
                          <input type="text" class="uang form-control" name="Kembalian" id="Kembalian" readonly>
						</div>
						<input type="hidden" class="uang form-control" name="sisa_bayar" id="sisa_bayar" value="">
                      </div>
                    </div>

                    <!-- AKHIR FORM -->
                  </div>
                  <div class="modal-footer text-center justify-content-center">
                    <button type="submit" class="btn btn-success shadow-none">Selesai</button>
                    <button type="button" class="btn btn-outline-success shadow-none" data-dismiss="modal">Tidak</button>
                  </div>

                </form>
              </div>
            </div>
          </div>
          <!-- /MODAL SELESAI -->

          <!-- MODAL BATAL -->
          <div class="modal fade center" id="batal<?= $pemesanan['NoTransaksi']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header text-danger text-center">
                  <h5 class="modal-title h5 w-100">BATALKAN PEMESANAN</h5>
                </div>
                <div class="modal-body px-5 grey lighten-5">
                  <ul class="list-group list-group-flush">
                    <div class="row list-group-item grey lighten-5">
                      <div class="col">No Transaksi</div>
                      <div class="col" style="font-weight:500"><?= $pemesanan['NoTransaksi'] ?></div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">Nama Pemesan</div>
                      <div class="col" style="font-weight:500"><?= $pemesanan['Nama'] ?></div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">Mobil</div>
                      <div class="col" style="font-weight:500">
                        <?= '[ '
                            . $pemesanan['NoPlat']
                            . ' ] '
                            . $pemesanan['NmMerk']
                            . ' '
                            . $pemesanan['NmType']
                          ?>
                      </div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">Tanggal Pesan</div>
                      <div class="col" style="font-weight:500">
                        <?= $pemesanan['Tanggal_Pesan'] ?>
                      </div>
                    </div>

                  </ul>
                </div>
                <div class="modal-footer text-center justify-content-center">
                  <form action="<?= BASEURL; ?>/<?= $_SESSION['Login']['Role'] ?>/batalPesanan" method="post">
                    <input type="hidden" name="noBatalTransaksi" value="<?= $pemesanan['NoTransaksi'] ?>">
                    <input type="hidden" name="statusMobil" value="<?= $pemesanan['Id_Mobil'] ?>">
                    <input type="hidden" name="statusSopir" value="<?= $pemesanan['Id_Sopir'] ?>">
                    <button type="submit" class="btn btn-danger shadow-none">Ya</button>
                    <button type="button" class="btn btn-outline-danger shadow-none" data-dismiss="modal">Tidak</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- / MODAL BATAL -->

          <!-- MODAL AMBIL MOBIL -->
          <div class="modal fade center" id="konfirmasi<?= $pemesanan['NoTransaksi'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header text-primary text-center">
                  <h5 class="modal-title h5 w-100">KONFIRMASI PENGAMBILAN MOBIL</h5>
                </div>
                <div class="modal-body px-5 grey lighten-5">
                  <ul class="list-group list-group-flush">

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">No Transaksi</div>
                      <div class="col" style="font-weight:500"><?= $pemesanan['NoTransaksi'] ?></div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">No Induk Kependudukan</div>
                      <div class="col" style="font-weight:500"><?= $pemesanan['NIK'] ?></div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">Nama Pemesan</div>
                      <div class="col" style="font-weight:500"><?= $pemesanan['Nama'] ?></div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">Mobil</div>
                      <div class="col" style="font-weight:500">
                        <?= '[ '
                            . $pemesanan['NoPlat']
                            . ' ] '
                            . $pemesanan['NmMerk']
                            . ' '
                            . $pemesanan['NmType']
                          ?>
                      </div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">Sopir</div>
                      <div class="col" style="font-weight:500">
                        <?= $pemesanan['NmSopir'] ?>
                      </div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">Tanggal Pesan</div>
                      <div class="col" style="font-weight:500">
                        <?= $pemesanan['Tanggal_Pesan'] ?>
                      </div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">Tanggal Mulai</div>
                      <div class="col" style="font-weight:500">
                        <?= $pemesanan['Tanggal_Pinjam'] ?>
                      </div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">Tanggal Rencana Pengembalian</div>
                      <div class="col" style="font-weight:500">
                        <?= $pemesanan['Tanggal_Kembali_Rencana'] ?>
                      </div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">Lama Rental</div>
                      <div class="col" style="font-weight:500">
                        <?= $pemesanan['LamaRental'] ?> Hari
                      </div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">Tarif Sopir / Hari</div>
                      <div class="col" style="font-weight:500">
                        Rp.
                        <span class="uang"><?= $pemesanan['TarifPerhari'] ?></span>
                        ,-
                      </div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">Harga Sewa Mobil / Hari</div>
                      <div class="col" style="font-weight:500">
                        Rp.
                        <span class="uang"><?= $pemesanan['HargaSewa'] ?></span>
                        ,-
                      </div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">Total Bayar Sementara</div>
                      <div class="col" style="font-weight:500">
                        Rp.
                        <span class="uang"><?= $pemesanan['Total_Bayar'] ?></span>
                        ,-
                      </div>
                    </div>

                  </ul>
                </div>
                <div class="modal-footer text-center justify-content-center">
                  <form action="<?= BASEURL; ?>/<?= $_SESSION['Login']['Role'] ?>/AmbilMobil" method="post" role="form">
                    <input type="hidden" name="statusTransaksi" value="<?= $pemesanan['NoTransaksi'] ?>">
                    <input type="hidden" name="statusMobil" value="<?= $pemesanan['Id_Mobil'] ?>">
                    <input type="hidden" name="statusSopir" value="<?= $pemesanan['Id_Sopir'] ?>">
                    <button type="submit" class="btn btn-primary shadow-none">Ya</button>
                    <button type="button" class="btn btn-outline-primary shadow-none" data-dismiss="modal">Tidak</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- / MODAL AMBIL MOBIL -->

        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>


<!-- AWAL MODAL-->
<div class="modal fade tambahkan" id="input" tabindex="-1" role="dialog" aria-labelledby="input" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header text-primary text-center">
        <h5 class="modal-title h5 w-100" id="input">TAMBAH PESANAN</h5>
      </div>
      <div class="modal-body px-5 grey lighten-5">

        <!-- AWAL FORM -->

        <form action="<?= BASEURL; ?>/<?= $_SESSION['Login']['Role'] ?>/tambahPemesanan" method="post" role="form">

          <div class="form-group">
            <label for="NoTransaksi">Kode Transaksi</label>
            <input type="text" class="form-control" id="NoTransaksi" name="NoTransaksi" required value="<?= $data['autoIdTransaksi'] ?>" readonly>
          </div>

          <div class="form-group">
    <label for="Identitas">Penyewa</label>
    <div id="selectContainer">
        <select class="form-control select2 browser-default custom-select" name="Identitas" id="Identitas" required>
            <option value="" selected disabled>Pilih Pelanggan</option>

<?php
foreach ($data['Pelanggan'] as $Pelanggan) {
    // Memeriksa apakah NIK pelanggan memiliki status bayar "Belum" di tabel pemesanan
    $bayarBelum = false; // Inisialisasi status bayar belum menjadi false secara default
    foreach ($data['Pemesanan'] as $Pemesanan) {
        if ($Pemesanan['NIK'] === $Pelanggan['NIK'] && $Pemesanan['status_bayar'] === "Belum") {
            $bayarBelum = true; // Set status bayar belum menjadi true jika ditemukan pemesanan dengan status bayar "Belum"
            break; // Keluar dari perulangan saat sudah ditemukan pemesanan dengan status bayar "Belum"
        }
    }

    // Menyiapkan gaya teks
    $style = $bayarBelum ? 'color: red;' : '';

    // Menyiapkan pesan jika ada tunggakan
	$pesan = $bayarBelum ? "<b style='color: red !important;'>(ADA TUNGGAKAN)</b>" : "";


    // Membuat opsi dropdown dengan gaya teks dan pesan, dan mengatur opsi menjadi disable jika ada tunggakan
    echo '<option value="' . $Pelanggan['NIK'] . '"' . ($bayarBelum ? ' enabled' : '') . ' style="' . $style . '">' . '(NIK: ' . $Pelanggan['NIK'] . ') | ' . $Pelanggan['Nama'] . ' ' . $pesan . '</option>';

}
?>


            </select>
          </div>
		  </div>

          <div class="form-group">
            <label for="Mobil">Mobil</label>
            <select class="select2 browser-default custom-select" name="Mobil" id="Mobil" required>
              <option value="" selected disabled>Pilih Mobil</option>
              <?php
              foreach ($data['MobilKosong'] as $mobil) :
                echo '<option harga="' . $mobil['HargaSewa'] . '" value="' . $mobil['id'] . '">'
                  . '[ '
                  . $mobil['NoPlat']
                  . ' ] '
                  . $mobil['NmMerk']
                  . ' '
                  . $mobil['NmType']
                  . '</option>';
              endforeach;
              ?>
            </select>
          </div>

          <div class="form-group" id="hargaSewaRental">
            <label for="TarifMobilPerhari">Harga Sewa / Hari</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Rp.</span>
              </div>
              <input type="text" class="uang form-control" id="TarifMobilPerhari" name="Mhrg_harian">
            </div>
          </div>
		  
		  <div class="form-group">
            <div class="switch">
              <label>
                Sopir ?
                <input type="checkbox" id="sopirCheck">
                <span class="lever"></span>
              </label>
            </div>
            <div id="showSopir" class="d-none">
              <div class="form-group">
                <select class="browser-default custom-select" name="Sopir" id="Sopir">
                  <option harga="0" value="SPR000" selected>Pilih Sopir</option>
                  <?php
                  foreach ($data['SopirKosong'] as $sopir) :
                    echo '<option harga="' . $sopir['TarifPerhari'] . '" value="' . $sopir['IdSopir'] . '">'
                      . '[ '
                      . $sopir['IdSopir']
                      . ' ] '
                      . $sopir['NmSopir']
                      . '</option>';
                  endforeach;
                  ?>
                </select>
              </div>

              <div class="form-group" id="tarifSopir">
                <label for="TarifSopirPerhari">Tarif Sopir / Hari</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                  </div>
                  <input type="text" class="form-control" id="TarifSopirPerhari" name="tarifsopir" value="0">
                </div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="Tanggal_Pesan">Tanggal Pesan</label>
            <input type="text" class="form-control datepicker" id="Tanggal_Pesan" name="Tanggal_Pesan" readonly data-value="[<?= date('Y-m-d') ?>]">
          </div>

          <div class="form-group">
            <label for="Tanggal_Pinjam">Tanggal Mulai Rental</label>
            <input type="text" class="form-control datepicker" id="Tanggal_Pinjam" name="Tanggal_Pinjam" required>
          </div>

          <div class="form-group">
            <label for="Tanggal_Kembali">Tanggal Selesai Rental</label>
            <input type="text" class="form-control datepicker" id="Tanggal_Kembali" name="Tanggal_Kembali" required>
          </div>
		  
		  <div class="form-group card border-primary p-3 text-white mt-4">
            <label for="jam" class="text-primary">Jam</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Pukul :</span>
              </div>
              <input type="time" class="form-control" id="berangkat" name="berangkat" value="<?= $pemesanan['berangkat'] ?>">
			  <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Pukul :</span>
              </div>
			  <input type="time" class="form-control" id="pulang" name="pulang" value="<?= $pemesanan['pulang'] ?>">
            </div>
          </div>

          <div class="form-group">
            <label for="LamaRental">Lama Rental</label>
            <div class="input-group" style="width:115px">
              <input type="text" class="form-control" id="LamaRental" name="LamaRental" readonly>
              <div class="input-group-append">
                <span class="input-group-text">Hari</span>
              </div>
            </div>
          </div>
		  
		  <div class="form-group">
            <label for="tujuan">Tujuan</label>
            <input type="text" class="form-control" id="tujuan" name="tujuan" required>
          </div>

          <div class="form-group">
            <label for="jaminan">Jaminan</label>
              <input type="text" class="form-control" id="jaminan" name="jaminan">
          </div>

		  
		  <div class="form-group card border-primary p-3 text-white mt-4">
            <label for="panjar" class="text-primary">DP (Down Payment)</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Rp.</span>
              </div>
              <input type="text" class="form-control" id="panjar" name="panjar">
            </div>
          </div>

          <div class="form-group card border-primary p-3 text-white mt-4">
            <label for="TotalBayar" class="text-primary">Total Bayar</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Rp.</span>
              </div>
              <input type="text" class="form-control" id="TotalBayar" name="TotalBayar" readonly>
			  <input type="text" class="form-control" value="Belum" id="status_bayar" name="status_bayar">
            </div>
          </div>
          <!-- AKHIR FORM -->

      </div>
      <div class="modal-footer text-center justify-content-center">
        <button type="button" class="btn btn-outline-primary shadow-none" data-dismiss="modal">Keluar</button>
        <button type="submit" class="btn btn-primary shadow-none" id="submit">Konfirmasi Pesanan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- AKHIR MODAL-->