<?php
include 'connect.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// ===========1============
// Definisikan $query untuk mengambil data movie berdasarkan id
$query = "SELECT * FROM movies WHERE id = $id";
$result = mysqli_query($conn, $query);
$movie = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Detail Film</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #0d1117, #1f2937);
            color: #fff;
            min-height: 100vh;
            font-family: 'Segoe UI', sans-serif;
        }

        .card {
            background-color: #111827;
            border: 1px solid #2d3748;
            color: #e5e7eb;
        }

        .form-control {
            background-color: #1f2937;
            border: 1px solid #374151;
            color: #fff;
        }

        .form-control:focus {
            background-color: #1f2937;
            border-color: #e50914;
            box-shadow: 0 0 0 0.25rem rgba(229, 9, 20, 0.25);
            color: #fff;
        }

        ::placeholder {
            color: #9ca3af;
            opacity: 1;
        }

        label {
            color: #d1d5db;
        }

        .btn-primary {
            background-color: #e50914;
            border: none;
            transition: 0.3s;
        }

        .btn-primary:hover {
            background-color: #b0060f;
        }

        h3 {
            color: #fff;
        }
    </style>
</head>

<body>
    <?php include 'navbar.php'; ?>

    <div class="container py-5">
        <div class="card shadow p-4 mx-auto" style="max-width: 600px;">
            <h3 class="mb-4 text-center fw-bold">🎬 Edit Detail Film</h3>
            <form action="update.php" method="POST">
                <input type="hidden" name="id" value="<?= $movie['id'] ?>">

                <div class="form-floating mb-3">
                    <!-- ====================2================= -->
                    <!-- Isi attribute value gunakan htmlspecialchars untuk judul film -->
                    <input type="text" class="form-control" name="title" value="<?= htmlspecialchars($movie["title"]) ?>" placeholder="Judul Film" required>
                    <label>Judul Film</label>
                </div>

                <div class="form-floating mb-3">
                    <!-- ====================3================= -->
                    <!-- Isi attribute value gunakan htmlspecialchars untuk genre -->
                    <input type="text" class="form-control" name="genre" value="<?= htmlspecialchars($movie["genre"]) ?>" placeholder="Genre (Aksi, Drama, dll.)" required>
                    <label>Genre</label>
                </div>

                <div class="form-floating mb-3">
                    <!-- ====================4================= -->
                    <!-- Isi attribute value gunakan htmlspecialchars untuk sutradara -->
                    <input type="text" class="form-control" name="director" value="<?= htmlspecialchars($movie["director"]) ?>" placeholder="Nama Sutradara" required>
                    <label>Sutradara</label>
                </div>

                <div class="form-floating mb-3">
                    <!-- ====================5================= -->
                    <!-- Isi attribute value gunakan (int) untuk tahun rilis -->
                    <input type="number" class="form-control" name="release_year" value="<?= (int)($movie["title"]) ?>" placeholder="Tahun Rilis" min="1900" max="<?= date('Y'); ?>" required>
                    <label>Tahun Rilis</label>
                </div>

                <button type="submit" name="update" class="btn btn-primary w-100 mt-3">💾 Simpan Perubahan</button>
            </form>
        </div>
    </div>
</body>

</html>