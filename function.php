<?php 
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "db_restoran");

if (mysqli_connect_errno()) {
	echo "Koneksi Database Gagal :" . mysqli_connect_errno();
}


function query($query ) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;

	}


function cari($keyword) {
	$query = "SELECT * FROM masakan WHERE nama_masakan LIKE '%$keyword%'";
	return query($query);
}

function tambahmenu ($data) {
	global $conn;	
	$nama_masakan = htmlspecialchars($data["nama_masakan"]);
	$harga = htmlspecialchars($data["harga"]);
	$status = htmlspecialchars($data["status"]);
	$kategori = htmlspecialchars($data["kategori"]);
	$gambar = upload();
		if(!$gambar) {
			return false;
		}
	$query = "INSERT INTO masakan VALUES 
 		 ('', '$gambar', '$nama_masakan', '$harga','$status', '$kategori')";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

function updatemenu($data) {
	global $conn;

	$id = $data["id"];
	$nama_masakan = htmlspecialchars($data["nama_masakan"]);
	$harga = htmlspecialchars($data["harga"]);
	$status = htmlspecialchars($data["status"]);
	$kategori = htmlspecialchars($data["kategori"]);
	$gambarlama = htmlspecialchars($data["gambarlama"]);

// cek apakah user pilih gambar atau tidak 
	if ($_FILES['foto']['error'] === 4) {
		$gambar = $gambarlama;
	} else {
		$gambar = upload();
	}
	$query = "UPDATE masakan SET
				gambar = '$gambar',
				nama_masakan = '$nama_masakan',
				harga = '$harga',
				status_masakan = '$status',
				kategori = '$kategori'
			WHERE id_masakan = $id
				";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function updateuser($data) {
	global $conn;

	$id = $data["id_user"];
	$username = htmlspecialchars($data["username"]);
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$namaLengkap = htmlspecialchars($data["namaLengkap"]);

	// enkripsi pasword
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambahkan userbaru ke database
	mysqli_query($conn, "UPDATE user SET
						username = '$username',
						password = '$password',
						nama_user = '$namaLengkap'
						WHERE id_user = $id
						");

	return mysqli_affected_rows($conn);
}


function upload() {
	$namafile = $_FILES['foto']['name'];
	$ukuranfile = $_FILES['foto']['size'];
	$error = $_FILES['foto']['error'];
	$tmpname = $_FILES ['foto']['tmp_name'];
	// cek apakah tidak ada gambar yang diupload
	if($error === 4 ) {
		echo "<script>
				alert ('Pilih Gambar Terlebih Dahulu!!!');
			 </script>";
			return false;
	}
	//cek apakah yang diupload adalah gambar
	$ekstensigambarvalid = ['jpg','jpeg','png'];
	$ekstensigambar = explode('.', $namafile);
	$ekstensigambar = strtolower (end($ekstensigambar) );
	if( !in_array($ekstensigambar, $ekstensigambarvalid)) {
		echo "<script>
				alert ('Yang Anda Upload Bukan Gambar!!!');
			 </script>";
			return false;
	}
	// cek jika ukurannya terlalu besar 
	if($ukuranfile > 5000000) {
		echo "<script>
				alert ('Ukuran Gambar Terlalu Besar!!!');
			 </script>";
			return false;
	}

	// lolos pengecekan, gambar siap diupload
	// generate nama gambar baru
	$namafilebaru = uniqid();
	$namafilebaru .= '.';
	$namafilebaru .= $ekstensigambar;

	move_uploaded_file($tmpname, 'img/' . $namafilebaru);
	return $namafilebaru; 
}

function registrasi($data) {
	global $conn;

	$username =strtolower(stripcslashes($data["username"]) );
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);
	$namaLengkap =strtolower(stripcslashes($data["namaLengkap"]) );
	$id_level =strtolower(stripcslashes($data["id_level"]) );

	// cek username sudah ada atau belum
	$result = mysqli_query($conn, "SELECT username FROM user WHERE
		username = '$username'");
	if(mysqli_fetch_assoc($result) ) {
		echo "<script>
					alert('Username Sudah Terdaftar!!!')
				</script>";
	return false;
	}
	// cel\k konfirmasi password
	if ($password != $password2 ) {
		echo "<script>
				alert('Konfirmasi Password Tidak Sesuai');
			</script>";
	return false;
	}

	// enkripsi pasword
	$password = password_hash($password, PASSWORD_DEFAULT);
	// tambahkan userbaru ke database
	mysqli_query($conn, "INSERT INTO user VALUES
		('','$username','$password', '$namaLengkap', '$id_level') ");

	return mysqli_affected_rows($conn);
}

function hapusmenu($id) {
	global $conn;
	mysqli_query($conn,"DELETE FROM masakan WHERE id_masakan=$id");

	return mysqli_affected_rows($conn);
}
function hapususer($id) {
	global $conn;
	mysqli_query($conn,"DELETE FROM user WHERE id_user=$id");

	return mysqli_affected_rows($conn);
}
function hapuskeranjang($id) {
	global $conn;
	mysqli_query($conn,"DELETE FROM keranjang WHERE id_keranjang=$id");

	return mysqli_affected_rows($conn);
}

 ?>
