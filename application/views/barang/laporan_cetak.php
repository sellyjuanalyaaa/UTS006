<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cetak Laporan Peminjaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        @media print {
            .no-print { display: none; }
        }
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
        }
        .table th, .table td {
            vertical-align: middle !important;
        }
    </style>
</head>
<body onload="window.print()">
<div class="container mt-4">
    <h3 class="text-center mb-4">Laporan Peminjaman Barang</h3>

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>#</th>
                <th>Nama Peminjam</th>
                <th>Barang</th>
                <th>Kategori</th>
                <th>Jumlah</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach($peminjaman as $row): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row->peminjam ?></td>
                    <td><?= $row->nama_barang ?></td>
                    <td><?= $row->nama_kategori ?></td>
                    <td><?= $row->jumlah ?></td>
                    <td><?= date('d M Y', strtotime($row->tanggal_pinjam)) ?></td>
                    <td><?= $row->waktu_pinjam ?></td>
                    <td>
                        <span class="badge bg-<?= $row->status == 'Dipinjam' ? 'warning' : 'success' ?>">
                            <?= $row->status ?>
                        </span>
                    </td>
                </tr>
            <?php endforeach ?>
            <?php if (empty($peminjaman)): ?>
                <tr>
                    <td colspan="8" class="text-center text-muted">Tidak ada data peminjaman.</td>
                </tr>
            <?php endif ?>
        </tbody>
    </table>
</div>
</body>
</html>
