<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<!-- Custom CSS -->
<style>
    body {
        background-size: cover;
        background-color: #87CEEB;
    }

    .container {
        background-color: rgba(0, 0, 255, 0.7);
        /* Warna biru dengan transparansi 70% */
        padding: 20px;
        border-radius: 15px;
        /* Bikin sudut-sudut membulat */
        box-shadow: 0px 0px 20px rgba(0, 0, 139, 0.8);
        /* Efek bayangan biru gelap */
        margin-top: 50px;
    }


    h1 {
        color: #FFFFFF;
        /* Warna teks putih */
        text-shadow: 2px 2px 4px #00008B;
        /* Efek bayangan hitam biru gelap */
    }

    .table {
        background-color: rgba(255, 255, 255, 0.8);
        /* Warna putih dengan transparansi 80% */
        border-radius: 10px;
        /* Membuat tabel dengan sudut membulat */
    }

    th {
        background-color: #4682B4;
        /* Biru laut */
        color: #00008B;

    }

    td {
        background-color: rgba(173, 216, 230, 0.6);
        /* Biru muda dengan transparansi */
    }
</style>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Daftar Buku</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Tahun</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Koneksi ke database
                $conn = new mysqli("localhost", "root", "", "prakweb_2024_c_223040057");

                // Cek koneksi
                if ($conn->connect_error) {
                    die("Koneksi gagal: " . $conn->connect_error);
                }

                // Query data buku
                $sql = "SELECT * FROM buku";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Output setiap baris data
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row["id"] . "</td>
                                <td>" . $row["judul"] . "</td>
                                <td>" . $row["penulis"] . "</td>
                                <td>" . $row["tahun"] . "</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4' class='text-center'>Tidak ada data buku</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>