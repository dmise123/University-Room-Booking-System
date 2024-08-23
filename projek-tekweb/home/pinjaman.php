<?php
require 'process.php';
$keyword = $_GET['keyword'];
$result = cari($keyword);
?>
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