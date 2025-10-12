<?php
include 'connect.php';

$search = isset($_GET['search']) ? $_GET['search'] : '';

// Escape the search string to prevent SQL injection
$safe_search = mysqli_real_escape_string($conn, $search);

// ============1============
// Definisikan $query untuk mengambil data buku sesuai dengan yang dicari + nama kategori dengan JOIN berdasarkan id
$query = "
    SELECT 
        books.*, 
        categories.category_name 
    FROM 
        books 
    LEFT JOIN 
        categories ON books.category_id = categories.id
    WHERE 
        books.title LIKE '%$safe_search%'
";
$result = mysqli_query($conn, $query);

$books = [];
while ($row = mysqli_fetch_assoc($result)) {
    $books[] = $row;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Daftar Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="text-dark">Daftar Buku</h3>
            <a href="form_create_book.php" class="btn btn-success">+ Tambah Buku</a>
        </div>
        <form action="list_books.php" method="GET" class="mb-3">
            <input type="text" name="search" class="form-control" placeholder="Cari judul buku..." value="<?= htmlspecialchars($search) ?>">
        </form>

        <div class="table-responsive">
            <table class="table table-striped table-bordered align-middle">
                <thead class="table-light text-center">
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Penulis</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($books) == 0) : ?>
                        <tr>
                            <td colspan="6" class="text-center text-muted">Tidak ada data</td>
                        </tr>
                    <?php else : ?>
                        <?php foreach ($books as $i => $book) : ?>
                            <tr>
                                <td class="text-center"><?= $i + 1 ?></td>
                                <td><?= htmlspecialchars($book['title']) ?></td>
                                <td><?= htmlspecialchars($book['category_name'] ?? 'Uncategorized') ?></td>
                                <td><?= htmlspecialchars($book['author']) ?></td>
                                <td class="text-center"><?= (int)$book['stock'] ?></td>
                                <td class="text-center">
                                    <a href="form_detail_book.php?id=<?= $book['id'] ?>" class="btn btn-sm btn-primary">Detail</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>