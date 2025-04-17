<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang - Sistem Inventaris</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .card-form {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .form-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #eee;
            padding: 15px 20px;
            border-radius: 10px 10px 0 0 !important;
        }
        .form-title {
            color: #343a40;
            margin: 0;
        }
        .form-body {
            padding: 20px;
        }
        .btn-submit {
            padding: 8px 20px;
        }
        .btn-cancel {
            padding: 8px 20px;
            margin-left: 10px;
        }
        textarea {
            min-height: 100px;
            resize: vertical;
        }
        .required-field::after {
            content: " *";
            color: #dc3545;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card card-form">
                    <div class="card-header form-header">
                        <h3 class="form-title">
                            <i class="fas fa-box-open me-2"></i>Tambah Barang Baru
                        </h3>
                    </div>
                    <div class="card-body form-body">
                        <?php echo form_open('barang/save'); ?>
                        
                        <div class="mb-3">
                            <label for="nama" class="form-label required-field">Nama Barang</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                            <?php echo form_error('nama', '<div class="invalid-feedback d-block">', '</div>'); ?>
                        </div>
                        
                        <div class="mb-3">
                            <label for="kategori" class="form-label required-field">Kategori</label>
                            <select class="form-select" id="kategori" name="kategori" required>
                                <option value="" selected disabled>-- Pilih Kategori --</option>
                                <option value="1">Perabot</option>
                                <option value="2">Elektronik</option>
                                <option value="3">Alat Tulis</option>
                            </select>
                            <?php echo form_error('kategori', '<div class="invalid-feedback d-block">', '</div>'); ?>
                        </div>
                        
                        <div class="mb-3">
                            <label for="stok" class="form-label required-field">Stok Awal</label>
                            <input type="number" class="form-control" id="stok" name="stok" min="0" value="0" required>
                            <?php echo form_error('stok', '<div class="invalid-feedback d-block">', '</div>'); ?>
                        </div>
                        
                        <div class="mb-4">
                            <label for="deskripsi" class="form-label">Deskripsi Barang</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
                        </div>
                        
                        <div class="d-flex justify-content-end">
                            <a href="<?php echo site_url('barang'); ?>" class="btn btn-outline-secondary btn-cancel">
                                <i class="fas fa-times me-1"></i> Batal
                            </a>
                            <button type="submit" class="btn btn-primary btn-submit">
                                <i class="fas fa-save me-1"></i> Simpan Barang
                            </button>
                        </div>
                        
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Validasi form real-time
        (function() {
            'use strict';
            
            // Ambil semua form yang ingin diterapkan validasi Bootstrap
            var forms = document.querySelectorAll('.needs-validation');
            
            // Loop dan cegat pengiriman form
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        
                        form.classList.add('was-validated');
                    }, false);
                });
        })();
    </script>
</body>
</html>