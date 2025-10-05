<?php
// Inisialisasi variabel
$nama = $email = $nim = $jurusan = $alasan = "";
$namaErr = $emailErr = $nimErr = $jurusanErr = $alasanErr = "";
$isValid = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ********************** 1  **************************
    // Tangkap nilai nama dari form
    if (empty($_POST["nama"])) {
        $namaErr = "Nama wajib diisi";
        $isValid = false;
    } else {
        $nama = htmlspecialchars($_POST["nama"]);
    }

    // ********************** 2  **************************
    // Tangkap nilai email dari form dan validasi
    if (empty($_POST["email"])) {
        $emailErr = "Email wajib diisi";
        $isValid = false;
    } else {
        $email = htmlspecialchars($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Format email tidak valid";
            $isValid = false;
        }
    }

    // ********************** 3  **************************
    // Tangkap nilai NIM dari form dan validasi
    if (empty($_POST["nim"])) {
        $nimErr = "NIM wajib diisi";
        $isValid = false;
    } else {
        $nim = htmlspecialchars($_POST["nim"]);
        if (!ctype_digit($nim)) {
            $nimErr = "NIM hanya boleh berisi angka";
            $isValid = false;
        }
    }

    // ********************** 4  **************************
    // Tangkap nilai jurusan (dropdown)
    if (empty($_POST["jurusan"])) {
        $jurusanErr = "Jurusan wajib dipilih";
        $isValid = false;
    } else {
        $jurusan = htmlspecialchars($_POST["jurusan"]);
    }

    // ********************** 5  **************************
    // Tangkap nilai alasan (textarea)
    if (empty($_POST["alasan"])) {
        $alasanErr = "Alasan wajib diisi";
        $isValid = false;
    } else {
        $alasan = htmlspecialchars($_POST["alasan"]);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Form Pendaftaran Keanggotaan Lab - EAD Laboratory</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="form-container">
  <img src="EAD.png" alt="Logo EAD" class="logo">
  <h2>Form Pendaftaran Keanggotaan Lab - EAD Laboratory</h2>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label>Nama:</label>
    <input type="text" name="nama" value="<?php echo $nama; ?>">
    <span class="error"><?php echo $namaErr; ?></span>

    <label>Email:</label>
    <input type="text" name="email" value="<?php echo $email; ?>">
    <span class="error"><?php echo $emailErr; ?></span>

    <label>NIM:</label>
    <input type="text" name="nim" value="<?php echo $nim; ?>">
    <span class="error"><?php echo $nimErr; ?></span>

    <label>Jurusan:</label>
    <select name="jurusan">
      <option value="">-- Pilih Jurusan --</option>
      <option value="Sistem Informasi" <?php if ($jurusan == "Sistem Informasi") echo "selected"; ?>>Sistem Informasi</option>
      <option value="Informatika" <?php if ($jurusan == "Informatika") echo "selected"; ?>>Informatika</option>
      <option value="Teknik Industri" <?php if ($jurusan == "Teknik Industri") echo "selected"; ?>>Teknik Industri</option>
    </select>
    <span class="error"><?php echo $jurusanErr; ?></span>

    <label>Alasan Bergabung:</label>
    <textarea name="alasan"><?php echo $alasan; ?></textarea>
    <span class="error"><?php echo $alasanErr; ?></span>

    <button type="submit">Daftar</button>
  </form>

  <?php
  // ********************** 6  **************************
  // Tampilkan hasil input dalam tabel + logo di atasnya jika semua valid
  if ($_SERVER["REQUEST_METHOD"] == "POST" && $isValid) {
      echo '<div class="output">';
      echo '<img src="EAD.png" alt="Logo EAD" class="logo">';
      echo '<h3>Data Pendaftaran Berhasil</h3>';
      echo '<table>';
      echo '<tr><td><strong>Nama:</strong></td><td>' . $nama . '</td></tr>';
      echo '<tr><td><strong>Email:</strong></td><td>' . $email . '</td></tr>';
      echo '<tr><td><strong>NIM:</strong></td><td>' . $nim . '</td></tr>';
      echo '<tr><td><strong>Jurusan:</strong></td><td>' . $jurusan . '</td></tr>';
      echo '<tr><td><strong>Alasan:</strong></td><td>' . nl2br($alasan) . '</td></tr>';
      echo '</table>';
      echo '</div>';
  }
  ?>
</div>
</body>
</html>