<?php

include "mysql.php";

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $password = mysqli_real_escape_string($mysqli, ($_POST['password']));

    $query = "SELECT * FROM tbl_user WHERE email = '$email' and password = '$password'";
    $queryDB = mysqli_query($mysqli, $query);
    $check = mysqli_num_rows($queryDB);

    if ($check > 0) {
        // ambil data users
        $getData = mysqli_fetch_array($queryDB);
        // set session 
        $_SESSION['name'] = $getData;
        $_SESSION['is_login']  = true;

        header("location: index.php");
    } else {
        echo "Email atau password yang anda masukkan salah";
    }
} else {
    return "Anda tidak di ijinkan";
}
