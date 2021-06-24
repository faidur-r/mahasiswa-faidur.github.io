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
    <div class="container py-5">
        <div class="card">
            <div class="card-header bg-primary text-white text-center">
                Tabel Data Mahasiswa
            </div>
            <div class="card-body">
                <div class="form-group">
                    <a href="input_mahasiswa.php" class="float-end btn btn-primary">Tambah Data</a>
                    <div class="float-start">
                        <div class="input-group search_field">
                            <input type="search" class="search form-control shadow-none">
                            <input type="submit" value="Cari" id="search" class="btn btn-primary shadow-none">
                        </div>
                    </div>
                </div>
                <br><br>
                <table class="table table-bordered" id="tb_id">
                    <thead>
                        <tr class="header bg-primary text-dark text-center">
                            <th>No</th>
                            <th>NPM</th>
                            <th>Nama</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Kode Pos</th>
                            <th>Aksi</th>
                        </tr>                   
                    </thead>
                    <?php
                        include "koneksi.php";
                        $no = 1;
                        $tampil = mysqli_query($koneksi, "SELECT * FROM data_mahasiswa");
                        while($data = mysqli_fetch_array($tampil)){
                    ?>
                    <tbody id="myTable">
                        <tr class="text-center">
                            <td> <?php echo $no++; ?> </td>
                            <td> <?php echo $data['npm']; ?> </td>
                            <td> <?php echo $data['nama']; ?> </td>
                            <td> <?php echo $data['tempat_lahir']; ?> </td>
                            <td> <?php echo $data['tanggal_lahir']; ?> </td>
                            <td> <?php echo $data['jenis_kelamin']; ?> </td>
                            <td> <?php echo $data['alamat']; ?> </td>
                            <td> <?php echo $data['kode_pos']; ?> </td>
                            <td>
                                <a href="edit_mahasiswa.php?id=<?php echo $data['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="delete.php?id=<?php echo $data['id']; ?>" class="btn btn-sm btn-danger">Hapus</a>
                            </td>
                        </tr>
                    </tbody>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
    
    <script>
        $("#search").on("click", function() {
            var value = $(".search").val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    </script>
</body>
</html>