<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Peminjaman Barang</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #4361ee;
            --primary-hover: #3a56d4;
            --secondary-color: #6c757d;
            --success-color: #28a745;
            --warning-color: #ffc107;
            --light-bg: #f8f9fa;
            --card-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.05);
            --transition: all 0.3s ease;
        }
        
        body {
            background-color: var(--light-bg);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .page-header {
            border-bottom: 1px solid rgba(0,0,0,0.1);
            padding-bottom: 1rem;
            margin-bottom: 2rem;
        }
        
        .card {
            border: none;
            border-radius: 0.5rem;
            box-shadow: var(--card-shadow);
            transition: var(--transition);
            margin-bottom: 1.5rem;
        }
        
        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.1);
        }
        
        .card-header {
            background-color: white;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            padding: 1.25rem 1.5rem;
            border-radius: 0.5rem 0.5rem 0 0 !important;
        }
        
        .filter-card {
            background: linear-gradient(135deg, #f8f9fa 0%, #eef2ff 100%);
        }
        
        .table-responsive {
            border-radius: 0.5rem;
            overflow: hidden;
        }
        
        .table {
            margin-bottom: 0;
            font-size: 0.9rem;
        }
        
        .table thead th {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 0.75rem 1rem;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.5px;
            vertical-align: middle;
        }
        
        .table tbody tr {
            transition: background-color 0.2s ease;
        }
        
        .table tbody tr:hover {
            background-color: rgba(67, 97, 238, 0.03);
        }
        
        .table tbody td {
            padding: 1rem;
            vertical-align: middle;
            border-top: 1px solid rgba(0, 0, 0, 0.03);
        }
        
        .badge {
            padding: 0.35rem 0.65rem;
            font-weight: 500;
            font-size: 0.75rem;
            border-radius: 50rem;
        }
        
        .btn {
            border-radius: 0.375rem;
            font-weight: 500;
            transition: var(--transition);
            padding: 0.5rem 1rem;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-primary:hover {
            background-color: var(--primary-hover);
            border-color: var(--primary-hover);
            transform: translateY(-1px);
        }
        
        .btn-success {
            background-color: var(--success-color);
            border-color: var(--success-color);
        }
        
        .btn-outline-secondary {
            border-color: #dee2e6;
        }
        
        .form-control, .form-select {
            border-radius: 0.375rem;
            padding: 0.5rem 1rem;
            border: 1px solid #e0e0e0;
            transition: var(--transition);
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(67, 97, 238, 0.15);
        }
        
        .input-group-text {
            background-color: #f8f9fa;
            border-radius: 0.375rem 0 0 0.375rem !important;
        }
        
        .empty-state {
            padding: 3rem 0;
            text-align: center;
        }
        
        .empty-state i {
            font-size: 3rem;
            color: #dee2e6;
            margin-bottom: 1rem;
        }
        
        .time-badge {
            font-size: 0.75rem;
            background-color: #f8f9fa;
            color: #6c757d;
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
        }
        
        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
        }
        
        @media (max-width: 768px) {
            .table-responsive {
                border: 1px solid #dee2e6;
                border-radius: 0.5rem;
            }
            
            .filter-card .row > div {
                margin-bottom: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="container py-4">
        <div class="page-header">
            <h2 class="text-primary">
                <i class="fas fa-boxes me-2"></i> Sistem Peminjaman Barang
            </h2>
        </div>

        <!-- Filter Section -->
        <div class="card shadow-sm mb-4">
    <div class="card-header bg-transparent">
        <h5 class="mb-0 text-primary">
            <i class="fas fa-filter me-2"></i> Filter Peminjaman
        </h5>
    </div>
    <div class="card-body">
        <?php echo form_open('peminjaman', ['method' => 'get', 'id' => 'filterForm']); ?>
        
        <div class="row row-cols-lg-auto g-3 align-items-end">
            <!-- Cari Barang -->
            <div class="col-12 col-lg-3">
                <label class="form-label fw-semibold small text-muted">CARI BARANG</label>
                <div class="input-group">
                    <span class="input-group-text bg-white"><i class="fas fa-search text-muted"></i></span>
                    <input type="text" name="barang" class="form-control" 
                        value="<?= htmlspecialchars($filter['barang'] ?? '') ?>" 
                        placeholder="Nama barang...">
                </div>
            </div>

            <!-- Kategori -->
            <div class="col-12 col-lg-2">
                <label class="form-label fw-semibold small text-muted">KATEGORI</label>
                <div class="input-group">
                    <span class="input-group-text bg-white"><i class="fas fa-tags text-muted"></i></span>
                    <select name="kategori" class="form-select">
                        <option value="">Kategori</option>
                        <?php foreach($kategori_list as $k): ?>
                        <option value="<?= $k->id_kategori ?>" 
                            <?= isset($filter['kategori']) && $filter['kategori'] == $k->id_kategori ? 'selected' : '' ?>>
                            <?= htmlspecialchars($k->nama_kategori) ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <!-- Status -->
            <div class="col-12 col-lg-3">
                <label class="form-label fw-semibold small text-muted">STATUS</label>
                <div class="input-group">
                    <span class="input-group-text bg-white"><i class="fas fa-check-circle text-muted"></i></span>
                    <select name="status" class="form-select">
                        <option value="">Status</option>
                        <option value="Dipinjam" <?= isset($filter['status']) && $filter['status'] == 'Dipinjam' ? 'selected' : '' ?>>Dipinjam</option>
                        <option value="Dikembalikan" <?= isset($filter['status']) && $filter['status'] == 'Dikembalikan' ? 'selected' : '' ?>>Dikembalikan</option>
                    </select>
                </div>
            </div>

            <!-- Dari Tanggal -->
            <div class="col-12 col-lg-2">
                <label class="form-label fw-semibold small text-muted">DARI TANGGAL</label>
                <input type="date" name="tanggal_mulai" class="form-control"
                    value="<?= htmlspecialchars($filter['tanggal_mulai'] ?? '') ?>">
            </div>

            <!-- Sampai Tanggal -->
            <div class="col-12 col-lg-2">
                <label class="form-label fw-semibold small text-muted">SAMPAI TANGGAL</label>
                <input type="date" name="tanggal_selesai" class="form-control"
                    value="<?= htmlspecialchars($filter['tanggal_selesai'] ?? '') ?>">
            </div>

            <!-- Tombol -->
            <div class="col-12 col-lg-auto d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-filter me-1"></i> Filter
                </button>
                <a href="<?= site_url('peminjaman') ?>" class="btn btn-outline-secondary" id="resetFilter">
                    <i class="fas fa-sync-alt me-1"></i> Reset
                </a>
            </div>
        </div>

        <?php echo form_close(); ?>
    </div>
</div>


        <!-- Data Peminjaman -->
        <div class="card shadow-sm">
            <div class="card-header bg-white d-flex flex-column flex-md-row justify-content-between align-items-center">
                <h5 class="mb-2 mb-md-0 text-primary">
                    <i class="fas fa-list-check me-2"></i> Daftar Peminjaman
                    <?php if(!empty($filter)): ?>
                        <small class="text-muted ms-2">(Hasil Filter)</small>
                    <?php endif; ?>
                </h5>
                <a href="<?= site_url('peminjaman/add') ?>" class="btn btn-primary">
                    <i class="fas fa-plus me-1"></i> Tambah Peminjaman
                </a>
            </div>
            <div class="card-body p-0">
                <?php if(!empty($peminjaman)): ?>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead>
                                <tr>
                                    <th width="5%" class="text-center">No</th>
                                    <th>Barang</th>
                                    <th>Kategori</th>
                                    <th>Peminjam</th>
                                    <th class="text-nowrap">Tanggal Pinjam</th>
                                    <th class="text-center">Status</th>
                                    <th width="15%" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach($peminjaman as $p): ?>
                                <tr>
                                    <td class="text-center"><?= $no++ ?></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="me-2 text-primary">
                                                <i class="fas fa-box"></i>
                                            </div>
                                            <div>
                                                <div class="fw-semibold"><?= htmlspecialchars($p->nama_barang) ?></div>
                                                <div class="small text-muted">Qty: <?= $p->jumlah ?></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-light text-dark">
                                            <?= htmlspecialchars($p->nama_kategori) ?>
                                        </span>
                                    </td>
                                    <td><?= htmlspecialchars($p->peminjam) ?></td>
                                    <td>
                                        <div><?= date('d M Y', strtotime($p->tanggal_pinjam)) ?></div>
                                        <div class="time-badge"><?= $p->waktu_pinjam ?></div>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge bg-<?= $p->status == 'Dipinjam' ? 'warning' : 'success' ?> status-badge">
                                            <i class="fas <?= $p->status == 'Dipinjam' ? 'fa-clock' : 'fa-check-circle' ?>"></i>
                                            <?= $p->status ?>
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <?php if($p->status == 'Dipinjam'): ?>
                                        <a href="<?= site_url('peminjaman/kembalikan/'.$p->id_peminjaman) ?>" 
                                           class="btn btn-sm btn-success"
                                           onclick="return confirm('Apakah barang sudah dikembalikan?')">
                                            <i class="fas fa-check me-1"></i> Kembalikan
                                        </a>
                                        <?php else: ?>
                                        <div class="text-muted small">
                                            <div>Dikembalikan</div>
                                            <div class="time-badge"><?= $p->waktu_kembali ?></div>
                                        </div>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <div class="empty-state py-5">
                        <i class="fas fa-inbox fa-3x"></i>
                        <h5 class="mt-3">Tidak ada data peminjaman</h5>
                        <p class="text-muted mb-4">Mulai dengan menambahkan peminjaman baru</p>
                    </div>
                <?php endif; ?>
            </div>
            <?php if(!empty($peminjaman)): ?>
            <div class="card-footer bg-white">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                    <div class="mb-2 mb-md-0 text-muted small">
                        Menampilkan <?= count($peminjaman) ?> data
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Fungsi untuk reset form filter
        document.getElementById('resetFilter').addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('filterForm').reset();
            window.location.href = "<?= site_url('peminjaman') ?>";
        });

        // Auto focus pada field pencarian
        document.addEventListener('DOMContentLoaded', function() {
            <?php if(!empty($filter['barang'])): ?>
                document.querySelector('input[name="barang"]').focus();
            <?php endif; ?>
            
            // Animasi hover pada card
            const cards = document.querySelectorAll('.card');
            cards.forEach(card => {
                card.addEventListener('mouseenter', () => {
                    card.style.transform = 'translateY(-3px)';
                });
                card.addEventListener('mouseleave', () => {
                    card.style.transform = '';
                });
            });
        });
    </script>
</body>
</html>