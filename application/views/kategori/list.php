<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Daftar Kategori</h2>
    <a href="<?= base_url('kategori/add') ?>" class="btn btn-primary mb-3">
        <i class="fas fa-plus"></i> Tambah Kategori
    </a>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nama Kategori</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($kategori as $k): ?>
            <tr>
                <td><?= $k->id_kategori ?></td>
                <td><?= htmlspecialchars($k->nama_kategori) ?></td>
                <td><?= htmlspecialchars($k->deskripsi) ?></td>
                <td>
                    <a href="<?= base_url('kategori/edit/'.$k->id_kategori) ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="<?= base_url('kategori/delete/'.$k->id_kategori) ?>" onclick="return confirm('Yakin hapus?')" class="btn btn-sm btn-danger">Hapus</a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
</body>
</html>
