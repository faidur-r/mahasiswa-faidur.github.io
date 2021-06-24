<nav class="navbar navbar-expand navbar-dark bg-primary">
    <a class="navbar-brand" href="index.php">Data Mahasiswa</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="nav navbar-nav ms-auto">
            <?php
                if(isset($_SESSION["npm"])){
                    echo "<li class='nav-item'><a class='nav-link active' href='logout.php'>Keluar</a></li>";
                }
            ?>
        </ul>
    </div>
</nav>