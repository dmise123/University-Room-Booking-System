<?php
require("../connect.php");
require("process.php");
require("../navbar.php");
if (true) {
    $id = 1;
    $stmt = $conn->prepare("SELECT * FROM peminjaman WHERE id_user = (?) ORDER BY tanggal_peminjaman");
    $stmt->execute([$_SESSION['id']]); // Perbaikan: Tambahkan eksekusi
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Pastikan jQuery dimuat sebelum DataTables -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        h1{
            margin-bottom: 50px;
        }
        #keyword{
            margin-bottom: 10px;
            
        }
    </style>
</head>
<body>
    <h1>Daftar Peminjaman</h1>
    <form method="post">
        <input type="text" name="keyword" size="30" autofocus placeholder="masukkan keyword" autocomplete="off" id="keyword">

    </form>
    <div id="container">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID Ruangan</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Start-End</th>
                    <th>Acara</th>
                    <th>Keterangan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Isi tabel dengan data dari $result -->
                <?php foreach ($result as $row) : ?>
                    <tr>
                        <td><?= $row['id_ruangan']; ?></td>
                        <td><?= $row['tanggal_peminjaman']; ?></td>
                        <?php $jam = convert_start_end($row['start'], $row['end']);
                        ?>
                        <td><?= $jam['start'] . "-" . $jam['end']; ?></td>
                        <?php $keterangan = trim_keterangan($row['keterangan']); ?>
                        <td><?= $keterangan['acara'] ?></td>
                        <td><?= $keterangan['keterangan'] ?></td>
                        <td>
                            <button class="btn btn-danger delete">
                                <a style="color: white; text-decoration: none" href="deletePinjaman.php?id=<?= $row['id_ruangan'] ?>">Batalkan Peminjaman</a>
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
    <script>
        $(document).ready(function() {
            $("#keyword").on('keyup', function() {
                $.get('pinjaman.php?keyword=' + $('#keyword').val(), function(data){
                    $('#container').html(data);
                } );
            });
        });
    </script>
</body>
</html>