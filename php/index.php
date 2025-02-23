<?php
// index.php
session_start();
require_once 'PetShop.php';
$petshop = new PetShop();

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_pet'])) {
            $imagePath = '';
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $imagePath = basename($_FILES['image']['name']);
            move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
        }

        $petshop->addPet(
            $_POST['name'],
            $_POST['category'],
            $_POST['price'],
            $imagePath
        );    
    } elseif (isset($_POST['update_pet'])) {
        $imagePath = $edit_pet['image']; // Default ke gambar lama jika tidak ada upload baru
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $imagePath = basename($_FILES['image']['name']);
            move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
        }

        $petshop->updatePet(
            $_POST['id'],
            $_POST['name'],
            $_POST['category'],
            $_POST['price'],
            $imagePath
        );

    }
    header("Location: index.php");
    exit();
}

// Handle deletions
if (isset($_GET['delete'])) {
    $petshop->deletePet($_GET['delete']);
    header("Location: index.php");
    exit();
}

$search_result = null;
if (isset($_GET['search'])) {
    $search_result = $petshop->findByName($_GET['search']);
}

$edit_pet = null;
if (isset($_GET['edit'])) {
    $edit_pet = $petshop->getPetById($_GET['edit']);
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Shop Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .pet-image { height: 100px; object-fit: cover; }
        .card { margin-bottom: 20px; }
        .action-links { white-space: nowrap; }
    </style>
</head>
<body class="bg-light">
    <div class="container mt-4">
        <h1 class="mb-4 text-center">Pet Shop Management</h1>

        <!-- Search Card -->
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Cari Hewan</h5>
            </div>
            <div class="card-body">
                <form method="GET">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" 
                               placeholder="Masukkan nama hewan..." value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </form>
                <?php if ($search_result): ?>
                <div class="mt-3">
                    <h5>Hasil Pencarian:</h5>
                    <div class="row">
                        <div class="col-md-2">
                            <img src="<?= htmlspecialchars($search_result['image']) ?>" 
                                 class="pet-image w-100 rounded">
                        </div>
                        <div class="col-md-10">
                            <p><strong>ID:</strong> <?= $search_result['id'] ?></p>
                            <p><strong>Nama:</strong> <?= htmlspecialchars($search_result['name']) ?></p>
                            <p><strong>Kategori:</strong> <?= htmlspecialchars($search_result['category']) ?></p>
                            <p><strong>Harga:</strong> Rp <?= number_format($search_result['price'], 0, ',', '.') ?></p>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Add/Edit Card -->
        <div class="card shadow">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0"><?= $edit_pet ? 'Edit' : 'Tambah' ?> Hewan</h5>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <?php if ($edit_pet): ?>
                    <input type="hidden" name="id" value="<?= $edit_pet['id'] ?>">
                    <?php endif; ?>
                    
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Nama Hewan</label>
                            <input type="text" name="name" class="form-control" 
                                   value="<?= htmlspecialchars($edit_pet['name'] ?? '') ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Kategori</label>
                            <select name="category" class="form-select" required>
                                <option value="Hewan" <?= ($edit_pet['category'] ?? '') === 'Hewan' ? 'selected' : '' ?>>Hewan</option>
                                <option value="Aksesoris" <?= ($edit_pet['category'] ?? '') === 'Aksesoris' ? 'selected' : '' ?>>Aksesoris</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Harga</label>
                            <input type="number" name="price" class="form-control" 
                                   value="<?= $edit_pet['price'] ?? '' ?>" min="0" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Upload Gambar</label>
                            <input type="file" name="image" class="form-control" accept="image/*" <?= $edit_pet ? '' : 'required' ?>>
                        </div>
                        <div class="col-12">
                            <button type="submit" name="<?= $edit_pet ? 'update_pet' : 'add_pet' ?>" 
                                    class="btn btn-success w-100">
                                <?= $edit_pet ? 'Update' : 'Tambah' ?> Hewan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Pets List Card -->
        <div class="card shadow">
            <div class="card-header bg-info text-white">
                <h5 class="mb-0">Daftar Hewan</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($petshop->getAllPets() as $pet): ?>
                            <tr>
                                <td><?= $pet['id'] ?></td>
                                <td><?= htmlspecialchars($pet['name']) ?></td>
                                <td><?= htmlspecialchars($pet['category']) ?></td>
                                <td>Rp <?= number_format($pet['price'], 0, ',', '.') ?></td>
                                <td><img src="<?= htmlspecialchars($pet['image']) ?>" class="pet-image rounded">
                                </td>
                                <td class="action-links">
                                    <a href="index.php?edit=<?= $pet['id'] ?>" 
                                       class="btn btn-sm btn-warning">Edit</a>
                                    <a href="index.php?delete=<?= $pet['id'] ?>" 
                                       class="btn btn-sm btn-danger" 
                                       onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>