<?php
    include "nav.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/jquery-3.4.1.min.js"></script>
</head>
<body>
    <div class="container col-6">
        <div class="card">
            <div class="card-header bg-primary text-white text-center">
                Register Mahasiswa
            </div>
            <div class="card-body">
                <?php echo isset($data['notiv']); ?>
                <form action="" method="POST" onSubmit="return myRegister()">
                    <div class="input-group mb-3">
                        <span class="input-group-text">NPM</span>
                        <input type="text" name="npm" class="form-control" placeholder="Masukkan NPM" required>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">Nama</span>
                        <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Lengkap" required>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">Password</span>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password" required>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">Konfirmasi Password</span>
                        <input type="password" name="re-password" id="re-password" class="form-control" placeholder="Masukkan Password" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="regist">Daftar</button>
                        <div class="float-end">
                            Sudah punya akun? klik 
                            <a href="login.php">disini</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function myRegister(){
            var password = document.getElementById("password").value;
            var repassword = document.getElementById("re-password").value;
            if (password == repassword){
                return true;
            } else {
                alert("Password tidak sesuai");
                return false;
            }
        }
    </script>
</body>
</html>

<?php
    include "koneksi.php";

    if(isset($_POST['regist'])){
        $npm = $_POST['npm'];
        $username = $_POST['nama'];
        $password_1 = $_POST['password'];

        $user_check_query = "SELECT * FROM user WHERE npm='$npm'";
        $result = mysqli_query($koneksi, $user_check_query);
        $user = mysqli_fetch_assoc($result);

        if ($user) {
            $data['notiv'] = "NPM sudah didaftarkan";
        } else {
            $password = md5($password_1);
            mysqli_query($koneksi, "INSERT INTO user VALUES('', '$npm', '$username', '$password')") or die(mysqli_error($koneksi));
            
            session_start();
            $_SESSION['npm'] = $npm;
            $_SESSION['status'] = "login";
            header('location: index.php');
        }
    }

?>
