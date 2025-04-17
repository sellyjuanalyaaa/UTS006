<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Sistem Inventaris</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --light-bg: #f8f9fa;
        }
        
        body {
            background-color: var(--light-bg);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 1rem;
        }
        
        .auth-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            width: 100%;
            max-width: 500px;
            margin: 0 auto;
        }
        
        .auth-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 1.5rem;
            text-align: center;
        }
        
        .auth-body {
            padding: 1.5rem;
            background-color: white;
        }
        
        .form-control, .form-select {
            border-radius: 8px;
            padding: 0.75rem 1rem;
            border: 1px solid #e0e0e0;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(67, 97, 238, 0.25);
        }
        
        .btn-auth {
            background-color: var(--primary-color);
            border: none;
            padding: 0.75rem;
            font-weight: 500;
            border-radius: 8px;
            width: 100%;
            transition: all 0.3s ease;
        }
        
        .btn-auth:hover {
            background-color: var(--secondary-color);
            transform: translateY(-2px);
        }
        
        .auth-footer {
            text-align: center;
            padding: 1rem;
            background-color: #f8f9fa;
            border-top: 1px solid #eee;
        }
        
        .input-icon {
            position: relative;
        }
        
        .input-icon i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
        }
        
        .input-icon input {
            padding-left: 40px;
        }
        
        .role-selector {
            display: flex;
            gap: 10px;
            margin-bottom: 1rem;
            flex-wrap: wrap;
        }
        
        .role-selector input[type="radio"] {
            display: none;
        }
        
        .role-selector label {
            flex: 1 0 auto;
            min-width: 100px;
            text-align: center;
            padding: 0.75rem;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .role-selector input[type="radio"]:checked + label {
            border-color: var(--primary-color);
            background-color: rgba(67, 97, 238, 0.1);
            color: var(--primary-color);
            font-weight: 500;
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .auth-body {
                padding: 1.25rem;
            }
            
            .auth-header {
                padding: 1rem;
            }
            
            .auth-header h3 {
                font-size: 1.25rem;
            }
            
            .form-control, .form-select {
                padding: 0.65rem 0.9rem;
            }
            
            .input-icon i {
                left: 12px;
                font-size: 0.9rem;
            }
            
            .input-icon input {
                padding-left: 35px;
            }
            
            .role-selector label {
                min-width: 80px;
                padding: 0.5rem;
                font-size: 0.9rem;
            }
        }
        
        @media (max-width: 576px) {
            body {
                padding: 0.5rem;
                align-items: flex-start;
            }
            
            .auth-card {
                border-radius: 0;
                box-shadow: none;
            }
            
            .auth-header {
                border-radius: 0;
            }
            
            .auth-body {
                padding: 1rem;
            }
            
            .role-selector {
                flex-direction: column;
                gap: 8px;
            }
            
            .role-selector label {
                width: 100%;
            }
        }
        
        /* Animation for better UX */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .auth-card {
            animation: fadeIn 0.5s ease-out;
        }
        
        /* Better password strength indicator */
        .password-strength {
            font-size: 0.85rem;
            margin-top: 0.25rem !important;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8 col-xl-6">
                <div class="auth-card">
                    <div class="auth-header">
                        <h3><i class="fas fa-user-plus me-2"></i> Daftar Akun Baru</h3>
                        <p class="mb-0">Sistem Inventaris dan Peminjaman Barang</p>
                    </div>
                    
                    <div class="auth-body">
                        <?php echo form_open('auth/process_register'); ?>
                        
                        <!-- Nama Lengkap -->
                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <div class="input-icon">
                                <i class="fas fa-user"></i>
                                <input type="text" class="form-control" name="nama_lengkap" 
                                       value="<?= set_value('nama_lengkap') ?>" required>
                            </div>
                            <?= form_error('nama_lengkap', '<small class="text-danger">', '</small>') ?>
                        </div>
                        
                        <!-- Username -->
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <div class="input-icon">
                                <i class="fas fa-at"></i>
                                <input type="text" class="form-control" name="username" 
                                       value="<?= set_value('username') ?>" required>
                            </div>
                            <?= form_error('username', '<small class="text-danger">', '</small>') ?>
                        </div>
                        
                        <!-- Email -->
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <div class="input-icon">
                                <i class="fas fa-envelope"></i>
                                <input type="email" class="form-control" name="email" 
                                       value="<?= set_value('email') ?>" required>
                            </div>
                            <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                        </div>
                        
                        <!-- Password -->
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <div class="input-icon">
                                <i class="fas fa-lock"></i>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                            <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                        </div>
                        
                        <!-- Confirm Password -->
                        <div class="mb-3">
                            <label class="form-label">Konfirmasi Password</label>
                            <div class="input-icon">
                                <i class="fas fa-lock"></i>
                                <input type="password" class="form-control" name="confirm_password" required>
                            </div>
                            <?= form_error('confirm_password', '<small class="text-danger">', '</small>') ?>
                        </div>
                        
                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-auth mb-3">
                            <i class="fas fa-user-plus me-2"></i> Daftar Sekarang
                        </button>
                        
                        <?php echo form_close(); ?>
                    </div>
                    
                    <div class="auth-footer">
                        Sudah punya akun? <a href="<?= site_url('auth/login') ?>">Login disini</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Validasi password strength
        document.querySelector('input[name="password"]').addEventListener('input', function() {
            const password = this.value;
            const strengthIndicator = document.createElement('div');
            strengthIndicator.className = 'password-strength mt-1';
            
            // Remove previous indicator
            const prevIndicator = document.querySelector('.password-strength');
            if (prevIndicator) prevIndicator.remove();
            
            if (password.length > 0) {
                let strength = 0;
                if (password.length >= 8) strength++;
                if (password.match(/[a-z]/) && password.match(/[A-Z]/)) strength++;
                if (password.match(/[0-9]/)) strength++;
                if (password.match(/[^a-zA-Z0-9]/)) strength++;
                
                let strengthText = '';
                let strengthClass = '';
                
                switch(strength) {
                    case 1:
                        strengthText = 'Lemah';
                        strengthClass = 'text-danger';
                        break;
                    case 2:
                        strengthText = 'Sedang';
                        strengthClass = 'text-warning';
                        break;
                    case 3:
                        strengthText = 'Kuat';
                        strengthClass = 'text-primary';
                        break;
                    case 4:
                        strengthText = 'Sangat Kuat';
                        strengthClass = 'text-success';
                        break;
                    default:
                        strengthText = 'Sangat Lemah';
                        strengthClass = 'text-danger';
                }
                
                strengthIndicator.innerHTML = `<small class="${strengthClass}">Kekuatan password: ${strengthText}</small>`;
                this.parentNode.parentNode.appendChild(strengthIndicator);
            }
        });
        
        // Better form validation UX
        document.querySelector('form').addEventListener('submit', function(e) {
            const inputs = this.querySelectorAll('input[required]');
            let isValid = true;
            
            inputs.forEach(input => {
                if (!input.value.trim()) {
                    input.classList.add('is-invalid');
                    isValid = false;
                } else {
                    input.classList.remove('is-invalid');
                }
            });
            
            if (!isValid) {
                e.preventDefault();
                // Scroll to first invalid input
                const firstInvalid = this.querySelector('.is-invalid');
                if (firstInvalid) {
                    firstInvalid.scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    });
                }
            }
        });
    </script>
</body>
</html>