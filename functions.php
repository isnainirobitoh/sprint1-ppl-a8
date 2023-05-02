<?php
// koneksi ke database
$conn = mysqli_connect("localhost","root","","phpdasar"); 

function query ($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data) {
    global $conn;
    // ambil data dari tiap elemen dalam form
     $nama = htmlspecialchars($data["nama"]);
     $email= htmlspecialchars($data["email"]);

     // query insert data
    $query = "INSERT INTO admin VALUES('', '$nama','$email')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM admin WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function ubah($data) {
    global $conn;
    $id = $data["id"];
    // ambil data dari tiap elemen dalam form
    $nama = htmlspecialchars($data["nama"]);
    $email= htmlspecialchars($data["email"]);

     // query insert data
    $query = "UPDATE admin SET 
                nama = '$nama', 
                email = '$email' 
            WHERE id = $id
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function registrasi($data) {
    global $conn;
    
    $namalengkap = htmlspecialchars($data["namalengkap"]);
    $tanggallahir = $data["tanggallahir"];
    $email= htmlspecialchars($data["email"]);
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek email sudah ada atau belum
    $result = mysqli_query($conn, "SELECT email FROM customer WHERE email = '$email' ");
    if( mysqli_fetch_assoc($result) > 0 ) {
        echo "
        <script type='text/javascript'>
            alert('Data sudah pernah digunakan!');
            window.history.back();
        </script>
        ";
        return false;
    } else {
        echo "
        <script type='text/javascript'>
            alert('Berhasil mendaftar!');
            window.location='dashboardC.php';
        </script>
        ";
    }

    //cek konfirmasi password
    if( $password !== $password2 ) {
        echo "
        <script>
            alert('Password dan Konfirmasi Password Harus Sama');
        </script>
        ";
        return false;
    }
    
    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan user ke database
    //mysqli_query($conn, "INSERT INTO customer VALUES('', '$namalengkap', '$tanggallahir', '$email', '$password')");

    $query = "INSERT INTO customer VALUES('', '$namalengkap', '$tanggallahir', '$email', '$password')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function registrasimitra($data) {
    global $conn;
    
    $namapemilikusaha = htmlspecialchars($data["namapemilikusaha"]);
    $tanggallahir = $data["tanggallahir"];
    $namausaha = htmlspecialchars($data["namausaha"]);
    $deskripsiusaha = htmlspecialchars($data["deskripsiusaha"]);
    $alamatusaha = htmlspecialchars($data["alamatusaha"]);
    $kota = htmlspecialchars($data["kota"]);
    $provinsi = htmlspecialchars($data["provinsi"]);
    $nomortelepon = htmlspecialchars($data["nomortelepon"]);
    $namabank = htmlspecialchars($data["namabank"]);
    $nomorrekening = htmlspecialchars($data["nomorrekening"]);
    $gambarusaha = $_FILES["gambarusaha"];
    $email= htmlspecialchars($data["email"]);
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    $file_tmp = $gambarusaha['tmp_name'];
    $file_name = $gambarusaha['name'];
    $file_dest = 'file/'.$file_name;
    move_uploaded_file($file_tmp, $file_dest);

    // cek email sudah ada atau belum
    $result = mysqli_query($conn, "SELECT email FROM mitra WHERE email = '$email' ");
    if( mysqli_fetch_assoc($result) > 0) {
        echo "
        <script type='text/javascript'>
            alert('Data sudah pernah digunakan!');
            window.history.back();
        </script>
        ";
        return false;
    } else{
        echo "
        <script type='text/javascript'>
            alert('Berhasil mendaftar!');
            window.location='dashboardM.php';
        </script>
        ";
    }

    //cek konfirmasi password
    if( $password !== $password2 ) {
        echo "
        <script>
            alert('Password dan Konfirmasi Password Harus Sama');
        </script>
        ";
        return false;
    }
    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);
    
    // tambahkan user ke database
    $query = "INSERT INTO mitra VALUES('', '$namapemilikusaha', '$tanggallahir', '$namausaha', '$deskripsiusaha', '$alamatusaha', '$kota', '$provinsi',
                '$nomortelepon', '$namabank', '$nomorrekening', '$file_dest', '$email', '$password')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}



?>