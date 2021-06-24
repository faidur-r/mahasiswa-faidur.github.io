<?php
    include "auth.php";
    include "nav.php";
    include "koneksi.php";
    $id = $_GET['id'];
    $ambilData = mysqli_query($koneksi, "SELECT * FROM data_mahasiswa WHERE id='$id'");
    $data =  mysqli_fetch_array($ambilData);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/jquery-3.4.1.min.js"></script>
</head>
<body>
    <div class="container py-5">
        <div class="card">
            <div class="card-header bg-primary text-white text-center">
                Edit Data Mahasiswa
            </div>
            <div class="card-body">
                <form method="POST" class="form-item">
                    <div class="form-group mb-3">
                        <label for="npm">NPM</label>
                        <input type="text" name="npm" value="<?php echo $data['npm']; ?>" class="form-control" maxlength="8" placeholder="Masukan NPM" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" value="<?php echo $data['nama']; ?>" class="form-control" maxlength="100" placeholder="Masukan Nama" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" value="<?php echo $data['tempat_lahir']; ?>" class="form-control" maxlength="50" placeholder="Masukan Tempat Lahir" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" value="<?php echo $data['tanggal_lahir']; ?>" class="form-control" placeholder="Masukan Tanggal Lahir" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control">
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" value="<?php echo $data['alamat']; ?>" class="form-control" placeholder="Masukan Alamat" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="kode_pos">Kode Pos</label>
                        <input type="text" name="kode_pos" value="<?php echo $data['kode_pos']; ?>" class="form-control" maxlength="5" placeholder="Masukan Kode Pos" required>
                    </div>

                    <center>
                        <button type="submit" class="btn btn-primary" name="simpan">SIMPAN</button>
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
    if (isset($_POST['simpan'])){

        $npm                = $_POST['npm'];
        $nama               = $_POST['nama'];
        $tempat_lahir       = $_POST['tempat_lahir'];
        $tanggal_lahir      = $_POST['tanggal_lahir'];
        $jenis_kelamin      = $_POST['jenis_kelamin'];
        $alamat             = $_POST['alamat'];
        $kode_pos           = $_POST['kode_pos'];

        mysqli_query($koneksi, "UPDATE data_mahasiswa 
        SET npm='$npm', nama='$nama', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', jenis_kelamin='$jenis_kelamin', alamat='$alamat', kode_pos='$kode_pos'
        WHERE id='$id'") or die(mysqli_error($koneksi));

        header("location: index.php");
    }
?>