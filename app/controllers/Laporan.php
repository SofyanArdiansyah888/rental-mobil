<?php
// Memuat autoloader Composer
require_once '../vendor/autoload.php';

// Menggunakan kelas atau fungsi Dompdf
use Dompdf\Dompdf;

class Laporan extends Controller
{
    private $db;

    public function __construct()
    {
        $this->db = new Database; // Membuat instance Database

        $this->laporan = $this->model('Laporan_model');
    }

    public function index()
    {
        $data['judul'] = 'Laporan';

        // Memuat tampilan menggunakan metode bawaan dari framework
        $this->view('templates/header', $data);
        $this->view('templates/navlaporan', $data);
        $this->view('laporan/index');
        $this->view('templates/footer');
    }
  
    public function transaksi()
    {
        $data['judul'] = 'Laporan Transaksi';

        $data['laporanTransaksi'] = $this->laporan->getLaporanTransaksi();

        $this->view('templates/header', $data);
        $this->view('templates/navlaporan', $data);
        $this->view('laporan/head_laporan');
        $this->view('laporan/laporan_transaksi', $data);
        $this->view('templates/footer');
    }
  
    public function arsip_transaksi()
    {
        $data['judul'] = 'Laporan Arsip Transaksi';

        $data['laporanArsipTransaksi'] = $this->laporan->getLaporanArsipTransaksi();

        $this->view('templates/header', $data);
        $this->view('templates/navlaporan', $data);
        $this->view('laporan/head_laporan');
        $this->view('laporan/laporan_arsip_transaksi', $data);
        $this->view('templates/footer');
    }
  
    public function kendaraan()
    {
        $data['judul'] = 'Laporan Kendaraan';

        $data['laporanKendaraan'] = $this->laporan->getLaporanKendaraan();

        $this->view('templates/header', $data);
        $this->view('templates/navlaporan', $data);
        $this->view('laporan/head_laporan');
        $this->view('laporan/laporan_kendaraan', $data);
        $this->view('templates/footer');
    }
  
    public function sopir()
    {
        $data['judul'] = 'Laporan Sopir';

        $data['laporanSopir'] = $this->laporan->getLaporanSopir();

        $this->view('templates/header', $data);
        $this->view('templates/navlaporan', $data);
        $this->view('laporan/head_laporan');
        $this->view('laporan/laporan_sopir', $data);
        $this->view('templates/footer');
    }
  
    public function karyawan()
    {
        $data['judul'] = 'Laporan Karyawan';

        $data['laporanKaryawan'] = $this->laporan->getLaporanKaryawan();

        $this->view('templates/header', $data);
        $this->view('templates/navlaporan', $data);
        $this->view('laporan/head_laporan');
        $this->view('laporan/laporan_karyawan', $data);
        $this->view('templates/footer');
    }
  
    public function pelanggan()
    {
        $data['judul'] = 'Laporan Pelanggan';

        $data['laporanPelanggan'] = $this->laporan->getLaporanPelanggan();

        $this->view('templates/header', $data);
        $this->view('templates/navlaporan', $data);
        $this->view('laporan/head_laporan');
        $this->view('laporan/laporan_pelanggan', $data);
        $this->view('templates/footer');
    }

    public function kwitansi($NoTransaksi)
    {
        $data['judul'] = 'Laporan Kwitansi - ' . $NoTransaksi;
        $data['NoTransaksi'] = $NoTransaksi; // Mengirimkan NoTransaksi ke view

        $data['laporanKwitansi'] = $this->laporan->getLaporanKwitansiById($NoTransaksi);

        // Memuat tampilan menggunakan metode bawaan dari framework
        $this->view('templates/header', $data);
        $this->view('templates/navlaporan', $data);
        $this->view('laporan/head_kwitansi');
        $this->view('laporan/laporan_kwitansi', $data);
        $this->view('templates/footer');
    }

    public function kwitansi_pdf($NoTransaksi)
{
    // Panggil model untuk mendapatkan data laporan kwitansi
    $laporanKwitansi = $this->laporan->getLaporanKwitansiById($NoTransaksi);
    $data['judul'] = 'Laporan Kwitansi - ' . $NoTransaksi;
    // Load view laporan kwitansi dengan data yang diperlukan
    $data['NoTransaksi'] = $NoTransaksi; // Mengirimkan NoTransaksi ke view
    $data['laporanKwitansi'] = $laporanKwitansi;
	//$this->view('templates/header', $data);
    $html = $this->view('laporan/laporan_kwitansi_pdf', $data, true);
	//$this->view('templates/footer');

    // Inisialisasi Dompdf
    $dompdf = new Dompdf();

    // Muat konten HTML ke Dompdf
    $dompdf->loadHtml($html);

    // Atur ukuran kertas dan orientasi
    $dompdf->setPaper('A4', 'portrait');

    // Render PDF (generate)
    $dompdf->render();

    //Simpan PDF dengan nama berdasarkan nomor transaksi
    $pdfOutput = $dompdf->output();
    $fileName = $NoTransaksi . '_laporan_kwitansi.pdf'; // Nama file berdasarkan nomor transaksi
    //$filePath = 'path/to/save/' . $fileName; // Path lengkap ke file
    //file_put_contents($filePath, $pdfOutput);

    // Tampilkan pesan bahwa file PDF berhasil disimpan
   // echo "File PDF berhasil disimpan di: $filePath";
}

}
