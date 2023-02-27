<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Home Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<?php
include "../config.php";
$sql = "select * from saya order by id_saya desc";

$hasil = mysqli_query($kon, $sql);
$no = 0;
while ($data = mysqli_fetch_array($hasil)) {
    $no++;

?>

    <body>
        <div class="container-xl px-4 mt-4">

            <nav class="nav nav-borders">
                <a class="nav-link active ms-0" href="./index.php" target="__blank">Home</a>
                <a class="nav-link" href="./about.php" target="__blank">Profile</a>
                <a class="nav-link" href="./pengalaman.php" target="__blank">Pengalaman</a>
                <a class="nav-link" href="./sekolah.php" target="__blank">Sekolah</a>
                <a class="nav-link" href="./sertifikat.php" target="__blank">Sertifikat</a>
            </nav>
            <hr class="mt-0 mb-4">

            <main role="main" class="container">
                <div class="jumbotron text-center">
                    <h1>Welcome <?php echo $data["nama_depan"]; ?> <span class="text-primary"><?php echo $data["nama_belakang"];   ?></span> </h1>
                </div>
            </main>
    </body>
<?php
}
?>

</html>