<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Create Pengalaman</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<title>
    Radhen Adebos</title>

<body>
    <div class="container-xl px-4 mt-4">

        <nav class="nav nav-borders">
            <a class="nav-link" href="./index.php" target="__blank">Home</a>
            <a class="nav-link" href="./about.php" target="__blank">Profile</a>
            <a class="nav-link active ms-0" href="./pengalaman.php" target="__blank">Pengalaman</a>
            <a class="nav-link" href="./sekolah.php" target="__blank">Sekolah</a>
            <a class="nav-link" href="./sertifikat.php" target="__blank">Sertifikat</a>
        </nav>
        <hr class="mt-0 mb-4">


        <div class="container">
            <?php
            //Include file koneksi, untuk koneksikan ke database
            include "../config.php";

            //Fungsi untuk mencegah inputan karakter yang tidak sesuai
            function input($data)
            {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            //Cek apakah ada kiriman form dari method post
            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                $perusahaan = input($_POST["perusahaan"]);
                $jabatan = input($_POST["jabatan"]);
                $lama_kerja = input($_POST["lama_kerja"]);
                $deskripsi = input($_POST["deskripsi"]);

                //Query input menginput data kedalam tabel anggota
                $sql = "insert into pengalaman (perusahaan,jabatan,lama_kerja,deskripsi) values
		('$perusahaan','$jabatan','$lama_kerja','$deskripsi')";

                //Mengeksekusi/menjalankan query diatas
                $hasil = mysqli_query($kon, $sql);

                //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
                if ($hasil) {
                    header("Location:pengalaman.php");
                } else {
                    echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";
                }
            }
            ?>
            <h2>Input Data Perusahaan</h2>


            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                <div class="form-group">
                    <label>Nama Perusahaan :</label>
                    <input type="text" name="perusahaan" class="form-control" placeholder="Masukan Nama Perusahaan" required />

                </div>
                <div class="form-group">
                    <label>Jabatan :</label>
                    <input type="text" name="jabatan" class="form-control" placeholder="Masukan Jabatan" required />
                </div>
                <div class="form-group">
                    <label>Lama Kerja :</label>
                    <input type="text" name="lama_kerja" class="form-control" placeholder="Masukan Lama Kerja" required />
                </div>
                </p>

                <div class="form-group">
                    <label>Deskripsi :</label>
                    <textarea name="deskripsi" class="form-control" rows="5" placeholder="Masukan Deskripsi Perusahaan" required></textarea>
                </div>

                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
</body>

</html>