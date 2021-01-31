<?php
    include "auth.php";
    include "nav.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/jquery-3.4.1.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header bg-primary text-white text-center">
                Input Data Mahasiswa
            </div>
            <div class="card-body">
                <form action="" method="POST" class="form-item">
                    <div class="form-group mb-3">
                        <label>NPM</label>
                        <input type="text" name="npm" value="<?php echo isset($data['npm']); ?>" class="form-control" maxlength="8" placeholder="Masukan NPM" required>
                    </div>

                    <div class="form-group mb-3">
                        <label>Nama</label>
                        <input type="text" name="nama" value="<?php echo isset($data['nama']); ?>" class="form-control" maxlength="100" placeholder="Masukan Nama" required>
                    </div>

                    <div class="form-group mb-3">
                        <label>Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" value="<?php echo isset($data['tempat_lahir']); ?>" class="form-control" maxlength="50" placeholder="Masukan Tempat Lahir" requiref>
                    </div>

                    <div class="form-group mb-3">
                        <label >Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" value="<?php echo isset($data['tanggal_lahir']); ?>" class="form-control" placeholder="Masukan Tanggal Lahir" required>
                    </div>

                    <div class="form-group mb-3">
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control">
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label>Alamat</label>
                        <input type="text" name="alamat" value="<?php echo isset($data['alamat']); ?>" class="form-control" placeholder="Masukan Jenis Kelamin" required>
                    </div>

                    <div class="form-group mb-3">
                        <label>Kode Pos</label>
                        <input type="text" name="kode_pos" value="<?php echo isset($data['kode_pos']); ?>" class="form-control" maxlength="5" placeholder="Masukan Kode Pos" required>
                    </div>

                    <center>
                        <button type="submit" class="btn btn-primary " name="simpan">SIMPAN</button>
                        <button type="reset" class="btn btn-warning">RESET</button>
                        <a href="index.php" class="btn btn-danger">BATAL</a>
                    </center>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php
    include "koneksi.php";
    if (isset($_POST['simpan'])){

        $npm                = $_POST['npm'];
        $nama               = $_POST['nama'];
        $tempat_lahir       = $_POST['tempat_lahir'];
        $tanggal_lahir      = $_POST['tanggal_lahir'];
        $jenis_kelamin      = $_POST['jenis_kelamin'];
        $alamat             = $_POST['alamat'];
        $kode_pos           = $_POST['kode_pos'];

        mysqli_query($koneksi, "INSERT INTO data_mahasiswa VALUES(
            '', '$npm', '$nama', '$tempat_lahir', '$tanggal_lahir', '$jenis_kelamin', '$alamat', '$kode_pos'
        )") or die(mysqli_error($koneksi));

        header("location: index.php");
    }
?>