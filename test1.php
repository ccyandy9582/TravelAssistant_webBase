<?php
$temp = file_get_contents("https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=CmRaAAAAub56cWl-MJK7NV-D635B-eY_QZuV5mu-7U6g4XlCLqap29dzsDhFiI0bCDQ5-KLxvTlhyfYczBsGFGLpZ59uLjID6of6vaaRGjYh0v6p5QFy8c3wnA426pOoYO8K2wG4EhD1NGU72eIValQWSJKbqjY_GhTxXZrpiSE8NfabbciKIA7gABWx4w&key=AIzaSyDog7hXlhQFMMuvI4PWVeMnhG_R_v8oFsk");
// echo $temp;
echo "<img src='".$temp."'>";
// set_time_limit ( 10000 );
// $required = 1;
// require("database.php");
// $sql = "SELECT googleId,countryId,attractionID FROM attraction";
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
//     // output data of each row
//     while($row = $result->fetch_assoc()) {
//         echo $row["googleId"]."<br>".$row["countryId"]."<br>";
//         $temp = file_get_contents("https://maps.googleapis.com/maps/api/place/details/json?place_id=".$row["googleId"]."&fields=type&key=AIzaSyDog7hXlhQFMMuvI4PWVeMnhG_R_v8oFsk");
//         // echo $temp;
//         $obj = json_decode($temp,true);
//         echo sizeof($obj["result"]["types"])."<br>";
//         for ($i = 0; $i < sizeof($obj["result"]["types"]);$i++) {
//             $sql1 = "INSERT INTO attraction_type (id, type)
//             VALUES ('".$row["attractionID"]."', '".$obj["result"]["types"][$i]."')";
//             if ($conn->query($sql1) === TRUE) {
//                 echo "New record created successfully";
//             } else {
//                 echo "Error: " . $sql1 . "<br>" . $conn->error;
//             }
//         }
//     }
// } else {
//     echo "0 results";
// }
// $conn->close();
?>