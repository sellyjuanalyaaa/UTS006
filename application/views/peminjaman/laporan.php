<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Barang Dipinjam</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4 text-primary">📦 Laporan Barang Dipinjam</h2>

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Peminjam</th>
                    <th>Jumlah</th>
                    <th>Tanggal Pinjam</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach($peminjaman as $p): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $p->nama_barang ?></td>
                        <td><?= $p->peminjam ?></td>
                        <td><?= $p->jumlah ?></td>
                        <td><?= date('d M Y', strtotime($p->tanggal_pinjam)) ?></td>
                        <td>
                            <span class="badge bg-<?= $p->status == 'Dipinjam' ? 'warning text-dark' : 'success' ?>">
                                <?= $p->status ?>
                            </span>
                        </td>
                    </tr>
                <?php endforeach ?>
                <?php if (empty($peminjaman)): ?>
                    <tr>
                        <td colspan="6" class="text-center text-muted">Tidak ada data peminjaman.</td>
                    </tr>
                <?php endif ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
