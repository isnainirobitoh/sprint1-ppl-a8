<?php
require 'koneksi.php';

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
    <title>My Profil</title>
    <link rel="stylesheet" type="text/css" href="styledashboard.css">

    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.0.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet"href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">

    <style>
        *{
            text-decoration: none;
        }
        .header-profil{
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 5%;
            margin-bottom: 2%;
        }
        .pcss{
            color:black;
            font-size: 14px;
            text-align: justify;
            margin-top: 8px;
            margin-left: 28%;
            border-radius: 6px;
            background-color: white;
            padding-top: 8px;
            padding-right: 8px;
            padding-bottom: 8px;
            padding-left: 20px;
            width: 50%;
            display: flex;
            align-items: center;
        }
        button:hover{
            color:#131313;
            background-color: #fff;
        }
        .btn-profil{
            display: flex;
            align-items: center;
            justify-content: center;
            transition-duration: 0.4s;
        }
        .btn-profil button{
            margin-left: 10px;
        }

    </style>

</head>
<body style="background-color:#C5F6E4;">
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
        <div class="header-profil">
            <h2>Profil Saya</h2>
        </div>
        <p class="pcss">Email: <?php echo $_SESSION['user']['email']; ?></p>
        <p class="pcss">Nama Lengkap: <?php echo $_SESSION['user']['namalengkap']; ?></p>
        <p class="pcss">Tanggal Lahir: <?php echo $_SESSION['user']['tanggallahir']; ?></p>

        <div class="btn-profil">
            <button><a href="edit_profil.php">Edit Akun</a></button>
            <button><a href="dashboardC.php">Kembali</a></button>
        </div>
       
        
    </div>

</body>
</html>