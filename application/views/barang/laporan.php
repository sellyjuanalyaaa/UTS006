<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Peminjaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="header mb-4">
        <h3 class="text-primary">📋 Laporan Peminjaman Barang</h3>
        <div>
            <a href="<?= base_url('peminjaman/cetak') ?>" class="btn btn-outline-primary me-2" target="_blank">
                <i class="bi bi-printer"></i> Cetak
            </a>
            <a href="<?= base_url('peminjaman/pdf') ?>" class="btn btn-outline-danger" target="_blank">
                <i class="bi bi-file-earmark-pdf"></i> Download PDF
            </a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Nama Peminjam</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Jumlah</th>
                    <th>Tanggal Pinjam</th>
                    <th>Waktu Pinjam</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($peminjaman)): ?>
                    <?php $no = 1; foreach ($peminjaman as $pinjam): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $pinjam->peminjam ?></td>
                            <td><?= $pinjam->nama_barang ?></td>
                            <td><?= $pinjam->nama_kategori ?></td>
                            <td><?= $pinjam->jumlah ?></td>
                            <td><?= date('d M Y', strtotime($pinjam->tanggal_pinjam)) ?></td>
                            <td><?= $pinjam->waktu_pinjam ?></td>
                            <td>
                                <span class="badge bg-<?= $pinjam->status == 'Dipinjam' ? 'warning text-dark' : 'success' ?>">
                                    <i class="bi <?= $pinjam->status == 'Dipinjam' ? 'bi-hourglass-split' : 'bi-check-circle' ?>"></i>
                                    <?= $pinjam->status ?>
                                </span>
                            </td>
                        </tr>
                    <?php endforeach ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8" class="text-center text-muted">Belum ada data peminjaman.</td>
                    </tr>
                <?php endif ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
