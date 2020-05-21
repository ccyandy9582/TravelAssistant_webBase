<?php 
    $_POST["planid"]=2;
    if (!isset($_POST["planid"])) {
?>
        <script>
            window.location.replace('home');
        </script>
<?php
    } else {
        $required=1;
        require("html_start.php");
        require("database.php");
        require("api_key.php");
        echo $_POST["planid"];
        echo "<br>";
        $sql = "select MAX(day) as day_num from plan_content where planid=".$_POST["planid"];
        $array = array();
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            if ($row = $result->fetch_assoc()) {
                $daynum = $row["day_num"];
            }
        }
        for ($i = 1; $i<= $daynum; $i++){
            $sql = "select start_time from plan_content where add_by <> 2 and type <> 2 and day = ".$i." and planid=".$_POST["planid"]." order by placeOrder limit 1";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                if ($row = $result->fetch_assoc()) {
                    $array["start_time"][$i] = $row["start_time"];
                }
            }
            $sql = "select name,img,placeOrder,plan_content.duration,type from attraction,plan_content where attraction.attractionid = plan_content.attractionid and type <> 2 and type <> 4 and add_by <> 2 and day = ".$i." and planid=".$_POST["planid"];
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $array["content"][$i][$row["placeOrder"]]["duration"] = $row["duration"];
                    $array["content"][$i][$row["placeOrder"]]["type"] = $row["type"];
                    $array["content"][$i][$row["placeOrder"]]["name"] = $row["name"];
                    $array["content"][$i][$row["placeOrder"]]["img"] = $row["img"];
                }
            }
            $sql = "select placeOrder,duration,type from plan_content where type = 4 and add_by <> 2 and day = ".$i." and planid=".$_POST["planid"];
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $array["content"][$i][$row["placeOrder"]]["duration"] = $row["duration"];
                    $array["content"][$i][$row["placeOrder"]]["type"] = $row["type"];
                }
            }
            echo $sql = "select name,img,type from attraction,plan_content where attraction.attractionid = plan_content.attractionid and type = 2 and placeOrder <> 1 and add_by <> 2 and day = ".$i." and planid=".$_POST["planid"];
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $array["hotel"][$i]["name"] = $row["name"];
                    $array["hotel"][$i]["img"] = $row["img"];
                    $array["hotel"][$i]["type"] = $row["type"];
                }
            }
        }
        print_r($array);
        foreach ($array["content"] as $key => $item) {
            echo "
                <div class='day_container'>
                    <h4>Day ".$key." <span>starting time: ".$array["start_time"][$key]."</span></h4>
                    <table>
            ";
            for ($i = 1; $i<=sizeof($item);$i++){
                $duration = (floor($item[$i]["duration"]/60/60)==0)?"":(floor($item[$i]["duration"]/60/60))." h ";
                $duration .= (ceil(($item[$i]["duration"] % 3600)/60)  == 0)?"":(ceil(($item[$i]["duration"] % 3600)/60))." min";
                switch ($item[$i]["type"]) {
                    case 0:
                        $type = "Starting point";
                        break; 
                    case 1:
                        $type = "Attraction";
                        break; 
                    case 3:
                        $type = "Ending point";
                }
                if ($item[$i]["type"] != 4) {
                    echo "
                        <tr>
                            <td><img src='https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=".$item[$i]["img"]."&key=".$googleapi."'></td>
                            <td><b>".$item[$i]["name"]."</b><br>spend time: ".$duration."<br>Type: ".$type."</td>
                        </tr>
                    ";
                } else if ($item[$i]["type"] == 4) {
                     echo "
                        <tr>
                            <td></td>
                            <td><b>Travel</b><br>spend time: ".$duration."<br>View route</td>
                        </tr>
                     ";
                } 
            }
            echo "
                    </table>
                </div>
            ";
            if ($key < $daynum) {
                echo "
                <div  class='hotel_container'>
                    <table>
                        <tr>
                            <td><img src='https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=".$array["hotel"][$key]["img"]."&key=".$googleapi."'></td>
                            <td><b>".$array["hotel"][$key]["name"]."</b></td>
                        </tr>
                    </table>
                </div>
                ";
            }
        }
        $conn->close();
        require("html_end.php");
    }
?>
