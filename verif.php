<?php

$conn = mysqli_connect("localhost","root","","phpdasar"); 

$code = $_GET['code'];

if(isset($code)) {
    $qry = $conn->query("SELECT * FROM cust WHERE verifikasi_code = '$code'");
    $result = $qry->fetch_assoc();

    $conn->query("UPDATE cust SET is_verif=1 WHERE id ='".$result['id']."'");
    //$result = mysqli_query($conn, "SELECT * FROM cust WHERE verifikasi_code = '$code' ");
    //$query = "UPDATE cust SET is_verif=1 WHERE id = $id";
    echo "
        <script type='text/javascript'>
            alert('Verifikasi Berhasil, Silahkan Login!');
            window.location='loginCverif.php';
        </script>
        ";
}

?>