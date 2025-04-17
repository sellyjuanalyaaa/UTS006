<!DOCTYPE html>
<html>
<head>
    <title>Laporan Peminjaman</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #333; padding: 5px; text-align: left; }
        th { background-color: #f0f0f0; }
    </style>
</head>
<body>
    <h3 style="text-align:center;">Laporan Peminjaman Barang</h3>
    <table>
        <thead>
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
                <td><?= $row->tanggal_pinjam ?></td>
                <td><?= $row->waktu_pinjam ?></td>
                <td><?= $row->status ?></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>
