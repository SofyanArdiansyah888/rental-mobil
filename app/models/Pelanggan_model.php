<?php

class Pelanggan_model
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }
  public function getAllPelanggan()
  {
    $this->db->query("SELECT * FROM users WHERE roleId = 3 AND IsActive = 1 ORDER BY id DESC");
    return $this->db->resultSet();
  }
  
  
public function tambahDataPelanggan($data)
{
    $NoTelp = preg_replace('/\D/', '', $data['NoTelp']);
    $NoTelpKerabat = preg_replace('/\D/', '', $data['NoTelpKerabat']);

    // Tentukan direktori untuk menyimpan file
    $targetDir = "uploads/ktp/";

    // Buat direktori jika belum ada
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true); // Parameter kedua adalah mode (izin), 0777 memberikan izin penuh untuk pengguna, grup, dan lainnya
    }

    // Inisialisasi variabel $fotoKTP dengan nilai default jika tidak ada file yang diunggah
    $fotoKTP = "defaultktp.jpg";

    // Jika ada file gambar yang dipilih
    if ($_FILES["FotoKTP"]["name"]) {
        // Mengunggah file gambar KTP
        $targetFile = $targetDir . basename($_FILES["FotoKTP"]["name"]);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check apakah file gambar valid
        $check = getimagesize($_FILES["FotoKTP"]["tmp_name"]);
        if ($check === false) {
            echo "File is not an image.";
            return; // Keluar dari fungsi jika file bukan gambar
        }

        // Check ukuran file
        if ($_FILES["FotoKTP"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            return; // Keluar dari fungsi jika file terlalu besar
        }

        // Izinkan hanya beberapa format file tertentu
        $allowedExtensions = array("jpg", "jpeg", "png", "gif");
        if (!in_array($imageFileType, $allowedExtensions)) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            return; // Keluar dari fungsi jika format file tidak diizinkan
        }

        // Coba mengunggah file
        if (!move_uploaded_file($_FILES["FotoKTP"]["tmp_name"], $targetFile)) {
            echo "Sorry, there was an error uploading your file.";
            return; // Keluar dari fungsi jika gagal mengunggah file
        }

        // Set nama file gambar KTP dalam variabel $fotoKTP jika proses upload berhasil
        $fotoKTP = basename($_FILES["FotoKTP"]["name"]);
    }

    // Set query untuk menyimpan data pelanggan beserta nama file gambar KTP
    $query = 'INSERT INTO users VALUES("", :NIK, :FotoKTP, :Nama, :NamaUser, :Password, :ttl, :JenisKelamin, :Alamat, :NoTelp, :NoTelpKerabat, :pekerjaan, :Foto, :roleId, :isActive)';

    $this->db->query($query);

    // Lakukan binding data
    $password = $data['Password'];
    $password = password_hash($password, PASSWORD_DEFAULT);

    $this->db->bind('NIK', $data['NIK']);
    $this->db->bind('FotoKTP', $fotoKTP); // Bind nama file gambar KTP
    $this->db->bind('Nama', $data['Nama']);
    $this->db->bind('NamaUser', $data['NamaUser']);
    $this->db->bind('Password', $password);
    $this->db->bind('ttl', $data['ttl']);
    $this->db->bind('JenisKelamin', $data['JenisKelamin']);
    $this->db->bind('Alamat', $data['Alamat']);
    $this->db->bind('NoTelp', $NoTelp);
    $this->db->bind('NoTelpKerabat', $NoTelpKerabat);
    $this->db->bind('pekerjaan', $data['pekerjaan']);
    $this->db->bind('Foto', $data['Foto']);
    $this->db->bind('roleId', 3);
    $this->db->bind('isActive', 1);

    $this->db->execute();
    return $this->db->rowCount();
}




  public function editDataPelanggan($data)
  {
    if ($data['Password'] == '') {
      $NoTelp = preg_replace('/\D/', '', $data['NoTelp']);
	  $NoTelpKerabat = preg_replace('/\D/', '', $data['NoTelpKerabat']);

      $query = "UPDATE users SET 
              NIK = :NIK,
              Nama = :Nama,
			  ttl = :ttl,
              NamaUser = :NamaUser, 
              JenisKelamin = :JenisKelamin, 
              Alamat = :Alamat,
              NoTelp = :NoTelp,
			  NoTelpKerabat = :NoTelpKerabat
			  pekerjaan = :pekerjaan
              WHERE id = :id";

      $this->db->query($query);

      $this->db->bind('NIK', $data['NIK']);
      $this->db->bind('Nama', $data['Nama']);
	  $this->db->bind('ttl', $data['ttl']);
      $this->db->bind('NamaUser', $data['NamaUser']);
      $this->db->bind('JenisKelamin', $data['JenisKelamin']);
      $this->db->bind('Alamat', $data['Alamat']);
      $this->db->bind('NoTelp', $NoTelp);
	  $this->db->bind('NoTelpKerabat', $NoTelpKerabat);
	  $this->db->bind('pekerjaan', $data['pekerjaan']);
      $this->db->bind('id', $data['id']);

      $this->db->execute();
      return $this->db->rowCount();
    } else {
      $NoTelp = preg_replace('/\D/', '', $data['NoTelp']);
	  $NoTelpKerabat = preg_replace('/\D/', '', $data['NoTelpKerabat']);

      $query = "UPDATE users SET 
              NIK = :NIK,
              Nama = :Nama,
			  ttl = :ttl,
              NamaUser = :NamaUser, 
              Password = :Password,
              JenisKelamin = :JenisKelamin, 
              Alamat = :Alamat,
              NoTelp = :NoTelp,
			  NoTelpKerabat = :NoTelpKerabat
              WHERE id = :id";

      $this->db->query($query);

      $password = $data['Password'];
      $password = password_hash($password, PASSWORD_DEFAULT);

      $this->db->bind('NIK', $data['NIK']);
      $this->db->bind('Nama', $data['Nama']);
	  $this->db->bind('ttl', $data['ttl']);
      $this->db->bind('NamaUser', $data['NamaUser']);
      $this->db->bind('Password', $password);
      $this->db->bind('JenisKelamin', $data['JenisKelamin']);
      $this->db->bind('Alamat', $data['Alamat']);
      $this->db->bind('NoTelp', $NoTelp);
	  $this->db->bind('NoTelpKerabat', $NoTelpKerabat);
	  $this->db->bind('pekerjaan', $data['pekerjaan']);
      $this->db->bind('id', $data['id']);

      $this->db->execute();
      return $this->db->rowCount();
    }
  }
  public function hapusDataPelanggan($id)
  {
    $query = 'DELETE FROM users WHERE id = :id';
    $this->db->query($query);
    $this->db->bind('id', $id);

    $this->db->execute();

    return $this->db->rowCount();
  }
}
