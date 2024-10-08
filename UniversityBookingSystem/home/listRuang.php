<?php
    require("process.php");
    include("../navbar.php");

    $title = "room";
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <title>Document</title>
</head>

<style>
    
</style>

<body>
    <div class="container">
        <div class="row">
            <!--Card--> 
            <?php foreach($rooms as $room): ?>
                <div class="col-4 lg-4 md-4 sm-6 mt-5 pb-5">
                    <div class="card" style="width: 18rem;">
                        <img src="<?php echo $room['img_dir']; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $room['kode_ruangan']; ?></h5>
                            <p class="card-text">
                                <label><?= $room['nama_ruangan'];  ?></label>
                                <br>
                                <label><?= "Kapasitas Ruangan: " . $room['kapasitas'];  ?></label>
                            </p>
                            <a href="../peminjaman/pinjam.php?kode_ruangan=<?php echo $room['kode_ruangan'];?>" class="btn" style="background-color: #03396c; color : white;">Pinjam Ruang</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>