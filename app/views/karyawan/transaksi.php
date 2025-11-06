<style>
table.table td, table.table th {
    text-align: center;
}

.jamnya {font-size: 14px;}

.caddi {font-size: 10px;}

.btn.btn-sm {
    padding: 2px 3px;
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- TOMBOL -->
<div class="container" id="main-menu">
  <div class="row mb-4">
    <div class="col-md clear-fix">
      <button class="btn mb-3 shadow-none float-right" type="button" data-toggle="modal" data-target="#inputUser">
      </button>
    </div>
  </div>
  <div class="bg-white shadow-sm rounded pt-5 pb-4 px-5">
    <table class="table table-hover" id="tolong">
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
        foreach ($data['Transaksi'] as $Transaksi) : ?>

          <tr>
            <td width="10"><?= $no++ ?></td>
            <td width="20">
              <?= ucfirst($Transaksi['NoTransaksi']); ?>
              <span class="ml-2 shadow-none badge 
                <?php if ($Transaksi['StatusTransaksi'] == 'Selesai') echo 'badge-success';
                  else if ($Transaksi['StatusTransaksi'] == 'Proses') echo 'badge-primary';
                  else if ($Transaksi['StatusTransaksi'] == 'Mulai') echo 'badge-warning';
                  else echo 'badge-danger';
                  ?>
            ">
                <?= ucfirst($Transaksi['StatusTransaksi']); ?>
              </span>
            </td>
            <td width="150"><?= ucfirst($Transaksi['Nama']); ?></td>
            <td width="190">
              <?= '[ '
                  . $Transaksi['NoPlat']
                  . ' ] '
                  . $Transaksi['NmType']
                  . ' '
                ?>
            </td>
            <td class="text-center" width="150"><span class="caddi">Diambil :</span><?= ucfirst($Transaksi['Tanggal_Pinjam']); ?> <br>
      <span class="caddi">Kembali :</span><span class="tgl-kbl"><?= ucfirst($Transaksi['Tanggal_Kembali_Rencana']); ?></span>
    </td>
    <td width="50"><?= ucfirst($Transaksi['LamaRental']); ?> Hari<br>
        <span class="telat"></span>
    </td>
	<td width="100" class="jamnya">
	  <?= ucfirst($Transaksi['berangkat']); ?> - <span class="jam-kbl"><?= ucfirst($Transaksi['pulang']); ?></span>  
    </td>
            <td width="50">
				Rp.<span class="uang"><?= ucfirst($Transaksi['Total_Bayar']); ?></span>,-
				<span class="ml-2 shadow-none badge 
					<?php if ($Transaksi['status_bayar'] == 'Lunas') echo 'badge-success';
					else if ($Transaksi['status_bayar'] == 'Belum') echo 'badge-danger';
					else echo 'badge-danger';
					?>
				">
					<?= ucfirst($Transaksi['status_bayar']); ?>
				</span>
			</td>

            <td class="text-center" style="width:100px">
              <button type="button" class="dropdown btn grey lighten-2 btn-sm shadow-none" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-bars fa-fw" aria-hidden="true"></i>
              </button>
              <a class="btn btn-info btn-sm shadow-none" href="<?= BASEURL ?>/Admin/laporan2/<?= $Transaksi['NoTransaksi'] ?>">
                <i class="fa fa-print fa-fw" aria-hidden="true"></i>
              </a>
			  
              <div class="dropdown-menu dropdown-menu-right">
                <button class="dropdown-item" data-toggle="modal" data-target="#detail<?= $Transaksi['NoTransaksi'] ?>">Detail</button>
                <a class="dropdown-item" href="<?= BASEURL ?>/<?= $_SESSION['Login']['Role'] ?>/konfirmasiArsip/<?= $Transaksi['NoTransaksi'] ?>">Arsipkan</a>
              </div>
			  
			  <button data-toggle="modal" data-target="#selesai<?= $Transaksi['NoTransaksi'] ?>" class="btn btn-sm btn-success text-white shadow-none tombol_tunggakan">
				<i class=" fa fa-check fa-fw" aria-hidden="true"></i>
			  </button>

            </td>
          </tr>
		  
		  <!-- MODAL Edit Pembyaran Selesai -->
          <div class="modal fade center tunggakan" id="selesai<?= $Transaksi['NoTransaksi']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header text-success text-center">
                  <h5 class="modal-title h5 w-100">SELESAIKAN TUNGGAKAN RENTAL</h5>
                </div>
                <!-- AWAL FORM -->
                <form action="<?= BASEURL; ?>/<?= $_SESSION['Login']['Role'] ?>/pesananSelesai" method="post" role="form">

                  <div class="modal-body px-5 grey lighten-5">

                    <div class="form-group">
                      <label for="NoTransaksi_Selesai">Kode Transaksi</label>
                      <input type="text" class="form-control" name="NoTransaksi_selesai" id="NoTransaksi_selesai" value="<?= $Transaksi['NoTransaksi'] ?>" readonly>
                    </div>

                    <input type="hidden" value="<?= $Transaksi['Id_Mobil'] ?>" name="Mobil">
                    <input type="hidden" value="<?= $Transaksi['Id_Sopir'] ?>" name="Sopir">

                    <div class="form-group">
                      <label for="Identitas_Selesai">Penyewa</label>
                      <input type="text" class="form-control" id="Identitas_selesai" value="<?= $Transaksi['Nama'] ?>" readonly>
                    </div>

                    <div class="form-group">
                      <label for="Mobil_selesai">Mobil</label>
                      <input type="text" class="form-control" id="Mobil_selesai" value="<?= '[ ' . $Transaksi['NoPlat'] . ' ] ' . $Transaksi['NmMerk'] . ' ' . $Transaksi['NmType'] ?>" readonly>
                    </div>

                    <div class="form-group">
                      <label for="Sopir_selesai">Sopir</label>
                      <input type="text" class="form-control" id="Sopir_selesai" value="<?= $Transaksi['NmSopir'] ?>" readonly>
                    </div>

                    <div class="form-group">
                      <label for="Tanggal_Pesan_selesai">Tanggal Pesan</label>
                      <input type="text" class="form-control datepicker" id="Tanggal_Pesan_selesai" disabled data-value="<?= $Transaksi['Tanggal_Pesan'] ?>">
                    </div>

                    <div class="form-group">
                      <label for="Tanggal_Pinjam_selesai">Tanggal Mulai Rental</label>
                      <input type="text" class="form-control datepicker" id="Tanggal_Pinjam_selesai" disabled data-value="<?= $Transaksi['Tanggal_Pinjam'] ?>">
                    </div>

                    <div class="form-group">
                      <label for="Tanggal_Kembali_selesai">Tanggal Selesai Rental</label>
                      <input type="text" class="form-control datepicker" id="Tanggal_Kembali_selesai" disabled name="Tanggal_Kembali_selesai" data-value="<?= $Transaksi['Tanggal_Kembali_Rencana'] ?>">
                    </div>

                    <div class="form-group">
                      <label for="LamaRental_selesai">Lama Rental</label>
                      <div class="input-group" style="width:100px">
                        <input type="text" class="form-control" id="LamaRental_selesai"  value="<?= $Transaksi['LamaRental'] ?>" readonly>
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
                      <label for="JatuhTempo">Terlambat</label>
                      <div class="input-group" style="width:100px">
                        <input type="text" class="form-control" name="JatuhTempo" value="<?= $Transaksi['LamaDenda'] ?>" id="JatuhTempo" readonly>
                        <div class="input-group-append">
                          <span class="input-group-text">Hari</span>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="Denda">Denda</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">Rp.</span>
                        </div>
                        <input type="text" class="form-control" name="Denda" id="Denda" value="<?= $Transaksi['Denda'] ?>" readonly>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="Kerusakan">Deskripsi Kerusakan</label>
                      <textarea class="form-control" id="Kerusakan" name="Kerusakan" value="<?= $Transaksi['Kerusakan'] ?>" readonly autocomplete="off"></textarea>
                    </div>

                    <div class="form-group">
                      <label for="BiayaKerusakan">Biaya Kerusakan</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">Rp.</span>
                        </div>
                        <input type="text" class="uang form-control" name="BiayaKerusakan" id="BiayaKerusakan" value="<?= $Transaksi['BiayaKerusakan'] ?>" autocomplete="off" readonly>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="BiayaBBM">Biaya BBM</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">Rp.</span>
                        </div>
                        <input type="text" class="uang form-control" name="BiayaBBM" id="BiayaBBM" value="<?= $Transaksi['BiayaBBM'] ?>" autocomplete="off" readonly>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="TarifMobilPerhari_selesai">Harga Sewa / Hari</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">Rp.</span>
                        </div>
                        <input type="text" class="uang form-control" id="TarifMobilPerhari_selesai" value="<?= $Transaksi['Mhrg_harian'] ?>" readonly>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="TarifSopirPerhari_selesai">Tarif Sopir / Hari</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">Rp.</span>
                        </div>
                        <input type="text" class="uang form-control" id="TarifSopirPerhari_selesai" readonly value="<?= $Transaksi['TarifPerhari'] ?>" readonly>
                      </div>
                    </div>

                    <div class="card border-success p-3 text-white mt-4">
                      <div class="form-group">
                        <label for="TotalBayar_selesai" class="text-success">Total Pembayaran</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Rp.</span>
                          </div>
						  <input type="text" class="uang totalBiaya biaya form-control" id="initotalx" name="TotalBayar_selesai" value="<?= $Transaksi['Total_Bayar']; ?>" readonly>
						<input type="text" class="status_bayar form-control" id="status_bayar" name="status_bayar" autocomplete="off" value="<?= $Transaksi['status_bayar']; ?>" readonly>
						</div>
                      </div>

                      <div class="form-group">
                        <label for="JumlahBayar" class="text-success">Sisa Tunggakan</label>
                        <div class="input-group">
						<input type="text" class="uang totalBiaya biaya form-control" id="Total_Tunggakan" name="Total_Tunggakan" value="<?= $Transaksi['sisa_bayar']; ?>" readonly>
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Rp.</span>
                          </div>
						  <input type="text" class="uang form-control" name="Jbayar" id="Jbayar" value="0" autocomplete="off">
                        </div>
						
						<input type="hidden" class="uang form-control" id="jmlx" value="<?= $Transaksi['Jumlah_Bayar']; ?>" autocomplete="off">
						<input type="hidden" class="uang form-control" name="JumlahBayar" id="JumlahBayar" autocomplete="off">
                      </div>

                      <div class="form-group">
                        <label for="Kembalian" class="text-success">Sisa Pembayaran</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Rp.</span>
                          </div>
                          <input type="text" class="uang form-control" name="Kembalian" id="Kembalian" value="0" readonly>
						</div>
						<input type="hidden" class="form-control" name="sisa_bayar" id="sisa_bayar" value="0" readonly>
                      </div>
                    </div>

                    <!-- AKHIR FORM -->
                  </div>
                  <div class="modal-footer text-center justify-content-center">
                    <button type="submit" class="btn btn-success shadow-none" id="#bayarki">Bayar</button>
                    <button type="button" class="btn btn-outline-success shadow-none" data-dismiss="modal">Tidak</button>
                  </div>

                </form>
              </div>
            </div>
          </div>
          <!-- /MODAL SELESAI -->


          <!-- MODAL DETAIL -->
          <div class="modal fade center" id="detail<?= $Transaksi['NoTransaksi'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header text-primary text-center">
                  <h5 class="modal-title h5 w-100">DETAIL TRANSAKSI</h5>
                </div>
                <div class="modal-body px-5 grey lighten-5">
                  <ul class="list-group list-group-flush">

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">No Transaksi</div>
                      <div class="col" style="font-weight:500"><?= $Transaksi['NoTransaksi'] ?></div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">No Induk Kependudukan</div>
                      <div class="col" style="font-weight:500"><?= $Transaksi['NIK'] ?></div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">Nama Pemesan</div>
                      <div class="col" style="font-weight:500"><?= $Transaksi['Nama'] ?></div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">Mobil</div>
                      <div class="col" style="font-weight:500">
                        <?= '[ '
                            . $Transaksi['NoPlat']
                            . ' ] '
                            . $Transaksi['NmMerk']
                            . ' '
                            . $Transaksi['NmType']
                          ?>
                      </div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">Sopir</div>
                      <div class="col" style="font-weight:500">
                        <?= $Transaksi['NmSopir'] ?>
                      </div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">Tanggal Pesan</div>
                      <div class="col" style="font-weight:500">
                        <?= $Transaksi['Tanggal_Pesan'] ?>
                      </div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">Tanggal Mulai</div>
                      <div class="col" style="font-weight:500">
                        <?= $Transaksi['Tanggal_Pinjam'] ?>
                      </div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">Tanggal Rencana Pengembalian</div>
                      <div class="col" style="font-weight:500">
                        <?= $Transaksi['Tanggal_Kembali_Rencana'] ?>
                      </div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">Lama Rental</div>
                      <div class="col" style="font-weight:500">
                        <?= $Transaksi['LamaRental'] ?> Hari
                      </div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">Tanggal Dikembalikan</div>
                      <div class="col" style="font-weight:500">
                        <?= $Transaksi['Tanggal_Kembali_Sebenarnya'] ?>
                      </div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">Lama Jatuh Tempo</div>
                      <div class="col" style="font-weight:500">
                        <?= $Transaksi['LamaDenda'] ?> Hari
                      </div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">Deskripsi Kerusakan</div>
                      <div class="col" style="font-weight:500">
                        <?= $Transaksi['Kerusakan'] ?>
                      </div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">Biaya Kerusakan</div>
                      <div class="col" style="font-weight:500">
                        Rp.
                        <span class="uang"><?= $Transaksi['BiayaKerusakan'] ?></span>
                        ,-
                      </div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">Biaya BBM</div>
                      <div class="col" style="font-weight:500">
                        Rp.
                        <span class="uang"><?= $Transaksi['BiayaBBM'] ?></span>
                        ,-
                      </div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">Denda Jatuh Tempo</div>
                      <div class="col" style="font-weight:500">
                        Rp.
                        <span class="uang"><?= $Transaksi['Denda'] ?></span>
                        ,-
                      </div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">Tarif Sopir / Hari</div>
                      <div class="col" style="font-weight:500">
                        Rp.
                        <span class="uang"><?= $Transaksi['TarifPerhari'] ?></span>
                        ,-
                      </div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">Harga Sewa Mobil / Hari</div>
                      <div class="col" style="font-weight:500">
                        Rp.
                        <span class="uang"><?= $Transaksi['HargaSewa'] ?></span>
                        ,-
                      </div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">Total Bayar</div>
                      <div class="col red-text" style="font-weight:500">
                        Rp.
                        <span class="uang"><?= $Transaksi['Total_Bayar'] ?></span>
                        ,-
                      </div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">Jumlah Bayar</div>
                      <div class="col text-success" style="font-weight:500">
                        Rp.
                        <span class="uang"><?= $Transaksi['Jumlah_Bayar'] ?></span>
                        ,-
                      </div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">Kembalian</div>
                      <div class="col text-danger" style="font-weight:500">
                        Rp.
                        <span class="uang"><?= $Transaksi['Kembalian'] ?></span>
                        ,-
                      </div>
                    </div>

                  </ul>
                </div>
                <div class="modal-footer text-center justify-content-center">
                </div>
              </div>
            </div>
          </div>
          <!-- / MODAL DETAIL -->

        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>