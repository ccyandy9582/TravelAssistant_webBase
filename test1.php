<?php
set_time_limit ( 10000 );
$required = 1;
require("database.php");
$sql = "SELECT googleId,countryId,attractionID FROM attraction";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo $row["googleId"]."<br>".$row["countryId"]."<br>";
        $temp = file_get_contents("https://maps.googleapis.com/maps/api/place/details/json?place_id=".$row["googleId"]."&fields=type&key=AIzaSyDog7hXlhQFMMuvI4PWVeMnhG_R_v8oFsk");
        // echo $temp;
        $obj = json_decode($temp,true);
        echo sizeof($obj["result"]["types"])."<br>";
        for ($i = 0; $i < sizeof($obj["result"]["types"]);$i++) {
            $sql1 = "INSERT INTO attraction_type (id, type)
            VALUES ('".$row["attractionID"]."', '".$obj["result"]["types"][$i]."')";
            if ($conn->query($sql1) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql1 . "<br>" . $conn->error;
            }
        }
    }
} else {
    echo "0 results";
}
$conn->close();
?>