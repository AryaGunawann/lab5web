<?php
include "koneksi.php";

if (isset($_POST['Nim'])) {
    $nim = $_POST['Nim'];
    $query = "SELECT Nim FROM form_input WHERE Nim='$nim'";
    $result = mysqli_query($koneksi, $query);
    if (mysqli_num_rows($result) > 0) {
        echo "used";
    } else {
        echo "available";
    }
}
?>
