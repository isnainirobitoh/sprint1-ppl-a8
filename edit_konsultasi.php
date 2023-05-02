<?php
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
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

function konsultasi($data){
    global $conn;
    $umur = $data['umur'];    
    $beratbadan = $data['beratbadan'];
    $tinggibadan = $data['tinggibadan'];
    $jeniskelamin = $data['jeniskelamin'];

    $query = "INSERT INTO konsultasi VALUES ('','$umur','$beratbadan','$tinggibadan', '$jeniskelamin')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);

}

if (isset($_POST['submit'])) {
    if (konsultasi($_POST) > 0) {
    // Redirect ke halaman output
    echo" <script type='text/javascript'>
        alert('Data Berhasil Disimpan!');
        window.location='hasilkonsultasi.php';
        </script>";
    //header('Location: hasilkonsultasi.php');
    exit();
    }
}

session_start();

if( !isset($_SESSION["login"]) ) {
    header("Location: loginCverif.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konsultasi</title>
    <link rel="stylesheet" type="text/css" href="stylekonsul.css">

    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.0.0/fonts/remixicon.css" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">

    <style>
        .deskripsi{
            text-align: left;
            font-size: 11px;
            margin-bottom: 15px;
            padding-left: 3%;
            padding-right: 10%;
            color: blue;
            font-style: italic;
        }
    </style>

</head>
<body style="background-color:#72a088;">
<div class="container">

    <div class="navbar">
        <a href="#" class="logo"><i class="ri-home-heart-fill"></i><span>COD.tly</span></a>
        <nav>
            <ul>
                <li><a href="dashboardC.php">BERANDA</a></li>
                <li><a href="diet.php">DIET</a></li>
                <li><a href="artikel.php">ARTIKEL</a></li>
                <li><a href="#">MARKETPLACE</a></li>
                <li><a href="#" class="notif"><i class="ri-notification-3-fill"></i></a></li>
                <li><a href="profil.php" class="user"><i class="ri-user-3-fill"></i></a></li>
                <li><a href="logout.php">LOGOUT<i class="ri-logout-box-r-fill"></i></a></li>
            </ul>
        </nav>
    </div>

    <div id="header">
        <h1>COD.tly Konsultasi</h1>
    </div>


    <form action="" method="post">
        <fieldset>
        <div class="deskripsi">
        <p>Harap isi data di bawah ini!</p>
        <p>Sistem akan menampilkan: Berat Badan Ideal, Minimum Jumlah Kalori, Maximum Jumlah Kalori, dan Normal Jumlah Kalori yang Dikonsumsi/hari</p>
        <p>Sistem Juga Akan Menampilkan Logbook Diet Plan yang Memudahkan Dalam Program Diet Anda!</p>
        </div>
        <div class="form-grup">
            <div class="label">
                <label for="umur">UMUR</label>
            </div>
            <div class="input">
                <input type="number" name="umur" placeholder="Masukkan Umur Anda" id="umur" min="1" max="100" required/>
            </div>
        </div>
        <div class="form-grup">
            <div class="label">
                <label for="beratbadan">BERAT BADAN</label>
            </div>
            <div class="input">
                <input type="number" name="beratbadan" placeholder="Masukkan Berat Badan Anda" id="beratbadan" min="1" max="200" required/>
            </div>
        </div>
        <div class="form-grup">
            <div class="label">
                <label for="tinggibadan">TINGGI BADAN</label>
            </div>
            <div class="input">
                <input type="number" name="tinggibadan" placeholder="Masukkan Tinggi Badan Anda" id="tinggibadan" min="1" max="250" required/>
            </div>
        </div>
        <div class="form-grup">
            <div class="label">
                <p>JENIS KELAMIN</p>
            </div>
            <div class="input">
                <input type="radio" name="jeniskelamin" id="Laki-laki" value="Laki-laki"/>
                <label for="Laki-laki">Laki-laki</label><br>
                <input type="radio" name="jeniskelamin" id="Perempuan" value="Perempuan"/>
                <label for="Perempuan">Perempuan</label>
            </div>
        </div>
        <div class="form-grup">
            <button type="submit" name="submit">Kirim</button>
        </div>
        </fieldset>
    </form>
    
</div>
    

</body>
</html>