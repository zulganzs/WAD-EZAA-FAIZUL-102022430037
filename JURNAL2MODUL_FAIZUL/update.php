<?php
include 'connect.php';

// ==============1===============
// If statement untuk mengecek POST request dari form
// Lalu definisikan variabel2 untuk menyimpan data yang dikirim dari POST
if (isset($_POST['update'])) {
    $id = $_POST["id"];
    $title = $_POST["title"];
    $genre = $_POST["genre"];
    $director = $_POST["director"];
    $release_year = $_POST["release_year"];

    // ===============2===============
    // Definisikan $query untuk mengubah data menggunakan $id
    $query = "UPDATE movies SET
                title='$title',
                genre='$genre',
                director='$director',
                price='$price'
            WHERE id='$id'
    ";
    mysqli_query($conn, $query);

    // =============3=============
    // Eksekusi query
    if (mysqli_affected_rows($conn) > 0) {
        header("Location: list_movies.php");
        exit;
    } else {
        echo "
        <script>
            alert('Failed to update movie'); 
            window.location='list_movies.php';
        </script>";
    }
}
