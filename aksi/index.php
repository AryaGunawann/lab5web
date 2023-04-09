<?php
include "form.php";
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <?php
    if (isset($_POST['submit'])) {
        $nim = $_POST['txtnim'];
        $nama = $_POST['txtnama'];
        $kelas = $_POST['txtkelas'];

        $query = "INSERT INTO form_input (nim, nama, kelas) VALUES ('$nim', '$nama', '$kelas') ON DUPLICATE KEY UPDATE nim=nim";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            echo "Data berhasil disimpan";
        } else {
            echo "Terjadi kesalahan: " . mysqli_error($koneksi);
        }
    }

    $form = new Form("", "Input Form");
    $form->addField("txtnim", "Nim");
    $form->addField("txtnama", "Nama");
    $form->addField("txtkelas", "Kelas");
    echo "<h3>Silahkan isi form berikut ini :</h3>";
    $form->displayForm();
    ?>
</body>

</html>