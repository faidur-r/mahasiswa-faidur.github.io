<?php
    include "nav.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/jquery-3.4.1.min.js"></script>
</head>
<body>
    <div class="container col-6">
        <div class="card">
            <div class="card-header bg-primary text-white text-center">
                Login Mahasiswa
            </div>

            <div class="card-body">
                <form action="" method="POST" class="form-item">
                    <div class="input-group mb-3">
                        <span class="input-group-text">NPM</span>
                        <input type="text" name="npm" class="form-control" placeholder="Masukkan NPM" required>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">Password</span>
                        <input type="password" name="password" class="form-control" placeholder="Masukkan Password" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="login">Masuk</button>
                        <div class="float-end">
                            belum mendaftar? klik
                            <a href="register.php">disini</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php 
    include 'koneksi.php';
    if (isset($_POST['login'])){
        session_start();

        $npm = $_POST['npm'];
        $password_1 = $_POST['password'];
        $password = md5($password_1);

        $data = mysqli_query($koneksi,"select * from user where npm='$npm' and password='$password'"
        ) or die(mysqli_error($koneksi));

        if(mysqli_num_rows($data) == 1){
            $_SESSION['npm'] = $npm;
            $_SESSION['status'] = "login";
            header("location: index.php");
        }
    }
?>