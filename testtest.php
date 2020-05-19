<?php
    $required=true;
    require("database.php");
    $sql = 'insert into attraction (googleID, name, lat, lon, img, address, rating, countryID, duration) values ("ChIJQ73aHHYABDQR5twO0q4bzM4", "Victoria Peak Garden", 22.274287, 114.144078, "CmRaAAAAaSGYqU4gxRZ0jGKQaluJQ2Eb95YtX8Q_p0r7muDmkePKNC0Rq_wY4jA_M19ymjSFD6yErYWMRZy75o03-m_zUq4jNTCAZIKpK1XQa4X_aL9yHGsJDkCE_aC0vofv8k6MEhDOUC2GRvciBCK3cchMR7hkGhSZHJYlmsbjyZAnHhLrUthXVsn8Mw", "Mount Austin Rd, The Peak, Hong Kong", 4.400000, 5, 7200);';
    if ($conn->query($sql) === TRUE) {
        echo 1;
    } else {
        echo 2;
    }
    $conn->close();
?>