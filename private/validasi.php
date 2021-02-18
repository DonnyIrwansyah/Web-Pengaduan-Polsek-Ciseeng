<?php
	session_start();
	require_once("database.php");
	header("Location: ../index?status=success");
	// Atasi Undefined
	$nama = $email = $telepon = $alamat = $pengaduan = $captcha = $is_valid = "";
	$namaError = $emailError = $teleponError = $alamatError = $pengaduanError = $captchaError = "";

    if (isset($_POST['submit'])){
        $nomor     = $_POST['nomor'];
        $nama      = $_POST['nama'];
        $email     = $_POST['email'];
        $telepon    = $_POST['telepon'];
        $alamat    = $_POST['alamat'];
        $tujuan    = $_POST['tujuan'];
        $pengaduan = $_POST['pengaduan'];
        $captcha   = $_POST['captcha'];
        $is_valid  = true;
        validate_input();

        if ($is_valid) {
			$sql = "INSERT INTO `laporan` (`id`, `nama`, `email`, `telepon`, `alamat`, `tujuan`, `isi`, `tanggal`, `status`) VALUES (:nomor, :nama, :email, :telepon, :alamat, :tujuan, :isi, CURRENT_TIMESTAMP, :status)";
			$stmt = $db->prepare($sql);
			$stmt->bindValue(':nomor', $nomor);
			$stmt->bindValue(':nama', $nama);
			$stmt->bindValue(':email', $email);
			$stmt->bindValue(':telepon', $telepon);
			$stmt->bindValue(':alamat', htmlspecialchars($alamat));
			$stmt->bindValue(':tujuan', $tujuan);
			$stmt->bindValue(':isi', htmlspecialchars($pengaduan));
			$stmt->bindValue(':status', "Menunggu");

			$stmt->execute();
			header("Location: ../index?status=success");
        } elseif (!$is_valid) {
            header("Location: ../lapor.php?nomor=$nomor&nama=$nama&namaError=$namaError&email=$email&emailError=$emailError&telepon=$telepon&teleponError=$teleponError&alamat=$alamat&alamatError=$alamatError&pengaduan=$pengaduan&pengaduanError=$pengaduanError&captcha=$captcha&captchaError=$captchaError");
        }
    }

    // Fungsi Untuk Melakukan Pengecekan Dari Setiap Inputan Di Masing - masing Fungsi
    function validate_input() {
        global $nama , $email , $telepon , $alamat , $pengaduan , $captcha , $is_valid;
        cek_nama($nama);
        cek_email($email);
        cek_telepon($telepon);
        cek_alamat($alamat);
		cek_pengaduan($pengaduan);
        cek_captcha($captcha);
    }

    // validasi nama
    function cek_nama ($nama) {
        global $nama, $is_valid, $namaError;
        echo "cek_nama      : ", $nama      , "<br>";
        if (!preg_match("/^[a-zA-Z ]*$/",$nama)) { // cek nama bukan huruf
            $namaError = "Nama Hanya Boleh Huruf dan Spasi";
            $is_valid = false;
        } else { // jika nama valid kosongkan error
            $namaError = "";
        }
    }

    // validasi email
    function cek_email($email) {
        global $email, $is_valid, $emailError;
        echo "cek_email     : ", $email     , "<br>";
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { // cek format email
            $emailError = "Email Tidak Valid";
            $is_valid = false;
        } else { // jika email valid kosongkan eror
            $emailError = "";
        }
    }

    // validasi telepon
    function cek_telepon($telepon) {
        global $telepon, $teleponError, $is_valid;
        echo "cek_telepon    : ", $telepon    , "<br>";
        if (!preg_match("/^[0-9]*$/",$telepon)) { // cek telepon hanya boleh angka
            $teleponError = "Telepon Hanya Boleh Angka";
            $is_valid = false;
        } elseif (strlen($telepon) != 12) { // cek panjang telepon harus >= 6
            $teleponError = "Panjang Telepon Harus 12 Digit";
            $is_valid = false;
        } else { // jika telepon valid kosongkan error
            $teleponError = "";
        }
    }

    // validasi alamat
    function cek_alamat($alamat) {
        global $alamat, $is_valid, $alamatError;
        echo "cek_alamat    : ", $alamat    , "<br>";
        if (strlen($alamat) > 2048){
            $alamatError = "Alamat Tidak Boleh Huruf Lebih Dari 2048 Karakter";
            $is_valid = false;
        } else { // jika fullname valid kosongkan error
            $alamatError = "";
        }
    }

    // validasi pengaduan
    function cek_pengaduan($pengaduan) {
        global $pengaduan, $is_valid, $pengaduanError;
        echo "cek_pengaduan : ", $pengaduan , "<br>";
        if (strlen($pengaduan) > 2048) { // cek fullname bukan huruf
            $pengaduanError = "Isi Pengaduan Tidak Boleh Huruf Lebih Dari 2048 Karakter";
            $is_valid = false;
        } else { // jika pengaduan valid kosongkan error
            $pengaduanError = "";
        }
    }

    // validasi captcha
    function cek_captcha($captcha) {
        global $captcha, $is_valid, $captchaError;
        echo "cek_captcha   : ", $captcha   , "<br>";
        if ($captcha != $_SESSION['bilangan']) { // cek fullname bukan huruf
            $captchaError = "Captcha Salah atau Silahkan Reload Browser Anda";
            $is_valid = false;
        } else { // jika pengaduan valid kosongkan error
            $captchaError = "";
        }
    }
?>
