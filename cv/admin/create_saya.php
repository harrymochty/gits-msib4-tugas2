<!DOCTYPE html>
<html>

<head>
    <title>Create Bio Data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <?php
        //Include file koneksi, untuk koneksikan ke database
        include "config.php";

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

            $nama_saya = input($_POST["nama_saya"]);
            $no_saya = input($_POST["no_saya"]);
            $deskripsi_saya = input($_POST["deskripsi_saya"]);
            $foto_saya = input($_FILES["foto_saya"]["name"]);
            $tempname = $_FILES["foto_saya"]["tmp_name"];
            $folder = "assets/" . $foto_saya;

            //Query input menginput data kedalam tabel anggota
            $sql = "insert into saya (nama_saya,no_saya,deskripsi_saya,foto_saya) values
		    ('$nama_saya','$no_saya','$deskripsi_saya','$foto_saya')";

            //Mengeksekusi/menjalankan query diatas
            $hasil = mysqli_query($kon, $sql);

            move_uploaded_file($tempname, $folder);

            //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
            if ($hasil) {
                header("Location:saya.php");
            } else {
                echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";
            }
        }
        ?>
        <h2>Input Data</h2>


        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
            <div class="form-group">
                <label>Nama Saya :</label>
                <input type="text" name="nama_saya" class="form-control" placeholder="Masukan Nama" required />

            </div>
            <div class="form-group">
                <label>No Saya :</label>
                <input type="text" name="no_saya" class="form-control" placeholder="Masukan Nama Sekolah" required />
            </div>
            <div class="form-group">
                <label>Tentang Saya :</label>
                <textarea name="deskripsi_saya" class="form-control" rows="5" placeholder="Masukan Alamat" required></textarea>
            </div>
            <div class="form-group">
                <label>Foto Saya :</label>
                <input type="file" name="foto_saya" class="form-control" placeholder="Masukan Nama Sekolah" required />
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>