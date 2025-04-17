<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Barang - Sistem Inventaris</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .action-buttons .btn {
            margin-right: 5px;
        }
        .table-responsive {
            margin-top: 20px;
        }
        .page-title {
            margin-bottom: 20px;
            color: #343a40;
        }
        .add-btn {
            margin-bottom: 20px;
        }
        .description-cell {
            max-width: 300px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="page-title">
                <i class="fas fa-boxes"></i> Daftar Barang
            </h2>
            <a href="<?= base_url('barang/add') ?>" class="btn btn-primary add-btn">
                <i class="fas fa-plus"></i> Tambah Barang
            </a>
            <a href="<?= base_url('kategori') ?>" class="btn btn-primary add-btn">
                <i class="fas fa-plus"></i> Tambah Kategori
            </a>
            <a href="<?= base_url('peminjaman/laporan') ?>" class="btn btn-info add-btn">
              <i class="fas fa-clipboard-list"></i> Laporan
            </a>
            <a href="<?= base_url('peminjaman/cetak') ?>" class="btn btn-secondary add-btn" target="_blank">
                <i class="fas fa-print"></i> Cetak
            </a>

            <a href="<?= base_url('peminjaman/pdf') ?>" class="btn btn-danger add-btn" target="_blank">
                <i class="fas fa-file-pdf"></i> Unduh PDF
            </a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th width="5%">No</th>
                                <th>Nama Barang</th>
                                <th>Kategori</th>
                                <th width="10%">Stok</th>
                                <th>Deskripsi</th>
                                <th width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach($barang as $b): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= htmlspecialchars($b->nama_barang) ?></td>
                                <td><?= htmlspecialchars($b->nama_kategori) ?></td>
                                <td>
                                    <span class="badge bg-<?= ($b->stok > 5) ? 'success' : 'warning' ?>">
                                        <?= $b->stok ?>
                                    </span>
                                </td>
                                <td class="description-cell" title="<?= htmlspecialchars($b->deskripsi) ?>">
                                    <?= htmlspecialchars($b->deskripsi) ?>
                                </td>
                                <td class="action-buttons">
                                    <a href="<?= base_url('barang/edit/'.$b->id_barang) ?>" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <a href="<?= base_url('barang/delete/'.$b->id_barang) ?>" 
                                       class="btn btn-sm btn-danger" 
                                       onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?')">
                                        <i class="fas fa-trash-alt"></i> Hapus
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Tooltip untuk deskripsi
        document.addEventListener('DOMContentLoaded', function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[title]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            });
        });
    </script>
</body>
</html>