<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Peminjaman Barang</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --accent-color: #4895ef;
            --light-color: #f8f9fa;
            --dark-color: #212529;
        }
        
        body {
            background-color: #f5f7fb;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .card-form {
            border: none;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }
        
        .card-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 1.25rem 1.5rem;
            border-bottom: none;
        }
        
        .form-title {
            font-weight: 600;
            margin: 0;
        }
        
        .card-body {
            padding: 2rem;
        }
        
        .form-label {
            font-weight: 500;
            color: #495057;
            margin-bottom: 0.5rem;
        }
        
        .required-field::after {
            content: " *";
            color: #dc3545;
        }
        
        .form-control, .form-select {
            border-radius: 8px;
            padding: 0.75rem 1rem;
            border: 1px solid #e0e0e0;
            transition: all 0.3s ease;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 0.25rem rgba(72, 149, 239, 0.25);
        }
        
        .input-group-text {
            background-color: #f8f9fa;
            border-radius: 8px 0 0 8px !important;
        }
        
        .btn {
            border-radius: 8px;
            padding: 0.75rem 1.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-primary:hover {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        
        .btn-outline-secondary {
            border-color: #dee2e6;
        }
        
        .btn-outline-secondary:hover {
            background-color: #f8f9fa;
        }
        
        .item-option {
            display: flex;
            justify-content: space-between;
        }
        
        .item-name {
            font-weight: 500;
        }
        
        .item-stock {
            color: #6c757d;
            font-size: 0.85rem;
        }
        
        textarea {
            min-height: 120px;
            resize: vertical;
        }
        
        .icon-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
            background-color: rgba(67, 97, 238, 0.1);
            color: var(--primary-color);
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card card-form">
                    <div class="card-header">
                        <h4 class="form-title mb-0">
                            <i class="fas fa-hand-holding me-2"></i>Form Peminjaman Barang
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php echo form_open('peminjaman/save', ['class' => 'needs-validation', 'novalidate' => '']); ?>
                        
                        <!-- Barang -->
                        <div class="mb-4">
                            <label class="form-label required-field">Barang yang Dipinjam</label>
                            <select name="barang" class="form-select form-select-lg" required>
                                <option value="" selected disabled>-- Pilih Barang --</option>
                                <?php foreach($barang as $b): ?>
                                <option value="<?= $b->id_barang ?>" 
                                    <?= set_select('barang', $b->id_barang) ?>
                                    data-stok="<?= $b->stok ?>">
                                    <div class="item-option">
                                        <span class="item-name"><?= htmlspecialchars($b->nama_barang) ?></span>
                                        <span class="item-stock">Stok: <?= $b->stok ?></span>
                                    </div>
                                </option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                Silakan pilih barang yang akan dipinjam
                            </div>
                        </div>
                        
                        <!-- Jumlah dan Tanggal -->
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label required-field">Jumlah</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                                        <input type="number" name="jumlah" class="form-control form-control-lg" 
                                               min="1" value="1" required>
                                        <div class="invalid-feedback">
                                            Jumlah tidak valid
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label required-field">Tanggal Pinjam</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
                                        <input type="date" name="tanggal_pinjam" 
                                               class="form-control form-control-lg" 
                                               value="<?= date('Y-m-d') ?>" required>
                                        <div class="invalid-feedback">
                                            Tanggal tidak valid
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Peminjam -->
                        <div class="mb-4">
                            <label class="form-label required-field">Peminjam</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <input type="text" name="peminjam" class="form-control form-control-lg" required>
                                <div class="invalid-feedback">
                                    Nama peminjam harus diisi
                                </div>
                            </div>
                        </div>
                        
                        <!-- Keterangan -->
                        <div class="mb-4">
                            <label class="form-label">Keterangan (Opsional)</label>
                            <textarea name="keterangan" class="form-control" 
                                      placeholder="Contoh: Untuk acara seminar 17 Agustus"></textarea>
                        </div>
                        
                        <!-- Action Buttons -->
                        <div class="d-flex justify-content-between align-items-center mt-5">
                            <a href="<?= site_url('peminjaman') ?>" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Kembali
                            </a>
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-save me-2"></i>Simpan Peminjaman
                            </button>
                        </div>
                        
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Validasi stok saat memilih barang
        document.querySelector('select[name="barang"]').addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const stok = parseInt(selectedOption.getAttribute('data-stok'));
            const jumlahInput = document.querySelector('input[name="jumlah"]');
            
            if(jumlahInput) {
                jumlahInput.max = stok;
                if(parseInt(jumlahInput.value) > stok) {
                    jumlahInput.value = stok;
                }
            }
        });
        
        // Validasi form Bootstrap
        (function () {
            'use strict'
            
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')
            
            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        
                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
</body>
</html>