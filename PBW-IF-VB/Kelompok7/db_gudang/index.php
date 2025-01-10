<?php
session_start();

if (!$_SESSION["is_login"] === TRUE) {
    header("location: login.php");
    exit;
}
?>
<html>

<head>
    <title>
        Form Login
    </title>
    <style>
        body {
            background-image: url('assets/img/gd1.jpg'); /* Set the background image */
            background-size: cover; /* Ensure the background image covers the entire page */
            background-repeat: no-repeat; /* Prevent the background image from repeating */
            background-attachment: fixed; /* Ensure the background image stays fixed in place */
            font-family: 'Times New Roman', 'sans-serif';
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .wrapper {
            width: 400px;
            padding: 30px;
            background-color: rgba(255, 255, 255, 0.9); /* Set a semi-transparent background color for the form */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 10px; /* Add rounded corners */
            text-align: center;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px 0;
            text-decoration: none;
            color: white;
            border-radius: 5px;
        }
        .btn-login {
            background-color:rgb(40, 164, 253);/* Blue */
        }

        .btn-logout {
            background-color:rgb(254, 21, 4); /* Red */
        }

        form input {
            width: 100%;
            height: 40px;
            border: 1px solid black;
            padding: 5px;
        }
    </style>
</head>

<body>
    
    <div class="wrapper">
        <h3>Berhasil login!</h3>
        <p>lanjut ke halaman admin dengan klik tombol di bawah</p>
            <a href="halaman_admin.php" class="btn btn-login">Lanjutkan</a>
        <p>Apabila ingin Keluar bisa klik tombol di bawah ini<br>
            <a href="logout.php" class="btn btn-logout">Logout</a>
        </p>
    </div>
</body>
</html>