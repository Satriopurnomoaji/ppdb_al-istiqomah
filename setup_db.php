<?php
include "config/config.php";

$queries = [
    "ALTER TABLE pendaftaran ADD asal_sekolah VARCHAR(100) AFTER email",
    "ALTER TABLE pendaftaran ADD ijazah VARCHAR(255) AFTER ktp"
];

foreach ($queries as $q) {
    if (mysqli_query($conn, $q)) {
        echo "Success: $q\n";
    } else {
        echo "Error: " . mysqli_error($conn) . "\n";
    }
}
?>
