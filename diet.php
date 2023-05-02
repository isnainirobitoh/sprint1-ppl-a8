<?php

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
    <title>DIET</title>
    <link rel="stylesheet" href="stylediet.css">
    
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.0.0/fonts/remixicon.css" rel="stylesheet">

    <link rel="stylesheet"
    href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
</head>
<body>
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
        <div class="row">
            <div class="col left">
                <h1>DIET</h1>
                <p>Membantu anda dalam menjalani diet dengan memperhatikan kalori dan dapatkan rekomendasi makanan sehat dan olahraga.  
                </p>
                <button type="button"><a href="konsultasi.php">Konsultasi</a></button>
            </div>
            <div class="col right">
                <div class="card">
                </div>
            </div>
        </div>
    </div>
</body>
</html>