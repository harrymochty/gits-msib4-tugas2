<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Sekolah</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container-xl px-4 mt-4">

        <nav class="nav nav-borders">
            <a class="nav-link" href="./index.php" target="__blank">Home</a>
            <a class="nav-link" href="./about.php" target="__blank">Profile</a>
            <a class="nav-link" href="./pengalaman.php" target="__blank">Pengalaman</a>
            <a class="nav-link active ms-0" href="./sekolah.php" target="__blank">Sekolah</a>
            <a class="nav-link" href="./sertifikat.php" target="__blank">Sertifikat</a>
        </nav>
        <hr class="mt-0 mb-4">

        <div class="container">
            <br>
            <h4>
                <center>DAFTAR sekolah PELATIHAN</center>
            </h4>
            <?php

            include "../config.php";

            //Cek apakah ada kiriman form dari method post
            if (isset($_GET['id_sekolah'])) {
                $id_sekolah = htmlspecialchars($_GET["id_sekolah"]);

                $sql = "delete from sekolah where id_sekolah='$id_sekolah' ";
                $hasil = mysqli_query($kon, $sql);

                //Kondisi apakah berhasil atau tidak
                if ($hasil) {
                    header("Location:index.php");
                } else {
                    echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";
                }
            }
            ?>


            <tr class="table-danger">
                <br>
                <thead>
                    <tr>
                        <table class="my-3 table table-bordered">
                            <tr class="table-primary">
                                <th>No</th>
                                <th>Sekolah</th>
                                <th>Alamat Sekolah</th>
                                <th>Lama Sekolah</th>
                                <th>Deskripsi Sekolah</th>
                                <th colspan='2'>Aksi</th>

                            </tr>
                </thead>

                <?php
                include "../config.php";
                $sql = "select * from sekolah order by id_sekolah desc";

                $hasil = mysqli_query($kon, $sql);
                $no = 0;
                while ($data = mysqli_fetch_array($hasil)) {
                    $no++;

                ?>
                    <tbody>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $data["nama_sekolah"]; ?></td>
                            <td><?php echo $data["alamat_sekolah"]; ?></td>
                            <td><?php echo $data["lama_sekolah"]; ?></td>
                            <td><?php echo $data["deskripsi_sekolah"]; ?></td>
                            <td>
                                <a href="update_sekolah.php?id_sekolah=<?php echo htmlspecialchars($data['id_sekolah']); ?>"><img src="../assets/img/icon_edit.png" alt="" width="20px"></a>
                                <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id_sekolah=<?php echo $data['id_sekolah']; ?>"><img src="../assets/img/icon_delete.png" alt="" width="20px"></a>
                            </td>
                        </tr>
                    </tbody>
                <?php
                }
                ?>
                </table>
                <a href="create_sekolah.php" class="btn btn-primary" role="button">Tambah Data</a>
        </div>
</body>

</html>