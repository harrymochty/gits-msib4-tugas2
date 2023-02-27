<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Update Profile Account</title>
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
            <a class="nav-link active ms-0" href="./about.php" target="__blank">Profile</a>
            <a class="nav-link" href="./pengalaman.php" target="__blank">Pengalaman</a>
            <a class="nav-link" href="./sekolah.php" target="__blank">Sekolah</a>
            <a class="nav-link" href="./sertifikat.php" target="__blank">Sertifikat</a>
        </nav>
        <hr class="mt-0 mb-4">

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
        //Cek apakah ada nilai yang dikirim menggunakan methos GET dengan nama id_saya
        if (isset($_GET['id_saya'])) {
            $id_saya = input($_GET["id_saya"]);

            $sql = "select * from saya where id_saya=$id_saya";
            $hasil = mysqli_query($kon, $sql);
            $data = mysqli_fetch_assoc($hasil);
        }

        //Cek apakah ada kiriman form dari method post
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $id_saya = htmlspecialchars($_POST["id_saya"]);
            $nama_depan = input($_POST["nama_depan"]);
            $nama_belakang = input($_POST["nama_belakang"]);
            $no_saya = input($_POST["no_saya"]);
            $email_saya = input($_POST["email_saya"]);
            $alamat_saya = input($_POST["alamat_saya"]);
            $ultah_saya = input($_POST["ultah_saya"]);
            $deskripsi_saya = input($_POST["deskripsi_saya"]);

            //Query update data pada tabel anggota
            $sql = "update saya set
			nama_depan='$nama_depan',
			nama_belakang='$nama_belakang',
			no_saya='$no_saya',
			email_saya='$email_saya',
            alamat_saya='$alamat_saya',
            ultah_saya='$ultah_saya',
            deskripsi_saya='$deskripsi_saya'
			where id_saya=$id_saya";

            //Mengeksekusi atau menjalankan query diatas
            $hasil = mysqli_query($kon, $sql);

            //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
            if ($hasil) {
                header("Location:../admin/about.php");
            } else {
                echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";
            }
        }

        ?>
        <div class="row">
            <div class="col-xl-4">

                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Profile Picture</div>
                    <div class="card-body text-center">

                        <img class="img-account-profile  mb-2" src="../assets/img/<?php echo $data["foto_saya"];   ?>" alt="">

                        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>

                        <button class="btn btn-primary" type="button">Upload new image</button>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="card mb-4">
                    <div class="card-header">Account Details</div>
                    <div class="card-body">

                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="mb-3">
                                <label class="small mb-1" for="inputUsername">Username (how your name will appear to other users on the site)</label>
                                <input class="form-control" name="inputUsername" type="text" placeholder="Enter your username" value="username" readonly>
                            </div>

                            <div class="row gx-3 mb-3">

                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputFirstName">First name</label>
                                    <input class="form-control" name="nama_depan" type="text" placeholder="Enter your first name" value="<?php echo $data["nama_depan"];   ?>">
                                </div>

                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLastName">Last name</label>
                                    <input class="form-control" name="nama_belakang" type="text" placeholder="Enter your last name" value="<?php echo $data["nama_belakang"];   ?>">
                                </div>
                            </div>

                            <div class="row gx-3 mb-3">

                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputOrgName">Phone Number</label>
                                    <input class="form-control" name="no_saya" type="number" placeholder="Enter your organization name" value="<?php echo $data["no_saya"];   ?>">
                                </div>

                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLocation">Email address</label>
                                    <input class="form-control" name="email_saya" type="email" placeholder="Enter your location" value="<?php echo $data["email_saya"];   ?>">
                                </div>
                            </div>

                            <div class="row gx-3 mb-3">

                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputPhone">Location</label>
                                    <input class="form-control" name="alamat_saya" type="tel" placeholder="Enter your phone number" value="<?php echo $data["alamat_saya"];   ?>">
                                </div>

                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputBirthday">Birthday</label>
                                    <input class="form-control" name="ultah_saya" type="date" name="birthday" placeholder="Enter your birthday" value="<?php echo $data["ultah_saya"];   ?>">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="small mb-1" for="inputEmailAddress">Tentang Saya</label>
                                <input class="form-control" name="deskripsi_saya" type="text" placeholder="Enter your email address" value="<?php echo $data["deskripsi_saya"];   ?>">
                            </div>
                            <input type="hidden" name="id_saya" value="<?php echo $data['id_saya']; ?>" />

                            <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>