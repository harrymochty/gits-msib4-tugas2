<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Profile Account</title>
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
        include "../config.php";
        $sql = "select * from saya order by id_saya desc";

        $hasil = mysqli_query($kon, $sql);
        $no = 0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;

        ?>
            <div class="row">
                <div class="col-xl-4">

                    <div class="card mb-4 mb-xl-0">
                        <div class="card-header">Profile Picture</div>
                        <div class="card-body text-center">

                            <img class="img-account-profile mb-2" src="../assets/img/<?php echo $data["foto_saya"]; ?>" alt="">

                            <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>

                            <button class="btn btn-primary" type="button">Upload new image</button>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="card mb-4">
                        <div class="card-header">Account Details</div>
                        <div class="card-body">

                            <form>
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputUsername">Username (how your name will appear to other users on the site)</label>
                                    <input class="form-control" id="inputUsername" type="text" placeholder="Enter your username" value="username" readonly>
                                </div>

                                <div class="row gx-3 mb-3">

                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputFirstName">First name</label>
                                        <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" value="<?php echo $data["nama_depan"];   ?>">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName">Last name</label>
                                        <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" value="<?php echo $data["nama_belakang"];   ?>">
                                    </div>
                                </div>

                                <div class="row gx-3 mb-3">

                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputOrgName">Phone Number</label>
                                        <input class="form-control" id="inputOrgName" type="number" placeholder="Enter your organization name" value="<?php echo $data["no_saya"];   ?>">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLocation">Email address</label>
                                        <input class="form-control" id="inputLocation" type="email" placeholder="Enter your location" value="<?php echo $data["email_saya"];   ?>">
                                    </div>
                                </div>

                                <div class="row gx-3 mb-3">

                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputPhone">Location</label>
                                        <input class="form-control" id="inputPhone" type="tel" placeholder="Enter your phone number" value="<?php echo $data["alamat_saya"];   ?>">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputBirthday">Birthday</label>
                                        <input class="form-control" id="inputBirthday" type="date" name="birthday" placeholder="Enter your birthday" value="<?php echo $data["ultah_saya"];   ?>">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="small mb-1" for="inputEmailAddress">Tentang Saya</label>
                                    <input class="form-control" id="inputEmailAddress" type="text" placeholder="Enter your email address" value="<?php echo $data["deskripsi_saya"];   ?>">
                                </div>
                                <a class="btn btn-primary" href="update_saya.php?id_saya=<?php echo htmlspecialchars($data['id_saya']); ?>">Edit Profile</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
</body>
<?php
        }
?>

</html>